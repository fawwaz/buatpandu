<!-- app/views/courses/show.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Look! I'm CRUDding</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('courses') }}">Courses</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('courses') }}">View All courses</a></li>
        <li><a href="{{ URL::to('courses/create') }}">Create a Nerd</a>
    </ul>
</nav>

<h1>Showing {{ $course->course_name }}</h1>

    <div class="jumbotron text-center">
        <h2>{{ $course->course_name }}</h2>
        <p>
            <strong>Email:</strong> {{ $course->description }}<br>
            <strong>Parent Prerequisite name:</strong> {{ $my_parent }}
        </p>
    </div>

</div>
</body>
</html>