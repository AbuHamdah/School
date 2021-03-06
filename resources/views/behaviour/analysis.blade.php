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
    $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
  } );
  </script>
	@endsection

	@section('content')
	<h3>Behaviour analysis</h3>
			<div class="innerLR">
				<!-- Widget -->

				<div class="widget">
					<div class="widget-body innerAll inner-2x row">
<input type="hidden" id="teacher">

	<form  id="target" role="form" action="{{url('analysis_choose')}}" method="post"enctype="multipart/form-data">
						{{ csrf_field() }}
						  <div class="row">

						<div class="col-sm-4">
									<label for="exampleInputlass">grade</label>
								 <select id="grade" name="grade" class="form-control">
						<option selected disabled>Choose Grade</option>
                                     @foreach($grade as $dr)
				          <option value="{{$dr->id}}">{{$dr->value}}</option>
                                     @endforeach
								 </select>
						
							  </div>
							  		 
		</div>
					 
						 <div class="field" style="margin-top:30px">
						 	
						 	
						 </div>

				
			
						<div class="col-sm-12" style="text-align:center">

								<input id="add" type="submit" value="Choose" name="submit" class="btn btn-primary "> 
							</div>
							
					</form>

					</div>

         
                    <form  id="target" role="form" action="{{url('BehaviourStudent')}}" method="post"enctype="multipart/form-data">
						{{ csrf_field() }}
                       <div id="printable"> 
                       <table class="table table-striped table-responsive swipe-horizontal table-primary" id="dataTables-example">
                        <!-- Table heading -->
                 
                        <thead>
                            <tr>
                                <th>Student name</th>
                                @foreach($type as $ty)
                                <th>{{$ty->name}}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <!-- // Table heading END -->
                        <!-- Table body -->
                           
                        <tbody>
                   @if(isset($arr))
                     @foreach($arr as $stu => $val)
                                <tr class="gradeA">
                                    <td>{{$stu}}</td>
                                     @foreach($val as $in => $va)
                                       <td>{{$va}}</td>
                                    @endforeach  
                                </tr>
 @endforeach
                            @endif
     </tbody>

                    </table>
                        </div>
                         <td><input id="add" type="submit" value="Save/Update" name="submit" class="btn btn-primary "> </td>
 <td> <button id="export" class=" btn btn-primary">Export</button></td>
 <td><a id="print" class="btn btn-primary added" >Print</a></td>
</form> 
                              
				</div>
                
	</div>
	 
	@endsection

	@section('footer')
	
	<script>
$("#export").click(function(e){
    e.preventDefault();
    $('#dataTables-example').tableExport({type:'excel',escape:'false' , Worksheet:'Report'});
 
});
</script>
<script type='text/javascript'>

$('#print').click(function () {
       var divContents = $("#printable").html();
            var printWindow = window.open('', '', 'height=400,width=800');
            printWindow.document.write('<html><head><title>Student list</title>');
            printWindow.document.write('<style>tr{display: table-row; vertical-align: inherit; border-color: inherit;}</style></head><body >');
            printWindow.document.write(divContents);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
    });

</script>
	@endsection