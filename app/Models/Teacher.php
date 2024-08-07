<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Teacher extends Authenticatable
{
    use HasFactory;
    protected $table = 'users';
    protected $fillable=[
        'Name',
        'EmployeeNumber',
        'email',
        'password'
    ];
    protected $hidden=[
        'password',
        'remember_token'
    ];
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }
}
