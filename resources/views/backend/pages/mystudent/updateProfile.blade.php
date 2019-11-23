@extends('backend.layouts.master')
	@section('title', 'Home Page')
    @section('content')
            <div class="row user">
              <div class="col-md-3">
                <div class="profile" style="display: contents;">
                  <div class="info"><img class="user-img" src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/128.jpg">
                    <p>{{$students->firstName}}</p>
                    <h4>{{$students->schoolBranch->nameOfTheInstitution}}</h4>
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
            
              <h2>Student Information</h2>
              <br>
              <!-- Nav tabs -->
              <ul class="nav nav-tabs">
                <li class="nav-item">
                  <a class="nav-link active" href="#home">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#menu1">Parent</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#menu2">Other Information</a>
                </li>
              </ul>
            
              <!-- Tab panes -->
              <div class="tab-content">
                <div id="home" class="container tab-pane active"><br>
                  <h4>Update student Information</h4>
                  <hr>
                  <div class="row">
                      <form class="row" action="{{route('update.profile')}}" method="post">
                      @csrf
                          <div class="form group col-md-3">
                            <label class="control-label">Name</label>
                            <input class="form-control" type="text" placeholder="Enter full name" name="studentname"
                              id="studentname" value="{{$students->firstName}}">
                          </div>
                          <div class="form-group col-md-3">
                            <label class="control-label" name="gender">Gender</label>
                            <div class="form-check">
                              <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="gender" value="male">Male
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input class="form-check-input" type="radio" name="gender" value="Female">FeMale
                              </label>
                            </div>
                          </div>
                          
                          <div class="form-group col-md-3">
                            <label class=" control-label">Date of Birth*</label>
                            <div class="">
                              <input class="form-control"type="date" id="birthDate" value="{{$students->birthDate}}">
                            </div>
                          </div>
                          <div class="form group col-md-3">
                            <label class="control-label">Religion</label>
                            <input class="form-control" type="text" name="religion" id="religion" value="{{$students->religion}}">
                          </div>
                          
                          <div class="form group col-md-3">
                            <label class="control-label">Email</label>
                            <input class="form-control" type="email" placeholder="Enter Email Address" id="email" name="email" value="{{$students->email}}">
                          </div>
                          <div class="form group col-md-3">
                            <label class="control-label">Address</label>
                            <input class="form-control" type="text" placeholder="Enter full Address" id="address" name="address" value="{{$students->address}}">
                          </div>
                          <div class="form group col-md-3">
                            <label class="control-label">Mobile No</label>
                            <input class="form-control" type="text" placeholder="Enter Your mobile Number" name="mobileno"
                              id="mobileno" value="{{$students->mobile}}">
                          </div>
                          <!-- single section-->
                          <div class="form-group col-md-3">
                            <label for="exampleFormControlSelect1">Blood Group</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="blood" id="bloodgroup">               
                                <option value="0+" {{ $students->blood=='O+'?'selected':'' }}>O+</option>
                                <option value="0-" {{ $students->blood=='0-'?'selected':'' }}>O-</option>
                                <option value="A-" {{ $students->blood=='A-'?'selected':'' }}>A-</option>
                                <option value="A+" {{ $students->blood=='A+'?'selected':'' }}>A+</option>
                                <option value="B+" {{ $students->blood=='B+'?'selected':'' }}>B+</option>
                                <option value="B-" {{ $students->blood=='B-'?'selected':'' }}>B-</option>
                                <option value="AB-" {{ $students->blood=='AB-'?'selected':'' }}>AB-</option>
                                <option value="AB+" {{ $students->blood=='AB+'?'selected':'' }}>AB+</option>
                            </select>
                          </div>
                          <!--End primary dev section-->
                            
                            <div class="form-group col-md-3">
                                <lable class="">Change Image</lable>
                                <input type="file" name="image" id="image" class="form-control btn btn-light">
                            </div>
                            
                      </div>
                      <div class="tile-footer">
                        <a class="btn btn-secondary"><i
                            class="fa fa-fw  fa-check-circle"></i> Update </a>
                    </div>
                  </form>
                </div>
                <div id="menu1" class="container tab-pane fade"><br>
                  <h3> Parent Information</h3><hr>
                  <div class="row">
                      <form class="row">
                          <div class="form group col-md-3">
                            <label class="control-label">Father Name</label>
                            <input class="form-control" type="text" placeholder="Enter Father full name" name="fathername"
                              id="fathername">
                          </div>
                          <div class="form group col-md-3">
                            <label class="control-label">Mother Name</label>
                            <input class="form-control" type="text" placeholder="Enter Mother full name" name="mothername"
                              id="mothername">
                          </div>
                          
                          <div class="form group col-md-3">
                            <label class="control-label">Religion</label>
                            <input class="form-control" type="text" placeholder="Enter Religion name" name="religion" id="religion">
                          </div>
                          <div class="form group col-md-3">
                            <label class="control-label">Father Occupation</label>
                            <input class="form-control" type="text" placeholder="Enter Father Occupation" id="fatheroccuption"
                              name="fatheroccuption">
                          </div>
                          <div class="form group col-md-3">
                              <label class="control-label">Mother Occupation</label>
                              <input class="form-control" type="text" placeholder="Enter Father Occupation" id="fatheroccuption"
                                name="fatheroccuption">
                            </div>
                          <div class="form group col-md-3">
                            <label class="control-label">Email</label>
                            <input class="form-control" type="email" placeholder="Enter Email Address" id="email" name="email">
                          </div>
                          <div class="form group col-md-3">
                            <label class="control-label">Address</label>
                            <input class="form-control" type="text" placeholder="Enter full Address" id="address" name="address">
                          </div>
                          <div class="form group col-md-3">
                            <label class="control-label">Mobile No</label>
                            <input class="form-control" type="text" placeholder="Enter Your mobile Number" name="mobileno"
                              id="mobileno">
                          </div>
                          <!-- single section-->
                          <div class="form-group col-md-3">
                            <label for="exampleFormControlSelect1">Father Blood Group</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="bloodgroup" id="bloodgroup">
                              <option>O+</option>
                              <option>O-</option>
                              <option>A-</option>
                              <option>A+</option>
                              <option>B+</option>
                              <option>B-</option>
                              <option>AB-</option>
                              <option>AB+</option>
                            </select>
                          </div>
                          <div class="form-group col-md-3">
                              <label for="exampleFormControlSelect1">Mother Blood Group</label>
                              <select class="form-control" id="exampleFormControlSelect1" name="bloodgroup" id="bloodgroup">
                                <option>O+</option>
                                <option>O-</option>
                                <option>A-</option>
                                <option>A+</option>
                                <option>B+</option>
                                <option>B-</option>
                                <option>AB-</option>
                                <option>AB+</option>
                              </select>
                            </div>
                          <!--End primary dev section-->
                            
                            <div class="form-group col-md-3">
                                <lable class="">upload Parent Image</lable>
                                <input type="file" name="image" id="image" class="form-control btn btn-light">
                            </div>
                            <div class="form-group col-md-3">
                                <lable class="">upload Parent NID</lable>
                                <input type="file" name="image" id="image" class="form-control btn btn-light">
                            </div>
                            
                      </div>
                        <div class="tile-footer">
                          <a class="btn btn-secondary" href="#"><i
                                class="fa fa-fw fa-times-circle"></i>Cancel</a><a href="studentProfile.html"
                                 class="btn btn-primary float-right" type="button" id="demoSwal" name=""><i
                              class="fa fa-fw fa-check-circle"></i> Update </a>
                        </div>
                    </form>
              </div>
            <div id="menu2" class="container tab-pane fade"><br>

                  <div class="row">
                      <form class="row">
                          <div class="form group col-md-3">
                              <label class="control-label">Number of brother&Sister</label>
                              <input class="form-control" type="int" min="0" placeholder="Number of sibling" name="studentname"
                                id="studentname">
                            </div>
                          <div class="form group col-md-3">
                            <label class="control-label">Previous School</label>
                            <input class="form-control" type="text" placeholder="Previous Scholl name" name="studentname"
                              id="studentname">
                          </div>
                          
                          <div class="form group col-md-3">
                            <label class="control-label">Hobby</label>
                            <input class="form-control" type="text" placeholder="your Hobby" name="fathername"
                              id="fathername">
                          </div>
                          <div class="form group col-md-3">
                            <label class="control-label">Extra cariculam Activity</label>
                            <input class="form-control" type="text" placeholder="Enter Mother full name" name="mothername"
                              id="mothername">
                          </div>
                          <div class="form-group col-md-3">
                            <label class=" control-label">Home District</label>
                            <div class="">
                              <input class="form-control"type="text" id="birthDate" >
                            </div>
                          </div>
                          <div class="form group col-md-3">
                            <label class="control-label">Valiage</label>
                            <input class="form-control" type="text" placeholder="valiage name" name="religion" id="religion">
                          </div>
                          <div class="form group col-md-3">
                            <label class="control-label">Thana</label>
                            <input class="form-control" type="text" placeholder="Thana" id="fatheroccuption"
                              name="fatheroccuption">
                          </div>
                          <div class="form group col-md-3">
                            <label class="control-label">Post Code</label>
                            <input class="form-control" type="text" placeholder="Post Code" id="email" name="email">
                          </div>
                          
                          <div class="form group col-md-3">
                            <label class="control-label">Emergency Contact No</label>
                            <input class="form-control" type="text" placeholder="Emergency Mobile Number" name="mobileno"
                              id="mobileno">
                          </div>
                          <!-- single section-->
                          <!--End primary dev section-->  
                      </div>
                        <div class="tile-footer">
                          <a class="btn btn-secondary" href="#"><i
                                class="fa fa-fw  fa-times-circle"></i>Cancel</a><a href="studentProfile.html"
                                 class="btn btn-primary float-right" type="button" id="demoSwal" name=" "><i
                              class="fa fa-fw fa-check-circle"></i> Update </a>
                        </div>
                    </form>
                    
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
    <!--End Row-->
  </main>

      <div class="clearix"></div>
    @endsection
    @section('script')
      {{-- @include('backend.partials.js.datatable'); --}}
      <script>
        </script>
@endsection
