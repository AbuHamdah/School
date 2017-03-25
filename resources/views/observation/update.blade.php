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
	<h3>Update observation for {{$teacher_name}}</h3>
			<div class="innerLR">
				<!-- Widget -->

				<div class="widget">
					<div class="widget-body innerAll inner-2x row">
<input type="hidden" id="teacher">

					</div>

          @if(!empty($obser))
                    <form  id="target" role="form" action="{{url('observationUpdate')}}" method="post"enctype="multipart/form-data">
						{{ csrf_field() }}
                        <input type="hidden" name="subject" value="{{$subject}}">
                        <input name="date" type="hidden" value="{{$date}}">
                        <input name="teacher" type="hidden" value="{{$teacher}}">
                       <table class="table table-striped table-responsive swipe-horizontal table-primary" id="dataTables-example">
                  
                        <tbody>
                           
                         @foreach($obser as $soc)
                        <tr>               
                        <td>{{ $soc->option }}</td>
                        
                        <td><select name="{{$soc->id}}" id="{{$soc->id }}">
				<option <?php if($soc->value == '1') echo 'selected' ; ?>  value="1">1</option>
				<option <?php if($soc->value == '2') echo 'selected' ; ?>  value="2">2</option>
				<option <?php if($soc->value == '3') echo 'selected' ; ?>  value="3">3</option>
				<option <?php if($soc->value == '4') echo 'selected' ; ?>  value="4">4</option>
				<option <?php if($soc->value == '0') echo 'selected' ; ?>  value="0">NA</option>

							</select></td>
							</tr>
                       
                        
                        @endforeach
                            
                        </tbody>
                          <textarea name="note" placeholder="note" class="form-control">{{$obser[0]->note}}</textarea>
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