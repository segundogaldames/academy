<?php

namespace App\Livewire\Instructor;

use App\Models\Course;
use App\Models\Section;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Gate;

class CoursesCurriculum extends Component
{
    public $course;
    public Section $section;
    public $name = ''; // Mantiene el texto del input en Livewire 3

    public function mount(Course $course)
    {
        $this->course = $course;
        $this->section = new Section();
        Gate::authorize('dictated', $course);
    }


    public function render()
    {
        return view('livewire.instructor.courses-curriculum')
            ->layout('layouts.instructor', [
                'course' => $this->course
            ]);
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
        ]);

        Section::create([
            'name' => $this->name,
            'course_id' => $this->course->id
        ]);

        $this->reset('name');
        $this->course->refresh();
    }

    public function edit(Section $section)
    {
        $this->section = $section;
        $this->name = $section->name; // Sincronizamos el nombre con el input
    }
    public function updatedName($value)
    {
        $this->section->name = $value;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required',
        ]);

        if ($this->section->id) {
            $section = Section::find($this->section->id);
            $section->update([
                'name' => $this->name
            ]);
        }

        $this->course->refresh();

        // Reseteamos las propiedades
        $this->section = new Section();
        $this->name = '';
    }

    public function destroy(Section $section)
    {
        $section->delete();
        $this->course->refresh();
    }

    public function cancel()
    {
        $this->section = new Section();
        $this->name = '';
    }
}
