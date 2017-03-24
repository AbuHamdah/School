@extends('layouts.app')
@section('title')

login
@endsection
@section('header')

@endsection

@section('content')
<h3>Question Lists</h3>
        <div class="innerLR">
            <!-- Widget -->
           
            <div class="widget">
                <div class="widget-body innerAll inner-2x">
                  <div class="col-sm-5 ">
                   <form  action="{{url('listquestion')}}" method="post"  class="form-inline">
                   {{ csrf_field() }}
                    <select  name='cl' class="form-control">
                    <option selected disabled>Choose Class</option>
                    @foreach($classes as $class)
    <option  value="{{$class->id}}">{{ $class->name }}</option>
    @endforeach 
                    </select>
                     <select  name='su' class="form-control">
                    <option selected disabled>Choose Subject</option>
                    @foreach($subjects as $subject)
    <option  value="{{$subject->id}}">{{ $subject->name }}</option>
    @endforeach 
                    </select>
                     <button id="but" class="btn btn-primary added" >Select</button>
					</form>
					</div>
                 
                    <div class="col-sm-5 ad">
                     
                      
                      
                        <button  class="btn btn-primary added" data-toggle="modal" data-target="#myModal">Add question</button>
                    </div>
                    <br>
                    <!-- Table -->
                    <table class="table table-striped table-responsive swipe-horizontal table-primary">
                        <!-- Table heading -->

                        
                        <thead>
                            <tr>
                               <th>#</th>
                                <th>Title</th>
                                <th>First choice</th>
                                <th>Second choice</th>
                                <th>Third choice</th>
                                <th>Last choice</th>
                                <th>True choice</th>
                                <th>Mark</th>
                                <th>Question Image</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <!-- // Table heading END -->
                        <!-- Table body -->
                        <tbody>
@if(isset($question))

                                @foreach($question as $que)
                                <tr class="gradeA">

                                   <td>{{ $que->id }}</td>
                                    <td>{{ $que->title }}</td>
                                    <td>{{ $que->firsr_choice}}</td>
                                    <td>{{ $que->seond_choice }}</td>
                                    <td>{{ $que->third_choice }}</td>
                                    <td>{{ $que->last_choice }}</td>
                                    <td>{{ $que->true_choice }}</td>
                                    <td>{{ $que->mark }}</td>
                                    <td><img style="width:50px ; height:50px"src="http://localhost/school/public/<?php echo $que->image_path ;?>" /></td>
                                    <td> <input type="submit" value="Edit" class='btn btn-primary  edit' id="edit_{{$que->id }}"  onclick="edit_row('{{$que->id }}', 'question_table');">
                                        <input type='submit' class="btn btn-primary  save" id="save_{{$que->id }}" value="Save" onclick="save_row('{{$que->id }}', 'question_table');" style="display:none"></td>   
                                    <td> <input name="remove_levels" type="submit" value="Delete" class='btn btn-primary delete launchConfirm' onclick="delete_row('{{$que->id }} ', 2);" id="delete_{{$que->id}}" href='#' >
                                        <input type='submit' class="btn btn-primary  cancel" id="cancel_{{$que->id }}" value="Cancel" onclick="cancel_row('{{$que->id }}', 'question_table');" style="display:none"></td>  
                                      
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
                <form role="form" action="{{url('questionAdd')}}" method="post"enctype="multipart/form-data">
                    {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputlass">Choose Class</label>
                             <select id="exampleInputlass" name='sub' class="form-control">
                    <option selected disabled>Choose Class</option>
                    @foreach($classes as $class)
    <option  value="{{$class->id}}">{{ $class->name }}</option>
    @endforeach 
                    </select>
                       
                        <div class="form-group">
                        <label for="exampleInputlass">Choose subject</label>
                        <select  name='sb' class="form-control">
                    <option selected disabled>Choose Subject</option>
                    @foreach($subjects as $subject)
    <option  value="{{$subject->id}}">{{ $subject->name }}</option>
    @endforeach 
                    </select>
					</div>
                        </div>
                       <div class="form-group">
                            <label for="exampleInputsubject">Question title</label>
                            <input name="title" type="text" class="form-control" id="exampleInputtitle" placeholder=" question title">
                        </div>
                        
                      
                         <div class="form-group">
                            <label for="exampleInputfirst">First choice</label>
                            <input name="first" type="text" class="form-control" id="exampleInputfirst" placeholder=" first name">
                        </div>
                         <div class="form-group">
                            <label for="exampleInputsecond">Second choice</label>
                            <input name="second" type="text" class="form-control" id="exampleInputsecond" placeholder=" second name">
                        </div>
                         <div class="form-group">
                            <label for="exampleInputthird">Third choice</label>
                            <input name="third" type="text" class="form-control" id="exampleInputthird" placeholder=" third name">
                        </div>
                         <div class="form-group">
                            <label for="exampleInputlast">Last choice</label>
                            <input name="last" type="text" class="form-control" id="exampleInputlast" placeholder=" last name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputtrue">true choice</label>
                            <input name="true_q" type="text" class="form-control" id="exampleInputtrue" placeholder=" true name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputmark">Mark</label>
                            <input name="mark" type="text" class="form-control" id="exampleInputmark" placeholder=" mark">
                        </div>
                         <div class="form-group">
                            <label for="exampleInputmark">Upload image</label>
                           <input name="image" type="file" />
                        </div>

<

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