<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Parents;
use App\StudentAcc;
use App\Attendance;
use Redirect;
use Auth;

class Registeration extends Controller
{
	
    public function parentform(){
		return view('register.parent');
	}
	public function AddParent(Request $request){
	 $this->validate($request, [
        'code' => 'required|unique:parent|max:255',
        
    ]);
		$parent = new Parents;
		 $parent->code = $request->code;
		 $parent->Full_name = $request->full;
		$parent->Mobile1 = $request->mobile1;
		$parent->Mobile2 = $request->mobile2;
		$parent->Gender = $request->gender;
		$parent->Username = $request->username;
		$parent->Password = $request->password;
		if ($request->hasFile('image')){
		$file =$request->file('image');
		
$destinationPath = 'parents/';
$filename = $file->getClientOriginalName();
$file->move($destinationPath, $filename);
	$parent->image = "parents/{$filename}";
		}
         $parent->save();
		 return back();
	}
	 public function studentform(){
         $bus = DB::table('bus')->get();
         $grade = DB::table('grade')->get();
		return view('register.student' , compact('bus' , 'grade'));
	}
	public function getParent(Request $request){
		if($request->way== 1 ){
			
		$parent= DB::table('parent')->where('Mobile1',$request->val )->orWhere('Mobile2',$request->val )->get();
			
		}
		else{
			$parent= DB::table('parent')->where('code',$request->val )->get();
		}
		echo json_encode($parent);
	}
	public function Studentadd(Request $request){

		$student = new StudentAcc;
		$student->Full_name = $request->fullname;
		$student->Full_name_ar = $request->arfullname;
		$student->Birthday = $request->birthday;
		$student->Grade = $request->grade;
		$student->Gender = $request->gender;
		$student->Address = $request->address;
		$student->Bus = $request->bus;
		$student->Nationality = $request->nationality;
		$student->Status = $request->status;
		$student->Class = $request->classe;
		$student->Username = $request->username;
		$student->Password = $request->password;
		$student->parent_code = $request->code;
		$student->student_code = uniqid();
		if ($request->hasFile('image')){
		$file =$request->file('image');
		
$destinationPath = 'student_pic/';
$filename = $file->getClientOriginalName();
$file->move($destinationPath, $filename);
	$student->image = "student_pic/{$filename}";
		}
         $student->save();
		 return back();
	}
	public function manageStudents(Request $request){
        $grade = DB::table('grade')->get();
		$classs_id = $request->grade ;
	$student = DB::table('main_student')->where('Grade', $classs_id)->where('withdraw','!=' ,'withdraw')->get();
		return view('register.Accstudent' , compact('student' , 'grade'));
	}
	public function Editstudent($id){
        $bus = DB::table('bus')->get();
        $grade = DB::table('grade')->get();
		$student = DB::table('main_student')->where('id', $id)->get();
        $location = DB::table('location')->where('bus_id' , $student[0]->Bus)->get();
		$parent= DB::table('parent')->where('code',$student[0]->parent_code )->get();
		return view('register.updatestudent' , compact('student' , 'parent' , 'location' , 'bus' , 'grade'));
	}
	public function Withdrawstudent($id){
		$student = StudentAcc::find($id);
		$student->withdraw='withdraw';
		$student->save();
		return Redirect('/Manage_students');
		
	}
    public function returnstudent($id){
		$student = StudentAcc::find($id);
		$student->withdraw=' ';
		$student->save();
		return Redirect('/Withdraw_students');
		
	}
	public function Updatestudent($id , Request $request ){
		$student = StudentAcc::find($id);
		$student->Full_name = $request->fullname;
		$student->Full_name_ar = $request->arfullname;
		$student->Birthday = $request->birthday;
		$student->Grade = $request->grade;
		$student->Gender = $request->gender;
		$student->Address = $request->address;
		$student->Bus = $request->bus;
		$student->Nationality = $request->nationality;
		$student->Status = $request->status;
		$student->Class = $request->classification;
		$student->Username = $request->username;
		$student->Password = $request->password;
		if ($request->hasFile('image')){
		$file =$request->file('image');
		
$destinationPath = 'student_pic/';
$filename = $file->getClientOriginalName();
$file->move($destinationPath, $filename);
	$student->image = "student_pic/{$filename}";
		}
         $student->save();
		return Redirect('/Manage_students');
	}
	public function manageParents(){
	
	$parent = DB::table('parent')->orderBy('Full_name', 'asc')->get();
		return view('register.listParent' , compact('parent'));
	}
	public function Editparent($id){
		$parent = DB::table('parent')->where('id', $id)->get();
		return view('register.updateparent' , compact('parent'));
	}
	public function Updateparent($id , Request $request ){
		$parent = Parents::find($id);
		$parent->code = $request->code;
		 $parent->Full_name = $request->full;
		$parent->Mobile1 = $request->mobile1;
		$parent->Mobile2 = $request->mobile2;
		$parent->Gender = $request->gender;
		$parent->Username = $request->username;
		$parent->Password = $request->password;
		if ($request->hasFile('image')){
		$file =$request->file('image');
$destinationPath = 'parents/';
$filename = $file->getClientOriginalName();
$file->move($destinationPath, $filename);
	$parent->image = "parents/{$filename}";
		}
         $parent->save();
		return Redirect('/Manage_parents');
	}
	public function Deletestudent(Request $request){
		$student = StudentAcc::find($request->id);
		$student->delete();
		
	}
	public function Deleteparent(Request $request){
		$parent = Parents::find($request->id);
		$parent->delete();
		
	}
	public function Attendance(Request $request){
        $grade = DB::table('grade')->get();
		$classs_id = $request->grade ;
	$student = DB::table('main_student')->where('Grade', $classs_id)->where('withdraw','!=' ,'withdraw')->get();
		return view('register.Attendance', compact('student' , 'classs_id' , 'grade') );
	}
	public function processattendance(Request $request){
        date_default_timezone_set('Asia/Dubai');
		$attend = array();
		$responses = $request->except(['submit', '_token' ] );
        //print_r($responses) ;
		foreach($responses as $qid=>$response) {
			
			if (strpos($qid, 'note') !== false) {
$words = explode('/', $qid);
		$attend[$words[1]]['Note'] = $response;	

}
			elseif (strpos($qid, 'leave') !== false) {
$word = explode('/', $qid);
		$attend[$word[1]]['Leave'] = $response;
        $attend[$word[1]]['Student_id'] = $word[1];	

}
			elseif (strpos($qid, 'dat') !== false) {
		
}
	elseif (strpos($qid, 'grade') !== false) {
	
		
}    
else {
		$attend[$qid]['Tardiness'] = $response;
			$attend[$qid]['Student_id'] = $qid;
}  	
		}
        //print_r($attend) ;
            foreach($attend as $ni => $val){
              if(isset($val['Student_id'])){
        $user_favorites = DB::table('attendance')->where('Date',$request->dat )->where('Grade',  $request->grade)->where('Student_id',  $val['Student_id'])->first();
                  //print_r($user_favorites) ;
        if (is_null($user_favorites)) {
          $stu = DB::table('main_student')->where('id', $val['Student_id'])->get();
        $parent = $stu[0]->parent_code;
                  if(!isset($val['Tardiness'])){
                    $val['Tardiness'] = "no"  ;
                  }
            
            $paren = DB::table('parent')->where('code', $parent)->get();
              if($val['Tardiness']== 'Tardiness' and isset($val['Leave'] )){
                  $text = "We would like to inform you that the student {$stu[0]->Full_name} has been delayed today and left in time ".date("H:i:s") ;
              }
              elseif($val['Tardiness']== 'Absence'){
            $text = "We would like to inform you that the student {$stu[0]->Full_name} has missed today" ;
              }
            elseif($val['Tardiness']== 'Tardiness' and !isset($val['Leave'])){
                $text = "We would like to inform you that the student {$stu[0]->Full_name} has been delayed today  " ;
              }
             elseif(isset($val['Leave']) and $val['Tardiness'] == 'no'){
                $text = "We would like to inform you that the student {$stu[0]->Full_name} has been left today in time ".date("H:i:s");
              }
              $phone = $paren[0]->Mobile1 ;
              $text =urlencode($text);
        $url = 'http://www.vodatext.com/sendSms.aspx?userid=2701&pass=t7one5&to='.$phone.'&text='.$text;
              
           
              if (strpos(file_get_contents($url), 'successfully') !== false) {
 
	echo "<script>alert('your message succesfully send');</script>";
		
}
		else{
			echo "<script>alert('your Number iss invalid');</script>";
			
		}}}
        }
		foreach($attend as $id=>$att) {
            if(isset($att['Student_id'])){
            $user_favorites = DB::table('attendance')->where('Date',$request->dat )->where('Grade',  $request->grade)->where('Student_id',  $att['Student_id'])->first();
            
if (is_null($user_favorites)) {
   $attendance = new Attendance;
			foreach($att as $at=>$ate) {
		   $attendance->$at= $ate;
		}
		$attendance->Date = $request->dat;
		$attendance->Grade = $request->grade;
		$attendance->save();
}	
		}}
       
      
		return Redirect('/Attendance');
	}
	public function Attendance_Today(Request $request){
		$i=0;
		$Attendance = DB::table('attendance')->where('Date', date('Y-m-d'))->orderBy('Grade', 'asc')->get();
		foreach($Attendance as $att){
			 $student = DB::table('main_student')->where('id', $att->Student_id)->where('withdraw','!=' ,'withdraw')->get();
			foreach($student as $stu){
				$Attendan[$i]['name']=$stu->Full_name;
			}
			$Attendan[$i]['id']=$att->id;
			$Attendan[$i]['note']=$att->Note;
			$Attendan[$i]['tardiness']=$att->Tardiness;
			$Attendan[$i]['grade']=$att->Grade;
			$Attendan[$i]['date']=$att->Date;
			$Attendan[$i]['Leave']=$att->Leave;
			$i++;
		}

		return view('register.Attendance_Today' , compact('Attendan'));
	}
	public function searchTardiness(Request $request){
		$i=0;
		$search = $request->tardines;
        if($search = 'leave'){
          $Attendance = Attendance::where('Leave', $search)->where('Date', date('Y-m-d'))->orderBy('Grade', 'asc')->get();   
        }
        else{
		$Attendance = Attendance::where('Tardiness', $search)->where('Date', date('Y-m-d'))->orderBy('Grade', 'asc')->get();
        }
		foreach($Attendance as $att){
			 $student = DB::table('main_student')->where('id', $att->Student_id)->where('withdraw','!=' ,'withdraw')->get();
			foreach($student as $stu){
				$Attendan[$i]['name']=$stu->Full_name;
			}
			$Attendan[$i]['id']=$att->id;
			$Attendan[$i]['note']=$att->Note;
			$Attendan[$i]['tardiness']=$att->Tardiness;
			$Attendan[$i]['grade']=$att->Grade;
			$Attendan[$i]['date']=$att->Date;
			$Attendan[$i]['Leave']=$att->Leave;
			$i++;
		}
		//print_r($Attendan);
		return view('register.Attendance_Today' , compact('Attendan' , 'search'));
	}
	public function saveAttendance(Request $request){
		$id= $request->id;
	 $Attendance = Attendance::find($id);
		echo $request->Note;
		$Attendance->Date = $request->dat;
		$Attendance->Note = $request->note;
		$Attendance->Tardiness = $request->leave;
		$Attendance->Leave = $request->traid;
	$Attendance->save();		 
		
	}
	public function deleteAttend(Request $request ){
		 $id= $request->id;
	 $Attendance = Attendance::find($id);
		$Attendance->delete();
}
	 public function cancelattend(Request $request ){
		 $id= $request->id;
	 $Attendance = Attendance::find($id);
		echo json_encode($Attendance);
}
	public function Attendance_ByDate(Request $request ){
         $grade = DB::table('grade')->get();
		$i=0;
		$classs_id = $request->grade ;
	$Attendance = DB::table('attendance')->where('Grade', $classs_id)->whereBetween('Date', [$request->dat_f, $request->dat_t])->orderBy('Date', 'desc')->get();
		foreach($Attendance as $att){
			 $student = DB::table('main_student')->where('id', $att->Student_id)->where('withdraw','!=' ,'withdraw')->get();
			foreach($student as $stu){
				$Attendan[$i]['name']=$stu->Full_name;
			}
			$Attendan[$i]['id']=$att->id;
			$Attendan[$i]['note']=$att->Note;
			$Attendan[$i]['tardiness']=$att->Tardiness;
			$Attendan[$i]['grade']=$att->Grade;
			$Attendan[$i]['date']=$att->Date;
			$Attendan[$i]['Leave']=$att->Leave;
			$i++;
		}
		//print_r($Attendan);
		return view('register.Attendance_Bydate' , compact('Attendan' , 'grade' , 'classs_id') );
	}
	public function Attendance_Calculate(Request $request ){
		$i=0;
        $grade = DB::table('grade')->get();
		$classs_id = $request->grade ;
		$Absence = DB::table('attendance')->where('Grade', $classs_id)->whereBetween('Date', [$request->dat_f, $request->dat_t])->where('Tardiness', 'Absence')->get();
	 $Tardiness = DB::table('attendance')->where('Grade', $classs_id)->whereBetween('Date', [$request->dat_f, $request->dat_t])->get();
		
		if(!empty($Absence) or !empty($Tardiness) ){
			$Attendan[$i]['g']=$classs_id;
			$Attendan[$i]['Absence']= (count($Absence)/count($Tardiness))*100;	
			$Attendan[$i]['Tardiness']= 100-($Attendan[$i]['Absence']);	
		}
		
		return view('register.Attendance_calc' , compact('Attendan' , 'grade' , 'classs_id') );
	}
	public function Student_accept(Request $request){
         $grade = DB::table('grade')->get();
		$classs_id = $request->grade ;
	$student = DB::table('main_student')->where('Grade', $classs_id)->where('withdraw','!=' ,'withdraw')->get();
		return view('register.studentList' , compact('student' , 'grade' , 'classs_id'));
	}
    public function withdrawStudents(Request $request){
	$student = DB::table('main_student')->where('withdraw','withdraw')->get();
		return view('register.withdrawList' , compact('student'));
	}
    
}


