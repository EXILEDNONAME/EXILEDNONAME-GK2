<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

  public function up(): void {
    Schema::create('main_event_content_challenges', function (Blueprint $table) {
      $table->string('COL 1')->nullable();
      $table->string('COL 2')->nullable();
      $table->string('COL 3')->nullable();
      $table->string('COL 4')->nullable();
      $table->string('COL 5')->nullable();
      $table->string('COL 6')->nullable();
      $table->timestamps();
    });
  }

  public function down(): void {
    Schema::dropIfExists('main_event_content_challenges');
  }

};
