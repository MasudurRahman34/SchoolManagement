<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;


class scholarship extends Model
{
    // public function student(){
    //     return $this->belongsTo(Student::class,'user_id');
    // }

    public static $rules = [
        'name'=>'required',
        'discount'=>'required',
    ];


     public static $studentScholarshiprules = [
    
        'shift'=>'required', 'string',
        'sessionYearId'=>'required',
        'classId'=>'required',
        'sectionId'=>'required',
        'studentId'=>'required',
        'scholarshipId'=>'required',
        'feeId'=>'required',

    ];

}
