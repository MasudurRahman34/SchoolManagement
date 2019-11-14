
  @extends('backend.student.layouts.master')
	@section('title', 'Home')
    @section('content')
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
        <p>Role: {{Auth::guard('student')->user()->Name}}</p>
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
                <h4 class="font-weight-bold">Admission</h4>
                <p class="float-right"> Total <b>5</b></p>
                </div>
            </div>
        </div>


        <div class="col-md-6 col-lg-3">
          <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
            <div class="info">
              <h4 class="font-weight-bold">Student</h4>
              <p class="float-right"> Total <b>5</b></p>
            </div>
          </div>
        </div>


        <div class="col-md-6 col-lg-3">
          <div class="widget-small info coloured-icon"><i class="icon fa fa-thumbs-o-up fa-3x"></i>
            <div class="info">
              <h4>Teachers</h4>
              <p><b>25</b></p>
            </div>
          </div>
        </div>


        <div class="col-md-6 col-lg-3">
          <div class="widget-small warning coloured-icon"><i class="icon fa fa-files-o fa-3x"></i>
            <div class="info">
              <h4>Employee</h4>
              <p><b>10</b></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small danger coloured-icon"><i class="icon fa fa-star fa-3x"></i>
            <div class="info">
              <h4>Library</h4>
              <p><b>500</b></p>
            </div>
          </div>
        </div>


        <div class="col-md-6 col-lg-3">
          <div class="widget-small danger coloured-icon"><i class="icon fa fa-star fa-3x"></i>
            <div class="info">
              <h4>Notice</h4>
              <p><b>500</b></p>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-3">
          <div class="widget-small danger coloured-icon"><i class="icon fa fa-star fa-3x"></i>
            <div class="info">
              <h4>Event</h4>
              <p><b>500</b></p>
            </div>
          </div>
        </div>


        <div class="col-md-6 col-lg-3">
                <div class="widget-small danger coloured-icon"><i class="icon fa fa-star fa-3x"></i>
                  <div class="info">
                    <h4>Attendence</h4>
                    <p><b>500</b></p>
                  </div>
                </div>
            </div>


      <div class="col-md-6 col-lg-3">
        <div class="widget-small danger coloured-icon"><i class="icon fa fa-star fa-3x"></i>
        <div class="info">
            <h4>Class</h4>
            <p><b>500</b></p>
        </div>
        </div>
    </div>
      @endsection
      @section('script')
      {{-- @include('backend.partials.js.map'); --}}
      <script>
        //   adminIndexMap();
      </script>
      @endsection

    <!-- Essential javascripts for application to work-->
