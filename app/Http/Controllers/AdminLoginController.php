<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Redirect;
use Auth;
use Session;

class AdminLoginController extends Controller
{
    //

    public function index() {
    	return view('admin.login.login');
    }

    public function login(Request $req){

        $this->validate($req, [
            'username' => 'required|email',
            'password' => 'required',
        ]);

    	$input = $req->all();


        $user = User::where([['email', $input['username']], ['password', $input['password']]])->first();

        if ($user) {

        	session(['user' => $user->name]);
            return redirect::route('dashboard');


        } else {
            return back()->with('error', 'Invalid Credentitals!');
        }
    }

    public function dashboard(){

    	return view('admin.login.dashboard');
    }

    public function logout(){
    	Session::flush();
    	return redirect::route('adminIndex')->with('error', 'Logged out successfully!');
    }
}
