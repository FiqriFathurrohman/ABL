<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        // 1. Simpan data ke database
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user', 
            'status' => 'pending', 
            'is_active' => false, 
        ]);

        // 2. JANGAN GUNAKAN Auth::login($user) di sini.
        // Langsung redirect ke login dengan pesan notifikasi.
        return redirect()->route('login')->with('success', 'Data Anda dalam pengecekan. Mohon tunggu persetujuan Admin sebelum dapat masuk ke sistem.');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Cek status ACC dari Admin
            if ($user->status !== 'approved' || !$user->is_active) {
                Auth::logout();
                return back()->withErrors(['email' => 'Akun Anda sedang dalam pengecekan atau belum di-ACC oleh Admin.']);
            }

            $request->session()->regenerate();
            
            if ($user->hasRole('admin')) {
                return redirect()->intended('/admin');
            }
            return redirect()->intended('dashboard');
        }

        return back()->withErrors(['email' => 'Email atau password salah.']);
    }
}