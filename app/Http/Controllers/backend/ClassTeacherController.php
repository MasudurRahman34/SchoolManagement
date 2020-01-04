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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

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
        $teachers= ClassTeacher::where('userId',$userId)->where('bId',$bId)->with('Section')->get();
        //return($teachers);
        foreach($teachers as $teacher){
            $sessionYearId = $teacher->sessionYearId;
            $sectionId = $teacher->sectionId;
            $classId = $teacher->classId;
            $shift = $teacher->shift;
                //return($sessionYearId);
        }

        $sessionYears=SessionYear::where('id',$sessionYearId)->where('bId',$bId)->get();
            foreach($sessionYears as $sessionYear){
            if($sessionYear->status == 1){

                //return($sectionId);

                // $attendences=Attendance::where('sectionId', $sectionId)
                //     ->whereDate('created_at',date('Y-m-d'))
                //     ->where('bId' , Auth::guard('web')->user()->bId)
                //     ->first();
                //     if($attendences!=null){
                //         return response()->json(["redirectToEdit"=>"/student/attendance/edit/$sectionId"]);
                //     }else{
                //         $sectionId= $sectionId;
                //         $students = Student::where('sectionId',$sectionId)->orderBy('id','ASC')->get();
                //         return response()->json($students);
                //     }

                return view('backend.pages.classTeacher.myclassAttendence',['sectionId'=>$sectionId,'classId'=>$classId ]);
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
}
