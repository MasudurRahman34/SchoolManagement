@extends('backend.layouts.master')
	@section('title', 'Fee Management')
    @section('content')
    {{-- //main content --}}
    <div class="app-title">
        <div class="hmmm">
          <h1><i class="fa fa-edit"></i> Manage Section</h1>
          <p></p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item"><a href="#">Manage Section</a></li>
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
                      <th></th>
                      <th>Fee Name</th>
                      <th>type</th>
                      <th>Amount</th>
                      <th>className</th>
                      <th>status</th>
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
              <h3 class="tile-title border-bottom p-2" id="title"> Add Fee</h3>
            <div class="tile-body">

                <div class="form-group">
                    <label for="exampleSelect1">Fee Name</label>
                    <input class="form-control"  type="text" id="name" name="name" placeholder="Enter Fee Name">
                </div>
                <div class="form-group">
                    <label for="exampleSelect1">Amount</label>
                    <input class="form-control"  type="number" id="amount" name="amount" placeholder="Enter Fee Amount" min="10">
                </div>

                <div class="form-group">
                    <label for="exampleSelect1">Select Class</label>
                    <select class="form-control" id="classId" name="classId">
                    @foreach ($class as $class)
                        <option value="{{$class->id}}">{{$class->className}}</option>
                    @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleSelect1">fee status</label>
                    <select class="form-control" id="status" name="status">
                        <option value="1" selected >Enable</option>
                        <option value="0">Disable</option>
                    </select>
                  </div>

                <legend type="hidden">Fee type</legend>
                <div class="form-check">
                    <label class="radio">
                        <input type="radio" id="type" name="type"  value="gov" checked>
                        gov
                    </label>
                    &nbsp;
                    <label class="radio">
                        <input type="radio"  id="type" name="type"  value="nonGov">
                        nonGov
                    </label>
                </div>
            </div>
            <div class="tile-footer">
                  <div class="row">
                    <div class="col-md-12">
                      <button class="btn btn-primary" type="submit" id="submit" style="float: right;"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button></a>
                      {{-- <input class="btn btn-primary" type="reset" style="float: right;"><i class="fa fa-fw fa-lg fa-check-circle"></i>Reset</button></a> --}}
                    </div>
                  </div>
              </div>
            </div>
          </form>
        </div>
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
         ajax:"{{url('/fee/show')}}",
         columns:[
             { data: 'DT_RowIndex', name: 'DT_RowIndex' },
             { data: 'name', name: 'name' },
             { data: 'type', name: 'type' },
             { data: 'amount', name: 'amount' },
             { data: 'classes.className', name: 'classes.className' },
             { data: 'status', name: 'status' },
             { data: 'action', name: 'action' },
         ]
     });


    //update and submit
    $('#submit').click(function (e) {
        e.preventDefault();
        var id=$('#submit').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
        });
        if (id>0) {
           var url="{{url('fee/update')}}"+"/"+id;
       }else{
           var url="{{url('/fee/store')}}"
       }
        jQuery.ajax({
            method: 'post',
            url: url,
            data: {
                name: $('#name').val(),
                amount: $('#amount').val(),
                classId: $('#classId option:selected').val(),
                status: $('#status option:selected').val(),
                type: $('#type:checked').val(),
            },
            success: function(result){
                if (result.success) {
                    $( "div" ).remove( ".text-danger" );
                    console.log(result);
                    successNotification();
                    removeUpdateProperty("fee");
                    document.getElementById("myform").reset();
                }
                if(result.errors){
                    getError(result.errors);
                }
        }
    });
});

    //edit view
    function editfee(id) {

        setUpdateProperty(id, "fee");
        var url="{{url('/fee/edit')}}";
        $.ajax({
            type:'GET',
            url:url+"/"+id,
            success:function(data) {

                $('#classId').val(data.classId);
                $('#name').val(data.name);
                $('#amount').val(data.amount);
                $('#status').val(data.status);
                console.log(data);
                $("input[name='type'][value='"+data.type+"']").prop('checked', true);


        }
        });

    }


    //delete
     function deletefee(id) {
        var url = "{{url('/fee/delete')}}";
        deleteAttribute(url,id);

    }

    </script>

    @endsection
