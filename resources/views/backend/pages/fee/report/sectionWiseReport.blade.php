@extends('backend.layouts.master')
	@section('title', 'Fee Management Report')
    @section('content')
    {{-- //main content --}}
    <div class="app-title">
        <div class="hmmm">
          <h1><i class="fa fa-edit"></i>Fee Management Report</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Home / Admin</li>
          <li class="breadcrumb-item"><a href="#">Report</a></li>
        </ul>
    </div>
    {{-- section --}}
        <div class="row justify-content-md-center">
            <div class="clearix"></div>
                <div class="col-md-8">
                    <div class="tile">
                        <div class="tile-body">
                        <div class="row">
                        <div class="form-group col">
                            <label for="exampleFormControlSelect1"> Session Year</label>
                                <select class="form-control " id="sessionYear" >
                                    <option value="">--Please Select--</option>
                                    @foreach ($sessionYear as $year)
                                        <option value="{{$year->id}}" {{$year->status == 1 ? 'selected': ''}}>{{$year->sessionYear}}</option>
                                    @endforeach
                                </select>
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
                        </div>
                        </div>
                    </div>
                </div>

                <div class="clearix"></div>
                <div class="col-md-8">
                    <div class="tile">
                    <div class="tile-body">
                        <input class="bg-warning text-dark float-right" type='button'  value=' Print ' id='doPrint'>
                        <div id="print_div">
                            <h3 class="tile-title">Section Wise Report </h3>
                                <div class="table-responsive">
                                <table class="table table-hover table-bordered" id="sampleTable">
                                <thead>
                                    <tr>
                                    <th>Sl</th>
                                    <th>Class</th>
                                    <th>Section</th>
                                    <th>Government Fees Total</th>
                                    <th>Non-Government Fees Total</th>
                                    <th>Total Fee</th>
                                    <th>Detail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                </div>


    </div>
    {{-- End section --}}
</div>

{{-- End Section --}}
<div class="clearix"></div>
    @endsection
    @section('script')
      @include('backend.partials.js.datatable');

    //script section
    <script>
$('#month').change(function(e){
    e.preventDefault();

    var month =$('#month').val();
    var sessionYearId =$('#sessionYear').val();

    console.log(month,sessionYearId);

    //alert('working');
    $.ajax({
        type: "get",
        url:"{{ url('feemanagement/report/sectionwise/show')}}"+'/'+month+'/'+sessionYearId,
        success: function (data) {

            console.log(data);
            $('tbody').html(data);


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
