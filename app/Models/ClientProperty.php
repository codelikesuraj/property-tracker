<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientProperty extends Model
{
    protected $fillable = [
        'client_id',
        'property_id',
    ];

    protected $casts = [
        'client_id' => 'integer',
        'property_id' => 'integer',
    ];
}
