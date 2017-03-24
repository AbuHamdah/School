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
	<h3>Leave Applicant</h3>
			<div class="innerLR">
				<!-- Widget -->

				<div class="widget">
					<div class="widget-body innerAll inner-2x row">


	<form  id="target" role="form" action="{{url('employee_leave')}}" method="post"enctype="multipart/form-data">
						{{ csrf_field() }}
						  <div class="col-sm-5">

							 <div class="form-group col-sm-12">
									<label for="exampleInputlass">Department</label>
								 <select id="department" name='department' class="form-control">
						<option selected disabled>Choose Department</option>
                          @foreach($emp as $em)           
						<option  value="{{$em->id}}">{{$em->value}}</option>
						@endforeach
						</select>
							</div>
							
							<div class="col-sm-12">
							
								<label for="exampleInputlass">Employee name</label>
								 <select id="leaveEmployee" name='leave' class="form-control">
						<option selected disabled>Choose employee</option>
						</select>
						</div>
					
						<div class="col-sm-12">
								<label for="exampleInputlass">Reasons</label>
							<textarea name="reason" class="form-control" id="today" ></textarea>
						
							  </div>
							   <div class="col-sm-12" style='margin-bottom:4px'>
								<label for="exampleInputsubject">Date</label>
								<input name="dat" type="text" class="form-control" id="datepicker" value="{{date('Y-m-d')}}">
							</div>
							<div class="col-sm-12">
						 
							 <div class="form-group col-sm-5" id="pad">
								<label for="exampleInputsubject">Departure time</label>
								<input name="depart" type="time" class="form-control" id="exampleInputsubject">
							</div>
							<div class="col-sm-1"></div>
							 <div class="form-group col-sm-5">
								<label for="exampleInputsubject">back time</label>
								<input name="back" type="time" class="form-control" id="exampleInputsubject">
							</div>

							  </div>
		</div>
						 

				
			
						<div class="col-sm-12" style="text-align:center">

								<input id="add" type="submit" value="Save" name="submit" class="btn btn-primary "> 
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
                            url: "/school/public/leaveemployee",
                            data: info,
                            
                            success: function(e){
                                obj = JSON.parse(e);
								for(var i=0 ; i<obj.length ;i++){
									$('#leaveEmployee').append('<option name="'+obj[i].id+'">'+obj[i].Full_name+'</option>');
								}
                       
                            }
                        });
});
	</script>
	
	@endsection