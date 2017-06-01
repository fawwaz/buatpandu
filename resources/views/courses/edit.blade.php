<!-- app/views/courses/edit.blade.php -->

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
        <li><a href="{{ URL::to('courses/create') }}">Create a course</a>
    </ul>
</nav>

<h1>Edit {{ $course->course_name }}</h1>
<!-- see.. this line is useful for debugging : uncomment this html-->
<!-- {{$course}} --> 

<!-- if there are creation errors, they will show here -->
{!! HTML::ul($errors->all()) !!}

{!! Form::model($course, array('route' => array('courses.update', $course->id), 'method' => 'PUT')) !!}

    <div class="form-group">
        {!! Form::label('course_name', 'Course name') !!}
        {!! Form::text('course_name', $course->course_name, array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('description', 'Description') !!}
        {!! Form::text('description', $course->description, array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('parent_id', 'Parent curse') !!}
        {!! Form::select('parent_id', $parent_list, $course->parent_id, array('class' => 'form-control')) !!}
    </div>
    
    <a class="btn btn-danger" href="{{ URL::to('courses') }}">Cancel edit</a>
    {!! Form::submit('Edit the course!', array('class' => 'btn btn-primary')) !!}

{!! Form::close() !!}

</div>
</body>
</html>