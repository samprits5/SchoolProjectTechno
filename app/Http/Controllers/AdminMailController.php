<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Teacher;
use App\Notice;
use Mail;
use Redirect;

class AdminMailController extends Controller
{
    //

    public function std_password_send($id){

		$user = Student::find($id);

      	$data = ['user' => $user];

      try {
	      Mail::send('mail.passwordSend', $data, function($m) use ($user) {
	         $m->to($user->email, $user->name)->subject
	            ('Password to Log In!');
	         $m->from('sitschool4@gmail.com','SIT School');
	      });

	      return redirect::route('student')->with('error', 'Record Added! Default Pass : "pass@123", Mail Sent!!');
	  	} catch(Exception $e){
	      return redirect::route('student')->with('error', 'Record Added! Default Pass : "pass@123", Mail not Sent!!');
	  }

   }


   public function tch_password_send($id){

		$user = Teacher::find($id);

      	$data = ['user' => $user];

      try {
	      Mail::send('mail.passwordSend', $data, function($m) use ($user) {
	         $m->to($user->email, $user->name)->subject
	            ('Password to Log In!');
	         $m->from('sitschool4@gmail.com','SIT School');
	      });

	      return redirect::route('teacher')->with('error', 'Record Added! Default Pass : "sit@123", Mail Sent!!');
	  	} catch(Exception $e){
	      return redirect::route('teacher')->with('error', 'Record Added! Default Pass : "sit@123", Mail not Sent!!');
	  }

   }

   public function notice_all($id){
   		$notice = Notice::find($id);
   		$std = Student::where('del','0')->get();
   		$tch = Teacher::where('del','0')->get();

   		foreach ($std as $key) {
   			$email[] = $key->email;
   		}

   		foreach ($tch as $key) {
   			$email[] = $key->email;
   		}


   		foreach ($email as $e) {
		   	$data = ['notice' => $notice, 'email' => $e];

		      try {
			      Mail::send('mail.notice', $data, function($m) use ($email) {
			         $m->to($email)->subject
			            ('Password to Log In!');
			         $m->from('sitschool4@gmail.com','SIT School');
			      });

			      return redirect::route('notice')->with('error', 'Notice Added! Mail Sent!');
			  	} catch(Exception $e){
			      return redirect::route('notice')->with('error', 'Notice Added! but Mail Not Sent!');
			  }

			  unset($data);
   		}

   }

   public function notice_students($id){

   		$notice = Notice::find($id);
   		$std = Student::where('del','0')->get();

   		foreach ($std as $key) {
   			$email[] = $key->email;
   		}


   		foreach ($email as $e) {
		   	$data = ['notice' => $notice, 'email' => $e];

		      try {
			      Mail::send('mail.notice', $data, function($m) use ($email) {
			         $m->to($email)->subject
			            ('Password to Log In!');
			         $m->from('sitschool4@gmail.com','SIT School');
			      });

			      return redirect::route('notice')->with('error', 'Notice Added! Mail Sent!');
			  	} catch(Exception $e){
			      return redirect::route('notice')->with('error', 'Notice Added! but Mail Not Sent!');
			  }

			  unset($data);
   		}
   	
   }

   public function notice_teachers($id){
   		
   		$notice = Notice::find($id);

   		$tch = Teacher::where('del','0')->get();

   		foreach ($tch as $key) {
   			$email[] = $key->email;
   		}


   		foreach ($email as $e) {
		   	$data = ['notice' => $notice, 'email' => $e];

		      try {
			      Mail::send('mail.notice', $data, function($m) use ($email) {
			         $m->to($email)->subject
			            ('Password to Log In!');
			         $m->from('sitschool4@gmail.com','SIT School');
			      });

			      return redirect::route('notice')->with('error', 'Notice Added! Mail Sent!');
			  	} catch(Exception $e){
			      return redirect::route('notice')->with('error', 'Notice Added! but Mail Not Sent!');
			  }

			  unset($data);
   		}
   }

}
