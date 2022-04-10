<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public $timestamps = true;

    public $fillable = [
        'customer_id',
        'amount'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function customer()
    {
        $this->belongsTo(Customer::class);
    }

    public function orderItems()
    {
        $this->hasMany(OrderItem::class);
    }

    public function books()
    {
        $this->belongsToMany(Book::class)->using(OrderItem::class);
    }
}
