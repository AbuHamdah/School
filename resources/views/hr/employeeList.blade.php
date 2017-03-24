@extends('layouts.app')
@section('title')

login
@endsection
@section('header')

@endsection

@section('content')
<h3>Manage employees</h3>
        <div class="innerLR">
            <!-- Widget -->
           
            <div class="widget">
                <div class="widget-body innerAll inner-2x">
                  
                   <form  action="{{url('Manageempoyee')}}" method="post"  class="form-inline">
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
					
                  
                    <br>
                    <!-- Table -->
                    <table class="table table-striped table-responsive swipe-horizontal table-primary">
                        <!-- Table heading -->

                        
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Department</th>
                                <th>Position</th>
                                <th>Photo</th>
                                <th>Certification</th>
                                <th>Passport</th>
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

                                    <td >{{ @$stu->Full_name }}</td>
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
                                    <td><img style="width:50px ; height:50px"src="http://localhost/school/public/<?php echo $stu->image ;?>" /></td>
                                    <td ><a style="color:white" href="certificate/{{$stu->id}}" >View link</a></td>
                                    <td > <a style="color:white" href="passport/{{$stu->id}}" >View link</a></td>
                                    <td > <a style="color:white" class='btn btn-primary' href="Editemployee/{{$stu->id}}" >Edit</a>
                            </td>   
                                    <td > <a style="color:white" class='btn btn-primary' onclick="delete_row('{{$stu->id}}', 17);" id="delete_{{$stu->id}}" >Delete</a>
                                        </td>  
                                      
                                </tr>
  @endforeach 
                               @endif
                                </div>
                               
                        </tbody>
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