@extends('backend.student.layouts.master')
	@section('title', 'Show Profile')
    @section('content')
            <div class="row user">
              <div class="col-md-3">
                <div class="profile" style="display: contents;">
                  <div class="info"><img class="user-img" src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/128.jpg">
                    <h5>{{$students->firstName}}</h5>
                    <h7>Class : {{$students->Section->classes->className}}</h7>
                    <h4>{{$students->schoolBranch->nameOfTheInstitution}}</h4>
                  </div>
                </div>
                <div class="tile p-0">
                  <ul class="nav flex-column nav-tabs user-tabs">
                    <li class="nav-item"><a class="nav-link active" href="#user-timeline" data-toggle="tab">Timeline</a></li>

                    <li class="nav-item"><a class="nav-link" href="{{route('student.edit.profile')}}"> Update Profile</a></li>
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
                              <p class="list-group justify-content-between align-items-center"> {{$students->firstName}} </p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                              Age
                              <p class="list-group justify-content-between align-items-center"> {{$students->age}}  </p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                              Location
                              <p class="list-group justify-content-between align-items-center"> {{$students->address}} </p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                              Phone
                              <p class="list-group justify-content-between align-items-center"> {{$students->mobile}} </p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                              Date of Birth
                              <p class="list-group justify-content-between align-items-center"> {{$students->birthDate}} </p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                              Blood Grop
                              <p class="list-group justify-content-between align-items-center"> {{$students->blood}} </p>
                            </li>

                          </ul>
                        </div>
                        <div class="col">
                          <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                              Class
                              <p class="list-group justify-content-between align-items-center"> {{$students->Section->classes->className}} </p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                              Section
                              <p class="list-group justify-content-between align-items-center"> {{$students->Section->sectionName}} </p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                              Shift
                              <p class="list-group justify-content-between align-items-center"> {{$students->Section->shift}} </p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                              Session year
                              <p class="list-group justify-content-between align-items-center">  {{$students->Section->SessionYear->sessionYear}}  </p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                              Group
                              <p class="list-group justify-content-between align-items-center">  {{$students->group}}</p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                              Roll Number
                              <p class="list-group justify-content-between align-items-center"> {{$students->roll}}  </p>
                            </li>
                          </ul>
                        </div>
                        <div class="col">
                          <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                              Father name
                              <p class="list-group justify-content-between align-items-center">  {{$students->fatherName}} </p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                              Mother Name
                              <p class="list-group justify-content-between align-items-center"> {{$students->motherName}} </p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                              Father occopation
                              <p class="list-group justify-content-between align-items-center">{{$students->fatherOccupation}}</p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                              Mother occopation
                              <p class="list-group justify-content-between align-items-center"> {{$students->MotherOccupation}}</p>
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
                            <h5><a href="#">{{$students->firstName}}</a></h5>
                            <p class="text-muted"><small>{{$students->created_at}} {{$students->created_at->diffForHumans()}}</small></p>
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
                            <h5><a href="#">{{$students->firstName}}</a></h5>
                            <p class="text-muted"><small>{{$students->created_at}} {{$students->created_at->diffForHumans()}}</small></p>
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
