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
        Schema::create('bot', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('baslik');
            $table->string('url');
            $table->text('aciklama')->nullable();
            $table->string('site_id');
            $table->string('user_id');
            $table->string('feed_id');
            $table->string('kategori');
            $table->string('anakategori');
            $table->string('image')->nullable();
            $table->integer('tiklasay')->nullable();
            $table->datetime('pubdate', $precision = 0)->nullable();
            $table->timestamps();
            $table->unique('url');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bot');
    }
};
