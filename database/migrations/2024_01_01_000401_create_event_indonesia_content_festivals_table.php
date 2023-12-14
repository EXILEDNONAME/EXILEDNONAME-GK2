<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

  public function up(): void {
    Schema::create('event_indonesia_content_festivals', function (Blueprint $table) {
      $table->increments('id');
      $table->string('col_1')->nullable();
      $table->string('col_2')->nullable();
      $table->string('col_3')->nullable();
      $table->string('col_4')->nullable();
      $table->string('col_5')->nullable();
      $table->string('col_6')->nullable();
      $table->timestamps();
    });
  }

  public function down(): void {
    Schema::dropIfExists('event_indonesia_content_festivals');
  }

};
