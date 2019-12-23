<?php

namespace App\Http\Controllers\backend;

use App\model\Fee;
use App\model\classes;
use App\model\feeHistory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
class FeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $class= classes::where('bId', Auth::guard('web')->user()->bId)->get();
        return view('backend.pages.fee.createFee', compact("class"));
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
        $validator= Validator::make($request->all(), Fee::$rules);
        if ($validator->fails()) {
            return response()->json(["errors"=>$validator->errors(), 400]);
        }else{

            $fee = new Fee();
            $fee->name = $request->name;
            $fee->amount = $request->amount;
            $fee->bId = Auth::guard('web')->user()->bId;
            $fee->classId = $request->classId;
            $fee->status = $request->status;
            $fee->interval = $request->interval;

            $fee->type = $request->type;
            $fee->save();
            return Response()->json(["success"=>'Stored', "data"=>$fee,201]);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\model\Fee  $fee
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
         //need to change in future for filtering data by session year with current year data;or create a new view for current session year;
         $fee=Fee::orderBy('id','DESC')->where('bId', Auth::guard('web')->user()->bId)->with('classes')->get();

         $data_table_render = DataTables::of($fee)


            ->editColumn('status', function($fee)
            {
                return $fee->status == 1 ? 'Yes': 'No';
            })

             ->addColumn('action',function ($row){
                 return '<button class="btn btn-info btn-sm" onClick="editfee('.$row['id'].')"><i class="fa fa-edit"></i></button>'.
                     '<button  onClick="deletefee('.$row['id'].')" class="btn btn-danger btn-sm delete_section"><i class="fa fa-trash-o"></i></button>';
             })
             ->rawColumns(['action'])
             ->addIndexColumn()
             ->make(true);
         return $data_table_render;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\model\Fee  $fee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fee = Fee::find($id);
            return response()->json($fee);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\model\Fee  $fee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator= Validator::make($request->all(), Fee::$rules);
        if ($validator->fails()) {
            return response()->json(["errors"=>$validator->errors(), 400]);
        }else{
            $fee = Fee:: find($id);
            $fee->name = $request->name;
            $fee->amount = $request->amount;
            $fee->bId = Auth::guard('web')->user()->bId;
            $fee->classId = $request->classId;
            $fee->status = $request->status;
            $fee->interval = $request->interval;
            $fee->type = $request->type;
            if($fee->amount != $fee->getOriginal('amount')){
                $feehistory = new feeHistory();
                $feehistory->feeId = $id;
                $feehistory->amount = $request->amount;
                $feehistory->bId = Auth::guard('web')->user()->bId;
                $feehistory->save();
            }
            $fee->save();
            return Response()->json(["success"=>'Stored with history', "data"=>$fee,201]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\model\Fee  $fee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $feeDelete = Fee::find($id);
        if($feeDelete){
            $feeDelete->delete();
            return response()->json(["success"=>'data deleted',201]);
        }
        return response()->json(["error"=>'error',422]);
    }
}
