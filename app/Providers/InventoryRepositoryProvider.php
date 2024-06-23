<?php

namespace App\Providers;

use App\Interfaces\InventoryRepositoryInterface;
use App\Repositories\InventoryRepository;
use Illuminate\Support\ServiceProvider;

class InventoryRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(InventoryRepositoryInterface::class, InventoryRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
