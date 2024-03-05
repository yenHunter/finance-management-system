<?php

namespace Database\Seeders;

use App\Models\IncomeHead;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IncomeHeadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['head_name' => 'FDR', 'status' => 1, 'created_by' => 1, 'updated_by' => null],
            ['head_name' => 'Interest received form FDR', 'status' => 1, 'created_by' => 1, 'updated_by' => null],
            ['head_name' => 'Interest received form STD', 'status' => 1, 'created_by' => 1, 'updated_by' => null],
            ['head_name' => 'Receipt by Selling used paper & others', 'status' => 1, 'created_by' => 1, 'updated_by' => null],
        ];
        IncomeHead::insert($data);
    }
}
