<?php

namespace App\Repositories;

use App\Events\InventoryTransactionBatchInserted;
use App\Events\JournalEntryCreated;
use App\Events\JournalEntryCreatedOnPurchased;
use App\Interfaces\PurchaseRepositoryInterface;
use App\Models\InventoryTransactions;
use App\Models\JournalEntry;
use App\Models\Merchant;
use App\Models\PurchaseProductOrder;
use App\Models\PurchaseVoucher;

class PurchaseRepository implements PurchaseRepositoryInterface
{
    public function index()
    {
        return PurchaseVoucher::with('merchant')->get();
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

        $transactions = $data['orders'];

        foreach ($data['orders'] as $orders => &$item) {
            $item['purchaseVoucherId'] = $voucher->id;
        }

        PurchaseProductOrder::insert($data['orders']);
        switch ($voucher['status']) {
            case '2':
            case '3':
                foreach ($transactions as $orders => &$item) {
                    unset($item['price']);
                    $item['transactionDate'] = now();
                    $item['TransactionType'] = "PURCHASE";
                }
                InventoryTransactions::insert($transactions);
                event(new InventoryTransactionBatchInserted($transactions));

                $entry = JournalEntry::create(['date' => now(), 'description' => "PURCHASE Voucher - {$voucherName}"]);
                event(new JournalEntryCreatedOnPurchased($voucher, $entry->id));
                break;
        }
    }
    public function update(array $data, $id)
    {
    }
    public function delete($id)
    {
    }
}
