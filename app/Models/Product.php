<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'sku', 'quantity', 'warehouse_id'];

    // Relation: A product belongs to a warehouse
    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }
    
}
