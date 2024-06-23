<?php

namespace Database\Seeders;

use App\Models\ChartsOfAccounts;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RevenueAccountsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $accounts = [
            ['account_code' => '4000', 'account_name' => 'Sales Revenue', 'account_type' => 'revenue'],
            ['account_code' => '4100', 'account_name' => 'Service Revenue', 'account_type' => 'revenue'],
            ['account_code' => '4200', 'account_name' => 'Interest Income', 'account_type' => 'revenue'],
            ['account_code' => '4300', 'account_name' => 'Other Income', 'account_type' => 'revenue']
        ];

        foreach ($accounts as $account) {
            ChartsOfAccounts::create($account);
        }
    }
}
