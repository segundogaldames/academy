<?php

namespace App\Livewire\Instructor;

use App\Models\Course;
use Livewire\Component;
use Livewire\Attributes\Layout;

class CoursesStudents extends Component
{
    public $course;

    public function mount(Course $course)
    {
        $this->course = $course;
    }

    #[Layout('layouts.instructor')]
    public function render()
    {
        $students = $this->course->students()->paginate(4);
        return view('livewire.instructor.courses-students', compact('students'));
    }
}
