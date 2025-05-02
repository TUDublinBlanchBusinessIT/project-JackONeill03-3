<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('courses.index', compact('courses'));
    }

    public function create()
    {
        return view('courses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_name' => 'required|string',
            'course_code' => 'required|string|unique:courses,course_code',
        ]);

        Course::create($request->all());
        return redirect()->route('courses.index');
    }

    public function edit(Course $course)
    {
        return view('courses.create', compact('course')); // Reuse form
    }

    public function update(Request $request, Course $course)
    {
        $request->validate([
            'course_name' => 'required|string',
            'course_code' => 'required|string|unique:courses,course_code,' . $course->id,
        ]);

        $course->update($request->all());
        return redirect()->route('courses.index');
    }

    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('courses.index');
    }
}
