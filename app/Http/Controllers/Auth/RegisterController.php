<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'mobile' => 'required|unique:users,mobile',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'mobile' => $request->mobile,
            'password' => Hash::make($request->password),
            //'role' => $request->role
        ]);

        Auth::login($user);

        return redirect()->route('dashboard');
    }

}
