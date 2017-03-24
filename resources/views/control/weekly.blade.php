	@extends('layouts.app')
	@section('title')

	login
	@endsection
	@section('header')
	<style>
		#pad{
			padding: 0px;
		}
		img#blah {
		width: 148px;
		height: 148px;
	}
		div#mar {
    margin-top: 33px;
}
	</style>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		<script>
  $(function() {
    $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
  } );
  </script>
	@endsection

	@section('content')
	<h3>Add Weekly Plan</h3>
			<div class="innerLR">
				<!-- Widget -->
<input type="hidden" id="teacher">
				<div class="widget">
					<div class="widget-body innerAll inner-2x row">


	<form  id="target" role="form" action="{{url('chooseWeek')}}" method="post"enctype="multipart/form-data">
						{{ csrf_field() }}
						  <div class="row">

							 <div class="col-sm-4">
									<label for="exampleInputlass">Department</label>
								 <select id="department"  class="form-control">
						<option selected disabled>Choose Department</option>
						@foreach($department as $de)
						<option  value="{{$de->id}}">{{$de->value}}</option>
						@endforeach
								 </select>
							</div>
							<div class="col-sm-4">
							
								<label for="exampleInputlass">Teacher</label>
								 <select id="leaveEmployee" name='teacher' class="form-control">
						<option selected disabled>Choose teacher</option>
						</select>
						</div>
						<div class="col-sm-4">
									<label for="exampleInputlass">grade</label>
								 <select id="grade" name="grade"  class="form-control">
						<option selected disabled>Choose Grade</option>
						
								 </select>
						
							  </div>
							   <div class="col-sm-4" >
									<label for="exampleInputlass">Subject</label>
								 <select id="subject" name='subject' class="form-control">
						<option selected disabled>Choose subject</option>
						</select>
							</div>
							<div class="col-sm-4">
						 <label for="exampleInputlass">Term</label>
								 <select id="term" name='term' class="form-control">
						<option selected disabled>Choose Term</option>
						@foreach($term as $te)
						<option  value="{{$te->id}}">{{$te->value}}</option>
						@endforeach
								 </select>
							
							  </div>
							  	<div class="col-sm-4">
						 <label for="exampleInputlass">Year</label>
								 <select id="year" name='year' class="form-control">
						<option selected disabled>Choose Year</option>
						@foreach($Year as $ye)
						<option  value="{{$ye->id}}">{{$ye->value}}</option>
						@endforeach
								 </select>
							
							  </div>
							  	<div class="col-sm-4">
						<label for="exampleInputlass">Week</label>
								 <select id="week" name='week' class="form-control">
						<option selected disabled>Choose Week</option>
						@foreach($week as $we)
						<option  value="{{$we->id}}">{{$we->value}}</option>
						@endforeach
								 </select>
							
							  </div>
							  	
		</div>
        <div class="col-sm-12" style="text-align:center">

								<input id="add" type="submit" value="Choose" name="submit" class="btn btn-primary "> 
							</div>
        </form>
		@if(!empty($marker))
							  <table class="table table-striped table-responsive swipe-horizontal table-primary">
                        <!-- Table heading -->
                 
                        <thead>
                            <tr>
                                <th>Day</th>
                                <th>Lesson</th>
                                <th colspan="2">Homework</th>
                                <th colspan="3">Assignment</th>
                            </tr>
                        </thead>
                        <!-- // Table heading END -->
                        <!-- Table body -->
                           
                        <tbody>
                           <form  id="target" role="form" action="{{url('submitWeek')}}" method="post"enctype="multipart/form-data"> 
                               {{ csrf_field() }}
                               
                      <tr id="sunday">
                        <td>Sunday
                           <input type="hidden" name="day/Su" value="Sunday">
                            <input type="hidden" name="year/Su" value="{{$year}}">
                         <input type="hidden" name="term/Su" value="{{$term_i}}">
                         <input type="hidden" name="week/Su" value="{{$wee}}">
                         <input type="hidden" name="subject/Su" value="{{$subject}}">
                         <input type="hidden" name="teacher/Su" value="{{$teacher}}">
                        <input type="hidden" name="grade/Su" value="{{$grad}}">
                        </td>
                         
                          <td><input type="text" name="lesson/Su" class="form-control" value="{{@$weekly[0]->lesson}}"></td>
                          <td><input onkeyup="valed(this)" name="Homework/Su" type="text" class="form-control" value="{{@$weekly[0]->homework}}"></td>
                           <td id="hp">Page : <input name="Phf/Su" type="number" style="width:14%" value="{{@$weekly[0]->home_from}}"> <input name="Pht/Su" type="number" style="width:14%" value="{{@$weekly[0]->home_to}}"></td>
                          <td ><input onkeyup="vale(this)"  name="Assign/Su" type="text" class="form-control" value="{{@$weekly[0]->assign}}"></td>
                           <td id="ap" style="width:13%">Page : <input name="Paf/Su" type="number" style="width:28%" value="{{@$weekly[0]->assign_from}}"> <input name="Pat/Su" type="number" style="width:28%" value="{{@$weekly[0]->assign_to}}"></td>
                          <td> <select onchange="val(this)" name="mark/Su" id="assignment"  class="form-control">
						<option selected value="">Choose Assigment</option>
						@foreach($marker as $ma)
						@if($ma->name1 !=null)<option <?php if(@$weekly[0]->mark == $ma->name1) echo"selected"; ?> value="{{$ma->name1}}">{{$ma->name1}} </option>@endif
                        @if($ma->name2 !=null)<option <?php if(@$weekly[0]->mark == $ma->name2) echo"selected"; ?> value="{{$ma->name2}}">{{$ma->name2}} </option>@endif
                        @if($ma->name3 !=null)<option <?php if(@$weekly[0]->mark == $ma->name3) echo"selected"; ?> value="{{$ma->name3}}">{{$ma->name3}} </option>@endif
                        @if($ma->name4 !=null)<option <?php if(@$weekly[0]->mark == $ma->name4) echo"selected"; ?> value="{{$ma->name4}}">{{$ma->name4}} </option>@endif
                        @if($ma->name5 !=null)<option <?php if(@$weekly[0]->mark == $ma->name5) echo"selected"; ?> value="{{$ma->name5}}">{{$ma->name5}} </option>@endif
                        @if($ma->name6 !=null)<option <?php if(@$weekly[0]->mark == $ma->name6) echo"selected"; ?> value="{{$ma->name6}}">{{$ma->name6}} </option>@endif
						@endforeach
								 </select>
                              <label>mark</label>
                          <span id="sp"><input  name="mark_div/Su" type="number" style="width:28%" value="{{@$weekly[0]->mark_div}}"></span>
                          </td>
                     </tr> 
                    <tr id="monday">
                        <td>Monday
                         <input type="hidden" name="day/Mo" value="Monday">
                         <input type="hidden" name="year/Mo" value="{{$year}}">
                         <input type="hidden" name="term/Mo" value="{{$term_i}}">
                         <input type="hidden" name="week/Mo" value="{{$wee}}">
                         <input type="hidden" name="subject/Mo" value="{{$subject}}">
                         <input type="hidden" name="teacher/Mo" value="{{$teacher}}">
                        <input type="hidden" name="grade/Mo" value="{{$grad}}">
                        </td>
                        
                         <td><input name="lesson/Mo" type="text" class="form-control" value="{{@$weekly[1]->lesson}}"></td>
                        <td><input onkeyup="valed(this)" name="Homework/Mo" type="text" class="form-control" value="{{@$weekly[1]->homework}}"></td>
                        <td id="hp">Page : <input name="Phf/Mo" type="number" style="width:14%" value="{{@$weekly[1]->home_from}}"> <input name="Pht/Mo" type="number" style="width:14%" value="{{@$weekly[1]->home_to}}"></td>
                        <td><input onkeyup="vale(this)" name="Assign/Mo" type="text" class="form-control" value="{{@$weekly[1]->assign}}"></td>
                           <td id="ap" style="width:13%">Page : <input name="Paf/Mo" type="number" style="width:28%" value="{{@$weekly[1]->assign_from}}"> <input name="Pat/Mo" type="number" style="width:28%" value="{{@$weekly[1]->assign_to}}"></td>
                          <td> <select onchange="val(this)" name="mark/Mo" id="assignment"  class="form-control">
						<option selected value="">Choose Assigment</option>
						@foreach($marker as $ma)
						@if($ma->name1 !=null)<option <?php if(@$weekly[1]->mark == $ma->name1) echo"selected"; ?> value="{{$ma->name1}}">{{$ma->name1}} </option>@endif
                        @if($ma->name2 !=null)<option <?php if(@$weekly[1]->mark == $ma->name2) echo"selected"; ?> value="{{$ma->name2}}">{{$ma->name2}} </option>@endif
                        @if($ma->name3 !=null)<option <?php if(@$weekly[1]->mark == $ma->name3) echo"selected"; ?> value="{{$ma->name3}}">{{$ma->name3}} </option>@endif
                        @if($ma->name4 !=null)<option <?php if(@$weekly[1]->mark == $ma->name4) echo"selected"; ?> value="{{$ma->name4}}">{{$ma->name4}} </option>@endif
                        @if($ma->name5 !=null)<option <?php if(@$weekly[1]->mark == $ma->name5) echo"selected"; ?> value="{{$ma->name5}}">{{$ma->name5}} </option>@endif
                        @if($ma->name6 !=null)<option <?php if(@$weekly[1]->mark == $ma->name6) echo"selected"; ?> value="{{$ma->name6}}">{{$ma->name6}} </option>@endif
						@endforeach
								 </select>
                              <label>mark</label>
                        <span id="sp"><input name="mark_div/Mo" type="number" style="width:28%" value="{{@$weekly[1]->mark_div}}"></span>
                        </td>
                     </tr>
                    <tr id="tuesday">
                        <td>Tuesday
                        <input type="hidden" name="day/Tu" value="Tuesday">
                        <input type="hidden" name="year/Tu" value="{{$year}}">
                         <input type="hidden" name="term/Tu" value="{{$term_i}}">
                         <input type="hidden" name="week/Tu" value="{{$wee}}">
                         <input type="hidden" name="subject/Tu" value="{{$subject}}">
                         <input type="hidden" name="teacher/Tu" value="{{$teacher}}">
                        <input type="hidden" name="grade/Tu" value="{{$grad}}">
                        </td>
                        
                         <td><input name="lesson/Tu" type="text" class="form-control" value="{{@$weekly[2]->lesson}}"></td>
                        <td><input onkeyup="valed(this)" name="Homework/Tu" type="text" class="form-control" value="{{@$weekly[2]->homework}}"></td>
                        <td id="hp">Page : <input type="number" name="Phf/Tu" style="width:14%" value="{{@$weekly[2]->home_from}}"> <input name="Pht/Tu" type="number" style="width:14%" value="{{@$weekly[2]->home_to}}"></td>
                        <td><input onkeyup="vale(this)" name="Assign/Tu" type="text" class="form-control" value="{{@$weekly[2]->assign}}"></td>
                           <td id="ap" style="width:13%">Page : <input name="Paf/Tu" type="number" style="width:28%" value="{{@$weekly[2]->assign_from}}"> <input name="Pat/Tu" type="number" style="width:28%" value="{{@$weekly[2]->assign_to}}"></td>
                          <td> <select onchange="val(this)" name="mark/Tu" id="assignment"  class="form-control">
						<option selected value="">Choose Assigment</option>
						@foreach($marker as $ma)
						@if($ma->name1 !=null)<option <?php if(@$weekly[2]->mark == $ma->name1) echo"selected"; ?> value="{{$ma->name1}}">{{$ma->name1}} </option>@endif
                        @if($ma->name2 !=null)<option <?php if(@$weekly[2]->mark == $ma->name2) echo"selected"; ?> value="{{$ma->name2}}">{{$ma->name2}} </option>@endif
                        @if($ma->name3 !=null)<option <?php if(@$weekly[2]->mark == $ma->name3) echo"selected"; ?> value="{{$ma->name3}}">{{$ma->name3}} </option>@endif
                        @if($ma->name4 !=null)<option <?php if(@$weekly[2]->mark == $ma->name4) echo"selected"; ?> value="{{$ma->name4}}">{{$ma->name4}} </option>@endif
                        @if($ma->name5 !=null)<option <?php if(@$weekly[2]->mark == $ma->name5) echo"selected"; ?> value="{{$ma->name5}}">{{$ma->name5}} </option>@endif
                        @if($ma->name6 !=null)<option <?php if(@$weekly[2]->mark == $ma->name6) echo"selected"; ?> value="{{$ma->name6}}">{{$ma->name6}} </option>@endif
						@endforeach
								 </select>
                              <label>mark</label>
                              <span id="sp"><input name="mark_div/Tu" type="number" style="width:28%" value="{{@$weekly[2]->mark_div}}"></span>
</td>
                     </tr>
                     <tr id="wednesday">
                        <td>Wednesday
                          <input type="hidden" name="day/We" value="Wednesday">
                         <input type="hidden" name="year/We" value="{{$year}}">
                         <input type="hidden" name="term/We" value="{{$term_i}}">
                         <input type="hidden" name="week/We" value="{{$wee}}">
                         <input type="hidden" name="subject/We" value="{{$subject}}">
                         <input type="hidden" name="teacher/We" value="{{$teacher}}">
                        <input type="hidden" name="grade/We" value="{{$grad}}">
                        </td>
                         
                          <td><input name="lesson/We" type="text" class="form-control" value="{{@$weekly[3]->lesson}}"></td>
                         <td><input onkeyup="valed(this)" name="Homework/We" type="text" class="form-control" value="{{@$weekly[3]->homework}}"></td>
                         <td id="hp">Page : <input name="Phf/We" type="number" style="width:14%" value="{{@$weekly[3]->home_from}}"> <input name="Pht/We" type="number" style="width:14%" value="{{@$weekly[3]->home_to}}"></td>
                         <td><input onkeyup="vale(this)" name="Assign/We" type="text" class="form-control" value="{{@$weekly[3]->assign}}"></td>
                           <td id="ap" style="width:13%">Page : <input name="Paf/We" type="number" style="width:28%" value="{{@$weekly[3]->assign_from}}"> <input name="Pat/We" type="number" style="width:28%" value="{{@$weekly[3]->assign_to}}"></td>
                          <td> <select onchange="val(this)" name="mark/We" id="assignment" class="form-control">
						<option selected value="">Choose Assigment</option>
						@foreach($marker as $ma)
						@if($ma->name1 !=null)<option <?php if(@$weekly[3]->mark == $ma->name1) echo"selected"; ?> value="{{$ma->name1}}">{{$ma->name1}} </option>@endif
                        @if($ma->name2 !=null)<option <?php if(@$weekly[3]->mark == $ma->name2) echo"selected"; ?> value="{{$ma->name2}}">{{$ma->name2}} </option>@endif
                        @if($ma->name3 !=null)<option <?php if(@$weekly[3]->mark == $ma->name3) echo"selected"; ?> value="{{$ma->name3}}">{{$ma->name3}} </option>@endif
                        @if($ma->name4 !=null)<option <?php if(@$weekly[3]->mark == $ma->name4) echo"selected"; ?> value="{{$ma->name4}}">{{$ma->name4}} </option>@endif
                        @if($ma->name5 !=null)<option <?php if(@$weekly[3]->mark == $ma->name5) echo"selected"; ?> value="{{$ma->name5}}">{{$ma->name5}} </option>@endif
                        @if($ma->name6 !=null)<option <?php if(@$weekly[3]->mark == $ma->name6) echo"selected"; ?> value="{{$ma->name6}}">{{$ma->name6}} </option>@endif
						@endforeach
								 </select>
                              <label>mark</label>
                              <span id="sp"><input name="mark_div/We" type="number" style="width:28%" value="{{@$weekly[3]->mark_div}}"></span>
</td>
                     </tr>
                    <tr id="thursday">
                        <td>Thursday
                         <input type="hidden" name="day/Th" value="Thursday">
                         <input type="hidden" name="year/Th" value="{{$year}}">
                         <input type="hidden" name="term/Th" value="{{$term_i}}">
                         <input type="hidden" name="week/Th" value="{{$wee}}">
                         <input type="hidden" name="subject/Th" value="{{$subject}}">
                         <input type="hidden" name="teacher/Th" value="{{$teacher}}">
                        <input type="hidden" name="grade/Th" value="{{$grad}}">
                        </td>
                         <td><input name="lesson/Th" type="text" class="form-control" value="{{@$weekly[4]->lesson}}"></td>
                        <td><input onkeyup="valed(this)" name="Homework/Th" type="text" class="form-control" value="{{@$weekly[4]->homework}}"></td>
                         <td id="hp">Page : <input name="Phf/Th" type="number" style="width:14%" value="{{@$weekly[4]->home_from}}"> <input name="Pht/Th" type="number" style="width:14%" value="{{@$weekly[4]->home_to}}"></td>
                        <td><input onkeyup="vale(this)" name="Assign/Th" type="text" class="form-control" value="{{@$weekly[4]->assign}}"></td>
                           <td id="ap" style="width:13%">Page : <input name="Paf/Th" type="number" style="width:28%" value="{{@$weekly[4]->assign_from}}"> <input name="Pat/Th" type="number" style="width:28%" value="{{@$weekly[4]->assign_to}}"></td>
                          <td> <select onchange="val(this)" name="mark/Th" id="assignment"  class="form-control">
						<option selected value="">Choose Assigment</option>
						@foreach($marker as $ma)
						@if($ma->name1 !=null)<option <?php if(@$weekly[4]->mark == $ma->name1) echo"selected"; ?> value="{{$ma->name1}}">{{$ma->name1}} </option>@endif
                        @if($ma->name2 !=null)<option <?php if(@$weekly[4]->mark == $ma->name2) echo"selected"; ?> value="{{$ma->name2}}">{{$ma->name2}} </option>@endif
                        @if($ma->name3 !=null)<option <?php if(@$weekly[4]->mark == $ma->name3) echo"selected"; ?> value="{{$ma->name3}}">{{$ma->name3}} </option>@endif
                        @if($ma->name4 !=null)<option <?php if(@$weekly[4]->mark == $ma->name4) echo"selected"; ?> value="{{$ma->name4}}">{{$ma->name4}} </option>@endif
                        @if($ma->name5 !=null)<option <?php if(@$weekly[4]->mark == $ma->name5) echo"selected"; ?> value="{{$ma->name5}}">{{$ma->name5}} </option>@endif
                        @if($ma->name6 !=null)<option <?php if(@$weekly[4]->mark == $ma->name6) echo"selected"; ?> value="{{$ma->name6}}">{{$ma->name6}} </option>@endif
						@endforeach
								 </select>
                              <label>mark</label>
                              <span id="sp"><input name="mark_div/Th" type="number" style="width:28%" value="{{@$weekly[4]->mark_div}}"></span>
                        </td>
                     </tr>
                               <tfoot>
                               <div class="col-sm-12" style="text-align:center">
                                
                                   <tr><td><input id="add" type="submit" value="Save /Update" name="submit" class="btn btn-primary "></td></tr> 
							</div>
                                   </tfoot>
                              
                            </form>
     </tbody>
                        <!-- // Table body END -->
                    </table>
@endif
					

					</div>
				</div>
	</div>
	 
	@endsection

	@section('footer')
	<script>
		
$("#department").change(function() {
 var val = $(this).val();
	$('#leaveEmployee').html('');
	var info = 'val=' + val;
     $('#leaveEmployee').append('<option selected disabled>Choose Teacher</option>');
   $.ajax({
                            type: "GET",
                            url: "/school/public/chooseteacher",
                            data: info,
                            
                            success: function(e){
                                obj = JSON.parse(e);
								for(var i=0 ; i<obj.length ;i++){
									$('#leaveEmployee').append('<option value="'+obj[i].id+'">'+obj[i].Full_name+'</option>');
								}
                       
                            }
                        });
});
$("#leaveEmployee").change(function() {
 var val = $(this).val();
	$('#grade').html('');
	var info = 'val=' + val;
    $('#teacher').val(val);
    $('#grade').append('<option selected disabled>Choose Grade</option>');
   $.ajax({
                            type: "GET",
                            url: "/school/public/choosegrade",
                            data: info,
                            
                            success: function(e){
                                
                                obj = JSON.parse(e);
                                
                                for( i in obj){
                                    console.log(obj[i]) ;
                                 $('#grade').append('<option value="'+obj[i][0].id+'">'+obj[i][0].value+'</option>');   
                                }
								
                       
                            }
                        });
});
$("#grade").change(function() {
 var val = $(this).val();
	$('#subject').html('');
	var info = 'val=' + val+'&teacher='+$('#teacher').val();
   $.ajax({
                            type: "GET",
                            url: "/school/public/choosesubject",
                            data: info,
                            
                            success: function(e){
                                obj = JSON.parse(e);
								for(var i=0 ; i<obj.length ;i++){
									$('#subject').append('<option value="'+obj[i][0].id+'">'+obj[i][0].value+'</option>');
								}
                       
                            }
                        });
});
	$("#week").change(function() {
 var val = $(this).val();
	var c = $('#week option:selected').text();
      $('#wek').text(c);
});
	</script>
	<script>
function valed(id){
    var day = id.parentElement.parentElement.id ;
    if(id.value != '' ){
    
    $('#'+day+' #hp input').prop('required',true);
    }
    else{
      $('#'+day+' #hp input').removeAttr('required');;  
    }
}
        function vale(id){
    var day = id.parentElement.parentElement.id ;
    if(id.value != '' ){
    
    $('#'+day+' #ap input').prop('required',true);
    }
    else{
      $('#'+day+' #ap input').removeAttr('required');;  
    }
}
         function val(id){
    var day = id.parentElement.parentElement.id ;
    if(id.value != '' ){
    
    $('#'+day+' #sp input').prop('required',true);
    }
    else{
      $('#'+day+' #sp input').removeAttr('required');;  
    }
}
</script>
	@endsection