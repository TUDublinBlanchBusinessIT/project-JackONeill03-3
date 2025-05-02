@extends('layouts.app')

@section('content')
<h2>{{ isset($student) ? 'Edit Student' : 'Add Student' }}</h2>

<form action="{{ isset($student) ? route('students.update', $student) : route('students.store') }}" method="POST">
    @csrf
    @if(isset($student)) @method('PUT') @endif

    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="{{ $student->name ?? old('name') }}" required>
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="{{ $student->email ?? old('email') }}" required>
    </div>

    <button class="btn btn-success">{{ isset($student) ? 'Update' : 'Create' }}</button>
</form>
@endsection
