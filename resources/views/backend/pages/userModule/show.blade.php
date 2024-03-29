@extends('backend.layouts.master')
	@section('title', 'Show user profile')
    @section('content')
    <div class="row user">
              <div class="col-md-3">
                <div class="profile" style="display: contents;">
                  <div class="info"><img class="user-img" src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/128.jpg">
                    <h5>{{$users->name}}</h5>
                    <h4>{{$users->designation}}</h4>
                  </div>
                </div>
                <div class="tile p-0">
                  <ul class="nav flex-column nav-tabs user-tabs">
                    <li class="nav-item"><a class="nav-link" href="{{route('userEditProfile')}}"> Update Profile</a></li>
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
                              <p class="list-group justify-content-between align-items-center"> {{$users->name}} </p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                              Email
                              <p class="list-group justify-content-between align-items-center"> {{$users->email}}  </p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                              Mobile
                              <p class="list-group justify-content-between align-items-center"> {{$users->mobile}} </p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                             Join Date
                              <p class="list-group justify-content-between align-items-center"> {{$users->joinDate}} </p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                              Address
                              <p class="list-group justify-content-between align-items-center"> {{$users->address}} </p>
                            </li>
                          </ul>
                        </div>
                        
                        <div class="col">
                          <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                            Designation
                              <p class="list-group justify-content-between align-items-center"> {{$users->designation}} </p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                              Skill
                              <p class="list-group justify-content-between align-items-center"> {{$users->skill}} </p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                              Education
                              <p class="list-group justify-content-between align-items-center"> {{$users->educattion}} </p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                              Biography
                              <p class="list-group justify-content-between align-items-center"> {{$users->biography}} </p>
                            </li>
                          </ul>
                        </div>
                      </div>
                      <!-- BIO AND SKILLS -->
                      <!-- Blog -->
                    </div>
                  </div>
                 <br>
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
      //   $(document).ready(function(){
      //   $(".nav-tabs a").click(function(){
      //     $(this).tab('show');
      //   });
      // });
       
      //   function readURL(input) {
      //       if (input.files && input.files[0]) {
      //           var reader = new FileReader();
      //           reader.onload = function(e) {
      //               $('#image_preview').attr('src', e.target.result);
      //           }
      //           reader.readAsDataURL(input.files[0]);
      //       }
      //   }
      //   $("#image").change(function() {
      //       readURL(this);
      //   });
    </script>
  @endsection
