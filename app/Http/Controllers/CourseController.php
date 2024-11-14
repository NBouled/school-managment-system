<?php

namespace App\Http\Controllers;

use App\Enum\UserRole;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::with('teacher')->orderBy('id', 'desc')->paginate(15);

        return view('admin.courses.index', ['courses' => $courses]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teachers = User::where('role', UserRole::TEACHER)->get();

        return view('admin.courses.create', ['teachers' => $teachers]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        Course::create($request->all());

        return redirect()->route('courses.index')->with('success', 'Course created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        return view('admin.courses.show', ['course' => $course]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        $teachers = User::where('role', UserRole::TEACHER)->get();

        return view('admin.courses.edit', ['course' => $course, 'teachers' => $teachers]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {

        $course->update($request->all());

        return redirect()->route('courses.index')->with('success', 'Course updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->route('courses.index')->with('success', 'Course deleted successfully.');
    }
}
