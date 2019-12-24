<?php

namespace App\Http\Controllers\backend\student;
use App\Http\Controllers\Controller;
use App\model\Fee;
use App\model\feeCollection;
use App\model\month;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentFeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:student');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.student.pages.fee.studentFeeView');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\model\studentFee  $studentFee
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $feeCollection=feeCollection::orderBy('id','DESC')
        ->where('studentId', Auth::guard('student')->user()->id)
        ->whereMonth('created_at', $id)
        ->with('Fee')->get();

        $totalAmountPay=feeCollection::where('studentId', Auth::guard('student')->user()->id)
        ->whereMonth('created_at', $id)
        ->sum('totalAmount');
        $tableOutPut="";
        foreach ($feeCollection as $fcollection) {
            $tableOutPut.='<tr>'.
            '<td>'.$fcollection->DT_RowIndex."#".'</td>'.
            '<td>'.$fcollection->created_at->format('d-M-Y').'</td>'.
            '<td>'.$fcollection->Fee->name.'</td>'.
            '<td>'.$fcollection->Fee->type.'</td>'.
            '<td>'.$fcollection->totalAmount.'</td>'.
            '</tr>'; 
        }
        return Response()->json(["totalAmountPay"=>$totalAmountPay, "tableOutPut"=>$tableOutPut]);
  
    }

    //student due fee
    public function dueFee(){
        return view('backend.student.pages.fee.studentDueFees');
    }
    public function dueFee2($month){
       

        $stid=Auth::guard('student')->user()->id;
        $feeid=DB::table('fee_collections')->select('feeId')->where('studentId', Auth::guard('student')->user()->id)->where('month', $month)->pluck('feeId');
        $NotGivenMonth=DB::table('fees')->select('*')
        ->whereNotIn('id', $feeid)
        ->get();
        $totalNotGiven=Fee::whereNotIn('id', $feeid)
        ->sum('amount');
        $tableOut="";
        foreach ($NotGivenMonth as $notGive) {
            $tableOut.='<tr>'.
            '<td>'.$notGive->name.'</td>'.
            '<td>'.$notGive->amount.'</td>'.
            '</tr>'; 
        }
        return Response()->json(["tableOut"=>$tableOut, 'totalNotGiven'=>$totalNotGiven]);
        // // dd($feeid);
        // $monthList=month::get()->pluck('month');
        
        // // $NotGivenMonth=DB::table('months')->select('month')
        // // ->whereNotIn('month', function($month){
        // //     $month->select('month')->from('fee_collections')->where('id', Auth::guard('student')->user()->id);
        // // })->get()->pluck('month');
        // $givenMonth=month::with('feeCollections')->get();
        // // foreach($givenMonth as $gv){
        // //     foreach($gv->feeCollections as $cl){
        // //         echo($cl->feeId)."<br/>";
        // //     };
        // // };
        // return view('backend.student.pages.fee.studentDueFees', compact('givenMonth'));
    }

    //

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\model\studentFee  $studentFee
     * @return \Illuminate\Http\Response
     */
    public function edit( $studentFee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\model\studentFee  $studentFee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $studentFee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\model\studentFee  $studentFee
     * @return \Illuminate\Http\Response
     */
    public function destroy( $studentFee)
    {
        //
    }
}
