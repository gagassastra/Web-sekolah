<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode',
        'nama',
        'jenjang',
        'tagline',
        'deskripsi',
        'persyaratan',
        'kurikulum',
        'durasi',
        'keunggulan',
        'prospek_lulusan',
        'foto',
        'urutan',
        'is_active',
    ];

    protected $casts = [
        'persyaratan' => 'array',
        'kurikulum' => 'array',
        'keunggulan' => 'array',
        'is_active' => 'boolean',
    ];

    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }

    public function getNamaProgramAttribute(): string
    {
        return $this->nama ?? '';
    }

    public function getKodeProgramAttribute(): string
    {
        return $this->kode ?? '';
    }

    public function getFotoUrlAttribute(): string
    {
        if (!$this->foto) {
            return asset('images/kegiatan/pembelajaran-tatap-muka-1.jpg');
        }
        if (str_starts_with($this->foto, 'http') || str_starts_with($this->foto, '/')) {
            return $this->foto;
        }
        return asset($this->foto);
    }
}
