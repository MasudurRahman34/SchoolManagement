@extends('backend.student.layouts.master')
	@section('title', 'ClassMates Page')
    @section('content')
    <div class="row justify-content-md-center">
            <div class="col-md-8">
                <div class="tile">
                <h3 class=" row justify-content-md-center">My class Mates Information </h3>
                    <div class="tile-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered" id="sampleTable">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Student ID</th>
                                        <th>Roll</th>
                                        <th>Name</th>
                                        <th>Class</th>
                                        <th>Father Name</th>
                                        <th>Mother Name</th>
                                        <th>Mobile</th>
                                        

                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            </div>
      <div class="clearix"></div>
    @endsection
    @section('script')
       @include('backend.student.partials.js.datatable'); 
       
    <script type="text/javascript">
    
    $(function(){
    $(document).ready(function () {
        
      var table=$('#sampleTable').DataTable({
            dom: 'lBfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
             processing:true,
             serverSide:true,
             ajax:"{{url('student/class/classmates/show')}}",
             columns:[
                 { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                 { data: 'studentId', name: 'studentId' },
                 { data: 'roll', name: 'roll' },
                 { data: 'firstName', name: 'firstName' },
                 { data: 'className', name: 'className' },
                 { data: 'fatherName', name: 'fatherName'},
                 { data: 'motherName', name: 'motherName'},
                 { data: 'mobile', name: 'mobile' },
                 
             ]
         });
    
  });
});
  </script>

@endsection
