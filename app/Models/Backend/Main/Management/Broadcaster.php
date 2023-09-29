<?php

namespace App\Models\Backend\Main\Management;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Broadcaster extends Model {

  use HasFactory, SoftDeletes;

  protected $table = 'main_management_broadcasters';
  protected $primaryKey = 'id';
  protected $guarded = ['id'];

}
