<!DOCTYPE html>
<html>
<head>
    <title>Student Course App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="/">StudentCourse</a>
        <div class="navbar-nav">
            <a class="nav-link" href="{{ route('students.index') }}">Students</a>
            <a class="nav-link" href="{{ route('courses.index') }}">Courses</a>
            <a class="nav-link" href="{{ route('enrollments.index') }}">Enrollments</a>
        </div>
    </div>
</nav>

<div class="container">
    @yield('content')
</div>

</body>
</html>
