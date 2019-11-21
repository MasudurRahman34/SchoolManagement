<?php

namespace App\Http\Controllers\backend\student;
use App\Http\Controllers\Controller;
use App\model\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class StudentController extends Controller
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
        return view('backend.student.pages.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


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
     * @param  \App\model\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $students=Student::with('schoolBranch','Section')
        ->where('bId', Auth::guard('student')->user()->bId)
        ->findOrFail(Auth::guard('student')->user()->id);
        return view('backend.student.pages.profile.profile',['students' => $students]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\model\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $students=Student::with('schoolBranch','Section')
        ->where('bId', Auth::guard('student')->user()->bId)
        ->findOrFail(Auth::guard('student')->user()->id);
        return view('backend.student.pages.profile.updateProfile',['students' => $students]);
        //return view('backend.student.pages.profile.updateProfile');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\model\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // //validate
        // $this->validated($request,[
        //     'firstName'=>'required',
        //     'birthDate'=>'required',
        //     'email'=>'required|array',
        //     'address'=>'required',
        //     'mobile'=>'required',
        //     'blood'=>'required',
        // ]);
        // 2. data update
        $student = Student::find($id);
        $student->firstName = $request->firstName;
        $student->birthDate = $request->birthDate;
        $student->email = $request->email;
        $student->address = $request->address;
        $student->mobile = $request->mobile;
        $student->blood = $request->blood;
        //dd($student);
        $student->save();
        
        //return response()->json('success',201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\model\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }

    //student School corner method
    public function schoolCorner(){
        // $students = DB::table('students')->count();
        // return $students;
        return view('backend.student.pages.schoolCorner.index');
    }
    //event
    public function eventDetails(){
        return view('backend.student.pages.schoolCorner.eventDetails');
    }
}
