@extends('backend.layouts.master')
	@section('title', 'Home Page')
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
      <div class="col-md-5 col-sm-12">
        <div class="tile">
         <form class="form-horizontal ml-5" style="font-size: 1rem;";
                font-weight: 400;">
          <h3 class="tile-title border-bottom p-2">Add New Class</h3>
          <div class="tile-body">

              <div class="form-group row">
                <label class="control-label col-md-3 pl-4 col-sm-12"> Class Name</label>
                <div class="col-md-9 col-sm-12">
                  <input class="form-control col-md-10 col-sm-12" type="text" id="className" name="className">
                </div>
              </div>
              <div class="form-group row">
                <label class="control-label col-md-3 col-sm-12 pl-4">Class Duration</label>
                <div class="col-md-9 col-sm-12">
                  <input class="form-control col-md-10 col-sm-12" type="text" id="classDuration" name="classDuration">
                </div>
              </div>
              {{-- <div class="form-group row">
                    <label class="control-label col-md-3 pl-4">Available Seat</label>
                    <div class="col-md-9">
                      <input class="form-control col-md-10" type="text" id="classSeat" name="classSeat">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-md-3 pl-4">Admission Fee</label>
                    <div class="col-md-9">
                      <input class="form-control col-md-10" type="number" id="classAdmissionFee" name="classAdmissionFee">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-md-3 pl-4">Montly Fee</label>
                    <div class="col-md-9">
                      <input class="form-control col-md-10" type="number" id="classMonthlyFee" name="classMonthlyFee">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-md-3 pl-4">Library Fee</label>
                    <div class="col-md-9">
                      <input class="form-control col-md-10" type="text"  id="classLibaryFee" name="classLibaryFee">
                    </div>
                </div> --}}
              <div class="form-group row">
                <label class="control-label col-md-3 pl-4 col-sm-12">Comments</label>
                <div class="col-md-9 col-sm-12">
                  <textarea class="form-control col-md-10 col-sm-12" rows="4" id="classComment" name="classComment"></textarea>
                </div>
              </div>


          </div>
          <div class="tile-footer">
                <div class="row">
                  <div class="col-md-12 col-sm-12">
                    <button class="btn btn-primary" type="submit" style="float: right;"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                  </div>
                </div>
            </div>
          </div>
        </div>
        </form>
      <div class="col-md-7 col-sm-12">
            <div class="tile">
              <div class="tile-body">
                <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Position</th>
                      <th>Office</th>
                      <th>Age</th>
                      <th>Start date</th>
                      <th>Salary</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Tiger Nixon</td>
                      <td>System Architect</td>
                      <td>Edinburgh</td>
                      <td>61</td>
                      <td>2011/04/25</td>
                      <td>$320,800</td>
                    </tr>
                    <tr>
                      <td>Garrett Winters</td>
                      <td>Accountant</td>
                      <td>Tokyo</td>
                      <td>63</td>
                      <td>2011/07/25</td>
                      <td>$170,750</td>
                    </tr>
                    <tr>
                      <td>Ashton Cox</td>
                      <td>Junior Technical Author</td>
                      <td>San Francisco</td>
                      <td>66</td>
                      <td>2009/01/12</td>
                      <td>$86,000</td>
                    </tr>
                    <tr>
                      <td>Cedric Kelly</td>
                      <td>Senior Javascript Developer</td>
                      <td>Edinburgh</td>
                      <td>22</td>
                      <td>2012/03/29</td>
                      <td>$433,060</td>
                    </tr>
                    <tr>
                      <td>Airi Satou</td>
                      <td>Accountant</td>
                      <td>Tokyo</td>
                      <td>33</td>
                      <td>2008/11/28</td>
                      <td>$162,700</td>
                    </tr>
                    <tr>
                      <td>Brielle Williamson</td>
                      <td>Integration Specialist</td>
                      <td>New York</td>
                      <td>61</td>
                      <td>2012/12/02</td>
                      <td>$372,000</td>
                    </tr>
                    <tr>
                      <td>Herrod Chandler</td>
                      <td>Sales Assistant</td>
                      <td>San Francisco</td>
                      <td>59</td>
                      <td>2012/08/06</td>
                      <td>$137,500</td>
                    </tr>
                    <tr>
                      <td>Rhona Davidson</td>
                      <td>Integration Specialist</td>
                      <td>Tokyo</td>
                      <td>55</td>
                      <td>2010/10/14</td>
                      <td>$327,900</td>
                    </tr>
                    <tr>
                      <td>Colleen Hurst</td>
                      <td>Javascript Developer</td>
                      <td>San Francisco</td>
                      <td>39</td>
                      <td>2009/09/15</td>
                      <td>$205,500</td>
                    </tr>
                    <tr>
                      <td>Sonya Frost</td>
                      <td>Software Engineer</td>
                      <td>Edinburgh</td>
                      <td>23</td>
                      <td>2008/12/13</td>
                      <td>$103,600</td>
                    </tr>
                    <tr>
                      <td>Jena Gaines</td>
                      <td>Office Manager</td>
                      <td>London</td>
                      <td>30</td>
                      <td>2008/12/19</td>
                      <td>$90,560</td>
                    </tr>
                    <tr>
                      <td>Quinn Flynn</td>
                      <td>Support Lead</td>
                      <td>Edinburgh</td>
                      <td>22</td>
                      <td>2013/03/03</td>
                      <td>$342,000</td>
                    </tr>
                    <tr>
                      <td>Charde Marshall</td>
                      <td>Regional Director</td>
                      <td>San Francisco</td>
                      <td>36</td>
                      <td>2008/10/16</td>
                      <td>$470,600</td>
                    </tr>
                    <tr>
                      <td>Haley Kennedy</td>
                      <td>Senior Marketing Designer</td>
                      <td>London</td>
                      <td>43</td>
                      <td>2012/12/18</td>
                      <td>$313,500</td>
                    </tr>
                    <tr>
                      <td>Tatyana Fitzpatrick</td>
                      <td>Regional Director</td>
                      <td>London</td>
                      <td>19</td>
                      <td>2010/03/17</td>
                      <td>$385,750</td>
                    </tr>
                    <tr>
                      <td>Michael Silva</td>
                      <td>Marketing Designer</td>
                      <td>London</td>
                      <td>66</td>
                      <td>2012/11/27</td>
                      <td>$198,500</td>
                    </tr>
                    <tr>
                      <td>Paul Byrd</td>
                      <td>Chief Financial Officer (CFO)</td>
                      <td>New York</td>
                      <td>64</td>
                      <td>2010/06/09</td>
                      <td>$725,000</td>
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
      @include('backend.partials.js.datatable');
      <script>

      </script>

    @endsection
