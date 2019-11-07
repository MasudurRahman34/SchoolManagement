<?php

namespace App\model;


use Illuminate\Database\Eloquent\Model;

class Section extends Model
{

    public function classes(){
        return $this->belongsTo('App\model\classes','classId');
    }
    public function sessionYear(){
        return $this->belongsTo('App\model\sessionYear','sessionYearId');
    }

    public static $rules = [
        'sectionName'=>'required', 'string', 'max:255',
        'shift'=>'required', 'string',
        'sessionYearId'=>'required',
        'classId'=>'required',
    ];
}
