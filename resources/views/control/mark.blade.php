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
	<h3>Enter Marks</h3>
			<div class="innerLR">
				<!-- Widget -->

				<div class="widget">
					<div class="widget-body innerAll inner-2x row">


	<form  id="target" role="form" action="{{url('chooseRecord')}}" method="post"enctype="multipart/form-data">
						{{ csrf_field() }}
						  <div class="row">

						<div class="col-sm-4">
									<label for="exampleInputlass">grade</label>
								 <select id="grade" name="grade" class="form-control">
						<option selected disabled>Choose Grade</option>
						@foreach($grade as $ge)
						<option  value="{{$ge->id}}">{{$ge->value}}</option>
						@endforeach
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
							 
							  
		</div>
					 
						 <div class="field" style="margin-top:30px">
						 	
						 	
						 </div>

				
			
						<div class="col-sm-12" style="text-align:center">

								<input id="add" type="submit" value="Choose" name="submit" class="btn btn-primary "> 
							</div>
							
					</form>

					</div>
                    @if(!empty($array))
                       <table class="table table-striped table-responsive swipe-horizontal table-primary" id="dataTables-example">
                        <!-- Table heading -->
                 
                        <thead>
                            <tr>
                                <th>Student Name</th>
                                @foreach($subj as $sub)
                                <th>{{$sub->value}}</th>
                             @endforeach
                                <th>AVG%</th>
                            </tr>
                        </thead>
                        <!-- // Table heading END -->
                        <!-- Table body -->
                           
                        <tbody>
                            
@foreach($array as $arr=>$ar)
                            <?php $v=0; ?>
                 <tr>
                     
              <td>{{$arr}}</td>              
               
 @foreach($ar as $index => $val)
            <td>{{$val}}</td>
                <?php $v = $val+$v; ?>
         @endforeach
                   <td>{{$v/$coun}}</td>   
             @endforeach
                    
                     </tr>  
     </tbody>
                        <!-- // Table body END -->
                           <tfoot>
                           <td> <button id="export" class=" btn btn-primary">Export</button></td>
                           </tfoot>
                    </table>

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
                            url: "/school/public/choosesubject",
                            data: info,
                            
                            success: function(e){
                                obj = JSON.parse(e);
								for(var i=0 ; i<obj.length ;i++){
									$('#subject').append('<option value="'+obj[i].id+'">'+obj[i].value+'</option>');
								}
                       
                            }
                        });
});
 function calc(t) {
  var val = t.value;
    var th = t.id;
     var tot = Number(val);
 var pare = t.parentElement.parentElement.id;
  $('#'+pare).children().children().each(function (va){   
var item = $(this).attr('id');
if(item != null ){
    if(item != th){
    tot =tot + Number($('#'+pare+' #'+item).val()) 
}}
});
            $('#'+pare+' #tot').text(tot);
            $('#'+pare+' #avg').text(tot*100/Number($('#total').text()));
    
 }
	</script>
  <script>
$("#export").click(function(e){
    e.preventDefault();
    $('#dataTables-example').tableExport({type:'excel',escape:'false' , Worksheet:'Report'});
 
});


</script>
	@endsection