@extends('layouts.app')
@section('title')

login
@endsection
@section('header')
<style>
	select{
		margin-left: 3px;
	}
	#but{
		margin-top: 32px;
		margin-left: 20px
	}
</style>
@endsection

@section('content')
<h3>Exam student</h3>
        <div class="innerLR">
            <!-- Widget -->
           
            <div class="widget">
                <div class="widget-body innerAll inner-2x">
                  <div class="col-sm-5 ">
                   <form  action="{{url('socialquestion')}}" method="post"  class="form-inline">
                   {{ csrf_field() }}
                 
                    
                     <select  name='stu' class="form-control">
                    <option selected disabled>Choose Student </option>
                    @foreach($student as $stu)
    <option  value="{{$stu->id}}">{{ $stu->First }}</option>
    @endforeach 
                    </select>
                    <br>
                    <br>
                    <input name="clase" type="hidden" value="{{$classs_id}}">
                     <button id="but" class="btn btn-primary added" >Go to exam</button>
					</form>
					</div>

			
   
                      
           
@endsection
@section('footer')
@endsection