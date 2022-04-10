<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    public $timestamps = true;

    public $fillable = [
        'address',
        'city',
        'region',
        'country',
        'type',
        'postal_code'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
