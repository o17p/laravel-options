<?php

namespace O17p\Options\Models;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $fillable = ['key', 'data'];

    protected $casts = [
        'data' => 'array',
    ];
}
