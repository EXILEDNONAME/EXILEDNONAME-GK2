<?php

namespace Database\Seeders\Access;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder {

  public function run(): void {
    $permissions = [
      'master-administrator',
      'file-manager',
    ];

    foreach ($permissions as $permission) {
      Permission::create(['name' => $permission]);
    }
  }

}
