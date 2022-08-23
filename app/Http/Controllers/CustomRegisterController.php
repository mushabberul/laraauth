<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisterStoreRequest;

class CustomRegisterController extends Controller
{
    public function showFormRegister()
    {
        return view('custom-auth/register');
    }

    public function registerUser(RegisterStoreRequest $requert)
    {
        // dd($requert->all());
        User::create([
            'name'=>$requert->name,
            'email'=>$requert->email,
            'phone'=>$requert->phone,
            'password'=>Hash::make( $requert->password),
        ]);

        $credantials = [
            'email'=>$requert->email,
            'password'=>$requert->password,
        ];
        if(Auth::attempt($credantials)){
            $requert->session()->regenerate();
            return redirect()->intended('home');
        }

        return back()->withErrors([
            'email'=>'Email is wrong!'
        ])->onlyInput('email');
    }

    public function showFormLogin()
    {
        return view('custom-auth.login');
    }
    public function showUser(LoginUserRequest $requert)
    {
        $credantials = [
            'email'=>$requert->email,
            'password'=>$requert->password,
        ];
        if(Auth::attempt($credantials,$requert->filled('remember'))){
            $requert->session()->regenerate();
            return redirect()->intended('home');
        }
        return back()->withErrors([
            'email'=>'This email is not register',
        ])->onlyInput('email');
    }


    public function logout(Request $requert)
    {
        Auth::logout();

        $requert->session()->invalidate();
        $requert->session()->regenerateToken();

        return redirect()->route('login');

    }
}
