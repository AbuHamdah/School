@extends('layouts.app')
@section('title')

login
@endsection
@section('header')

@endsection

@section('content')
 @foreach($array as $arr)
<h3>{{$arr['value']}}</h3>
<h4>Grade :{{$arr['grade']}}</h4>
<h4>Subject : {{$arr['subject']}}</h4>
<h4>mark : {{$arr['mark']}}</h4>
@endforeach
        <div class="innerLR">
            <!-- Widget -->
           <div id="gradee" class="{{$arr['mark']}}"></div>
            <div class="widget">
                <div class="widget-body innerAll inner-2x">
        
                    <br>
                    <!-- Table -->
                   
                    <table class="table table-striped table-responsive swipe-horizontal table-primary">
                        <!-- Table heading -->

                         <form  id="target" role="form" action="{{url('EnterAssign')}}" method="post"enctype="multipart/form-data"> 
                               {{ csrf_field() }}
                            
                        <thead>
                            <tr>
                                <th>Student Name</th>
                                <th>Marks</th>
                            </tr>
                        </thead>
                        <!-- // Table heading END -->
                        <!-- Table body -->
                        <tbody>
@if(isset($student))

                                @foreach($student as $stu)
                             @foreach($array as $arr)
                             <input type="hidden" name="subject/{{$stu->id}}" value="{{$arr['subject_id']}}">
                            <input type="hidden" name="week/{{$stu->id}}" value="{{$arr['week_id']}}">
                             <input type="hidden" name="day/{{$stu->id}}" value="{{$arr['day']}}">
                              <input type="hidden" name="grade/{{$stu->id}}" value="{{$arr['grade_id']}}">
                             <input type="hidden" name="assign/{{$stu->id}}" value="{{$arr['value']}}">
                            <input type="hidden" name="assi_id/{{$stu->id}}" value="{{$arr['id']}}">
                                    @endforeach
                            <input type="hidden" name="id/{{$stu->id}}" value="{{$stu->id}}">
                            
                                <tr class="gradeA">

                                    <td>{{$stu->Full_name}}</td>
                                     <td><input value="{{@$stu->mark}}" type="text" class="form-control assi" name="mark/{{$stu->id}}"></td> 
                                     <input type="hidden" name="assign_id/{{$stu->id}}" value="{{@$stu->assin_id}}">
                                </tr>
  @endforeach 
                               @endif
                               
                               
                        </tbody>
                        <!-- // Table body END -->
                        <tfoot>
                               <div class="col-sm-12" style="text-align:center">
                                
                                   <tr><td><input id="add" type="submit" value="Save / Upadate" name="submit" class="btn btn-primary "></td></tr>
                                   
							</div>
                                   </tfoot>
                            </form>
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
<script>
    
    $('.assi').keyup(function(){
        var max = $('#gradee').attr('class');
        max = Number(max) ;
      if($(this).val() > max)  {
          $(this).val(max)
      }
        
    });      
            </script>
    
@endsection
@section('footer')
@endsection