<style>
	#middle{
		height: 500px;
		margin: 0px auto;
		border:1px solid black;

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
@extends('backend.layouts.master')
	@section('title', 'Admin|| Individual Student Admit Card')
    @section('content')
    <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i>Section Wish Individual Student Admit Card</h1>
          <p></p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item"><a href="#">Individual Student Admit Card</a></li>
        </ul>
    </div>

<div class="clearix"></div>
<div class="row justify-content-md-center">
    <div class="col-md-9">
        <div class="tile">
		<input type='button' class="bg-warning text-dark float-right"  value=' Print ' id='doPrint'>
		<div class="table-responsive"  id="print_div">
		 
			<div id="container">
				<div id="middle">
					
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-10">
								  <div class="bs-component">
									<div class="list-group">
									  <h3 class="text-center text-warning">Foridpur Girls &amp; Boys Pilot High School.</h2>
									  <h6 class="text-center">House:77, Level 2 &amp; 3, Road: 08, Block A, Dhanmondi 9/A, Dhaka-1207</h5>
									  <h5 class="text-center text-info">Admit Card</h4><hr class="new3" align="center" width="30%">
									</div>
								  </div>
								</div>

								
							</div>
						</div>
							<table class="table" border="1" id="">
									<tbody>
									  <tr>
										<td>Name:</td>
										<td>firstName</td>
										<td>SID:</td>
										<td>studentId</td>
									  </tr>
									  <tr>
										<td>Exam: </td>
										<td>First Team</td>
										<td>Class:</td>
										<td>gfg</td>
									  </tr>
									  <tr>
										<td>Roll:</td>
										<td>gff</td>
										<td>Section:</td>
										<td>sectionName</td>
									  </tr>
									  <tr>
										<td>Group:</td>
										<td>group</td>
										<td>Shift:</td>
										<td>shift</td>
									  </tr>
									</tbody>
							</table><br>
						<div class="col-md-12">
						  <div class="row">
							<div class="col-md-6">
							  <div class="bs-component">
								<div class="list-group float-left">
								<hr width="110%"><h6>Class Teacher</h6>
								</div>
							  </div>
							</div>
							<div class="col-md-6">
							  <div class="bs-component">
								<div class="list-group float-right">
								<hr width="110%"><h6>Exam Controller</h6>
								</div>
							  </div>
							</div>
						  </div>
						</div><br>
			    </div>
				<div id="footer">
				  <h6><i class="fa fa-phone-square" aria-hidden="true"></i>Foridpur Girls &amp; Boys Pilot High School, Phone: +8801885 986814</h6>
				</div>
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

    @endsection
