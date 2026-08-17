<?php

namespace App\Livewire\Instructor;

use Livewire\Component;
use App\Models\Course;
use App\Models\Audience;

class CoursesAudiences extends Component
{
    public $course;
    public $audience;
    public $name;

    public function mount(Course $course)
    {
        $this->course = $course;
        $this->audience = new Audience();
    }

    public function rules()
    {
        return [
            'name' => 'required'
        ];
    }
    public function render()
    {
        return view('livewire.instructor.courses-audiences');
    }

    public function store()
    {
        $this->validate();
        $this->course->audiences()->create(['name' => $this->name]);
        $this->reset('name');
        $this->course->refresh();

        session()->flash('success', 'Audicncia creada correctamente.');
    }

    public function edit(Audience $audience)
    {
        $this->audience = $audience;
        $this->name = $this->audience->name;
    }

    public function update()
    {
        $this->validate();

        $this->audience->update(['name' => $this->name]);
        $this->course->refresh();

        session()->flash('success', 'Audiencia actualizada correctamente.');
    }

    public function destroy(Audience $audience)
    {
        $audience->delete();
        $this->course->refresh();

        session()->flash('success', 'Audiencia eliminada correctamente.');
    }

    public function cancel()
    {

        $this->audience = new Audience();
        $this->reset('name');
    }
}
