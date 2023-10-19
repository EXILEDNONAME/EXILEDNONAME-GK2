<?php

namespace App\Models\Backend\Main\Registration;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model {

  use HasFactory, SoftDeletes;

  protected $table = 'main_registration_events';
  protected $primaryKey = 'id';
  protected $guarded = ['id'];

}
