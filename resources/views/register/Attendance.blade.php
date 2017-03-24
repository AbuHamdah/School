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
                  <div class="col-sm-5 ">
                   <form  action="{{url('Manageattendance')}}" method="post"  class="form-inline">
                   {{ csrf_field() }}
                    <select id="exampleInputlass" name='grade' class="form-control">
						<option selected disabled>Choose Grade</option>
						@foreach($grade as $gr)
                                    
						<option <?php if($classs_id == $gr->id){echo("selected");}?> value="{{$gr->id}}">{{$gr->value}}</option>
						@endforeach
						</select>
                     <button id="but" class="btn btn-primary added" >Select</button>
					</form>
					</div>
                   <form  action="{{url('processattendance')}}" method="post"  class="form-inline">
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
                                <th>Student Name</th>
                                <th>Absence</th>
                                <th>Tardiness</th>
                                <th>Leave</th>
                                <th>Note</th>
                            </tr>
                        </thead>
                        <!-- // Table heading END -->
                        <!-- Table body -->
                        <tbody>
@if(isset($student))

                                @foreach($student as $stu)
                                <tr class="gradeA">

                                    <td class="col-sm-5">{{ @$stu->Full_name }}</td>
                                    <td ><input type="radio" name="{{ $stu->id }}" value="Absence"></td>   
                                    <td ><input type="radio" name="{{ $stu->id }}" value="Tardiness"></td>  
                                    <td ><input type="checkbox" name="leave/{{ $stu->id }}" value="Leave"></td>  
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
<
    
@endsection
@section('footer')
@endsection