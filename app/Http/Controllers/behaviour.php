<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\observation_type;
use App\behaviour_type;
use App\observation_option;
use App\behaviour_option;
use App\behaviour_student;
use App\behaviour_analysis;
use App\Http\Requests;
use DB;

class behaviour extends Controller
{
  public function BehaviourAssign(Request $request){
        $i = 0 ;
		$grade=DB::table('grade')->get();
		$department=DB::table('deparement')->get();
		$term=DB::table('term')->get();
		$Year=DB::table('year')->get();
      $behav =DB::table('behaviour_type')->get();
        $term_i = $request->term;
         $year = $request->year;
         $teacher = $request->teacher;
         $subject = $request->subject;
        $grad = $request->grade ;
       $date = $request->dat ;
        $behaviour = DB::table('behaviour_student')->where('date',$date )->where('term_id',$term_i )->where('year_id',  $year)->where('subject_id',  $subject)->where('grade_id',  $grad)->get();
// print_r($mark);
        if(!empty($behaviour)){
             $student= DB::table('main_student')->where('Grade' , $grad)->where('withdraw','!=' ,'withdraw')->get();
            foreach($student as $ma ){
    $behaviour = DB::table('behaviour_student')->where('name',  $ma->Full_name)->first();
              $student[$i]->note = @$behaviour->note ;
              $student[$i]->lecture = @$behaviour->lecture ;
              $student[$i]->option_id = @$behaviour->option_id ;
                $behavi = DB::table('behaviour_option')->where('id', @$behaviour->option_id)->first();
              $student[$i]->option = @$behavi->name ;
              $student[$i]->type = @$behaviour->type_id ;
              
                $i++ ; 
                  }}
        else{
            $student =DB::table('main_student')->where('Grade' , $grad)->where('withdraw','!=' ,'withdraw')->get();
        }
         
      // print_r($student) ;
		return view('behaviour.add' , compact('grade' , 'department' , 'term' , 'Year' ,  'student' ,'term_i' , 'year' , 'subject' , 'grad' , 'behav' , 'teacher' , 'date'));
	
	} 
     public function chooseoption(Request $request ){
		$behav = DB::table('behaviour_option')->where('type_id', $request->val)->get();
        
		echo json_encode($behav);
	}
    public function BehaviourStudent(Request $request){
     
     $responses = $request->except(['submit', '_token'] );
     //print_r($responses);
     foreach($responses as $res => $re){
         if($res != 'dat'){
         $ex =explode('/',$res);
         $array[$ex[1]][$ex[0]] = $re;
     
}}

     foreach($array as $arr=>$ar){
    $behaviour = DB::table('behaviour_student')->where('date',$ar['date'] )->where('term_id',$ar['term'] )->where('year_id',  $ar['year'])->where('subject_id',  $ar['sub'])->where('grade_id',  $ar['grade'])->where('name',  $ar['name'])->get();
    if(!empty($behaviour)){
     foreach($behaviour as $mar ){
    $mark = behaviour_student::find($mar->id); 
    $mark ->note = @$ar['note'];
    $mark ->name = @$ar['name'];
    $mark ->lecture = @$ar['order'];
    $mark ->type_id = @$ar['type'];
    $mark ->option_id = @$ar['option'];
    $mark->save();
     }   
    }
    else{
    $mark = new behaviour_student;
        if(!empty($ar['type'])){
    $mark ->note = @$ar['note'];
    $mark ->name = @$ar['name'];
    $mark ->date = @$ar['date'];
    $mark ->lecture = @$ar['order'];
    $mark ->type_id = @$ar['type'];
    if(!isset($ar['option'])){
        $ar['option'] = "";
    }
    $mark ->option_id = @$ar['option'];
    $mark ->grade_id = @$ar['grade'];
    $mark ->subject_id = @$ar['sub'];
    $mark ->term_id = @$ar['term'];
    $mark ->year_id = @$ar['year'];
    $mark ->teacher_id = @$ar['teacher'];
    $mark ->status = 'not yet';
    $mark->save();
    }
}}
  
return Redirect('/BehaviourAssign');
 }
   public function BehaviourReport(){   
   $behaviour = DB::table('behaviour_student')->orderBy('date', 'desc')->get();
       foreach($behaviour as $be => $ha){
        $grade = DB::table('grade')->where('id' , $ha->grade_id)->first();
        $behav =DB::table('behaviour_type')->where('id' , $ha->type_id)->first();
        $behavi = DB::table('behaviour_option')->where('id' , $ha->option_id)->first();
        $behaviour[$be]->grade = $grade->value ;
        $behaviour[$be]->option = @$behavi->name ;
        $behaviour[$be]->type = $behav->name ;
       }
    return view('behaviour.report' , compact('behaviour'));
   }
    public function reportapprov($id){
       $behaviour = DB::table('behaviour_student')->where('id', $id)->first(); 
        $code = DB::table('main_student')->where('Full_name' , $behaviour->name)->first();
        $mobile = DB::table('parent')->where('code' , $code->parent_code)->first();
        $phone = $mobile->Mobile1 ;
        $behavi = DB::table('behaviour_option')->where('id' , $behaviour->option_id)->first();
        $message = $behavi->message ;
        $message = 'the student: '.$behaviour->name.' '.$message.' in data '.$behaviour->date ;
        $message =urlencode($message);
        $url = 'http://www.vodatext.com/sendSms.aspx?userid=2701&pass=t7one5&to='.$phone.'&text='.$message;
              
           
              if (strpos(file_get_contents($url), 'successfully') !== false) {
 
	echo "<script>alert('your message succesfully send');</script>";
		
}
		else{
			echo "<script>alert('your Number iss invalid');</script>";
			
		}
     $mark = behaviour_student::find($id); 
     $mark->status = 'approve' ;
     $mark->save();
       return Redirect('/BehaviourReport'); 
    }
     public function reportnonapprov($id){
     $mark = behaviour_student::find($id); 
     $mark->status = 'not approve' ;
     $mark->save();
       return Redirect('/BehaviourReport'); 
    }
    public function searchReport(Request $request){
		$search = $request->searching;
		$behaviour = behaviour_student::where('date', 'LIKE', '%'.$search.'%')->get();
        foreach($behaviour as $be => $ha){
        $grade = DB::table('grade')->where('id' , $ha->grade_id)->first();
        $behav =DB::table('behaviour_type')->where('id' , $ha->type_id)->first();
        $behavi = DB::table('behaviour_option')->where('id' , $ha->option_id)->first();
        $behaviour[$be]->grade = $grade->value ;
        $behaviour[$be]->option = @$behavi->name ;
        $behaviour[$be]->type = $behav->name ;
       }
		return view('behaviour.report' , compact('behaviour'));
	}
	public function searchStatus(Request $request){
		$search = $request->status;
		$behaviour = behaviour_student::where('status', $search)->get();
              foreach($behaviour as $be => $ha){
        $grade = DB::table('grade')->where('id' , $ha->grade_id)->first();
        $behav =DB::table('behaviour_type')->where('id' , $ha->type_id)->first();
        $behavi = DB::table('behaviour_option')->where('id' , $ha->option_id)->first();
        $behaviour[$be]->grade = $grade->value ;
        $behaviour[$be]->option = @$behavi->name ;
        $behaviour[$be]->type = $behav->name ;
       }
		return view('behaviour.report' , compact('behaviour'));
	}
    	public function BehaviourAnalysis(Request $request){
        $arr = array() ;
        $grade=DB::table('grade')->get();
        $grad = $request->grade ;
        $student =DB::table('main_student')->where('Grade' , $grad)->where('withdraw','!=' ,'withdraw')->get();
		$type =DB::table('behaviour_type')->orderBy('name' , 'asc')->get();
        foreach($type as $ty){
         foreach($student as $stu) {
             $behaviour = DB::table('behaviour_student')->where('name', $stu->Full_name)->where('type_id', $ty->id)->get();
             $arr[$stu->Full_name][$ty->name] = count($behaviour);
         }  
        }
            //print_r($arr);;
		return view('behaviour.analysis' , compact('grade' , 'arr' , 'type'));
	}
}
