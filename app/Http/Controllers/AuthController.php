<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function login()
    {
        if (Auth::check()) {
            switch (Auth::user()->peran_id) {
                case 1:
                    return redirect('/admin/dashboard');
                    break;
                case 2:
                    return redirect('/pegawai/dashboard');
                    break;
            }
        }
        return view('pages.auth.login', [
            'title' => 'Login'
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = request()->validate([
            'nama_pengguna' => 'required',
            'password' => 'required',
            'g-recaptcha-response' => 'required'
        ]);

        if (Auth::attempt([
            'nama_pengguna' => $credentials['nama_pengguna'],
            'password' => $credentials['password']
        ])) {
            $request->session()->regenerate();

            return redirect()->intended('/login');
        }

        return back()->with('gagal', 'Login gagal.');
    }

    public function register()
    {
        return view('pages.auth.register', [
            'title' => 'Register'
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|min:3|max:255',
            'nama_pengguna' => 'required|min:8|max:255|unique:users,nama_pengguna',
            'password' => 'required|min:8|max:255',
            'konfirmasi_password' => 'required|same:password',
            'g-recaptcha-response' => 'required'
        ]);

        $userData = $request->except(['password', 'konfirmasi_password', 'g-recaptcha-response']);
        $userData['peran_id'] = 2;
        $userData['password'] = Hash::make($request->password);

        User::create($userData);

        return redirect('/login')->with('berhasil', 'Registrasi berhasil, silahkan login.');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
