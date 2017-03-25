<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\observation_type;
use App\observation_option;
use App\observation_result;
use DB ;
class observation extends Controller
{
    public function ObservationAdd(Request $request){
		$grade=DB::table('grade')->get();
        $observ =DB::table('observation_type')->get();
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
        $type = $request->obv ;
        $obser_option = DB::table('observation_option')->where('observation_id',$request->obv )->get();
        $teacher_name = DB::table('employees')->where('id',$teacher )->value('Full_name');
        $subject_name = DB::table('subject')->where('id',$subject )->value('value');
        $grade_name = DB::table('grade')->where('id',$grad )->value('value');
        $observation_name = DB::table('observation_type')->where('id',$request->obv )->value('name');
      // print_r($student) ;
		return view('observation.add' , compact('grade' ,'observ' , 'department' , 'term' , 'Year' , 'term_i' , 'year' , 'subject' , 'grad' , 'behav' , 'teacher' , 'date' , 'type' , 'teacher_name' , 'obser_option' , 'subject_name' , 'grade_name' , 'observation_name'));
	
	} 
    public function observationResult(Request $request){
        $responses = $request->except(['submit', '_token' , 'subject' , 'year' , 'term' , 'date' , 'teacher' , 'grade' , 'note' , 'type'] );
        $obser= DB::table('observation_result')->where('teacher_id',$request->teacher )->where('year_id',$request->year)->where('term_id',$request->term)->where('subject_id',$request->subject)->where('grade_id',$request->grade)->where('date',$request->date )->get();
        if(empty($obser)){
        foreach($responses as $id=> $re){
			$data = new observation_result ;
            $data->value = $re ;
            $data->option_id = $id ;
            $data->year_id = $request->year ; 
            $data->term_id = $request->term ; 
            $data->subject_id = $request->subject ; 
            $data->teacher_id = $request->teacher ; 
            $data->date = $request->date ; 
            $data->grade_id = $request->grade ; 
            $data->note = $request->note ; 
            $data->save() ;
		}}
        return Redirect('/AddObservation');
    }
     public function ObservationReport(Request $request){
         $arr = array() ;
		$grade=DB::table('grade')->get();
        $observ =DB::table('observation_type')->get();
		$term=DB::table('term')->get();
		$Year=DB::table('year')->get();
      $behav =DB::table('behaviour_type')->get();
        $term_i = $request->term;
         $year = $request->year;
        $grad = $request->grade ;
        $obser= DB::table('observation_result')->where('type_id',$request->obv)->where('grade_id',$grad)->where('year_id',$year)->where('term_id',$term_i)->orderBy('date' , 'asc')->get();
         foreach($obser as $ob){
             
             $sum = DB::table('observation_result')->where('teacher_id',$ob->teacher_id)->where('subject_id',$ob->subject_id)->where('value','!=' , '0')->sum('value');
             $count = count(DB::table('observation_result')->where('teacher_id',$ob->teacher_id)->where('subject_id',$ob->subject_id)->where('value','!=' , '0')->get());
              $teacher_name = DB::table('employees')->where('id',$ob->teacher_id )->value('Full_name');
             $subject_name = DB::table('subject')->where('id',$ob->subject_id )->value('value');
             $grade_name = DB::table('grade')->where('id',$ob->grade_id  )->value('value');
             $observation_name = DB::table('observation_type')->where('id',$ob->type_id  )->value('name');
             $arr[$ob->teacher_id]['subject']= $subject_name ;
             $arr[$ob->teacher_id]['subject_id']= $ob->subject_id ;
             $arr[$ob->teacher_id]['grade']= $grade_name ;
             $arr[$ob->teacher_id]['observation']= $observation_name ;
             $arr[$ob->teacher_id]['date']= $ob->date ;
             $arr[$ob->teacher_id]['note']= $ob->note ;
             $arr[$ob->teacher_id]['teacher_id']= $ob->teacher_id ;
             $arr[$ob->teacher_id]['teacher']= $teacher_name ;
             $arr[$ob->teacher_id]['value']= $sum*100 / ($count*4 );
         }
       //print_r($arr) ;
		return view('observation.report' , compact('grade' ,'observ' , 'grade' ,  'term' , 'Year' , 'arr'));
	
	}
    public function editobserv($teacher, $subject , $date)
    {
        $teacher_name = DB::table('employees')->where('id',$teacher)->value('Full_name');
        $obser= DB::table('observation_result')->where('teacher_id',$teacher)->where('subject_id',$subject)->where('date' , $date)->get();
        foreach($obser as $ob => $val){
            $option = DB::table('observation_option')->where('id',$val->option_id  )->value('name');
         $obser[$ob]->option =  $option ;
        }
        return view('observation.update' , compact('date' ,'subject' , 'teacher' ,  'obser' , 'teacher_name'));
    }
      public function observationUpdate(Request $request){
        $responses = $request->except(['submit', '_token' , 'subject' , 'year' , 'term' , 'date' , 'teacher' , 'grade' , 'note' , 'type'] );

        foreach($responses as $id=> $re){
			$data = observation_result::find($id) ;
            $data->value = $re ;
            $data->note = $request->note ; 
            $data->save() ;
		}
        return Redirect('/ObservationReport');
    }
}
