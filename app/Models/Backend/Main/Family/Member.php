<?php

namespace App\Models\Backend\Main\Family;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Member extends Model {

  use HasFactory, SoftDeletes;

  protected $table = 'main_family_members';
  protected $primaryKey = 'id';
  protected $guarded = ['id'];

}
