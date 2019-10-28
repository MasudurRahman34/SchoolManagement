@extends('backend.layouts.master')
	@section('title', 'Home Page')
    @section('content')
    <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i> Manage Classes</h1>
          <p></p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item"><a href="#">Manage Classes</a></li>
        </ul>
    </div>
    <div class="col-md-12 col-sm-12">
        <div class="tile">
          <div class="tile-body">
            <div class="table-responsive">
            <table class="table table-hover table-bordered" id="sampleTable">
              <thead>
                <tr>
                  <th>School Type</th>
                  <th>Institution Name</th>
                  <th>Eiin Number</th>
                  <th>Head Name</th>
                  <th>Phone Number</th>
                  <th>District</th>
                  <th>Upozilla</th>
                  <th>Address</th>
                  <th>Date</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>

                    @foreach ($applyInstitutes as $applyIns)
                    <tr>
                        <td>{{$applyIns->schoolType}}</td>
                        <td>{{$applyIns->nameOfTheInstitution}}</td>
                        <td>{{$applyIns->eiinNumber}}</td>
                        <td>{{$applyIns->nameOfHead}}</td>
                        <td>{{$applyIns->phoneNumber}}</td>
                        <td>{{$applyIns->district}}</td>
                        <td>{{$applyIns->upazilla}}</td>
                        <td>{{$applyIns->address}}</td>
                        <td>{{$applyIns->created_at}}</td>
                        <td><button>Accept</button><button>Decline</button></td>
                    </tr>
                    @endforeach




              </tbody>
            </table>
          </div>
          </div>
        </div>
      </div>
  </div>
  <div class="clearix"></div>
@endsection
@section('script')
  @include('backend.partials.js.datatable');
  <script>

  </script>

@endsection

