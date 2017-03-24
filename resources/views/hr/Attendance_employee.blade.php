@extends('layouts.app')
@section('title')

login
@endsection
@section('header')
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
<h3>Attendance</h3>
        <div class="innerLR">
            <!-- Widget -->
           
            <div class="widget">
                <div class="widget-body innerAll inner-2x">
                  
                   <form  action="{{url('Manageempolyee')}}" method="post"  class="form-inline">
                   {{ csrf_field() }}
                      
                   <div class="col-sm-3 " style="margin-bottom:9px">
                    <select id="department" name='department' class="form-control">
						<option selected disabled>Choose Department</option>
						@foreach($emp as $de)
						<option <?php if(@$depatment == $de->id){echo("selected");}?>  value="{{$de->id}}">{{$de->value}}</option>
						@endforeach
								 </select>
                     
                     </div>
                     <div class="col-sm-5 " style="margin-bottom:9px">
                         @if(!isset($pos))
                    <select id="position" name='position' class="form-control">
						
						</select>
                         @else
                        <select id="position" name='position' class="form-control">
						@foreach($pos as $de)
						<option <?php if(@$position == $de->id){echo("selected");}?>  value="{{$de->id}}">{{$de->value}}</option>
						@endforeach
						</select>
                         @endif
                     <button id="but" class="btn btn-primary added" >Select</button>
                     </div>
					</form>
					
                   <form  action="{{url('processattend')}}" method="post"  class="form-inline">
                   {{ csrf_field() }}
                  <div class="col-sm-3 ">
                  <label for="exampleInputlass">Date: </label>
								 <input  name="dat" type="text"class="form-control" id="datepicker" value="{{date('Y-m-d')}}">
					</div>
                    <br>
                    <!-- Table -->
                    <table class="table table-striped table-responsive swipe-horizontal table-primary">
                        <!-- Table heading -->

                        
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Department</th>
                                <th>Position</th>
                                <th>Absence</th>
                                <th>Tardiness</th>
                                <th>Note</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <!-- // Table heading END -->
                        <!-- Table body -->
                        <tbody>
@if(isset($depar))

                                @foreach($depar as $stu)
                                <tr class="gradeA">

                                    <td class="col-sm-5">{{ $stu->Full_name }}</td>
                                    @if(isset($der))
                                    <td>{{$der}}</td>
                                    @else
                                    <td >{{ @$stu->Depatment }}</td>
                                    @endif
                                     @if(isset($dep))
                                    <td>{{$dep}}</td>
                                    @else
                                    <td >{{ @$stu->Position }}</td>
                                    @endif
                                    <td ><input type="radio" name="{{ $stu->id }}" value="Absence"></td>   
                                    <td ><input type="radio" name="{{ $stu->id }}" value="Tardiness"></td>   
									<td><input name="note/{{ $stu->id }}" type="text" class="form-control" id="exampleInputsubject" placeholder="Note "></td>
                                </tr>
  @endforeach 
                               @endif
                               
                                </div>
                               
                        </tbody>
                        @if(isset($classs_id)) 
                        <input  style="text-align:center"type="hidden"  name="grade" value="{{$classs_id}}">
                          @endif
				</div>
                        <!-- // Table body END -->
                    </table>
                    <input  style="text-align:center"type="submit" value="Save" name="submit" class="btn btn-primary ">
					
				</form>
               
                </div>
            </div>
            
       
       <div id="confirm" class="modal fade" role='dialog'>

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">أ—</button>
                    <h4 class="modal-title">Delete </h4>
                </div>
                <div class="modal-body">
                    <p>Do You Really Want to Delete This ?</p>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <span id= 'deleteButton'></span>
                </div>

            </div>
        </div>
    </div> 
@endsection
@section('footer')
<script>
$("#department").change(function() {
 var val = $(this).val();
	$('#position').html('');
	var info = 'val=' + val;
   $.ajax({
                            type: "GET",
                            url: "/school/public/chooseposition",
                            data: info,
                            
                            success: function(e){
                                obj = JSON.parse(e);
								for(var i=0 ; i<obj.length ;i++){
									$('#position').append('<option value="'+obj[i].id+'">'+obj[i].value+'</option>');
								}
                       
                            }
                        });
});
</script>
@endsection