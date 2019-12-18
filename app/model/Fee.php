<?php

namespace App\model;
use App\model\classes;

use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    public function classes(){
        return $this->belongsTo(classes::class,'classId');
    }
    public function feeHistory(){
        return $this->hasMany(feeHistory::class,'feeId','id');
    }
    public static $rules = [
        'name'=>'required', 'string', 'max:255',
        'amount'=>'required','min:10',
        'classId'=>'required',
        'status'=>'required',
        'type'=>'required', 'string',
    ];
}
