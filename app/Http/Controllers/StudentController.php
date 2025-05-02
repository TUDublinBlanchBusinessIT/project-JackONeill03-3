<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:students,email',
        ]);

        Student::create($request->all());
        return redirect()->route('students.index');
    }

    public function edit(Student $student)
    {
        return view('students.create', compact('student')); // Reuse form
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:students,email,' . $student->id,
        ]);

        $student->update($request->all());
        return redirect()->route('students.index');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index');
    }
}
