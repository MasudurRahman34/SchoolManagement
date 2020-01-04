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

class ApiAttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        //
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
