<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'order_date', 'status'];

    // Relation: An order belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relation: An order has many order details
    public function details()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
