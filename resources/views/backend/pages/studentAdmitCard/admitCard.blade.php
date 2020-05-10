<style>
	#middle {
		height: 663px;
		margin: 0px auto;
		border: 1px solid black;
}
	#footer{
	   height: 36px;
		margin: 0px auto;
		border:1px solid black;
		text-align: center;
		padding-top: 10px;
	}
	table{
		height: 250px;
		width: 600px;
		margin-left:;
	}
	table tr{
		text-align: center;
	}
	a{
		text-decoration: none;
	}
	@media print{
        .table-bordered{
            background-color: green;
        }
        }
        hr.new2 {
            border-top: 1px dashed red;
        }
        hr.new3 {
        border-top: 1px dotted red;
    }
</style>

<div class="row justify-content-md-center">
    <div class="col-md-10">
	
        <div class="tile">
		<input type='button' class="bg-warning text-dark float-right"  value=' Print ' id='doPrint'>
		   <div class="table-responsive"  id="print_div">
		     @foreach( $class as $student)
		
				<div id="container" class="" style="padding-top:px; padding-bottom:210px;">
					<div id="middle">
					<div class="row">
                    <div class="col-lg-9">
                      <div class="bs-component">
                        <div class="list-group">
						   <h3 class="text-center text-warning">{{Auth::guard('web')->user()->schoolBranch->nameOfTheInstitution}}</h2>
							<h6 class="text-center">{{Auth::guard('web')->user()->schoolBranch->address}}</h5>
							<h5 class="text-center text-info">Admit Card</h4>
							<h5 class="text-center text-info">{{$examName}}</h4>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="bs-component">
					  <div class="img-group float-right">
					    <img src="{{asset('students/gggg.png')}}"/>
                        </div>
                      </div>
                    </div>
						</div>
						<div class="clearfix"></div>
							<table class="table" border="1" id="">
								<tbody>
								  <tr>
									<td>Name:</td>
									<td>{{$student->firstName}} {{$student->lastName}} </td>
									<td>SID:</td>
									<td>{{$student->studentId}}</td>
								  </tr>
								  <tr>
									<td>Exam: </td>
								  <td>{{$examName}}</td>
									<td>Class:</td>
									<td>{{$student->className}}</td>
								  </tr>
								  <tr>
									<td>Roll:</td>
									<td>{{$student->roll}}</td>
									<td>Section:</td>
									<td>{{$student->sectionName}}</td>
								  </tr>
								  <tr>
									<td>Group:</td>
									<td>{{$student->group}}</td>
									<td>Shift:</td>
									<td>{{$student->shift}}</td>
								  </tr>
								</tbody>
							</table>
							
							<div class="row">
								<div class="col-md-12">
									<div class="tile">
										<div class="tile-title-w-btn">
										  <h6>Class Teacher</h6>
										<div class="btn-group">
										<h6>Exam Controller</h6>
										</div>
										</div>
										<div class="tile-body">
											  
										
										</div>
										<!-- in this -->
									</div>
									<h5 class="text-center">{{Auth::guard('web')->user()->schoolBranch->nameOfTheInstitution}}</h2>								</div>
							 </div>

					</div>
				</div>
		     @endforeach	
		  </div>
        </div>
    </div>
</div>
<div class="clearix"></div>
<script>

//print button in table
    $('#doPrint').on("click", function () {
        $('#print_div').printThis({
            debug: false,               // show the iframe for debugging
            importCSS: true,            // import parent page css
            importStyle: true,         // import style tags
            printContainer: true,       // print outer container/$.selector
            loadCSS: "",                // path to additional css file - use an array [] for multiple
            pageTitle: "",              // add title to print page
            removeInline: false,        // remove inline styles from print elements
            removeInlineSelector: "*",  // custom selectors to filter inline styles. removeInline must be true
            printDelay: 533,            // variable print delay
            header: null,               // prefix to html
            footer: null,               // postfix to html
            base: false,                // preserve the BASE tag or accept a string for the URL
            formValues: true,           // preserve input/form values
            canvas: false,              // copy canvas content
            doctypeString: '...',       // enter a different doctype for older markup
            removeScripts: false,       // remove script tags from print content
            copyTagClasses: false,      // copy classes from the html & body tag
            beforePrintEvent: null,     // function for printEvent in iframe
            beforePrint: null,          // function called before iframe is filled
            afterPrint: null            // function called before iframe is removed
        });
      });
    </script>

    