<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Client extends Model
{
    protected $fillable = [
        'address',
        'email',
        'name',
        'occupation',
        'phone'
    ];

    protected $casts = [
        'address' => 'string',
        'email' => 'string',
        'name' => 'string',
        'occupation' => 'string',
        'phone' => 'string'
    ];

    public function properties(): BelongsToMany
    {
//        return $this->belongsToMany(Property::class)->using(ClientProperty::class);
        return $this->belongsToMany(Property::class, 'client_property', 'client_id', 'property_id');
    }
}
