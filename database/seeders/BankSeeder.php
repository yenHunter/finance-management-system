<?php

namespace Database\Seeders;

use App\Models\BankInfo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['bank_name' => 'Agrani Bank PLC', 'logo' => 'assets/img/banks/agrani-bank.png', 'status' => 1, 'created_by' => 1, 'updated_by' => null],
            ['bank_name' => 'Dutch Bangla Bank PLC', 'logo' => 'assets/img/banks/dbbl.jpg', 'status' => 1, 'created_by' => 1, 'updated_by' => null],
            ['bank_name' => 'First Security Islami Bank PLC', 'logo' => 'assets/img/banks/first-security-islami-bank.png', 'status' => 1, 'created_by' => 1, 'updated_by' => null],
            ['bank_name' => 'AB Bank PLC', 'logo' => 'assets/img/banks/ab-bank.jpg', 'status' => 1, 'created_by' => 1, 'updated_by' => null],
            ['bank_name' => 'Bangladesh Krishi Bank', 'logo' => 'assets/img/banks/bangladesh-krishi-bank.png', 'status' => 1, 'created_by' => 1, 'updated_by' => null],
        ];
        BankInfo::insert($data);
    }
}
