@extends('layouts.app')
@section('title')

login
@endsection
@section('header')

@endsection

@section('content')
<h3>Manage Assign subjects</h3>
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
                                <th>Teacher</th>
                                <th>subject</th>
                                <th>Term</th>
                                <th>Year</th>
                                
                                 <th>M1</th>
                                 <th>name 1</th>
                                
                                <th>M2</th>
                                <th>name 2</th>
                                
                                <th>M3</th>
                                <th>name 3</th>
                                
                                <th>M4</th>
                                 <th>name 4</th>
                               
                                <th>M5</th>
                                <th>name 5</th>
                                
                                 
                                <th>M6</th>
                                 <th>name 6</th>
                                
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <!-- // Table heading END -->
                        <!-- Table body -->
                        <tbody>
@if(isset($array))

                                @foreach($array as $arr)
                                <tr class="gradeA">

                                        <td >{{$arr['teacher']}}</td>
                                        <td>{{$arr['subject']}}</td>
                                        <td>{{$arr['term']}}</td>
                                        <td>{{$arr['year']}}</td>
                                    @if($arr['name1'])
                                <td>{{$arr['mark1']}}</td>
                                 <td>{{$arr['name1']}}</td>
                                @endif
                                    @if($arr['name2'])
                                <td>{{$arr['mark2']}}</td>
                                 <td>{{$arr['name2']}}</td>
                                @endif
                                     @if($arr['name3'])
                                 <td>{{$arr['mark3']}}</td>
                                <td>{{$arr['name3']}}</td>
                                @endif
                                     @if($arr['name4'])
                                <td>{{$arr['mark4']}}</td>
                                 <td>{{$arr['name4']}}</td>
                                @endif
                                     @if($arr['name5'])
                                <td>{{$arr['mark5']}}</td>
                                <td>{{$arr['name5']}}</td>
                                @endif
                                     @if($arr['name6'])
                                <td>{{$arr['mark6']}}</td>
                                 <td>{{$arr['name6']}}</td>
                                @endif  
                        <td> <input type="submit" value="Edit" class='btn btn-primary  edit' id="edit_{{$arr['Assign_id']}}"onclick="edit_row('{{$arr["Assign_id"]}}', 'massi_table');" >
                                        <input type='submit' class="btn btn-primary  save" id="save_{{$arr['Assign_id']}}" value="Save" onclick="save_row('{{$arr["Assign_id"]}}', 'massi_table');" style="display:none"></td>   
                                    <td> <input name="remove_levels" type="submit" value="Delete" class='btn btn-primary delete launchConfirm'  id="delete_{{$arr['Assign_id']}}" href='#'onclick="delete_row('{{$arr['Assign_id']}}',60);" >
                                        <input type='submit' class="btn btn-primary  cancel" id="cancel_{{$arr['Assign_id']}}" value="Cancel" onclick="cancel_row('{{$arr["Assign_id"]}}', 'massi_table');" style="display:none"></td>  
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
   
@endsection
@section('footer')
@endsection