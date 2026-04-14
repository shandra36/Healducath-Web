<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // ✅ VALIDASI
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed'
        ]);

        // ✅ CREATE USER
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']) // 🔥 WAJIB
        ]);

        // ❗ OPTIONAL (kalau mau auto login, tapi kita skip dulu)
        // Auth::login($user);

        // ✅ REDIRECT KE LOGIN
        return redirect()->route('login')
            ->with('success', 'Akun berhasil dibuat, silakan login.');
    }
}