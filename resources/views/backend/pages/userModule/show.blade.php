@extends('backend.layouts.master')
	@section('title', 'Show user profile')
    @section('content')
    <div class="row user">
        <div class="col-md-3">
            <div class="card text-white bg-dark text-center" style="">
                <div class="card-content">
                    <div class="card-body">
                        @foreach($users->file as $fill)
                            @if($fill->type=="profile")
                                <img class="rounded mx-auto d-block" src="{{asset('users/'.$fill->image)}}" style="width: 50%; height: 50%;">
                            @endif
                        @endforeach
                        <hr>
                        <h5 class="text-info">{{$users->name}}</h5>
                        <h7 class="text-info">Designation : {{$users->designation}}</h7>
                    </div>
                </div>
            </div>
                <div class="tile p-0">
                  <ul class="nav flex-column nav-tabs user-tabs">
                  @if(Auth::guard('web')->user()->id=$editId)
                    <li class="nav-item"><a class="nav-link" href="{{route('userEditProfile', [$editId])}}"> Update Profile</a></li>
                  @endif
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
