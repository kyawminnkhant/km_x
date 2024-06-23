<?php

namespace App\Listeners;

use App\Events\JournalEntryCreated;
use App\Events\JournalEntryCreatedOnPurchased;
use App\Models\JournalEntryDetail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateJournalEntriesDetailsOnPurchased
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
    public function handle(JournalEntryCreatedOnPurchased $event)
    {
        //Cash Account Credit
        JournalEntryDetail::create([
            'journal_entry_id' => $event->entryId,
            'charts_of_accounts_id' => 1,
            'debit' => 0,
            'credit' => $event->voucher->total + $event->voucher->transportation_fees
        ]);

        JournalEntryDetail::create([
            'journal_entry_id' => $event->entryId,
            'charts_of_accounts_id' => 3,
            'debit' => $event->voucher->total,
            'credit' => 0
        ]);

        JournalEntryDetail::create([
            'journal_entry_id' => $event->entryId,
            'charts_of_accounts_id' => 34,
            'debit' => $event->voucher->transportation_fees,
            'credit' => 0
        ]);
    }
}
