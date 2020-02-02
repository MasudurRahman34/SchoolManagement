<?php

namespace App\Http\Controllers\backend\Attendance;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\Attendance;
use App\model\SessionYear;
use App\model\classes;
use App\model\ClassTeacher;
use App\model\Section;
use App\model\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use PhpParser\Node\Stmt\Foreach_;

class AttendanceController extends Controller
{
    //form view
    public function index(){

        $class= classes::where('bId', Auth::guard('web')->user()->bId)->get();
        $sessionYear= SessionYear::where('bId', Auth::guard('web')->user()->bId)->get();
        return view('backend.pages.attendance.studentAttendence', compact("class","sessionYear"));
    // }
}

public function studentView($id)
    {
        // $students=Student::where('id',$id)
        // ->where('bId', Auth::guard('web')->user()->bId)
        // ->findOrFail($id);
        return view('backend.pages.attendance.studentAttendanceview', ['id' => $id]);
    }



//store Attendance information
public function storeAttendence(Request $request){

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


    //view StudentA ttendence Details like present or absent
    public function attendenceDetails(){

        $attendences=Attendance::orderBy('id','ASC')->get();
        return view('backend.pages.attendance.updateAttendence')->with('attendences', $attendences);
    }



    //student attandance date wish search
    public function studentDatabydate(Request $request)
    {

        $attendences=Attendance::where('sectionId', $request->sectionId)
        ->whereDate('created_at',$request->dateId)
        ->where('bId' , Auth::guard('web')->user()->bId)
        ->first();

        if($attendences!=null){

           return response()->json(["redirectToEdit"=>"/student/attendance/datewishAttendance/$request->dateId/$request->sectionId"]);
        }else{
            $sectionId= $request->sectionId;
            $students = Student::where('sectionId',$sectionId)->get();
            return response()->json($students);
        }

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
