@extends('layouts.app')

@section('content')
<h2>Students</h2>
<a href="{{ route('students.create') }}" class="btn btn-primary mb-3">Add Student</a>

<table class="table table-bordered">
    <thead>
        <tr><th>ID</th><th>Name</th><th>Email</th><th>Actions</th></tr>
    </thead>
    <tbody>
        @foreach ($students as $student)
        <tr>
            <td>{{ $student->id }}</td>
            <td>{{ $student->name }}</td>
            <td>{{ $student->email }}</td>
            <td>
                <a href="{{ route('students.edit', $student) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('students.destroy', $student) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this student?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
