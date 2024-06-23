<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $fillable = ['productId', 'instockQty'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'productId');
    }
}
