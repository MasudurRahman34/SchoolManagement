
  @extends('backend.layouts.master')
	@section('title', 'Home Page')
    @section('content')
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
        <p>Role: {{Auth::user()->getRoleNames()}}</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        </ul>
      </div>
      <div class="row">
        @can('Super Admin')
        <div class="col-md-6 col-lg-3">
            <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
                <div class="info">
                <h4 class="font-weight-bold">School And Branch</h4>
                <p class="float-right"> Total <b>5</b></p>
                </div>
            </div>
        </div>
        @endcan

            <div class="col-md-6 col-lg-3">
                <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
                    <div class="info">
                    <h4 class="font-weight-bold">Total Student</h4>
                    <h4 class="float-right"  > <b id="totalstudent"></b></h4>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                    <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
                        <div class="info">
                        <h4 class="font-weight-bold">Overall Attendance Percentage</h4>
                        <p class="float-right"> Present <b  id="attendance"></b></p>
                        </div>
                    </div>
            </div>

            
            <div class="col-md-6 col-lg-3">
                    <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
                        <div class="info">
                        <h4 class="font-weight-bold">Total Teacher</h4>
                        <p class="float-right"> Total <b id="totalteacher"></b></p>
                        </div>
                    </div>
            </div>
            <div class="col-md-6 col-lg-3">
                    <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
                        <div class="info">
                        <h4 class="font-weight-bold">Total School Employee</h4>
                        <p class="float-right">  <b id="totaluser"></b></p>
                        </div>
                    </div>
            </div>
            <div class="col-md-6 col-lg-3">
                    <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
                        <div class="info">
                        <h4 class="font-weight-bold">Total Section</h4>
                        <p class="float-right">  <b id="totalsection"></b></p>
                        </div>
                    </div>
            </div>
            <!-- <div class="col-md-6">
              <div class="tile">
                <h3 class="tile-title">Bar Chart</h3>
                <div class="embed-responsive embed-responsive-16by9">
                  <canvas class="embed-responsive-item" id="barChartDemo"></canvas>
                </div>
              </div> -->
            
          </div>
          <div class="row">
          <div class="col-md-6">
              <div class="tile">
                <h3 class="tile-title"> Classwish Attendance</h3>
                <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <!-- <th> Class Name</th> -->
                                <th> Class Name</th>
                                <th>Number of Student Present</th>
                            </tr>
                        </thead>
                    </table>
                  </div>
              </div>
            </div>
          </div>
          


<!-- 
        @can('Admission')
        <div class="col-md-6 col-lg-3">
            <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
                <div class="info">
                <h4 class="font-weight-bold">Admission</h4>
                <p class="float-right"> Total <b>5</b></p>
                </div>
            </div>
        </div>
        @endcan
        @can('Student')
        <div class="col-md-6 col-lg-3">
          <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
            <div class="info">
              <h4 class="font-weight-bold">Student</h4>
              <p class="float-right"> Total <b>5</b></p>
            </div>
          </div>
        </div>
        @endcan
        @can('Teacher')
        <div class="col-md-6 col-lg-3">
          <div class="widget-small info coloured-icon"><i class="icon fa fa-thumbs-o-up fa-3x"></i>
            <div class="info">
              <h4>Teachers</h4>
              <p><b>25</b></p>
            </div>
          </div>
        </div>
        @endcan
        @can('Staff')
        <div class="col-md-6 col-lg-3">
          <div class="widget-small warning coloured-icon"><i class="icon fa fa-files-o fa-3x"></i>
            <div class="info">
              <h4>Employee</h4>
              <p><b>10</b></p>
            </div>
          </div>
        </div>
        @endcan
        @can('Library')
        <div class="col-md-6 col-lg-3">
          <div class="widget-small danger coloured-icon"><i class="icon fa fa-star fa-3x"></i>
            <div class="info">
              <h4>Library</h4>
              <p><b>500</b></p>
            </div>
          </div>
        </div>
        @endcan
        @can('Notice')
        <div class="col-md-6 col-lg-3">
          <div class="widget-small danger coloured-icon"><i class="icon fa fa-star fa-3x"></i>
            <div class="info">
              <h4>Notice</h4>
              <p><b>500</b></p>
            </div>
          </div>
        </div>
        @endcan
        @can('Event');
        <div class="col-md-6 col-lg-3">
          <div class="widget-small danger coloured-icon"><i class="icon fa fa-star fa-3x"></i>
            <div class="info">
              <h4>Event</h4>
              <p><b>500</b></p>
            </div>
          </div>
        </div>
        @endcan
        @can('Attendence')
        <div class="col-md-6 col-lg-3">
                <div class="widget-small danger coloured-icon"><i class="icon fa fa-star fa-3x"></i>
                  <div class="info">
                    <h4>Attendence</h4>
                    <p><b>500</b></p>
                  </div>
                </div>
            </div>
      @endcan
      @can('Class')
      <div class="col-md-6 col-lg-3">
              <div class="widget-small danger coloured-icon"><i class="icon fa fa-star fa-3x"></i>
                <div class="info">
                  <h4>Class</h4>
                  <p><b>500</b></p>
                </div>
              </div>
          </div>
    @endcan
    </div> -->


      @endsection
      @section('script')
       <!-- @include('backend.partials.js.map');  -->
       @include('backend.student.partials.js.datatable'); 
      <script type="text/javascript">
       $(document).ready(function () {
          
       var d = new Date();  
       var month=d.getMonth()+1;

       //overall current monthly attendence for all student 
      
         $.ajax({
             type: "get",
             url: "{{url('/api/search/StudentAttendancePercentage')}}"+"/"+month,
             data: "data",
             success: function (data) {
              var data1 =parseFloat(data.data).toFixed(2); 
              $('#attendance').html(data1);
          //        console.log(response);
                // document.getElementById("attendance").innerHTML= parseFloat(data).toFixed(2);   
             }
         });

         // total student of a  school

         $.ajax({
             type: "GET",
             url: "{{url('/api/search/totalstudent')}}",
             data: "data",
             success: function (data) {
                $('#totalstudent').html(data.data);
             }
         });

         //total teacher of this school  
         $.ajax({
             type: "GET",
             url: "{{url('/api/search/totalTeacher')}}",
             data: "data",
             success: function (data) {
                $('#totalteacher').html(data.data);
             }
         });

         //total user of this school
         $.ajax({
             type: "GET",
             url: "{{url('/api/search/totalUser')}}",
             data: "data",
             success: function (data) {
                $('#totaluser').html(data.data);
             }
         });

         //total section created by school
         $.ajax({
             type: "GET",
             url: "{{url('/api/search/totalsection')}}",
             data: "data",
             success: function (data) {
                $('#totalsection').html(data.data);
             }
         });


        //  $.ajax({
        //      type: "GET",
        //      url: "{{url('/api/search/classwishAttentage')}}",
        //      data: "data",
        //      dataType: 'json',
        //      success: function (data) {
        //       var xl, i=" ";
        //         // console.log(data.attn[0].sectionName);
        //         for (x in data.attn) {
        //           console.log(x);
                
        //      }console.log(xl);
        //     }
        //  });

         var table=$('#sampleTable').DataTable({
            dom: 'lBfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
             processing:true,
             serverSide:true,
             ajax:"{{url('/api/search/classwishAttentage')}}",
             columns:[
                 { data: 'hash', name: 'hash' },
                //  { data: 'ClassName', name: 'ClassName' },
                 { data: 'className', name: 'className' },
                 { data: 'present', name: 'present' },
             ]
         });

      //    var data = {
      // 	labels: ["January", "February", "March", "April", "May"],
      // 	datasets: [
      // 		{
      // 			label: "My First dataset",
      // 			fillColor: "rgba(220,220,220,0.2)",
      // 			strokeColor: "rgba(220,220,220,1)",
      // 			pointColor: "rgba(220,220,220,1)",
      // 			pointStrokeColor: "#fff",
      // 			pointHighlightFill: "#fff",
      // 			pointHighlightStroke: "rgba(220,220,220,1)",
      // 			data: [65, 59, 80, 81, 56]
      // 		},
      // 		{
      // 			label: "My Second dataset",
      // 			fillColor: "rgba(151,187,205,0.2)",
      // 			strokeColor: "rgba(151,187,205,1)",
      // 			pointColor: "rgba(151,187,205,1)",
      // 			pointStrokeColor: "#fff",
      // 			pointHighlightFill: "#fff",
      // 			pointHighlightStroke: "rgba(151,187,205,1)",
      // 			data: [100, 48, 40, 19, 86]
      // 		}
      // 	]
      // };

      //    var ctxb = $("#barChartDemo").get(0).getContext("2d");
      // var barChart = new Chart(ctxb).Bar(data);
     
   });
   </script>
      @endsection

    <!-- Essential javascripts for application to work-->
