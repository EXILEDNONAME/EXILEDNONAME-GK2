<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

  public function up(): void {
    Schema::create('main_family_members', function (Blueprint $table) {
      $table->increments('id');
      $table->timestamp('date_start')->nullable();
      $table->timestamp('date_end')->nullable();

      $table->timestamp('date_join')->nullable();
      $table->integer('verify')->nullable()->default('0');
      $table->integer('official')->nullable()->default('0');

      $table->string('id_bigo')->unique();
      $table->string('name');
      $table->string('email')->nullable();
      $table->string('phone')->nullable();
      $table->string('area')->nullable();
      $table->timestamp('birthday')->nullable();
      $table->string('photo_verification')->nullable();

      $table->text('description')->nullable();
      $table->integer('active')->default(1);
      $table->integer('sort')->default(1);
      $table->integer('status')->default(1);
      $table->integer('created_by')->nullable()->default('0');
      $table->integer('updated_by')->nullable()->default('0');
      $table->timestamps();
      $table->softDeletes();
    });
  }

  public function down(): void {
    Schema::dropIfExists('main_family_members');
  }

};
