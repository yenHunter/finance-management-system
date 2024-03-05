<?php

namespace Database\Seeders;

use App\Models\FinancialYear;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FinancialYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['value' => '2021-22', 'status' => 1, 'created_by' => 1, 'updated_by' => null],
            ['value' => '2022-23', 'status' => 1, 'created_by' => 1, 'updated_by' => null],
            ['value' => '2023-24', 'status' => 1, 'created_by' => 1, 'updated_by' => null],
            ['value' => '2024-25', 'status' => 1, 'created_by' => 1, 'updated_by' => null],
        ];
        FinancialYear::insert($data);
    }
}
