@extends('backend.layouts.master')
	@section('title', 'Session Year')
    @section('content')
    {{-- //main content --}}
    <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i>Manage Session Year</h1>
          <p></p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item"><a href="#">Manage Session Year</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-7">
            <div class="tile">
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Session Year</th>
                                <th>Created Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-5">
        <form id="myform" action="javascript:void(0)">
        @csrf
            <div class="tile">
                <h3 class="tile-title border-bottom p-2" id="title">Add Session Year</h3>
                <div class="tile-body">
                        <div class="form-group row">
                            <label class="control-label col-md-3 pl-4"> Session Year</label>
                            <div class="col-md-9">
                                <input class="form-control col-md-10" type="text" id="sessionYear" value="" name="sessionYear">
                            </div>
                        </div>
                </div>
                <div class="tile-footer">
                    <div class="row">
                        <div class="col-md-12">
                            <button class="btn btn-primary edit_studClass" type="submit" style="float: right;" id="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
                            {{-- <input class="btn btn-primary edit_studClass" type="reset" style="float: right;" id="reset"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button> --}}
                        </div>
                    </div>
                </div>
            </div>
        </form>
        </div>


    </div>

      <div class="clearix"></div>
    @endsection
    @section('script')
      @include('backend.partials.js.datatable');
      <script>
            var table= $('#sampleTable').DataTable({
                dom: 'lBfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ],
                processing:true,
                serverSide:true,
                ajax:"{{url('sessionyear/show')}}",
                columns:[
                    { data: 'hash', name: 'hash' },
                    { data: 'sessionYear', name: 'sessionYear' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'action', name: 'action' }
                ]
            });


        // $(document).ready( function () {
            $('#submit').click(function(e) {
                e.preventDefault();
                var id=$('#submit').val();
                $.ajaxSetup({
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                   },
               });
               if (id>0) {
                   var url="{{url('sessionyear/update')}}"+"/"+id;
               }else{
                   var url="{{url('/sessionyear/store')}}"
               }
                $.ajax({
                    type: "post",
                    url: url,
                    data: {
                    sessionYear: $('#sessionYear').val(),
                    },
                    success: function (result) {
                        if (result.success) {
                            $( "div" ).remove( ".text-danger" );
                            console.log(result);
                            successNotification();
                            removeUpdateProperty("SessionYear");
                            document.getElementById("myform").reset();
                        }
                        if(result.errors){
                            getError(result.errors);
                        }
                    }
                });
            });
            //edit view
            function editSession(id){
                var editId=id;
                $("#submit").html('<i class="fa fa-save"></i> Update Session');
                $("#session_data").html('<i class="fa fa-save"></i> Update Session Year');
                $("#submit").val(id);
                var url="{{url('/sessionyear/edit')}}";
                $.ajax({
                    type:'GET',
                    url:url+"/"+id,
                    success:function(data) {

                        $('#sessionYear').val(data.sessionYear);
                        console.log(data);

                        }
                    });
            }

            //delete
            function deleteSession(id) {
                var url = "{{url('/sessionyear/delete')}}";


         swal({
             title: "Are you sure?",
             text: "You will not be able to recover this imaginary file!",
             type: "warning",
             showCancelButton: true,
             confirmButtonText: "Yes, delete it!",
             cancelButtonText: "No, cancel plx!",
             closeOnConfirm: false,
             closeOnCancel: true,
         }, function(isConfirm) {
             if (isConfirm) {
            //    var url = "{{url('/section/delete')}}";
               $.ajax({
                   url:url+"/"+id,
                   type:"GET",
                   dataType:"json",
                   success:function(data) {
                       if(data.error){
                        swal("Sorry",data.error , "error");
                       console.log(data.error);
                       }if(data.success){
                        table.draw();
                        swal(data.success);
                       }
                   }
               })

             } else {
                 swal("Cancelled", "Your imaginary file is safe :)", "error");
             }
         });
        }


    </script>

    @endsection
