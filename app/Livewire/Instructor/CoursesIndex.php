<?php

namespace App\Livewire\Instructor;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class CoursesIndex extends Component
{
    use WithPagination;
    public $search;

    public function updatingSearch()
    {
        $this->resetPage(); // Trait WithPagination
    }

    #[Layout('layouts.app')]
    public function render()
    {
        $courses = Course::where('title', 'LiKE', '%' . $this->search . '%')->where('user_id', Auth::user()->id)->latest('id')->paginate(8);
        return view('livewire.instructor.courses-index', compact('courses'));
    }

    public function reset_page()
    {
        $this->reset('page');
    }
}
