<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\SessionYear;
use App\model\classes;
use App\model\ClassTeacher;
use App\model\Section;
use App\model\Student;
use App\model\Attendance;
use App\model\feeCollection;

use Illuminate\Support\Facades\DB;
use App\model\studentScholarship;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;

class ClassTeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function myclassattendance()
    {
        $userId= Auth::guard('web')->user()->id;
        //dd($userId);
        $bId= Auth::guard('web')->user()->bId;
        //dd($bId);
        $teachers= ClassTeacher::where('userId',$userId)->where('bId',$bId)->with('Section')->count();
        //dd($teachers);
        if($teachers<=0){

             return "You are not enroled in any class";

        }else{

            $teachers= ClassTeacher::where('userId',$userId)->where('bId',$bId)->with('Section')->get();
            foreach($teachers as $teacher){
                    if($teacher->Section->sessionYear->status == 1){
                        //dd($teacher->Section);
                        $classId = $teacher->classId;
                        $sectionId = $teacher->sectionId;

                    return view('backend.pages.classTeacher.myclassAttendence',['sectionId'=>$sectionId,'classId'=>$classId ]);
                }else{
                    return redirect()->back()->with('Session Expired!. You are not enroled in any class');
                }
            }

        }

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
   //store Attendance information
public function storeAttendence(Request $request){

    // $validator= Validator::make($request->all(), Attendance::$rules);
       // if ($validator->fails()) {
       //     return $validator->errors();
       //     // Session::flash('','Succesfully Student Attendence Data Saved');
       // }else{
           $attendence= $request->attend;
           foreach ($attendence as $id => $value) {
               $stAttendence = new Attendance();
               $stAttendence->attendence = $value;
               $stAttendence->sectionId = $request->sectionId;
               $stAttendence->classId = $request->classId2;
               $stAttendence->studentId = $id;
               if($request->created_date !=null){
                   $stAttendence->created_at=$request->created_date;
               }
               $stAttendence->bId= Auth::user()->bId;
               $stAttendence->save();
           }
           Session::flash('success','Succesfully Saved Student Attendence Data ');
           $attendences=Attendance::orderBy('id','ASC')->get();

            return redirect()->route('myclass.attendance');

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
   //find current date attendance
   public function edit( $sectionId){

    $attendences=Attendance::whereDate('created_at',date('Y-m-d'))->where('sectionId', $sectionId)->where('bId', Auth::user()->bId)->with('section', 'student')->get();
    // foreach($attendences as $attn){
    //     foreach($attn->section->student as $stn){
    //         dd($stn->firstName);
    //     }
    // }

    return view('backend.pages.classTeacher.updateAttendence')->with('attendences', $attendences);
    //return Response()->json($attendence);
}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   //update student attendence
   public function update(Request $request){

    $attendence= $request->attend;
    foreach ($attendence as $id => $value) {
    $stAttendence = Attendance::find($id);
    $stAttendence->attendence = $value;
    $stAttendence->bId= Auth::guard('web')->user()->bId;
    $stAttendence->update();
    }

    Session::flash('success','Successfully Updated The Attendence');
    return redirect()->back();
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

    public function myclassfeecollection()
    {
        $userId= Auth::guard('web')->user()->id;
        //dd($userId);
        $bId= Auth::guard('web')->user()->bId;
        //dd($bId);
        $teachers= ClassTeacher::where('userId',$userId)->where('bId',$bId)->with('Section')->count();
        //dd($teachers);
        if($teachers<=0){

             return "You are not enroled in any class";

        }else{

            $teachers= ClassTeacher::where('userId',$userId)->where('bId',$bId)->with('Section')->get();
            foreach($teachers as $teacher){
                    if($teacher->Section->sessionYear->status == 1){
                        //dd($teacher->Section);
                        $classId = $teacher->classId;
                        $shift = $teacher->shift;
                        $sessionYearId = $teacher->sessionYearId;
                        $sessionYear = SessionYear::where('id',$sessionYearId)->pluck('sessionYear');

                        $className= classes::where('id',$classId)->pluck('className');
                        $sectionId = $teacher->sectionId;
                        $sectionName= Section::where('id',$sectionId)->pluck('sectionName');

                    return view('backend.pages.classTeacher.feeCollection',['sectionId'=>$sectionId,'sectionName'=>$sectionName,'classId'=>$classId,'className'=>$className,'sessionYear'=>$sessionYear,'sessionYearId'=>$sessionYearId,'shift'=>$shift]);
                }else{
                    return redirect()->back()->with('Session Expired!. You are not enroled in any class');
                }
            }

        }

    }

     //find student for group fee collection
     public function student(Request $request)
     {

         $fee=feeCollection::where('sectionId', $request->sectionId)
          ->where('feeId',$request->feeId)
          ->where('month',$request->month)
          ->where('sessionYearId',$request->sessionYear)
          ->where('bId' , Auth::guard('web')->user()->bId)
          ->first();

         if($fee!=null){

             $bId=Auth::guard('web')->user()->bId;
             $feeId=$request->feeId;
             $month=$request->month;
             $sectionId=$request->sectionId;
             $sessionYear=$request->sessionYear;

             $dueStudent=DB::select("select students.id,students.firstName,students.lastName,students.roll from
             students where  students.id NOT IN(select fee_collections.studentId from fee_collections
             where fee_collections.bId='$bId'
             and fee_collections.feeId='$feeId'
             and fee_collections.month='$month'
             And fee_collections.sectionId='$sectionId'
             and fee_collections.sessionYearId='$sessionYear')

             AND students.sectionId='$sectionId'
             AND students.bId='$bId'
             AND students.deleted_at IS NULL
             ");

             $paidStudent=DB::select("select fee_collections.id,students.id,students.firstName,students.lastName,students.roll from
             students,fee_collections where fee_collections.studentId=students.id
             and fee_collections.sectionId='$request->sectionId'
             and fee_collections.feeId='$feeId'
             and fee_collections.bId='$bId'
             and fee_collections.month='$month'
             and fee_collections.sessionYearId='$sessionYear'");

             return response()->json(["dueStudent"=>$dueStudent, "paidStudent"=>$paidStudent]);
         }else{
             $sectionId= $request->sectionId;
             $students = Student::where('sectionId',$sectionId)->get();
             return response()->json($students);
          }
     }

      // store feeCollection data in group
    public function storefeecollection(Request $request)
    {

        $fee= $request->studentId;
        foreach ($fee as $id =>$value) {
            $stfee = new feeCollection();
            $fee= $request->amount2;
            $stfee->feeId = $request->feeId2;
            $stfee->month = $request->month2;
            $stfee->paidMonth = strtoupper(date('F'));
            $stfee->sessionYearId = $request->sessionYear2;
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
        return redirect()->route('myclass.feecollection');
    }

     //feeCollection Group data
     public function updatefeecollection(Request $request, feeCollection $feeCollection)
     {
         //dd($request);
         $ids=$request->studentId ;
         if($ids<1){
             $ids=array("0");
         }
         //dd($ids);
         //$ids=$ids->toSql();
         //dd($ids);
         $deleteStudent= DB::table('fee_collections')
                         ->whereNotIn('studentId', $ids)  //not working
                         ->where('month',$request->month2)
                         ->where('bId', Auth::user()->bId)
                         ->where('sessionYearId',$request->sessionYear2)
                         ->where('feeId',$request->feeId2)
                         ->pluck('studentId');
         //dd($deleteStudent);
         if($deleteStudent){
             DB::table('fee_collections')
             ->where('month',$request->month2)
             ->where('bId', Auth::user()->bId)
             ->where('sessionYearId',$request->sessionYear2)
             ->where('feeId',$request->feeId2)
             ->whereIn('studentId', $deleteStudent)->delete();

             Session::flash('success','Unchecked Student Removed From Fee Collection');
             return redirect()->route('myclass.feecollection');
         }
     }


     // student list section
     public function studentlist()
     {
         $userId= Auth::guard('web')->user()->id;
         //dd($userId);
         $bId= Auth::guard('web')->user()->bId;
         //dd($bId);
         $teachers= ClassTeacher::where('userId',$userId)->where('bId',$bId)->with('Section')->count();
         //dd($teachers);
         if($teachers<=0){

              return "You are not enroled in any class";

         }else{

             $teachers= ClassTeacher::where('userId',$userId)->where('bId',$bId)->with('Section')->get();
             foreach($teachers as $teacher){
                     if($teacher->Section->sessionYear->status == 1){
                         //dd($teacher->Section);
                         $classId = $teacher->classId;
                         $shift = $teacher->shift;
                         $sessionYearId = $teacher->sessionYearId;
                         $sessionYear = SessionYear::where('id',$sessionYearId)->pluck('sessionYear');

                         $className= classes::where('id',$classId)->pluck('className');
                         $sectionId = $teacher->sectionId;
                         $sectionName= Section::where('id',$sectionId)->pluck('sectionName');

                     return view('backend.pages.classTeacher.studentlist',['sectionId'=>$sectionId,'sectionName'=>$sectionName,'classId'=>$classId,'className'=>$className,'sessionYear'=>$sessionYear,'sessionYearId'=>$sessionYearId,'shift'=>$shift]);
                 }else{
                     return redirect()->back()->with('Session Expired!. You are not enroled in any class');
                 }
             }

         }

     }

     public function sectionwiselist(Request $request)

     {
        $classId= $request->classId;
        $sectionId= $request->sectionId;
        $sessionYearId= $request->sessionYearid;
         $bId=Auth::guard('web')->user()->bId;
             $class=DB::select("select students.id as stdId, students.firstName, students.lastName, students.fatherName,students.motherName,students.roll, students.blood, students.birthDate,students.mobile
                                 from students, sections, classes
                                 WHERE sections.classId=classes.id
                                 AND students.sectionId=sections.id
                                 And classes.id='$classId'
                                 And sections.id='$sectionId'
                                 AND sections.sessionYearId='$sessionYearId'
                                 AND students.bId='$bId'");

                 $data_table_render = DataTables::of($class)

                         ->editColumn('firstName', function($student)
                           {
                              return $student->firstName. " ".$student->lastName;
                           })
                           ->addColumn('action',function ($student){

                             $edit_url = url('mystudent/show/studentProfile/'.$student->stdId);
                             return '<a href="'.$edit_url.'" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>'.
                             '<a  onClick="deleteStudent('.$student->stdId.')" class="btn btn-danger btn-sm delete_class"><i class="fa fa-trash-o"></i></a>';


                          })
                         ->rawColumns(['action'])
                         ->addIndexColumn()
                         ->make(true);
             return $data_table_render;
     }


}
