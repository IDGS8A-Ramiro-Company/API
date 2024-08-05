<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'description',
    ];

    public function studentGroup()
    {
        return $this->hasMany(Group_Student::class,'group_id','id');
    }

    public function teacherGroup()
    {
        return $this->hasMany(GroupTeacher::class,'group_id','id');
    }

    public function student()
    {
        return $this->belongsToMany(Student::class,'group_students','group_id','user_id');
    }

    public function teacher()
    {
        return $this->belongsToMany(Teacher::class,'group_teachers','group_id','teacher_id');
    }

    public function courses()
    {
        return $this->hasMany(Course::class,'group_id','id');
    }

    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($group) {
            $group->courses()->each(function ($course) {
                $course->partial()->each(function ($partial) {
                    $partial->activity()->delete();
                });
                $course->partial()->delete();
            });
            $group->courses()->delete();
            $group->studentGroup()->delete();
            $group->teacherGroup()->delete();
        });
    }
}
