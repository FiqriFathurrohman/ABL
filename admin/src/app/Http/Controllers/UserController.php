<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Menampilkan halaman utama manajemen pengguna
     */
    public function index()
    {
        // Data untuk Tab Verifikasi (Status Pending)
        $pendingPetani = User::where('role', 'petani')->where('status', 'pending')->get();
        $pendingUsers = User::where('role', 'user')->where('status', 'pending')->get();

        // Data untuk Database Pengguna (Status Active)
        $activePetanis = User::where('role', 'petani')->where('status', 'active')->get();
        $activeCustomers = User::where('role', 'user')->where('status', 'active')->get();

        return view('admin.akun', compact(
            'pendingPetani', 
            'pendingUsers', 
            'activePetanis', 
            'activeCustomers'
        ));
    }

    /**
     * Fungsi untuk menyetujui (Approve) Petani atau User
     */
    public function approve($id)
    {
        $user = User::findOrFail($id);
        $user->update(['status' => 'active']);

        return redirect()->back()->with('success', 'Pengguna berhasil diverifikasi!');
    }

    /**
     * Fungsi untuk menolak (Reject/Delete) pendaftaran
     */
    public function reject($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('error', 'Permintaan pendaftaran ditolak.');
    }
}