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

    public function author()
    {
        $this->belongsTo(Author::class);
    }

    public function publisher()
    {
        $this->belongsTo(Publisher::class);
    }

    public function warehouse()
    {
        $this->hasOne(Warehouse::class);
    }

    public function orderItems()
    {
        $this->belongsToMany(OrderItem::class);
    }

    public function orders()
    {
        $this->belongsToMany(Order::class)->using(OrderItem::class);
    }
}
