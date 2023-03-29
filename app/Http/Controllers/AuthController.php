<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    //REGISTER CONTROLLER
    public function showRegister()
    {
        if (Auth::check() && auth()->user()->type == 'admin') {
            return redirect('/students');
        } elseif (Auth::check() && auth()->user()->type == 'user') {
            return redirect('/verstu');
        }
        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {
        $user = User::create($request->validated());

        $path = $user['email'];
        Storage::disk('local')->makeDirectory($path);
        
        return redirect('/login')->with('success', 'Account created succesfully');
    }

    //LOGIN CONTROLLLER
    //COMPROBACIÓN
    public function showLogin()
    {
        if (Auth::check() && auth()->user()->type == 'admin') {
            return redirect('/students');
        } elseif (Auth::check() && auth()->user()->type == 'user') {
            return redirect('/verstu');
        }
        return view('auth.login');
    }

    //INICIO DE SESIÓN
    public function login(LoginRequest $request)
    {
        $credentials = $request->getCredentials();

        if (!Auth::validate($credentials)) {
            return redirect()->to('/login')->withErrors('Login failed');
        }
        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        Auth::login($user);

        if (auth()->user()->type == 'admin') {
            return redirect()->to('/students');
        } elseif (auth()->user()->type == 'user') {
            return redirect()->to('/verstu');
        } else {
            return redirect()->to('/login')->withErrors('Login failed');
        }
    }

    //LOGOUT CONTROLLER
    public function logout()
    {
        Session::flush();

        Auth::logout();

        return redirect()->to('/login');
    }
}
