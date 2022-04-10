<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    use HasFactory;

    public $timestamps = true;

    public $fillable = [
        'name',
        'phone_number',
        'address_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function books()
    {
        $this->hasMany(Book::class);
    }

    public function address()
    {
        $this->hasOne(Address::class);
    }
}
