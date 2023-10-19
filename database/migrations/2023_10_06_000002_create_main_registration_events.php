<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

  public function up(): void {
    Schema::create('main_registration_events', function (Blueprint $table) {
      $table->increments('id');
      $table->timestamp('date_start')->nullable();
      $table->timestamp('date_end')->nullable();

      $table->timestamp('date')->nullable();
      $table->string('id_bigo')->nullable();
      $table->string('name')->nullable();
      $table->string('event')->nullable();
      $table->string('content')->nullable();
      $table->text('description')->nullable();

      $table->integer('active')->default(1);
      $table->integer('sort')->default(1);
      $table->integer('status')->default(2);
      $table->integer('created_by')->nullable()->default('0');
      $table->integer('updated_by')->nullable()->default('0');
      $table->timestamps();
      $table->softDeletes();
    });
  }

  public function down(): void {
    Schema::dropIfExists('main_registration_events');
  }

};
