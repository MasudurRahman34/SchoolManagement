@extends('backend.layouts.master')
	@section('title', 'Notification Management')
    @section('content')
    {{-- //main content --}}
    <div class="app-title">
        <div>
          <h1><i class="fa fa-bullhorn"></i> Notifications </h1>
          <p></p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item"><a href="#">Manage Classes</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title border-bottom p-2" id="title"><i class="fa fa-bell" aria-hidden="true"></i>Compose The New Notification </h3>
                <div class="box box-primary">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">           
                            <div class="col-md-12">
                                <!-- Custom Tabs (Pulled to the right) -->
                                <div class="nav-tabs-custom">
                                    <ul class="nav nav-tabs pull-right">
                                        <li class=""><a href="#tab_class" data-toggle="tab" aria-expanded="false">Class</a></li>&nbsp;<br>
                                        <li class=""><a href="#tab_perticular" data-toggle="tab" aria-expanded="false">Individual</a></li>&nbsp;
                                        <li class="active"><a href="#tab_group" data-toggle="tab" aria-expanded="true">Group</a></li>
                                    </ul> <br><br>

                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab_group">
                                            <form action="#" method="post" id="group_form">
                                                <!-- /.box-header -->
                                                <div class="box-body">
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <label>Title</label><small class="req"> *</small>
                                                                <input autofocus="" class="form-control" name="group_title" autocomplete="off">
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="pr20">Send Through<small class="req"> *</small></label>
                                                                <label class="checkbox-inline">
                                                                    <input type="checkbox" value="mail" name="group_send_by[]"> Email                                                
                                                                </label>
                                                                <label class="checkbox-inline">
                                                                    <input type="checkbox" value="sms" name="group_send_by[]">SMS                                                
                                                                </label>
                                                                <label class="checkbox-inline">
                                                                    <input type="checkbox" value="push" name="group_send_by[]">System                                               
                                                                </label>
                                                                <span class="text-danger"></span>
                                                            </div>
                                                            <div class="form-group"><label>Message</label><small style="color:red"> *</small>
                                                                {{-- CKEDITOR --}}
                                                                <div>
                                                                <textarea name="answer" id="answer" rows="14" cols="150"
                                                                    data-parsley-minlength="6"
                                                                    data-parsley-minlength-message="Come on! You need to enter at least a 6 character comment..">
                                                                    </textarea>
                                                                </div>
                                                            </div>
                                                            </div>
                                                            {{-- Group er Box --}}
                                                            <div class="col-md-4">
                                                            <div class="bs-component">
                                                                <div class="jumbotron">
                                                                    <div class="well minheight400">
                                                                        <div class="custom-control custom-radio custom-control-inline">
                                                                            <label><input type="checkbox" name="visible[]" value="student"> <b>Student</b> </label>
                                                                        </div>
                                                                        <div class="custom-control custom-radio custom-control-inline">
                                                                            <label><input type="checkbox" name="user[]" value="parent"> <b>Guardians</b></label>
                                                                        </div>
                                                                        <div class="custom-control custom-radio custom-control-inline">
                                                                            <label><input type="checkbox" name="user[]" value="1"> <b>Admin</b></label>
                                                                        </div>
                                                                        <div class="custom-control custom-radio custom-control-inline">
                                                                            <label><input type="checkbox" name="user[]" value="2"> <b>Teacher</b></label>
                                                                        </div>
                                                                        <div class="custom-control custom-radio custom-control-inline">
                                                                            <label><input type="checkbox" name="user[]" value="3"> <b>Accountant</b></label>
                                                                        </div>
                                                                        <div class="custom-control custom-radio custom-control-inline">
                                                                            <label><input type="checkbox" name="user[]" value="4"> <b>Librarian</b></label>
                                                                        </div>
                                                                        <div class="custom-control custom-radio custom-control-inline">
                                                                            <label><input type="checkbox" name="user[]" value="6"> <b>Receptionist</b></label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                </div>    
                                                            </div>
                                                        </div>
                                                    </div>
                                                       
                                            </form>
                                        </div>                   
                                        
                                        <!--dgfhdjfhdjhfdjghf Individual /.tab-pane -->
                                        <div class="tab-pane" id="tab_perticular">
                                            <form action="#" method="post" id="individual_form">
                                                <!-- /.box-header -->
                                                <div class="box-body">
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <label>Title</label>
                                                                <small class="req"> *</small>
                                                                <input class="form-control" name="individual_title">
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="pr20">Send Through<small class="req"> *</small></label>
                                                                <label class="checkbox-inline">
                                                                    <input type="checkbox" name="individual_send_by[]" value="mail"> Email                                               
                                                                 </label>
                                                                <label class="checkbox-inline">
                                                                    <input type="checkbox" name="individual_send_by[]" value="sms">SMS                                               
                                                                 </label>
                                                                <label class="checkbox-inline">
                                                                    <input type="checkbox" value="push" name="individual_send_by[]">Mobile App                                                
                                                                </label>
                                                                <span class="text-danger"></span>
                                                            </div>
                                                            
                                                            {{-- jfdhfd Individual er CKEditor --}}
                                                            <div class="form-group"><label>Message</label><small style="color:red"> *</small>
                                                                {{-- CKEDITOR --}}
                                                                <div>
                                                                <textarea name="individual" id="individual" rows="14" cols="150"
                                                                    data-parsley-minlength="6"
                                                                    data-parsley-minlength-message="Come on! You need to enter at least a 6 character comment..">
                                                                    </textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="bs-component">
                                                                <div class="jumbotron">
                                                                    <div class="form-group">
                                                                        <label for="inpuFname">Message To</label><small class="req"> *</small>
                                                                        <div class="input-group">
                                                                            <div class="input-group-btn bs-dropdown-to-select-group">
                                                                                <button type="button" class="btn btn-default btn-searchsm dropdown-toggle as-is bs-dropdown-to-select" data-toggle="dropdown">
                                                                                    <span data-bind="bs-drp-sel-label">Select</span>
                                                                                    <input type="hidden" name="selected_value" data-bind="bs-drp-sel-value" value="">
                                                                                    <span class="caret"></span>
                                                                                </button>
                                                                                <ul class="dropdown-menu" role="menu" style="">
                        
                                                                                    <li data-value="student"><a href="#">Students</a></li>
                                                                                    <li data-value="parent"><a href="#">Guardians</a></li>
                                                                                    <li data-value="staff"><a href="#">Admin</a></li>
                                                                                    <li data-value="staff"><a href="#">Teacher</a></li>
                                                                                    <li data-value="staff"><a href="#">Accountant</a></li>
                                                                                    <li data-value="staff"><a href="#">Librarian</a></li>
                                                                                    <li data-value="staff"><a href="#">Receptionist</a></li>
                                                                                </ul>
                                                                            </div>
                                                                            <input type="text" value="" data-record="" data-email="" data-mobileno="" class="form-control" autocomplete="off" name="text" id="search-query">
                                                                            <div id="suggesstion-box"></div>
                                                                            <span class="input-group-btn">
                                                                                <button class="btn btn-primary btn-searchsm add-btn" type="button">Add</button>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="dual-list list-right">
                                                                        <div class="well minheight260">
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <div class="input-group">
                                                                                        <input type="text" name="SearchDualList" class="form-control" placeholder="Search...">
                                                                                        <div class="input-group-btn"><span class="btn btn-default input-group-addon bright"><i class="fa fa-search"></i></span></div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="wellscroll">
                                                                                <ul class="list-group send_list">
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                </div>    
                                                            </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                          {{--  fgfgjfgjfkgjfkgj cLASS ER --}}
                                            <div class="tab-pane" id="tab_class">
                                                <form action="https://school.jmjcode.net/admin/mailsms/send_class" method="post" id="class_form">
                                                    <div class="box-body">
                                                        <div class="row">
                                                        <div class="col-md-8">
                                                             <div class="form-group">
                                                                <label>Title</label>
                                                                <small class="req"> *</small>
                                                                <input class="form-control" name="class_title">
                                                             </div>
                                                            <div class="form-group">
                                                                <label class="pr20">Send Through<small class="req"> *</small></label>
                                                                <label class="checkbox-inline">
                                                                    <input type="checkbox" name="class_send_by[]" value="mail"> Email                                                
                                                                </label>
                                                                <label class="checkbox-inline">
                                                                    <input type="checkbox" name="class_send_by[]" value="sms">SMS                                                
                                                                </label>
                                                                <label class="checkbox-inline">
                                                                    <input type="checkbox" value="push" name="class_send_by[]">Mobile App                                                
                                                                </label>
                                                                <span class="text-danger"></span>
                                                             </div>
                                                            {{-- CLASS EDITOR --}}
                                                            <div class="form-group"><label>Message</label><small style="color:red"> *</small>
                                                                {{-- CKEDITOR --}}
                                                                <div>
                                                                <textarea name="classEr" id="classEr" rows="14" cols="150"
                                                                    data-parsley-minlength="6"
                                                                    data-parsley-minlength-message="Come on! You need to enter at least a 6 character comment..">
                                                                    </textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{-- Class Er Box --}}
                                                        <div class="col-md-4">
                                                            <div class="bs-component">
                                                                <div class="jumbotron">
                                                                    <div class="row">
                                                                        <div class="form-group col-xs-10 col-sm-12 col-md-12 col-lg-12">
                                                                            <label for="exampleInputEmail1">Message To</label><small class="req"> *</small>
                                                                            <select id="class_id" name="class_id" class="form-control">
                                                                                <option value="">Select</option>
                                                                                <option value="2">Nine</option>
                                                                                    <option value="4">Eight</option>
                                                                                    <option value="5">Seven</option>
                                                                                    <option value="6">Six</option>
                                                                                    <option value="7">Five</option>
                                                                                    <option value="8">Four</option>
                                                                                    <option value="9">Three</option>
                                                                                    <option value="10">Two</option>
                                                                                    <option value="11">One</option>
                                                                                    <option value="12">Ten</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="dual-list list-right">
                                                                        <div class="well minheight260">
                                                                            <div class="wellscroll">
                                                                                <b>Section</b>
                                                                                <ul class="list-group section_list listcheckbox">
                        
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                </div>    
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
                <div class="tile-footer">
                    <div class="row">
                        <div class="col-md-12">
                            <button class="btn btn-primary edit_studClass"  style="float: right;" id="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Send</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

      <div class="clearix"></div>
    @endsection
    @section('script')
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
      {{-- @include('backend.partials.js.datatable'); --}}
      <script>
        CKEDITOR.replace( 'answer' );
        CKEDITOR.replace( 'classEr' );
        CKEDITOR.replace( 'individual' );
       
      </script>
      <script type="text/javascript">
        if(document.location.hostname == 'pratikborsadiya.in') {
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
            ga('create', 'UA-72504830-1', 'auto');
            ga('send', 'pageview');
        }
      </script>
    @endsection

