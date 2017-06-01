<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Course;
use Validator;
use Session;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all();
        // laravel allows you to alter slash('/') with dot 
        // (`courses` actually a folder inside resource/views)
        
        // Note: You have to return a view(something)
        // Usually people forget to use 'return' keyword resulting a blank page
        return view('courses.index', ['courses' => $courses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::all();
        // Format the courses into a form accepted by Laravel's form helper'
        // Note : you can use var_dump / echo / print_r  function to "debug" some variable
        // echo $courses; 
        // print_r($courses);
        // var_dum($courses);
        $parent_list = [];
        foreach ($courses as $course) {
           $parent_list[$course->id] = $course->course_name;
        }
        return view('courses.create', ['parent_list' => $parent_list]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'course_name'       => 'required',
            'description'       => 'required',
            'parent_id'         => 'required|numeric'
        );

        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect('/courses/create')->withErrors($validator)->withInput();
        } else {
            // store
            $course = new Course;
            $course->course_name      = $request->input('course_name');
            $course->description      = $request->input('description');
            $course->parent_id        = $request->input('parent_id');
            $course->save();

            // redirect
            $request->session()->flash('message', 'Successfully created course!');
            return redirect('courses');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Course::find($id);
        $parent = $course->parent()->first();

        // chec if null, then it means the course doesn't have any dependency
        $parent_name = '';
        if($parent != null) {
            $parent_name = $parent->course_name;
        }else{
            $parent_name = 'Tidak memiliki dependensi course lain';
        }
        // Note, that we can pass multiple variables to view, 
        // any value that we pass to the array will be available as it's key in the views file
        // e.g : $parent_name variable will be known as $my_parent inside our *.blade.php file
        // for simplicity, it's is very common to use the same variable name to avoid confussion
        // In the next line, I use not an ordinary way just because I want 
        // to show you that you can perform somehitng like what I do in the next line
        return view('courses.show', ['course' => $course, 'my_parent' => $parent_name]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Format the courses into a form accepted by Laravel's form helper'
        // Note : you can use var_dump / echo / print_r  function to "debug" some variable
        // echo $courses; 
        // print_r($courses);
        // var_dum($courses);
        $courses = Course::all();
        $parent_list = [];
        foreach ($courses as $course) {
           $parent_list[$course->id] = $course->course_name;
        }

        // find the course which we want to edit
        $course = Course::find($id);

        return view('courses.edit', ['course' => $course,'parent_list' => $parent_list]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // See.. there's a lot of just "copy and paste" thing in laravel
        // off course you need some minor adjustment for different chunk of code
        // in this case, instead of creating a course, we find the relevant course, and "edit" it then save it
        $rules = array(
            'course_name'       => 'required',
            'description'       => 'required',
            'parent_id'         => 'required|numeric'
        );

        $validator = Validator::make($request->all(), $rules);

        // process the validation
        if ($validator->fails()) {
            return redirect('/courses/create')->withErrors($validator)->withInput();
        } else {
            // store
            // These next few lines are different from a chunk of code in `store()` function
            $course = Course::find($id);
            $course->course_name      = $request->input('course_name');
            $course->description      = $request->input('description');
            $course->parent_id        = $request->input('parent_id');
            $course->save();

            // redirect
            $request->session()->flash('message', 'Successfully created course!');
            return redirect('courses');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete
        $course = Course::find($id);
        $course->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the Course!');
        return redirect('courses');
    }
}
