<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    use HasFactory;

    protected $fillable=[
        'name',
        'email',
        'password',
        'address',
        'phone',
        'age',
    ];

    protected $hidden=[
        'password',
        'remember_token'
    ];

    public function setPasswordAttribute($password){
        $this->attributes['password'] = bcrypt($password);
    }

    public function group()
    {
        return $this -> belongsToMany('App\Models\Group', 'group_students', 'student_id', 'group_id');
    }
}
