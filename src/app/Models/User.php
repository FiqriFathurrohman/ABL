<?php

namespace App\Models;

use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements FilamentUser
{
    use HasRoles;

    protected $fillable = [
        'name', 'email', 'password', 'role', 'status',
        'is_active', 'region', 'latitude', 'longitude'
    ];

    /**
     * Menentukan siapa yang boleh masuk ke dashboard Filament.
     */
    public function canAccessPanel(Panel $panel): bool
    {
        // Cek apakah user punya role 'admin' (via Spatie) 
        // ATAU kolom is_active bernilai true
        return $this->hasRole('admin') || (bool) $this->is_active;
    }

    /**
     * HAPUS ATAU KOMENTARI METHOD INI 
     * Karena sudah disediakan oleh trait HasRoles milik Spatie
     */
    /*
    public function hasRole(string $role): bool
    {
        return $this->role === $role;
    }
    */
}