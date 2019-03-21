<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SClass;
use App\Exam;
use Redirect;

class AdminExamController extends Controller
{
    //

    public function index(){

    	$exm['exm'] = Exam::where('del','0')->get();
    	return view('admin.exam.index',$exm);
    }

    public function upload(){

    	$cls['cls'] = SClass::where('del','0')->get();

    	return view('admin.exam.upload', $cls);
    }

    public function uploadExam(Request $req){


        $this->validate($req, [
            'cls' => 'required',
            'sec' => 'required',
            'exam_name' => 'required|max:150',
            'file' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);



        if($req->hasFile('file') && !empty($req->class) && !empty($req->section) && !empty($req->exam_name)){

        	$cls = SClass::find($req->class)->name;

        	$sec = $req->section;

        	$exm = new Exam();

        	$exm->class = $cls;
        	$exm->section = $sec;
        	$exm->title = $req->exam_name;
        	$exm->path = "null";
        	$exm->save();

        	$id = $exm->id;
        	$f = $req->file('file');
            $name = $id . "-" . time() . '.' . $f->getClientOriginalExtension();

            $destinationPath = public_path('/uploads');
            $f->move($destinationPath, $name);

            $path = "/uploads/" . $name;
            $exm->path = $path;
            $exm->save();

            return redirect::route('exam')->with('error', 'Record Inserted!');



        } else {

        	return redirect::route('examUpload')->with('error', 'Enter all details properly!!');
        }

    }


    public function delExam($id){
        $exm = Exam::find($id);

        $exm->del = '1';

        $exm->save();

        return redirect::route('exam')->with('error', 'Record Deleted!');
    }
}
