@extends('backend.student.layouts.master')
	@section('title', 'ClassMates Page')
    @section('content')
    <div class="row justify-content-md-center">
            <div class="col-md-7">
                <div class="tile">
                <h3 class=" row justify-content-md-center">My class Mates Information </h3>
                    <div class="tile-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered" id="sampleTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th> Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>className</th>

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
                 { data: 'hash', name: 'hash' },
                 { data: 'firstName', name: 'firstName' },
                 { data: 'email', name: 'email' },
                 { data: 'mobile', name: 'mobile' },
                 { data: 'className', name: 'className' },
             ]
         });
    
  });
});
  </script>

@endsection
