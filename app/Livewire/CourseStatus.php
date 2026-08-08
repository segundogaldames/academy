<?php

namespace App\Livewire;

use App\Models\Course;
use App\Models\Lesson;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CourseStatus extends Component
{
    use AuthorizesRequests;

    public Course $course;
    public $current;

    public function mount(Course $course)
    {
        $this->course = $course;
        foreach($course->lessons as $lesson){
            if (!$lesson->completed) {
                $this->current = $lesson;

                break;
            }
        }

        if(!$this->current){
            $this->current = $course->lessons->last();
        }

        $this->authorize('enrolled', $course);
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.course-status');
    }

    #metodos

    public function changeLesson(Lesson $lesson)
    {
        $this->current = $lesson;
    }

    public function completed()
    {
        if ($this->current->completed) {
            # eliminar registro
            $this->current->users()->detach(Auth::user()->id);
        }
        else {
            # agregar registro
            $this->current->users()->attach(Auth::user()->id);
        }

        $this->current = Lesson::find($this->current->id);
        $this->course = Course::find($this->course->id);
    }

    #propiedades computadas

    public function getIndexProperty()
    {
        return $this->course->lessons->pluck('id')->search($this->current->id);
    }

    public function getPreviousProperty()
    {
        if ($this->index == 0) {
            return null;
        }else{

            return $this->course->lessons[$this->index - 1];
        }
    }

    public function getNextProperty()
    {
        if($this->index == $this->course->lessons->count() - 1){
            return null;
        }else {
            # code...
            return $this->course->lessons[$this->index + 1];
        }
    }

    public function getAdvanceProperty()
    {
        $i = 0;

        foreach ($this->course->lessons as $lesson) {
            if ($lesson->completed) {
                $i++;
            }
        }

        $advance = ($i * 100)/($this->course->lessons->count());
        return round($advance,2);
    }
}
