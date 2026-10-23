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
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->string('kode')->unique();
            $table->string('nama');
            $table->string('jenjang');
            $table->string('tagline')->nullable();
            $table->text('deskripsi');
            $table->json('persyaratan')->nullable();
            $table->json('kurikulum')->nullable();
            $table->string('durasi')->default('3 Tahun / Fleksibel');
            $table->json('keunggulan')->nullable();
            $table->text('prospek_lulusan')->nullable();
            $table->string('foto')->nullable();
            $table->integer('urutan')->default(1);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programs');
    }
};
