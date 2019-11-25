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
                
              </div>
              <div class="col-md-9">
      <div class="">
        <div class="tile">
          <div class="tile-body">
            
              <h2>User Information</h2>
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
              </ul>
            
              <!-- Tab panes -->
              <div class="tab-content">
                <div id="home" class="container tab-pane active"><br>
                  <h4>Update User Information</h4>
                  <hr>
                  <div class="row">
                      <form class="row" action="#" method="post" enctype="multipart/form-data">
                      
                          <div class="form group col-md-3">
                            <label class="control-label">Name</label>
                            <input class="form-control" type="text" placeholder="Enter full name" name="name"
                              id="studentname" value="{{$users->name}}">
                          </div>
                          <div class="form group col-md-3">
                            <label class="control-label">Email</label>
                            <input class="form-control" type="text" placeholder="Enter father name" name="email"
                              id="studentname" value="{{$users->email}}">
                          </div>
                          <div class="form group col-md-3">
                            <label class="control-label">Mobile Number</label>
                            <input class="form-control" type="text" placeholder="Enter mother name" name="mobile"
                              id="studentname" value="{{$users->mobile}}">
                          </div>
                          <div class="form group col-md-3">
                            <label class="control-label">designation</label>
                            <input class="form-control" type="text" placeholder="Enter mother name" name="designation"
                              id="studentname" value="{{$users->designation}}">
                          </div>
                          
                          <div class="form-group col-md-3">
                            <label class=" control-label">joinDate*</label>
                            <div class="">
                              <input class="form-control"type="date" id="	joinDate" name="joinDate" value="{{$users->joinDate}}">
                            </div>
                          </div>
                          <div class="form group col-md-3">
                            <label class="control-label">	address</label>
                            <input class="form-control" type="text" name="address" id="address" value="{{$users->address}}">
                          </div>
                          
                          <div class="form group col-md-3">
                            <label class="control-label">BId</label>
                            <input class="form-control" type="email" placeholder="Bid" id="bId" name="bId" value="{{$users->bId}}">
                          </div>
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
                  </form>
                </div>
            <div id="menu2" class="container tab-pane fade"><br>
                  
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
