<?php

namespace Database\Seeders;

use App\Models\ChartsOfAccounts;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExpenseAccountsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $accounts = [
            ['account_code' => '5000', 'account_name' => 'Cost of Goods Sold', 'account_type' => 'expense'],
            ['account_code' => '5100', 'account_name' => 'Raw Materials', 'account_type' => 'expense'],
            ['account_code' => '5200', 'account_name' => 'Direct Labor', 'account_type' => 'expense'],
            ['account_code' => '5300', 'account_name' => 'Manufacturing Overhead', 'account_type' => 'expense'],
            ['account_code' => '5400', 'account_name' => 'Salaries and Wages', 'account_type' => 'expense'],
            ['account_code' => '5500', 'account_name' => 'Rent Expense', 'account_type' => 'expense'],
            ['account_code' => '5600', 'account_name' => 'Utilities Expense', 'account_type' => 'expense'],
            ['account_code' => '5700', 'account_name' => 'Depreciation Expense', 'account_type' => 'expense'],
            ['account_code' => '5800', 'account_name' => 'Repairs and Maintenance', 'account_type' => 'expense'],
            ['account_code' => '5900', 'account_name' => 'Marketing and Advertising', 'account_type' => 'expense'],
            ['account_code' => '6000', 'account_name' => 'Office Supplies', 'account_type' => 'expense'],
            ['account_code' => '6100', 'account_name' => 'Insurance', 'account_type' => 'expense'],
            ['account_code' => '6200', 'account_name' => 'Legal and Professional Fees', 'account_type' => 'expense'],
            ['account_code' => '6300', 'account_name' => 'Travel and Entertainment', 'account_type' => 'expense'],
            ['account_code' => '6400', 'account_name' => 'Interest Expense', 'account_type' => 'expense'],
            ['account_code' => '6500', 'account_name' => 'Bank Fees', 'account_type' => 'expense'],
            ['account_code' => '6600', 'account_name' => 'Transportations Fees', 'account_type' => 'expense']
        ];

        foreach ($accounts as $account) {
            ChartsOfAccounts::create($account);
        }
    }
}
