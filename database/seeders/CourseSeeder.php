<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Course;
use App\Models\Image;
use App\Models\Requirement;
use App\Models\Goal;
use App\Models\Audience;
use App\Models\Section;
use App\Models\Lesson;
use App\Models\Description;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = Course::factory(100)->create();

        foreach ($courses as $course) {
            $course->image()->save( Image::factory()->make() );

            Requirement::factory(4)->create([
                'course_id' => $course->id
            ]);

            Goal::factory(4)->create([
                'course_id' => $course->id
            ]);

            Audience::factory(4)->create([
                'course_id' => $course->id
            ]);

            $sections = Section::factory(4)->create([
                'course_id' => $course->id
            ]);

            foreach ($sections as $section) {
                $lessons = Lesson::factory(4)->create([
                    'section_id' => $section->id
                ]);
                foreach ($lessons as $lesson) {
                    Description::factory(1)->create([
                        'lesson_id' => $lesson->id
                    ]);
                }
            }
        }
    }
}
