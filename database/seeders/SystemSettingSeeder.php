<?php

namespace Database\Seeders;

use Carbon\Carbon as Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Backend\SystemSetting;

class SystemSettingSeeder extends Seeder {

  public function run() {
    $data = [
      [
        'name'            => 'EXILEDNONAME',
        'version'         => '1.0',
        'created_at'      => Carbon::now(),
      ],
    ];

    SystemSetting::insert($data);
  }

}
