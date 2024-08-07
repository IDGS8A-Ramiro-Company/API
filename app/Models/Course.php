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
        return $this->belongsTo(User::class, 'id_teacher');
    }

    public function partial()
    {
        return $this->hasMany(Partial::class, 'course_id','id');
    }

    public function getProgressAttribute()
    {
        $totalActivities = 0;
        $completedActivities = 0;

        foreach ($this->partial as $partial) {
            foreach ($partial->activity as $activity) {
                $totalActivities++;
                if ($activity->ready) {
                    $completedActivities++;
                }
            }
        }

        return $totalActivities > 0 ? ($completedActivities / $totalActivities) * 100 : 0;
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
