<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Query;
use Redirect;

class AdminQueryController extends Controller
{
    //

    public function index(){
    	$q['q'] = Query::where('del','0')->orderBy('id','desc')->get();
    	return view('admin.queries.index',$q);
    }

    public function delete($id){
    	$q = Query::find($id);
    	$q->del = '1';
    	$q->save();
    	return redirect::route('query')->with('error', 'Record Deleted!');
    }
}
