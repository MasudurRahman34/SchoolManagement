<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\model\scholarship;
use App\model\Fee;
Use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
Use Illuminate\Support\Facades\DB;


class ScholarshipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
      return view('backend.pages.scholarshipManagement.manageScholarship');
    }
    public function getAllScholarshipById($Id)
    {
        $Scholarship=Fee::where(Auth::guard('web')->user()->bId)->where('classId', $Id)->get();
        return Response()->json($Scholarship);
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
        $validator= Validator::make($request->all(), Scholarship::$rules);
        if ($validator->fails()) {
            return response()->json(["errors"=>$validator->errors(), 400]);
        }else{
        $scholarship = new Scholarship();
        $scholarship->name = $request->name;
        $scholarship->discount = $request->discount;
        $scholarship->bId = Auth::guard('web')->user()->bId;
        $scholarship->save();

        //message
        return Response()->json(["success"=>'saved',"data"=>$scholarship]);
        // Session::flash('success','Succesfully Add Class Data Saved');
        // return redirect()->back();
       }
     }

    /**
     * Display the specified resource.
     *
     * @param  \App\model\scholarship  $scholarship
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $scholarship=scholarship::orderBy('id','DESC')->where('bId',Auth::guard('web')->user()->bId)->get();

        $data_table_render = DataTables::of($scholarship)

            ->addColumn('action',function ($row){

                return '<button class="btn btn-info btn-sm" onClick="editScholarship('.$row['id'].')"><i class="fa fa-edit"></i></button>'.
                    '<button  onClick="deleteScholarship('.$row['id'].')" class="btn btn-danger btn-sm delete_class"><i class="fa fa-trash-o"></i></button>';
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        return $data_table_render;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\model\scholarship  $scholarship
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $scholarshipS = scholarship::find($id);
        return Response()->json($scholarshipS);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\model\scholarship  $scholarship
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator= Validator::make($request->all(), scholarship::$rules);
        if ($validator->fails()) {
            return response()->json(["errors"=>$validator->errors(), 400]);
        }else{

       $uScholarship = scholarship::find($id);
       $uScholarship->name = $request->name;
       $uScholarship->discount = $request->discount;
       $uScholarship->save();

        return response()->json(["success"=>'Stored', "data"=>$uScholarship ,201]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\model\scholarship  $scholarship
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Scholarship = scholarship::find($id);
        if($Scholarship){
            $Scholarship->delete();
            return response()->json('successful',201);
        }
        return response()->json('error',422);
    }
}
