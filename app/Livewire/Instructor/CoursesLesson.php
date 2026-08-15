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
    public ?Lesson $lesson = null;

    public $name = '';
    public $url = '';
    public $platform_id = 1;

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

    public function store()
    {
        $this->platform_id = $this->platform_id ?: 1;
        $this->validate();

        Lesson::create([
            'name' => $this->name,
            'url' => $this->url,
            'platform_id' => $this->platform_id,
            'section_id' => $this->section->id
        ]);

        $this->reset('name', 'url', 'platform_id');
        $this->section->refresh();
        $this->resetForm();
    }

    public function edit(Lesson $lesson)
    {
        $this->resetValidation();
        $this->lesson = $lesson;
        $this->name = $lesson->name;
        $this->url = $lesson->url;
        $this->platform_id = $lesson->platform_id;
    }

    public function update()
    {
        $this->validate();

        $this->lesson->update([
            'name'        => $this->name,
            'url'         => $this->url,
            'platform_id' => $this->platform_id,
        ]);

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
        $this->platform_id = 1;
        $this->resetErrorBag();
    }

    public function cancel()
    {
        $this->resetForm();
        $this->section = $this->section->fresh();
    }

    public function destroy(Lesson $lesson)
    {
        $lesson->delete();
        $this->section->refresh();
    }
}
