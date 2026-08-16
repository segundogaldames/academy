<?php

namespace App\Livewire\Instructor;

use App\Models\Lesson;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class LessonResources extends Component
{
    use WithFileUploads;

    public $lesson;
    public $file;

    public function mount(Lesson $lesson)
    {
        $this->lesson = $lesson;
    }

    public function render()
    {
        return view('livewire.instructor.lesson-resources');
    }

    public function save()
    {
        $this->validate(['file' => 'required|image|max:2048']);
        $path = $this->file->store('resources', 'public');

        $this->lesson->resource()->create([
            'url' => $path,
        ]);

        $this->reset('file');
        $this->lesson->refresh();

        session()->flash('success', 'Imagen subida correctamente.');
    }

    public function download()
    {
        // 1. Verificamos que el archivo realmente exista en el disco público
        $path = storage_path('app/public/' . $this->lesson->resource->url);

        // 2. Invocamos la descarga usando el disco de Storage
        if (file_exists($path)) {
            return response()->download($path);
        }
    }

    public function destroy()
    {
        $resource = $this->lesson->resource;

        if (Storage::disk('public')->exists($resource->url)) {
            Storage::disk('public')->delete($resource->url);

            $resource->delete();

            $this->lesson->refresh();
        }

        session()->flash('success', 'Imagen eliminada correctamente.');
    }
}
