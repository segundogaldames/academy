<?php

namespace App\Livewire\Instructor;

use App\Models\Lesson;
use App\Models\Platform;
use App\Models\Section;
use Livewire\Component;

class CoursesLesson extends Component
{
    public $section;
    public $platforms;
    public Lesson $lesson;

    public $name = '';
    public $url = '';
    public $platform_id = '';

    public function mount(Section $section)
    {
        $this->section = $section;
        $this->lesson = new Lesson();
        $this->platforms = Platform::all();
    }

    public function render()
    {
        return view('livewire.instructor.courses-lesson');
    }

    protected function rules()
    {
        $platformId = (int) ($this->platform_id ?: $this->lesson->platform_id);

        $urlRegex = match ($platformId) {
            // Regex de YouTube limpia: valida dominio, ID de 11 caracteres y acepta parámetros opcionales al final
            1 => 'regex:/^(https?:\/\/)?(www\.)?(youtube\.com\/(watch\?v=|embed\/|v\/)|youtu\.be\/)([a-zA-Z0-9_-]{11})(.*)?$/',

            // Regex de Vimeo
            2 => 'regex:/^(https?:\/\/)?(www\.)?vimeo\.com\/\d+(.*)?$/',

            default => 'required',
        };

        return [
            'name'        => 'required',
            'platform_id' => 'required',
            'url'         => ['required', $urlRegex],
        ];
    }

    public function updatedName($value)
    {
        $this->section->name = $value;
    }

    public function updatedUrl($value)
    {
        $this->section->url = $value;
    }



    public function edit(Lesson $lesson)
    {
        $this->lesson = $lesson;
        $this->name = $lesson->name;
        $this->url = $lesson->url;
        $this->platform_id = $lesson->platform_id;
    }

    public function update()
    {
        $this->validate();

        $this->lesson->name = $this->name;
        $this->lesson->url = $this->url;
        $this->lesson->platform_id = $this->platform_id;
        $this->lesson->section_id = $this->section->id;

        $this->lesson->save();

        $this->section->refresh();

        // Reseteamos las propiedades
        $this->lesson = new Lesson();
        $this->name = '';
        $this->url = '';
        $this->platform_id = '';
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->lesson = new Lesson();
        $this->name = '';
        $this->url = '';
        $this->platform_id = '';
        $this->resetErrorBag();
    }

    public function cancel()
    {
        $this->section = new Section();
    }
}
