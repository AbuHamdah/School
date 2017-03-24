@extends('layouts.app')
@section('title')

login
@endsection
@section('header')

@endsection

@section('content')
<h3>reports of {{@$name_stu[0]->First}} {{$name_stu[0]->Middle}} {{$name_stu[0]->Last}} </h3>
        <div class="innerLR">
            <!-- Widget -->
           
            <div class="widget">
                <div class="widget-body innerAll inner-2x">
                    
                  
                    <br>
                    <!-- Table -->
                    <table class="table table-striped table-responsive swipe-horizontal table-primary">
                        <!-- Table heading -->

                         @foreach($names as $name => $values)
                        <thead>
                            <tr>
                             
                               <th>{{$name}}</th>
                                
                            </tr>
                        </thead>
                        <!-- // Table heading END -->
                        <!-- Table body -->
                        <tbody>


                                <tr class="gradeA">

                                   <td>{{ $values }}</td>
                                    
                                    
                                      
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



</br>
@if($name_stu[0]->status=='notYet')
       
<form  action="{{url('sendMessage')}}" method="post"id="usrform">
 {{ csrf_field() }}
  <textarea class="pull-left" name="comment" form="usrform">Enter message here...</textarea>
  <input name='phone' type="hidden" value="{{@$name_stu[0]->mobile}}">
  <input class="btn btn-primary pull-left"type="submit" value="send">
</form>
<div style="text-align:center">
    <a href="approveStudent/{{$student_id}}" class="btn btn-primary">Aprove</a>
    <a href="DapproveStudent/{{$student_id}}" class="btn btn-primary">Don't Approve</a>
</div>
@endif
@endsection
@section('footer')

@endsection