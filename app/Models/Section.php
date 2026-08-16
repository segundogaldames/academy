<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Section extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected static function booted(): void
    {
        static::deleting(function (Section $section) {
            // Recorremos cada lección de la sección y llamamos a delete()
            // NOTA: Usamos $section->lessons (la colección) para que se dispare 
            // el evento deleting() individual de cada objeto Lesson.
            foreach ($section->lessons as $lesson) {
                $lesson->delete();
            }
        });
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
}
