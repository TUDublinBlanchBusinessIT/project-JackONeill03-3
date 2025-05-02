@extends('layouts.app')

@section('content')
<h2>Enrollments</h2>
<a href="{{ route('enrollments.create') }}" class="btn btn-primary mb-3">Add Enrollment</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Student</th>
            <th>Course</th>
            <th>Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($enrollments as $enrollment)
        <tr>
            <td>{{ $enrollment->id }}</td>
            <td>{{ $enrollment->student->name }}</td>
            <td>{{ $enrollment->course->course_name }}</td>
            <td>{{ $enrollment->enrollment_date }}</td>
            <td>
                <a href="{{ route('enrollments.edit', $enrollment) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('enrollments.destroy', $enrollment) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this enrollment?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
