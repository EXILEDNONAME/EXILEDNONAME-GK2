<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

  public function run(): void {
    $this->call(SystemSettingSeeder::class);
    $this->call(SettingManagementAccess::class);
    $this->call(AccountSeeder::class);
  }
  
}
