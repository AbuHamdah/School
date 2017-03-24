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
<form method="post" action="{{url('mark-questions')}}">
{{ csrf_field() }}
                         @foreach($questions as $question)
                        <thead>
                            <th><p class="lead">{{ $question->title }}</p></th>
                        </thead>
                        <!-- // Table heading END -->
                        <!-- Table body -->
                                        
                        <tbody>
                        <tr>               
                        <td><input type="radio" name="{{ $question->id }}" value="{{ $question->firsr_choice }}">{{ $question->firsr_choice }}</td>
							</tr>
                        <tr>
                        	<td><input type="radio" name="{{ $question->id }}" value="{{ $question->seond_choice }}">{{ $question->seond_choice }}</td>
							</tr>
                       <tr>               
                        <td><input type="radio" name="{{ $question->id }}" value="{{ $question->third_choice }}">{{ $question->third_choice }}</td>
							</tr>
							<tr>               
                        <td><input type="radio" name="{{ $question->id }}" value="{{ $question->last_choice }}">{{ $question->last_choice }}</td>
							</tr>
                       <tr>             
                        <?php if(!empty( $question->image_path )) {?>
                        <td><img style="width:200px ; height:200px"src="http://localhost/school/public/<?php echo $question->image_path ;?>" /></td><?php
																 }?>
							</tr>
                        </tbody>
                        @endforeach
                        <tfoot>
                        <tr>
<input type="hidden" name="subject" class="btn btn-primary" style="margin-top: 10px;" value="{{$subject_id}}">
<input type="hidden" name="student" class="btn btn-primary" style="margin-top: 10px;" value="{{$student_id}}">
							<td><input type="submit" name="submit" value="Finish exam" class="btn btn-primary" ></td>
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