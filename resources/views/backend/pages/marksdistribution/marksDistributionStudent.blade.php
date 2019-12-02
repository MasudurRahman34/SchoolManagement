@extends('backend.layouts.master')
	@section('title', 'Admin|| Marks Distribution')
    @section('content')
    <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i>Section Wish Student Marks Distribution </h1>
          <p></p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item"><a href="#">ClassWise Student</a></li>
        </ul>
    </div>
    @include('backend.partials._message')
<div class="row justify-content-md-center">
        
    <div class="clearix"></div>
        <div class="col-md-9">
            <div class="tile">
                <div class="tile-body">
                <div class="row">
                    <div class="form-group col-xs-2">
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
                <div class="form-group col-xs-2 pr-2">
                        <label for="exampleFormControlSelect1">Select Class</label>
                        <select class="form-control admission" id="classId" name="classId">
                            <option value="">--Please Select--</option>
                            @foreach ($class as $class)
                            <option value="{{$class->id}}">{{$class->className}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-xs-2 pr-2">
                            <label for="exampleFormControlSelect1"> Subject Name</label>
                            <select class="form-control " id="subjectId">
                                    <option value="">--Please Select--</option>
                                    {{-- @foreach ($subjects as $subject)
                                    <option value="{{$subject->id}}">{{$subject->subjectName}}</option>
                                    @endforeach --}}
                            </select>
                    </div>
                    <div class="form-group col-xs-2 pr-2">
                        <label for="exampleFormControlSelect1"> Exam Type</label>
                        <input class="form-control " type="text" id="markType" value="" name="markType" required>
                    </div>    
                   
                    <div class="form-group col-xs-2">
                        <label for="exampleFormControlSelect1"> Section</label>
                        <select class="form-control " id="sectionId">
                            <option value=""> --Please Select--  </option>
                        </select>
                    </div>
                    <div class="form-group col" hidden>
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
    <div class="col-md-9 ">
        {{-- <div class="tile">
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
        </div> --}}
        <div class="tile">
            {{-- need to add field for input --}}
                <div class="tile-body" id="tblHidden" hidden>
                    <form action="{{route('store.mark')}}" method="post" id="attendence">
                        @csrf
                       <input type="text" name="sectionId" id="sectionId2" hidden>
                       <input type="text" name="classId2" id="classId2" hidden>
                       <input type="text" name="subjectId2" id="subjectId2" hidden>
                       <input type="text" name="markType2" id="markType2" hidden> 
                        <div class="table-responsive" >
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                            <tr>
                               
                                <th>Student Roll</th>
                                <th>Student Name</th>
                                <th>Marks</th>
                                
                            </tr>
                            </thead>
                            <tbody>
                       
                           
                            </tbody>
                        </table>
                        </div>
                        <button class="btn btn-primary " type="submit" id="btnAttendance" disabled="true"><i class="fa fa-plus-square" aria-hidden="true"></i>Attendance</button>
                    </form>
                </div>
            </div>
    </div>

      <div class="clearix"></div>
    @endsection
    @section('script')
      {{-- @include('backend.partials.js.datatable'); --}}
      <script>
          //fuction find subject name and section Name
        // $(document).ready( function () {
            $('.admission').change(function (e) {
        e.preventDefault();
        var classId= $("#classId").val();
        var sessionYearId=$('#sessionYear').val();
        var shift=$('input[name="shift"]:checked').val();
        console.log(classId);
       
        var url='/api/search/sectionbyclass';

        var data= {
            'classId' : classId,
            'sessionYearId' : sessionYearId,
            'shift' : shift,
        }
        if(classId>0){
            $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        },
                    });
            $.ajax({
                type: "post",
                url:url,
                data: data,
                success: function (data) {
                    console.log(data);
                    var option="<option>--Please Select--</option>";
                    data.forEach(element => {
                       
                        option+=("<option value='"+element.id+"'>"+element.sectionName+"</option>");
        
                    });             
                    $('#sectionId').html(option);
                }
            });
            $.ajax({
                type: "post",
                url:'/api/search/classsubject',
                data: data,
                success: function (data) {
                    console.log(data);
                    var option="<option>--Please Select--</option>";
                    data.forEach(element => {
                       
                        option+=("<option value='"+element.id+"'>"+element.subjectName+"</option>");
        
                    });             
                    $('#subjectId').html(option);
                }
            });
        }
    });

    $('#sectionId').change(function (e) {
                e.preventDefault();

                var classId=$("#classId").val();
                $("#classId2").attr('value',classId);
                var sectionId=$("#sectionId").val();
                $("#sectionId2").attr('value',sectionId);
                var subjectId=$("#subjectId").val();
                $("#subjectId2").attr('value',subjectId);
                var markType=$("#markType").val();
                $("#markType2").attr('value',markType);

                console.log(classId, sectionId,subjectId,markType);
  
            $.ajax({
          type: "post",
          url: "{{ url('adminview/student/studentData')}}",
          data: {
            sectionId:sectionId,
            subjectId:subjectId
          },
          
          success: function (response) {
        //   console.log(response);
        //   if(response.redirectToEdit){
        //     var txt;
        //       if (confirm("Attendance has been Taken At This Date, Do You Need update ?")) {
        //         window.location.href = response.redirectToEdit;
        //       } else {
        //         document.getElementById("myform").reset();
        //       }
           
        //   }else{
            $('#tblHidden').attr('hidden',false);
            $('#btnAttendance').attr('disabled',false);
          
            var tr='';
            $.each (response, function (key, value) {
            tr +=
                "<tr>"+
                    
                    "<td>"+value.roll+"</td>"+
                    "<td>"+value.firstName+"</td>"+
                    "<td>"+
                        '<input class="roll['+value.roll+']" type="number" min="0" max="100" name="attend['+value.id+']" value="" id="marks">'
                    +"</td>"+
              "</tr>";
          
           });

            $('tbody').html(tr);
          }
        // }
        });
            

    });
   



    </script>

    @endsection
