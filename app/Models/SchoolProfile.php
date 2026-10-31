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

    /**
     * URL foto kepala lembaga untuk bagian Sambutan.
     * Disamakan dengan foto profil Kepala di data Tutor (Pimpinan & Pengelola),
     * lalu fallback ke foto_kepala di profil sekolah, lalu foto default.
     */
    public function getFotoKepalaUrlAttribute(): string
    {
        $kepala = Tutor::where('is_active', true)
            ->whereNotNull('foto')
            ->where('foto', '!=', '')
            ->where(function ($q) {
                $q->where('jabatan', 'like', 'Kepala%')
                  ->orWhere('nama', $this->kepala_sekolah);
            })
            ->orderByRaw("CASE WHEN jabatan LIKE 'Kepala%' THEN 0 ELSE 1 END")
            ->orderBy('urutan')
            ->first();

        $foto = $kepala?->foto ?: $this->foto_kepala;

        if (empty($foto)) {
            return asset('images/tutor/dewan-tutor-1.jpg');
        }

        return str_starts_with($foto, 'http') ? $foto : '/' . ltrim($foto, '/');
    }
}
