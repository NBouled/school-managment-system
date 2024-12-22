<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Exam;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Course $course)
    {
        return view('teacher.courses.exams.create', ['course' => $course]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Course $course)
    {

        // Validations
        /*TODO::
            1. title required/string 2. status required/string 3. start required/start date moet later zijn dan NU. 4. end required/moet later zijn dan start
       5. description nullable
        */

        $course->exams()->create($request->all());

        return redirect()->route('teacher.courses.show', ['course' => $course])
            ->with('success', 'Exam created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course,Exam $exam)
    {
        return view('teacher.courses.exams.show', ['course' => $course, 'exam' => $exam]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course,Exam $exam)
    {
        return view('teacher.courses.exams.edit', ['course' => $course, 'exam' => $exam]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Course $course, Exam $exam)
    {
        // Validations

        $exam->update($request->all());

        return redirect()->route('teacher.courses.show', ['course' => $course])->with('success', 'Exam updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course, Exam $exam)
    {
        $exam->delete();
        return redirect()->route('teacher.courses.show', ['course' => $course])
            ->with('success', 'Exam deleted successfully');
    }
}
