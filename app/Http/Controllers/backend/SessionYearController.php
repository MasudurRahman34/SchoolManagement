<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\SessionYear;
use Auth;
use Yajra\DataTables\DataTables;

class SessionYearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.pages.classes.manageSession');
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
        $sessionYear= new SessionYear();
        $sessionYear->sessionYear= $request->sessionYear;
        $sessionYear->bId= Auth::user()->bId;
        $sessionYear->save();
        return response()->json([$sessionYear]);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $sessionYear=SessionYear::where('bId', Auth::user()->bId);
        $data_table_render = DataTables::of($sessionYear)
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
