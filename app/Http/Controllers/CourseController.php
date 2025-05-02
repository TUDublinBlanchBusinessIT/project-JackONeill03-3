<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
            'course_name' => 'required',
            'course_code' => 'required|unique:courses'
        ]);

        Course::create($request->all());
        return redirect()->route('courses.index')->with('success', 'Course added.');
    }

    public function edit(Course $course)
    {
        return view('courses.create', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        $request->validate([
            'course_name' => 'required',
            'course_code' => 'required|unique:courses,course_code,' . $course->id
        ]);

        $course->update($request->all());
        return redirect()->route('courses.index')->with('success', 'Course updated.');
    }

    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('courses.index')->with('success', 'Course deleted.');
    }
}
