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

class SeatPlanController extends Controller
{
    public function seatPlan(){
        $class=classes::where('bid', Auth::guard('web')->user()->bId)->get();
        $section=Section::where('bid', Auth::guard('web')->user()->bId)->get();
        $sessionYear= SessionYear::where('bId', Auth::guard('web')->user()->bId)->get();
        $exam= exam::where('bId', Auth::guard('web')->user()->bId)->get();

        return view('backend.pages.seatPlan.seatPlanGenerate')->with('class', $class)->with('section', $section)->with('sessionYear',$sessionYear)->with('exam',$exam);
    }

    public function seatPlanPrint($classId, $sectionId, $examName,$room)
    {

            $class=DB::select("select * from students, sections, classes WHERE sections.classId=classes.id AND students.sectionId=sections.id And classes.id='$classId' And sections.id='$sectionId'");
            // dd($class);
                
            return view('backend.pages.seatPlan.printSeatPlan',[
                'class'=>$class, 
                'examName'=>$examName,
                'room'=>$room
                ]);
    }
}
