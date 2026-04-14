<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Show login page
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Handle login
     */
    public function login(Request $request)
    {
        // VALIDASI
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // ATTEMPT LOGIN
        if (Auth::attempt($request->only('email', 'password'))) {

            // SECURITY (WAJIB)
            $request->session()->regenerate();

            // REDIRECT KE DASHBOARD
            return redirect()->route('dashboard')
                ->with('success', 'Login berhasil!');
        }

        // JIKA GAGAL
        return back()
            ->withErrors([
                'email' => 'Email atau password salah.',
            ])
            ->withInput(); // biar email tetap keisi
    }

    /**
     * Handle logout
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('welcome');
    }
}