<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create(){
        return view('components.create');
    }
    public function store(RegisterRequest $request){
        $userCredentials = $request->validated();
        $userCredentials['password'] = bcrypt($userCredentials['password']);
        $user = User::create($userCredentials);
        auth()->login($user);
        return redirect('login')->with('success', 'Registration successful.');
    }
}
