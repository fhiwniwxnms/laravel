<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function create()
    {
        return view('auth.signin');
    }

    public function registration(Request $data)
    {
        $validated = $data->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required',
        ]);
        return response()->json($validated);
    }
}
