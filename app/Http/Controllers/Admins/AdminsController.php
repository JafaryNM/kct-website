<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminsController extends Controller
{
    public function dashboard(Request $request){
        if(!Auth::check() && $request->path() != 'admins/login'){
            return redirect('/admins/login');
        }

        if(!Auth::check() && $request->path() == 'admins/login'){
            return view('admins.dashboard');
        }

        return view('admin.dashboard');
    }



    public function loginPage(){
        return view('admin.auth.login');
    }



    public function registerPage(){
        return view('admin.auth.register'); 
    }


    public function forgetPage(){
        return view('admin.auth.forget_password'); 
    }


    public function registerUser(Request $request){
        $this->validate($request, [
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
        
        $password = bcrypt($request->password);

        $user = new User();
        $user->firstName = $request->firstName;
        $user->lastName = $request->lastName;
        $user->email = $request->email;
        $user->password = $password;
        $user->userType = 'Admin';
        if($user->save()){
            return redirect()->route('admins.loginPage');
        }
    }


    public function loginUser(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('admins.loginPage')->withErrors('Incorrect Email or Password! Plese try again');
        }
        else{
            return redirect()->route('admins.dashboard');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('admins.loginPage');
    }

    public function adminList(Request $request){
        if(!Auth::check() && $request->path() != 'admins/login'){
            return redirect('/admins/login');
        }

        // $admins = User::where('userType', '=', 'Admin')->get();
        $admins = User::all();
        
        if(!Auth::check() && $request->path() == 'admins/login'){
            return view('admin.pages.adminsList', compact('admins'));
        }

        return view('admin.pages.adminsList', compact('admins'));
    }


    public function update($id){
        $admins = User::where('id', $id)->get();
        return view('admin.pages.updateAdmins', compact('admins'));
    }

    public function saveAdminUpdate(Request $request, $id){
        $admins = User::find($id);
        $admins->firstName = $request->firstName;
        $admins->lastName = $request->lastName;
        $admins->email = $request->email;
        $admins->save();
        return redirect('admins/admin_list')->withSuccess('success');
    }

    public function adminDelete($id){
        $admins = User::find($id);
        $admins->delete();
        return redirect()->back()->withSuccess('success');
    }
}
