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
        return $this->belongsTo(Teacher::class);
    }

    public function partial()
    {
        return $this->hasMany(Partial::class);
    }
}
