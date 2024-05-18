<?php

namespace App\Providers;

use App\Interfaces\PurchaseRepositoryInterface;
use App\Repositories\PurchaseRepository;
use Illuminate\Support\ServiceProvider;

class PurchaseVoucherRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(PurchaseRepositoryInterface::class, PurchaseRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
