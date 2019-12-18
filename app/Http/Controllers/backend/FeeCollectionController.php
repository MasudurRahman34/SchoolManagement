<?php

namespace App\Http\Controllers\backend;

use App\model\feeCollection;
use Illuminate\Http\Request;
use App\model\Fee;
use App\model\classes;
use App\model\Student;
use App\model\Section;
use App\model\SessionYear;
use App\model\feeHistory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class FeeCollectionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $class=classes::where('bid', Auth::guard('web')->user()->bId)->get();
        $fees=Fee::where('bid', Auth::guard('web')->user()->bId)->get();
        $section=Section::where('bid', Auth::guard('web')->user()->bId)->get();
        $sessionYear= SessionYear::where('bId', Auth::guard('web')->user()->bId)->get();
        return view('backend.pages.fee.feeCollection')->with('class', $class)->with('section', $section)->with('sessionYear',$sessionYear)->with('fees',$fees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)


    {
    //    dd($request);

            $fee= $request->attend;
            foreach ($fee as $id =>$value) {
                $stfee = new feeCollection();
                $stfee->feeGenerateId = mt_rand(100000,999999);
                $stfee->feeId = $request->feeId2;
                $stfee->amount  = $request->amount2;
                $stfee->month = $request->month2;
                $stfee->year = $request->sessionYear2;
                $stfee->studentId = $id;

                $stfee->bId= Auth::user()->bId;
                $stfee->save();
            }
            Session::flash('success','Succesfully Data Saved');
           // $marks=Mark::orderBy('id','ASC')->get();
            return redirect()->route('feecollection.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\model\feeCollection  $feeCollection
     * @return \Illuminate\Http\Response
     */
    public function show(feeCollection $feeCollection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\model\feeCollection  $feeCollection
     * @return \Illuminate\Http\Response
     */
    public function edit(feeCollection $feeCollection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\model\feeCollection  $feeCollection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, feeCollection $feeCollection)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\model\feeCollection  $feeCollection
     * @return \Illuminate\Http\Response
     */
    public function destroy(feeCollection $feeCollection)
    {
        //
    }
}
