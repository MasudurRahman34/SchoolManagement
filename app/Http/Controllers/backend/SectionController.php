<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\classes;
use App\model\Section;
use App\model\SessionYear;
use Yajra\DataTables\DataTables;
use Auth;
use Illuminate\Support\Facades\Validator;
class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $class= classes::where('bId', Auth::guard('web')->user()->bId)->get();
        $sessionYear= SessionYear::where('bId', Auth::guard('web')->user()->bId)->get();
        return view('backend.pages.classes.manageSection', compact("class","sessionYear"));
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
        $validator= Validator::make($request->all(), Section::$rules);
        if ($validator->fails()) {
            return response()->json(["errors"=>$validator->errors(), 400]);
        }else{
        $section = new Section();
        $section->classId = $request->classId;
        $section->bId = Auth::guard('web')->user()->bId;
        $section->sessionYearId = $request->sessionYearId;
        $section->sectionName = $request->sectionName;
        $section->shift = $request->shift;
        $section->save();
        return Response()->json(["success"=>'Stored', "data"=>$section,201]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $sections=Section::orderBy('id','DESC')->where('bId', Auth::guard('web')->user()->bId)->with('classes')->with('sessionYear')->get();

        $data_table_render = DataTables::of($sections)
            ->addColumn('hash',function ($row){
                $i=0;
                $i=$i++;
                return $i;
            })
            ->addColumn('action',function ($row){
                return '<button class="btn btn-info btn-sm" onClick="editSection('.$row['id'].')"><i class="fa fa-edit"></i></button>'.
                    '<button  onClick="deleteSection('.$row['id'].')" class="btn btn-danger btn-sm delete_section"><i class="fa fa-trash-o"></i></button>';
            })
            ->rawColumns(['hash','action'])
            ->make(true);
        return $data_table_render;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $section = Section::find($id);
//        return view('backend.AddClass.addStudentClass')
//            ->with('studentClss',$studentclg);
        return Response()->json($section);
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
        $validator= Validator::make($request->all(), Section::$rules);
        if ($validator->fails()) {
            return response()->json(["errors"=>$validator->errors(), 400]);
        }else{
        $section = Section::find($id);
        $section->classId = $request->classId;
        $section->bId = Auth::user()->bId;
        $section->sessionYearId = $request->sessionYearId;
        $section->sectionName = $request->sectionName;
        $section->shift = $request->shift;
        $section->save();
        return Response()->json(["success"=>'Updated', "data"=>$section,201]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sectionDelete = Section::find($id);
        if($sectionDelete){
            $sectionDelete->delete();
            return response()->json(["success"=>'data deleted',201]);
        }
        return response()->json(["error"=>'error',422]);
    }
}
