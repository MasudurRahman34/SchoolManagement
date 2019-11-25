<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\classes;
use App\model\Student;
use App\model\Section;
use Illuminate\Support\Facades\Auth;
use DataTables;
use DB;
use Session;

class MyStudentConttroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.pages.mystudent.myStudentList');
    }
    public function allstudentlist()
    {

        $student=Student::orderBy('id','DESC')->where('bId',Auth::guard('web')->user()->bId)->with('Section')->get();
        // foreach ($student as $value) {
        //     dd($value->Section->classes);
        // }
        // dd($student->Section->classes);

        $data_table_render = DataTables::of($student)
            ->addColumn('hash',function ($row){

                return '#';
            })
            ->addColumn('action',function ($row){
               $edit_url = url('mystudent/show/studentProfile/'.$row['id']);
                return '<a href="'.$edit_url.'" class="btn btn-info btn-xs"><i class="fa fa-edit"></i></a>';
            })
            ->editColumn('section.classes', function($student)
                          {
                             return $student->Section->classes->className;
                          })
            ->rawColumns(['hash','action'])
            ->make(true);
        return $data_table_render;
    }

    public function classwise()
    {
        $class=classes::where('bid', Auth::guard('web')->user()->bId)->get();

            return view('backend.pages.mystudent.classwiseStudent')->with('class', $class);

    }

    public function classwiseList($classId)
    {
            $class=DB::select("select * from students, sections, classes WHERE sections.classId=classes.id AND students.sectionId=sections.id And classes.id='$classId'");

                $data_table_render = DataTables::of($class)
                        ->addColumn('hash',function ($class){

                            return '#';
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


    public function previouse()
    {
        return view('backend.pages.mystudent.previouse');
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
        $students=Student::with('schoolBranch','Section')
        ->where('bId', Auth::guard('web')->user()->bId)
        ->findOrFail($id);
        return view('backend.pages.mystudent.myStudentProfile',['students' => $students]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $students=Student::with('schoolBranch','Section')
        ->where('bId', Auth::guard('web')->user()->bId)
        ->findOrFail($id);
        return view('backend.pages.mystudent.updateProfile',['students' => $students]);
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
        // $this->validate($request,[
        //     'firstName'=>'string',
        //     'fatherName'=>'string',
        //     'motherName'=>'string',
        //     'gender'=>'',
        //     'birthDate'=>'',
        //     'religion'=>'',
        //     'address'=>'string',
        //     'mobile'=>'',
        //     'blood'=>'',
        //     'fatherOccupation'=>'required',
        //     'MotherOccupation'=>'',
        //     'fatherIncome'=>'string',
        //     'motherIncome'=>'',
        //     'address'=>'string',
        //     'mobile'=>'',
        // ]);
        // 2. data update
        $std = Student::find($id);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    //showProfile method
    public function showProfile($id){

        


        //return view('backend.pagesmystudent.myStudentProfile');
    }
}
