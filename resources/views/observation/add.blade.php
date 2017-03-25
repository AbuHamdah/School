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
	<h3>Add Observation</h3>
			<div class="innerLR">
				<!-- Widget -->

				<div class="widget">
					<div class="widget-body innerAll inner-2x row">
<input type="hidden" id="teacher">

	<form  id="target" role="form" action="{{url('observation_choose')}}" method="post"enctype="multipart/form-data">
						{{ csrf_field() }}
						  <div class="row">
 
                              <div class="col-sm-4">
									<label for="exampleInputlass">Observation type</label>
								 <select name="obv"  class="form-control">
						<option selected disabled>Choose type</option>
						@foreach($observ as $de)
						<option  value="{{$de->id}}">{{$de->name}}</option>
						@endforeach
								 </select>
							</div>
                              
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
                                  <label for="exampleInputlass">Date</label>
                                  @if(isset($date))
                    <input  name="dat" type="text"class="form-control" id="datepicker" value="{{$date}}">
                                  @else
                               <input  name="dat" type="text"class="form-control" id="datepicker" value="{{date('Y-m-d')}}">   
                                  @endif
                        </div>
							 
							  
		</div>
					 
						 <div class="field" style="margin-top:30px">
						 	
						 	
						 </div>

				
			
						<div class="col-sm-12" style="text-align:center">

								<input id="add" type="submit" value="Choose" name="submit" class="btn btn-primary "> 
							</div>
							
					</form>

					</div>

          @if(!empty($obser_option))
                    <form  id="target" role="form" action="{{url('observationResult')}}" method="post"enctype="multipart/form-data">
						{{ csrf_field() }}
                        <input type="hidden" name="subject" value="{{$subject}}">
                        <input type="hidden" name="grade" value="{{$grad}}">
                        <input name="term" type="hidden" value="{{$term_i}}">
                        <input name="year" type="hidden" value="{{$year}}">
                        <input name="date" type="hidden" value="{{$date}}">
                        <input name="teacher" type="hidden" value="{{$teacher}}">
                         <input name="type" type="hidden" value="{{$type}}">
                       <table class="table table-striped table-responsive swipe-horizontal table-primary" id="dataTables-example">
                        <!-- Table heading -->
                 
                    <h4> Teacher name : {{@$teacher_name}}</h4> 
                    <h4>Subject name : {{@$subject_name}} </h4>
                    <h4>Grade name : {{@$grade_name}}  </h4>
                   <h4> Observation type : {{@$observation_name}} </h4>
                        <!-- // Table heading END -->
                        <!-- Table body -->
                           
                        <tbody>
                           
                         @foreach($obser_option as $soc)
                        <tr>               
                        <td>{{ $soc->name }}</td>
                        
                        <td><select name="{{$soc->id}}" id="{{$soc->id }}">
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="0">NA</option>

							</select></td>
							</tr>
                       
                        
                        @endforeach
                            
                        </tbody>
                          <textarea name="note" placeholder="note" class="form-control"></textarea>
                              <tfoot>
<tr>
 <td><input id="add" type="submit" value="Save/Update" name="submit" class="btn btn-primary "> </td>
</tr>
							</tfoot>  
                              
                       
                           
                        <!-- // Table body END -->
                    </table>
</form> 
       @endif                        
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
$(".type").change(function() {
 var val = $(this).val();
    var par = $(this).parent().parent().attr('id') ;
	$('#'+par+' #option').html('');
	var info = 'val=' + val;
    
   $.ajax({
                            type: "GET",
                            url: "/school/public/chooseoption",
                            data: info,
                            
                            success: function(e){
                                obj = JSON.parse(e);
								for(var i=0 ; i<obj.length ;i++){
									$('#'+par+' #option').append('<option value="'+obj[i].id+'">'+obj[i].name+'</option>');
								}
                       
                            }
                        });
});

	</script>
	
	@endsection