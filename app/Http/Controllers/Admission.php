<?php

namespace App\Http\Controllers;
use Redirect;
use Illuminate\Http\Request;
use App\User;
use App\sq;
use App\social_question;
use App\Subject;
use App\Student;
use App\socials;
use App\Clas;
use App\Http\Requests;
use App\Question ;
use Auth;
use DB;

class Admission extends Controller
{
    public function ListClass(){
		$classes=  Auth::user()->classes;
		
		return view('admin.class' , compact('classes'));
	}
	 public function AddClass(Request $request , User $user){
		 $class = new Clas;
		 $class->user_id = Auth::user()->id;
		 $class->name = $request->clas;
         $class->save();
		 return back();
}
 public function SaveClass(Request $request , User $user){
		 $id= $request->id;
	 $class = Clas::find($id);
		 $class->user_id = Auth::user()->id;
		 $class->name = $request->name;
         $class->save();

}
 public function DeleteClass(Request $request , User $user){
		 $id= $request->id;
	 $class = Clas::find($id);
		$class->delete();

}
	 public function CancelClass(Request $request , User $user){
		 $id= $request->id;
	 $class = Clas::find($id);
		echo json_encode($class);

}
	public function ListSubjects(){
		$subject = Auth::user()->subjects;
		return view('admin.subject' , compact('classes' , 'subject'));
	}
		public function AddSubjects(Request $request){
			$subject = new Subject;
		     $subject->name = $request->sub;
	$subject->user_id = Auth::user()->id;
	$subject->save();
		return back();
	}
	public function SaveSubject(Request $request){
		 $id= $request->id;
	 $subject = Subject::find($id);
		 $subject->name = $request->name;
         $subject->save();
}
	 public function DeleteSubject(Request $request , User $user){
		 $id= $request->id;
	 $subject = Subject::find($id);
		$subject->delete();

}
		 public function CancelSubject(Request $request , User $user){
		 $id= $request->id;
	 $subject = Subject::find($id);
		echo json_encode($subject);

}
	 public function ListStudents(Request $request){
		$classes=  Auth::user()->classes;
		$classs_id = $request->sub ;
	$student = DB::table('students')->where('class_id', $classs_id)->get();
		return view('admin.student' , compact('classes' , 'student'));
	}
	public function AddStudents(Request $request){
			$student = new Student;
		     $student->First = $request->first;
		$student->Middle = $request->second;
		$student->Last = $request->last;
		$student->mobile = $request->mobile;
		$student->class_id = $request->sub ;
		$student->status = 'notYet' ;
	$student->save();
		return Redirect('/student');
	}
	public function SaveStudents(Request $request){
		 $id= $request->id;
	 $student = Student::find($id);
		  $student->First = $request->first;
		$student->Middle = $request->second;
		$student->Last = $request->last;
		$student->mobile = $request->mobile;
	$student->save();
}
	 public function DeleteStudent(Request $request , User $user){
		 $id= $request->id;
	 $student = Student::find($id);
		$student->delete();

}
		 public function CancelStudent(Request $request , User $user){
		 $id= $request->id;
	 $student = Student::find($id);
		echo json_encode($student);

}
	 public function ListQuestions(Request $request){
		$classes=  Auth::user()->classes;
		$classs_id = $request->cl ;
	    $subjects = Auth::user()->subjects;
		$subject_id = $request->su;
		 $question = DB::table('questions')->where('class_id', $classs_id)->where('subject_id', $subject_id)->get();
		return view('admin.question' , compact('classes' , 'subjects' , 'question'));
	}
	public function AddQuestion(Request $request){
			$question = new Question;
		     $question->title = $request->title;
		$question->firsr_choice = $request->first;
		$question->seond_choice = $request->second;
		$question->third_choice = $request->third;
		$question->last_choice = $request->last;
	    $question->true_choice = $request->true_q;
		$question->mark = $request->mark;
		$question->class_id = $request->sub ;
		$question->subject_id = $request->sb;
		if ($request->hasFile('image')){
		$file =$request->file('image');
		
$destinationPath = 'upload/';
$filename = $file->getClientOriginalName();
$file->move($destinationPath, $filename);
	$question->image_path = "upload/{$filename}";
		}
	$question->save();
		return Redirect('/questions');
	}
	public function SaveQuestion(Request $request){
		 $id= $request->id;
	 $question = Question::find($id);
		   $question->title = $request->title;
		$question->firsr_choice = $request->first;
		$question->seond_choice = $request->second;
		$question->third_choice = $request->third;
		$question->last_choice = $request->last;
	    $question->true_choice = $request->true_q;
		$question->mark = $request->mark;
	$question->save();
}
	 public function DeleteQuestion(Request $request , User $user){
		 $id= $request->id;
	 $question = Question::find($id);
		$question->delete();

}
	 public function CancelQuestion(Request $request , User $user){
		 $id= $request->id;
	 $question = Question::find($id);
		echo json_encode($question);

}
	public function examClass(){
		$classes=  Auth::user()->classes;
		return view('admin.exam_class' , compact('classes'));
	}
	public function examstu(Request $request){
		$classs_id = $request->sub ;
		 $subjects = Auth::user()->subjects;
		$student = DB::table('students')->where('class_id', $classs_id)->where('status', 'notYet')->get();
		return view('admin.exam_student' , compact('classes' , 'subjects' , 'student' , 'classs_id'));
	}
	public function examquestion(Request $request){
		$sub =array();
		$student_id = $request->stu;
		$sq= new sq ;
		@$taked_subs = DB::table('student_question')->where('student_id', $student_id)->get();
		
		foreach($taked_subs as $i=>$v){
			$sub[]=$v->subject_id;
		}
		$subject_id = $request->su;
		$class_id = $request->clase ;
		$name_stu = DB::table('students')->where('id', $student_id)->get();
		 $name = DB::table('subjects')->where('id', $subject_id)->get();
		$questions = DB::table('questions')->where('class_id', $class_id)->where('subject_id', $subject_id)->get();
		if (in_array($subject_id, $sub)) {
    return view('admin.subject_take' , compact( 'name_stu'));
}else{
		return view('admin.exam_page' , compact('questions' , 'student_id' , 'name' , 'name_stu' , 'subject_id'));
	}}
	
public function markAnswers(Request $request) {
$responses = $request->except(['submit', '_token' , 'student' , 'subject'] );

$score = 0;
$z=0;
foreach($responses as $qid=>$response) {
$question = Question::find($qid);
$answer = $question->true_choice;
$mark = $question->mark;
$z += $mark;
if($response == $answer) {
	
$score += $mark;
}
}
	//echo (@$score/$z)*100;
$sq= new sq ;
$sq->student_id = $request->student;
$sq->subject_id = $request->subject;
$sq->value = round((@$score/$z)*100 , 2);
$sq->save();
return view('admin.answer_questions');

} 
public function examReport() {
	$student = DB::table('students')->orderBy('created_at', 'desc')->get();
		return view('admin.report_class' , compact('student'));
}

		public function reportexam($id){
		$student_id = $id;
		
		$x= array();
		$names=array();
		$id_sub = DB::table('student_question')->where('student_id', $student_id)->get();
		
		foreach($id_sub as $sub){
			$x[$sub->subject_id] = $sub->value;
		}

		 foreach($x as $i =>$v){
			
			 $z = DB::table('subjects')->where('id', $i)->get();
			 
			 @$names[$z[0]->name]=$v ;
		 }
			$social_val = DB::table('student_social')->where('student_id', $student_id)->get();
			$social =@$social_val[0]->value;
			$names['social_exam']=$social;
			$name_stu = DB::table('students')->where('id', $student_id)->get();
		    $names_json = json_encode($names);
			return view('admin.report_sub' , compact('names' , 'name_stu' , 'student_id' ,'names_json' ));
			
	}
		 public function socialList(Request $request){
		$classes=  Auth::user()->classes;
		$classs_id = $request->cl ;
	    $subjects = Auth::user()->subjects;
		$subject_id = $request->su;
		 $social= DB::table('social')->where('class_id', $classs_id)->get();
		return view('admin.social' , compact('classes' ,  'social'));
	}
	public function AddSocial(Request $request){
			$social = new socials;
		     $social->title = $request->title;
		$social->class_id = $request->sub ;
		
	$social->save();
		return Redirect('/social');
	}
	public function saveSocial(Request $request){
		 $id= $request->id;
	 $social = socials::find($id);
		  $social->Title = $request->name;
		
	$social->save();
}
	 public function DeleteSocial(Request $request , User $user){
		 $id= $request->id;
	 $soial = socials::find($id);
		$soial->delete();

}
		 public function CancelSocial(Request $request , User $user){
		 $id= $request->id;
	 $social = socials::find($id);
		echo json_encode($social);

}
	public function Socialexam(){
		$classes=  Auth::user()->classes;
		return view('admin.social_class' , compact('classes'));
	}
	public function socialstu(Request $request){
		$classs_id = $request->sub ;
		
		$student = DB::table('students')->where('class_id', $classs_id)->get();
		return view('admin.social_student' , compact( 'student' , 'classs_id'));
	}
		public function socialquestion(Request $request){
		$class_id = $request->clase ;
		$student_id = $request->stu;
		$name_stu = DB::table('students')->where('id', $student_id)->get();
		 
		$social = DB::table('social')->where('class_id', $class_id)->get();
		return view('admin.social_page' , compact('social' , 'student_id' ,  'name_stu' ));
	}
		public function mark_question(Request $request){
			$val=0;
		$responses = $request->except(['submit', '_token' , 'student' , 'subject'] );
			$no = count($responses);
        foreach($responses as $sid=> $re){
			$val+=$re;
		}
			
		$final= $val*100/($no*5);
		$sq= new social_question ;
        $sq->student_id = $request->student;
         $sq->value = $final;
		$sq->save();
			return view('admin.answer_questions');


	}
	public function approveStudent($id){
		$name_stu = DB::table('students')->where('id', $id)->get();
		$student = Student::find($id);
		$student->status = 'approve' ;
	$student->save();
		return view('admin.approve_student', compact( 'name_stu'  ) );
	}
	public function DapproveStudent($id){
		$name_stu = DB::table('students')->where('id', $id)->get();
		Student::find($id);
		$student->status = 'not approve' ;
	$student->save();
		return view('admin.Dapprove_student', compact( 'name_stu'  ) );
	}
	public function searchReport(Request $request){
		$search = $request->searching;
		$student = Student::where('created_at', 'LIKE', '%'.$search.'%')->get();
		return view('admin.report_class' , compact('student'));
	}
	public function searchStatus(Request $request){
		$search = $request->status;
		$student = Student::where('status', $search)->get();
		return view('admin.report_class' , compact('student'));
	}
	public function sendMessage(Request $request){
		$text = $request->comment;
		$phone = $request->phone;
		$url = 'http://www.vodatext.com/sendSms.aspx?userid=2701&pass=t7one5&to='.$phone.'&text='.$text;
		if (strpos(file_get_contents($url), 'successfully') !== false) {
 
	echo "<script>alert('your message succesfully send');</script>";
		
}
		else{
			echo "<script>alert('your Number iss invalid');</script>";
			
		}
	return back() ;
	}
}
