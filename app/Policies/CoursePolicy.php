<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Course;

class CoursePolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function enrolled(User $user, Course $course)
    {
        return $course->students->contains($user->id);
    }

    public function published(?User $user, Course $course)
    {
        return $course->status == 3;
    }

    public function dictated(User $user, Course $course)
    {
        return $course->user_id === $user->id;
    }
}
