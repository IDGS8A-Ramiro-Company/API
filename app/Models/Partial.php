<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partial extends Model
{
    use HasFactory;

    protected $fillable=[
        'course_id',
        'name'
    ];

    public function course(){
        return $this->belongsTo(Course::class);
    }

    public function activity()
    {
        return $this->hasMany(Activity::class);
    }

    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($partial) {
            $partial->activity()->each(function ($activity) {
                $activity->delete();
            });
        });
    }
}
