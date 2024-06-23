<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseVoucher extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'userId', 'transportation_fees', 'merchantId', 'total', 'status'];

    public function merchant()
    {
        return $this->belongsTo(Merchant::class, 'merchantId');
    }

    public function orders()
    {
        return $this->hasMany(PurchaseProductOrder::class, 'purchaseVoucherId');
    }
}
