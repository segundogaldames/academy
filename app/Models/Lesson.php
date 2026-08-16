<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Lesson extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected static function booted(): void
    {
        static::deleting(function (Lesson $lesson) {
            // 1. Eliminar la descripción (Relación 1:1)
            $lesson->description()?->delete();

            // 2. Eliminar el recurso polimórfico (morphOne) y su archivo físico
            if ($lesson->resource) {
                // Borramos el archivo del disco 'public'
                if (Storage::disk('public')->exists($lesson->resource->url)) {
                    Storage::disk('public')->delete($lesson->resource->url);
                }

                // Borramos la fila de la tabla 'resources'
                $lesson->resource->delete();
            }
        });
    }

    public function getCompletedAttribute()
    {
        return $this->users->contains(Auth::user()->id);
    }

    public function description()
    {
        return $this->hasOne(Description::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function platform()
    {
        return $this->belongsTo(Platform::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function resource()
    {
        return $this->morphOne(Resource::class, 'resourceable');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function reactions()
    {
        return $this->morphMany(Reation::class, 'reactionable');
    }
}
