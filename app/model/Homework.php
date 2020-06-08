<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

use App\model\User;
class Homework extends Model
{
     public function User(){
        return $this->belongsTo(User::class,'userId');
    }


     public static $rules = [
    
        
        'sessionYearId'=>'required',
        'classId'=>'required',
        'sectionId'=>'required',
        'group'=>'required',
        'subjectId'=>'required',
        'title'=>'required',
        'description'=>'required',
        'endDate'=>'required',

    ];
}
