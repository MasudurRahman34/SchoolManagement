@extends('backend.layouts.master')
	@section('title', 'Studenty profile Page')
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

                    <li class="nav-item"><a class="nav-link" href="{{route('mystudent.editProfile', $students->id)}}"> Update Profile</a></li>
                    <li class="nav-item"><a class="nav-link" id="Attendance"> Attendance</a></li>
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
                              <p class="list-group justify-content-between align-items-center"> {{$students->fatherName}} </p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                              Mother Name
                              <p class="list-group justify-content-between align-items-center"> {{$students->motherName}} </p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                              Father occopation
                              <p class="list-group justify-content-between align-items-center"> {{$students->fatherOccupation}}</p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                              Mother occopation
                              <p class="list-group justify-content-between align-items-center"> {{$students->motherOccupation}}</p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                            Religion
                             <p class="list-group justify-content-between align-items-center"> {{$students->religion}}</p>
                            </li>
                          </ul>
                        </div>
                      </div>
                      <!-- BIO AND SKILLS -->
                      <!-- Blog -->
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="tab-content">
                    <div class="tab-pane active" id="user-timeline">
                      <div class="timeline-post" id="modelAttendance" hidden>
                        <div class="post-media">
                          <div class="content" >
                            <div class="form-group col-md-12">


                            <h5><a href="#">{{$students->firstName}}</a></h5>

                               <label>Attendance Information</label><br><hr>
                               <div class="custom-control custom-control-inline">
                                <lable >Total Present This month &nbsp;</lable>
                                <lable  id="present"></lable> &nbsp DAY
                                </div><br>
                                <div class="custom-control month-radio custom-control-inline">
                                <lable >Total Absent This month &nbsp;</lable>
                                <lable id="absent"></lable> &nbsp DAY</div>
                                <div class="custom-control custom-control-inline">
                                    <a class=" nav-link" href="{{route('studentviewindex.index', $students->id)}}"> Details</a>
                                </div>
                          </div>
                          </div>
                        </div>
                        <div class="post-content">
                        </div>
                      </div>
                  </div>
                </div>
              </div>

      <div class="clearix"></div>
    @endsection
    @section('script')

      <script>

        $('#Attendance').click(function (e) {
            e.preventDefault();
            $('#modelAttendance').attr('hidden',false);


      var d = new Date();
      var month=d.getMonth()+1;
      var studentId= {{$students->id}};
      console.log(studentId);
            //document.getElementById("date").innerHTML = month;
           //   $('table').attr('id',month);

    $.ajax({
        type: "get",
        url: "{{route('api.present')}}",
        data: {
            month :month,
            studentId:studentId,
        },
        success: function (data) {
         //var data1 =parseFloat(data.data).toFixed(2);
        $('#present').html(data.data);


           // document.getElementById("attendance").innerHTML= parseFloat(data).toFixed(2);
        }
    });
    $.ajax({
        type: "get",
        url: "{{route('api.absent')}}",
        data: {
            month :month,
            studentId:studentId,
        },
        success: function (data) {
         //var data1 =parseFloat(data.data).toFixed(2);
         $('#absent').html(data.data);

        }
    });

        });
        </script>
@endsection
