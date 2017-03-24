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
	  $( "#datepick" ).datepicker({ dateFormat: 'yy-mm-dd' });
  } );
  </script>
@endsection

@section('content')
<h3>Attendance</h3>
        <div class="innerLR">
            <!-- Widget -->
           
            <div class="widget">
                <div class="widget-body innerAll inner-2x">
                  
                   <form  action="{{url('bydateempolyee')}}" method="post"  class="form-inline">
                   {{ csrf_field() }}
                   <div class="col-sm-2 " style="margin-bottom:9px">
                    <select id="department" name='department' class="form-control">
						<option selected disabled>Choose Department</option>
						@foreach($emp as $de)
						<option <?php if(@$depatment == $de->id){echo("selected");}?>  value="{{$de->id}}">{{$de->value}}</option>
						@endforeach
								 </select>
                     
                     </div>
                     <div class="col-sm-2 " style="margin-bottom:9px">
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
                   
                     </div>
                      <div class="col-sm-4 ">
                  <label for="exampleInputlass">Date From: </label>
								 <input  name="dat_f" type="text"class="form-control" id="datepicker">
					</div>
                    <div class="col-sm-4 ">
                  <label for="exampleInputlass">Date To: </label>
								 <input  name="dat_t" type="text"class="form-control" id="datepick">
					</div>
					  <button id="but" style="margin-bottom:10px" class="btn btn-primary added pull-left">Select</button>
					</form>
					
                 
                    <!-- Table -->
                    <table class="table table-striped table-responsive swipe-horizontal table-primary">
                        <!-- Table heading -->

                        
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Department</th>
                                <th>Position</th>
                                <th>Date</th>
                                 <th>Note</th>
                                <th>Tardiness</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <!-- // Table heading END -->
                        <!-- Table body -->
                      <tbody>
@if(isset($Attendan))

                                @foreach($Attendan as $att => $val)
                                <tr class="gradeA">

                                    <td >{{ @$val['name'] }}</td>
                                    <td >{{ @$val['department'] }}</td>
                                    <td >{{ @$val['position'] }}</td>
                                    <td >{{ @$val['date'] }}</td>
                                    <td >{{ @$val['note'] }}</td>
                                    <td >{{ @$val['tardiness'] }}</td>
                                    
                                    <td> <input type="submit" value="Edit" class='btn btn-primary  edit' id="edit_{{$val['id']}}"  onclick="edit_row('{{$val['id']}}', 'attendan_table');">
                                        <input type='submit' class="btn btn-primary  save" id="save_{{$val['id']}}" value="Save" onclick="save_row('{{$val['id']}}', 'attendan_table');" style="display:none"></td>   
                                    <td> <input name="remove_levels" type="submit" value="Delete" class='btn btn-primary delete launchConfirm' onclick="delete_row('{{$val['id']}}', 6);" id="delete_{{$val['id']}}" href='#' >
                                        <input type='submit' class="btn btn-primary  cancel" id="cancel_{{$val['id']}}" value="Cancel" onclick="cancel_row('{{$val['id']}}', 'attendan_table');" style="display:none"></td>
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