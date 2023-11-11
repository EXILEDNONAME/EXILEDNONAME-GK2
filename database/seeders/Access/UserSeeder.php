<?php

namespace Database\Seeders\Access;

use App\Models\User;
use Carbon\Carbon as Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder {

  public function run(): void {
    $user = [
      [
        'name'        => 'Administrator',
        'email'       => 'admin@exilednoname.com',
        'phone'       => '0811',
        'username'    => 'administrator',
        'password'    => bcrypt('1234'),
        'created_at'  => Carbon::now(),
      ],
      [
        'name'        => 'Naufal Haidir Ridha',
        'email'       => 'naufalhaidirridha@rocketmail.com',
        'phone'       => '08112448111',
        'username'    => 'naufalhaidirridha',
        'password'    => bcrypt('1234'),
        'created_at'  => Carbon::now(),
      ],
      [
        'name'        => 'User',
        'email'       => 'user@exilednoname.com',
        'phone'       => '08112448112',
        'username'    => 'user.exilednoname',
        'password'    => bcrypt('1234'),
        'created_at'  => Carbon::now(),
      ],
      [
        'name'        => 'Rasya',
        'email'       => 'rasya@exilednoname.com',
        'phone'       => '08112448113',
        'username'    => 'rasyakira',
        'password'    => bcrypt('1234'),
        'created_at'  => Carbon::now(),
      ],
    ];
    User::insert($user);

    $model_has_roles = [
      [
        'role_id'        => '1',
        'model_type'     => 'App\Models\User',
        'model_id'       => '1',
      ],
      [
        // master-administrator
        'role_id'        => '2',
        'model_type'     => 'App\Models\User',
        'model_id'       => '2',
      ],
    ];
    \DB::table('model_has_roles')->insert($model_has_roles);

  }
}
