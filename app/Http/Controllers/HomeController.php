<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Gallery;
use App\Exam;
use App\Notice;
use App\Result;
use App\Student;
use App\Teacher;
use App\Query;
use App\Contact;
use Redirect;

class HomeController extends Controller
{
    //

    public function index(){

    	if (Session::has('student_id')) {

    		$res = Result::where('student_id',Session::get('student_id'))->get();

    		$notice = Notice::where('del','0')->orderBy('id','desc')->get();
	    	$exm = Exam::where('del','0')->orderBy('id','desc')->get();
	    	$gal = Gallery::where('del','0')->get();
    		$data = ['notice' => $notice, 'exm' => $exm, 'gal' => $gal, 'res'=>$res];

    	} else {

	    	$notice = Notice::where('del','0')->orderBy('id','desc')->get();
	    	$exm = Exam::where('del','0')->orderBy('id','desc')->get();
	    	$gal = Gallery::where('del','0')->get();
	    	$data = ['notice' => $notice, 'exm' => $exm, 'gal' => $gal];
	    }

    	return view('frontend.home.index',$data);
    }

    public function studend_login(){
    	return view('frontend.logins.student_login');
    }

    public function teacher_login(){
    	return view('frontend.logins.teacher_login');
    }

    public function loginStudent(Request $req){

        $this->validate($req, [
            'email' => 'required',
            'password' => 'required',
        ]);

    	$input = $req->all();


        $user = Student::where([['sid', $input['email']], ['password', $input['password']]])->where('del','0')->first();

        if ($user) {

        	session(['student' => $user->name]);
        	session(['email' => $user->email]);
        	session(['student_id' => $user->id]);
        	session(['type' => '0']);
            return redirect::route('root');


        } else {
            return back()->with('error', 'Invalid Credentitals!');
        }
    }

    public function loginTeacher(Request $req) {

        $this->validate($req, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

    	$input = $req->all();


        $user = Teacher::where([['email', $input['email']], ['password', $input['password']]])->first();

        if ($user) {

        	session(['teacher' => $user->name]);
        	session(['email' => $user->email]);
        	session(['teacher_id' => $user->id]);
        	session(['type' => '1']);
            return redirect::route('root');


        } else {
            return back()->with('error', 'Invalid Credentitals!');
        }

    }

    public function logout(){
    	Session::flush();
    	return redirect::route('root')->with('error', 'Logged out successfully!');
    }

    public function query(Request $req) {

        $this->validate($req, [
            'name' => 'required',
            'email' => 'required|email',
            'type' => 'required',
            'phone' => 'required|numeric',
            'msg' => 'required|max:300',
        ]);

    	$q = new Query();
    	$q->name = $req->name;
    	$q->email = $req->email;
    	$q->phone = $req->phone;
    	$q->type = $req->type;
    	$q->msg = $req->msg;
    	$q->save();

    	return redirect::route('root')->with('q', 'Messege Sent!');
    }


    public function contact(Request $req) {

        $this->validate($req, [
            'name' => 'required',
            'email' => 'required|email',
            'msg' => 'required|max:300',
        ]);

    	$con = new Contact();
    	$con->name = $req->name;
    	$con->email = $req->email;
    	$con->msg = $req->msg;
    	$con->save();

    	return redirect::route('rootcontact')->with('con', 'Messege Sent!');
    	
    }
}
