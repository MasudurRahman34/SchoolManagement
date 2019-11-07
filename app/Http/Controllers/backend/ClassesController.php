<?php

namespace App\Http\Controllers\backend;

use App\model\classes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;
use DataTables;
use Illuminate\Support\Facades\Auth;

class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('backend.pages.classes.manageClass');
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
        
        $Classes = new Classes();
        $Classes->className = $request->className;
        $Classes->duration = $request->duration;
        $Classes->bId = Auth::user()->bId;
        $Classes->seat= $request->seat;
        $Classes->save();

        //message
        return Response()->json(["data"=>$Classes]);
        // Session::flash('success','Succesfully Add Class Data Saved');
        // return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\model\classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

        $Class=Classes::orderBy('id','DESC')->get();

        $data_table_render = DataTables::of($Class)
            ->addColumn('hash',function ($row){
                $i=0;
                return ++$i;
            })
            ->addColumn('action',function ($row){

                return '<button class="btn btn-info btn-sm" onClick="editClass('.$row['id'].')"><i class="fa fa-edit"></i></button>'.
                    '<button  onClick="deleteStudentCls('.$row['id'].')" class="btn btn-danger btn-sm delete_class"><i class="fa fa-trash-o"></i></button>';
            })
            ->rawColumns(['hash','action'])
            ->make(true);
        return $data_table_render;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\model\classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $studentclg = Classes::find($id);
        return Response()->json($studentclg);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\model\classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

       $studentClg = Classes::find($id);
       $studentClg->className = $request->className;
       $studentClg->duration = $request->duration;
       $studentClg->seat = $request->seat;

       $studentClg->save();

        return response()->json([$studentClg ,$id,201]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\model\classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $studentCls = Classes::find($id);
        if($studentCls){
            $studentCls->delete();
            return response()->json('successful',201);
        }
        return response()->json('error',422);
    }
}
