<?php

namespace App\Models\Backend\System\Application\Table;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Backend\System\Application\Table\General;

class Relation extends Model {

  use HasFactory, SoftDeletes;

  protected $table = 'application_table_relations';
  protected $primaryKey = 'id';
  protected $guarded = ['id'];

  public function application_table_generals(){
    return $this->belongsTo(General::class, 'id_general');
  }

}
