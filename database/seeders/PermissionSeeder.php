<?php

namespace Database\Seeders;

use App\Models\PermissionInfo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['role_id' => 1, 'module_id' => 1, 'view' => 1, 'create' => 1, 'edit' => 1, 'delete' => 1, 'created_by' => 1, 'updated_by' => 1],
            ['role_id' => 1, 'module_id' => 2, 'view' => 1, 'create' => 1, 'edit' => 1, 'delete' => 1, 'created_by' => 1, 'updated_by' => 1],
            ['role_id' => 1, 'module_id' => 3, 'view' => 1, 'create' => 1, 'edit' => 1, 'delete' => 1, 'created_by' => 1, 'updated_by' => 1],
            ['role_id' => 1, 'module_id' => 4, 'view' => 1, 'create' => 1, 'edit' => 1, 'delete' => 1, 'created_by' => 1, 'updated_by' => 1],
        ];
        PermissionInfo::insert($data);
    }
}
