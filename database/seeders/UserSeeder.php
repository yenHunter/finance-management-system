<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $oblect = new User();
        $oblect->name = 'Cyberjatra';
        $oblect->email = 'admin@cyberjatra.com';
        $oblect->password = Hash::make('Admin@123');
        $oblect->image = 'assets/img/logo/cyberjatra.png';
        $oblect->role_id = 1;
        $oblect->status = 1;
        $oblect->save();
    }
}
