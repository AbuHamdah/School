@extends('layouts.app')
@section('title')

login
@endsection
@section('header')
link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		<script>
  $(function() {
    $( ".datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
  } );
  </script>
@endsection

@section('content')

        <div class="innerLR">
            <!-- Widget -->
           
            <div class="widget">
                <div class="widget-body innerAll inner-2x">
             <form action="{{url('searchreport')}}" method="post">
                       {{ csrf_field() }}
                        <div class="form-group">
                            <input name="searching" type="text" class="form-control datepicker" id="search" placeholder="search by date" value="{{date('Y-m-d')}}" >

                            <input id="searched" name="search" type="submit" value="Search" class="btn btn-primary btn-block">
                        </div>
                    </form>
                    <form class="pull-right" action="{{url('searchstatus')}}" method="post">
                       {{ csrf_field() }}
                        <div class="form-group">
                 
                            <input name='status' value="approve" type="radio"   >Approve
                            <input name='status' value="not approve" type="radio"  > Not Approve
                            <input name='status' value="not yet" type="radio"  > not yet
                            <input  id="sk" name="stat" type="submit" value="Search" class="btn btn-primary btn-block" style="width:45%">
                        </div>
                    </form>
                    <br>
                    <!-- Table -->
                    <table class="table table-striped table-responsive swipe-horizontal table-primary">
                        <!-- Table heading -->
                        <thead>
                            <tr>
                                <th>student name</th>
                                <th>grade</th>
                                <th>behaviour type</th>
                                <th>behaviour option</th>
                                <th>status</th>
                                <th>date</th>
                                <th>approval </th>
                                <th>not approval </th>
                            </tr>
                        </thead>
                        <!-- // Table heading END -->
                        <!-- Table body -->
                        <tbody>


                                @foreach($behaviour as $stu)
                                <tr class="gradeA">

                                    <td>{{ $stu->name }}</td>
                                    <td>{{ $stu->grade }}</td>
                                    <td>{{ $stu->type }}</td>
                                    <td>{{ $stu->option }}</td>
                                    <td>{{ $stu->status }}</td>
                                    <td>{{ $stu->date }}</td>
                                    @if($stu->status == 'not yet')
									<td> <a  class='btn btn-primary' href="reportapprov/{{$stu->id}}" >approve</a>
                            </td>   
                                   <td> <a  class='btn btn-primary' href="reportnonapprov/{{$stu->id}}" >Not approve</a>
                            </td>   
                                   @endif   
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