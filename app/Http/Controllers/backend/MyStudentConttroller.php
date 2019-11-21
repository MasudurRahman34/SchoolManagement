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

                return '<button class="btn btn-info btn-sm" onClick="viewProfile('.$row['id'].')"><i class="fa fa-edit"></i></button>';
                    // '<button  onClick="deleteStudentCls('.$row['id'].')" class="btn btn-danger btn-sm delete_class"><i class="fa fa-trash-o"></i></button>';
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
                        ->addColumn('hash',function ($row){

                            return '#';
                        })
                        // ->addColumn('action',function ($row){

                        //     return '<button class="btn btn-info btn-sm" onClick="viewProfile('.$row['id'].')"><i class="fa fa-edit"></i></button>';
                        //         // '<button  onClick="deleteStudentCls('.$row['id'].')" class="btn btn-danger btn-sm delete_class"><i class="fa fa-trash-o"></i></button>';
                        // })
                        ->rawColumns(['hash'])
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
