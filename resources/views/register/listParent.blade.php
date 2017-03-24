@extends('layouts.app')
@section('title')

login
@endsection
@section('header')

@endsection

@section('content')
<h3>Parents Lists</h3>
        <div class="innerLR">
            <!-- Widget -->
           
            <div class="widget">
                <div class="widget-body innerAll inner-2x">
                 
                 
                    <table class="table table-striped table-responsive swipe-horizontal table-primary">
                        <!-- Table heading -->

                        
                        <thead>
                            <tr>
                                <th>Parent Name</th>
                                <th>Parent code</th>
                                <th>Mobile1</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <!-- // Table heading END -->
                        <!-- Table body -->
                        <tbody>


                                @foreach($parent as $stu)
                                <tr class="gradeA">

                                    <td class="col-sm-5">{{ @$stu->Full_name }}</td>
                                    <td class="col-sm-5">{{ @$stu->code }}</td>
                                    <td class="col-sm-5">{{ @$stu->Mobile1 }}</td>
                                    <td > <a style="color:white" class='btn btn-primary' href="Editparent/{{$stu->id}}" >Edit</a>
                            </td>   
                                    <td > <a style="color:white" class='btn btn-primary' onclick="delete_row('{{$stu->id}}', 16);" id="delete_{{$stu->id}}" >Delete</a>
                                        </td>  
                                      
                                </tr>
  @endforeach 
                               
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