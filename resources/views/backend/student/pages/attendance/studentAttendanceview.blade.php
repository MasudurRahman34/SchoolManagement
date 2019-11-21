@extends('backend.student.layouts.master')
	@section('title', 'Attendance Page')
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

   
            
           
            <div class="col-md-7">
                <div class="tile">
                    <div class="tile-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered" id="sampleTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>StudentId</th>
                                        <th>attendance</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="row">
              
              <div class="col-md-5">
                  <div class="tile">
                      <h3 class="tile-title">Attendance Information in Pie Chart</h3>
                      <div class="embed-responsive embed-responsive-16by9">
                          <canvas class="embed-responsive-item" id="pieChartDemo"></canvas>
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
    //   $('table').attr('id',month);
      var table=$('#sampleTable').DataTable({
            dom: 'lBfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
             processing:true,
             serverSide:true,
             ajax:"{{url('/student/attendance/show/')}}"+"/"+month,
             columns:[
                 { data: 'hash', name: 'hash' },
                 { data: 'studentId', name: 'studentId' },
                 { data: 'attendence', name: 'attendence' },
                 { data: 'created_at', name: 'created_at' },
             ]
         });
        table.destroy();
        table.draw();
        $.ajax({
            type: "get",
            url: "{{url('/student/attendance/attendancePercentage/')}}"+"/"+month,
            data: "data",
           
            success: function (response) {
                console.log(response);
                var absent=100- response;
                console.log(absent);
                var pdata = [{
                  value: response,
                  color: "#46BFBD",
                  highlight: "#5AD3D1",
                  label: "Persent"
              },
              {
                  value: absent,
                  color: "#F7464A",
                  highlight: "#FF5A5E",
                  label: "Absent"
              }
              
          ]
  
  
  
          var ctxp = $("#pieChartDemo").get(0).getContext("2d");
          var pieChart = new Chart(ctxp).Pie(pdata);
                
            }
        });
    }
  });
});


  </script>

@endsection
