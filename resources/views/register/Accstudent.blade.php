@extends('layouts.app')
@section('title')

login
@endsection
@section('header')

@endsection

@section('content')
<h3>Manage students</h3>
        <div class="innerLR">
            <!-- Widget -->
           
            <div class="widget">
                <div class="widget-body innerAll inner-2x">
                  <div class="col-sm-5 ">
                   <form  action="{{url('Managestudent')}}" method="post"  class="form-inline">
                   {{ csrf_field() }}
                    <select id="exampleInputlass" name='grade' class="form-control">
						<option selected disabled>Choose Grade</option>
                        @foreach($grade as $gr)
						<option  value="{{$gr->id}}">{{$gr->value}}</option>
						@endforeach
						</select>
                     <button id="but" class="btn btn-primary added" >Select</button>
					</form>
					</div>
                  
                    <br>
                    <!-- Table -->
                    <table class="table table-striped table-responsive swipe-horizontal table-primary">
                        <!-- Table heading -->

                        <?php $i=1 ?>
                        <thead>
                            <tr>
                               <th></th>
                                <th>Student Name</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <!-- // Table heading END -->
                        <!-- Table body -->
                        <tbody>
@if(isset($student))

                                @foreach($student as $stu)
                                <tr class="gradeA">
                                    <td >{{ $i++ }}</td>
                                    <td >{{ $stu->Full_name }}</td>
                                    <td > <a style="color:white" class='btn btn-primary' href="Editstudent/{{$stu->id}}" >Edit</a>
                            </td>   
                                    <td > <a style="color:white" class='btn btn-primary' onclick="delete_row('{{$stu->id}}', 15);" id="delete_{{$stu->id}}" >Delete</a>
                                        </td> 
                                        <td > <a style="color:white" class='btn btn-primary' href="Withdrawstudent/{{$stu->id}}" >Withdraw</a>
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
<
    
@endsection
@section('footer')
@endsection