<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class SessionYear extends Model
{
    public function Fee(){
        return $this->hasMany(Fee::class,'sessionYearId', 'id');
    }
    public static $rules = [

        'sessionYear'=>'required','string','max:255',
    ];


}
