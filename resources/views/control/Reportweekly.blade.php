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
	<h3> Weekly Plan Report</h3>
			<div class="innerLR">
				<!-- Widget -->

				<div class="widget">
					<div class="widget-body innerAll inner-2x row">


	<form  id="target" role="form" action="{{url('chooseReportWeek')}}" method="post"enctype="multipart/form-data">
						{{ csrf_field() }}
						  <div class="row">

							
						<div class="col-sm-4">
									<label for="exampleInputlass">grade</label>
								 <select id="grade" name="grade"  class="form-control">
						<option selected disabled>Choose Grade</option>
						@foreach($grade as $ge)
						<option <?php if(@$array['sunday'][0]['grade_id'] == $ge->id) echo"selected"; ?>  value="{{$ge->id}}">{{$ge->value}}</option>
						@endforeach
								 </select>
						
							  </div>
							 
							<div class="col-sm-4">
						 <label for="exampleInputlass">Term</label>
								 <select id="term" name='term' class="form-control">
						<option selected disabled>Choose Term</option>
						@foreach($term as $te)
						<option <?php if(@$array['sunday'][0]['term_id'] == $te->id) echo"selected"; ?>  value="{{$te->id}}">{{$te->value}}</option>
						@endforeach
								 </select>
							
							  </div>
							  	<div class="col-sm-4">
						 <label for="exampleInputlass">Year</label>
								 <select id="year" name='year' class="form-control">
						<option selected disabled>Choose Year</option>
						@foreach($Year as $ye)
						<option <?php if(@$array['sunday'][0]['year_id'] == $ye->id) echo"selected"; ?> value="{{$ye->id}}">{{$ye->value}}</option>
						@endforeach
								 </select>
							
							  </div>
							  	<div class="col-sm-4">
						<label for="exampleInputlass">Week</label>
								 <select id="week" name='week' class="form-control">
						<option selected disabled>Choose Week</option>
						@foreach($week as $we)
						<option <?php if(@$array['sunday'][0]['week_id'] == $we->id) echo"selected"; ?> value="{{$we->id}}">{{$we->value}}</option>
						@endforeach
								 </select>
							
							  </div>
							  	
		</div>
        <div class="col-sm-12" style="text-align:center">

								<input id="add" type="submit" value="Choose" name="submit" class="btn btn-primary "> 
							</div>
        </form>
                       
		@if(!empty($array))
                        <div id="printable">
							  <table class="table table-striped table-responsive swipe-horizontal table-primary table-bordered" id="dataTables-example">
                        <!-- Table heading -->
                 <?php $sub =array() ; 
                        $day = array() ;          
                                  ?>
                        <thead>
                            <tr>
                                <th colspan="2"> Day </th>
                                <?php   foreach($array as $arr){
                                        foreach($arr as $ar){
                                if(!in_array($ar['subject'] , $sub )) {
                                ?>
                                <th><?php echo $ar['subject'] ; ?></th>
                              <?php  $sub[] = $ar['subject'];  } }} ?>
                            </tr>
                        </thead>
                        <!-- // Table heading END -->
                        <!-- Table body -->
                           
                        <tbody>
                            @foreach($array as $arr => $val )
                                  <tr>
                              <td rowspan="3">{{$arr}}</td>
                            <td>Lesson</td>     
                            @foreach($val as $ar => $ind )
                            <td >{{$ind['lesson']}} </td>
                                      @endforeach
                                 </tr>
  <tr>
    <td>Assignment</td>
      @foreach($val as $ar => $ind )
      @if(!empty($ind['assign']))
    <td >{{$ind['assign']}} from page {{$ind['assign_from']}} to page {{$ind['assign_to']}} and the mark is {{$ind['mark_div']}} </td>
      @else
      <td></td>
      @endif
      @endforeach
  </tr>
  <tr>
      <td>Homework</td>
      @foreach($val as $ar => $ind )
      @if(!empty($ind['homework']))
    <td >{{$ind['homework']}} from page {{$ind['home_from']}} to page {{$ind['home_to']}} </td>
    @else
      <td></td>
      @endif
      @endforeach
  </tr>
                            @endforeach
     </tbody>
                        <!-- // Table body END -->
                    
                    </table>
                        </div>
                         <tfoot>
                           <td> <button id="export" class=" btn btn-primary">Export</button></td>
                           <td><a id="print" class="btn btn-primary added" >Print</a></td>
                           </tfoot>
@endif
					

					</div>
				</div>
	</div>
	 
	@endsection

	@section('footer')
	<script>
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
<script>
$("#export").click(function(e){
    e.preventDefault();
    $('#dataTables-example').tableExport({type:'excel',escape:'false' , Worksheet:'Report'});
 
});
	</script>
	
	@endsection