<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'category',
        'image_path',
        'caption',
        'event_date',
        'urutan',
    ];

    protected $casts = [
        'event_date' => 'date',
    ];

    public function getImageUrlAttribute(): string
    {
        $path = $this->image_path ?: 'images/kegiatan/pembelajaran-tatap-muka-1.jpg';

        return str_starts_with($path, 'http') ? $path : asset(ltrim($path, '/'));
    }

    /**
     * Alias keterangan foto agar kompatibel dengan tampilan (description).
     */
    public function getDescriptionAttribute(): ?string
    {
        return $this->caption;
    }
}