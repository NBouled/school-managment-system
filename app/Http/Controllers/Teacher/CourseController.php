<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{

    public function show(Course $course){

        $students = $course->students()->paginate(15);
        $exams = $course->exams()->paginate(10);

        return view('teacher.courses.show', ['course' => $course, 'students' => $students, 'exams' => $exams]);
    }
}
