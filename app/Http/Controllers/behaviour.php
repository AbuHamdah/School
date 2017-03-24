<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\observation_type;
use App\behaviour_type;
use App\observation_option;
use App\behaviour_option;
use App\behaviour_student;
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
        $behaviour = DB::table('behaviour_syudent')->where('term_id',$term_i )->where('year_id',  $year)->where('subject_id',  $subject)->where('grade_id',  $grad)->get();
// print_r($mark);
        if(isset($behaviour)){
            foreach($behaviour as $ma){
          $student[$i] = DB::table('main_student')->where('Full_name' , $ma->name)->where('withdraw','!=' ,'withdraw')->first();
              $student[$i]->note = $ma->note ;
              $student[$i]->lecture = $ma->lecture ;
              $student[$i]->m3 = $ma->m3 ;
              $student[$i]->m4 = $ma->m4 ;
              $student[$i]->m5 = $ma->m5 ;
              $student[$i]->m6 = $ma->m6 ;
              $student[$i]->avg = $ma->avg ;
               $student[$i]->total = $ma->total ;
                $i++ ; 
                  }}
        else{
            $student =DB::table('main_student')->where('Grade' , $grad)->where('withdraw','!=' ,'withdraw')->get();
        }
         
       //print_r($student) ;
		return view('behaviour.add' , compact('grade' , 'department' , 'term' , 'Year' ,  'student' ,'term_i' , 'year' , 'subject' , 'grad' , 'behav' , 'teacher'));
	
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
    //$marks = DB::table('mark')->where('term_id',$ar['term'] )->where('year_id',$ar['year'])->where('subject_id',$ar['sub'])->where('grade_id',  $ar['grade'])->where('name',@$ar['name'])->get();
    if(isset($marks)){
     foreach($marks as $mar ){
      $mark = Marks::find($mar->id); 
    $mark ->m1 = @$ar['m1'];
    $mark ->m2 = @$ar['m2'];
    $mark ->m3 = @$ar['m3'];
    $mark ->m4 = @$ar['m4'];
    $mark ->m5 = @$ar['m5'];
    $mark ->m6 = @$ar['m6'];
    $mark ->avg = ((@$ar['m6']+@$ar['m1']+@$ar['m2']+@$ar['m3']+@$ar['m4']+@$ar['m5']) / $ar['total'])*100;
    $mark ->total = @$ar['m6']+@$ar['m1']+@$ar['m2']+@$ar['m3']+@$ar['m4']+@$ar['m5'];
    $mark ->name = @$ar['name'];
    $mark ->grade_id = @$ar['grade'];
    $mark ->subject_id = @$ar['sub'];
    $mark ->term_id = @$ar['term'];
    $mark ->year_id = @$ar['year'];
    $mark->save();
         
     }   
    }
    else{
    $mark = new behaviour_student;
        if(!empty($ar['type'])){
    $mark ->note = @$ar['note'];
    $mark ->name = @$ar['name'];
    $mark ->date = $request->dat;
    $mark ->lecture = @$ar['order'];
    $mark ->type_id = @$ar['type'];
    $mark ->option_id = @$ar['option'];
    $mark ->grade_id = @$ar['grade'];
    $mark ->subject_id = @$ar['sub'];
    $mark ->term_id = @$ar['term'];
    $mark ->year_id = @$ar['year'];
    $mark ->teacher_id = @$ar['teacher'];
    $mark->save();
}}
  
     }
return Redirect('/BehaviourAssign');
 }
}
