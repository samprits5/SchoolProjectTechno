<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teacher;
use Redirect;

class AdminTeacherController extends Controller
{
    //
    public function index(){
        $tch['tch'] = Teacher::where('del','0')->get();
    	return view('admin.teachers.index',$tch);

    }

    public function create(){
    	return view('admin.teachers.create');
    }

    public function save(Request $req){

        $this->validate($req, [
            'name' => 'required',
            'email' => 'required|email',
            'address' => 'required|max:255',
            'phone' => 'required|numeric',
        ]);

    	$tch = new Teacher();
    	$tch->name = $req->name;
    	$tch->email = $req->email;
    	$tch->address = $req->address;
    	$tch->phone = $req->phone;
    	$tch->password = "sit@123";
    	$tch->save();
    	return redirect::route('passwordTchSend',$tch->id);
    }

    public function delete($id){
    	$tch = Teacher::find($id);
    	$tch->del = "1";
    	$tch->save();
    	return redirect::route('teacher')->with('error', 'Teacher Record Deleted!');
    }
}
