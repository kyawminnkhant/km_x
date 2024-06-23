<?php

namespace App\Repositories;

use App\Classes\ApiResponseClass;
use App\Interfaces\AccountingRepositoryInterface;
use App\Models\ChartsOfAccounts;
use App\Models\JournalEntryDetail;

class AccountingRepository implements AccountingRepositoryInterface
{
    public function index()
    {
        return ChartsOfAccounts::all();
    }

    public function getById($id)
    {
        return JournalEntryDetail::where('charts_of_accounts_id', $id)->with('charts')->get();
    }
}
