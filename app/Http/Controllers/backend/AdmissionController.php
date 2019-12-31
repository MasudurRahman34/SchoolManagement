<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\classes;
use App\model\SessionYear;
use App\model\Student;
use App\model\schoolBranch;
use App\model\studentoptionalsubject;
use App\model\Section;
use App\model\feeCollection;
use App\model\studentScholarship;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
Use Illuminate\Support\Facades\DB;
Use PDF;



class AdmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $SessionYear=SessionYear::where('bId', Auth::guard('web')->user()->bId)->get();
        $classes=classes::where('bId', Auth::guard('web')->user()->bId)->get();
        return view('backend.pages.admission.admission',compact('SessionYear', 'classes'));
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


        $password=mt_rand(100000,999999);
        $Student= new Student();
        $Student->studentId=mt_rand(100000,999999);
        $Student->firstName=$request->firstName;
        $Student->lastName=$request->lastName;
        $Student->gender=$request->gender;
        $Student->email=$request->email;
        $Student->mobile=$request->mobile;
        $Student->birthDate=$request->birthDate;
        $Student->blood=$request->blood;
        $Student->address=$request->address;
        $Student->password=Hash::make($password);
        $Student->readablePassword=$password;
        $Student->bId=Auth::guard('web')->user()->bId;
        $Student->sectionId=$request->sectionId;
        $Student->roll=$request->roll;
        $Student->group=$request->group;
        $Student->type=$request->type;
        $Student->schoolarshipId=$request->schoolarshipId;
        $Student->save();
        //if optinal subject
            if($request->has('optionalSubjectId')){
                $optionalSubjectId= $request->optionalSubjectId;
                foreach ($optionalSubjectId as $is_optional => $subjectId) {
                    if($subjectId!==null){
                    $studentoptionalsubject = new studentoptionalsubject();
                    $studentoptionalsubject->subjectId = $subjectId;
                    $studentoptionalsubject->studentId = $Student->id;
                    $studentoptionalsubject->optional = $is_optional;
                    $studentoptionalsubject->bId= Auth::user()->bId;
                    $studentoptionalsubject->save();
                    }
                }
            }

         //student scholarship
         if($request->has('forScholarshipFeeId')){
            $scholarship = new studentScholarship;
            $scholarship->studentId=$Student->id;
            $scholarship->scholershipId =$request->schoolarshipId;
            $scholarship->feeId =$request->forScholarshipFeeId;
            $scholarship->discount =$request->setDiscount;
            $scholarship->sessionYear =$request->sessionYear;
            $scholarship->save();
         }
         //fee collection data
         $fees=$request->fee;
         foreach ($fees as $feeid => $amount) {
            $feeCollection = new feeCollection();
            $feeCollection->studentId= $Student->id;
            $feeCollection->feeId = $feeid;
            $feeCollection->amount = $amount;
            $feeCollection->due  = 0;
            if($request->has('forScholarshipFeeId')){
                if($request->forScholarshipFeeId == $feeid){
                    $feeCollection->totalAmount = $request->feeAmountAfterDiscount;
                }else{
                    $feeCollection->totalAmount = $amount;
                }
            }else{
                $feeCollection->totalAmount = $amount;
            }

            $feeCollection->paidMonth =strtoupper(date('F'));
            $feeCollection->month  = strtoupper(date('F'));
            $feeCollection->year   = $request->sessionYear;
            $feeCollection->sectionId   = $request->sectionId;;
            $feeCollection->bId    = Auth::guard('web')->user()->bId;

            $feeCollection->save();

         }//




        $students=$Student::with('schoolBranch','Section')->where('bId', Auth::guard('web')->user()->bId)->latest()->First();
        // dd($students);
        // dd($students);
        // $StdbId=$Student->bId;
        // // dd($Student->Section->classes);
        // $students=DB::select("select * from students, school_branches where students.bId = school_branches.id and students.bId= '$StdbId'");
        $pdf = PDF::loadView('backend.pages.pdf.admissionPdf', ['students' => $students])->setPaper('a4','portrait');
        // return $pdf->stream($Student->firstName.$Student->roll.$Student->mobile.'.pdf');

        //return $pdf->download('student.pdf');
        return $pdf->stream('student.pdf');

        // return $pdf->download($Student->firstName.$Student->roll.$Student->mobile.'.pdf');
        // return route('admissison.index');
        // return redirect()->route('admissison.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

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
