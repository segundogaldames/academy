<?php

namespace App\Observers;

use App\Models\Lesson;

class LessonObserver
{
    public function creating(Lesson $lesson)
    {
        $this->generateIframe($lesson);
    }

    public function updating(Lesson $lesson)
    {
        if ($lesson->isDirty(['url', 'platform_id'])) {
            $this->generateIframe($lesson);
        }
    }

    private function generateIframe(Lesson $lesson): void
    {
        $url = $lesson->url;
        $platformId = (int) $lesson->platform_id;

        if ($platformId === 1) {
            $pattern = '/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/';
            if (preg_match($pattern, $url, $matches)) {
                $lesson->iframe = '<iframe width="560" height="315" src="https://www.youtube.com/embed/' . $matches[1] . '" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
            }
        } elseif ($platformId === 2) {
            $pattern = '/vimeo\.com\/(?:video\/)?([0-9]+)/';
            if (preg_match($pattern, $url, $matches)) {
                $lesson->iframe = '<iframe src="https://player.vimeo.com/video/' . $matches[1] . '" width="640" height="360" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>';
            }
        }
    }
}
