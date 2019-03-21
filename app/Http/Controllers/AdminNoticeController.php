<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notice;
use Redirect;

class AdminNoticeController extends Controller
{
    //

    public function index(){

    	$notice['notice'] = Notice::where('del','0')->get()	;

    	return view('admin.notice.index', $notice);
    }

    public function create(){

    	$res = Notice::orderBy('id','desc')->first();

    	if (!empty($res)) {

    		$temp = $res->nid;

            $arr = explode("0", $temp);


            $value = $arr[count($arr) - 1] + 1;


            $num = str_pad($value, 3, '0', STR_PAD_LEFT);

            $uid['uid'] = "SITN" . $num;

        } else {

            $uid['uid'] = "SITN001";
        }

    	return view('admin.notice.create', $uid);
    }


    public function insert(Request $req){

        $this->validate($req, [
            'nid' => 'required',
            'title' => 'required|max:100',
            'notice' => 'required|max:500',
        ]);

        $notice  = new Notice();

        if ($req->imp == "on") {

            if ($req->cat == "0") {
                $this->noticeInsert($req,$notice);
                return redirect::route('noticeAll',$notice->id);
            } elseif ($req->cat == "1") {
                $this->noticeInsert($req,$notice);
                return redirect::route('noticeStudents',$notice->id);
            } elseif ($req->cat == "2") {
                $this->noticeInsert($req,$notice);
                return redirect::route('noticeTeachers',$notice->id);
            } else {

                return back()->with('error', 'Please select one category for Imp Notice!');

            }
            
        } else {
            $this->noticeInsert($req,$notice);
            return redirect::route('notice')->with('error', 'Notice Added!');
        }
    }	

    public function delete($id){

    	$notice = Notice::find($id);
    	$notice->del = '1';
    	$notice->save();

    	return redirect::route('notice')->with('error', 'Record Deleted!');
    }

    public function show($id){

        $notice['notice'] = Notice::find($id);

        return view('admin.notice.show', $notice);


    }

    public function noticeInsert($req, $notice) {

        $notice->nid = $req->nid;
        $notice->title = $req->title;
        $notice->notice = $req->notice;
        $notice->save();
    }
}
