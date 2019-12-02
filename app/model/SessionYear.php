<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class SessionYear extends Model
{
    public static $rules = [

        'sessionYear'=>'required','string','max:255',
        
    ];
   

}
