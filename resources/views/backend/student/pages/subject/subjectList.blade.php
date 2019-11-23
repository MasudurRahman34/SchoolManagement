@extends('backend.student.layouts.master')
	@section('title', 'Student Subject Page')
    @section('content')
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
    <div class="row justify-content-md-center">
    <div class="col-md-7">
        <div class="tile">
            <div class="tile-body">
                <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Subject Name</th>
                            <th>Subject Code</th>
                            <th>Subject Type</th>
                            <th>PDF DownLoad</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>
                    <td>01</td>
                   
                    <td>Bangla 1</td>
                    <td>9101</td>
                    <td>General</td>
                    <td>
                    <button class="btn btn-primary"><i class="fa fa-edit" onclick="subject() "></i></button>
                    </td>
                  </tr>
                  <tr>
                    <td>02</td>
                   
                    <td>Bangla 2</td>
                    <td>9102</td>
                    <td>General</td>
                    <td>
                    <button class="btn btn-primary"><i class="fa fa-edit" onclick="subject() "></i></button>
                    </td>
                  </tr>
                  <tr>
                    <td>03</td>
                    
                    <td>English 1</td>
                    <td>9107</td>
                    <td>General</td>
                    <td>
                    <button class="btn btn-primary"><i class="fa fa-edit" onclick="subject() "></i></button>
                    </td>
                  </tr> 
                  <tr>
                    <td>04</td>
                    
                    <td>English 2</td>
                    <td>9108</td>
                    <td>General</td>
                    <td>
                    <button class="btn btn-primary"><i class="fa fa-edit" onclick="subject() "></i></button>
                    </td>
                  </tr>
                  <tr>
                    <td>05</td>
                    
                    <td>Math</td>
                    <td>9109</td>
                    <td>General</td>
                    <td>
                    <button class="btn btn-primary"><i class="fa fa-edit" onclick="subject() "></i></button>
                    </td>
                  </tr>
                  <tr>
                    <td>06</td>
                    
                    <td>BDGS</td>
                    <td>9150</td>
                    <td>General</td>
                    <td>
                    <button class="btn btn-primary"><i class="fa fa-edit" onclick="subject() "></i></button>
                    </td>
                  </tr> 
                  <tr>
                    <td>07</td>
                    
                    <td>Religion</td>
                    <td>9111</td>
                    <td>General</td>
                    <td>
                    <button class="btn btn-primary"><i class="fa fa-edit" onclick="subject() "></i></button>
                    </td>
                  </tr>        
                    <tr>
                    <td>08</td>
                    <td>physics</td>
                    <td>9136</td>
                    <td>Science</td>
                    <td>
                      <button class="btn btn-primary"><i class="fa fa-edit" onclick="subject() "></i></button>
                     
                    </td>
                  </tr>      
                  <tr>
                    <td>09</td>
                    <td>Chemistry</td>
                    <td>9137</td>
                    <td>Science</td>
                    <td>
                    <button class="btn btn-primary"><i class="fa fa-edit" onclick="subject() "></i></button>
                    </td>
                  </tr>
                  <tr>
                    <td>10</td>
                    
                    <td>Higher Mathematics</td>
                    <td>9126</td>
                    <td>Science</td>
                    <td>
                    <button class="btn btn-primary"><i class="fa fa-edit" onclick="subject() "></i></button>
                    </td>
                  </tr>
                  <tr>
                    <td>11</td>
                    
                    <td>Biology</td>
                    <td>138</td>
                    <td>Science</td>
                    <td>
                    <button class="btn btn-primary"><i class="fa fa-edit" onclick="subject()"></i></button>
                    </td>
                  </tr>
                  <tr>
                    <td>12</td>
                    
                    <td>Com.Std</td>
                    <td>131</td>
                    <td>Science</td>
                    <td>
                    <button class="btn btn-primary"><i class="fa fa-edit" onclick="subject()"></i></button>
                    </td>
                  </tr>
                </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="clearix"></div>
    @endsection
    @section('script')
       <!-- @include('backend.student.partials.js.datatable');  -->
       
    <!-- <script src="{{ asset('admin/js/plugins/chart.js') }} "></script> -->
    <script type="text/javascript">
    
//     $(function(){
//     $(document).ready(function () {
        
//       var table=$('#sampleTable').DataTable({
//             dom: 'lBfrtip',
//             buttons: [
//                 'copy', 'csv', 'excel', 'pdf', 'print'
//             ],
//              processing:true,
//              serverSide:true,
//              ajax:"{{url('student/teacher/list/show')}}",
//              columns:[
//                  { data: 'hash', name: 'hash' },
//                  { data: 'name', name: 'name' },
//                  { data: 'email', name: 'email' },
//                  { data: 'mobile', name: 'mobile' },
//              ]
//          });
//   });
// });
function subject(){
    alert('File is not Included');
}
  </script>

@endsection
