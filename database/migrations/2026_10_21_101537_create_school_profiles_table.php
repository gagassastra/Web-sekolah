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
        Schema::create('school_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('nama_sekolah')->default('PKBM AL-QUDWAH');
            $table->string('npsn')->default('P9998654');
            $table->string('bentuk_pendidikan')->default('PKBM (Pendidikan Kesetaraan)');
            $table->string('status_sekolah')->default('Swasta');
            $table->string('sk_pendirian')->default('021/SK/YAHC/XI/2022');
            $table->date('tanggal_sk_pendirian')->nullable();
            $table->string('sk_izin_operasional')->default('421.9/ 1627 /PAUDNI/KAB/2022');
            $table->date('tanggal_sk_izin')->nullable();
            $table->string('alamat')->default('Kp. Ciwalen Rt. 003 Rw. 004');
            $table->string('desa')->default('Cidadap');
            $table->string('kecamatan')->default('Kec. Campaka');
            $table->string('kabupaten')->default('Kab. Cianjur');
            $table->string('provinsi')->default('Prov. Jawa Barat');
            $table->string('kode_pos')->default('43263');
            $table->string('telepon')->default('085864183271');
            $table->string('whatsapp')->default('085864183271');
            $table->string('email')->default('pkbmalqudwah2022@gmail.com');
            $table->string('jam_layanan')->default('Senin - Sabtu: 08.00 - 16.00 WIB');
            $table->string('kepala_sekolah')->default('Elis Masridah');
            $table->string('foto_kepala')->nullable();
            $table->text('sambutan_kepala')->nullable();
            $table->text('sejarah')->nullable();
            $table->text('visi')->nullable();
            $table->json('misi')->nullable();
            $table->json('tujuan')->nullable();
            $table->text('maps_embed')->nullable();
            $table->string('logo_path')->nullable();
            $table->string('foto_gedung')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('school_profiles');
    }
};
