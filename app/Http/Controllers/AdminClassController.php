<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Section;
use App\SClass;
use Redirect;

class AdminClassController extends Controller
{
    //

    public function index(){
        $sec['cls'] = SClass::with('sections')->where('del','0')->get();
        
        // foreach ($sec['cls'] as $key) {
        //     echo $key->name;
        //     foreach ($key->sections as $s) {
        //         echo $s->name;
        //     }
        // }
        
    	return view('admin.classes.index', $sec);
    }

    public function create(){
    	$sec['sec'] = Section::where('del','0')->get();
    	return view("admin.classes.create", $sec);
    }

    public function insert(Request $req){

        $this->validate($req, [
            
            'class_name'=>'required|numeric|max:2',
            'sections'=>'required',
        ]); 

        $cls = new SClass();

        $cls->name = $req->class_name;

        $cls->save();

        $cls->sections()->attach($req->sections);

        return redirect::route('classCreate')->with('error', 'Record Inserted!');
    }


    public function edit($id){

        $cls['cls'] = SClass::with('sections')->where('id',$id)->get();
        $sec['sec'] = Section::where('del','0')->get(); 
        return view("admin.classes.edit", $cls, $sec);

    }

    public function update($id, Request $req){

        $this->validate($req, [
            
            'class_name'=>'required|numeric|max:3',
            'sections'=>'required',
        ]); 
        
        $cls = SClass::find($id);

        $cls->name = $req->class_name;

        $cls->save();

        $cls->sections()->detach();

        $cls->sections()->attach($req->sections);

        return redirect::route('class')->with('error', 'Record Updated!');

    }

    public function delete($id){
        $cls = SClass::find($id);
        $cls->del = '1';
        $cls->save();
        return redirect::route('class')->with('error', 'Record Deleted!');
    }

   //  public function fetch(){

   //  	$cls = Section::find(1)->class()->get();

			// foreach ($cls as $key) {
			// 	echo $key->name."<br>";
			// }
   //  }
}
