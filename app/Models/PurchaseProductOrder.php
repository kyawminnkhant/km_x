<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseProductOrder extends Model
{
    use HasFactory;

    protected $fillable = ['purchaseVoucherId', 'userId', 'qty', 'price'];
}
