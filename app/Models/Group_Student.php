<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group_Student extends Model
{
    use HasFactory;

    protected $fillable=[
        'group_id',
        'student_id',
    ];
}
