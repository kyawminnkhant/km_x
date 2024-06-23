<?php

namespace App\Repositories;

use App\Interfaces\InventoryRepositoryInterface;
use App\Models\Inventory;

class InventoryRepository implements InventoryRepositoryInterface
{
    public function index()
    {
        return Inventory::with('product')->get();
    }

    public function getById($id)
    {
    }
}
