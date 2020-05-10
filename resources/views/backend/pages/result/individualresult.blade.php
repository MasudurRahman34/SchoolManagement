		<table width="100%" class="header-table">
		        <tbody>
		        <tr>
		             <center><h2><b>FARIDPUR GOVT. GIRLS HIGH SCHOOL</b></h2><P>Faridpur</P></center>
		        </tr>
		        <tr>
		            <td style="padding-right:5px;vertical-align: top;"><p><b>Student Informatio</b></p>
		                <table class="table table-hover table-bordered" id="sampleTable">
		                    <thead>
		                        <tr>
		                        	 
		                    
		                        </tr>
		                    </thead>
		                    <tbody  id="StudentInformation">
		                    	@if ($students)
          								@foreach ($students as $student)

          									<tr>
            
									            <th> Student Name </th>
									            <td> {{ $student->firstName }} {{ $student->lastName }}</td>
									        </tr>
									        <tr>
									            <th>Roll</th>
									            <td>{{ $student->roll }}</td>
									        </tr>
									        <tr>
									            <th>Class</th>
									            <td>{{ $student->className }}</td>
									        </tr>
									        <tr>
									             <th>Section</th>
									            <td>{{ $student->sectionName }}</td>
									        </tr>
									        <tr>
									            <th>Session Year</th>
									            <td>{{ $student->sessionYear }}</td>
									        </tr>
									        <tr>
									       
									        </tr>


          								 @endforeach
       								 @endif
		                    </tbody>
		                </table>

		            </td>
		            <td width="450px" style="padding-left:10px;text-align:center; vertical-align: top;"><p><b>Grade point chart</b></p>
		                <table class="table table-hover table-bordered" id="sampleTablegradesInformation">
		                    <thead>
		                        <tr>
		                            
		                            <th>Letter Grade</th>
		                            <th>Marks Interval</th>
		                            <th>Grade point</th>
		                           
		                        </tr>
		                    </thead>
		                    <tbody id="gradesInformation">
		                    	@if ($grade)
          								@foreach ($grade as $studentgrade)

										<tr>
          									<td height="10px" padding="0.00rem">{{ $studentgrade->gradeName }}</td>
								            <td height="10px">{{ $studentgrade->maxValue }} - {{ $studentgrade->minValue }}</td>
								            <td height="10px">{{ $studentgrade->gradePoint }}</td>
										</tr>
          								

          								 @endforeach
       								 @endif

		                    </tbody>
		                </table>
		            </td>
		                 
		        </tr>
		        </tbody>
		    </table>
		</div>
	</div>
</div>
</div>
<div class="row" id="resultDiv">
    <div class="col-sm-12 ">
        <div class="tile">
            <h3 class=" row justify-content-md-center"><center><b id="name">  </b>  &nbsp Exam Result</center></h3>
			<div class="">
			    <table class="table table-hover table-bordered" id="sampleTable">
			        <thead>
			            <tr>

			                <th rowspan="2">SI</th>
			                <th colspan="" rowspan="2" headers="" scope="">subject</th>
			                <th colspan="" rowspan="2" headers="" scope="">Fullmark</th>
			                <th colspan="5" rowspan="" headers="" scope=""> marks option</th>
			                
			               <th rowspan="2">Point</th>
			                <th rowspan="2">Grade</th>
			            
			            </tr>
			            <tr>
	                		<th>CA</th>
	                        <th>MCQ</th>
	                        <th>Written</th>
	                        <th>Practical</th>
	                        <th>Total</th>
					    </tr>
			        </thead>
			        <tbody  id="myresult">
			        	<tr>
			        		<td>1</td>
				            <td>Bangla-1</td>
				            <td>100</td>

				            
				            <td>39</td>
				            <td>23</td>
				            <td>55</td>
				            <td>39</td>
				            <td>90</td>

				            <td>5.00</td>
				            <td>A+</td>
				            
			        	</tr>
			        	<tr>
			        		<td>2</td>
				            <td>Bangla-2</td>
				            <td>100</td>

				            <td>39</td>
				            
				            <td>23</td>
				            <td>55</td>
				            <td>39</td>
				            <td>90</td>

				            <td>5.00</td>
				            <td>A+</td>
				            
			        	</tr>
			        	<tr>
			        		
				            <td colspan="2">Bangla Total</td>
				            <td>200</td>

				            <td> </td>
				            
				            <td> </td>
				            <td>  </td>
				            <td> </td>
				            <td>90</td>

				            <td> </td>
				            <td>  </td>
				            
			        	</tr>
			        	<tr>
			        		<td>3</td>
				            <td>English-1</td>
				            <td>100</td>

				            <td>39</td>
				            
				            <td>23</td>
				            <td>55</td>
				            <td>39</td>
				            <td>90</td>

				            <td>5.00</td>
				            <td>A+</td>
				            
			        	</tr>
			        	<tr>
			        		<td>4</td>
				            <td>English-2</td>
				            <td>100</td>

				            <td>39</td>
				            
				            <td>23</td>
				            <td>55</td>
				            <td>39</td>
				            <td>90</td>

				            <td>5.00</td>
				            <td>A+</td>
				            
			        	</tr>
			        	<tr>
			        		
				            <td colspan="2">English Total</td>
				            <td>200</td>

				            <td> </td>
				            
				            <td> </td>
				            <td>  </td>
				            <td> </td>
				            <td>90</td>

				            <td> </td>
				            <td>  </td>
				            
			        	</tr>
			        	<tr>
			        		<td>5</td>
				            <td>Mathematics</td>
				            <td>100</td>

				            <td>39</td>
				            
				            <td>23</td>
				            <td>55</td>
				            <td>39</td>
				            <td>90</td>

				            <td>5.00</td>
				            <td>A+</td>
				            
			        	</tr>
			        	<tr>
			        		<td>6</td>
				            <td>Religion & moral Education</td>
				            <td>100</td>

				            <td>39</td>
				            
				            <td>23</td>
				            <td>55</td>
				            <td>39</td>
				            <td>90</td>

				            <td>5.00</td>
				            <td>A+</td>
				            
			        	</tr>
			        	<tr>
			        		<td>7</td>
				            <td>Bangladesh & Global studies</td>
				            <td>100</td>

				            <td>39</td>
				            
				            <td>23</td>
				            <td>55</td>
				            <td>39</td>
				            <td>90</td>

				            <td>5.00</td>
				            <td>A+</td>
				            
			        	</tr>
			        	<tr>
			        		<td>8</td>
				            <td>physics</td>
				            <td>100</td>

				            <td>39</td>
				            
				            <td>23</td>
				            <td>55</td>
				            <td>39</td>
				            <td>90</td>

				            <td>5.00</td>
				            <td>A+</td>
				            
			        	</tr>
			        	<tr>
			        		<td>9</td>
				            <td>chemistry</td>
				            <td>100</td>

				            <td>39</td>
				            
				            <td>23</td>
				            <td>55</td>
				            <td>39</td>
				            <td>90</td>

				            <td>5.00</td>
				            <td>A+</td>
				            
			        	</tr>
			        	<tr>
			        		<td>10</td>
				            <td>ICT</td>
				            <td>100</td>

				            <td>39</td>
				            
				            <td>23</td>
				            <td>55</td>
				            <td>39</td>
				            <td>90</td>

				            <td>5.00</td>
				            <td>A+</td>
				            
			        	</tr>
			        	<tr>
			        		<td>11</td>
				            <td>Biology</td>
				            <td>100</td>

				            <td>39</td>
				            
				            <td>23</td>
				            <td>55</td>
				            <td>39</td>
				            <td>90</td>

				            <td>5.00</td>
				            <td>A+</td>
				            
			        	</tr>
			        	<tr>
			        		<td>12</td>
				            <td>Higher Math</td>
				            <td>100</td>

				            <td>39</td>
				            
				            <td>23</td>
				            <td>55</td>
				            <td>39</td>
				            <td>90</td>

				            <td>5.00</td>
				            <td>A+</td>
				            
			        	</tr>
			        	<tr>
			        		<td colspan="7">Grand Total/GPA Without 4th  </td>
				            
				            
				            <td>90</td>

				            <td>5.00</td>
				            <td>A+</td>
				            
			        	</tr>
			        	<tr>
			        		<td colspan="7">Grand Total/GPA With 4th  </td>
				            
				            <td>90</td>

				            <td>5.00</td>
				            <td>A+</td>
				            
			        	</tr>
			        	<tr>
			        		<td>13</td>
				            <td>Career Education</td>
				            <td>100</td>

				            <td>39</td>
				            
				            <td>23</td>
				            <td>55</td>
				            <td>39</td>
				            <td>90</td>

				            <td>5.00</td>
				            <td>A+</td>
				            
			        	</tr>
			        	<tr>
			        		<td>14</td>
				            <td>physical Educatiob & health</td>
				            <td>100</td>

				            <td>39</td>
				            
				            <td>23</td>
				            <td>55</td>
				            <td>39</td>
				            <td>90</td>

				            <td>5.00</td>
				            <td>A+</td>
				            
			        	</tr>


			        </tbody>
			    </table>
			</div>
		</div>






    