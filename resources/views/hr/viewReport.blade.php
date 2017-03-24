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
	  $( "#datepic" ).datepicker({ dateFormat: 'yy-mm-dd' });
  } );
  </script>
@endsection

@section('content')
<h3>Leave applicant of employee {{$name}}</h3>
        <div class="innerLR">
            <!-- Widget -->
           
            <div class="widget">
                <div class="widget-body innerAll inner-2x">
                 
                    <br>
                      <div id="printable">
                    <!-- Table -->
                     <h4>Leave applicant of {{$name}}</h4>
                    <table class="table table-striped table-responsive swipe-horizontal table-primary">
                        <!-- Table heading -->

                        
                        <thead>
                            <tr>
                                <th style="">Date</th>
                                <th >Reasons</th>
                                <th >Departure time</th>
                                <th >Back time</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <!-- // Table heading END -->
                        <!-- Table body -->
                        <tbody>
@if(isset($Attendan))

                                @foreach($Attendan as $att )
                                <tr class="gradeA">
                                    <td >{{$att->Date}}</td>
                                    <td >{{ $att->Reason }}</td>
                                    <td >{{ $att->Depart }}</td>
                                    <td >{{ $att->Back }}</td>
                                    <td class='vi'> <input type="submit" value="Edit" class='btn btn-primary  edit' id="edit_{{$att->id}}"  onclick="edit_row('{{$att->id}}', 'leave');">
                                        <input type='submit' class="btn btn-primary  save" id="save_{{$att->id}}" value="Save" onclick="save_row('{{$att->id}}', 'leave');" style="display:none"></td>   
                                    <td class='vi'> <input name="remove_levels" type="submit" value="Delete" class='btn btn-primary delete launchConfirm' onclick="delete_row('{{$att->id}}', 7);" id="delete_{{$att->id}}" href='#' >
                                        <input type='submit' class="btn btn-primary  cancel" id="cancel_{{$att->id}}" value="Cancel" onclick="cancel_row('{{$att->id}}', 'leave');" style="display:none"></td>
                                </tr>
  @endforeach 
                               @endif
                                </div>
                               
                        </tbody>
                        <!-- // Table body END -->
                    </table>
			</div>
               <a id="print" class="btn btn-primary added" >Print</a>
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

    
@endsection
@section('footer')
<script type='text/javascript'>

$('#print').click(function () {
       var divContents = $("#printable").html();
            var printWindow = window.open('', '', 'height=400,width=800');
            printWindow.document.write('<html><head><title>Leave list</title>');
            printWindow.document.write('<style>.vi{display: none;}</style></head><body >');
            printWindow.document.write(divContents);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
    });

</script>
@endsection