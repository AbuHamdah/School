@extends('layouts.app')
@section('title')

login
@endsection
@section('header')

@endsection

@section('content')
<h3>Class Lists</h3>
        <div class="innerLR">
            <!-- Widget -->
           
            <div class="widget">
                <div class="widget-body innerAll inner-2x">
                    
                    <div class="col-sm-5 ad">
                      <form  action="{{url('addBus')}}" method="post"  class="form-inline">
                      {{ csrf_field() }}
                       <input type="text"  name="clas" class="form-control" >
                        <button id="but" class="btn btn-primary added" data-toggle="modal" data-target="#myModal">Add bus</button>
						</form>
                    </div>
                    <br>
                    <!-- Table -->
                    <table class="table table-striped table-responsive swipe-horizontal table-primary">
                        <!-- Table heading -->

                        
                        <thead>
                            <tr>
                               <th>#</th>
                                <th>Bus</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <!-- // Table heading END -->
                        <!-- Table body -->
                        <tbody>

@foreach($bus as $class)
                                <tr class="gradeA">

                                   <td>{{ $class->id }}</td>
                                    <td>{{ $class->value }}</td>
                                    <td> <input type="submit" value="Edit" class='btn btn-primary  edit' id="edit_{{$class->id}}"  onclick="edit_row('{{$class->id}}', 'contact_table');">
                                        <input type='submit' class="btn btn-primary  save" id="save_{{$class->id}}" value="Save" onclick="save_row('{{$class->id}}', 'bus_table');" style="display:none"></td>   
                                    <td> <input name="remove_levels" type="submit" value="Delete" class='btn btn-primary delete launchConfirm'  id="delete_{{$class->id}}" href='#'onclick="delete_row('{{$class->id}}',20);" >
                                        <input type='submit' class="btn btn-primary  cancel" id="cancel_{{$class->id}}" value="Cancel" onclick="cancel_row('{{$class->id}}', 'bus_table');" style="display:none"></td>  
                                      
                                </tr>
                                     
     
  @endforeach 
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
                    <span id="deleteButton"></span>
                </div>

            </div>
        </div>
    </div>

    
@endsection
@section('footer')
@endsection