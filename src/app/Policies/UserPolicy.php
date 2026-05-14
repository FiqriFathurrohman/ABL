<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Izinkan admin untuk melihat daftar user dan masuk ke menu Manajemen Akun.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasRole('admin');
    }

    /**
     * Izinkan admin untuk melihat detail user.
     */
    public function view(User $user): bool
    {
        return $user->hasRole('admin');
    }

    /**
     * Izinkan admin untuk membuat user baru lewat dashboard.
     */
    public function create(User $user): bool
    {
        return $user->hasRole('admin');
    }

    /**
     * Izinkan admin untuk mengedit (termasuk nge-ACC) user.
     */
    public function update(User $user): bool
    {
        return $user->hasRole('admin');
    }

    /**
     * Izinkan admin untuk menghapus user.
     */
    public function delete(User $user): bool
    {
        return $user->hasRole('admin');
    }

    public function deleteAny(User $user): bool
    {
        return $user->hasRole('admin');
    }
}