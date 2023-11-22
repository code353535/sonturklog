<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('site', function (Blueprint $table) {
            $table->id();
            $table->string('ad');
            $table->string('url');
            $table->integer('user_id');
            $table->string('anakategori');
            $table->text('aciklama');
            $table->text('rednedeni')->nullable();
            $table->string('logo')->nullable();
            $table->enum('durum',['onaylandi','reddedildi','bekliyor'])->default('bekliyor');
            $table->enum('yayin',['aktif','pasif'])->default('pasif');
            $table->enum('sahip',['aktif','pasif'])->default('pasif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site');
    }
};
