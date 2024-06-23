<?php

namespace Database\Seeders;

use App\Models\ChartsOfAccounts;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LiabilityAccountsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $accounts = [
            ['account_code' => '2000', 'account_name' => 'Accounts Payable', 'account_type' => 'liability'],
            ['account_code' => '2100', 'account_name' => 'Short-term Loans', 'account_type' => 'liability'],
            ['account_code' => '2200', 'account_name' => 'Accrued Liabilities', 'account_type' => 'liability'],
            ['account_code' => '2300', 'account_name' => 'Taxes Payable', 'account_type' => 'liability'],
            ['account_code' => '2400', 'account_name' => 'Long-term Loans', 'account_type' => 'liability']
        ];

        foreach ($accounts as $account) {
            ChartsOfAccounts::create($account);
        }
    }
}
