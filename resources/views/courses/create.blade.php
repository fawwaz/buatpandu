<!-- app/views/courses/create.blade.php -->

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
        <li><a href="{{ URL::to('courses/create') }}">Create a Course</a>
    </ul>
</nav>

<h1>Create a Course</h1>

<!-- if there are creation errors, they will show here -->
{!! HTML::ul($errors->all()) !!}

{!! Form::open(array('url' => 'courses')) !!}

    <div class="form-group">
        {!! Form::label('course_name', 'Course name') !!}
        {!! Form::text('course_name', Input::old('course_name'), array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('description', 'Description') !!}
        {!! Form::text('description', Input::old('description'), array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('parent_id', 'Parent Course') !!}
        {!! Form::select('parent_id', $parent_list , Input::old('nerd_level'), array('class' => 'form-control')) !!}
    </div>

    {!! Form::submit('Create the Course!', array('class' => 'btn btn-primary')) !!}

{!! Form::close() !!}

</div>
</body>
</html>