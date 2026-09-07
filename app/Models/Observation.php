<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Observation extends Model
{
    protected $fillable = [
        'body',
        'course_id',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
