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
	<h3>Leave applicantion</h3>
		<div id="printable">
			<div class="innerLR">
				<!-- Widget -->

				<div class="widget">
					<div class="widget-body innerAll inner-2x row">

   
						  <div class="col-sm-5">

							 <div class="col-sm-12" style="font-weight:bold ; margin-bottom:25px">
								Employee Name: {{$responses['leave']}}	
							</div>
							
							<div class="col-sm-12" style="margin-bottom:25px">
							Date : <?php echo date('Y-m-d'); ?>
						</div>
					
						<div class="col-sm-12">
							
							Reason : {{$responses['reason']}}
						
							  </div>
							<div class="col-sm-12" style="margin-top:70px">
						 
							 <div class="form-group col-sm-5" id="pad" >
								Departure time : {{$responses['depart']}}
								
							</div>
							<div class="col-sm-1"></div>
							 <div class="form-group col-sm-5">
								back time : {{$responses['back']}}
								
							</div>

							  </div>
		</div>
					 <div class="col-sm-12" style="margin-bottom:15px;margin-top:30px">
							
							Employee signature :
						
							  </div>
							  <div class="col-sm-12">
							Adminstrator signature :
							  </div>
						 
						

					</div>
				</div>
	</div>
</div>
<div class="col-sm-12" style="text-align:center">

								<input id="print" type="submit" value="Print" name="submit" class="btn btn-primary "> 
							</div>
	@endsection

	@section('footer')
	
	<script type='text/javascript'>

$('#print').click(function () {
       var divContents = $("#printable").html();
            var printWindow = window.open('', '', 'height=400,width=800');
            printWindow.document.write('<html><head><title>Leave application</title>');
            printWindow.document.write('<style>.form-group {margin-bottom: 15px;}</style></head><body >');
            printWindow.document.write(divContents);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
	window.location = "http://localhost/school/public/Leave_applicant";
    });

</script>
	@endsection