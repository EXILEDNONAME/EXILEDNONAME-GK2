<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

  public function up(): void {
    Schema::create('events', function (Blueprint $table) {
      $table->increments('id');
      $table->timestamp('date_start')->nullable();
      $table->timestamp('date_end')->nullable();
      $table->string('ss_report')->nullable();
      $table->string('id_bigo');
      $table->string('name');
      $table->string('event');
      $table->string('content')->nullable();
      $table->timestamp('date')->nullable();
      $table->text('description')->nullable();
      $table->integer('active')->default(1);
      $table->integer('status')->default(2);
      $table->timestamps();
      $table->softDeletes();
    });
  }

  public function down(): void {
    Schema::dropIfExists('events');
  }

};
