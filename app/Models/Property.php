<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Property extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'created_by',
        'description',
        'price',
        'project_id',
        'title',
        'units'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'created_by' => 'integer',
        'deleted_at' => 'datetime',
        'description' => 'string',
        'price' => 'decimal:2',
        'project_id' => 'integer',
        'title' => 'string',
        'updated_at' => 'datetime',
        'units' => 'integer'
    ];

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function clients(): BelongsToMany
    {
//        return $this->belongsToMany(Client::class)->using(ClientProperty::class);
        return $this->belongsToMany(Client::class, 'client_property', 'property_id', 'client_id');
    }
}
