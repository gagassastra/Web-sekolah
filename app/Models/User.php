<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'phone',
        'avatar',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function isEditor(): bool
    {
        return $this->role === 'editor' || $this->role === 'admin';
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'author_id');
    }

    /**
     * URL foto profil pengguna (null jika tidak ada, tampilkan inisial).
     * Urutan: avatar akun -> foto di data Tutor dengan nama yang sama.
     */
    public function getAvatarUrlAttribute(): ?string
    {
        $foto = $this->avatar;

        if (empty($foto) && !empty($this->name)) {
            $foto = Tutor::whereRaw('LOWER(nama) = ?', [mb_strtolower(trim($this->name))])
                ->whereNotNull('foto')
                ->where('foto', '!=', '')
                ->value('foto');
        }

        if (empty($foto)) {
            return null;
        }

        return str_starts_with($foto, 'http') ? $foto : '/' . ltrim($foto, '/');
    }
}
