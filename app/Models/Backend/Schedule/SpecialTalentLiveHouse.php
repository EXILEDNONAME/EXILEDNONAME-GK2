<?php

namespace App\Models\Backend\Schedule;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class SpecialTalentLiveHouse extends Model {

  use HasFactory, LogsActivity;

  protected $table = 'event_special_talent_live_house';
  protected $primaryKey = 'id';
  protected $guarded = ['id'];
  protected static $logAttributes = ['*'];
  protected static $recordEvents = ['created', 'updated', 'deleted'];

  public function getActivitylogOptions(): LogOptions {
    return LogOptions::defaults()->logOnly(['*']);
  }

}
