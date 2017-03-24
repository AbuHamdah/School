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
<h3>Update parent:{{$parent[0]->Full_name}}</h3>
        <div class="innerLR">
            <!-- Widget -->
           
            <div class="widget">
                <div class="widget-body innerAll inner-2x row">
                   

<form role="form" action="Updateparent/{{$parent[0]->id}}" method="post"enctype="multipart/form-data">
                    {{ csrf_field() }}
                     @foreach($parent as $pa)
                      <div class="col-sm-5">
                       <div class="form-group col-sm-4">
                            <label for="exampleInputsubject">Parent code</label>
                            <input value="{{$pa->code}}" name="code" type="text" class="form-control" id="exampleInputsubject" placeholder="Parent code">
                        </div>
                       
                         <div class="form-group col-sm-12">
                            <label for="exampleInputsubject">Full Name</label>
                            <input value="{{$pa->Full_name}}" name="full" type="text" class="form-control" id="exampleInputsubject" placeholder=" full name">
                        </div>
                        <div class="col-sm-12">
                         <div class="form-group col-sm-5" id="pad">
                            <label for="exampleInputsubject">Mobile 1</label>
                            <input value="{{$pa->Mobile1}}" name="mobile1" type="text" class="form-control" id="exampleInputsubject" placeholder="Mobile 1">
                        </div>
                        <div class="col-sm-1"></div>
                         <div class="form-group col-sm-5">
                            <label for="exampleInputsubject">Mobile 2</label>
                            <input value="{{$pa->Mobile2}}" name="mobile2" type="text" class="form-control" id="exampleInputsubject" placeholder="Mobile 2">
                        </div>
                       
					</div>
					<div class="col-sm-4">
                            <label for="exampleInputlass">Gender</label>
                             <select id="exampleInputlass" name='gender' class="form-control">
                    <option selected disabled>Choose Gender</option>
                    <option <?php if($pa->Gender == 'male'){echo("selected");}?> value="male">Male</option>
						<option <?php if($pa->Gender == 'Female'){echo("selected");}?> value="female">Female</option>
                    </select>
					</div>
					 <div class="col-sm-12">
                         <div class="form-group col-sm-5" id="pad">
                            <label for="exampleInputsubject">Username</label>
                            <input value="{{$pa->Username}}" name="username" type="text" class="form-control" id="exampleInputsubject" placeholder="Username">
                        </div>
                        <div class="col-sm-1"></div>
                         <div class="form-group col-sm-5">
                            <label for="exampleInputsubject">Password</label>
                            <input value="{{$pa->Password}}" name="password" type="text" class="form-control" id="exampleInputsubject" placeholder="passwoed">
                        </div>
                       
					</div>
	</div>
                       <div class="col-sm-1" ></div>
                    
                    <div class="col-sm-4">
                    	<input name="image" type='file' id="imgInp" />
                        <img id="blah" src="http://localhost/school/public/<?php echo $pa->image ;?>" alt="parent image" />
                    	
                    </div>
                    @endforeach 
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