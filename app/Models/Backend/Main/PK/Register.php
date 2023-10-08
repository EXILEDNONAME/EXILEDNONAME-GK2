<?php

namespace App\Models\Backend\Main\PK;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Register extends Model {

  use HasFactory, SoftDeletes;

  protected $table = 'main_pk_registers';
  protected $primaryKey = 'id';
  protected $guarded = ['id'];

}
