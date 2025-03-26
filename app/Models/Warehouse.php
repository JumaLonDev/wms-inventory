<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'location'];

    // Relation: A warehouse has many products
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
