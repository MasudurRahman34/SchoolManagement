<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//add;
use App\model\classes;
use App\model\Mark;
use App\model\Student;
use App\model\Subject;
use App\model\Section;
use App\model\SessionYear;
use DataTables;
use DB;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Auth;

class MarksDistributionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects=Subject::where('bid', Auth::guard('web')->user()->bId)->get();
        $class=classes::where('bid', Auth::guard('web')->user()->bId)->get();
        $section=Section::where('bid', Auth::guard('web')->user()->bId)->get();
        $sessionYear= SessionYear::where('bId', Auth::guard('web')->user()->bId)->get();

            return view('backend.pages.marksdistribution.marksDistributionStudent')->with('class', $class)->with('section', $section)->with('sessionYear',$sessionYear)->with('subjects',$subjects);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sectionwiselist($classId, $sectionId)
    {
       
            $class=DB::select("select * from students, sections, classes WHERE sections.classId=classes.id AND students.sectionId=sections.id And classes.id='$classId' And sections.id='$sectionId'");

                $data_table_render = DataTables::of($class)
                        ->addColumn('hash',function ($class){

                            return '#';
                        })
                        ->editColumn('firstName', function($student)
                          {
                             return $student->firstName. " ".$student->lastName;
                          })
                        ->addColumn('action',function ($class){
                            foreach ($class as $key => $cl) {
                                $edit_url = url('mystudent/show/studentProfile/'.$cl);
                                return '<a href="'.$edit_url.'" class="btn btn-info btn-xs"><i class="fa fa-edit"></i></a>';
                            }
                            
                         })
                        ->rawColumns(['hash','action'])
                        ->make(true);
            return $data_table_render;
    }
    
    public function studentData(Request $request)
    {
        // $attendences=Attendance::where('sectionId', $request->sectionId)
        // ->whereDate('created_at',date('Y-m-d'))
        // ->where('bId' , Auth::guard('web')->user()->bId)
        // ->first();
        // if($attendences!=null){
            // $attendences=Attendance::where('sectionId', $request->sectionId)
            // ->whereDate('created_at',date('Y-m-d'))
            // ->where('bId' , Auth::guard('web')->user()->bId)
            // ->get();
            
            // return view('backend.pages.attendance.updateAttendence')->with('attendences', $attendences);

        //     return response()->json(["redirectToEdit"=>"http://localhost:8000/student/attendance/edit/$request->sectionId"]);
        // }else{
            $sectionId= $request->sectionId;
            $students = Student::where('sectionId',$sectionId)->get();
            return response()->json($students);
        // }

 
        // $sectionId= $request->sectionId;
        // $students = Student::where('sectionId',$sectionId)->get();
        // return response()->json($students);
        // return response()->json($attendences);
    }


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
    //Auth::guard('student/web')->user()->id;
    public function storemark(Request $request)
    {
        $mark= $request->attend;
        foreach ($mark as $id => $value) {  
            $stmark = new Mark();
            $stmark->mark = $value;
            $stmark->classId = $request->classId2;
            $stmark->sectionId = $request->sectionId;
            $stmark->subjectId = $request->subjectId2;
            $stmark->markType = $request->markType2;
            $stmark->studentId = $id;
           
            $stmark->bId= Auth::user()->bId;
            $stmark->save();
        }
        Session::flash('success','Succesfully Student Marks Data Saved');
        $marks=Mark::orderBy('id','ASC')->get();
        return redirect()->route('marks.index');
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
