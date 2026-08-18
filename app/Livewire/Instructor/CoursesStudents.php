<?php

namespace App\Livewire\Instructor;

use App\Models\Course;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Gate;

class CoursesStudents extends Component
{
    use WithPagination;

    public $course;
    public $search;

    public function mount(Course $course)
    {
        $this->course = $course;
        Gate::authorize('dictated', $course);
    }

    public function updatingSearch()
    {
        $this->resetPage(); // Trait WithPagination
    }

    #[Layout('layouts.instructor')]
    public function render()
    {
        $students = $this->course->students()->where('name', 'LIKE', '%' . $this->search . '%')->paginate(4);
        return view('livewire.instructor.courses-students', compact('students'));
    }
}
