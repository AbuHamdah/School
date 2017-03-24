<?php

namespace App\Http\Controllers;
use App\employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use DB;
use App\attendEmployee;
use App\leave;
class HR extends Controller
{
    public function employeeform(){
		$depar = DB::table('deparement')->get();
		return view('hr.employee' , compact('depar'));
	}
	public function employee_add(Request $request){

	$employee = new employee;
		$employee->Full_name = $request->fullname;
		$employee->Birthday = $request->birthday;
		$employee->Mobile = $request->mobile;
		$employee->Gender = $request->gender;
		$employee->Address = $request->address;
		$employee->Email = $request->email;
		$employee->Nationality = $request->nationality;
		$employee->Status = $request->status;
		$employee->Depatment = $request->department;
		$employee->Position = $request->position;
		$employee->Username = $request->username;
		$employee->Password = $request->password;
		if ($request->hasFile('image')){
		$file =$request->file('image');
		
$destinationPath = 'employee_pic/';
$filename = $file->getClientOriginalName();
$file->move($destinationPath, $filename);
	$employee->image = "employee_pic/{$filename}";
		}
		if ($request->hasFile('pass')){
		
		$file =$request->file('pass');
		
$destinationPath = 'passport_employees/';
$filename = $file->getClientOriginalName();
$file->move($destinationPath, $filename);
	$employee->passport = "passport_employees/{$filename}";
		}
		if ($request->hasFile('cert')){
	
		$file =$request->file('cert');
			$total = count($file);
			for($i=0 ; $i<=$total-1 ; $i++){
$destinationPath = 'certificate_employees/';
$filename[$i] = $file[$i]->getClientOriginalName();

$file[$i]->move($destinationPath, $filename[$i]);
	
		}
		$employee->certification = json_encode($filename);
		}
		$employee->save();
		 return back();  
        
}
	public function Manage_employee(Request $request){
        $i =1 ;
		$emp = DB::table('deparement')->get();
		$depar = DB::table('employees')->get();
        foreach($depar as $de => $val){
          $empl = DB::table('deparement')->where('id', $val->Depatment)->get();
        $posi = DB::table('position')->where('id', $val->Position)->get();
            if(!empty($empl)){
         $depar[$de]->Depatment = $empl[0]->value ;
                //print_r($emp) ;
            }
            if(!empty($posi)){
        $depar[$de]->Position = $posi[0]->value ;
                
            }
            $i++ ;
        }
		return view('hr.employeeList' , compact('depar' , 'emp'));
	}
	public function Manageempoyee(Request $request){
        $emp = DB::table('deparement')->get();
		$depatment = $request->department ;
		$position = $request->position ;
        $pos = DB::table('position')->where('department_id', $depatment)->get();
        
		if(empty($position)){
		$depar = DB::table('employees')->where('Depatment', $depatment)->get();
        $der = $emp[0]->value;
		}
		elseif(empty($depatment)){
		$depar = DB::table('employees')->where('Position', $position)->get();
        $dep = $pos[0]->value ;
		}
		else{
			$depar = DB::table('employees')->where('Position', $position)->where('Depatment', $depatment)->get();
            $der = $emp[0]->value;
            $dep = $pos[0]->value ;
		}
		return view('hr.employeeList' , compact('depar' , 'emp' , 'depatment' ,'pos' , 'position' , 'der' , 'dep'));
	
}
		public function chooseposition(Request $request ){
		$employee = DB::table('position')->where('department_id', $request->val)->get();
		echo json_encode($employee);
	}
public function Viewpassport($id){
	$employee = employee::find($id);
	@$name = $employee[0]->Full_name;
	$passport=$employee->passport;
	$file = explode('passport_employees/' , $passport);
$filename="http://localhost/school/public/".$passport;
	if (strpos($passport, 'pdf') !== false) {
    $content = file_get_contents($passport);
	header("Content-type: application/pdf"); 
    header('Content-Length: ' . strlen($content));
    header('Content-Disposition: inline; filename="'.$file[1]);
    header('Cache-Control: private, max-age=0, must-revalidate');
    header('Pragma: public');
    ini_set('zlib.output_compression','0');

    die($content);
	}
		elseif ((strpos($passport, 'doc') !== false) or (strpos($passport, 'docs') !== false)) {
    echo 'The docs and doc file is not supported yet !';
	}
			elseif (empty($passport)) {
    echo 'No file was uploaded for this user !';
	}
		else{
			echo "<img style='height:400px' src='http://localhost/school/public/".$passport."'>";
		}}
	public function Viewcertificate($id){
	$employee = employee::find($id);
	$name = $employee->Full_name;
	$certificate=$employee->certification;
	$cert = json_decode($certificate);
		return view('hr.cert' , compact('cert' ,'name' ));
	}
	public function certification($name){
	$passport='certificate_employees/'.$name;
$filename="http://localhost/school/public/".$passport;
	if (strpos($passport, 'pdf') !== false) {
    $content = file_get_contents($passport);
	header("Content-type: application/pdf"); 
    header('Content-Length: ' . strlen($content));
    header('Content-Disposition: inline; filename="'.$name);
    header('Cache-Control: private, max-age=0, must-revalidate');
    header('Pragma: public');
    ini_set('zlib.output_compression','0');

    die($content);
	}
		elseif ((strpos($passport, 'doc') !== false) or (strpos($passport, 'docs') !== false)) {
    echo 'The docs and doc file is not supported yet !';
	}
			elseif (empty($passport)) {
    echo 'No file was uploaded for this user !';
	}
		else{
			echo "<img style='height:400px' src='http://localhost/school/public/".$passport."'>";
		}}
	public function Editemployee($id){
        $empl = DB::table('deparement')->get();
		$employee = DB::table('empLoyees')->where('id', $id)->get();
        $position = DB::table('position')->where('department_id', $employee[0]->Depatment)->get() ;
        //print_r($position) ;
		return view('hr.updateemployee' , compact('employee' , 'empl' , 'position'));
	}
	public function employee_update($id , Request $request){
		$employee = employee::find($id);
		$employee->Full_name = $request->fullname;
		$employee->Birthday = $request->birthday;
		$employee->Mobile = $request->mobile;
		$employee->Gender = $request->gender;
		$employee->Address = $request->address;
		$employee->Email = $request->email;
		$employee->Nationality = $request->nationality;
		$employee->Status = $request->status;
		$employee->Depatment = $request->department;
		$employee->Position = $request->position;
		$employee->Username = $request->username;
		$employee->Password = $request->password;
		if ($request->hasFile('image')){
		$file =$request->file('image');
		
$destinationPath = 'employee_pic/';
$filename = $file->getClientOriginalName();
$file->move($destinationPath, $filename);
	$employee->image = "employee_pic/{$filename}";
		}
		if ($request->hasFile('pass')){
		
		$file =$request->file('pass');
		
$destinationPath = 'passport_employees/';
$filename = $file->getClientOriginalName();
$file->move($destinationPath, $filename);
	$employee->passport = "passport_employees/{$filename}";
		}
		if ($request->hasFile('cert')){
	
		$file =$request->file('cert');
			$total = count($file);
			for($i=0 ; $i<=$total-1 ; $i++){
$destinationPath = 'certificate_employees/';
$filename[$i] = $file[$i]->getClientOriginalName();

$file[$i]->move($destinationPath, $filename[$i]);
	
		}
		$employee->certification = json_encode($filename);
		}
		$employee->save();
		 return back();  
	}
	public function Deleteemployee(Request $request){
		$employee = employee::find($request->id);
		$employee->delete();
		
	}
	public function employee_Attendance(Request $request){
        $emp = DB::table('deparement')->get();
		$depar = DB::table('employees')->get();
         foreach($depar as $de => $val){
          $empl = DB::table('deparement')->where('id', $val->Depatment)->get();
        $posi = DB::table('position')->where('id', $val->Position)->get();
            if(!empty($empl)){
         $depar[$de]->Depatment = $empl[0]->value ;
                //print_r($emp) ;
            }
            if(!empty($posi)){
        $depar[$de]->Position = $posi[0]->value ;
                
            }}
		return view('hr.Attendance_employee', compact('depar' , 'emp') );
	}
	public function employeeAttendance(Request $request){
           $emp = DB::table('deparement')->get();
		$depatment = $request->department ;
		$position = $request->position ;
        $pos = DB::table('position')->where('department_id', $depatment)->get();
        
		if(empty($position)){
		$depar = DB::table('employees')->where('Depatment', $depatment)->get();
        $der = $emp[0]->value;
		}
		elseif(empty($depatment)){
		$depar = DB::table('employees')->where('Position', $position)->get();
        $dep = $pos[0]->value ;
		}
		else{
			$depar = DB::table('employees')->where('Position', $position)->where('Depatment', $depatment)->get();
            $der = $emp[0]->value;
            $dep = $pos[0]->value ;
		}
		return view('hr.Attendance_employee', compact('depar' , 'emp' , 'depatment' , 'position' , 'der' , 'dep' , 'pos') );
	}
	public function processattend(Request $request){
		$attend = array();
		$responses = $request->except(['submit', '_token' ] );
		foreach($responses as $qid=>$response) {
			
			if (strpos($qid, 'note') !== false) {
$words = explode('/', $qid);
		$attend[$words[1]]['Note'] = $response;	

}

			elseif (strpos($qid, 'dat') !== false) {
		
}
  
else {
		$attend[$qid]['Tardiness'] = $response;
			$attend[$qid]['employee_id'] = $qid;
}  	
		}
		foreach($attend as $id=>$att) {
			$attendance = new attendEmployee;
			foreach($att as $at=>$ate) {
		   $attendance->$at= $ate;
		}
		$attendance->Date = $request->dat;
			if($attendance->employee_id!=0){
		$attendance->save();
		}}
		//print_r($attend);
		return Redirect('/employee_Attendance');
	}
	public function employee_Attendance_Today(Request $request){
		$i=0;
		$Attendance = DB::table('attendance_employee')->where('Date', date('Y-m-d'))->orderBy('Date', 'desc')->get();
		foreach($Attendance as $att){
			 $employee = DB::table('employees')->where('id', $att->employee_id)->get();
			foreach($employee as $stu){
				$Attendan[$i]['name']=$stu->Full_name;
                $empl = DB::table('deparement')->where('id', $stu->Depatment)->get();
                $posi = DB::table('position')->where('id', $stu->Position)->get();
                if(!empty($empl)){
                $Attendan[$i]['department'] = $empl[0]->value ;
                //print_r($emp) ;
                }
               if(!empty($posi)){
               $Attendan[$i]['position'] = $posi[0]->value ;
                
                 }
			}
			$Attendan[$i]['id']=$att->id;
			$Attendan[$i]['note']=$att->Note;
			$Attendan[$i]['tardiness']=$att->Tardiness;
			$Attendan[$i]['date']=$att->Date;
			$i++;
		}
        
//echo date('Y-m-d');
		return view('hr.Attendance_Today' , compact('Attendan'));
	}
	public function searchtardiness(Request $request){
		$i=0;
		$search = $request->tardines;
		$Attendance = attendEmployee::where('Tardiness', $search)->where('Date', date('Y-m-d'))->get();
		foreach($Attendance as $att){
			 $employee = DB::table('employees')->where('id', $att->employee_id)->get();
			foreach($employee as $stu){
				$Attendan[$i]['name']=$stu->Full_name;
				 $empl = DB::table('deparement')->where('id', $stu->Depatment)->get();
                $posi = DB::table('position')->where('id', $stu->Position)->get();
                if(!empty($empl)){
                $Attendan[$i]['department'] = $empl[0]->value ;
                //print_r($emp) ;
                }
               if(!empty($posi)){
               $Attendan[$i]['position'] = $posi[0]->value ;
                
                 }
			}
			$Attendan[$i]['id']=$att->id;
			$Attendan[$i]['note']=$att->Note;
			$Attendan[$i]['tardiness']=$att->Tardiness;
			$Attendan[$i]['date']=$att->Date;
			$i++;
		}

		return view('hr.Attendance_Today' , compact('Attendan'));
	}
	public function saveattendance(Request $request){
		$id= $request->id;
	 $Attendance = attendEmployee::find($id);
		echo $request->Note;
		$Attendance->Date = $request->dat;
		$Attendance->Note = $request->note;
		$Attendance->Tardiness = $request->traid;
	$Attendance->save();		 
		
	}
	public function deleteattend(Request $request ){
		 $id= $request->id;
	 $Attendance = attendEmployee::find($id);
		$Attendance->delete();
}
	 public function cancelAttend(Request $request ){
		 $id= $request->id;
	 $Attendance = attendEmployee::find($id);
		echo json_encode($Attendance);
}
	public function employee_Attendance_ByDate( ){
		$emp = DB::table('deparement')->get();
		//print_r($Attendan);
		return view('hr.AttendanceBydate' ,compact('emp'));
	}
	public function employee_AttendanceByDate(Request $request ){
        $emp = DB::table('deparement')->get();
	$i=0;
		$depatment = $request->department ;
		$position = $request->position ;
		$Attendance = DB::table('attendance_employee')->whereBetween('Date', [$request->dat_f, $request->dat_t])->orderBy('Date', 'desc')->get();
		
		foreach($Attendance as $att){
			if(empty($position) and !empty($depatment)){
		$employee = DB::table('employees')->where('id', $att->employee_id)->where('Depatment', $depatment)->get();
		}
		elseif((empty($depatment)) && (empty($position))){
		$employee = DB::table('employees')->where('id', $att->employee_id)->get();
			
		}
			elseif(empty($depatment) and !empty($position)){
		$employee = DB::table('employees')->where('id', $att->employee_id)->where('Position', $position)->get();
		}
		else{
			$employee = DB::table('employees')->where('id', $att->employee_id)->where('Position', $position)->where('Depatment', $depatment)->get();
		}
			foreach($employee as $stu){
				$Attendan[$i]['name']=$stu->Full_name;
				 $empl = DB::table('deparement')->where('id', $stu->Depatment)->get();
                $posi = DB::table('position')->where('id', $stu->Position)->get();
                if(!empty($empl)){
                $Attendan[$i]['department'] = $empl[0]->value ;
                //print_r($emp) ;
                }
               if(!empty($posi)){
               $Attendan[$i]['position'] = $posi[0]->value ;
                
                 }
				//echo  $i;
			}
			$Attendan[$i]['id']=$att->id;
			$Attendan[$i]['note']=$att->Note;
			$Attendan[$i]['tardiness']=$att->Tardiness;
			$Attendan[$i]['date']=$att->Date;
			$i++;
			//print_r($Attendan);
		}

	return view('hr.AttendanceBydate' , compact('Attendan' , 'emp' ,'depatment' , 'position'));
}
	public function emloyee_Attendance_Calculate(){
        $emp = DB::table('deparement')->get();
		return view('hr.Attendancecalc' , compact('emp'));
	}
	public function emloyee_AttendanceCalculate(Request $request ){
		$i=0;
		$y=0;
		$p=0;
        $emp = DB::table('deparement')->get();
		$depatment = $request->department ;
		$position = $request->position ;
		if(empty($position) and !empty($depatment)){
		$employee = DB::table('employees')->where('Depatment', $depatment)->get();
		}
		elseif((empty($depatment)) && (empty($position))){
		$employee = DB::table('employees')->get();
			
		}
		elseif(empty($depatment) and !empty($position)){
		$employee = DB::table('employees')->where('Position', $position)->get();
		}
		else{
			$employee = DB::table('employees')->where('Position', $position)->where('Depatment', $depatment)->get();
		}
		foreach($employee as $stu){
				$Absence[$i] = DB::table('attendance_employee')->where('employee_id', $stu->id)->whereBetween('Date', [$request->dat_f, $request->dat_t])->where('Tardiness', 'Absence')->get();
			$Tardiness[$i] = DB::table('attendance_employee')->where('employee_id', $stu->id)->whereBetween('Date', [$request->dat_f, $request->dat_t])->get();
			$i++;
			}
		foreach($Absence as $ap => $ab){
			if(!empty($ab)){
				$y++;
			}
		}
		foreach($Tardiness as $ap => $ab){
			if(!empty($ab)){
				$p++;
			}
		}
		
	 
		if($p!=0 or $y!=0 ){
             $empl = DB::table('deparement')->where('id', $depatment)->get();
                $posi = DB::table('position')->where('id', $position)->get();
                if(!empty($empl)){
                $Attendan[$i]['g'] = $empl[0]->value ;
                //print_r($emp) ;
                }
               if(!empty($posi)){
               $Attendan[$i]['p'] = $posi[0]->value ;
                
                 }
			$Attendan[$i]['Absence']= (($y)/(count($Tardiness)))*100;	
			$Attendan[$i]['Tardiness']= 100-($Attendan[$i]['Absence']);	
		}
		
		return view('hr.Attendancecalc' , compact('Attendan' , 'emp' , 'depatment' , 'position') );
	}
	public function Leave_applicant(Request $request ){
        $emp = DB::table('deparement')->get();
		return view('hr.leaveApp' , compact('Attendan', 'emp') );
	}
	public function leaveemployee(Request $request ){
		$employee = DB::table('employees')->where('Depatment', $request->val)->get();
		echo json_encode($employee);
	}
	public function employee_leave(Request $request ){
       
		$responses = $request->except(['submit', '_token' ] );
		//$resom= json_encode($responses);
		$leave = new leave;
		$leave->Reason = $request->reason;
		$leave->Depart = $request->depart;
		$leave->Back = $request->back;
		$leave->Date = $request->dat;
		@$employee = DB::table('employees')->where('Full_name', $request->leave)->get();
		@$leave->Employee_id = $employee[0]->id;
		$leave->save();
		return view('hr.leaveForm' , compact('responses') );
	}
	public function Leave_applicant_report(){
        $emp = DB::table('deparement')->get();
		return view('hr.leaveReport' , compact('emp') );
	}
	public function Leave_applicantreport(Request $request){
	$i=0;
	$x=0;
	$v=0;
         $emp = DB::table('deparement')->get();
		$depatment = $request->department ;
		if(!empty($request->dat_f) or !empty($request->dat_t)){
		$Attendance = DB::table('Leave')->whereBetween('Date', [$request->dat_f, $request->dat_t])->orderBy('Date', 'desc')->get();
		}
		else{
			$Attendance = DB::table('Leave')->get();
		}
		foreach($Attendance as $att){
		if(empty($depatment)){
		$employee = DB::table('employees')->where('id', $att->Employee_id)->get();
		}
		else{
			$employee = DB::table('employees')->where('id', $att->Employee_id)->where('Depatment', $depatment)->get();
			
		}
			$v = count(DB::table('Leave')->where('employee_id', $att->Employee_id)->get());
			foreach($employee as $stu){
				
				if($stu->id == $x){
					
				}
				else{
				$Attendan[$i]['name']=$stu->Full_name;
                 $empl = DB::table('deparement')->where('id', $stu->Depatment)->get();
                $posi = DB::table('position')->where('id', $stu->Position)->get();
                if(!empty($empl)){
                $Attendan[$i]['department'] = $empl[0]->value ;
                //print_r($emp) ;
                }
               if(!empty($posi)){
               $Attendan[$i]['position'] = $posi[0]->value ;
                
                 }
				$Attendan[$i]['id']=$stu->id;
					$Attendan[$i]['count']=$v;
				$x =$stu->id;
				$i++;
				}
					
			}
		
			
			//print_r($Attendan);
		}
		//print_r($Attendan);
		return view('hr.leaveReport', compact('Attendan' , 'emp' , 'depatment' ) );
	}
	public function viewLeave($id){
		$Attendan = DB::table('Leave')->where('Employee_id', $id)->get();
		$employee = DB::table('employees')->where('id', $id)->get();
		$name= $employee[0]->Full_name;
		return view('hr.viewReport', compact('Attendan' , 'name') );
	}
	public function saveleave(Request $request){
		$id= $request->id;
	 $leave = leave::find($id);
		$leave->Date = $request->dat;
		$leave->Reason = $request->reason;
		$leave->Back = $request->back;
		$leave->Depart = $request->depart;
	$leave->save();		 
		
	}
		public function deleteleave(Request $request ){
		 $id= $request->id;
	 $leave = leave::find($id);
		$leave->delete();
}
	 public function cancelLeave(Request $request ){
		 $id= $request->id;
	 $leave = leave::find($id);
		echo json_encode($leave);
}
}
