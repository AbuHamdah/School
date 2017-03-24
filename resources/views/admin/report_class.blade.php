@extends('layouts.app')
@section('title')

login
@endsection
@section('header')

@endsection

@section('content')

        <div class="innerLR">
            <!-- Widget -->
           
            <div class="widget">
                <div class="widget-body innerAll inner-2x">
             <form action="{{url('searchReport')}}" method="post">
                       {{ csrf_field() }}
                        <div class="form-group">
                            <input name="searching" type="text" class="form-control" id="search" placeholder="search by date">

                            <input id="searched" name="search" type="submit" value="Search" class="btn btn-primary btn-block">
                        </div>
                    </form>
                    <form class="pull-right" action="{{url('searchStatus')}}" method="post">
                       {{ csrf_field() }}
                        <div class="form-group">
                 
                            <input name='status' value="approve" type="radio"   >Approve
                            <input name='status' value="not approve" type="radio"  > Don't Approve
                            <input  id="sk" name="stat" type="submit" value="Search" class="btn btn-primary btn-block" style="width:45%">
                        </div>
                    </form>
                    <br>
                    <!-- Table -->
                    <table class="table table-striped table-responsive swipe-horizontal table-primary">
                        <!-- Table heading -->
                        <thead>
                            <tr>
                               <th>#</th>
                                <th>Student firstname</th>
                                <th>Student middlename</th>
                                <th>Student lasttname</th>
                                <th>Student mobile</th>
                                <th>Student status</th>
                                <th>date</th>
                                <th></th>
                                
                            </tr>
                        </thead>
                        <!-- // Table heading END -->
                        <!-- Table body -->
                        <tbody>


                                @foreach($student as $stu)
                                <tr class="gradeA">

                                   <td>{{ $stu->id }}</td>
                                    <td>{{ $stu->First }}</td>
                                    <td>{{ $stu->Middle }}</td>
                                    <td>{{ $stu->Last }}</td>
                                    <td>{{ $stu->mobile }}</td>
                                    <td>{{ $stu->status }}</td>
                                    <td>{{ $stu->created_at }}</td>
									<td> <a  class='btn btn-primary' href="reportexam/{{$stu->id}}" >View report</a>
                            </td>   
                                   
                                      
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
      
@endsection
@section('footer')
@endsection