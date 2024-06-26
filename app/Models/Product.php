<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'categoryId', 'costs', 'sales_price', 'remarks'];

    /**
     * Get the category that owns the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'categoryId');
    }

    public function inventoryTransactions()
    {
        return $this->hasMany(InventoryTransactions::class, 'productId');
    }

    public function inventory()
    {
        return $this->hasOne(Inventory::class, 'productId');
    }
}
