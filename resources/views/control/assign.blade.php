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
	<h3>Assign subject</h3>
			<div class="innerLR">
				<!-- Widget -->

				<div class="widget">
					<div class="widget-body innerAll inner-2x row">


	<form  id="target" role="form" action="{{url('assign_save')}}" method="post"enctype="multipart/form-data">
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
						@foreach($grade as $ge)
						<option  value="{{$ge->id}}">{{$ge->value}}</option>
						@endforeach
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
						 <label for="exampleInputlass">Choose lesson NO.</label>
								 <input type="number" class="form-control" >
							
							  </div>
							  	<div class="col-sm-4">
						 <label for="exampleInputlass">Choose Mark NO.</label>
								 <input type="number" class="form-control" id="lesson" name="lesson">
							
							  </div>
							  
		</div>
					 
						 <div class="field" style="margin-top:30px">
						 	
						 	
						 </div>

				
			
						<div class="col-sm-12" style="text-align:center">

								<input id="add" type="submit" value="Assign/Save" name="submit" class="btn btn-primary "> 
							</div>
							
					</form>

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
$("#grade").change(function() {
 var val = $(this).val();
	$('#subject').html('');
	var info = 'val=' + val;
   $.ajax({
                            type: "GET",
                            url: "/school/public/choosesubjects",
                            data: info,
                            
                            success: function(e){
                                obj = JSON.parse(e);
								for(var i=0 ; i<obj.length ;i++){
									$('#subject').append('<option value="'+obj[i].id+'">'+obj[i].value+'</option>');
								}
                       
                            }
                        });
});
		$( "#lesson" ).keyup(function() {
			$('.field').html('');
  var val = $(this).val();
            if(val >6){
                val =6;
            }
 for(var x=1 ; x<=val ; x++){
	 $('.field').append('<div class="row" style="margin-bottom:5px;" ><label class="pull-left">m'+x+'</label><div class="col-sm-2"><input type="text" placeholder="Name" name="name'+x+'"></div><div class="col-sm-2"><input type="text" placeholder="Mark" name="mark'+x+'"></div></div>')
 }
});
	</script>
	
	@endsection