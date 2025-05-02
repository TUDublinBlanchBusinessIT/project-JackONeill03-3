@extends('layouts.app')

@section('content')
<h2>Courses</h2>
<a href="{{ route('courses.create') }}" class="btn btn-primary mb-3">Add Course</a>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Course Name</th>
            <th>Code</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($courses as $course)
        <tr>
            <td>{{ $course->id }}</td>
            <td>{{ $course->course_name }}</td>
            <td>{{ $course->course_code }}</td>
            <td>
                <a href="{{ route('courses.edit', $course) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('courses.destroy', $course) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this course?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
