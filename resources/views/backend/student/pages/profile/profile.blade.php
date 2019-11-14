@extends('backend.student.layouts.master')
	@section('title', 'Home Page')
    @section('content')
            <div class="row user">
              <div class="col-md-3">
                <div class="profile" style="display: contents;">
                  <div class="info"><img class="user-img" src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/128.jpg">
                    <h4>John Doe</h4>
                    <p>Sun flower School</p>
                  </div>
                </div>
                <div class="tile p-0">
                  <ul class="nav flex-column nav-tabs user-tabs">
                    <li class="nav-item"><a class="nav-link active" href="#user-timeline" data-toggle="tab">Timeline</a></li>

                    <li class="nav-item"><a class="nav-link" href="updateStudentProfile.html"> Update Profile</a></li>
                    <li class="nav-item"><a class="nav-link" href="studentId2.html"> My school ID card</a></li>
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
                              <p class="list-group justify-content-between align-items-center"> John Doe </p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                              Age
                              <p class="list-group justify-content-between align-items-center"> 38 Years </p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                              Location
                              <p class="list-group justify-content-between align-items-center"> Rome, Italy </p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                              Phone
                              <p class="list-group justify-content-between align-items-center"> (800) 123-4567 </p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                              Date of Birth
                              <p class="list-group justify-content-between align-items-center"> 12/10/2001 </p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                              Blood Grop
                              <p class="list-group justify-content-between align-items-center"> O+ </p>
                            </li>

                          </ul>
                        </div>
                        <div class="col">
                          <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                              Class
                              <p class="list-group justify-content-between align-items-center"> Nine </p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                              Section
                              <p class="list-group justify-content-between align-items-center"> A </p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                              Shift
                              <p class="list-group justify-content-between align-items-center"> Evening </p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                              Session year
                              <p class="list-group justify-content-between align-items-center"> 2019 </p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                              Group
                              <p class="list-group justify-content-between align-items-center"> Sceince</p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                              Roll Number
                              <p class="list-group justify-content-between align-items-center"> 02 </p>
                            </li>
                          </ul>
                        </div>
                        <div class="col">
                          <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                              Father name
                              <p class="list-group justify-content-between align-items-center"> Jamal </p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                              Mother Name
                              <p class="list-group justify-content-between align-items-center"> Jarin </p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                              Father Mobile No
                              <p class="list-group justify-content-between align-items-center"> 0198356723 </p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                              father/mother NID
                              <p class="list-group justify-content-between align-items-center"> 12345678901234567 </p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                              Father occopation
                              <p class="list-group justify-content-between align-items-center"> Business</p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                              Mother occopation
                              <p class="list-group justify-content-between align-items-center"> House wife </p>
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
                            <h5><a href="#">John Doe</a></h5>
                            <p class="text-muted"><small>2 oct at 9:30</small></p>
                          </div>
                        </div>
                        <div class="post-content">
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis tion ullamco laboris nisi ut aliquip ex
                            ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore
                            eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                            deserunt mollit anim id est laborum.</p>
                        </div>
                      </div>
                      <div class="timeline-post">
                        <div class="post-media"><a href="#"><img
                              src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg"></a>
                          <div class="content">
                            <h5><a href="#">John Doe</a></h5>
                            <p class="text-muted"><small>1 oct at 9:30</small></p>
                          </div>
                        </div>
                        <div class="post-content">
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis tion ullamco laboris nisi ut aliquip ex
                            ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore
                            eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                            deserunt mollit anim id est laborum.</p>
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
