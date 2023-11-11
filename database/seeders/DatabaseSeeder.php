<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

  public function run(): void {
    $this->call(Setting\CustomizationSeeder::class);
    $this->call(Setting\OptimizationSeeder::class);
    $this->call(Setting\SettingSeeder::class);

    // $this->call(Access\PermissionSeeder::class);
    $this->call(Access\RoleSeeder::class);
    $this->call(Access\UserSeeder::class);

    $this->call(Application\TableGeneralSeeder::class);
    $this->call(Application\TableRelationSeeder::class);
  }

}
