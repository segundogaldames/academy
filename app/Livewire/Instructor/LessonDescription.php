<?php

namespace App\Livewire\Instructor;

use App\Models\Lesson;
use Livewire\Component;

class LessonDescription extends Component
{
    public Lesson $lesson;
    public $description = '';

    public function mount(Lesson $lesson)
    {
        $this->lesson = $lesson;

        $this->description = $lesson->description->description ?? '';
    }

    public function render()
    {
        return view('livewire.instructor.lesson-description');
    }

    public function rules()
    {
        return [
            'description' => 'required'
        ];
    }

    public function update()
    {
        $this->validate();
        $this->lesson->description()->update(
            [
                'description' => $this->description
            ]
        );

        session()->flash('success', 'Descripción actualizada correctamente.');
    }

    public function store()
    {
        $this->validate();
        $this->lesson->description()->create(['description' => $this->description]);
        $this->lesson->refresh();

        session()->flash('success', 'Descripción guardada correctamente.');
    }

    public function destroy()
    {
        $this->lesson->description()?->delete();
        $this->description = '';
        $this->lesson->refresh();

        session()->flash('success', 'Descripción eliminada correctamente.');
    }
}
