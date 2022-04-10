<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    public $timestamps = true;

    public $fillable = [
        'full_name',
        'document',
        'email',
        'phone_number',
        'address_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function address()
    {
        $this->hasOne(Address::class);
    }

    public function orders()
    {
        $this->hasMany(Order::class);
    }
}
