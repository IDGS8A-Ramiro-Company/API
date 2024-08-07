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
        'description',
        'grade',
        'ready'
    ];
    protected $casts = [
        'ready' => 'boolean',
    ];
    public function partial()
    {
        return $this->belongsTo(Partial::class);
    }
}
