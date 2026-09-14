<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\Course;
use Illuminate\Support\Facades\Auth;

class CoursesReviews extends Component
{
    public $course_id;
    public $rating = 5;
    public $comment;

    public function mount(Course $course)
    {
        $this->course_id = $course->id;
    }

    public function render()
    {
        $course = Course::findOrFail($this->course_id);
        return view('livewire.courses-reviews', compact('course'));
    }

    public function store()
    {
        $course = Course::findOrFail($this->course_id);
        $course->reviews()->create([
            'comment' => $this->comment,
            'rating' => $this->rating,
            'user_id' => Auth::user()->id,
        ]);
    }
}
