<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;
use Redirect;

class AdminSettingsController extends Controller
{
    //
    public function index(){

    	$gal['gal'] = Gallery::where('del','0')->get();

    	return view('admin.settings.index', $gal);
    }

    public function upload(){
    	return view('admin.settings.upload');
    }

    public function uploadFile(Request $req){

        $this->validate($req, [
            'name' => 'required|max:50',
            'file' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($req->hasFile('file')) {

        	$gal = new Gallery();

	        $gal->name = $req->name;

	        $gal->path = "null";

	        $gal->save();

            $id = $gal->id;

            $image = $req->file('file');
            $name = $id . "-" . time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/galleries');
            $image->move($destinationPath, $name);

            $path = "/galleries/" . $name;
            $gal->path = $path;
            $gal->save();


            return redirect::route('settings')->with('error', 'Image Added!');

        }
    }

    public function delete($id){
        $gal = Gallery::find($id);
        $gal->del = '1';
        $gal->save();
        return redirect::route('settings')->with('error', 'Image Deleted!');
    }
}
