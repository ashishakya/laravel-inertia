<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $fillable = [
        'name',
        'address',
        'contact',
        'metadata',
    ];

    protected $casts = [
        'contact' => 'json',
    ];
}
