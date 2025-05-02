@extends('layouts.app')

@section('content')
<h2>{{ isset($course) ? 'Edit Course' : 'Add Course' }}</h2>

<form action="{{ isset($course) ? route('courses.update', $course) : route('courses.store') }}" method="POST">
    @csrf
    @if(isset($course)) @method('PUT') @endif

    <div class="mb-3">
        <label for="course_name" class="form-label">Course Name</label>
        <input type="text" name="course_name" id="course_name" class="form-control"
               value="{{ $course->course_name ?? old('course_name') }}" required>
    </div>

    <div class="mb-3">
        <label for="course_code" class="form-label">Course Code</label>
        <input type="text" name="course_code" id="course_code" class="form-control"
               value="{{ $course->course_code ?? old('course_code') }}" required>
    </div>

    <button type="submit" class="btn btn-success">
        {{ isset($course) ? 'Update Course' : 'Create Course' }}
    </button>
</form>
@endsection
