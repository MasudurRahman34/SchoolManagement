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
                        <label for="exampleFormControlSelect1"> Payment Type</label>

                        <select class="form-control " id="paymentType">
                            <option value="">Select Payment Type</option>
                        <option value="adminssion">Adminssion</option>
                        <option value="monthly">Monthly</option>
                    </select>
                    </div>
                    <div class="form-group col-xs-2 pr-2" id="hidden" >
                            <label for="exampleFormControlSelect1"> Fee Name</label>
                            <select class="form-control " id="feeId">
                                    <option value="">--Select Fee--</option>

                            </select>
                    </div>
                    <div class="form-group col-xs-2 pr-2" id="hidden1" >
                        <label for="exampleFormControlSelect1"> Amount</label>
                        <input class="form-control " type="number" id="amount" name="amount" required  readonly>

                    </div>

                    <div class="form-group col-xs-2 pr-2" >
                        <label for="exampleFormControlSelect1"> Month</label>
                        <input class="form-control " id="month" type="month" placeholder="Pick a month" value="{{date('Y-m')}}"/>

                    </div>


                    <div class="form-group col-xs-2">
                        <label for="exampleFormControlSelect1"> Section</label>
                        <select class="form-control " id="sectionId">
                            <option value=""> --Please Select--  </option>
                        </select>
                    </div>
                    <div class="form-group col" hidden>
                        <select class="form-control " id="sessionYear" >
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
                    <form action="{{route('store.feecollection')}}" method="post" id="attendence">
                        @csrf
                       <input type="text" name="feeId2" id="feeId2" hidden>
                       <input type="text" name="amount2" id="amount2" hidden>
                       <input type="text" name="month2" id="month2" hidden>
                       <input type="text" name="sessionYear2" id="sessionYear2" hidden>
                       <input type="text" name="paymentType2" id="paymentType2" hidden>
                        <div class="table-responsive" >
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                            <tr>
                                <th><input type="checkbox" id="allcb" /> Select All</th>

                                <th>Student Roll</th>
                                <th>Student Name</th>


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
      {{-- @include('backend.partials.js.script'); --}}
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
                type: "get",
                url:'/api/search/classfeelist',
                data: data,
                success: function (data) {
                    console.log(data);
                    var option="<option>--Please Select--</option>";
                    data.forEach(element => {

                        option+=("<option value='"+element.id+"'>"+element.name+"</option>");

                    });
                    $('#feeId').html(option);
                }
            });
        }

    });


    //show hidden field for adminssion
    $("#paymentType").change(function() {
        //alert('working');
        var val = $(this).val();
        if(val === "") {
            $('#hidden').attr('hidden',true);
            $('#hidden1').attr('hidden',true);
        }
        else if(val === "") {
            $('#hidden').attr('hidden',false);
            $('#hidden1').attr('hidden',false);
        }
      });


//on change fee id for find amount
$('#feeId').change(function (e) {
    e.preventDefault();
    var feeId= $("#feeId").val();
    console.log(feeId);
    var url='/api/search/feeamount';

        var data= {
            'feeId' : feeId,
        }
        $.ajax({
            type: "get",
            url:url,
            data: data,
            success: function (data) {
                console.log(data);
               //var amount = data;
                //$('#amount').text();
                $('#amount').val(data);
            }
        });

});

//datepicker
//$("#datepicker").datepicker( {
 //   format: "mm-yyyy",
 //   startView: "months",
 //   minViewMode: "months"
//});
//$("#myMonthPicker").Monthpicker();


//on change section for find student
    $('#sectionId').change(function (e) {
                e.preventDefault();

                var classId=$("#classId").val();
                $("#classId2").attr('value',classId);
                var sectionId=$("#sectionId").val();
                $("#sectionId2").attr('value',sectionId);
                var subjectId=$("#subjectId").val();
                $("#subjectId2").attr('value',subjectId);


                var amount=$("#amount").val();
                $("#amount2").attr('value',amount);
                var feeId=$("#feeId").val();
                $("#feeId2").attr('value',feeId);
                var month=$("#month").val();
                $("#month2").attr('value',month);
                var sessionYear=$("#sessionYear").val();
                $("#sessionYear2").attr('value',sessionYear);

                console.log(amount2,feeId2,month2,sessionYear2);

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
                    "<td>"+
                        '<input class="roll['+value.roll+']" type="checkbox" name="attend['+value.id+']" value="" id="fee">'
                    +"</td>"+
                    "<td>"+value.roll+"</td>"+
                    "<td>"+value.firstName+"</td>"+

              "</tr>";

           });

            $('tbody').html(tr);
          }
        // }
        });

        $('#allcb').change(function () {
            $('tbody tr td input[type="checkbox"]').prop('checked', $(this).prop('checked'));
        });

        //$('#marks').click(function() {
          //  var isChecked = $(this).prop("checked");
         //   $('#tblData tr:has(td)').find('input[type="checkbox"]').prop('checked', isChecked);
         // });
         // $('#tblData tr:has(td)').find('input[type="checkbox"]').click(function() {
          //  var isChecked = $(this).prop("checked");
          //  var isHeaderChecked = $("#marks").prop("checked");
           // if (isChecked == false && isHeaderChecked)
           //   $("#marks").prop('checked', isChecked);
           // else {
           //   $('#tblData tr:has(td)').find('input[type="checkbox"]').each(function() {
            //    if ($(this).prop("checked") == false)
           //       isChecked = false;
            //  });
            //  $("#marks").prop('checked', isChecked);
           // }
       // });

    });




    </script>

    @endsection

