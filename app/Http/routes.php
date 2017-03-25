<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' =>'admin'] , function(){
	
	Route::get('/home', 'HomeController@index');
//class
Route::get('/classes', 'Admission@ListClass');
Route::post('/addClass', 'Admission@AddClass');
Route::get('/saveClass', 'Admission@SaveClass');
Route::get('/deleteClass', 'Admission@DeleteClass');
Route::get('/cancelClass', 'Admission@CancelClass');
// subject
Route::get('/subjects', 'Admission@ListSubjects');
Route::post('/addSubject', 'Admission@AddSubjects');
Route::get('/saveSubject', 'Admission@SaveSubject');
Route::get('/deleteSubject', 'Admission@DeleteSubject');
Route::get('/deleteSubject', 'Admission@DeleteSubject');
Route::get('/cancelSubject', 'Admission@CancelSubject');
// student
Route::get('/student', 'Admission@ListStudents');
Route::post('/liststudent', 'Admission@ListStudents');
Route::post('/studentAdd', 'Admission@AddStudents');
Route::get('/saveStudent', 'Admission@SaveStudents');
Route::get('/deleteStudent', 'Admission@DeleteStudent');
Route::get('/cancelStudent', 'Admission@CancelStudent');
//question
Route::get('/questions', 'Admission@ListQuestions');
Route::post('/listquestion', 'Admission@ListQuestions');
Route::post('/questionAdd', 'Admission@AddQuestion');
Route::get('/saveQuestion', 'Admission@SaveQuestion');
Route::get('/deleteQuestion', 'Admission@DeleteQuestion');
Route::get('/cancelQuestion', 'Admission@CancelQuestion');
//exam
Route::get('/exam', 'Admission@examClass');
Route::post('/examstudent', 'Admission@examstu');
Route::post('/examquestion', 'Admission@examquestion');
Route::post('/mark-questions', 'Admission@markAnswers');
//report
Route::get('/report', 'Admission@examReport');
Route::get('/reportexam/{id}', 'Admission@reportexam');
Route::post('/searchReport', 'Admission@searchReport');
Route::post('/searchStatus', 'Admission@searchStatus');
//social
Route::get('/social', 'Admission@socialList');
Route::post('/listsocial', 'Admission@socialList');
Route::post('/socialAdd', 'Admission@AddSocial');
Route::get('/saveSocial', 'Admission@saveSocial');
Route::get('/deleteSocial', 'Admission@DeleteSocial');
Route::get('/cancelSocial', 'Admission@CancelSocial');
Route::get('/questions', 'Admission@ListQuestions');
Route::get('/Socialexam', 'Admission@Socialexam');
Route::post('/socialstudent', 'Admission@socialstu');
Route::post('/socialquestion', 'Admission@socialquestion');
Route::post('/mark_social-questions', 'Admission@mark_question');
Route::get('/reportexam/approveStudent/{id}', 'Admission@approveStudent');
Route::get('/reportexam/DapproveStudent/{id}', 'Admission@DapproveStudent');
Route::get('/chart_vals', 'Admission@chart_vals');
Route::post('/sendMessage', 'Admission@sendMessage');
//Rrgister
//Parent
Route::get('/Register_parent', 'Registeration@parentform');
Route::post('/parentAdd', 'Registeration@AddParent');
//student
Route::get('/Register_student', 'Registeration@studentform');
Route::post('/student_rAdd', 'Registeration@Studentadd');
Route::get('/getParent', 'Registeration@getParent');
//manage student
Route::get('/Manage_students', 'Registeration@manageStudents');
Route::post('/Managestudent', 'Registeration@manageStudents');
Route::get('/Withdraw_students', 'Registeration@withdrawStudents');
Route::get('/Editstudent/{id}', 'Registeration@Editstudent');
Route::get('/Deletestudent', 'Registeration@Deletestudent');
Route::post('/Editstudent/Updatestudent/{id}', 'Registeration@Updatestudent');
Route::get('/Withdrawstudent/{id}', 'Registeration@Withdrawstudent');
Route::get('/returnstudent/{id}', 'Registeration@returnstudent');
//manage parent
Route::get('/Manage_parents', 'Registeration@manageParents');
Route::get('/Editparent/{id}', 'Registeration@Editparent');
Route::get('/Deleteparent', 'Registeration@Deleteparent');
Route::post('/Editparent/Updateparent/{id}', 'Registeration@Updateparent');
//attendance
Route::get('/Attendance', 'Registeration@Attendance');
Route::post('/Manageattendance', 'Registeration@Attendance');
Route::post('/processattendance', 'Registeration@processattendance');
//attendance report
Route::get('/Attendance_Today', 'Registeration@Attendance_Today');
Route::post('/searchTardiness', 'Registeration@searchTardiness');
Route::get('/saveAttendance', 'Registeration@saveAttendance');
Route::get('/deleteAttend', 'Registeration@deleteAttend');
Route::get('/cancelattend', 'Registeration@cancelattend');
Route::get('/Attendance_ByDate', 'Registeration@Attendance_ByDate');
Route::post('/attenddate', 'Registeration@Attendance_ByDate');
Route::get('/Attendance_Calculate', 'Registeration@Attendance_Calculate');
Route::post('/attendcal', 'Registeration@Attendance_Calculate');
Route::get('/Student_accept', 'Registeration@Student_accept');
Route::post('/List_student', 'Registeration@Student_accept');
	//HR
Route::get('/Register_employee', 'HR@employeeform');	
Route::post('/employee_add', 'HR@employee_add');
Route::get('/chooseposition', 'HR@chooseposition');
Route::get('/Manage_employee', 'HR@Manage_employee');
Route::post('/Manageempoyee', 'HR@Manageempoyee');
Route::get('/passport/{id}', 'HR@Viewpassport');
Route::get('/certificate/{id}', 'HR@Viewcertificate');
Route::get('/certificate/certification/{name}', 'HR@certification');	
Route::get('/Editemployee/{id}', 'HR@Editemployee');
Route::post('/Editemployee/employee_update/{id}', 'HR@employee_update');
Route::get('/Deleteemployee', 'HR@Deleteemployee');
Route::get('/employee_Attendance', 'HR@employee_Attendance');
Route::post('/Manageempolyee', 'HR@employeeAttendance');	
Route::post('/processattend', 'HR@processattend');
Route::get('/employee_Attendance_Today', 'HR@employee_Attendance_Today');
Route::post('/searchtardiness', 'HR@searchtardiness');
Route::get('/saveattendance', 'HR@saveattendance');
Route::get('/deleteattend', 'HR@deleteattend');
Route::get('/cancelAttend', 'HR@cancelAttend');
Route::get('/employee_Attendance_ByDate', 'HR@employee_Attendance_ByDate');
Route::post('/bydateempolyee', 'HR@employee_AttendanceByDate');
Route::get('/emloyee_Attendance_Calculate', 'HR@emloyee_Attendance_Calculate');	
Route::post('/clcempolyee', 'HR@emloyee_AttendanceCalculate');
Route::get('/Leave_applicant', 'HR@Leave_applicant');
Route::get('/leaveemployee', 'HR@leaveemployee');
Route::post('/employee_leave', 'HR@employee_leave');
Route::get('/Leave_applicant_report', 'HR@Leave_applicant_report');
Route::post('/Leave_applicantreport', 'HR@Leave_applicantreport');	
Route::get('/viewLeave/{id}', 'HR@viewLeave');
Route::get('/saveleave', 'HR@saveleave');	
Route::get('/cancelLeave', 'HR@cancelLeave');
Route::get('/deleteleave', 'HR@deleteleave');
//control
//year
Route::get('/Year', 'Control@ListYear');
Route::post('/addYear', 'Control@AddYear');
Route::get('/saveYear', 'Control@SaveYear');
Route::get('/deleteYear', 'Control@DeleteYear');
Route::get('/cancelYear', 'Control@CancelYear');
//term
Route::get('/Term', 'Control@ListTerm');
Route::post('/addTerm', 'Control@AddTerm');
Route::get('/saveTerm', 'Control@SaveTerm');
Route::get('/deleteTerm', 'Control@DeleteTerm');
Route::get('/cancelTerm', 'Control@CancelTerm');
//bus
Route::get('/Bus', 'Control@ListBus');
Route::post('/addBus', 'Control@AddBus');
Route::get('/saveBus', 'Control@SaveBus');
Route::get('/deleteBus', 'Control@DeleteBus');
Route::get('/cancelBus', 'Control@CancelBus');
//week
Route::get('/Week', 'Control@ListWeek');
Route::post('/addWeek', 'Control@AddWeek');
Route::get('/saveWeek', 'Control@SaveWeek');
Route::get('/deleteWeek', 'Control@DeleteWeek');
Route::get('/cancelWeek', 'Control@CancelWeek');
//location
Route::get('/Location', 'Control@ListLocation');
Route::post('/listlocation', 'Control@ListLocation');
Route::post('/addLocation', 'Control@AddLocation');
Route::get('/saveLocation', 'Control@SaveLocation');
Route::get('/deleteLocation', 'Control@DeleteLocation');
Route::get('/cancelLocation', 'Control@CancelLocation');
//Assigment
Route::get('/Assigment', 'Control@ListAssigment');
Route::post('/addAssigment', 'Control@AddAssigment');
Route::get('/saveAssigment', 'Control@SaveAssigment');
Route::get('/deleteAssigment', 'Control@DeleteAssigment');
Route::get('/cancelAssigment', 'Control@CancelAssigment');
//Position
Route::get('/Position', 'Control@ListPosition');
Route::post('/listposition', 'Control@ListPosition');
Route::post('/addPosition', 'Control@AddPosition');
Route::get('/savePosition', 'Control@SavePosition');
Route::get('/deletePosition', 'Control@DeletePosition');
Route::get('/cancelPosition', 'Control@CancelPosition');
//Department
Route::get('/Department', 'Control@ListDepartment');
Route::post('/addDepartment', 'Control@AddDepartment');
Route::get('/saveDepartment', 'Control@SaveDepartment');
Route::get('/deleteDepartment', 'Control@DeleteDepartment');
Route::get('/cancelDepartment', 'Control@CancelDepartment');
//grade
Route::get('/ControlGrade', 'Control@ListGrade');
Route::post('/addControlGrade', 'Control@AddGrade');
Route::get('/saveControlGrade', 'Control@SaveGrade');
Route::get('/deleteControlGrade', 'Control@DeleteGrade');
Route::get('/cancelControlGrade', 'Control@CancelGrade');
//subject
Route::get('/ControlSubject', 'Control@ListSubject');
Route::post('/Controllistsubject', 'Control@ListSubject');
Route::post('/ControladdSubject', 'Control@AddSubject');
Route::get('/ControlsaveSubject', 'Control@SaveSubject');
Route::get('/ControldeleteSubject', 'Control@DeleteSubject');
Route::get('/ControlcancelSubject', 'Control@CancelSubject');
//assin subject
Route::get('/Assign_subject', 'Control@Assign');
Route::get('/chooseteacher', 'Control@chooseposition');
Route::get('/choosegrade', 'Control@choosegrade');
Route::get('/choosesubject', 'Control@choosesubject');
Route::get('/choosesubjects', 'Control@choosesubjects');
Route::post('/assign_save', 'Control@assign_save');
Route::get('/Manage_assign', 'Control@Manage_assign');
Route::get('/EnterMark', 'Control@EnterMark');  
Route::post('/mark_choose', 'Control@EnterMark');
Route::post('/MarkStudent', 'Control@MarkStudent');
Route::get('/MarksRecord', 'Control@MarksRecord');  
Route::post('/chooseRecord', 'Control@MarksRecord');  
 //weekly plan
Route::get('/WeeklyPlan', 'Control@WeeklyPlan'); 
Route::post('/chooseWeek', 'Control@WeeklyPlan'); 
Route::post('/submitWeek', 'Control@submitWeek');
    
Route::get('/WeeklyAssignments', 'Control@WeeklyAssignments');
Route::get('/selectAssign/{id}', 'Control@selectAssign');  
Route::post('/EnterAssign', 'Control@EnterAssign');
Route::get('/WeeklyPlanReport', 'Control@WeeklyPlanReport');    
Route::post('/chooseReportWeek', 'Control@WeeklyPlanReport');
Route::get('/getAssignment', 'Control@getAssignment');  
Route::get('/saveMassign', 'Control@saveMassign');   
Route::get('/deleteMassign', 'Control@DeleteMassign');
Route::get('/cancelMassign', 'Control@cancelMassign');
Route::get('/chooseadress', 'Control@chooseadress');
// behaviour type
Route::get('/behaviour_type', 'Control@ListBehaviour');
Route::post('/addBehaviour_type', 'Control@AddBehaviour');
Route::get('/saveBehaviour_type', 'Control@SaveBehaviour');
Route::get('/deleteBehaviour_type', 'Control@DeleteBehaviour');
Route::get('/cancelBehaviour_type', 'Control@CancelBehaviour');
 // behaviour option
Route::get('/behaviour_option', 'Control@ListBehaviour_option');
Route::post('/listBehaviour_option', 'Control@ListBehaviour_option');
Route::post('/addBehaviour_option', 'Control@AddBehaviour_option');
Route::get('/saveBehaviour_option', 'Control@SaveBehaviour_option');
Route::get('/deleteBehaviour_option', 'Control@DeleteBehaviour_option');
Route::get('/cancelBehaviour_option', 'Control@CancelBehaviour_option');
// observation type 
Route::get('/observation_type', 'Control@ListObservation_type');
Route::post('/addObservation_type', 'Control@AddObservation_type');
Route::get('/saveObservation_type', 'Control@SaveObservation_type');
Route::get('/deleteObservation_type', 'Control@DeleteObservation_type');
Route::get('/cancelObservation_type', 'Control@CancelObservation_type');
// observation option 
Route::get('/observation_option', 'Control@ListObservation_option');
Route::post('/listObservation_option', 'Control@ListObservation_option');
Route::post('/addObservation_option', 'Control@AddObservation_option');
Route::get('/saveObservation_option', 'Control@SaveObservation_option');
Route::get('/deleteObservation_option', 'Control@DeleteObservation_option');
Route::get('/cancelObservation_option', 'Control@CancelObservation_option');
// behaviour
Route::get('/BehaviourAssign', 'behaviour@BehaviourAssign');  
Route::post('/behaviour_choose', 'behaviour@BehaviourAssign'); 
Route::get('/chooseoption', 'behaviour@chooseoption');
Route::post('/BehaviourStudent', 'behaviour@BehaviourStudent');
Route::get('/BehaviourReport', 'behaviour@BehaviourReport');     
Route::get('/reportapprov/{id}', 'behaviour@reportapprov');
Route::get('/reportnonapprov/{id}', 'behaviour@reportnonapprov');
Route::post('/searchreport', 'behaviour@searchReport');
Route::post('/searchstatus', 'behaviour@searchStatus');
Route::get('/BehaviourAnalysis', 'behaviour@BehaviourAnalysis');
Route::post('/analysis_choose', 'behaviour@BehaviourAnalysis');
    // observaton
Route::get('/AddObservation', 'observation@ObservationAdd');
Route::post('/observation_choose', 'observation@ObservationAdd'); 
Route::post('/observationResult', 'observation@observationResult');
Route::get('/ObservationReport', 'observation@ObservationReport');
Route::post('/ObservationReportChoose', 'observation@ObservationReport');
Route::get('editobserv/{teacher}/{subject}/{date}','observation@editobserv');
Route::post('/observationUpdate', 'observation@observationUpdate');
Route::get('/deleteObservation_report', 'Control@DeleteObservation_report');
Route::post('/import', 'Control@import');
});

Route::get('/', function () {
    return view('welcome');
});
Route::auth();









