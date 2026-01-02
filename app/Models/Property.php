<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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
    ];

    public function CreatedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function Project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
