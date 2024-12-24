<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Exam;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Course $course, Exam $exam)
    {
        return view('teacher.courses.exams.questions.create', ['course' => $course, 'exam' => $exam]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Course $course, Exam $exam)
    {
        // TODO:: add validation / File storage

        $exam->questions()->create($request->all());

        return redirect()->route('teacher.courses.exams.edit', ['course' => $course, 'exam' => $exam])->with('succces', 'Question created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        //
    }
}
