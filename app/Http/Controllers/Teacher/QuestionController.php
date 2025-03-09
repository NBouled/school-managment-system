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

        $request->validate([
                'text' => 'required|string',
                'image' => 'file|mimes:jpeg,jpg,png',
                'description' => 'string|nullable',
                'options' => 'required|array|min:2',
        ]);

        $filePath = $request->file('image')->store('images', 'public');

        $exam->questions()->create([
            'text' => $request->text,
            'image' => $filePath,
            'description' => $request->description,
            'options' => $request->options

        ]);

        return redirect()->route('teacher.courses.exams.edit', ['course' => $course, 'exam' => $exam])->with('success', 'Question created successfully');
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
    public function edit(Course $course, Exam $exam, Question $question)
    {
        return view('teacher.courses.exams.questions.edit', ['question' => $question,'course' => $course, 'exam' => $exam]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course, Exam $exam, Question $question)
    {
        $request->validate([
            'text' => 'required|string',
            'image' => 'nullable|file|mimes:jpeg,jpg,png',
            'description' => 'string|nullable',
            'options' => 'required|array|min:2',
        ]);

        if($request->hasFile('image')){
            $filePath = $request->file('image')->store('images', 'public');
        }

        $question->update([
                'text' => $request->text,
                'image' => $filePath ?? $question->image,
                'description' => $request->description,
                'options' => $request->options
        ]);

        return redirect()->route('teacher.courses.exams.edit', ['course' => $course, 'exam' => $exam])->with('success', 'Question update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        //
    }
}
