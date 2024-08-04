<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable=[
        'partial_id',
        'name',
        'notes',
        'group_id',
        'teacher_id'
    ];

    public function partial()
    {
        return $this->belongsTo(Partial::class);
    }
}
