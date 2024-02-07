<?php

namespace Database\Seeders;

use App\Models\RoleInfo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $oblect = new RoleInfo();
        $oblect->role_name = 'Administrator';
        $oblect->created_by = 1;
        $oblect->updated_by = 1;
        $oblect->save();
    }
}
