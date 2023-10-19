<?php

namespace App\Models\Backend\Main\PK;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PKParty extends Model {

  use HasFactory;
  
  public $timestamps = false;

  protected $table = 'bigo_pk_party';
  protected $primaryKey = 'id';
  protected $guarded = ['id'];

}
