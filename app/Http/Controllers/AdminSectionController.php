<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Section;
use Redirect;
use App\PivotTable;

class AdminSectionController extends Controller
{
    //

    public function index(){

    	$sec['sec'] = Section::where('del','0')->get();

    	return view('admin.section.index', $sec);
    }

    public function create(){
    	return view('admin.section.create');
    }

    public function insert(Request $req){

        $this->validate($req, [
            'section_name' => 'required|max:1',
        ]);

    	$sec = new Section();
    	$sec->name = $req->section_name;
    	$sec->save();
    	return redirect::route('sectionCreate')->with('error', 'Record Inserted!');
    }

    public function delete($id){
        
        $sec= Section::find($id);
        $sec->del = '1';
        $sec->save();
        PivotTable::where('section_id',$id)->delete();

        return redirect::route('section')->with('error', 'Record Deleted!');
    }

}
