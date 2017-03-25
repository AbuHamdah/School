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
	<h3>Report Observation</h3>
			<div class="innerLR">
				<!-- Widget -->

				<div class="widget">
					<div class="widget-body innerAll inner-2x row">
<input type="hidden" id="teacher">

	<form  id="target" role="form" action="{{url('ObservationReportChoose')}}" method="post"enctype="multipart/form-data">
						{{ csrf_field() }}
						  <div class="row">
 
                              <div class="col-sm-4">
									<label for="exampleInputlass">Observation type</label>
								 <select name="obv"  class="form-control">
						<option selected disabled>Choose type</option>
						@foreach($observ as $de)
						<option  value="{{$de->id}}">{{$de->name}}</option>
						@endforeach
								 </select>
							</div>
                              
						
						<div class="col-sm-4">
									<label for="exampleInputlass">grade</label>
								 <select id="grade" name="grade" class="form-control">
						<option selected disabled>Choose Grade</option>
				@foreach($grade as $de)
						<option  value="{{$de->id}}">{{$de->value}}</option>
						@endforeach
								 </select>
						
							  </div>
							   
							<div class="col-sm-4">
						 <label for="exampleInputlass">Term</label>
								 <select id="term" name='term' class="form-control">
						<option selected disabled>Choose Term</option>
						@foreach($term as $te)
						<option  value="{{$te->id}}">{{$te->value}}</option>
						@endforeach
								 </select>
							
							  </div>
							  	<div class="col-sm-4">
						 <label for="exampleInputlass">Year</label>
								 <select id="year" name='year' class="form-control">
						<option selected disabled>Choose Year</option>
						@foreach($Year as $ye)
						<option  value="{{$ye->id}}">{{$ye->value}}</option>
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

          @if(isset($arr))
                    <div id="printable">
                       <table class="table table-striped table-responsive swipe-horizontal table-primary" id="dataTables-example">
                        <!-- Table heading -->
                 <thead>
                           <th>Teacher name</th>
                           <th>Grade</th>
                           <th>Subject</th>
                           <th>Observation type</th>
                           <th>Date</th>
                           <th>Note</th>
                           <th>Mark % </th>
                           <th></th>
                            <th></th>
                           </thead>
                           
                        <tbody>
                           
                         @foreach($arr as $in => $val)
                        <tr>               
                        <td>{{ $val['teacher'] }}</td>
                         <td>{{ $val['grade'] }}</td>
                         <td>{{ $val['subject'] }}</td>
                         <td>{{ $val['observation'] }}</td>
                         <td>{{ $val['date'] }}</td>
                         <td>{{ $val['note'] }}</td>
                          <td>{{ $val['value'] }}</td>
                        <td class="hi"> <a  class='btn btn-primary' href="editobserv/{{$val['teacher_id']}}/{{$val['subject_id']}}/{{ $val['date'] }}" >Edit</a>
                            </td>   
                        <td class="hi"> <a  class='btn btn-primary' id="delete_{{$val['teacher_id']}}" onclick="delete_row('\'{{($val['teacher_id']) }}/{{($val['subject_id'])}}/{{($val['date']) }}\'',165);" >Delete</a>
                            </td>   
							</tr>
                       
                        
                        @endforeach
                            
                        </tbody>
   
                    </table>
                </div>
                <td><a id="print" class="btn btn-primary added" >Print</a></td>
 <td> <button id="export" class=" btn btn-primary">Export</button></td>
                    
 
       @endif                        
				</div>
                
	</div>
	 	  <div id="confirm" class="modal fade" role='dialog'>

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">أ—</button>
                    <h4 class="modal-title">Delete </h4>
                </div>
                <div class="modal-body">
                    <p>Do You Really Want to Delete This ?</p>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <span id="deleteButton"></span>
                </div>

            </div>
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