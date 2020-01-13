<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\Section;
use App\model\SessionYear;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FeeManagementReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $sessionYear= SessionYear::where('bId', Auth::guard('web')->user()->bId)->get();
         return view('backend.pages.fee.report.monthWiseReport')->with('sessionYear',$sessionYear);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($month,$sessionYearId)
    {
        $bId=Auth::guard('web')->user()->bId;
    //     $sectionCalculation=DB::table("fee_collections")
    //     ->join('fees','fees.id','=','fee_collections.feeId')
    //     ->join('sections','fee_collections.sectionId','=','sections.id')
    //     ->select("fee_collections.sectionId", DB::raw(
    //    "COALESCE(sum(case when fees.type='gov' then fee_collections.totalAmount end), 0) as govtpayment,
    //     COALESCE(sum(case when fees.type='nonGov' then fee_collections.totalAmount end), 0) as Nongovtpayment,
    //     COALESCE(sum(fee_collections.totalAmount), 0) as total
    //    "))

    //     ->where('fee_collections.sessionYearId',$sessionYearId)
    //     ->where('fee_collections.month',$month)
    //     ->where('fee_collections.bId',$bId)
    //     ->groupBy('fee_collections.sectionId')->get();

    $sectionCalculation=DB::select("select fee_collections.sectionId, sections.sectionName,  sections.shift, classes.className, COALESCE(sum(case when fees.type='gov' then fee_collections.totalAmount end), 0) as govtpayment, COALESCE(sum(case when fees.type='nonGov' then fee_collections.totalAmount end), 0) as Nongovtpayment, COALESCE(sum(fee_collections.totalAmount), 0) as total FROM fee_collections, fees, sections, classes WHERE fee_collections.feeId=fees.id AND fee_collections.sectionId=sections.id AND sections.classId=classes.id AND fee_collections.sessionYearId='$sessionYearId' AND fee_collections.month='$month' AND fee_collections.bId='$bId' GROUP BY fee_collections.sectionId");

        $sectionTotalTableOutput="";
        $i=1;
        foreach ($sectionCalculation as $sectionTotal) {


            $sectionTotalTableOutput.='<tr>'.
            '<td>'.$i++.'</td>'.
            '<td>'.$sectionTotal->className.'</td>'.
            '<td>'.$sectionTotal->sectionName.'</td>'.
            '<td>'.$sectionTotal->shift.'</td>'.
                '<td>'.$sectionTotal->govtpayment.'</td>'.
                '<td>'.$sectionTotal->Nongovtpayment.'</td>'.
                '<td>'.$sectionTotal->total.'</td>'.
                // '<td>'.'link'.'</td>'.
                '</tr>';
        }


        // $groupByFeeTotal=DB::select("SELECT sections.sectionName, fees.name, classes.className, SUM(fee_collections.totalAmount) as total
        // FROM fee_collections, fees, sections,classes
        // WHERE fee_collections.feeId=fees.id
        // AND fee_collections.sectionId=sections.id
        // AND sections.classId=classes.id
        // AND fee_collections.sessionYearId='$sessionYearId'
        // AND fee_collections.month='$month'
        // AND fee_collections.bId='$bId'
        // AND fees.type='gov'
        // GROUP BY fee_collections.feeId");


        //Government Fee Type Report
        $governmentFeeTotal=DB::select("SELECT sectionName, fees.classId, classes.className, sections.shift, fees.name, SUM(fee_collections.totalAmount) as total, COUNT(fee_collections.sectionId) as totalStudent
                                            FROM fee_collections, fees, sections, classes
                                            WHERE fee_collections.feeId=fees.id
                                            AND fees.classid=classes.id
                                            AND fee_collections.sectionId=sections.id
                                            AND fee_collections.sessionYearId='$sessionYearId'
                                            AND fee_collections.month='$month'
                                            AND fee_collections.bId='$bId'
                                            AND fees.type='gov'
                                            GROUP BY feeId, fee_collections.sectionId
                                            ORDER BY fee_collections.sectionId");

                $governmentFeeTableOutput="";
                $i=1;

                    foreach ($governmentFeeTotal as $feeTotal) {

                        $governmentFeeTableOutput.='<tr>'.
                        '<td>'.$i++.'</td>'.
                        '<td>'.$feeTotal->className.'</td>'.
                        '<td>'.$feeTotal->sectionName.'</td>'.
                        '<td>'.$feeTotal->shift.'</td>'.
                        '<td>'.$feeTotal->name.'</td>'.
                        '<td>'.$feeTotal->total.'</td>'.
                        '<td>'.$feeTotal->totalStudent.'</td>'.
                        '</tr>';
                    }


        //Non-Government Fee Type Report
        $nonGovtFeeTotal=DB::select("SELECT sectionName, fees.classId, classes.className, sections.shift, fees.name, SUM(fee_collections.totalAmount) as total, COUNT(fee_collections.sectionId) as totalStudent
                                        FROM fee_collections, fees, sections, classes
                                        WHERE fee_collections.feeId=fees.id
                                        AND fees.classid=classes.id
                                        AND fee_collections.sectionId=sections.id
                                        AND fee_collections.sessionYearId='$sessionYearId'
                                        AND fee_collections.month='$month'
                                        AND fee_collections.bId='$bId'
                                        AND fees.type='nonGov'
                                        GROUP BY feeId, fee_collections.sectionId
                                        ORDER BY fee_collections.sectionId");

                    $nonGovtFeeTableOutput="";
                    $i=1;

                        foreach ($nonGovtFeeTotal as $nongovtfee) {

                        $nonGovtFeeTableOutput.='<tr>'.
                        '<td>'.$i++.'</td>'.
                        '<td>'.$nongovtfee->className.'</td>'.
                        '<td>'.$nongovtfee->sectionName.'</td>'.
                        '<td>'.$nongovtfee->shift.'</td>'.
                        '<td>'.$nongovtfee->name.'</td>'.
                        '<td>'.$nongovtfee->total.'</td>'.
                        '<td>'.$nongovtfee->totalStudent.'</td>'.

                        '</tr>';
                        }


        return Response()->json(["sectionTotalTableOutput"=>$sectionTotalTableOutput,"governmentFeeTableOutput"=>$governmentFeeTableOutput,"nonGovtFeeTableOutput"=>$nonGovtFeeTableOutput]);

    }

    // FROM fee_collections, fees
    //     WHERE fee_collections.feeId=fees.id
    //     AND fee_collections.sessionYearId='$sessionYearId'
    //     AND fee_collections.month='$month'
    //     AND fee_collections.bId='$bId'"

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
