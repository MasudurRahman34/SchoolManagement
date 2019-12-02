@extends('backend.layouts.master')
	@section('title', 'User profile')
    @section('content')
    <div class="row user">
              <div class="col-md-3">
                <div class="profile" style="display: contents;">
                  <div class="info"><img class="user-img" src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/128.jpg">
                    <h5>{{$user->name}}</h5>
                    <h4>{{$user->designation}}</h4>
                  </div>
                </div>
                <div class="tile p-0">
                  <ul class="nav flex-column nav-tabs user-tabs">
                    <li class="nav-item"><a class="nav-link" href="{{route('user.show')}}"> Show Profile</a></li>
                    <li class="nav-item"><a class="nav-link" href="studentId2.html"> My school ID card</a></li>
                  </ul>
                </div>
              </div>
              
    
    <div class="col-md-9">
      <div class="">
        <div class="tile">
          <div class="tile-body">
            
              <h2>User Update Information</h2>
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
                  <a class="nav-link" href="#menu2">Change Password</a>
                </li>
              </ul>
            
              <!-- Tab panes -->
              <div class="tab-content">
                <div id="home" class="container tab-pane active"><br>
                  <h4>Update User Information</h4>
                  <hr>
                  <div class="row">
                      <form class="row" action="{{route('userUpdate.profile')}}" method="post" enctype="multipart/form-data">
                      @csrf
                         <div class="form group col-md-3">
                            <label class="control-label">Name</label>
                            <input class="form-control" type="text" name="name" value="{{$user->name}}">
                          </div>
                          <div class="form group col-md-3">
                            <label class="control-label">Email</label>
                            <input class="form-control" type="text" name="email" value="{{$user->email}}">
                          </div>
                          <div class="form group col-md-3">
                            <label class="control-label">Mobile</label>
                            <input class="form-control" type="text" name="mobile"
                              id="studentname" value="{{$user->mobile}}">
                          </div>
                          <div class="form group col-md-3">
                            <label class="control-label">Designation</label>
                            <input class="form-control" type="text" name="designation" value="{{$user->designation}}">
                          </div> 
                          <div class="form-group col-md-3">
                            <label class=" control-label">JoinDate</label>
                            <div class="">
                              <input class="form-control" type="date" name="joinDate" value="{{$user->joinDate}}">
                            </div>
                          </div>
                          <div class="form group col-md-3">
                            <label class="control-label">Address</label>
                            <input class="form-control" type="text" name="address" value="{{$user->address}}">
                          </div>
                          
                          <div class="form group col-md-3">
                            <label class="control-label">Skill</label>
                            <input class="form-control" type="text" name="skill" value="{{$user->skill}}">
                          </div>
                          <div class="form group col-md-3">
                            <label class="control-label">Educattion</label>
                            <input class="form-control" type="text" name="educattion" value="{{$user->educattion}}">
                          </div>
                          <div class="form group col-md-3">
                            <label class="control-label">Biography</label>
                            <input class="form-control" type="text" name="biography" value="{{$user->biography}}">
                          </div>
                          <!-- <div class="form group col-md-3">
                            <label class="control-label">Resume</label>
                            <input class="form-control" type="file" name="resume" value="{{$user->resume}}">
                          </div>
                          <div class="form group col-md-3">
                            <label class="control-label">Certificate</label>
                            <input class="form-control" type="file" name="certificate" value="{{$user->certificate}}">
                          </div> -->
                          <div class="form group col-md-3">
                            <label class="control-label">bId</label>
                            <input class="form-control" type="text" name="bId" value="{{$user->bId}}">
                          </div>
                          <!--End primary dev section-->
                            
                            <!-- <div class="form-group col-md-3">
                                <lable class="">Change Image</lable>
                                <input type="file" name="image" id="image" class="form-control btn btn-light">
                            </div>
                            <div class="form-group col-md-3">
                                <lable class="">Preview Image</lable>
                                <img id="image_preview" src="" style="width: 180px;height: 180px">
                            </div>    -->
                      </div>
                      <div class="tile-footer">
                      <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Update Profile</button>
                    </div>
                </div>
                 </form>
                 <!-- change Password -->
             <div id="menu2" class="container tab-pane fade"><br>
             <form action="{{route('userChange.password')}}" method="post">
               @csrf
                <div class="row">
                    <div class="form group col-md-3">
                      <label class="control-label">New Password</label>
                      <input type="password" class="form-control" name="password">
                    </div>
                    <div class="form group col-md-3">
                      <label class="control-label">Confirm Password</label>
                      <input type="password" class="form-control" name="password_confirmation">
                    </div>
                    </div>
                        <div class="tile-footer">
                          <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Update Password</button>
                        </div>
                      </div>
                </div>
                </form>
             </div>  
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
      </script>
@endsection
