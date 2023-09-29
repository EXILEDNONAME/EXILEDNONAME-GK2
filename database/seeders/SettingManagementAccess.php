<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon as Carbon;

use App\Models\Access;

class SettingManagementAccess extends Seeder {

  public function run(): void {
    $data = [
      [
        'name'              => 'Developer',
        'description'       => '-',
        'created_at'        => Carbon::now(),
      ],
      [
        'name'              => 'Administrator',
        'description'       => '-',
        'created_at'        => Carbon::now(),
      ],
      [
        'name'              => 'User',
        'description'       => '-',
        'created_at'        => Carbon::now(),
      ],
    ];

    Access::insert($data);
  }
}
