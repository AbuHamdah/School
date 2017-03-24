@extends('layouts.app')
@section('title')

login
@endsection
@section('header')

@endsection

@section('content')
<h3>Location Lists</h3>
        <div class="innerLR">
            <!-- Widget -->
           
            <div class="widget">
                <div class="widget-body innerAll inner-2x">
                  <div class="col-sm-5 ">
                   <form  action="{{url('listlocation')}}" method="post"  class="form-inline">
                   {{ csrf_field() }}
                    <select  name='sub' class="form-control">
                    <option selected disabled>Choose Bus</option>
                    @foreach($bus as $class)
    <option  value="{{$class->id}}">{{ $class->value }}</option>
    @endforeach 
                    </select>
                     <button id="but" class="btn btn-primary added" >Select</button>
					</form>
					</div>
                    <div class="col-sm-5 ad">
                     
                      
                      
                        <button  class="btn btn-primary added" data-toggle="modal" data-target="#myModal">Add location</button>
                    </div>
                    <br>
                    <!-- Table -->
                    <table class="table table-striped table-responsive swipe-horizontal table-primary">
                        <!-- Table heading -->

                        
                        <thead>
                            <tr>
                               <th>#</th>
                                <th>Locaton</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <!-- // Table heading END -->
                        <!-- Table body -->
                        <tbody>
@if(isset($location))

                                @foreach($location as $stu)
                                <tr class="gradeA">

                                   <td>{{ $stu->id }}</td>
                                    <td>{{ $stu->value }}</td>
                                    <td> <input type="submit" value="Edit" class='btn btn-primary  edit' id="edit_{{$stu->id}}"  onclick="edit_row('{{$stu->id}}', 'contact_table');">
                                        <input type='submit' class="btn btn-primary  save" id="save_{{$stu->id}}" value="Save" onclick="save_row('{{$stu->id}}', 'location_table');" style="display:none"></td>   
                                    <td> <input name="remove_levels" type="submit" value="Delete" class='btn btn-primary delete launchConfirm' onclick="delete_row('{{$stu->id}}', 31);" id="delete_{{$stu->id}}" href='#' >
                                        <input type='submit' class="btn btn-primary  cancel" id="cancel_{{$stu->id}}" value="Cancel" onclick="cancel_row('{{$stu->id}}', 'location_table');" style="display:none"></td>  
                                      
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
<div id="myModal" class="modal fade" role="dialog" >
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                <form role="form" action="{{url('addLocation')}}" method="post">
                    {{ csrf_field() }}
                      
                        
                        <div class="form-group">
                            <label for="exampleInputlass">Choose Class</label>
                             <select id="exampleInputlass" name='sub' class="form-control">
                    <option selected disabled>Choose Bus</option>
                    @foreach($bus as $class)
    <option  value="{{$class->id}}">{{ $class->value}}</option>
    @endforeach 
                    </select>
                        </div>
                         <div class="form-group">
                            <label for="exampleInputsubject">location</label>
                            <input name="clas" type="text" class="form-control" id="exampleInputsubject" placeholder=" location name">
                        </div>
                        
					</div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <input type="submit" value="Save" name="submit" class="btn btn-primary "> 
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
    
@endsection
@section('footer')
@endsection