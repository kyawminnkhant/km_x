<?php

namespace App\Repositories;

use App\Interfaces\PurchaseRepositoryInterface;
use App\Models\Merchant;
use App\Models\PurchaseProductOrder;
use App\Models\PurchaseVoucher;

class PurchaseRepository implements PurchaseRepositoryInterface
{
    public function index()
    {
        return PurchaseVoucher::all();
    }
    public function getById($id)
    {
    }

    /*
        Status Options [1 - Draft, 2 - Partial, 3 - Full Payment]
    */
    public function store(array $data)
    {
        $voucher = PurchaseVoucher::create($data['voucher']);
        $voucherName = Merchant::whereId($voucher['merchantId'])->first()->name . "-" . $voucher->id;

        $voucher->name = $voucherName;
        $voucher->save();

        foreach ($data['orders'] as $orders => &$item) {
            $item['purchaseVoucherId'] = $voucher->id;
        }

        PurchaseProductOrder::insert($data['orders']);
    }
    public function update(array $data, $id)
    {
    }
    public function delete($id)
    {
    }
}
