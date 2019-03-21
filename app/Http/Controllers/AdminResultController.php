<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Result;
use App\Exam;
use Redirect;

class AdminResultController extends Controller
{
    public function index(){

        $exm['exm'] = Exam::all();
        
    	return view('admin.result.index', $exm);
    }

    public function downloadExcel(){

    	$result = Result::get()->toArray();

        return \Excel::create('result', function($excel) use ($result) {
            $excel->sheet('sheet1', function($sheet) use ($result)
            {
                $sheet->fromArray($result);
            });
        })->download();
    }

    public function upload(){
        $exm['exm'] = Exam::all();
        return view('admin.result.upload', $exm);
    }

    public function uploaddb($id,Request $request){

        $this->validate($req, [
            'file' => 'required|mimes:xlsx,xls|max:2048',
        ]);

        if($request->hasFile('file') && !empty($request->exam)){

            $path = $request->file('file')->getRealPath();

            $data = \Excel::load($path)->get();

            if($data->count()){

                foreach ($data as $key => $value) {

                    $arr2[] = ['student_id' => $value->student_id, 'student_sid' => $value->student_sid, 'exam_id' => $request->exam, 'percent' => $value->percent, 'grade' => $value->grade];
                }

                if(!empty($arr2)){

                    \DB::table('result')->insert($arr2);
                    return redirect::route('result')->with('error', 'All Records Inserted! Results are live Now!');
                } else {
                    return redirect::route('resultUpload')->with('error', 'Your file was empty!');
                }

            }
        }   

    }

    public function fetchResults(Request $req){

        $std = Result::with('student')->where('exam_id',$req->exam)->where('del','0')->get();

        if (count($std) <= 0) {
            return 0;
        }

        foreach ($std as $key) {

            $data[] = $key->id;
            $data[] = $key->student_sid;
            $data[] = $key->student->name;
            $data[] = $key->percent;
            $data[] = $key->grade;
            $totalData[] = $data;
            unset($data);
        }
        return $totalData;

    }

    public function delete($id){

        $res = Result::find($id);

        $res->del = '1';

        $res->save();

        return redirect::route('result')->with('error', 'Record Deleted!');

    }

    public function edit($id){
        
        $res['cls'] = Result::find($id)->with('student')->with('exam')->get();

        return view('admin.result.edit', $res);
    }


    public function update($id, Request $req){

        $this->validate($req, [
            'percent' => 'required',
            'grade' => 'required',
        ]);

        $res = Result::find($id);

        $res->percent = $req->percent;
        $res->grade = $req->grade;
        $res->save();

        return redirect::route('result')->with('error', 'Record Updated!');
    }
}
