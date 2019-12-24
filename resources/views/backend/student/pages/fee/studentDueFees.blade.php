@extends('backend.student.layouts.master')
	@section('title', 'Due fee page')
    @section('content')
    <div class="row ">
        <div class="col-md-3">
        <div class="tile p-0">
        <div class="form-group col-md-3" id="tblFruits">
              <label class="control-label mt-3">Month</label><br>
                <div class="custom-control month-radio custom-control-inline">
                    <input type="radio" name="month" id="month1" value="JANUARY" class="custom-control-input admission">
                    <label class="custom-control-label attnchange"  for="month1">JANUARY</label>
                 </div>
                <div class="custom-control month-radio custom-control-inline">
                    <input type="radio" name="month" id="month2" value="FEBRUARY" class="custom-control-input admission">
                    <label class="custom-control-label attnchange" for="month2">FEBRUARY</label>
                </div>
                <div class="custom-control month-radio custom-control-inline">
                    <input type="radio" name="month" id="month3" value="MARCH" class="custom-control-input admission" >
                    <label class="custom-control-label attnchange" for="month3">MARCH</label>
                </div>

              <div class="custom-control month-radio custom-control-inline">
                    <input type="radio" name="month" id="month4" value="APRIL" class="custom-control-input admission">
                    <label class="custom-control-label attnchange"  for="month4">APRIL</label>
                 </div>
                <div class="custom-control month-radio custom-control-inline">
                    <input type="radio" name="month" id="month5" value="MAY" class="custom-control-input admission">
                    <label class="custom-control-label attnchange" for="month5">MAY</label>
                </div>
                <div class="custom-control month-radio custom-control-inline">
                    <input type="radio" name="month" id="month6" value="JUNE" class="custom-control-input admission">
                    <label class="custom-control-label attnchange" for="month6">JUNE</label>
                </div>

              <div class="custom-control month-radio custom-control-inline">
                    <input type="radio" name="month" id="month7" value="JULY" class="custom-control-input admission">
                    <label class="custom-control-label attnchange"  for="month7">JULY</label>
                 </div>
                <div class="custom-control month-radio custom-control-inline">
                    <input type="radio" name="month" id="month8" value="AUGUST" class="custom-control-input admission">
                    <label class="custom-control-label attnchange" for="month8">AUGUST</label>
                </div>
                <div class="custom-control month-radio custom-control-inline">
                    <input type="radio" name="month" id="month9" value="SEPTEMBER" class="custom-control-input admission">
                    <label class="custom-control-label attnchange" for="month9">SEPTEMBER</label>
                </div>

              <div class="custom-control month-radio custom-control-inline">
                    <input type="radio" name="month" id="month10" value="OCTOBER" class="custom-control-input admission">
                    <label class="custom-control-label attnchange"  for="month10">OCTOBER</label>
                 </div>
                <div class="custom-control month-radio custom-control-inline">
                    <input type="radio" name="month" id="month11" value="NOVEMBER" class="custom-control-input admission">
                    <label class="custom-control-label attnchange" for="month11">NOVEMBER</label>
                </div>
                <div class="custom-control month-radio custom-control-inline">
                    <input type="radio" name="month" id="month12" value="DECEMBER" class="custom-control-input admission">
                    <label class="custom-control-label attnchange" for="month12">DECEMBER</label>
                </div>
              </div>
	</p>
        </div>
        </div>
            <div class="col-md-9">
                <div class="tile">
                <h3 class=" row justify-content-md-center">Student Fee Due Informations</h3>
                    <div class="tile-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered" id="sampleTable">
                                <thead>
                                    <tr>
                                        <th>Fee</th>
                                        <th>Amount</th>
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
      var month=$(this).val();
      console.log(month);
      $.ajax({
          type: "get",
          url: "{{url('student/due2/fee/show')}}"+"/"+month,
          success: function (response) {
              console.log(response);
              $('tbody').html(response.tableOut);
              $('#Total').val(response.totalNotGiven);
             
            
          }
      });
        
    }
    
  });
});
  </script>

@endsection
