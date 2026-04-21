<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\ValidationException;

class PetaniAuthController extends Controller
{
    /**
     * Tampilkan Form Registrasi
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Proses Registrasi Petani Baru
     */
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'required|string',
            'land_area' => 'required|numeric',
            'g-recaptcha-response' => 'required|captcha', 
        ], [
            'g-recaptcha-response.required' => 'Mohon selesaikan captcha terlebih dahulu.',
            'g-recaptcha-response.captcha' => 'Captcha tidak valid.',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'petani',
            'status' => 'active', 
            'phone' => $request->phone,
            'commodity' => $request->commodity,
            'land_area' => $request->land_area,
            'harvest_avg' => $request->harvest_avg,
            'harvest_count' => $request->harvest_count,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('verification.notice');
    }

    /**
     * Tampilkan Form Login (Ini yang tadi hilang)
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Proses Login
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->remember)) {
            $request->session()->regenerate();

            return redirect()->intended('/dashboard');
        }

        throw ValidationException::withMessages([
            'email' => 'Email atau kata sandi yang Anda masukkan salah.',
        ]);
    }

    /**
     * Proses Logout
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}