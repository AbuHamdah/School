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
		div#mar {
    margin-top: 33px;
}
	</style>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		<script>
  $(function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>
	@endsection

	@section('content')
	<h3>Add students</h3>
			<div class="innerLR">
				<!-- Widget -->

				<div class="widget">
					<div class="widget-body innerAll inner-2x row">


	<form role="form" action="{{url('student_rAdd')}}" method="post"enctype="multipart/form-data">
						{{ csrf_field() }}
						  <div class="col-sm-5">

							 <div class="form-group col-sm-12">
								<label for="exampleInputsubject">Full Name</label>
								<input name="fullname" type="text" class="form-control" id="exampleInputsubject" placeholder=" full name">
							</div>
							 <div class="form-group col-sm-12">
								<label for="exampleInputsubject">Arabic Full Name</label>
								<input name="arfullname" type="text" class="form-control" id="exampleInputsubject" placeholder=" اسم الطالب الكامل ">
							</div>
							<div class="col-sm-12">
							 <div class="form-group col-sm-5" id="pad">
								<label for="exampleInputlass">Grade</label>
								 <select id="exampleInputlass" name='grade' class="form-control">
						<option selected disabled>Choose Grade</option>
                                     @foreach($grade as $gr)
						<option  value="{{$gr->id}}">{{$gr->value}}</option>
						@endforeach
						</select>
							</div>
							<div class="col-sm-1"></div>
							 <div class="form-group col-sm-5">
								<label for="exampleInputlass">Gender</label>
								 <select id="exampleInputlass" name='gender' class="form-control">
						<option selected disabled>Choose Gender</option>
						<option  value="male">Male</option>
						<option  value="female">Female</option>
						</select>
							</div>

						</div>
						<div class="col-sm-12">
							 <div class="form-group col-sm-5" id="pad">
								<label for="exampleInputlass">Birthday</label>
								 <input  name="birthday" type="text"class="form-control" id="datepicker">
							</div>
                             <div class="form-group col-sm-3">
								<label for="exampleInputlass">Bus</label>
								 <select id="bus" name='bus' class="form-control">
						<option selected disabled>Choose Bus</option>
                                @foreach($bus as $bu)
						<option  value="{{$bu->id}}">{{$bu->value}}</option>
						@endforeach
						</select>
							</div>
							<div class="col-sm-4">
                                <label for="exampleInputsubject">Address</label>
								 <select id="address" name="address" class="form-control">
						<option selected disabled>Choose Address</option>
						</select>
							</div>
							
							  </div>
<div class="col-sm-12">
							 <div class="form-group col-sm-7" id="pad">
								<label for="exampleInputlass">Nationality</label>
								<select name="nationality">
								<option selected disabled>-- select one --</option>
  <option value="afghan">Afghan</option>
  <option value="albanian">Albanian</option>
  <option value="algerian">Algerian</option>
  <option value="american">American</option>
  <option value="andorran">Andorran</option>
  <option value="angolan">Angolan</option>
  <option value="antiguans">Antiguans</option>
  <option value="argentinean">Argentinean</option>
  <option value="armenian">Armenian</option>
  <option value="australian">Australian</option>
  <option value="austrian">Austrian</option>
  <option value="azerbaijani">Azerbaijani</option>
  <option value="bahamian">Bahamian</option>
  <option value="bahraini">Bahraini</option>
  <option value="bangladeshi">Bangladeshi</option>
  <option value="barbadian">Barbadian</option>
  <option value="barbudans">Barbudans</option>
  <option value="batswana">Batswana</option>
  <option value="belarusian">Belarusian</option>
  <option value="belgian">Belgian</option>
  <option value="belizean">Belizean</option>
  <option value="beninese">Beninese</option>
  <option value="bhutanese">Bhutanese</option>
  <option value="bolivian">Bolivian</option>
  <option value="bosnian">Bosnian</option>
  <option value="brazilian">Brazilian</option>
  <option value="british">British</option>
  <option value="bruneian">Bruneian</option>
  <option value="bulgarian">Bulgarian</option>
  <option value="burkinabe">Burkinabe</option>
  <option value="burmese">Burmese</option>
  <option value="burundian">Burundian</option>
  <option value="cambodian">Cambodian</option>
  <option value="cameroonian">Cameroonian</option>
  <option value="canadian">Canadian</option>
  <option value="cape verdean">Cape Verdean</option>
  <option value="central african">Central African</option>
  <option value="chadian">Chadian</option>
  <option value="chilean">Chilean</option>
  <option value="chinese">Chinese</option>
  <option value="colombian">Colombian</option>
  <option value="comoran">Comoran</option>
  <option value="congolese">Congolese</option>
  <option value="costa rican">Costa Rican</option>
  <option value="croatian">Croatian</option>
  <option value="cuban">Cuban</option>
  <option value="cypriot">Cypriot</option>
  <option value="czech">Czech</option>
  <option value="danish">Danish</option>
  <option value="djibouti">Djibouti</option>
  <option value="dominican">Dominican</option>
  <option value="dutch">Dutch</option>
  <option value="east timorese">East Timorese</option>
  <option value="ecuadorean">Ecuadorean</option>
  <option value="egyptian">Egyptian</option>
  <option value="emirian">Emirian</option>
  <option value="equatorial guinean">Equatorial Guinean</option>
  <option value="eritrean">Eritrean</option>
  <option value="estonian">Estonian</option>
  <option value="ethiopian">Ethiopian</option>
  <option value="fijian">Fijian</option>
  <option value="filipino">Filipino</option>
  <option value="finnish">Finnish</option>
  <option value="french">French</option>
  <option value="gabonese">Gabonese</option>
  <option value="gambian">Gambian</option>
  <option value="georgian">Georgian</option>
  <option value="german">German</option>
  <option value="ghanaian">Ghanaian</option>
  <option value="greek">Greek</option>
  <option value="grenadian">Grenadian</option>
  <option value="guatemalan">Guatemalan</option>
  <option value="guinea-bissauan">Guinea-Bissauan</option>
  <option value="guinean">Guinean</option>
  <option value="guyanese">Guyanese</option>
  <option value="haitian">Haitian</option>
  <option value="herzegovinian">Herzegovinian</option>
  <option value="honduran">Honduran</option>
  <option value="hungarian">Hungarian</option>
  <option value="icelander">Icelander</option>
  <option value="indian">Indian</option>
  <option value="indonesian">Indonesian</option>
  <option value="iranian">Iranian</option>
  <option value="iraqi">Iraqi</option>
  <option value="irish">Irish</option>
  <option value="italian">Italian</option>
  <option value="ivorian">Ivorian</option>
  <option value="jamaican">Jamaican</option>
  <option value="japanese">Japanese</option>
  <option value="jordanian">Jordanian</option>
  <option value="kazakhstani">Kazakhstani</option>
  <option value="kenyan">Kenyan</option>
  <option value="kittian and nevisian">Kittian and Nevisian</option>
  <option value="kuwaiti">Kuwaiti</option>
  <option value="kyrgyz">Kyrgyz</option>
  <option value="laotian">Laotian</option>
  <option value="latvian">Latvian</option>
  <option value="lebanese">Lebanese</option>
  <option value="liberian">Liberian</option>
  <option value="libyan">Libyan</option>
  <option value="liechtensteiner">Liechtensteiner</option>
  <option value="lithuanian">Lithuanian</option>
  <option value="luxembourger">Luxembourger</option>
  <option value="macedonian">Macedonian</option>
  <option value="malagasy">Malagasy</option>
  <option value="malawian">Malawian</option>
  <option value="malaysian">Malaysian</option>
  <option value="maldivan">Maldivan</option>
  <option value="malian">Malian</option>
  <option value="maltese">Maltese</option>
  <option value="marshallese">Marshallese</option>
  <option value="mauritanian">Mauritanian</option>
  <option value="mauritian">Mauritian</option>
  <option value="mexican">Mexican</option>
  <option value="micronesian">Micronesian</option>
  <option value="moldovan">Moldovan</option>
  <option value="monacan">Monacan</option>
  <option value="mongolian">Mongolian</option>
  <option value="moroccan">Moroccan</option>
  <option value="mosotho">Mosotho</option>
  <option value="motswana">Motswana</option>
  <option value="mozambican">Mozambican</option>
  <option value="namibian">Namibian</option>
  <option value="nauruan">Nauruan</option>
  <option value="nepalese">Nepalese</option>
  <option value="new zealander">New Zealander</option>
  <option value="ni-vanuatu">Ni-Vanuatu</option>
  <option value="nicaraguan">Nicaraguan</option>
  <option value="nigerien">Nigerien</option>
  <option value="north korean">North Korean</option>
  <option value="northern irish">Northern Irish</option>
  <option value="norwegian">Norwegian</option>
  <option value="omani">Omani</option>
  <option value="pakistani">Pakistani</option>
  <option value="palauan">Palauan</option>
  <option value="palestine">Palestenian</option>
  <option value="panamanian">Panamanian</option>
  <option value="papua new guinean">Papua New Guinean</option>
  <option value="paraguayan">Paraguayan</option>
  <option value="peruvian">Peruvian</option>
  <option value="polish">Polish</option>
  <option value="portuguese">Portuguese</option>
  <option value="qatari">Qatari</option>
  <option value="romanian">Romanian</option>
  <option value="russian">Russian</option>
  <option value="rwandan">Rwandan</option>
  <option value="saint lucian">Saint Lucian</option>
  <option value="salvadoran">Salvadoran</option>
  <option value="samoan">Samoan</option>
  <option value="san marinese">San Marinese</option>
  <option value="sao tomean">Sao Tomean</option>
  <option value="saudi">Saudi</option>
  <option value="scottish">Scottish</option>
  <option value="senegalese">Senegalese</option>
  <option value="serbian">Serbian</option>
  <option value="seychellois">Seychellois</option>
  <option value="sierra leonean">Sierra Leonean</option>
  <option value="singaporean">Singaporean</option>
  <option value="slovakian">Slovakian</option>
  <option value="slovenian">Slovenian</option>
  <option value="solomon islander">Solomon Islander</option>
  <option value="somali">Somali</option>
  <option value="south african">South African</option>
  <option value="south korean">South Korean</option>
  <option value="spanish">Spanish</option>
  <option value="sri lankan">Sri Lankan</option>
  <option value="sudanese">Sudanese</option>
  <option value="surinamer">Surinamer</option>
  <option value="swazi">Swazi</option>
  <option value="swedish">Swedish</option>
  <option value="swiss">Swiss</option>
  <option value="syrian">Syrian</option>
  <option value="taiwanese">Taiwanese</option>
  <option value="tajik">Tajik</option>
  <option value="tanzanian">Tanzanian</option>
  <option value="thai">Thai</option>
  <option value="togolese">Togolese</option>
  <option value="tongan">Tongan</option>
  <option value="trinidadian or tobagonian">Trinidadian or Tobagonian</option>
  <option value="tunisian">Tunisian</option>
  <option value="turkish">Turkish</option>
  <option value="tuvaluan">Tuvaluan</option>
  <option value="ugandan">Ugandan</option>
  <option value="ukrainian">Ukrainian</option>
  <option value="uruguayan">Uruguayan</option>
  <option value="uzbekistani">Uzbekistani</option>
  <option value="venezuelan">Venezuelan</option>
  <option value="vietnamese">Vietnamese</option>
  <option value="welsh">Welsh</option>
  <option value="yemenite">Yemenite</option>
  <option value="zambian">Zambian</option>
  <option value="zimbabwean">Zimbabwean</option>
</select>
							</div>
							
							
						</div>
						<div class="col-sm-12">
						<div class="col-sm-4" id="pad">
								<label for="exampleInputlass">Status</label>
								 <select id="exampleInputlass" name='status' class="form-control">
						<option selected disabled>Choose Status</option>
						<option  value="Normal">Normal</option>
						<option  value="SEN">SEN</option>
						<option  value="G&T">G & T</option>
						</select>
							</div>
							<div class="col-sm-3"></div>
							 <div class="form-group col-sm-4">
								<label for="exampleInputlass">Classification</label>
								 <select id="exampleInputlass" name='classe' class="form-control">
						<option selected disabled>Choose Classification</option>
						<option  value="arab">Arab</option>
						<option  value="non-arab">Non-Arab</option>
						</select>
							</div>
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
						<div class="col-sm-12">
							<input name="image" type='file' id="imgInp" />
							<img id="blah" src="#" alt="student image" />

						</div>
						<div class="col-sm-12" id="mar">
							 <div class="form-group col-sm-12" id="pad">
								<label for="exampleInputsubject">Parent information</label>
							</div>
<label for="exampleInputsubject" id="pad">Choose way</label>
							 <div class="form-group col-sm-12" id="pad">	 
								
								<div class="form-group col-sm-3" id="pad">
								<select id="way" name='classification' class="form-control">
						<option selected disabled>Choose way find parent</option>
						<option  value="1">Mobile</option>
						<option  value="2">Code</option>
						</select>
								 </div>
								 <div class="col-sm-1"></div>
								 <div class="form-group col-sm-5" id="pad">
								<input  type="text" class="form-control" id="pare" placeholder="Put Mobile or Code">
							</div>
                          <div class="col-sm-1"></div>
                           <div class="form-group col-sm-2" id="pad">
								<input type="submit" value="Find" id="find" class="btn btn-primary ">
							</div>
							</div>
							<div class="form-group col-sm-12" id="pad">	 
								
								<div class="form-group col-sm-12" id="pad">
								<label for="exampleInputsubject">Parent Full name</label>
						<input  type="text" class="form-control" id="pare_full" >
								 </div>
								 
								 <div class="form-group col-sm-5" id="pad">
								 <label for="exampleInputsubject">Parent mobile</label>
								<input  type="text" class="form-control" id="pare_mobile" >
							</div>
                          <div class="col-sm-1"></div>
                           <div class="form-group col-sm-5" id="pad">
                           <label for="exampleInputsubject">Parent code</label>
							<input name='code' type="text" class="form-control" id="pare_code" >
							</div>
							</div>
						</div>
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
		
	$( "#find" ).click(function(event) {
  event.preventDefault();
		var way = $( "#way" ).val();
		var val = $( "#pare" ).val();
		
		      $.get("/school/public/getParent", {way : way , val :val},

                   function(response){
                            
                         var obj = JSON.parse(response) ;
                        $( "#pare_full" ).val(obj[0].Full_name);
				  if(obj[0].Mobile1.length==0){
				  $( "#pare_mobile" ).val(obj[0].Mobile2);
				  }
				  else{
					   $( "#pare_mobile" ).val(obj[0].Mobile1);
				  }
				  $( "#pare_code" ).val(obj[0].code);
                         
                       });
		
});

	</script>
	<script>
$("#bus").change(function() {
 var val = $(this).val();
	$('#address').html('');
	var info = 'val=' + val;
   $.ajax({
                            type: "GET",
                            url: "/school/public/chooseadress",
                            data: info,
                            
                            success: function(e){
                                obj = JSON.parse(e);
								for(var i=0 ; i<obj.length ;i++){
									$('#address').append('<option  value="'+obj[i].id+'">'+obj[i].value+'</option>');
								}
                       
                            }
                        });
});

</script>
	@endsection