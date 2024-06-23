<?php

namespace App\Interfaces;

interface InventoryRepositoryInterface
{
    public function index();
    public function getById($id);
}
