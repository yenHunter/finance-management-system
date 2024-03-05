<?php

namespace Database\Seeders;

use App\Models\ExpenseHead;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExpenseHeadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['head_name' => 'Honorarium paid to the Trustees & Others', 'status' => 1, 'created_by' => 1, 'updated_by' => null],
            ['head_name' => 'Investment in FDR', 'status' => 1, 'created_by' => 1, 'updated_by' => null],
            ['head_name' => 'Salary & Allowances', 'status' => 1, 'created_by' => 1, 'updated_by' => null],
            ['head_name' => 'Stationery', 'status' => 1, 'created_by' => 1, 'updated_by' => null],
            ['head_name' => 'Annual General Meeting (AGM) Expense', 'status' => 1, 'created_by' => 1, 'updated_by' => null],
            ['head_name' => 'AIT Against Salary', 'status' => 1, 'created_by' => 1, 'updated_by' => null],
        ];
        ExpenseHead::insert($data);
    }
}
