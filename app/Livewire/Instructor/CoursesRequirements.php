<?php

namespace App\Livewire\Instructor;

use App\Models\Course;
use App\Models\Requirement;
use Livewire\Component;

class CoursesRequirements extends Component
{
    public $course;
    public $requirement;
    public $name;

    public function mount(Course $course)
    {
        $this->course = $course;
        $this->requirement = new Requirement();
    }

    public function rules()
    {
        return [
            'name' => 'required'
        ];
    }

    public function render()
    {
        return view('livewire.instructor.courses-requirements');
    }

    public function store()
    {
        $this->validate();
        $this->course->requirements()->create(['name' => $this->name]);
        $this->reset('name');
        $this->course->refresh();

        session()->flash('success', 'Requerimiento creado correctamente.');
    }

    public function edit(Requirement $requirement)
    {
        $this->requirement = $requirement;
        $this->name = $this->requirement->name;
    }

    public function update()
    {
        $this->validate();

        $this->requirement->update(['name' => $this->name]);
        $this->course->refresh();

        session()->flash('success', 'Requerimiento actualizado correctamente.');
    }

    public function destroy(Requirement $requirement)
    {
        $requirement->delete();
        $this->course->refresh();

        session()->flash('success', 'Requerimiento eliminado correctamente.');
    }

    public function cancel()
    {

        $this->requirement = new Requirement();
        $this->reset('name');
    }
}
