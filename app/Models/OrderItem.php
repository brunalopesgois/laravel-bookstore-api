<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class OrderItem extends Pivot
{
    use HasFactory;

    public $timestamps = true;

    public $fillable = [
        'order_id',
        'book_id',
        'sub_amount',
        'quantity'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function order()
    {
        $this->belongsTo(Order::class);
    }

    public function book()
    {
        $this->hasOne(Book::class);
    }
}
