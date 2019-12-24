@extends('backend.student.layouts.master')
	@section('title', 'Show fee page')
    @section('content')
    <div class="row ">
        <div class="col-md-3">
        <div class="tile p-0">
        <div class="form-group col-md-3">
              <label class="control-label mt-3">Month</label><br>
                <div class="custom-control month-radio custom-control-inline">
                    <input type="radio" name="month" id="month1" value="1" class="custom-control-input admission">
                    <label class="custom-control-label"  for="month1">JANUARY</label>
                 </div>
                <div class="custom-control month-radio custom-control-inline">
                    <input type="radio" name="month" id="month2" value="2" class="custom-control-input admission">
                    <label class="custom-control-label" for="month2">FEBRUARY</label>
                </div>
                <div class="custom-control month-radio custom-control-inline">
                    <input type="radio" name="month" id="month3" value="3" class="custom-control-input admission">
                    <label class="custom-control-label" for="month3">MARCH</label>
                </div>

              <div class="custom-control month-radio custom-control-inline">
                    <input type="radio" name="month" id="month4" value="4" class="custom-control-input admission">
                    <label class="custom-control-label"  for="month4">APRIL</label>
                 </div>
                <div class="custom-control month-radio custom-control-inline">
                    <input type="radio" name="month" id="month5" value="5" class="custom-control-input admission">
                    <label class="custom-control-label" for="month5">MAY</label>
                </div>
                <div class="custom-control month-radio custom-control-inline">
                    <input type="radio" name="month" id="month6" value="6" class="custom-control-input admission">
                    <label class="custom-control-label" for="month6">JUNE</label>
                </div>

              <div class="custom-control month-radio custom-control-inline">
                    <input type="radio" name="month" id="month7" value="7" class="custom-control-input admission">
                    <label class="custom-control-label"  for="month7">JULY</label>
                 </div>
                <div class="custom-control month-radio custom-control-inline">
                    <input type="radio" name="month" id="month8" value="8" class="custom-control-input admission">
                    <label class="custom-control-label" for="month8">AUGUST</label>
                </div>
                <div class="custom-control month-radio custom-control-inline">
                    <input type="radio" name="month" id="month9" value="9" class="custom-control-input admission">
                    <label class="custom-control-label" for="month9">SEPTEMBER</label>
                </div>

              <div class="custom-control month-radio custom-control-inline">
                    <input type="radio" name="month" id="month10" value="10" class="custom-control-input admission">
                    <label class="custom-control-label"  for="month10">OCTOBER</label>
                 </div>
                <div class="custom-control month-radio custom-control-inline">
                    <input type="radio" name="month" id="month11" value="11" class="custom-control-input admission">
                    <label class="custom-control-label" for="month11">NOVEMBER</label>
                </div>
                <div class="custom-control month-radio custom-control-inline">
                    <input type="radio" name="month" id="month12" value="12" class="custom-control-input admission">
                    <label class="custom-control-label" for="month12">December</label>
                </div>
              </div>
        </div>
        </div>
            <div class="col-md-8">
                <div class="tile">
                <h3 class=" row justify-content-md-center">Fee Details Information</h3>
                    <div class="tile-body">
                        
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered" id="sampleTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Payment Date</th>
                                        <th>Fee</th>
                                        <th>Type</th>
                                        <th>Total Amount</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                            <div class=" form-inline float-right">
                            <lebel for="Total">Total = </lebel><input type="text" class="form-control" id="Total" readonly/>
                        </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            </div>
            <div class="row">
          </div>

      <div class="clearix"></div>
    @endsection
    @section('script')
       @include('backend.student.partials.js.datatable');

       <script src="{{ asset('admin/js/plugins/chart.js') }} "></script>
       <script type="text/javascript">

  $(function(){
  $('input[type="radio"]').click(function(){
    if ($(this).is(':checked'))
    {

      var id=$(this).val();
      $.ajax({
          type: "get",
          url: "{{url('/student/fee/show/')}}"+"/"+id,
          data: "data",
          success: function (response) {
              console.log(response);
            $('tbody').html(response.tableOutPut);
            $('#Total').val(response.totalAmountPay+ "/=");
          }
      });
        
    }
    
  });
});
</script>

@endsection
