<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Course;
Use App\Models\Lesson;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $course=Course::latest()->get();
        return view('course.index',['course'=>$course]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('course.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'status'=>'required'
        ]);
        $course = new Course([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'status' => $request->get('status')

        ]);
        $course->save();
        return redirect('/manageCourse')->with('success', 'Course saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $course_lesson=Lesson::where('course_id',$id)->get();
        //dd($course_lesson);
        return view('course.show',['lessons'=>$course_lesson]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $course = Course::find($id);
        return view('course.edit', compact('course'));
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
        //
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'status'=>'required'
        ]);
        $course = Course::find($id);
        $course->title =  $request->get('title');
        $course->description = $request->get('description');
        $course->status = $request->get('status');
        $course->save();
        return redirect('/manageCourse')->with('success', 'Course updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //write code for deleting that particular row
        $course = Course::find($id);
        $course->delete();
        return redirect('/manageCourse')->with('success', 'Course deleted!');
    }
}
