<?php

namespace App\Http\Controllers\backend\report;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    public function classbasedReport(){
        return view('backend.pages.report.classBasedIncomeReport');
    }

    public function dateWiseIncomeExpanseReport(){
        return view('backend.pages.report.dateWiseIncomeExpanseReport');
    }
}
