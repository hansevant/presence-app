<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    protected $judul;

    public function __construct()
    {
        $this->judul = "Login - Presence App";
    }

    public function index(){
        return view('index', ['judul' => $this->judul]);
    }
    
    public function login(Request $request){

        $validator = Validator::make($request->all(), [
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput()->with('error', 'Harap isi semua field.');
        }

        $credentials = $request->only('username', 'password');
        $credentials['username'] = strtolower($credentials['username']);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            session(['role' => $user->role]);
            return redirect()->route('presence')->with('success', 'Login berhasil!');
        }
        return back()->withInput()->with('error', 'Username atau password salah.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->flush();
        return redirect()->route('login');
    }
}
