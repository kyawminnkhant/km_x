<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use App\Events\InventoryTransactionBatchInserted;
use App\Events\JournalEntryCreatedOnPurchased;
use App\Listeners\UpdateInventoryOnBatchInsert;
use App\Listeners\UpdateJournalEntriesDetailsOnPurchased;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        InventoryTransactionBatchInserted::class => [
            UpdateInventoryOnBatchInsert::class,
        ],
        JournalEntryCreatedOnPurchased::class => [UpdateJournalEntriesDetailsOnPurchased::class],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
