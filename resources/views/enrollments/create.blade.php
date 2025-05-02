@extends('layouts.app')

@section('content')
<h2>{{ isset($enrollment) ? 'Edit Enrollment' : 'Add Enrollment' }}</h2>

<form action="{{ isset($enrollment) ? route('enrollments.update', $enrollment) : route('enrollments.store') }}" method="POST">
    @csrf
    @if(isset($enrollment)) @method('PUT') @endif

    <div class="mb-3">
        <label for="student_id" class="form-label">Student</label>
        <select name="student_id" id="student_id" class="form-select" required>
            <option value="">-- Select Student --</option>
            @foreach ($students as $student)
                <option value="{{ $student->id }}"
                    {{ isset($enrollment) && $enrollment->student_id == $student->id ? 'selected' : '' }}>
                    {{ $student->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="course_id" class="form-label">Course</label>
        <select name="course_id" id="course_id" class="form-select" required>
            <option value="">-- Select Course --</option>
            @foreach ($courses as $course)
                <option value="{{ $course->id }}"
                    {{ isset($enrollment) && $enrollment->course_id == $course->id ? 'selected' : '' }}>
                    {{ $course->course_name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="enrollment_date" class="form-label">Enrollment Date</label>
        <input type="date" name="enrollment_date" id="enrollment_date" class="form-control"
            value="{{ $enrollment->enrollment_date ?? old('enrollment_date') }}" required>
    </div>

    <button type="submit" class="btn btn-success">
        {{ isset($enrollment) ? 'Update Enrollment' : 'Create Enrollment' }}
    </button>
</form>
@endsection
