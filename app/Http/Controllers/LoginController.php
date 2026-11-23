<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //regresar vista
        return view('login.index');
    }

    public function login(Request $request)
    {
        //validamos
        $credentials = $request->validate([
            'login' => ['required', 'string'],
            'password' => ['required']
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();
            if ($user->role === 'administrador') {
                return redirect()->route('admins.index');
            } elseif ($user->role === 'administrativo') {
                return redirect()->route('administrativos.index');
            } else {
                return redirect()->route('mecanicos.index');
            }
        }

        return back()->withErrors([
            'errors' => 'Usuario inexistente',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
