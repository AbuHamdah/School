@extends('layouts.app')
@section('title')

login
@endsection
@section('header')

@endsection

@section('content')
<h3>Exam class</h3>
        <div class="innerLR">
            <!-- Widget -->
           
            <div class="widget">
                <div class="widget-body innerAll inner-2x">
                  <div class="col-sm-5 ">
                   <form  action="{{url('socialstudent')}}" method="post"  class="form-inline">
                   {{ csrf_field() }}
                    <select  name='sub' class="form-control">
                    <option selected disabled>Choose Class</option>
                    @foreach($classes as $class)
    <option  value="{{$class->id}}">{{ $class->name }}</option>
    @endforeach 
                    </select>
                     <button id="but" class="btn btn-primary added" >Select</button>
					</form>
					</div>
				<
			
   
                      
           
@endsection
@section('footer')
@endsection