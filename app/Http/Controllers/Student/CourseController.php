<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;

class CourseController extends Controller
{

    public function index(){

        $courses = Course::with('teacher')->orderBy('id', 'desc')->paginate(15);

        return view('student.courses.index', ['courses' => $courses]);
    }


    public function show(Course $course){
        $students = $course->students()->paginate(15);

        $isEnrolled = $course->students()->where('student_id', auth()->user()->id)->first();

        return view('student.courses.show', ['course' => $course, 'students' => $students, 'isEnrolled' => $isEnrolled]);
    }


    public function enroll(Course $course, User $student){

        $course->students()->attach($student->id);

        return redirect()->route('student.courses.show', ['course' => $course])->with('success', 'You have been enrolled in this course.');

    }
}
