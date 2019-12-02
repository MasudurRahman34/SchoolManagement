<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class classes extends Model
{
    public static $rules = [
        'className'=>'required', 'string', 'max:255',
        'duration'=>'required', 'string',
        'seat'=>'required','integer',
    ];
    
}
