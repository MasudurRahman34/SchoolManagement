<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use App\model\Student;

class studentScholarship extends Model
{
    //
    public function Student(){
        return $this->belongsTo(Student::class,'id');

    }
}
