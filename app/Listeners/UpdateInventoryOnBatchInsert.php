<?php

namespace App\Listeners;

use App\Events\InventoryTransactionBatchInserted;
use App\Events\InventoryTransactionCreated;
use App\Models\Inventory;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateInventoryOnBatchInsert
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(InventoryTransactionBatchInserted $event)
    {
        foreach ($event->transactions as $transaction) {
            $inventory = Inventory::firstOrNew([
                'productId' => $transaction['productId'],
            ]);

            switch ($transaction['TransactionType']) {
                case 'PURCHASE':
                case 'RETURN_CUSTOMER':
                    $inventory->instockQty += $transaction['qty'];
                    break;
                case 'SALE':
                case 'RETURN_SUPPLIER':
                    $inventory->instockQty -= $transaction['qty'];
                    break;
                case 'ADJUSTMENT':
                    $inventory->instockQty = $transaction['qty'];
                    break;
                case 'TRANSFER':
                    // Handle transfer logic
                    break;
            }
            $inventory->save();
        }
    }
}
