@extends('backend.layouts.master')
	@section('title', 'User and role Page')
    @section('content')
            <div class="row user">
              <div class="col-md-3">
                <div class="profile" style="display: contents;">
                  <div class="info"><img class="user-img" src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/128.jpg">
                    <h5>{{$users->name}}</h5>
                    <h7>{{$users->designation}}</h7>
                    <h4></h4>
                  </div>
                </div>
                <div class="tile p-0">
                  <ul class="nav flex-column nav-tabs user-tabs">
                    <li class="nav-item"><a class="nav-link active" href="#user-timeline" data-toggle="tab">Timeline</a></li>

                    <li class="nav-item"><a class="nav-link" href="#"> Update Profile</a></li>
                    <li class="nav-item"><a class="nav-link" href="#"> My school ID card</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-md-9">
                <div class="">
                  <div class="tile">
                    <div class="tile-body">
                      <h5 class="tittle">About Me</h5>
                    </div>
                    <div class="container">
                      <div class="row">
                        <div class="col">
                          <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                              <strong> Name</strong>
                              <p class="list-group justify-content-between align-items-center"> {{$users->name}} </p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                              email
                              <p class="list-group justify-content-between align-items-center"> {{$users->email}} </p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                              Location
                              <p class="list-group justify-content-between align-items-center"> {{$users->address}} </p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                              Phone
                              <p class="list-group justify-content-between align-items-center"> {{$users->mobile}} </p>
                            </li>

                          </ul>
                        </div>
                        <div class="col">
                          <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                              Class
                              <p class="list-group justify-content-between align-items-center"> </p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                              Section
                              <p class="list-group justify-content-between align-items-center">  </p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                              Shift
                              <p class="list-group justify-content-between align-items-center">  </p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                              Session year
                              <p class="list-group justify-content-between align-items-center">    </p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                              Group
                              <p class="list-group justify-content-between align-items-center">  </p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                              Roll Number
                              <p class="list-group justify-content-between align-items-center">  </p>
                            </li>
                          </ul>
                        </div>
                        <div class="col">
                          <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                              Father name
                              <p class="list-group justify-content-between align-items-center">  </p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                              Mother Name
                              <p class="list-group justify-content-between align-items-center">  </p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                              Father Mobile No
                              <p class="list-group justify-content-between align-items-center">  </p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                              father/mother NID
                              <p class="list-group justify-content-between align-items-center"> </p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                              Father occopation
                              <p class="list-group justify-content-between align-items-center"> </p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                              Mother occopation
                              <p class="list-group justify-content-between align-items-center"></p>
                            </li>
                          </ul>
                        </div>
                      </div>
                      <!-- BIO AND SKILLS -->
                      <!-- Blog -->
                    </div>
                  </div>
                </div>
                <div class="col-md-9">
                  <div class="tab-content">
                    <div class="tab-pane active" id="user-timeline">
                      <div class="timeline-post">
                        <div class="post-media"><a href="#"><img
                              src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg"></a>
                          <div class="content">
                            <h5><a href="#">{{$users->name}}</a></h5>
                            <p class="text-muted"><small>{{$users->created_at}} {{$users->created_at->diffForHumans()}}</small></p>
                          </div>
                        </div>
                        <div class="post-content">
                          <p>Nothing</p>
                        </div>
                      </div>
                      <div class="timeline-post">
                        <div class="post-media"><a href="#"><img
                              src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg"></a>
                          <div class="content">
                            <h5><a href="#">{{$users->name}}</a></h5>
                            <p class="text-muted"><small>{{$users->created_at}} {{$users->created_at->diffForHumans()}}</small></p>
                          </div>
                        </div>
                        <div class="post-content">
                          <p>Nothing.</p>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="user-settings">
                      <div class="tile user-settings">

                      </div>
                    </div>
                  </div>
                </div>
              </div>

      <div class="clearix"></div>
    @endsection
    @section('script')
      {{-- @include('backend.partials.js.datatable'); --}}
      <script>
        </script>
@endsection
