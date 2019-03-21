<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use Redirect;

class AdminContactController extends Controller
{
    //

    public function index(){
    	$q['q'] = Contact::where('del','0')->orderBy('id','desc')->get();
    	return view('admin.contact.index',$q);
    }

    public function delete($id){
    	$q = Contact::find($id);
    	$q->del = '1';
    	$q->save();
    	return redirect::route('contact')->with('error', 'Record Deleted!');
    }
}
