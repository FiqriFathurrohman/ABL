<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAccountController extends Controller
{
    // Proses Login untuk Petani
    public function loginUser(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            // Kalau admin nyasar ke portal petani, tolak
            if (Auth::user()->hasRole('admin')) {
                Auth::logout();
                return back()->withErrors(['email' => 'Gunakan halaman login admin.']);
            }

            $request->session()->regenerate();
            return redirect()->intended(route('dashboard'));
        }

        return back()->withErrors(['email' => 'Kredensial tidak ditemukan.']);
    }
}