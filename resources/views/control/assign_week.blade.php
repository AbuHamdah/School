@extends('layouts.app')
@section('title')

login
@endsection
@section('header')

@endsection

@section('content')
<h3>Assignments</h3>
        <div class="innerLR">
            <!-- Widget -->
           
            <div class="widget">
                <div class="widget-body innerAll inner-2x">
        
                    <br>
                    <!-- Table -->
                    <table class="table table-striped table-responsive swipe-horizontal table-primary">
                        <!-- Table heading -->

                        
                        <thead>
                            <tr>
                                <th>Assignments</th>
                                <th>Grade</th>
                                <th>Subject</th>
                                <th>Week</th>
                                <th>Status</th>
                                <th>Select</th>
                            </tr>
                        </thead>
                        <!-- // Table heading END -->
                        <!-- Table body -->
                        <tbody>
@if(isset($array))

                                @foreach($array as $arr)
                                <tr class="gradeA">

                                    <td>{{$arr['value']}}</td>
                                    <td>{{$arr['grade']}}</td>
                                    <td>{{$arr['subject']}}</td>
                                    <td>{{$arr['week']}}</td>
                                    <td>{{$arr['status']}}</td>
                                    <td > <a style="color:white" class='btn btn-primary' href="selectAssign/{{$arr['id']}}" >Select</a>
                                    
                            </td>   
                                      
                                </tr>
  @endforeach 
                               @endif
                               
                               
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