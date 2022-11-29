<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function SignIn(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(!Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return back()->withErrors('Incorrect Email or Password! Plese try again');;
        }
        else{
            return redirect('/');
        }
    }

    public function logoutCustomer(){
        Auth::logout();
        return redirect('/');
    }

}