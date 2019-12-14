@extends('backend.layouts.master')
	@section('title', 'Find Student Class Wish')
    @section('content')
    <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i>ClassWise Student</h1>
          <p></p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item"><a href="#">ClassWise Student</a></li>
        </ul>
    </div>
    <div class="row justify-content-md-center">
        <div class="col-md-9">
            <div class="tile">
                    <div class="tile-body">
                        <div class="form-group">
                            <label for="exampleSelect1">Select Class</label>
                            <select class="form-control" id="classId" name="classId">
                                <option value="">--Please Select--</option>
                             @foreach ($class as $class)
                            <option value="{{$class->id}}">{{$class->className}}</option>
                             @endforeach

                            </select>
                          </div>
                    </div>
                </div>
            </div>
        </div>
<div class="clearix"></div>
<div class="row justify-content-md-center">
    <div class="col-md-9">
        <div class="tile">
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                            <tr>
                                <th></th>
                                <th>student ID</th>
                                <th>Name</th>
                                <th>Roll</th>
                                <th>Class</th>
                                <th>Section</th>
                                <th>Shift</th>
                                {{-- <th>Session Year</th> --}}
                                <th>Father Name</th>
                                <th>Mother Name</th>
                                <th>Contact</th>
                                <th>Action</th>
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
      @include('backend.partials.js.datatable');
      <script>
        // $(document).ready( function () {
            $('#classId').change(function (e) {
                e.preventDefault();
                var classId=$(this).val();
                console.log(classId);
                var table= $('#sampleTable').DataTable({
                dom: 'lBfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ],
                processing:true,
                serverSide:true,
                pagin:true,
                destroy:true,
                ajax:"{{url('mystudent/classwiseList/')}}"+'/'+classId,
                columns:[
                    { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                    { data: 'studentId', name: 'studentId' },
                    { data: 'firstName', name: 'firstName' },
                    { data: 'roll', name: 'roll' },
                    { data: 'className', name: 'className' },
                    { data: 'sectionName', name: 'sectionName'},
                    { data: 'shift', name: 'shift'},
                    // { data: 'session_years', name: 'session_years'},
                    { data: 'fatherName', name: 'fatherName'},
                    { data: 'motherName', name: 'motherName'},
                    { data: 'mobile', name: 'mobile'},
                    { data: 'action', name: 'action' }
                ]
            });
            // table.destroy();

    });



    </script>

    @endsection
