<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    public $timestamps = true;

    public $fillable = ['name'];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function books()
    {
        $this->hasMany(Book::class);
    }
}
