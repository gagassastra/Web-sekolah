<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomor_pendaftaran',
        'nama_lengkap',
        'nik',
        'nisn',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'program_id',
        'alamat',
        'desa',
        'kecamatan',
        'kabupaten',
        'no_hp',
        'email',
        'pendidikan_terakhir',
        'nama_wali',
        'pekerjaan_wali',
        'alasan_mendaftar',
        'status',
        'catatan_admin',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
    ];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}
