@extends('backend.layouts.master')
@section('title', 'Update Attendence Page')
@section('content')
    {{-- //main content --}}
    <div class="app-title">
        <div>
            <h1><i class="fa fa-plus-square" aria-hidden="true">&nbsp;</i>Student Attendence</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Tables</li>
            <li class="breadcrumb-item active"><a href="#">Student Attendence</a></li>
        </ul>
    </div>
    @include('backend.partials._message')
    <div class="row">
        <div class="col-md-8">
            <div class="tile">
                <div class="tile-body">
                    
                        
                        <form action="{{ route('update.attendence') }}" method="post">
                                @csrf
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                            <tr>
                                <th>Attendence</th>
                                <th>Student Roll</th>
                                <th>Student Name</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($attendences as $attendence)
                            <tr>
                                
                                <td>
                                    <div class="control">
                                        <label class="radio">
                                            <input type="radio" name="attend[{{$attendence->id}}]"  value="present"<?php if($attendence->attendence =='present'){echo "checked";} ?>>
                                            Present
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="attend[{{$attendence->id}}]" value="absent" <?php if($attendence->attendence =='absent'){echo "checked";} ?>>
                                            Absent
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="attend[{{$attendence->id}}]" value="late" <?php if($attendence->attendence =='late'){echo "checked";} ?>>
                                            Late
                                        </label>
                                    </div>
                                </td>
                                <td>
                                {{$attendence->student->roll}}
                                </td>
                                <td>
                                {{$attendence->student->firstName}}
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <button class="btn btn-primary btn-lg" type="submit"><i class="fa fa-plus-square" aria-hidden="true"></i> Update attendence</button>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </div>
    <div class="clearix"></div>
@endsection
@section('script')
    @include('backend.partials.js.datatable');
    <script>
    // //edit
    // function edit(id) {
    //      var editId=id;
    //      console.log(editId);
    //      $("#submit").val(id);
    //      var url="{{url('edit/attendence/')}}";
    //      $.ajax({
    //          type:'GET',
    //          url:url+"/"+id,
    //          success:function(data) {
    //              $('#class').val(data.class);
    //              $('#sectionName').val(data.sectionName);
    //              console.log(data.shift);
    //              $("input[name='shift'][value='"+data.shift+"']").prop('checked', true);
    //              //$('#shift').val('"+data.shift+"').prop('checked', true);

    //       }
    //      });
    //  }
       //update
    //    $('#submit').click(function (e) {
    //         e.preventDefault();
    //         var id=$('#submit').val();
    //         $.ajaxSetup({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    //             },
    //         });
    //         var data={
    //             roll:$('#roll').val(),
    //             attendence:$('#attendence').val(),
    //         };
    //         if (id>0) {
    //             var url="{{url('uupdate/attendence')}}"+"/"+id;
    //         }else{
    //             var url="{{url('/store/attendence')}}"
    //         }
    //         $.ajax({
    //             method:"POST",
    //             url: url,
    //             data: data,
    //             success:function (result) {
    //             console.log(result);
                
    //             }
    //             });
            
    //     });
    </script>

@endsection
