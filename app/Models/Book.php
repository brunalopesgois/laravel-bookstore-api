<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public $timestamps = true;

    public $fillable = [
        'isbn',
        'title',
        'description',
        'genre',
        'cover_url',
        'sale_price',
        'author_id',
        'publisher_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
