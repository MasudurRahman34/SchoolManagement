<?php

namespace App\Http\Controllers\backend;
use App\model\scholarship;
use App\model\Fee;
Use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ScholarshipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\model\scholarship  $scholarship
     * @return \Illuminate\Http\Response
     */
    public function show(scholarship $scholarship)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\model\scholarship  $scholarship
     * @return \Illuminate\Http\Response
     */
    public function edit(scholarship $scholarship)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\model\scholarship  $scholarship
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, scholarship $scholarship)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\model\scholarship  $scholarship
     * @return \Illuminate\Http\Response
     */
    public function destroy(scholarship $scholarship)
    {
        //
    }
}
