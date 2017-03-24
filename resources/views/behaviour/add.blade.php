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
	<h3>Add behaviour</h3>
			<div class="innerLR">
				<!-- Widget -->

				<div class="widget">
					<div class="widget-body innerAll inner-2x row">
<input type="hidden" id="teacher">

	<form  id="target" role="form" action="{{url('behaviour_choose')}}" method="post"enctype="multipart/form-data">
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
								 <select id="grade" name="grade" class="form-control">
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
                              <div class="col-sm-3">
                    <input  name="dat" type="text"class="form-control" id="datepicker" value="{{date('Y-m-d')}}">
                        </div>
							 
							  
		</div>
					 
						 <div class="field" style="margin-top:30px">
						 	
						 	
						 </div>

				
			
						<div class="col-sm-12" style="text-align:center">

								<input id="add" type="submit" value="Choose" name="submit" class="btn btn-primary "> 
							</div>
							
					</form>

					</div>

         
                    <form  id="target" role="form" action="{{url('BehaviourStudent')}}" method="post"enctype="multipart/form-data">
						{{ csrf_field() }}
                        
                       <table class="table table-striped table-responsive swipe-horizontal table-primary" id="dataTables-example">
                        <!-- Table heading -->
                 
                        <thead>
                            <tr>
                                <th>Student Name</th>
                                <th>Behaviour Type</th>
                                <th>Behaviour Option</th>
                                <th>Order of lecture</th>
                                <th>note</th>
                            </tr>
                        </thead>
                        <!-- // Table heading END -->
                        <!-- Table body -->
                           
                        <tbody>
                   
                     @foreach($student as $stu)
                                <tr  class="gradeA">
                                       
                                    <td ><input type="text" class="form-control " name="name/{{$stu->id}}" value="{{$stu->Full_name}}" readonly> </td>
                                   
                                 <td > <select id="type" name='type/{{$stu->id}}' class="form-control">
						<option selected disabled>Choose Type</option>
						@foreach($behav as $be)
						<option  value="{{$be->id}}">{{$be->name}}</option>
						@endforeach
								 </select></td>
                                 <td> <select id="option" name='option/{{$stu->id}}' class="form-control">
						<option selected disabled>Choose Option</option>
						</select></td>
                              
                         <td><input  value="{{@$stu->m3}}" type="number" class="form-control " name="order/{{$stu->id}}" ></td>
                               
                        <td><input  value="{{@$stu->m3}}" type="text" class="form-control " name="note/{{$stu->id}}" ></td>
                                    
                                    <input name="year/{{$stu->id}}" type="hidden" value="{{$year}}">
                                    <input name="sub/{{$stu->id}}" type="hidden" value="{{$subject}}">
                                    <input name="term/{{$stu->id}}" type="hidden" value="{{$term_i}}">
                                    <input name="grade/{{$stu->id}}" type="hidden" value="{{$grad}}">
                                  <input name="teacher/{{$stu->id}}" type="hidden" value="{{$teacher}}">
                                </tr>
 @endforeach
     </tbody>
                              <tfoot>
<tr>
 <td><input id="add" type="submit" value="Save/Update" name="submit" class="btn btn-primary "> </td>
 <td> <button id="export" class=" btn btn-primary">Export</button></td>
</tr>
							</tfoot>  
                              
                       
                           
                        <!-- // Table body END -->
                    </table>
</form> 
                              
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
$("#type").change(function() {
 var val = $(this).val();
	$('#subject').html('');
	var info = 'val=' + val;
   $.ajax({
                            type: "GET",
                            url: "/school/public/chooseoption",
                            data: info,
                            
                            success: function(e){
                                obj = JSON.parse(e);
								for(var i=0 ; i<obj.length ;i++){
									$('#option').append('<option value="'+obj[i].id+'">'+obj[i].name+'</option>');
								}
                       
                            }
                        });
});

	</script>
	<script>
$("#export").click(function(e){
    e.preventDefault();
    $('#dataTables-example').tableExport({type:'excel',escape:'false' , Worksheet:'Report'});
 
});
</script>
	@endsection