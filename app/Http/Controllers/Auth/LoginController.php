<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'mobile' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
//            return redirect()->route('dashboard');
            $user = auth()->user();
            if ($user->isAdmin()) {
                return redirect()->route('dashboard'); // e.g., view all members
            }
            return redirect()->route('members.create'); // or to edit their member if already exists
        }

        return back()->withErrors([
            'mobile' => 'Invalid credentials.',
        ]);
    }

}
