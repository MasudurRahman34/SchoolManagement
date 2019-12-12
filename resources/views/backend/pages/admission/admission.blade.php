@extends('backend.layouts.master')
	@section('title', 'Home Page')
    @section('content')
<div class="app-title">
    <div>
      <h1><i class="fa fa-edit"></i>Student Admission Form </h1>
      <p>Admission form</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item"><a href="studentAdmission.html">Student Admisssion</a></li>
    </ul>
  </div>
  <div class="row justify-content-md-center">
    <!--Start inline section-->
    <div class="clearix"></div>
    <div class="col-md-7">
      <div class="tile">
        <h3 class="tile-title border-bottom p-2">Student Admission Form</h3>
        <div class="tile-body">
          <form class="row" method="post" action="{{route('admission.store')}}" enctype='multipart/form-data'>
            @csrf
            <div class="form group col-md-6">
              <label class="control-label">First Name</label>
              <input class="form-control" name="firstName" id="firstName" type="text" required>
            </div>
            <div class="form group col-md-6">
                <label class="control-label">Last Name</label>
                <input class="form-control" name="lastName" id="lastName" type="text" required>
            </div>
            <div class="form group col-md-6">
                    <label class="control-label mt-3">Gender</label><br>
                    <label class="radio-inline"><input type="radio" name="gender" checked>Male</label>
                    <label class="radio-inline"><input type="radio" name="gender">Female</label>
                    <label class="radio-inline"><input type="radio" name="gender">Other</label>
            </div>
            <div class="form group col-md-6">
              <label class="control-label">Mobile No</label>
              <input class="form-control" id="mobile" name="mobile" type="text" required>
            </div>
            <div class="form-group col-md-6">
                <label class=" control-label">Date of Birth*</label>
                <div class="">
                  <input class="form-control" type="date" name="birthDate" id="birthDate" required>
                </div>
              </div>
              <div class="form-group col-md-6">
                <label for="exampleFormControlSelect1">Student BLood Group</label>
                <select class="form-control" id="blood" name="blood">
                <option value="">--Please Select--</option>
                  <option value="0+">O+</option>
                  <option value="0-">O-</option>
                  <option value="A-">A-</option>
                  <option value="A+">A+</option>
                  <option value="B+">B+</option>
                  <option value="B-">B-</option>
                  <option value="AB-">AB-</option>
                  <option value="AB+">AB+</option>
                </select>
              </div>

            <div class="form-group col-md-6">
                <label for="exampleFormControlSelect1">Session Year</label>
                <select class="form-control admission" id="sessionYear" name="sessionYear" required>
                  <option value="">--Please Select--</option>
                    @foreach ($SessionYear as $SYear)
                <option value="{{$SYear->id}}" {{$SYear->status==1 ? 'selected' : ''}}>{{$SYear->sessionYear}}</option>
                    @endforeach
                </select>
              </div>
              <div class="form-group col-md-6">
                    <label class="control-label mt-3">Shift</label><br>
                <div class="custom-control shift-radio custom-control-inline">
                    <input type="radio" name="shift" id="shift1" value="Morning" class="custom-control-input admission" checked>
                    <label class="custom-control-label"  for="shift1">Morning</label>
                 </div>
                <div class="custom-control shift-radio custom-control-inline">
                    <input type="radio" name="shift" id="shift2" value="Day" class="custom-control-input admission">
                    <label class="custom-control-label" for="shift2">Day</label>
                </div>
                <div class="custom-control shift-radio custom-control-inline">
                    <input type="radio" name="shift" id="shift3" value="Evening" class="custom-control-input admission">
                    <label class="custom-control-label" for="shift3">Evening</label>
                </div>
              </div>
              <div class="form-group col-md-6">
                <label for="exampleFormControlSelect1">Select Class</label>
                <select class="form-control admission opsub" id="classId" required>
                        <option value="">--Please Select--</option>
                    @foreach ($classes as $class)
                        <option value="{{$class->id}}">{{$class->className}}</option>

                    @endforeach
                </select>
              </div>
              <div class="form-group col-md-6">
                <label for="exampleFormControlSelect1"> Section</label>

                <select class="form-control" id="sectionId" name="sectionId" required>
                    <option value="">--Please Select--</option>
                </select>
              </div>
              <div class="form group col-md-6">
                <label class="control-label">Roll Number <sub id="lastRoll" class="text-danger"></sub></label>
                <input class="form-control" id="roll" name="roll" type="number" required>
              </div>
              <div class="form-group col-md-12">
                    <label class="control-label mt-3 bg-secondary text-light"><h5>Group</h5></label><br>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="group" id="group1" value="General" class="custom-control-input opsub" required checked>
                        <label class="custom-control-label" for="group1">General (1 to 8)</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="group" id="group2" value="Science"  class="custom-control-input opsub" required>
                        <label class="custom-control-label" for="group2">Science</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="group" id="group3" value="Arts"  class="custom-control-input opsub" required>
                        <label class="custom-control-label" for="group3">Arts</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" name="group" id="group4" value="Commerce"  class="custom-control-input opsub" required>
                            <label class="custom-control-label" for="group4">Commerce</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" name="group" id="group5" value="Vocational" class="custom-control-input opsub" required>
                            <label class="custom-control-label" for="group5">Vocational</label>
                    </div>
                </div>


                  <div class="form-group col-md-6 opmainsubject" hidden>
                    <label for="exampleFormControlSelect1"> 4th subject</label>

                    <select class="form-control opubs" id="optionalSubjectId" name="optionalSubjectId[0]">
                        <option value="">--Select One--</option>
                    </select>
                  </div>
                  <div class="form-group col-md-6 opmainsubject" hidden>
                    <label for="exampleFormControlSelect1">Main Subject</label>

                    <select class="form-control opubs" id="optionalSubjectId" name="optionalSubjectId[1]">
                        <option value="">--Select One--</option>
                    </select>
                  </div>



              <div class="form-group col-md-4">
                <label class="control-label mt-3"><h5>Student Status</h5></label><br>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="type" id="type" value="regular" class="custom-control-input" checked>
                    <label class="custom-control-label" for="type">Regular</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="type" id="typeir" value="Irregular" class="custom-control-input">
                    <label class="custom-control-label" for="typeir">Irregular</label>
                </div>
            </div>
            <div class="form-group col-md-4">
                <label class="control-label mt-3"><h5>Schoolarship</h5></label><br>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="schoolarshipStatus" id="schoolarshipStatus" value="0" class="custom-control-input" checked>
                    <label class="custom-control-label" for="schoolarshipStatus">No</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="schoolarshipStatus" id="schoolarshipStatus1" value="1" class="custom-control-input">
                    <label class="custom-control-label" for="schoolarshipStatus1">Yes</label>
                </div>
            </div>
            <div class="form-group col-md-4">
                <label class="control-label mt-3"><h5>Payment Clearance</h5></label><br>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="checkbox" name="payment" id="Payment" value="0" class="custom-control-input" checked>
                    <label class="custom-control-label" for="Payment">Yes</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="payment" id="Payment2" value="1" class="custom-control-input">
                    <label class="custom-control-label" for="Payment2">No</label>
                </div>
            </div>


            <!-- {{-- <div class="form-group col-md-6">
              <label for="exampleFormControlSelect1"> Fourth Subject</label>
              <select class="form-control admission" id="fourthSubject">
                <option>Highter Math</option>
                <option>ICT</option>
                <option>Agriculture</option>
                <option>Economics</option>
              </select>
            </div> --}} -->
            {{-- <div class="form-group col-md-12">
                    <label for=""> Picture</label>
                   <input type="file" name="" id="" class="form-control admission">
            </div> --}}
            <!-- {{-- <div class="form-group col-md-6">
              <div class="form-check">
                <label class="form-check-label check-inline">
                  <input class="form-check-input admission" type="checkbox" name="scholarship" value="yes">Schoolarship
                </label>
              </div>
            </div> --}} -->
          {{-- <div class="form-check">
            <label class="form-check-label check-inline">
              <input class="form-check-input admission" type="checkbox">I accept the terms and conditions
            </label>
          </div> --}}
        </div>
        <div class="tile-footer">
          <a class="btn btn-secondary" href="#"><i
              class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>&nbsp;&nbsp;&nbsp;<button href="listOfStudent.html"
            class="btn btn-primary float-right" type="submit"><i
              class="fa fa-fw fa-lg fa-check-circle"></i>Register</button>
        </div>
        </form>
      </div>
    </div>
  </div>
@endsection
@section('script')
<script>

dynamicSectionSelection();
checkClassTenOrNine();
$("#sectionId").change(function () {
var sectionId=$(this).val();
    lastRollFind(sectionId);
});
//last role Find
function lastRollFind(sectionId){
    $.ajax({
        type: "get",
        url: "{{url('api/lastRoll')}}"+"/"+sectionId,
        success: function (response) {
            $("#lastRoll").html('Last Roll '+ response);
        }
    });
}

function checkClassTenOrNine(){
    $('.opsub').change(function (e) {

        e.preventDefault();
        var classId=$("#classId").val();
        var group = $("input[name='group']:checked").val();
        $.ajax({
            type: "get",
            url: "api/checkClassHasOptionalSubject"+"/"+classId+"/"+group,
            success: function (response) {
                    console.log(response.is_notEmpty);
                    if(response.is_notEmpty==0){
                        var option="";
                        $('.opmainsubject').attr('hidden', true);
                        $('.opubs').html(option);
                    }else{
                        $('.opmainsubject').attr('hidden', false);
                        var option="<option>--Please Select--</option>";
                        response.optionalsubject.forEach(element => {
                        option+=("<option value='"+element.id+"'>"+element.subjectName+"</option>");
                    });
                    $('.opubs').html(option);
                    }
            }
        });

    });
}
//optional subject

//end optional subject

//end last roll find

//     var sessionId=$('#sessionYear option:selected').val();
//     var shift=[];
//     $(".admission").change(function(e){
// e.preventDefault();
//         $("#classId").change(function (e) {
// e.preventDefault();
// console.log('working');

// });


//     });

    // $(".admission").change(function () {
    //     // element == this
    //     var bloodGroup=$('#blood').val();
    //     var sessionYearId=$('#sessionYear').val();
    //     var address=$('#address').val();
    //     var shift=$('input[name="shift"]:checked').val();
    //     var classId=$('#classId').val();

    //     var sectionId=$('#sectionId').val();
    //     var group=$('input[name="group"]:checked').val();
    //     var fourthSubject=$('#fourthSubject').val();
    //     console.log(bloodGroup, sessionYearId, address, shift, classId, sectionId,group);

    // });




</script>

@endsection
