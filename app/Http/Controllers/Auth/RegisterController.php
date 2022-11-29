<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Model\Customer;
use App\User;
use Illuminate\Http\Request;


class RegisterController extends Controller
{
    public function customerSignUp(Request $request){
        $this->validate($request, [
            'firstName' => 'required',
            'lastName' => 'required',
            'phoneNumber' => 'required',
            'address' => 'required',
            'email' => 'required|email|unique:customers',
            'password' => 'required|min:6',
            'confirmPassword' => 'required|min:6',
            'gender' => 'required',
        ]);

        if($request->password != $request->confirmPassword){
            return back()->withErrors('The password does not match! try again');
        }

        $password = bcrypt($request->password);

        $customers = new User();
        $customers->firstName = $request->firstName;
        $customers->lastName = $request->lastName;
        $customers->phoneNumber = $request->phoneNumber;
        $customers->address = $request->address;
        $customers->userType = 'customer';
        $customers->email = $request->email;
        $customers->city = $request->city;
        $customers->password = $password;
        $customers->gender = $request->gender;
        $customers->save();
        return redirect('customers/login');
        
    }
}