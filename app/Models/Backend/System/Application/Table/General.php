<?php

namespace App\Models\Backend\System\Application\Table;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class General extends Model {

  use HasFactory, SoftDeletes;

  protected $table = 'application_table_generals';
  protected $primaryKey = 'id';
  protected $guarded = ['id'];

}
