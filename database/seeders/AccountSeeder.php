<?php

namespace Database\Seeders;

use Carbon\Carbon as Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AccountSeeder extends Seeder
{
  /**
  * Run the database seeds.
  */
  public function run() {
    $data = [
      [
        'id_access'         => '1',
        'name'              => 'EXILEDNONAME',
        'email'             => 'developer@exilednoname.com',
        'phone'             => '08112448111',
        'username'          => 'exilednoname',
        'password'          => bcrypt('1234'),
        'created_at'        => Carbon::now(),
      ],
      [
        'id_access'         => '2',
        'name'              => 'Administrator',
        'email'             => 'admin@exilednoname.com',
        'phone'             => '08112448112',
        'username'          => 'admin',
        'password'          => bcrypt('1234'),
        'created_at'        => Carbon::now(),
      ],
    ];

    User::insert($data);
  }
}
