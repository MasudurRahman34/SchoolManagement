<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\Attendance;
use App\model\SessionYear;
use App\model\classes;
use App\model\Section;
use App\model\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Session;
use Carbon\Carbon;


class AttendanceController extends Controller
{

    //form view
    public function index(){
    //     $attendences=Attendance::latest()->First();
    //     //latest()-First() used for find last input
    //     if($attendences!=null){

    //     $today=Carbon::now();
    //     $attDay= strtotime(date_format($attendences->created_at, 'y-m-d'));
    //     $today= strtotime(date_format($today, 'y-m-d'));
    //     if($today==$attDay){
    //     // $attendences=Attendence::orderBy('id','ASC')->get();
    //     //whereDate,date('Y-m-d') used for find current date; ->where('bId', Auth::user()->bId)->orderBy('id','ASC')
    //     $attendences=Attendance::whereDate('created_at',date('Y-m-d'))->where('bId', Auth::user()->bId)->get();
    //     return view('backend.pages.attendance.updateAttendence')->with('attendences', $attendences);

    //     }else{
    //         //$studets=Attendence::whereDate('created_at',date('Y-m-d'))->get();
    //         $class= classes::where('bId', Auth::user()->bId)->get();
    //         $sessionYear= SessionYear::where('bId', Auth::user()->bId)->get();
    //         return view('backend.pages.attendance.studentAttendence', compact("class","sessionYear"));
    //     }
    // }else{
        $class= classes::where('bId', Auth::guard('web')->user()->bId)->get();
        $sessionYear= SessionYear::where('bId', Auth::guard('web')->user()->bId)->get();
        return view('backend.pages.attendance.studentAttendence', compact("class","sessionYear"));
    // }
}

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
        Session::flash('success','Succesfully Student Attendence Data Saved');
        $attendences=Attendance::orderBy('id','ASC')->get();
        if((url()->previous())!==(url('/student/attendance'))){
            return redirect()->route('attendance.bydate');
        }else{
            return redirect()->route('attendance.index');
        }
    }
// }

//         $attendence= $request->attend;
//         foreach ($attendence as $id => $value) {
//         $stAttendence = new Attendance();
//         $stAttendence->attendence = $value;
//         $stAttendence->sectionId = $request->sectionId;
//         $stAttendence->classId = $request->classId2;
//         $stAttendence->studentId = $id;
//         if($request->created_date !=null){
//             $stAttendence->created_at=$request->created_date;
//         }
//         $stAttendence->bId= Auth::user()->bId;
//         $stAttendence->save();

//         }



//         Session::flash('success','Succesfully Student Attendence Data Saved');
//         $attendences=Attendance::orderBy('id','ASC')->get();
// if((url()->previous())!==(url('/student/attendance'))){
//     return redirect()->route('attendance.bydate');
// }else{
//     return redirect()->route('attendance.index');
// }

//     }

    //view StudentA ttendence Details like present or absent
    public function attendenceDetails(){

        $attendences=Attendance::orderBy('id','ASC')->get();
        return view('backend.pages.attendance.updateAttendence')->with('attendences', $attendences);
    }

    public function studentData(Request $request)
    {
        $attendences=Attendance::where('sectionId', $request->sectionId)
        ->whereDate('created_at',date('Y-m-d'))
        ->where('bId' , Auth::guard('web')->user()->bId)
        ->first();
        if($attendences!=null){
            // $attendences=Attendance::where('sectionId', $request->sectionId)
            // ->whereDate('created_at',date('Y-m-d'))
            // ->where('bId' , Auth::guard('web')->user()->bId)
            // ->get();

            // return view('backend.pages.attendance.updateAttendence')->with('attendences', $attendences);

            return response()->json(["redirectToEdit"=>"/student/attendance/edit/$request->sectionId"]);
        }else{
            $sectionId= $request->sectionId;
            $students = Student::where('sectionId',$sectionId)->orderBy('id','ASC')->get();
            return response()->json($students);
        }


        // $sectionId= $request->sectionId;
        // $students = Student::where('sectionId',$sectionId)->get();
        // return response()->json($students);
        // return response()->json($attendences);
    }

    //student attandance date wish search
    public function studentDatabydate(Request $request)
    {


        $attendences=Attendance::where('sectionId', $request->sectionId)
        ->whereDate('created_at',$request->dateId)
        ->where('bId' , Auth::guard('web')->user()->bId)
        ->first();

        if($attendences!=null){
            // $attendences=Attendance::where('sectionId', $request->sectionId)
            // ->whereDate('created_at',date('Y-m-d'))
            // ->where('bId' , Auth::guard('web')->user()->bId)
            // ->get();

            // return view('backend.pages.attendance.updateAttendence')->with('attendences', $attendences);

           return response()->json(["redirectToEdit"=>"/student/attendance/datewishAttendance/$request->dateId/$request->sectionId"]);
        }else{
            $sectionId= $request->sectionId;
            $students = Student::where('sectionId',$sectionId)->get();
            return response()->json($students);
        }


        // $sectionId= $request->sectionId;
        // $students = Student::where('sectionId',$sectionId)->get();
        // return response()->json($students);
        // return response()->json($attendences);
    }

    //Date Wish Attendabce view from load
    public function datewishAttendance($dateId, $sectionId)
    {
        $attendences=Attendance::whereDate('created_at',$dateId)->where('sectionId', $sectionId)->where('bId', Auth::user()->bId)->with('section', 'student')->get();

        return view('backend.pages.attendance.updateAttendence')->with('attendences', $attendences);

    }

    //find current date attendance
    public function edit( $sectionId){

        $attendences=Attendance::whereDate('created_at',date('Y-m-d'))->where('sectionId', $sectionId)->where('bId', Auth::user()->bId)->with('section', 'student')->get();
        // foreach($attendences as $attn){
        //     foreach($attn->section->student as $stn){
        //         dd($stn->firstName);
        //     }
        // }

        return view('backend.pages.attendance.updateAttendence')->with('attendences', $attendences);
        //return Response()->json($attendence);
    }

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

    //view
    public function classwish(){

        $class= classes::where('bId', Auth::guard('web')->user()->bId)->get();
        $sessionYear= SessionYear::where('bId', Auth::guard('web')->user()->bId)->get();
        return view('backend.pages.attendance.studentAttendenceClassWish', compact("class","sessionYear"));
    }

    public function bydate(Request $request)
    {
        $class= classes::where('bId', Auth::guard('web')->user()->bId)->get();
        $sessionYear= SessionYear::where('bId', Auth::guard('web')->user()->bId)->get();
        return view('backend.pages.attendance.studentAttendenceByDate', compact("class","sessionYear"));
    }

}
