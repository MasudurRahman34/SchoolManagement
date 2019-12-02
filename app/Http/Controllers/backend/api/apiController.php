<?php

namespace App\Http\Controllers\backend\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\classes;
use App\model\Section;
use App\model\Attendance;
use App\model\Student;
use App\model\Subject;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use DB;
use Yajra\DataTables\Facades\DataTables;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class apiController extends Controller
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

    public function section(Request $request)
    {
        $section= Section::where('classId', $request->classId)
                        ->where('sessionYearId', $request->sessionYearId)
                        ->where('shift', $request->shift)
                        ->get();
        return Response()->json($section);
    }

    public function roleHasClassTeacher($id)
    {
        $roleHasClassTeacher = Role::with('permissions')->where('bId', '=', Auth::guard('web')->user()->bId)
				->whereHas('permissions', function($query) use ($id) {
    				$query->where('role_id', $id)->where('permission_id',106);
				})
  				->pluck('id');
        return Response()->json($roleHasClassTeacher);
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

    public function totalStudent(){
        $bId=Auth::guard('web')->user()->bId;
        $totalStudent=DB::select("select * from students, sections, classes WHERE sections.classId=classes.id AND students.sectionId=sections.id And students.bId='$bId'");
        $totalStudent =count($totalStudent);
        return Response()->json(["success"=>'Counted', "data"=>$totalStudent,201]);
       }

    public function StudentAttendancePercentage($month)
    {
    //$bId=Auth::guard('web')->user()->bId;

        $totalday=Attendance::where('bId',Auth::guard('web')->user()->bId)
                        ->whereMonth('created_at', $month)
                        ->count();
                        if($totalday==0){
                            $totalday=1;
                        }else{
                            $totalday=$totalday;
                        }

        $Attendance=Attendance::where('attendence','present')
                        ->where('bId',Auth::guard('web')->user()->bId)
                        ->whereMonth('created_at', $month)
                        ->count();
        $percentage = (100*$Attendance)/$totalday;
        // return $percentage;
        return Response()->json(["success"=>'Counted', "data"=>$percentage,201]);
    }

    public function totalTeacher(){

    $totalteacher=User::where('bId',Auth::guard('web')->user()->bId)
                        ->where('designation','Teacher')
                        ->count();

    return Response()->json(["success"=>'Counted', "data"=>$totalteacher,201]);
    }
    public function totalUser(){

    $totalUser=User::where('bId',Auth::guard('web')->user()->bId)
                    ->count();

    return Response()->json(["success"=>'Counted', "data"=>$totalUser,201]);
    }
    public function totalsection(){

        $totalUser=Section::where('bId',Auth::guard('web')->user()->bId)->count();

        return Response()->json(["success"=>'Counted', "data"=>$totalUser,201]);
    }

    public function classwishAttentage(){

        $bId=Auth::guard('web')->user()->bId;
        //$totalStudent=DB::select("select count(students.id) as totalStudent from students, sections, classes WHERE sections.classId=classes.id AND students.sectionId=sections.id And students.bId='$bId' groupby ");
        // $totalStudent=DB::select("select count(attendences.attendances) as totalStudent from students, sections, classes WHERE sections.classId=classes.id AND students.sectionId=sections.id And students.bId='$bId'");
        // $attendances = DB::table('sections')
        //              ->select(DB::raw('sections', 'sections.sectionName'))
        //              ->rightJoin ('attendances','attendances.sectionId', '=', 'sections.id')
        //              ->where('attendence','present')
        //              ->where('attendances.bId',Auth::guard('web')->user()->bId)
        //             //  ->whereDate('attendances.created_at',date('Y-m-d'))
        //              ->select(DB::raw('sectionId, count(studentId) as user_count'))
        //              ->groupBy('attendances.sectionId')->get();
        //$attendances=DB::select("select sections.sectionName, COUNT(attendances.studentId) from sections, attendances WHERE sections.id=attendances.sectionId AND attendances.attendence='present' AND attendances.bId=30 GROUP BY attendances.sectionId");

                $attendances= classes::selectRaw('classes.className, count(classId) as present')
                ->Join ('attendances','attendances.classId', '=', 'classes.id')
                ->where('attendances.bId',Auth::guard('web')->user()->bId)
                ->where('attendence','present')
                ->whereDate('attendances.created_at',date('Y-m-d'))
                ->groupBy('classes.className')->get();
                // attnArray=array(
                //     'sections'=>
                // )


                $data_table_render = DataTables::of($attendances)
                    ->addColumn('hash',function ($row){
                        $i=0;
                        return ++$i;
                    })
                    // ->editColumn('ClassName', function($attendances)
                    // {
                    //    return $attendances->Section->classes->className;
                    // })

                    ->rawColumns(['hash'])
                    ->make(true);
                return $data_table_render;

        // return response()->json(["success"=>'Counted', "attn"=>$attendances,201]);

    }

    public function lastRoll($sectionId){
        try {
            $lastRoll= Student::where('sectionId', $sectionId)->latest()->FirstOrFail();

        } catch (ModelNotFoundException $exception) {

            return response()->json("Not Found");
        }

        return response()->json($lastRoll->roll);
    }

    public function optionalsubjectList(){
        $optinalsubject=Subject::get();
        return response()->json($optinalsubject);
    }

}
