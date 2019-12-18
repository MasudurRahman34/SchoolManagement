<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class feeHistory extends Model
{
    public function fee(){
        return $this->belongsTo(Fee::class,'id');
    }
}
