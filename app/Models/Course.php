<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'notes',
        'group_id',
        'id_teacher',
    ];

    public function group(){
        return $this->belongsTo(Group::class);
    }
    public function teacher(){
        return $this->belongsTo(User::class);
    }

    public function partial()
    {
        return $this->hasMany(Partial::class, 'course_id','id');
    }

    protected static function boot()
    {
        parent::boot();
        static::deleting(function($course){
            $course->partial()->each(function($partial){
                $partial->activity()->delete();
            });
            $course->partial()->delete();
        });
    }
}
