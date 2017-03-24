@extends('layouts.app')
@section('title')

login
@endsection
@section('header')

@endsection

@section('content')
<h3>{{@$name[0]->name}} Exam</h3>
 <h3 class="center">hello {{@$name_stu[0]->First}} {{$name_stu[0]->Middle}} {{$name_stu[0]->Last}}</h3>       
      <div class="innerLR">
            <!-- Widget -->
           
            <div class="widget">
                <div class="widget-body innerAll inner-2x">
                    
              
                    <br>
                    <!-- Table -->
                    

                  
                    <table class="table table-striped table-responsive swipe-horizontal table-primary">
                        <!-- Table heading -->
<form method="post" action="{{url('mark_social-questions')}}">
{{ csrf_field() }}
                        
                        
                                        
                        <tbody>
                         @foreach($social as $soc)
                        <tr>               
                        <td>{{ $soc->Title }}</td>
                        
                        <td><select name="{{$soc->id}}" id="{{$soc->id }}">
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>

							</select></td>
							</tr>
                       
                        
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>

<input type="hidden" name="student" class="btn btn-primary" style="margin-top: 10px;" value="{{$student_id}}">
							<td style="width:25%"><input type="submit" name="submit" value="Finish exam" class="btn btn-primary" ></td>
							</tr>
	</tfoot>
                	</form>
                        <!-- // Table body END -->
                    </table>
                    

				
                        <!-- // Table END -->


                </div>
            </div>
            
@endsection
@section('footer')
@endsection