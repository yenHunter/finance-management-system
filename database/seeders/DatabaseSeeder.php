<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(ModuleSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(FinancialYearSeeder::class);
        $this->call(IncomeHeadSeeder::class);
        $this->call(ExpenseHeadSeeder::class);
        $this->call(BankSeeder::class);
        $this->call(BranchSeeder::class);
    }
}
