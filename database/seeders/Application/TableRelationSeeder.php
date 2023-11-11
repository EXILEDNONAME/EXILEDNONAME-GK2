<?php

namespace Database\Seeders\Application;

use Carbon\Carbon as Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TableRelationSeeder extends Seeder {

  public function run() {
    $data = [
      [
        'id_table_general'            => '1',
        'created_at'                  => Carbon::now(),
      ],
      [
        'id_table_general'            => '2',
        'created_at'                  => Carbon::now(),
      ],
      [
        'id_table_general'            => '3',
        'created_at'                  => Carbon::now(),
      ],
    ];

    \App\Models\Backend\__System\Application\Table\Relation::insert($data);
  }

}
