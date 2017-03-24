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
<input type="hidden" id="teacher">

	<form  id="target" role="form" action="{{url('mark_choose')}}" method="post"enctype="multipart/form-data">
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
							 
							  
		</div>
					 
						 <div class="field" style="margin-top:30px">
						 	
						 	
						 </div>

				
			
						<div class="col-sm-12" style="text-align:center">

								<input id="add" type="submit" value="Choose" name="submit" class="btn btn-primary "> 
							</div>
							
					</form>

					</div>

                    <button class="pull-right btn btn-default" id="getMark"> Get Assigment Mark</button>
                    <input value="{{$grad}}" id="gr" type="hidden">
                    <input value="{{$subject}}" id="su" type="hidden">
                    @if(!empty($assign))
                       <table class="table table-striped table-responsive swipe-horizontal table-primary" id="dataTables-example">
                        <!-- Table heading -->
                 
                        <thead>
                            <tr>
                                <th>Student Name</th>
                                
                                 @if($assign[0]->name1)
                                 <th>{{$assign[0]->name1}} / {{ $assign[0]->mark1 }}</th>
                                @endif
                                @if($assign[0]->name2)
                                <th>{{$assign[0]->name2}} / {{ $assign[0]->mark2 }}</th>
                                @endif
                                 @if($assign[0]->name3)
                                <th>{{$assign[0]->name3}} / {{ $assign[0]->mark3 }}</th>
                                @endif
                                 @if($assign[0]->name4)
                                 <th>{{$assign[0]->name4}} / {{ $assign[0]->mark4 }}</th>
                                @endif
                                 @if($assign[0]->name5)
                                <th>{{$assign[0]->name5}} / {{ $assign[0]->mark5 }}</th>
                                @endif
                                 @if($assign[0]->name6)
                                 <th>{{$assign[0]->name6}} / {{ $assign[0]->mark6 }}</th>
                                @endif
                                <th>Total / <span id="total">{{@$assign[0]->mark1 + @$assign[0]->mark2 + @$assign[0]->mark3 + @$assign[0]->mark4 + @$assign[0]->mark5 + @$assign[0]->mark6}}</span></th>
                                <th>AVG %</th>
                            </tr>
                        </thead>
                        <!-- // Table heading END -->
                        <!-- Table body -->
                           <form  id="target" role="form" action="{{url('MarkStudent')}}" method="post"enctype="multipart/form-data">
						{{ csrf_field() }}
                        <tbody>

                     @foreach($student as $stu)
                                <tr id="row{{$stu->id}}" class="gradeA {{$stu->id}}">
                                       
                                    <td ><input type="text" class="form-control " name="name/{{$stu->id}}" value="{{$stu->Full_name}}" readonly> </td>
                                    @if($assign[0]->name1)
                                 <td><input onkeyup="calc(this)" id="m1" value="{{@$stu->m1}}" type="number" class="form-control {{$assign[0]->name1}}" name="m1/{{$stu->id}}" ></td>
                                @endif
                                    @if($assign[0]->name2)
                                 <td><input onkeyup="calc(this)" id="m2" value="{{@$stu->m2}}" type="number" class="form-control {{$assign[0]->name2}}"  name="m2/{{$stu->id}}"></td>
                                @endif
                                     @if($assign[0]->name3)
                                 <td><input onkeyup="calc(this)" id="m3" value="{{@$stu->m3}}" type="number" class="form-control {{$assign[0]->name3}}" name="m3/{{$stu->id}}"></td>
                                @endif
                                     @if($assign[0]->name4)
                                 <td><input onkeyup="calc(this)" id="m4" value="{{@$stu->m4}}" type="number" class="form-control {{$assign[0]->name4}}" name="m4/{{$stu->id}}"></td>
                                @endif
                                     @if($assign[0]->name5)
                                 <td><input onkeyup="calc(this)" id="m5" value="{{@$stu->m5}}" type="number" class="form-control {{$assign[0]->name5}}"  name="m5/{{$stu->id}}"></td>
                                @endif
                                     @if($assign[0]->name6)
                                 <td><input onkeyup="calc(this)" id="m6" value="{{@$stu->m6}}" type="number" class="form-control {{$assign[0]->name6}}" name="m6/{{$stu->id}}"></td>
                                @endif
                                  <td class="tot">@if(isset($stu->total)){{$stu->total}} @else 0 @endif</td>  
                                    <td class="avg" class="">@if(isset($stu->avg)){{$stu->avg}} @else 0 @endif</td> 
                                    <input name="year/{{$stu->id}}" type="hidden" value="{{$year}}">
                                    <input name="sub/{{$stu->id}}" type="hidden" value="{{$subject}}">
                                    <input name="term/{{$stu->id}}" type="hidden" value="{{$term_i}}">
                                    <input name="grade/{{$stu->id}}" type="hidden" value="{{$grad}}">
                                   <input name="total/{{$stu->id}}" type="hidden" value="{{@$assign[0]->mark1 + @$assign[0]->mark2 + @$assign[0]->mark3 + @$assign[0]->mark4 + @$assign[0]->mark5 + @$assign[0]->mark6}}">

                                </tr>
 @endforeach
     </tbody>
                              <tfoot>
<tr>
 <td><input id="add" type="submit" value="Save/Update" name="submit" class="btn btn-primary "> </td>
 <td> <button id="export" class=" btn btn-primary">Export</button></td>
</tr>
							</tfoot>  
                         </form>      
                       
                           
                        <!-- // Table body END -->
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
            $('#'+pare+' .tot').text(tot);
            $('#'+pare+' .avg').text(tot*100/Number($('#total').text()));
    
 }
        $("#getMark").one( "click", function() {
            var grade = $("#gr").val();
             var subject = $("#su").val();
            var info = 'grade=' + grade+" &subject="+subject;
            $.ajax({
                            type: "GET",
                            url: "/school/public/getAssignment",
                            data: info,
                            
                            success: function(e){
                                console.log(e) ;
                                var obj = JSON.parse(e);
                                for (x in obj){
                                    for(z in obj[x]){
                                    console.log(obj[x][z]) ;
                                    $('.'+x+' .'+obj[x][z].assign_name).val(obj[x][z].mark);
                                    var total = Number($('.'+x+' .tot').text()) + obj[x][z].mark
                                   $('.'+x+' .tot').text(total);
                                    $('.'+x+' .avg').text(total*100/Number($('#total').text()));
                                }}

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