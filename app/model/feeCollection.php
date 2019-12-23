<?php

namespace App\model;
use App\model\Fee;

use Illuminate\Database\Eloquent\Model;

class feeCollection extends Model
{
    public function Fee(){
        return $this->belongsTo(Fee::class,'feeId');
    }
}
