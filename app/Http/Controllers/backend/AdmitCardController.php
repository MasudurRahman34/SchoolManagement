<?php

namespace App\Http\Controllers\backend;

use App\model\classes;
use App\model\Student;
use App\model\Section;
use App\model\exam;
use App\model\SessionYear;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Session\Session;

class AdmitCardController extends Controller
{
    public function AdmitCardController(){
        $class=classes::where('bid', Auth::guard('web')->user()->bId)->get();
        $section=Section::where('bid', Auth::guard('web')->user()->bId)->get();
        $sessionYear= SessionYear::where('bId', Auth::guard('web')->user()->bId)->get();

        return view('backend.pages.studentAdmitCard.admitCardGenerate')->with('class', $class)->with('section', $section)->with('sessionYear',$sessionYear);
    }

    public function sectionwiselist($classId, $sectionId)
    {

            $class=DB::select("select * from students, sections, classes WHERE sections.classId=classes.id AND students.sectionId=sections.id And classes.id='$classId' And sections.id='$sectionId'");
            // dd($class);
                
            return view('backend.pages.studentAdmitCard.admitCard',['class'=>$class]);
    }

    //individual admit card
    public function individualAdmitCardController(){
        $class=classes::where('bid', Auth::guard('web')->user()->bId)->get();
        $section=Section::where('bid', Auth::guard('web')->user()->bId)->get();
        $sessionYear= SessionYear::where('bId', Auth::guard('web')->user()->bId)->get();

        return view('backend.pages.studentAdmitCard.individualAdmitCardGenerate')->with('class', $class)->with('section', $section)->with('sessionYear',$sessionYear);

    }

    public function individualsectionwiselist($classId, $sectionId)
    {
        //$bId=Auth::guard('web')->user()->bId;
        //$class=DB::select("select * from students, sections, classes WHERE sections.classId=classes.id AND students.sectionId=sections.id And classes.id='$classId' And sections.id='$sectionId'");
        $student=DB::select("select * from students, sections, classes WHERE sections.classId=classes.id AND students.sectionId=sections.id And classes.id='$classId' And sections.id='$sectionId'");

            $data_table_render = DataTables::of($student)

                        ->editColumn('firstName', function($student)
                          {
                             return $student->firstName. " ".$student->lastName;
                          })
                        ->addColumn('action',function ($student){
                            
                                $print_url = url('print/studentAdmitCard/'.$student->studentId);
                                return '<a href="'.$print_url.'" class="btn btn-info btn-xs"><i class="fa fa-print" aria-hidden="true"></i>
                                </a>';
                            

                         })
                        ->rawColumns(['action'])
                        ->addIndexColumn()
                        ->make(true);
            return $data_table_render;
    }

    public function AdmitCardPrint($id)
    {
        
        $studentinfo=Student::where('studentId', $id)->with('Section')->get();
        return $studentinfo;
        // $students=Student::with('classes','Section')
        // ->where('bId', Auth::guard('web')->user()->bId)
        // ;
        // dd($students);
        // $student=Student::where('bid', Auth::guard('web')->user()->bId)->get();
        // $classs=classes::where('bid', Auth::guard('web')->user()->bId)->get();
        // $section=Section::where('bid', Auth::guard('web')->user()->bId)->get();

        $students=DB::select("select * from students, sections, classes WHERE sections.classId=classes.id AND students.sectionId=sections.id And classes.id='$id' And sections.id='$id'");
        //dd($students);
        return view('backend.pages.studentAdmitCard.printIndividualAdmitCard',['students'=> $students]);
    }
}
