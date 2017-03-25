<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Year;
use App\Term;
use App\Bus;
use App\Week;
use App\Grade;
use App\Assigment;
use App\Department;
use App\Position;
use App\Locaton;
use App\Marks;
use App\assign_mark;
use App\weekly;
use App\weekly_assign;
use App\assin_mark ;
use App\SubjectCon;
use App\observation_type;
use App\behaviour_type;
use App\observation_option;
use App\behaviour_option;
use App\Http\Requests;
use DB;
class Control extends Controller
{
     public function ListYear(){
		$Year=DB::table('year')->get();;
		
		return view('control.year' , compact('Year'));
	}
	
	 public function AddYear(Request $request ){
		 $class = new Year;
		 $class->value = $request->clas;
         $class->save();
		 return back();
}
	 public function ListTerm(){
		$term=DB::table('term')->get();
		
		return view('control.term' , compact('term'));
	}
	
	 public function AddTerm(Request $request ){
		 $class = new Term;
		 $class->value = $request->clas;
		 $class->year = '2017';
         $class->save();
		 return back();
}
	 public function ListBus(){
		$bus=DB::table('bus')->get();
		
		return view('control.bus' , compact('bus'));
	}
	
	 public function AddBus(Request $request ){
		 $class = new Bus;
		 $class->value = $request->clas;
		 $class->year = '2017';
         $class->save();
		 return back();
}

	 public function ListWeek(){
		$week=DB::table('week')->get();
		
		return view('control.week' , compact('week'));
	}
	
	 public function AddWeek(Request $request ){
		 $class = new Week;
		 $class->value = $request->clas;
		 $class->year = '2017';
         $class->save();
		 return back();
}
	
	 public function ListAssigment(){
		$assigment=DB::table('assigment')->get();
		
		return view('control.assigment' , compact('assigment'));
	}
	
	 public function AddAssigment(Request $request ){
		 $class = new Assigment;
		 $class->value = $request->clas;
		 $class->year = '2017';
         $class->save();
		 return back();
}
		 public function ListDepartment(){
		$Department=DB::table('deparement')->get();
		
		return view('control.department' , compact('Department'));
	}
	
	 public function AddDepartment(Request $request ){
		 $class = new Department;
		 $class->value = $request->clas;
		 $class->year = '2017';
         $class->save();
		 return back();
}
	 public function ListGrade(){
		$grade=DB::table('grade')->get();
		
		return view('control.grade' , compact('grade'));
	}
	
	 public function AddGrade(Request $request ){
		 $class = new Grade;
		 $class->value = $request->clas;
		 $class->year = '2017';
         $class->save();
		 return back();
}
	 public function ListLocation(Request $request){
		$bus=DB::table('bus')->get();
		$bus_id = $request->sub ;
	$location = DB::table('location')->where('bus_id', $bus_id)->get();
		return view('control.location' , compact('bus' , 'location'));
	}
	public function AddLocation(Request $request){
			$student = new Locaton;
		$student->bus_id = $request->sub ;
		$student->value = $request->clas;
	$student->save();
		return Redirect('/Location');
	}
	 public function ListPosition(Request $request){
		$department=DB::table('deparement')->get();
		$department_id = $request->sub ;
	$position = DB::table('position')->where('department_id', $department_id)->get();
		return view('control.Position' , compact('position' , 'department'));
	}
	public function AddPosition(Request $request){
			$student = new Position;
		$student->department_id = $request->sub ;
		$student->value = $request->clas;
	$student->save();
		return Redirect('/Position');
	}
	 public function ListSubject(Request $request){
		$grade=DB::table('grade')->get();
		$grade_id = $request->sub ;
	$subject = DB::table('subject')->where('grade_id', $grade_id)->get();
		return view('control.subject' , compact('subject' , 'grade'));
	}
	public function AddSubject(Request $request){
			$student = new SubjectCon;
		$student->grade_id = $request->sub ;
		$student->value = $request->clas;
	$student->save();
		return Redirect('/ControlSubject');
	}
	public function Assign(){
		$grade=DB::table('grade')->get();
		$department=DB::table('deparement')->get();
		$term=DB::table('term')->get();
		$Year=DB::table('year')->get();;
		return view('control.assign' , compact('grade' , 'department' , 'term' , 'Year'));
	
	}
		public function chooseposition(Request $request ){
        $posi = DB::table('position')->where('department_id', $request->val)->where('value', 'Teacher')->get();
        
		$employee = DB::table('employees')->where('Depatment', $request->val)->where('position', $posi[0]->id)->get();
		echo json_encode($employee);
	}
	public function choosesubjects(Request $request ){
		$employee = DB::table('subject')->where('grade_id', $request->val)->get();
		echo json_encode($employee);
	}
    public function choosesubject(Request $request ){
		$employee = DB::table('assigns')->where('grade_id', $request->val)->where('teacher_id', $request->teacher)->get();
		     foreach($employee as $emp){
        $employ[] = DB::table('subject')->where('id', $emp->subject_id)->get();
        }
		echo json_encode($employ);
	}
     public function assign_save(Request $request ){
		 $assign = new assin_mark;
		 $assign->term_id = $request->term;
         $assign->year_id = $request->year;
         $assign->lesson = $request->lesson;
         $assign->name1 = $request->name1;
         $assign->mark1 = $request->mark1;
         $assign->teacher_id = $request->teacher;
         $assign->subject_id = $request->subject;
         $assign->grade_id = $request->grade;
         if($request->name2){
         $assign->name2 = $request->name2;
         $assign->mark2 = $request->mark2; 
         }
          if($request->name3){
         $assign->name3 = $request->name3;
         $assign->mark3 = $request->mark3; 
         }
          if($request->name4){
         $assign->name4 = $request->name4;
         $assign->mark4 = $request->mark4; 
         }
          if($request->name5){
         $assign->name5 = $request->name5;
         $assign->mark5 = $request->mark5; 
         }
          if($request->name6){
         $assign->name6 = $request->name6;
         $assign->mark6 = $request->mark6; 
         }
         $assign->save();
		 return back();
}
    public function Manage_assign(){
        $i=0;
		$assign=DB::table('assigns')->get();
           foreach($assign as $assi){
         $employee = DB::table('employees')->where('id', $assi->teacher_id)->get();
        $subject=DB::table('subject')->where('id' , $assi->subject_id)->get();
        $year=DB::table('year')->where('id' , $assi->term_id)->get();
        $term=DB::table('term')->where('id' , $assi->year_id)->get();
        if(isset($assi->name1)){
         $array[$i]['name1']= $assi->name1;
         $array[$i]['mark1']= $assi->mark1;
        }
         if(isset($assi->name2)){
          $array[$i]['name2']= $assi->name2;
         $array[$i]['mark2']= $assi->mark2;  
        }
         if(isset($assi->name3)){
         $array[$i]['name3']= $assi->name3;
         $array[$i]['mark3']= $assi->mark3;   
        }
         if(isset($assi->name4)){
           $array[$i]['name4']= $assi->name4;
         $array[$i]['mark4']= $assi->mark4; 
        }
         if(isset($assi->name5)){
          $array[$i]['name5']= $assi->name5;
         $array[$i]['mark5']= $assi->mark5;  
        }
         if(isset($assi->name6)){
          $array[$i]['name6']= $assi->name6;
         $array[$i]['mark6']= $assi->mark6;  
        }
        $array[$i]['Assign_id'] = $assi->id ;
        $array[$i]['subject']= $subject[0]->value;
        $array[$i]['term']= $term[0]->value;
        $array[$i]['teacher']= $employee[0]->Full_name;
        $array[$i]['year']= $year[0]->value;
        $array[$i]['id']= $year[0]->id;
          $i++;
        }
		return view('control.Massign' , compact('array'));
	
	}
    public function EnterMark(Request $request){
        $i = 0 ;
		$grade=DB::table('grade')->get();
		$department=DB::table('deparement')->get();
		$term=DB::table('term')->get();
		$Year=DB::table('year')->get();
        $term_i = $request->term;
         $year = $request->year;
         $teacher = $request->teacher;
         $subject = $request->subject;
        $grad = $request->grade ;
         $mark = DB::table('mark')->where('term_id',$term_i )->where('year_id',  $year)->where('subject_id',  $subject)->where('grade_id',  $grad)->get();
// print_r($mark);
        if(!empty($mark)){
            foreach($mark as $ma){
          $student[$i] = DB::table('main_student')->where('Full_name' , $ma->name)->where('withdraw','!=' ,'withdraw')->first();
              $student[$i]->m1 = $ma->m1 ;
              $student[$i]->m2 = $ma->m2 ;
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
         $assign = DB::table('assigns')->where('teacher_id', $teacher)->where('year_id', $year)->where('term_id', $term_i)->where('subject_id', $subject)->get();
       //print_r($student) ;
		return view('control.enter' , compact('grade' , 'department' , 'term' , 'Year' , 'assign' , 'student' ,'term_i' , 'year' , 'subject' , 'grad' , 'mark'));
	
	}
 public function MarkStudent(Request $request){
     
     $responses = $request->except(['submit', '_token'] );
     //print_r($responses);
     foreach($responses as $res => $re){
         
         $ex =explode('/',$res);
         $array[$ex[1]][$ex[0]] = $re;
     
}

     foreach($array as $arr=>$ar){
    $marks = DB::table('mark')->where('term_id',$ar['term'] )->where('year_id',$ar['year'])->where('subject_id',$ar['sub'])->where('grade_id',  $ar['grade'])->where('name',@$ar['name'])->get();
    if(!empty($marks)){
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
    $mark = new Marks;
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
return Redirect('/EnterMark');
 }
 public function MarksRecord(Request $request){
        $array = array();
    $i = 0 ;
        $term_i = $request->term;
         $year = $request->year;
        $grad = $request->grade ;
         $mark = DB::table('mark')->where('year_id', $year)->where('term_id', $term_i)->where('grade_id', $grad)->get();
         $subj = DB::table('subject')->where('grade_id', $grad)->orderBy('value', 'asc')->get();
     $coun = count($subj);
     foreach($mark as $marks){
      $sub = DB::table('subject')->where('id', $marks->subject_id)->orderBy('value', 'asc')->get(); 
        $array[$marks->name][$sub[0]->value] = $marks->avg;
          ksort($array[$marks->name]);
         $i++;
     }
    
		$grade=DB::table('grade')->get();
		$term=DB::table('term')->get();
		$Year=DB::table('year')->get();
     //print_r($array);
		return view('control.mark' , compact('grade' , 'term' , 'array' , 'term_i' , 'Year' , 'subj' , 'coun' ));
     
	
	}
public function WeeklyPlan(Request $request){
		$grade=DB::table('grade')->get();
		$department=DB::table('deparement')->get();
		$term=DB::table('term')->get();
		$Year=DB::table('year')->get();
        $week=DB::table('week')->get();
     $term_i = $request->term;
         $year = $request->year;
        $grad = $request->grade ;
        $wee =  $request->week ;
        $teacher = $request->teacher;
         $subject = $request->subject;
    $weekly = DB::table('weekly_plan')->where('subject_id', $subject)->where('year_id', $year)->where('term_id', $term_i)->where('week_id', $wee)->where('teacher_id', $teacher)->where('grade_id', $grad)->get();
   
    //print_r($weekly) ;
    $marker = DB::table('assigns')->where('subject_id', $subject)->where('year_id', $year)->where('term_id', $term_i)->where('teacher_id', $teacher)->get(); 
		return view('control.weekly' , compact('grade' , 'department' , 'term' , 'Year' , 'week' , 'wee' , 'marker','term_i' , 'year' , 'grad' , 'subject' , 'teacher', 'weekly'));
	
	}
    public function submitWeek(Request $request){
        
        $responses = $request->except(['submit', '_token'] );
        foreach($responses as $res => $re){
         
         $ex =explode('/',$res);
         $array[$ex[1]][$ex[0]] = $re;
     
}
       
        foreach($array as $i=> $v){
    $weekly = DB::table('weekly_plan')->where('subject_id', $v['subject'])->where('year_id', $v['year'])->where('term_id', $v['term'])->where('week_id', $v['week'])->where('teacher_id', $v['teacher'])->where('grade_id', $v['grade'])->where('day', $v['day'])->get();
            if(!empty($weekly)){
            $weekly =  weekly::find($weekly[0]->id); 
            $weekly->lesson = $v['lesson'];
            $weekly->homework = $v['Homework'];
            $weekly->home_from = $v['Phf'];
            $weekly->home_to = $v['Pht'];
            $weekly->assign_from = $v['Paf'];
            $weekly->assign_to = $v['Pat'];
            $weekly->assign = $v['Assign'];
            if(isset($v['mark'])){
            $weekly->mark = $v['mark'];
            }
            $weekly->mark_div = $v['mark_div'];
            $weekly->save();
            $assign = DB::table('week_assign')->where('subject_id', $v['subject'])->where('week_id', $v['week'])->where('grade_id', $v['grade'])->where('day', $v['day'])->get();
            if(!empty($assign)){
              $weekl =  weekly_assign::find($assign[0]->id); 
              $weekl->mark = @$v['mark_div'];
              $weekl->value = @$v['mark'];
              $weekl->status = 'not complete';
              $weekl->save();  
            }
            else{
            if(isset($v['mark'])){
            $weekl = new weekly_assign; 
            $weekl->mark = $v['mark_div'];
            $weekl->value = $v['mark'];
            $weekl->subject_id = $v['subject'];
            $weekl->grade_id = $v['grade'];
            $weekl->week_id = $v['week'];
            $weekl->day = $v['day'];
            $weekl->status = 'not complete';
            $weekl->save();  
            }}
            }
            else{
           $weekly = new weekly; 
           $weekly->week_id = $v['week'];
           $weekly->subject_id = $v['subject'];
          $weekly->grade_id = $v['grade'];
            $weekly->term_id = $v['term'];
            $weekly->year_id = $v['year'];
            $weekly->teacher_id = $v['teacher'];
            $weekly->day = $v['day'];
            $weekly->lesson = $v['lesson'];
            $weekly->homework = $v['Homework'];
            $weekly->home_from = $v['Phf'];
            $weekly->home_to = $v['Pht'];
            $weekly->assign_from = $v['Paf'];
            $weekly->assign_to = $v['Pat'];
            $weekly->assign = $v['Assign'];
            if(isset($v['mark'])){
            $weekly->mark = $v['mark'];
            }
            $weekly->mark_div = $v['mark_div'];
            $weekly->save();
            if(!empty($v['mark'])){
            $weekl = new weekly_assign; 
            $weekl->mark = $v['mark_div'];
            $weekl->value = $v['mark'];
            $weekl->subject_id = $v['subject'];
            $weekl->grade_id = $v['grade'];
            $weekl->week_id = $v['week'];
            $weekl->day = $v['day'];
            $weekl->status = 'not complete';
            $weekl->save();
            }
        }}
        return Redirect('/WeeklyPlan');
    }
    public function WeeklyAssignments(){
     $assign = DB::table('week_assign')->get();
        foreach($assign as $assi){
        $grade = DB::table('grade')->where('id' , $assi->grade_id)->get();
        $week=DB::table('week')->where('id' , $assi->week_id)->get();
        $subject=DB::table('subject')->where('id' , $assi->subject_id)->get();
        $array[$assi->id]['subject']= $subject[0]->value;
        $array[$assi->id]['grade']= $grade[0]->value;
        $array[$assi->id]['week']= $week[0]->value;
        $array[$assi->id]['id']= $assi->id;
        $array[$assi->id]['value']= $assi->value;
        $array[$assi->id]['status']= $assi->status;
        $array[$assi->id]['mark']= $assi->mark;
        }
        //print_r($array);
       return view('control.assign_week' , compact('array')); 
}

public function selectAssign($id){
    $i =0 ;
    $assign = DB::table('week_assign')->where('id' , $id)->get();
    if($assign[0]->status == "complete"){
       $assigns = DB::table('assign_mark')->where('name_assign' , $assign[0]->value)->where('week_id' , $assign[0]->week_id)->where('subject_id' , $assign[0]->subject_id)->where('grade_id' , $assign[0]->grade_id)->where('day' , $assign[0]->day)->get();
        foreach($assigns as $assi){
       $student[$i] = DB::table('main_student')->where('id' , $assi->student_id)->where('withdraw','!=' ,'withdraw')->first();
              $student[$i]->mark = $assi->mark ;
              $student[$i]->assin_id = $assi->id ;
                $i++ ; 

    }}
   else{
    $student =DB::table('main_student')->where('Grade' , $assign[0]->grade_id)->where('withdraw','!=' ,'withdraw')->get();
        } 
    //print_r($student) ;
       foreach($assign as $assi){
        $grade = DB::table('grade')->where('id' , $assi->grade_id)->get();
        $week=DB::table('week')->where('id' , $assi->week_id)->get();
        $subject=DB::table('subject')->where('id' , $assi->subject_id)->get();
        
        $array[$assi->id]['subject']= $subject[0]->value;
        $array[$assi->id]['subject_id']= $subject[0]->id;
        $array[$assi->id]['grade']= $grade[0]->value;
        $array[$assi->id]['grade_id']= $grade[0]->id;
        $array[$assi->id]['week']= $week[0]->value;
        $array[$assi->id]['week_id']= $week[0]->id;
        $array[$assi->id]['id']= $assi->id;
        $array[$assi->id]['value']= $assi->value;
        $array[$assi->id]['status']= $assi->status;
        $array[$assi->id]['mark']= $assi->mark;
        $array[$assi->id]['day']= $assi->day;
        }
    
     return view('control.page_assign' , compact('array' , 'student')); 
}
        public function EnterAssign(Request $request){
		
	      $responses = $request->except(['submit', '_token'] );
        foreach($responses as $res => $re){
         
         $ex =explode('/',$res);
         $array[$ex[1]][$ex[0]] = $re;
     
}
           
        foreach($array as $i=> $v){
             $marks = DB::table('assign_mark')->where('id',$v['assign_id'] )->get();
    if(empty($marks)){
           $weekly = new assign_mark; 
           $weekly->subject_id = $v['subject'];
           $weekly->grade_id = $v['grade'];
          $weekly->week_id = $v['week'];
        $weekly->day = $v['day'];
          $weekly->student_id = $v['id'];
            $weekly->name_assign = $v['assign'];
            $weekly->mark = $v['mark'];
            $weekly->save();
            DB::table('week_assign')
            ->where('id', $v['assi_id'])
            ->update(['status' => 'complete']);
             
            }
        else{
          $weekly = assign_mark::find($v['assign_id']);  
          $weekly->mark = $v['mark'];
          $weekly->save();  
        }
        }
            
            return Redirect('/WeeklyAssignments');
        
}

public function WeeklyPlanReport(Request $request){
$grade=DB::table('grade')->get();
    $i=0;
		$term=DB::table('term')->get();
		$Year=DB::table('year')->get();
        $week=DB::table('week')->get();
     $term_i = $request->term;
         $year = $request->year;
        $grad = $request->grade ;
        $wee =  $request->week ;
    $weekly = DB::table('weekly_plan')->where('year_id', $year)->where('week_id', $wee)->where('term_id', $term_i)->where('term_id', $term_i)->where('grade_id', $grad)->get(); 
      foreach($weekly as $assi){
        $grade = DB::table('grade')->where('id' , $assi->grade_id)->get();
        $week=DB::table('week')->where('id' , $assi->week_id)->get();
        $subject=DB::table('subject')->where('id' , $assi->subject_id)->get();
        $year=DB::table('year')->where('id' , $assi->term_id)->get();
        $term=DB::table('term')->where('id' , $assi->year_id)->get();
        $array[$assi->day][$i]['subject']= $subject[0]->value;
        $array[$assi->day][$i]['grade_id']= $grade[0]->id;
        $array[$assi->day][$i]['week_id']= $week[0]->id;
        $array[$assi->day][$i]['year_id']= $year[0]->id;
        $array[$assi->day][$i]['term_id']= $term[0]->id;
        $array[$assi->day][$i]['day']= $assi->day;
        $array[$assi->day][$i]['homework']= $assi->homework;
        $array[$assi->day][$i]['lesson']= $assi->lesson;
        $array[$assi->day][$i]['mark']= $assi->mark;
        $array[$assi->day][$i]['mark_div']= $assi->mark_div;
        $array[$assi->day][$i]['assign_from']= $assi->assign_from;
        $array[$assi->day][$i]['assign_to']= $assi->assign_to;
        $array[$assi->day][$i]['home_from']= $assi->home_from;
        $array[$assi->day][$i]['home_to']= $assi->home_to;
        $array[$assi->day][$i]['assign']= $assi->assign;
          $i++;
        }
    //print_r($array) ;
    return view('control.Reportweekly' , compact('grade' , 'term' , 'Year' , 'week' , 'array'));
	
}
  public function getAssignment(Request $request){
        $subject = $request->subject;
         $grade = $request->grade;
      $id = ""  ;
      $i=1;
      $mark = array() ;
         $assignment = DB::table('assign_mark')->where('subject_id', $subject)->where('grade_id', $grade)->orderBy('student_id', 'asc')->get();
   foreach($assignment as $assi ){
       if($assi->student_id != $id){
           $mark[$assi->student_id][$assi->name_assign]['mark'] = $assi-> mark ;
          $i=1 ; 
       }
       else {
           
           if(!isset($mark[$assi->student_id][$assi->name_assign]['mark'])){
               $mark[$assi->student_id][$assi->name_assign]['mark'] = ( $assi->mark );
           }
           else{
            $i++ ; 
            $z = $i-1 ;
           $mark[$assi->student_id][$assi->name_assign]['mark'] = (( $mark[$assi->student_id][$assi->name_assign]['mark'] * $z )+ $assi->mark )/$i;
               
       }}
       $mark[$assi->student_id][$assi->name_assign]['assign_name'] = $assi->name_assign ;
       $id = $assi->student_id ;
       
   }
      
     echo json_encode($mark);
	
	}
    public function SaveBus(Request $request ){
		 $id= $request->id;
	 $class = Bus::find($id);
		 $class->value = $request->name;
         $class->save();

}
 public function DeleteBus(Request $request){
		 $id= $request->id;
	 $class = Bus::find($id);
		$class->delete();

}
	 public function CancelBus(Request $request){
		 $id= $request->id;
	 $class = Bus::find($id);
		echo json_encode($class);

}
    public function SaveGrade(Request $request ){
		 $id= $request->id;
	 $class = Grade::find($id);
		 $class->value = $request->name;
         $class->save();

}
 public function DeleteGrade(Request $request){
		 $id= $request->id;
	 $class = Grade::find($id);
		$class->delete();

}
	 public function CancelGrade(Request $request){
		 $id= $request->id;
	 $class = Grade::find($id);
		echo json_encode($class);

}
 public function SaveWeek(Request $request ){
		 $id= $request->id;
	 $class = Week::find($id);
		 $class->value = $request->name;
         $class->save();

}
 public function DeleteWeek(Request $request){
		 $id= $request->id;
	 $class = Week::find($id);
		$class->delete();

}
	 public function CancelWeek(Request $request){
		 $id= $request->id;
	 $class = Week::find($id);
		echo json_encode($class);

}
 public function SaveYear(Request $request ){
		 $id= $request->id;
	 $class = Year::find($id);
		 $class->value = $request->name;
         $class->save();

}
 public function DeleteYear(Request $request){
		 $id= $request->id;
	 $class = Year::find($id);
		$class->delete();

}
	 public function CancelYear(Request $request){
		 $id= $request->id;
	 $class = Year::find($id);
		echo json_encode($class);

}
 public function SaveTerm(Request $request ){
		 $id= $request->id;
	 $class = Term::find($id);
		 $class->value = $request->name;
         $class->save();

}
 public function DeleteTerm(Request $request){
		 $id= $request->id;
	 $class = Term::find($id);
		$class->delete();

}
	 public function CancelTerm(Request $request){
		 $id= $request->id;
	 $class = Term::find($id);
		echo json_encode($class);

}
     public function SaveDepartment(Request $request ){
		 $id= $request->id;
	 $class = Department::find($id);
		 $class->value = $request->name;
         $class->save();

}
 public function DeleteDepartment(Request $request){
		 $id= $request->id;
	 $class = Department::find($id);
		$class->delete();

}
	 public function CancelDepartment(Request $request){
		 $id= $request->id;
	 $class = Department::find($id);
		echo json_encode($class);

}
    public function SaveSubject(Request $request ){
		 $id= $request->id;
	 $class = SubjectCon::find($id);
		 $class->value = $request->name;
         $class->save();

}
 public function DeleteSubject(Request $request){
		 $id= $request->id;
	 $class = SubjectCon::find($id);
		$class->delete();

}
	 public function CancelSubject(Request $request){
		 $id= $request->id;
	 $class = SubjectCon::find($id);
		echo json_encode($class);

}
    public function SavePosition(Request $request ){
		 $id= $request->id;
	 $class = Position::find($id);
		 $class->value = $request->name;
         $class->save();

}
 public function DeletePosition(Request $request){
		 $id= $request->id;
	 $class = Position::find($id);
		$class->delete();

}
	 public function CancelPosition(Request $request){
		 $id= $request->id;
	 $class = Position::find($id);
		echo json_encode($class);

}
    public function SaveLocation(Request $request ){
		 $id= $request->id;
	 $class = Locaton::find($id);
		 $class->value = $request->name;
         $class->save();

}
 public function DeleteLocation(Request $request){
		 $id= $request->id;
	 $class = Locaton::find($id);
		$class->delete();

}
	 public function CancelLocation(Request $request){
		 $id= $request->id;
	 $class = Locaton::find($id);
		echo json_encode($class);

}
    public function SaveAssigment(Request $request ){
		 $id= $request->id;
	 $class = Assigment::find($id);
		 $class->value = $request->name;
         $class->save();

}
 public function DeleteAssigment(Request $request){
		 $id= $request->id;
	 $class = Assigment::find($id);
		$class->delete();

}
	 public function CancelAssigment(Request $request){
		 $id= $request->id;
	 $class = Assigment::find($id);
		echo json_encode($class);

}
     public function saveMassign(Request $request ){
		 $id= $request->id;
	
		$responses = $request->except(['submit', '_token'] );
     foreach($responses as $ind => $val){
          $class = assin_mark::find($id);
         
            $class->$ind = $val ;
             $class->save() ;
     }
}
     public function CancelMassign(Request $request){
		 $id= $request->id;
	 $class = assin_mark::find($id);
		echo json_encode($class);

}
 public function DeleteMassign(Request $request){
		 $id= $request->id;
	 $class = assin_mark::find($id);
		$class->delete();

}
 /*public function import(Request $request){
		if ($request->hasFile('file')){
		$file = $_FILES['file']['tmp_name'];
       if ($file == NULL) {
      error(_('Please select a file to import'));
      redirect(page_link_to('admin_export'));
    }
    $handle = fopen($file, "r");
            
while(($filesop = fgetcsv($handle, 1000, ";")) !== false)
 {
     $student = DB::table('main_student')->where('Full_name', $$filesop[0])->get();
     if($student){
         $student_id = $student[0]->id ; 
     }
     
 }

}}*/
public function chooseadress(Request $request ){
		$employee = DB::table('location')->where('bus_id', $request->val)->get();
		echo json_encode($employee);
	}
    public function choosegrade(Request $request ){
		$employee = DB::table('assigns')->where('teacher_id', $request->val)->get();
        foreach($employee as $emp){
        $employ[] = DB::table('grade')->where('id', $emp->grade_id)->get();
        }
		echo json_encode($employ);
	}
     public function ListBehaviour(){
		$behav =DB::table('behaviour_type')->get();
		
		return view('control.behaviour_type' , compact('behav'));
	}
     public function ListBehaviour_option(Request $request){
		$type =DB::table('behaviour_type')->get();
		$type_id = $request->sub ;
	$behav = DB::table('behaviour_option')->where('type_id', $type_id)->get();
		return view('control.behaviour_option' , compact('behav' , 'type' ));
	}
     public function ListObservation_type(){
		$observ =DB::table('observation_type')->get();;
		
		return view('control.observation_type' , compact('observ'));
	}
     public function ListObservation_option(Request $request){
        $type =DB::table('observation_type')->get();
         $type_id = $request->sub ;
		$observ =DB::table('observation_option')->where('observation_id', $type_id)->get();;
		
		return view('control.observation_option' , compact('observ' , 'type'));
	}
     public function AddBehaviour(Request $request ){
		 $class = new behaviour_type;
		 $class->name = $request->clas;
         $class->save();
		 return back();
}
     public function AddObservation_type(Request $request ){
		 $class = new observation_type;
		 $class->name = $request->clas;
         $class->save();
		 return back();
}
    public function AddBehaviour_option(Request $request){
			$student = new behaviour_option;
		$student->type_id = $request->sub ;
		$student->name = $request->clas;
        $student->message = $request->message;
	$student->save();
		return Redirect('/behaviour_option');
	}
    public function AddObservation_option(Request $request){
			$student = new observation_option;
		$student->observation_id = $request->sub ;
		$student->name = $request->clas;
	$student->save();
		return Redirect('/observation_option');
	}
     public function SaveObservation_type(Request $request ){
		 $id= $request->id;
	 $class = observation_type::find($id);
		 $class->name = $request->name;
         $class->save();

}
     public function SaveBehaviour(Request $request ){
		 $id= $request->id;
	 $class = behaviour_type::find($id);
		 $class->name = $request->name;
         $class->save();

}
     public function SaveBehaviour_option(Request $request ){
		 $id= $request->id;
	 $class = behaviour_option::find($id);
		 $class->name = $request->name;
         $class->message = $request->message;
         $class->save();

}
 public function DeleteBehaviour_option(Request $request){
		 $id= $request->id;
	 $class = behaviour_option::find($id);
		$class->delete();

}
	 public function CancelBehaviour_option(Request $request){
		 $id= $request->id;
	 $class = behaviour_option::find($id);
		echo json_encode($class);

}
    public function DeleteObservation_type(Request $request){
		 $id= $request->id;
	 $class = observation_type::find($id);
		$class->delete();

}
	 public function CancelBehaviour(Request $request){
		 $id= $request->id;
	 $class = behaviour_type::find($id);
		echo json_encode($class);

}
    public function DeleteBehaviour(Request $request){
		 $id= $request->id;
	 $class = behaviour_type::find($id);
		$class->delete();

}
	 public function CancelObservation_type(Request $request){
		 $id= $request->id;
	 $class = observation_type::find($id);
		echo json_encode($class);

}
public function SaveObservation_option(Request $request ){
		 $id= $request->id;
	 $class = observation_option::find($id);
		 $class->name = $request->name;
         $class->save();

}
 public function DeleteObservation_option(Request $request){
		 $id= $request->id;
	 $class = observation_option::find($id);
		$class->delete();

}
	 public function CancelObservation_option(Request $request){
		 $id= $request->id;
	 $class = observation_option::find($id);
		echo json_encode($class);

}
    public function DeleteObservation_report(Request $request){
		 $teacher = $request->teacher;
         $date = $request->date ;
         $subject = $request->subject ;
	 DB::table('observation_result')->where('teacher_id',$teacher)->where('subject_id',$subject)->where('date' , $date)->delete();

}
}
