<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_sekolah',
        'npsn',
        'bentuk_pendidikan',
        'status_sekolah',
        'sk_pendirian',
        'tanggal_sk_pendirian',
        'sk_izin_operasional',
        'tanggal_sk_izin',
        'alamat',
        'desa',
        'kecamatan',
        'kabupaten',
        'provinsi',
        'kode_pos',
        'telepon',
        'whatsapp',
        'email',
        'jam_layanan',
        'kepala_sekolah',
        'foto_kepala',
        'sambutan_kepala',
        'sejarah',
        'visi',
        'misi',
        'tujuan',
        'maps_embed',
        'logo_path',
        'foto_gedung',
    ];

    protected $casts = [
        'misi' => 'array',
        'tujuan' => 'array',
        'tanggal_sk_pendirian' => 'date',
        'tanggal_sk_izin' => 'date',
    ];
}
