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
        Schema::create('tutors', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('jabatan');
            $table->string('kategori')->default('Tutor & Guru'); // Pimpinan & Pengelola, Tutor & Guru, Staf IT & Administrasi
            $table->string('nuptk')->nullable();
            $table->string('jenis_kelamin', 2)->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('email')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('foto')->nullable();
            $table->text('bio')->nullable();
            $table->integer('urutan')->default(99);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tutors');
    }
};
