<?php

namespace App\model;
use App\model\Fee;
use App\model\Month;

use Illuminate\Database\Eloquent\Model;

class feeCollection extends Model
{
    public function Fee(){
        return $this->belongsTo(Fee::class,'feeId');
    }

    public function month(){
        return $this->belongsTo(month::class,'month');
    }
}
