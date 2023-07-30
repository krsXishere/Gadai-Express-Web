<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthWEBController extends Controller
{
    public function index()
    {
        if ($user = Auth::user()) {
            return view('login');
        } else {
            return view('login');
        }
    }

    public function login(Request $request)
    {
        Session::flash('email', $request->email);
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        // $credential = $request->only('email', 'password');

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            // $user = Auth::user();
            // dd($user->level_id);

            return redirect()->route('kategori');
        }

        return back()->withErrors([
            'password' => 'Username atau password salah',
        ])->onlyInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
