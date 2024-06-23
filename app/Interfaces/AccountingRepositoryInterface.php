<?php

namespace App\Interfaces;

interface AccountingRepositoryInterface
{
    public function index();
    public function getById($id);
}
