@extends('layouts.app')
@section('title')

login
@endsection
@section('header')

@endsection

@section('content')

<h3>Certifications of {{@$name}} </h3>
       
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
                                <th>File Name</th>
                            </tr>
                        </thead>
                        <!-- // Table heading END -->
                        <!-- Table body -->
                        <tbody>

@if(isset($cert))
                            @if(is_array($cert))
                                @foreach($cert as $stu => $val)
                                <tr class="gradeA">

                                    <td class="col-sm-5"><a style="color:white" href="certification/{{$val}}" >{{$val}}</a></td>
                                    
                                </tr>
  @endforeach 
         @else
               <tr class="gradeA">

                                    <td class="col-sm-5"><a style="color:white" href="certification/{{$cert}}" >{{$cert}}</a></td>
                                    
                                </tr> 
        @endif
  @else                  
                                <tr class="gradeA">

									<td> Not certificate was uploded for this user</td>
                                    
                                </tr>
            @endif
                                </div>
                               
                        </tbody>
                        <!-- // Table body END -->
                    </table>

                  
                   

                </div>
            </div>
            
@endsection
@section('footer')
@endsection