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
use App\model\studentScholarship;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;

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

    public function individualCollection()

    {
        $class=classes::where('bid', Auth::guard('web')->user()->bId)->get();
        $fees=Fee::where('bid', Auth::guard('web')->user()->bId)->get();
        $section=Section::where('bid', Auth::guard('web')->user()->bId)->get();
        $sessionYear= SessionYear::where('bId', Auth::guard('web')->user()->bId)->get();
        return view('backend.pages.fee.individualFeeCollection')->with('class', $class)->with('section', $section)->with('sessionYear',$sessionYear)->with('fees',$fees);
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
    public function student(Request $request)
    {
        $fee=feeCollection::where('sectionId', $request->sectionId)
         ->where('feeId',$request->feeId)
         ->where('month',$request->month)
         ->where('bId' , Auth::guard('web')->user()->bId)
         ->first();
        if($fee!=null){
            $bId=Auth::guard('web')->user()->bId;
            $feeId=$request->feeId;
            $month=$request->month;
            $dueStudent=DB::select("select students.id,students.firstName,students.roll from students where  students.id NOT IN(select fee_collections.studentId from fee_collections where fee_collections.bId='$bId' and fee_collections.feeId='$feeId' and fee_collections.month='$month')");
            $paidStudent=DB::select("select fee_collections.id,students.id,students.firstName,students.roll from students,fee_collections where fee_collections.studentId=students.id and fee_collections.sectionId='$request->sectionId' and fee_collections.bId='$bId' and fee_collections.month='$month'");
            return response()->json(["dueStudent"=>$dueStudent, "paidStudent"=>$paidStudent]);
        }else{
            $sectionId= $request->sectionId;
            $students = Student::where('sectionId',$sectionId)->get();
            return response()->json($students);
         }
    }

    public function store(Request $request)
    {

            $fee= $request->attend;
            foreach ($fee as $id =>$value) {
                $stfee = new feeCollection();
                $fee= $request->amount2;
                $stfee->feeId = $request->feeId2;
                $stfee->month = $request->month2;
                $stfee->paidMonth = $request->month2;
                $stfee->year = $request->sessionYear2;
                $stfee->sectionId = $request->sectionId;

                $stfee->amount  = $fee;

                //change for total amount
                if($id!=null){
                    $scholership= studentScholarship::where('studentId',$id)->where('feeId',$request->feeId2)->get();
                    $discount=0;
                    if($scholership){
                        foreach ($scholership as $sc) {
                            $discount= $sc->discount;

                            }
                            $totalAmount =  $fee-(($fee*$discount)/100);
                            $stfee->totalAmount  = $totalAmount;
                            $stfee->studentId = $id;
                    }
                }
                $stfee->bId= Auth::user()->bId;
                $stfee->save();
            }
            Session::flash('success','Succesfully Data Saved');
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

        $ids=$request->attend;

                $deleteStudent= DB::table('fee_collections')->whereNotIn('studentId', $ids)->pluck('studentId');

            if($deleteStudent){
                DB::table('fee_collections')->whereIn('studentId', $deleteStudent)->delete();
                Session::flash('success','Remove Student From Fee Collection');
                return redirect()->route('feecollection.index');
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\model\feeCollection  $feeCollection
     * @return \Illuminate\Http\Response
     */
    public function destroy(feeCollection $feeCollection)
    {
        // $sessionYearDelete = SessionYear::find($id);
        //if($sessionYearDelete){
          //  $sessionYearDelete->delete();
            //return response()->json(["success"=>'Data successfully Deleted',201]);
    }

}
