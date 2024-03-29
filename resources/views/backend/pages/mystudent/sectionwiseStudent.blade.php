@extends('backend.layouts.master')
	@section('title', 'Admin|| Find Student Section Wish')
    @section('content')
    <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i>Section Wish Student</h1>
          <p></p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item"><a href="#">ClassWise Student</a></li>
        </ul>
    </div>
<div class="row justify-content-md-center">
    <div class="clearix"></div>
        <div class="col-md-8">
            <div class="tile">
                <div class="tile-body">
                    <div class="row">
                            <div class="form-group col-md-4">
                                    <label class="control-label mt-3">Shift</label><br>
                                        <div class="custom-control shift-radio custom-control-inline">
                                            <input type="radio" name="shift" id="shift1" value="Morning" class="custom-control-input admission" checked>
                                            <label class="custom-control-label"  for="shift1">Morning</label>
                                        </div>
                                        <div class="custom-control shift-radio custom-control-inline">
                                            <input type="radio" name="shift" id="shift2" value="Day" class="custom-control-input admission">
                                            <label class="custom-control-label" for="shift2">Day</label>
                                        </div>
                                        <div class="custom-control shift-radio custom-control-inline">
                                            <input type="radio" name="shift" id="shift3" value="Evening" class="custom-control-input admission">
                                            <label class="custom-control-label" for="shift3">Evening</label>
                                        </div>
                                </div>
                    <div class="form-group col-md-4">
                        <label for="exampleFormControlSelect1">Select Class</label>
                        <select class="form-control admission" id="classId" name="classId">
                            <option value="">--Please Select--</option>
                            @foreach ($class as $class)
                            <option value="{{$class->id}}">{{$class->className}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="exampleFormControlSelect1"> Section</label>
                        <select class="form-control" id="sectionId">
                            <option value=""> --Please Select--  </option>
                        </select>
                    </div>
                    <div class="form-group col-md-6" hidden>
                        <select class="form-control admission" id="sessionYear" >
                            <option value="">--Please Select--</option>
                            @foreach ($sessionYear as $year)
                                <option value="{{$year->id}}" {{$year->status == 1 ? 'selected': ''}}>{{$year->sessionYear}}</option>
                            @endforeach
                        </select>
                    </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
<div class="clearix"></div>
<div class="row justify-content-md-center">
    <div class="col-md-8">
        <div class="tile">
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Roll</th>
                                <th>Class</th>
                                <th>Section</th>
                                <th>Shift</th>
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
    dynamicSectionSelection();

    $('#sectionId').change(function (e) {
                e.preventDefault();

                var classId=$("#classId").val();
                var sectionId=$("#sectionId").val();

                console.log(classId, sectionId);
  
                var table= $('#sampleTable').DataTable({
                dom: 'lBfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ],
                processing:true,
                serverSide:true,
                pagin:true,
                destroy:true,
                ajax:"{{url('mystudent/sectionwiselist/')}}"+'/'+classId+'/'+sectionId,
                columns:[
                    { data: 'hash', name: 'hash' },
                    { data: 'firstName', name: 'firstName' },
                    { data: 'roll', name: 'roll' },
                    { data: 'className', name: 'className' },
                    { data: 'sectionName', name: 'sectionName'},
                    { data: 'shift', name: 'shift'},
                    { data: 'mobile', name: 'mobile'},
                    { data: 'action', name: 'action' }
                ]
            });
            //table.destroy();

    });
   



    </script>

    @endsection
