<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'product_id', 'quantity', 'price'];

    // Relation: An order detail belongs to an order
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // Relation: An order detail belongs to a product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
