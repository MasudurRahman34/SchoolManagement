@extends('backend.layouts.master')
	@section('title', 'Notification Management')
    @section('content')
    {{-- //main content --}}
    <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i> Manage Classes</h1>
          <p></p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item"><a href="#">Manage Classes</a></li>
        </ul>
    </div>

    <div class="row">
        {{-- <div class="col-md-7">
            <div class="tile">
                <div class="tile-body">

                </div>
            </div>
        </div> --}}

        <div class="col-md-7">
                <form id="myform" action="javascript:void(0)">
            <div class="tile">
                <h3 class="tile-title border-bottom p-2" id="title">Notification </h3>
                <div class="tile-body">
                    <div class="form-group row">
                        <label class="control-label col-md-3 pl-4">Type</label>
                        <select class="form-control col-md-3 pl-4" id="" name="" required>
                            <option value="">Please Select</option>
                              <option value="sms">SMS</option>
                              <option value="email">EMAIL</option>
                              <option value="systemnotification">System Notification</option>


                        </select>
                    </div>
                        <div class="form-group row">
                            <label for="message_area" class="control-label col-md-3 pl-4">Description</label>
                            <p>
                            <textarea id="message_area" maxlength="160" rows="5" cols="65" required></textarea>
                            </p>
                            <span class="hint" id="textarea_message"></span>
                        </div>

                        {{-- <div class="form-group row">
                            <label for="exampleSelect1" class="control-label col-md-3 pl-4"> Taken Interval</label>
                                <select class="form-control  col-md-3" id="interval" name="interval">
                                    <option value="monthly">Monthly</option>
                                    <option value="yearly">Yearly</option>
                                </select>
                        </div> --}}
                        <div class="form-group row">
                            <label class="control-label col-md-3 pl-4">User Type</label>
                            <select class="form-control col-md-3 pl-4" id="" name="" required>
                                <option value="">Please Select</option>
                                  <option value="allStudent">All student</option>
                                  <option value="classWiseStudent">class wise Student</option>
                                  <option value="sectionWiseStudent">Section wise Student</option>
                                  <option value="allteacher">All teacher</option>
                                  <option value="alluser">All user enrole school</option>


                            </select>
                        </div>

                </div>
                <div class="tile-footer">
                    <div class="row">
                        <div class="col-md-12">
                            <button class="btn btn-primary edit_studClass"  style="float: right;" id="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Send</button>
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
      {{-- @include('backend.partials.js.datatable'); --}}
      <script>


    </script>

    @endsection

