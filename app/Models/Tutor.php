<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'jabatan',
        'kategori',
        'nuptk',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'email',
        'no_hp',
        'foto',
        'bio',
        'urutan',
        'is_active',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
        'is_active' => 'boolean',
    ];

    public function getFotoUrlAttribute(): string
    {
        if (!$this->foto) {
            return 'https://ui-avatars.com/api/?background=1e3a8a&color=fff&bold=true&name=' . urlencode($this->nama ?? 'T');
        }

        return str_starts_with($this->foto, 'http') ? $this->foto : asset(ltrim($this->foto, '/'));
    }
}