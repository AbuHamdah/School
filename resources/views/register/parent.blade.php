@extends('layouts.app')
@section('title')

login
@endsection
@section('header')
<style>
	#pad{
		padding: 0px;
	}
	img#blah {
    width: 148px;
    height: 148px;
}
</style>
@endsection

@section('content')
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<h3>Add parents</h3>
        <div class="innerLR">
            <!-- Widget -->
           
            <div class="widget">
                <div class="widget-body innerAll inner-2x row">
                   

<form role="form" action="{{url('parentAdd')}}" method="post"enctype="multipart/form-data">
                    {{ csrf_field() }}
                      <div class="col-sm-5">
                       <div class="form-group col-sm-4">
                            <label for="exampleInputsubject">Parent code</label>
                            <input name="code" type="text" class="form-control" id="exampleInputsubject" placeholder="Parent code">
                        </div>
                       
                         <div class="form-group col-sm-12">
                            <label for="exampleInputsubject">Full Name</label>
                            <input name="full" type="text" class="form-control" id="exampleInputsubject" placeholder=" full name">
                        </div>
                        <div class="col-sm-12">
                         <div class="form-group col-sm-5" id="pad">
                            <label for="exampleInputsubject">Mobile 1</label>
                            <input name="mobile1" type="text" class="form-control" id="exampleInputsubject" placeholder="Mobile 1">
                        </div>
                        <div class="col-sm-1"></div>
                         <div class="form-group col-sm-5">
                            <label for="exampleInputsubject">Mobile 2</label>
                            <input name="mobile2" type="text" class="form-control" id="exampleInputsubject" placeholder="Mobile 2">
                        </div>
                       
					</div>
					<div class="col-sm-4">
                            <label for="exampleInputlass">Gender</label>
                             <select id="exampleInputlass" name='gender' class="form-control">
                    <option selected disabled>Choose Gender</option>
                    <option  value="male">Male</option>
                    <option  value="female">Female</option>
                    </select>
					</div>
					 <div class="col-sm-12">
                         <div class="form-group col-sm-5" id="pad">
                            <label for="exampleInputsubject">Username</label>
                            <input name="username" type="text" class="form-control" id="exampleInputsubject" placeholder="Username">
                        </div>
                        <div class="col-sm-1"></div>
                         <div class="form-group col-sm-5">
                            <label for="exampleInputsubject">Password</label>
                            <input name="password" type="text" class="form-control" id="exampleInputsubject" placeholder="passwoed">
                        </div>
                       
					</div>
	</div>
                       <div class="col-sm-1" ></div>
                    
                    <div class="col-sm-4">
                    	<input name="image" type='file' id="imgInp" />
                        <img id="blah" src="#" alt="parent image" />
                    	
                    </div>
                    <div class="col-sm-12" style="text-align:center">
                           
                            <input type="submit" value="Add" name="submit" class="btn btn-primary "> 
                        </div>
                </form>
		
                </div>
            </div>
</div>
@endsection

@section('footer')
<script>
function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#imgInp").change(function(){
    readURL(this);
});
</script>
@endsection