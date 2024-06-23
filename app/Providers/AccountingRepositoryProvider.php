<?php

namespace App\Providers;

use App\Interfaces\AccountingRepositoryInterface;
use App\Repositories\AccountingRepository;
use Illuminate\Support\ServiceProvider;

class AccountingRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(AccountingRepositoryInterface::class, AccountingRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
