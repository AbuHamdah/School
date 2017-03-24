@extends('layouts.app')
@section('title')

login
@endsection
@section('header')

@endsection

@section('content')
<h3>Subject Lists</h3>
        <div class="innerLR">
            <!-- Widget -->
           
            <div class="widget">
                <div class="widget-body innerAll inner-2x">
                   <div class="col-sm-5 ad">
                      <form  action="{{url('addSubject')}}" method="post"  class="form-inline">
                      {{ csrf_field() }}
                       <input type="text"  name="sub" class="form-control" >
                        <button id="but" class="btn btn-primary added" data-toggle="modal" data-target="#myModal">Add subject</button>
						</form>
                    </div>
                 
                    <br>
                    <!-- Table -->
                    <table class="table table-striped table-responsive swipe-horizontal table-primary">
                        <!-- Table heading -->

                        
                        <thead>
                            <tr>
                               <th>#</th>
                                <th>Subject Name</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <!-- // Table heading END -->
                        <!-- Table body -->
                        <tbody>
@if(isset($subject))

                                @foreach($subject as $sub)
                                <tr class="gradeA">

                                   <td>{{ $sub->id }}</td>
                                    <td>{{ $sub->name }}</td>
                                    <td> <input type="submit" value="Edit" class='btn btn-primary  edit' id="edit_{{$sub->id}}"  onclick="edit_row('{{$sub->id}}', 'contact_table');">
                                        <input type='submit' class="btn btn-primary  save" id="save_{{$sub->id}}" value="Save" onclick="save_row('{{$sub->id}}', 'subject_table');" style="display:none"></td>   
                                    <td> <input name="remove_levels" type="submit" value="Delete" class='btn btn-primary delete launchConfirm' onclick="delete_row('{{$sub->id}}', 11);" id="delete_{{$sub->id}}" href='#' >
                                        <input type='submit' class="btn btn-primary  cancel" id="cancel_{{$sub->id}}" value="Cancel" onclick="cancel_row('{{$sub->id}}', 'subject_table');" style="display:none"></td>  
                                      
                                </tr>
  @endforeach 
                               @endif
                                </div>
                                <!-- // Table row END -->
                                <!-- Table row -->

                                <!-- // Table row END -->

                        </tbody>
                        <!-- // Table body END -->
                    </table>


                        <!-- // Table END -->


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