@extends('layouts.app')
@section('title')

login
@endsection
@section('header')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
{!! Html::script('assets/js/jquery.printElement.min.js')!!}
@endsection

@section('content')
<h3>Student Lists</h3>
        <div class="innerLR">
            <!-- Widget -->
           
            <div class="widget">
                <div class="widget-body innerAll inner-2x">
                  <div class="col-sm-5 ">
                   <form  action="{{url('List_student')}}" method="post"  class="form-inline">
                   {{ csrf_field() }}
                    <select id="exampleInputlass" name='grade' class="form-control">
						<option selected disabled>Choose Grade</option>
						@foreach($grade as $gr)
                                    
						<option <?php if($classs_id == $gr->id){echo("selected");}?> value="{{$gr->id}}">{{$gr->value}}</option>
						@endforeach
						</select>
                     <button id="but" class="btn btn-primary added" >Select</button>
					</form>
					</div>
                  
                    <br>
                    <!-- Table -->
                    <div id="printable">
                    <table  class="table table-striped table-responsive swipe-horizontal table-primary">
                        <!-- Table heading -->

                       <?php $i=1 ?>
                        <thead>
                            <tr>
                               <th>No.</th>
                                <th>Student Name</th>
                               
                            </tr>
                        </thead>
                        <!-- // Table heading END -->
                        <!-- Table body -->
                        <tbody>
@if(isset($student))

                                @foreach($student as $stu)
                                <tr class="gradeA">
                                    <td class="col-sm-5">{{ $i++ }}</td>
                                    <td class="col-sm-5">{{ @$stu->Full_name }}</td>
                                    
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
            printWindow.document.write('<html><head><title>Student list</title>');
            printWindow.document.write('<style>tr{display: table-row; vertical-align: inherit; border-color: inherit;}</style></head><body >');
            printWindow.document.write(divContents);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
    });

</script>
@endsection