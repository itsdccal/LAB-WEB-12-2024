<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['category_id', 'name', 'description', 'price', 'stock'];

    // Relasi Many-to-One: Produk dimiliki oleh satu kategori
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relasi One-to-Many: Produk memiliki banyak log inventaris
    public function inventoryLogs()
    {
        return $this->hasMany(InventoryLog::class);
    }   
}