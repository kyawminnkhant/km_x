<?php

namespace Database\Seeders;

use App\Models\ChartsOfAccounts;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AssetAccountsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $accounts = [
            ['account_code' => '1000', 'account_name' => 'Cash', 'account_type' => 'asset'],
            ['account_code' => '1100', 'account_name' => 'Accounts Receivable', 'account_type' => 'asset'],
            ['account_code' => '1200', 'account_name' => 'Inventory', 'account_type' => 'asset'],
            ['account_code' => '1300', 'account_name' => 'Prepaid Expenses', 'account_type' => 'asset'],
            ['account_code' => '1400', 'account_name' => 'Equipment', 'account_type' => 'asset'],
            ['account_code' => '1500', 'account_name' => 'Vehicles', 'account_type' => 'asset'],
            ['account_code' => '1600', 'account_name' => 'Furniture and Fixtures', 'account_type' => 'asset'],
            ['account_code' => '1700', 'account_name' => 'Accumulated Depreciation', 'account_type' => 'asset']
        ];

        foreach ($accounts as $account) {
            ChartsOfAccounts::create($account);
        }
    }
}
