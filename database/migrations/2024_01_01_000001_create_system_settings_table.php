<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

  public function up(): void {
    Schema::create('system_settings', function (Blueprint $table) {
      $table->increments('id');
      $table->string('application_name');
      $table->string('application_version');
      $table->timestamps();
    });
  }

  public function down(): void {
    Schema::dropIfExists('system_settings');
  }

};
