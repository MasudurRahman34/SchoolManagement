@extends('backend.layouts.master')
	@section('title', 'Student List Page')
    @section('content')
    <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i>Manage All Student</h1>
          <p></p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item"><a href="#">All Student</a></li>
        </ul>
    </div>
<div class="row justify-content-md-center">
    <div class="col-md-9">
        <div class="tile">
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                            <tr>
                                <th></th>
                                <th>ID</th>
                                <th>Roll</th>
                                <th>Name</th>
                                <th>Class</th>
                                <th>Section</th>
                                <th>Shift</th>
                                <th>Father</th>
                                <th>Mother</th>
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
           var table= $('#sampleTable').DataTable({
                dom: 'lBfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ],
                processing:true,
                serverSide:true,

                // fixedColumns: true,
                ajax:"{{url('mystudent/list')}}",
                columns:[
                    {data: 'DT_RowIndex',name: 'DT_RowIndex'},
                    { data: 'studentId', name: 'studentId' },
                    { data: 'roll', name: 'roll' },
                    { data: 'firstName', name: 'firstName' },
                    { data: 'section.classes', name: 'section.classes' },
                    { data: 'section.sectionName', name: 'section.sectionName'},
                    { data: 'section.shift', name: 'section.shift'},
                    { data: 'fatherName', name: 'fatherName'},
                    { data: 'motherName', name: 'motherName'},
                    { data: 'mobile', name: 'mobile'},
                    { data: 'action', name: 'action' }
                ]
            });

    </script>

    @endsection
