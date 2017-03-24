@extends('layouts.app')
@section('title')

login
@endsection
@section('header')
<style>
input#rt {
    width: 100%;
    margin-right: 136px;
    /* padding-left: 79px; */
    /* padding-right: 66px; */
}
</style>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		<script>
  $(function() {
    $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
	  $( "#datepicke" ).datepicker({ dateFormat: 'yy-mm-dd' });
  } );
  </script>
@endsection

@section('content')
<h3>Attendance Calculation</h3>
        <div class="innerLR">
            <!-- Widget -->
           
            <div class="widget">
                <div class="widget-body innerAll inner-2x">
                   
                    <form  action="{{url('attendcal')}}" method="post"  class="form-inline">
                   {{ csrf_field() }}
                   <div class="col-sm-3">
                    <select id="exampleInputlass" name='grade' class="form-control">
						<option selected disabled>Choose Grade</option>
						@foreach($grade as $gr)
                                    
						<option <?php if($classs_id == $gr->id){echo("selected");}?> value="{{$gr->id}}">{{$gr->value}}</option>
						@endforeach
						</select>
						</div>
                    <div class="col-sm-4 ">
                  <label for="exampleInputlass">Date From: </label>
								 <input  name="dat_f" type="text"class="form-control" id="datepicker">
					</div>
                    <div class="col-sm-4 ">
                  <label for="exampleInputlass">Date To: </label>
								 <input  name="dat_t" type="text"class="form-control" id="datepicke">
					</div>
                     <button id="but" class="btn btn-primary added" >Select</button>
					</form>
                   
                    <br>
                    <!-- Table -->
                    <table class="table table-striped table-responsive swipe-horizontal table-primary">
                        <!-- Table heading -->

                        
                        <thead>
                            <tr>
                                <th>Grade</th>
                                <th>Absence %</th>
                                <th>Attend %</th>
                            </tr>
                        </thead>
                        <!-- // Table heading END -->
                        <!-- Table body -->
                        <tbody>
@if(isset($Attendan))

                                @foreach($Attendan as $att )
                                <tr class="gradeA">

                                    <td class="col-sm-5">{{ $att['g'] }}</td>
                                    <td class="col-sm-5">{{ $att['Absence'] }}%</td>
                                    <td class="col-sm-5">{{ $att['Tardiness'] }}%</td>
                                   
                                </tr>
  @endforeach 
                               @endif
                                </div>
                               
                        </tbody>
                        <!-- // Table body END -->
                    </table>

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
                    <span id= 'deleteButton'></span>
                </div>

            </div>
        </div>
    </div>
<
    
@endsection
@section('footer')
@endsection