@extends('backend.layouts.master')
	@section('title', 'Admin|| Individual Fee Collection')
    @section('content')
    <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i>Section Wish Student Individual Fee Collection </h1>
          <p></p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item"><a href="#">Individual Student Fee Collection</a></li>
        </ul>
    </div>
    @include('backend.partials._message')
    <style>
        @media print{
            .table-bordered{
            background-color: green;
        }
    }
    </style>
<div class="row justify-content-md-center">
    <div class="clearix"></div>
        <div class="col-md-9">
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
                    <div class="form-group col-md-4 pr-2" id="hidden" >
                            <label for="exampleFormControlSelect1"> Fee Name</label>
                            <select class="form-control " id="feeId">
                                    <option value="">--Select Fee--</option>
                            </select>
                    </div>
                    <div class="form-group col-md-4 pr-2" id="hidden1" >
                        <label for="exampleFormControlSelect1"> Amount</label>
                        <input class="form-control " type="number" id="amount" name="amount" required  readonly>

                    </div>

                    <div class="form-group col-md-4 pr-2" >
                        <label for="exampleFormControlSelect1"> Month</label>
                        {{-- <input class="form-control " id="month" type="month" placeholder="Pick a month" value="{{date('Y-m')}}"/> --}}
                        <select class="form-control " id="month">
                            <option value="">--Select Fee--</option>
                            <option value="JANUARY">JANUARY</option>
                            <option value="FEBRUARY">FEBRUARY</option>
                            <option value="MARCH">MARCH</option>
                            <option value="APRIL">APRIL</option>
                            <option value="MAY">MAY</option>
                            <option value="JUNE">JUNE</option>
                            <option value="JULY">JULY</option>
                            <option value="AUGUST">AUGUST</option>
                            <option value="SEPTEMBER">SEPTEMBER</option>
                            <option value="OCTOBER">OCTOBER</option>
                            <option value="NOVEMBER">NOVEMBER</option>
                            <option value="DECEMBER">DECEMBER</option>
                    </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="exampleFormControlSelect1"> Section</label>
                        <select class="form-control " id="sectionId">
                            <option value=""> --Please Select--  </option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="exampleFormControlSelect1"> Student Name</label>
                        <select class="form-control " id="studentId">
                            <option value=""> --Please Select--  </option>
                        </select>
                    </div>
                    <div class="form-group col-md-4 pr-2" id="hidden1" >
                        <label for="exampleFormControlSelect1"> minimum Paid Amount</label>
                        <input class="form-control " type="number" id="scholarshipAmount" name="amount"  readonly>

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
        <div class="tile">
            {{-- need to add field for input --}}
                <div class="tile-body" id="tblHidden" hidden>
                    <form action="{{route('store.feecollection')}}" method="post" id="myfeeform">
                        @csrf
                       <input type="text" name="sectionId" id="sectionId2" hidden>
                       <input type="text" name="classId2" id="classId2" hidden>
                       <input type="text" name="feeId2" id="feeId2" hidden>
                       <input type="text" name="amount2" id="amount2" hidden>
                       <input type="text" name="month2" id="month2" hidden>
                       <input type="text" name="sessionYear2" id="sessionYear2" hidden>
                       <input type="text" name="paymentType2" id="paymentType2" hidden>
                       <input type="text" name="studentId2" id="studentId2" hidden>
                       <input type='button'  value='Print' id='doPrint'>
                        <div class="table-responsive"  id="print_div">
                            <table class="table table-hover table-bordered" id="sampleTable">
                                <thead>
                                    <tr>
                                        <th>Fee Name</th>
                                        <th>Type</th>
                                        <th>Amount</th>
                                        <th>Due</th>
                                        <th>Total Paid</th>


                                        <th>Taken Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <button class="btn btn-primary" type="submit" id="btnFee"  disabled="true"><i class="fa fa-plus-square" aria-hidden="true"></i>Take Fee</button>
                    </form>
                </div>
            </div>
    </div>
    <div class="clearix"></div>
    @endsection
    @section('script')
    {{-- <script src="{{ asset('admin/js/printThis.js') }} "></script> --}}
    <script>
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

//on change section for find student
    $('#sectionId').change(function (e) {
        e.preventDefault();
        var sectionId=$("#sectionId").val();
        $("#sectionId2").attr('value',sectionId);
        var classId=$("#classId").val();
        $("#classId2").attr('value',classId);


    var amount=$("#amount").val();
    $("#amount2").attr('value',amount);
    var feeId=$("#feeId").val();
    $("#feeId2").attr('value',feeId);
    var month=$("#month").val();
    $("#month2").attr('value',month);
    var sessionYear=$("#sessionYear").val();
    $("#sessionYear2").attr('value',sessionYear);


        console.log(sectionId2,classId2);
        $.ajax({
          type: "get",
          url: "{{ url('feecollection/individualStudent')}}",
          data: {
            sectionId:sectionId,
            feeId:feeId,
            month:month,
          },
          success: function (data) {
            //change start from here
            //console.log(data);
            var option="<option>--Please Select--</option>";
            data.forEach(element => {
                option+=("<option value='"+element.id+"'>"+element.firstName+' '+element.lastName+'('+element.studentId+')'+"</option>");
                });
                $('#studentId').html(option);
                }
        });
    });


//on change section for find student
$('#studentId').change(function (e) {
    e.preventDefault();
    var sectionId=$("#sectionId").val();
    $("#sectionId2").attr('value',sectionId);
    var classId=$("#classId").val();
    $("#classId2").attr('value',classId);

    var amount=$("#amount").val();
    $("#amount2").attr('value',amount);
    var feeId=$("#feeId").val();
    $("#feeId2").attr('value',feeId);
    var month=$("#month").val();
    $("#month2").attr('value',month);
    var sessionYear=$("#sessionYear").val();
    $("#sessionYear2").attr('value',sessionYear);
    var studentId=$("#studentId").val();
    $("#studentId2").attr('value',studentId);

    console.log(sectionId2,amount2,feeId2,month2,sessionYear2,studentId2);
    // scholarship amount check for due calculation
    $.ajax({
        type: "get",
        url:"{{ url('feecollection/scholarshipAmount')}}",
        data: {
            sectionId:sectionId,
            feeId:feeId,
            month:month,
            studentId:studentId,
            classId:classId,
            amount:amount,
        },
        success: function (data) {
            console.log(data);
        //var amount = data;
            //$('#amount').text();
            $('#scholarshipAmount').val(data);
        }
    });

        $.ajax({
        type: "get",
        url: "{{ url('feecollection/individualStudentfind')}}",
        data: {
            sectionId:sectionId,
            feeId:feeId,
            month:month,
            studentId:studentId,
            classId:classId,
        },
        success: function (data) {

            if(data.outPut){
                //check for due condition
                //console.log(data.Stfees[0]['due']);
                console.log('if')
                var data1 =parseFloat(data.Stfees[0]['due']).toFixed(2);
                //checking for due amount in fee collection
                if(data1>0){
                    console.log("due founr",data1)
                    $('#tblHidden').attr('hidden',false);
                    $('#btnFee').attr('disabled',false);
                    $('#btnFee').html("Update Due Fee");
                    $('#myfeeform').attr("action", "individualFeecollection/update");


                    $('tbody').html(data.outPut);
                }else{
                    $('#tblHidden').attr('hidden',false);
                    $('#btnFee').attr('disabled',true);


                    $('tbody').html(data.outPut);
                }
            }else{
                $('#tblHidden').attr('hidden',false);
                $('#btnFee').attr('disabled',false);

                $('tbody').html(data.Fee);

            };
        }

        });

});






//print button in table
    $('#doPrint').on("click", function () {
        $('#print_div').printThis({
            debug: false,               // show the iframe for debugging
            importCSS: true,            // import parent page css
            importStyle: true,         // import style tags
            printContainer: true,       // print outer container/$.selector
            loadCSS: "",                // path to additional css file - use an array [] for multiple
            pageTitle: "",              // add title to print page
            removeInline: false,        // remove inline styles from print elements
            removeInlineSelector: "*",  // custom selectors to filter inline styles. removeInline must be true
            printDelay: 533,            // variable print delay
            header: null,               // prefix to html
            footer: null,               // postfix to html
            base: false,                // preserve the BASE tag or accept a string for the URL
            formValues: true,           // preserve input/form values
            canvas: false,              // copy canvas content
            doctypeString: '...',       // enter a different doctype for older markup
            removeScripts: false,       // remove script tags from print content
            copyTagClasses: false,      // copy classes from the html & body tag
            beforePrintEvent: null,     // function for printEvent in iframe
            beforePrint: null,          // function called before iframe is filled
            afterPrint: null            // function called before iframe is removed
        });
      });
    </script>
    @endsection


