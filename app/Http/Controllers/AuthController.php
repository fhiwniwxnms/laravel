<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;

class AuthController extends Controller
{
    public function create()
    {
        return view('auth.signin');
    }

    public function registration(Request $data)
    {
        $validated = $data->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:8',
        ]);

        $role = Role::where('name', 'reader')->firstOrFail();

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role_id' => $role->id,
        ]);

        return redirect()->route('login');
    }

    public function loginForm() 
    {
        return view('auth.login');
    }

    public function login(Request $data) 
    {
        $validated = $data->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $validated['email'])->first();
        if (!$user || !Hash::check($validated['password'], $user->password)) {
            return back()->withErrors([
                'email' => 'Неверный email или пароль',
            ])->onlyInput('email');
        }
        $token = $user->createToken('auth_token')->plainTextToken;
        Auth::login($user);
        $data->session()->regenerate();

        return redirect('/');
    }    

    public function logout(Request $data)
    {
        $user = $data->user();
        $user->tokens()->delete();
        Auth::guard('web')->logout();
        $data->session()->invalidate();
        $data->session()->regenerateToken();
        return redirect('/');
    }
}
