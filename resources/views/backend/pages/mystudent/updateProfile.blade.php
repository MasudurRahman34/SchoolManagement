@extends('backend.layouts.master')
	@section('title', 'Update Profile')
  @section('content')
            <div class="row user">
              <div class="col-md-3">
                <div class="profile" style="display: contents;">
                  <div class="info"><img class="user-img" src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/128.jpg">
                    <h5>{{$students->firstName}}</h5>
                    <h6>{{$students->studentId}}</h6>
                    <h4>{{$students->schoolBranch->nameOfTheInstitution}}</h4>
                  </div>
                </div>
                <div class="tile p-0">
                  <ul class="nav flex-column nav-tabs user-tabs">
                    <li class="nav-item"><a class="nav-link active" href="#user-timeline" data-toggle="tab">Timeline</a></li>

                    <li class="nav-item"><a class="nav-link" href="studentId2.html"> My school ID card</a></li>
                  </ul>
                </div>
              </div>
    
    <div class="col-md-9">
      <div class="">
        <div class="tile">
          <div class="tile-body">
            
              <h2>Student Information</h2>
              @if(count($errors)>0)
                <div class="alert alert-danger" role="alert">
                  <ul>
                     @foreach($errors->all() as $error)
                      <li>{{ $error }}</li>
                     @endforeach 
                  </ul>
                 </div>
              @endif
              @if(Session::has('success'))
                 <div class="alert alert-success" role="alert">
                    {{ Session::get('success') }}
                 </div>
                @endif
                @if(Session::has('failed'))
                 <div class="alert alert-danger" role="alert">
                     {{ Session::get('failed') }}
                  </div>
                @endif
                 <br>
              <!-- Nav tabs -->
              <ul class="nav nav-tabs">
                <li class="nav-item">
                  <a class="nav-link active" href="#home">Home</a>
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
                      <form class="row" action="{{route('mystudent.update',$students->id)}}" method="post" enctype="multipart/form-data">
                      @csrf
                         <div class="form group col-md-3">
                            <label class="control-label">Id</label>
                            <input class="form-control" type="text" name="studentId"
                              id="studentname" value="{{$students->studentId}}" readonly>
                          </div>
                          <div class="form group col-md-3">
                            <label class="control-label">Name</label>
                            <input class="form-control" type="text" placeholder="Enter full name" name="firstName"
                              id="studentname" value="{{$students->firstName}}">
                          </div>
                          <div class="form group col-md-3">
                            <label class="control-label">Father's Name</label>
                            <input class="form-control" type="text" placeholder="Enter father name" name="fatherName"
                              id="studentname" value="{{$students->fatherName}}">
                          </div>
                          <div class="form group col-md-3">
                            <label class="control-label">Mother Name</label>
                            <input class="form-control" type="text" placeholder="Enter mother name" name="motherName"
                              id="studentname" value="{{$students->motherName}}">
                          </div>
                          <div class="form-group col-md-3">
                            <label class="control-label" name="gender">Gender</label>
                            <div class="form-check">
                              <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="gender" value="male" {{ $students->gender=='male'?'checked':'' }}>Male
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input class="form-check-input" type="radio" name="gender" value="Female" {{ $students->gender=='female'?'checked':'' }}>FeMale
                              </label>
                            </div>
                          </div>
                          
                          <div class="form-group col-md-3">
                            <label class=" control-label">Date of Birth*</label>
                            <div class="">
                              <input class="form-control"type="date" id="birthDate" name="birthDate" value="{{$students->birthDate}}">
                            </div>
                          </div>
                          <div class="form group col-md-3">
                            <label class="control-label">Religion</label>
                            <input class="form-control" type="text" name="religion" id="religion" value="{{$students->religion}}">
                          </div>
                          
                          <div class="form group col-md-3">
                            <label class="control-label">Email</label>
                            <input class="form-control" type="email" placeholder="Enter Email Address" id="email" name="email" value="{{$students->email}}" readonly>
                          </div>
                          <div class="form group col-md-3">
                            <label class="control-label">Address</label>
                            <input class="form-control" type="text" placeholder="Enter full Address" id="address" name="address" value="{{$students->address}}">
                          </div>
                          <div class="form group col-md-3">
                            <label class="control-label">Mobile No</label>
                            <input class="form-control" type="text" placeholder="Enter Your mobile Number" name="mobile"
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
                            <div class="form-group col-md-3">
                                <lable class="">Preview Image</lable>
                                <img id="image_preview" src="" style="width: 180px;height: 180px">
                            </div>   
                      </div>
                      <div class="tile-footer">
                      <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Update Profile</button>
                    </div>
                    <!-- </form> -->
                </div>
            <div id="menu2" class="container tab-pane fade"><br>
                  <div class="row">
                           <div class="form group col-md-3">
                              <label class="control-label">Father occupation</label>
                              <input class="form-control" type="int" min="0" placeholder="Father occupation" name="fatherOccupation"
                                id="studentname" value="{{$students->fatherOccupation}}">
                           </div>
                           <div class="form group col-md-3">
                              <label class="control-label">Mother occupation</label>
                              <input class="form-control" type="int" min="0" placeholder="Mother occupation" name="MotherOccupation"
                                id="studentname" value="{{$students->MotherOccupation}}">
                           </div>
                           <div class="form group col-md-3">
                              <label class="control-label">FAther's income</label>
                              <input class="form-control" type="int" min="0" placeholder="Father's income" name="fatherIncome"
                                id="studentname" value="{{$students->fatherIncome}}">
                           </div>
                           <div class="form group col-md-3">
                              <label class="control-label">Mother's income</label>
                              <input class="form-control" type="int" min="0" placeholder="Mother's income" name="motherIncome"
                                id="studentname" value="{{$students->motherIncome}}">
                           </div>
                          <div class="form group col-md-3">
                            <label class="control-label">Village</label>
                            <input class="form-control" type="text" placeholder="valiage name" name="village" id="village" value="{{$students->address}}">
                          </div>
                          <div class="form group col-md-3">
                            <label class="control-label">Emergency Contact No</label>
                            <input class="form-control" type="text" placeholder="Emergency Mobile Number" name="mobileno"
                              id="mobileno" value="{{$students->mobile}}">
                          </div>
                          <!-- single section-->
                          <!--End primary dev section-->  
                      </div>
                        <div class="tile-footer">
                          <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Update Information</button>
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
        $(document).ready(function(){
        $(".nav-tabs a").click(function(){
          $(this).tab('show');
        });
      });
       
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#image_preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#image").change(function() {
            readURL(this);
        });
    </script>
@endsection
