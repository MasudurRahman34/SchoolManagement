<?php

namespace App\Http\Controllers\backend\student;
use App\Http\Controllers\Controller;
use App\model\Student;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
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

     //student profile
    public function show()
    {
        $students=Student::with('schoolBranch','Section')
        ->where('bId', Auth::guard('student')->user()->bId)
        ->findOrFail(Auth::guard('student')->user()->id);
        return view('backend.student.pages.profile.profile',['students' => $students]);
    }

    //total student ina class 
   public function totalStudent(){
    $classId=Auth::guard('student')->user()->Section->classes->id;
    $totalStudent=DB::select("select * from students, sections, classes WHERE sections.classId=classes.id AND students.sectionId=sections.id And classes.id='$classId'");
    $totalStudent =count($totalStudent);
    return Response()->json(["success"=>'Counted', "data"=>$totalStudent,201]);
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

     
    public function update(Request $request)
    {  
        // $this->validate($request,[
        //     'firstName'=>'string',
        //     'fatherName'=>'string',
        //     'motherName'=>'string',
        //     'gender'=>'',
        //     'birthDate'=>'',
        //     'religion'=>'',
        //     'email'=>'required|email|unique:students,email,'.Auth::guard('student')->user()->id,
        //     'address'=>'string',
        //     'mobile'=>'',
        //     'blood'=>'',
        //     'fatherOccupation'=>'',
        //     'MotherOccupation'=>'',
        //     'fatherIncome'=>'string',
        //     'motherIncome'=>'',
        //     'address'=>'string',
        //     'mobile'=>'',
        // ]);
        // 2. data update
        $std = Student::find(Auth::guard('student')->user()->id);
        $std->firstName = $request->firstName;
        $std->fatherName = $request->fatherName;
        $std->motherName = $request->motherName;
        $std->gender = $request->gender;
        $std->birthDate = $request->birthDate;
        $std->religion = $request->religion;
        $std->email = $request->email;
        $std->address = $request->address;
        $std->mobile = $request->mobile;
        $std->blood = $request->blood;
        $std->fatherOccupation = $request->fatherOccupation;
        $std->MotherOccupation = $request->MotherOccupation;
        $std->fatherIncome = $request->fatherIncome;
        $std->motherIncome = $request->motherIncome;
        $std->address = $request->address;
        $std->mobile = $request->mobile;
        // file upload
        if ($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time().".".$image->getClientOriginalExtension();
            $destination_path = public_path('images');
            $image->move($destination_path,$filename);
            $std->image = $filename;
        }
        $std->save();
        Session::flash('success','Successfully Student Profile Updated');
        return redirect()->back();
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

    //Student's other information updated method
    // public function otherInfo(Request $request){
    //     $this->validate($request,[
    //         'fatherOccupation'=>'required',
    //         'MotherOccupation'=>'',
    //         'fatherIncome'=>'string',
    //         'motherIncome'=>'',
    //         'address'=>'string',
    //         'mobile'=>'',
    //     ]); 
    //     // 2. data update
    //     $stud = Student::find(Auth::guard('student')->user()->id);
    //     $stud->fatherOccupation = $request->fatherOccupation;
    //     $stud->MotherOccupation = $request->MotherOccupation;
    //     $stud->fatherIncome = $request->fatherIncome;
    //     $stud->motherIncome = $request->motherIncome;
    //     $stud->address = $request->address;
    //     $stud->mobile = $request->mobile;
       
    //     $stud->save();
    //     Session::flash('success','Successfully Student Information Updated');
    //     return redirect()->back();
    // }

    public function changePassword(Request $request){
        // $this->validate($request,[
        //     'password'=>'required|string|confirmed|min:6|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$!%*#?&]/'
        // ]);
        $student = Student::find(Auth::guard('student')->user()->id);
        $student->password = Hash::make($request->password);
        $student->save();
        Session::flash('success','You Have Successfully Changed Password');
        return redirect()->back();
    }
}
