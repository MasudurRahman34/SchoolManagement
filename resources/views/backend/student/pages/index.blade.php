
  @extends('backend.student.layouts.master')
	@section('title', 'Student Page')
    @section('content')
    <style>
    .card {
    overflow:hidden;
}

.card-body .rotate {
    z-index: 8;
    float: right;
    height: 100%;
}

.card-body .rotate i {
    color: rgba(20, 20, 20, 0.15);
    position: absolute;
    left: 0;
    left: auto;
    right: -10px;
    bottom: 0;
    display: block;
    -webkit-transform: rotate(-44deg);
    -moz-transform: rotate(-44deg);
    -o-transform: rotate(-44deg);
    -ms-transform: rotate(-44deg);
    transform: rotate(-44deg);
}

</style>
    <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Student Dashboard</h1>
          <p>Role: Not Assign</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        </ul>
    </div>
      <!-- Will be applied progress bar -->
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
             <div class="progress" id="pg">
                <div class="progress-bar" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;">
                 
                    <span class="sr-only">50% Complete</span>
                </div>
                <span class="progress-type text-uppercase">Profile</span>
                <span class="progress-completed">50%</span>
             </div>
          </div>
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-xl-3 col-sm-6 py-2">
            <div class="card bg-success text-white h-100">
                <div class="card-body bg-success">
                    <div class="rotate">
                        <i class="fa fa-user fa-4x"></i>
                    </div>
                    <h6 class="text-uppercase">Notifications</h6>
                    <h1 class="display-4">12</h1>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 py-2">
            <div class="card text-white bg-danger h-100">
                <div class="card-body bg-danger">
                    <div class="rotate">
                        <i class="fa fa-list fa-4x"></i>
                    </div>
                    <h6 class="text-uppercase">Event</h6>
                    <h1 class="display-4">10</h1>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 py-2">
            <div class="card text-white bg-info h-100">
                <div class="card-body bg-info">
                    <div class="rotate">
                        <i class="fa fa-twitter fa-4x"></i>
                    </div>
                    <h6 class="text-uppercase">Attendance</h6>
                    <h1 class="display-4">95%</h1>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 py-2">
            <div class="card text-white bg-warning h-100">
                <div class="card-body">
                    <div class="rotate">
                        <i class="fa fa-share fa-4x"></i>
                    </div>
                    <h6 class="text-uppercase">Exam Result</h6>
                    <h1 class="display-4">10</h1>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 py-2">
            <div class="card text-white bg-warning h-100">
                <div class="card-body">
                    <div class="rotate">
                        <i class="fa fa-share fa-4x"></i>
                    </div>
                    <h6 class="text-uppercase">Due Fees</h6>
                    <h1 class="display-4">100</h1>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 py-2">
            <div class="card text-white bg-warning h-100">
                <div class="card-body">
                    <div class="rotate">
                        <i class="fa fa-share fa-4x"></i>
                    </div>
                    <h6 class="text-uppercase">Expenses</h6>
                    <h1 class="display-4">10000</h1>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 py-2">
                <div class="card text-white bg-danger h-100">
                    <div class="card-body">
                        <div class="rotate">
                            <i class="fa fa-share fa-4x"></i>
                        </div>
                        <h6 class="text-uppercase">Leave</h6>
                        <h1 class="display-4">2</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-5">
                <div class="tile">
                    <h3 class="tile-title">Attendance Information</h3>
                    <div class="embed-responsive embed-responsive-16by9">
                        <canvas class="embed-responsive-item" id="pieChartDemo"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="tile">
                    <div class="tile-body">
                        <h6 class="text-uppercase">Last Exam Result</h6><hr>
                    <div class="table-responsive">
                        <table class="table table-striped" id="sampleTable">
                          <thead>
                              <tr>
                              <th>Subject Name</th>
                              <th>Subject Code</th>
                              <th>Marks</th>
                              </tr>
                          </thead>
                          <tbody>
                              <tr>
                              <td>physics</td>
                              <td>767697661</td>
                              <td>80</td>
                              </tr>
                              <tr>
                              <td>physics</td>
                              <td>767697661</td>
                              <td>70</td>
                              </tr>
                              <tr>
                              <td>physics</td>
                              <td>767697661</td>
                              <td>85</td>
                              </tr>
                              <tr>
                              <td>physics</td>
                              <td>767697661</td>
                              <td>78</td>
                              </tr>
                              <tr>
                              <td>English</td>
                              <td>767697661</td>
                              <td>76</td>
                              </tr>
                              <tr>
                              <td>English</td>
                              <td>767697661</td>
                              <td>81</td>
                              </tr>
                          </tbody>
                        </table>
                    </div>
                </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 col-sm-4">
                <div class="tile">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Class Routins</h5>
                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                            <a href="#" class="btn btn-primary">Download</a>
                        </div>
                    </div>
                </div> 
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="tile">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Syllabus  </h5>
                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                            <a href="#" class="btn btn-primary">Download</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
            <div class="tile">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Book List  </h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-primary">Download</a>
                    </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="tile">
                    <div class="tile-body">
                        <div class="page-header">
                        <h2 class="mb-3 line-head" id="indicators">Notifications</h2>
                        </div>
                        <div class="bs-component">
                        <div class="alert alert-dismissible alert-success">
                            <button class="close" type="button" data-dismiss="alert">×</button><strong>Well done!</strong> You successfully read <a class="alert-link" href="#">this important alert message</a>.
                        </div>
                        </div>
                        <div class="bs-component">
                        <div class="alert alert-dismissible alert-success">
                            <button class="close" type="button" data-dismiss="alert">×</button><strong>Well done!</strong> You successfully read <a class="alert-link" href="#">this important alert message</a>.
                        </div>
                        </div>
                        <div class="bs-component">
                        <div class="alert alert-dismissible alert-info">
                            <button class="close" type="button" data-dismiss="alert">×</button><strong>Heads up!</strong> This <a class="alert-link" href="#">alert needs your attention</a>, but it's not super important.
                        </div>
                        </div>
                        <div class="bs-component">
                        <div class="alert alert-dismissible alert-info">
                            <button class="close" type="button" data-dismiss="alert">×</button><strong>Heads up!</strong> This <a class="alert-link" href="#">alert needs your attention</a>, but it's not super important.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="tile">
                <div class="card">
                        <div class="page-header">
                                <h2 class="mb-3 line-head" id="indicators">Event Information</h2>
                                </div>
                    <div class="card-body">
                        <h5 class="card-title">Event Name</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                    <div class="card-body">
                            <h5 class="card-title">Event Name</h5>
                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                </div>
            </div>    
        </div>
      @endsection
      @section('script')
      {{-- @include('backend.partials.js.map'); --}}
      <script>
        //   adminIndexMap();
      </script>
      <script type="text/javascript">
        var pdata = [{
                value: 4,
                color: "#46BFBD",
                highlight: "#5AD3D1",
                label: "Persent"
            },
            {
                value: 1,
                color: "#F7464A",
                highlight: "#FF5A5E",
                label: "Absent"
            }
            
        ]

        var ctxp = $("#pieChartDemo").get(0).getContext("2d");
        var pieChart = new Chart(ctxp).Pie(pdata);
      </script>
      @endsection

    <!-- Essential javascripts for application to work-->
