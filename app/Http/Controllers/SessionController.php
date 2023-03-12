<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function gotoLogin(){
        return view('login');
    }

    public function checkUserEmail(Request $request){
        $userEmail = $request->username;

        $request->validate([
            'username' => 'required',
        ]);

        // Check if email exist
        $checkEmail = User::where('email', $userEmail)->first();

        if(! $checkEmail){
            return back()->with('error', 'Invalid username or email address.');
        }

        auth()->login($checkEmail);
        return redirect()->route('loginPass');

    }

    public function loginPass(){
        return view('components.login-pass');
    }

    public function loginUser(Request $request){
        $userCredentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if(! Auth::attempt($userCredentials)){
            return back()->with('error', 'Login failed');
        }

        session()->regenerate();
        return redirect()->route('home');
    }

    public function destroy(){
        auth()->logout();
        return redirect('/');
    }

}
