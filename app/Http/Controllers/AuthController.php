<?php

namespace App\Http\Controllers;

use App\Models\Kunjungan;
use App\Models\Poli;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('landingpage.index',[
            'title' => 'Home',
            'infos' => Kunjungan::with('poli')->get(),
            'polis' => Poli::with('kunjungans')->get(),
            'kunjungans' => Kunjungan::where('isActive','1')->with(['pasien', 'poli','pelayanan'])->get(),
        ]);
    }

    public function login()
    {
        return view('templates.login', [
            'title' => 'Login'
        ]);
    }

    public function store_login(Request $request)
    {
        $credentials = $request->validate([
            'email'  => 'required|email:dns',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            $user = Auth::user()->role_id;
            if($user === 1 || $user === 2)
            {
                return redirect()->intended('/dashboard')->with('success', 'Selamat datang!');
            }
            elseif($user === 3)
            {
                return redirect()->intended('/')->with('success', 'Selamat datang!');

            }
        }

        return back()->with('danger', 'Gagal untuk login!');
    }

    public function register()
    {
        return view('templates.register', [
            'title' => 'Register'
        ]);
    }

    public function store_register(Request $request)
    {
        $requestData = $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users|min:5|max:16',
            'email' => 'required|unique:users|email:dns',
            'password' => 'required'
        ]);

        $requestData['password'] = Hash::make($requestData['password']);
        $requestData['role_id'] = 3;
        User::create($requestData);

        return redirect('/login')->with('success', 'Registrasi berhasil! Silahkan Login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('info', 'Selamat tinggal dan sampai jumpa!');
    }
}
