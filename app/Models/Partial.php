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
}
