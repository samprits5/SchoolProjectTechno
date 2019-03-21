<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Redirect;

class AdminUserController extends Controller
{
     public function index(){
        $usr['usr'] = User::where('del','0')->get();
    	return view('admin.users.index', $usr);

    }
     public function create(){
    	return view('admin.users.create');
    }

     public function save(Request $req){

        $this->validate($req, [
            'user_name' => 'required',
            'user_email' => 'required|email',
            'user_password' => 'required',
        ]);
        	$sec=new User();
        	$sec->name=$req->user_name;
        	$sec->email=$req->user_email;
        	$sec->password=$req->user_password;
        	$sec->save();
        	return redirect::route('userindex')->with('error', 'Record Inserted!!');
        }

    public function delete($id){
        $usr = User::find($id);
        $usr->del = "1";
        $usr->save();
        return redirect::route('userindex')->with('error', 'Record Deleted!!');
    }
    
}
