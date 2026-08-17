<?php

namespace App\Livewire\Instructor;

use App\Models\Course;
use App\Models\Goal;
use Livewire\Component;

class CoursesGoals extends Component
{
    public $course;
    public $goal;
    public $name;

    public function mount(Course $course)
    {
        $this->course = $course;
        $this->goal = new Goal();
    }

    public function render()
    {
        return view('livewire.instructor.courses-goals');
    }

    public function rules()
    {
        return [
            'name' => 'required'
        ];
    }

    public function store()
    {
        $this->validate();
        $this->course->goals()->create(['name' => $this->name]);
        $this->reset('name');
        $this->course->refresh();

        session()->flash('success', 'Meta creada correctamente.');
    }

    public function edit(Goal $goal)
    {
        $this->goal = $goal;
        $this->name = $this->goal->name;
    }

    public function update()
    {
        $this->validate();

        $this->goal->update(['name' => $this->name]);
        $this->course->refresh();

        session()->flash('success', 'Meta actualizada correctamente.');
    }

    public function destroy(Goal $goal)
    {
        $goal->delete();
        $this->course->refresh();

        session()->flash('success', 'Meta eliminada correctamente.');
    }

    public function cancel()
    {

        $this->goal = new Goal();
        $this->reset('name');
    }
}
