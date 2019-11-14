<?php

namespace App\model;
use App\model\schoolBranch;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class Student extends Authenticatable
{
    use Notifiable, HasRoles;

    protected $guard = 'student';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','mobile','bId','readablePassword','address'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static $rules = [
        'email'=>'required', 'string', 'email', 'max:255', 'unique:users',
        'name'=>'required', 'string', 'max:255',
        'mobile'=>'required', 'string', 'max:255','unique:users',
        'designation'=>'string', 'max:255',
        'joinDate'=>'string',  'max:255',
        'address'=>'required', 'string',  'max:255',

    ];

    public function schoolBranch(){
        return $this->belongsTo(schoolBranch::class);
    }


}

