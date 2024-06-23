<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryTransactions extends Model
{
    use HasFactory;

    protected $fillable = ['productId', 'transactionDate', 'qty', 'TransactionType'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
