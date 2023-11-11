<?php

namespace Database\Seeders\Application;

use Carbon\Carbon as Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TableGeneralSeeder extends Seeder {

  public function run() {
    $data = [
      [
        'name'            => 'Dummy Table General 1',
        'created_at'      => Carbon::now(),
      ],
      [
        'name'            => 'Dummy Table General 2',
        'created_at'      => Carbon::now(),
      ],
      [
        'name'            => 'Dummy Table General 3',
        'created_at'      => Carbon::now(),
      ],
    ];

    \App\Models\Backend\__System\Application\Table\General::insert($data);
  }

}
