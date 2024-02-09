<?php

namespace Database\Seeders;

use App\Models\ModuleInfo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['module_name' => 'Income', 'status' => 1, 'created_by' => 1, 'updated_by' => 1],
            ['module_name' => 'Expense', 'status' => 1, 'created_by' => 1, 'updated_by' => 1],
            ['module_name' => 'User', 'status' => 1, 'created_by' => 1, 'updated_by' => 1],
            ['module_name' => 'Settings', 'status' => 1, 'created_by' => 1, 'updated_by' => 1],
        ];
        ModuleInfo::insert($data);
    }
}
