<?php

namespace App\Http\Controllers\backend\student;
use App\Http\Controllers\Controller;
use App\model\Fee;
use App\model\feeCollection;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;

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
