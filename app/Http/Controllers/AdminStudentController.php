<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\AdminMailController;
use App\Student;
use App\SClass;
use Redirect;
use DB;

class AdminStudentController extends Controller
{
    public function index(){

    	$cls['cls'] = SClass::where('del','0')->get();

    	return view('admin.student.index', $cls);

    }
    public function upload(){

    	return view('admin.student.upload');

    }

    public function create(){

    	$uid = $this->generate_sid();

    	$arr = explode("0", $uid);

        $num = (int) $arr[count($arr) - 1];

        $num = $num + 1;

        $n = str_pad($num, 3, '0', STR_PAD_LEFT);

        $std['std'] = "SIT" . $n;

        $cls['cls'] = SClass::where('del','0')->get();

    	return view('admin.student.create', $std, $cls);

    }

    public function fetchStudents(Request $req){

        $cls = SClass::find($req->id)->name;

        $sec = $req->sec;

        $std = Student::where('class',$cls)->where('section',$sec)->get();

        $totalData = [];

        foreach ($std as $key) {
            $data[] = $key->id;
            $data[] = $key->sid;
            $data[] = $key->name;
            $data[] = $key->email;
            $data[] = $key->phone;
            $totalData[] = $data;
            unset($data);
        }
        return $totalData;
    }

    public function getSections(Request $req){

    	$cls = SClass::find($req->id);

    	$data = $cls->sections()->get();

    	foreach ($data as $key) {
    		$arr[] = $key->name;
    	}

    	return $arr;
    
    	// return $_POST['id'];
    }


    public function insert(Request $req){


        $this->validate($req, [
            'sid' => 'required',
            'student_name' => 'required',
            'email' => 'required|email',
            'address' => 'required|max:255',
            'phone' => 'required|numeric',
            'class' => 'required|max:2',
            'section' => 'required|max:2',
            'student_g_name' => 'required|max:50',
            'g_phone' => 'required|numeric',
        ]);

    	$cls = SClass::find($req->class)->name;

    	$std = new Student();

    	$std->sid = $req->sid;
    	$std->name = $req->student_name;
    	$std->email = $req->email;
    	$std->address = $req->address;
    	$std->phone = $req->phone;
    	$std->password = "pass@123";
    	$std->class = $cls;
    	$std->section = $req->section;
    	$std->guardian_name = $req->student_g_name;
    	$std->guardian_phone = $req->g_phone;
    	$std->save();

        return redirect::route('passwordSend', $std->id);
    }

    public function uploaddb(Request $request){

        $this->validate($request, [
            'file' => 'required|mimes:xlsx,xls|max:2048',
        ]);

    	if($request->hasFile('file')){

            $path = $request->file('file')->getRealPath();

            $data = \Excel::load($path)->get();

            $last_sid = $this->generate_sid();

            $arr = explode("0", $last_sid);

            $num = (int) $arr[count($arr) - 1];

            for ($i=0; $i < $data->count(); $i++) { 

            	$num = $num + 1;

            	$n = str_pad($num, 3, '0', STR_PAD_LEFT);

        		$uid[] = "SIT" . $n;
            }

            if($data->count()){

            	$i = 0;

                foreach ($data as $key => $value) {

                    $arr2[] = ['sid' => $uid[$i], 'name' => $value->name, 'email' => $value->email, 'address' => $value->address, 'phone' => $value->phone, 'guardian_name' => $value->guardian_name, 'guardian_phone' => $value->guardian_phone, 'password' => 'pass@123'];

                    $i++;

                }

                if(!empty($arr2)){

                    \DB::table('students')->insert($arr2);
                    return redirect::route('students')->with('error', 'All Records Inserted! Default Password is "pass@123" for students.');
                } else {
                	return redirect::route('studentUpload')->with('error', 'Your file was empty!');
                }
            }
        } else {
        return redirect::route('studentUpload')->with('error', 'No file choosen!');
    	}
    }


    public function downloadExcel(){

        $students = Student::get()->toArray();
        return \Excel::create('students', function($excel) use ($students) {
            $excel->sheet('sheet1', function($sheet) use ($students)
            {
                $sheet->fromArray($students);
            });
        })->download();

    }

    public function generate_sid(){

    	$res = Student::orderBy('id','desc')->first();

    	if (!empty($res)) {

    		$uid = $res->sid;

        } else {

            $uid = "SIT001";
        }

        return $uid;
    }


    public function delete($id){
        $std = Student::find($id);
        $std->del = '1';
        $std->save();
        return redirect::route('student')->with('error', 'Record Deleted!');
    }

}
