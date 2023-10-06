<?php

namespace App\Models\Backend\Main\Event;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentChallenge extends Model {

  use HasFactory;

  protected $table = 'main_event_content_challenges';
  protected $primaryKey = 'id';
  protected $guarded = ['id'];
  public $timestamps = false;

}
