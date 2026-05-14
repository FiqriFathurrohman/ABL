<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    private function adminOnly()
    {
        if (!Auth::user()->hasRole('admin')) abort(403);
    }

    public function dashboard()
    {
        $this->adminOnly();

        $totalPetani   = User::where('role', 'petani')->count();
        $pendingCount  = User::where('status', 'pending')->count();
        $approvedCount = User::where('status', 'approved')->count();
        $rejectedCount = User::where('status', 'rejected')->count();

        $activeFarmers = User::where('status', 'approved')
            ->where('is_active', true)
            ->whereNotNull('latitude')
            ->get();

        return view('panel.dashboard', compact(
            'totalPetani', 'pendingCount', 'approvedCount', 'rejectedCount', 'activeFarmers'
        ));
    }

    public function index()
    {
        $this->adminOnly();

        $pendingUsers  = User::where('status', 'pending')->latest()->get();
        $approvedUsers = User::where('status', 'approved')->where('role', '!=', 'admin')->get();
        $rejectedUsers = User::where('status', 'rejected')->latest()->get();

        return view('panel.manajemen-akun', compact('pendingUsers', 'approvedUsers', 'rejectedUsers'));
    }

    public function approve($id)
    {
        $this->adminOnly();
        User::findOrFail($id)->update(['status' => 'approved', 'is_active' => true]);
        return back()->with('success', 'Akun berhasil disetujui.');
    }

    public function reject($id)
    {
        $this->adminOnly();
        User::findOrFail($id)->update(['status' => 'rejected', 'is_active' => false]);
        return back()->with('success', 'Pendaftaran ditolak.');
    }

    public function toggleStatus($id)
    {
        $this->adminOnly();
        $user = User::findOrFail($id);
        $user->update(['is_active' => !$user->is_active]);
        return back()->with('success', 'Status akun diperbarui.');
    }
}