<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function gotoLogin(){
        return view('login');
    }

    public function checkUserEmail(Request $request){

        $userEmail = $request->username;

        $request->validate([
            'username' => 'required'
        ]);

        // Check if email exist
        $checkEmail = User::where('email', $userEmail)->first();

        if(!$checkEmail){
            return back()->with('error', 'Invalid username or email address.');
        }

        return view('components.login-pass', ['userEmail' => $userEmail]);
    }

    public function loginUser(){

    }

}
