<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reation extends Model
{
    protected $guarded = ['id'];
    
    const LIKE = 1;
    const DISLIKE = 2;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reactionable()
    {
        return $this->morphTo();
    }
}
