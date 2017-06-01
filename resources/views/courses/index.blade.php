<!-- app/views/courses/index.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>This is a list of courses</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('courses') }}">Courses</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('courses') }}">View All Courses</a></li>
        <li><a href="{{ URL::to('courses/create') }}">Create a Course</a>
    </ul>
</nav>

<h1>All the Courses</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Course Name</td>
            <td>Course Description</td>
            <td>Action</td>
        </tr>
    </thead>
    <tbody>
    @foreach($courses as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->course_name }}</td>
            <td>{{ $value->description }}</td>
            <!-- we will also add show, edit, and delete buttons -->
            <td>
                {!! Form::open(array('url' => 'courses/' . $value->id, 'class' => 'pull-right')) !!}
                    <!-- delete the course (uses the destroy method DESTROY /courses/{id} -->
                    <!-- we will add this later since its a little more complicated than the other two buttons -->

                    <!-- show the course (uses the show method found at GET /courses/{id} -->
                    <a class="btn btn-small btn-success" href="{{ URL::to('courses/' . $value->id) }}">Show this Course</a>

                    <!-- edit this course (uses the edit method found at GET /courses/{id}/edit -->
                    <a class="btn btn-small btn-info" href="{{ URL::to('courses/' . $value->id . '/edit') }}">Edit this course</a>
                    {!! Form::hidden('_method', 'DELETE') !!}
                    {!! Form::submit('Delete this course', array('class' => 'btn btn-danger')) !!}
                {!! Form::close() !!}
                
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

</div>
</body>
</html>