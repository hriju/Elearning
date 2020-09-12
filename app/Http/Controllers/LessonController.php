<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\Question;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $lessons=Lesson::latest()->get();
        return view('lesson.index',['lessons'=>$lessons]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $course=Course::all();
        return view('lesson.create',['course'=>$course]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'lesson_title'=>'required',
            'lesson_desc'=>'required',
            'course_id'=>'required',
            'status'=>'required'
        ]);
        $lesson = new Lesson([
            'lesson_title' => $request->get('lesson_title'),
            'lesson_desc' => $request->get('lesson_desc'),
            'course_id' => $request->get('course_id'),
            'status' => $request->get('status')

        ]);
        $lesson->save();
        return redirect('/manageLesson')->with('success', 'Lesson Inserted!');

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
        $lesson_title=Lesson::where('id',$id)->select('lesson_title')->pluck('lesson_title');
        //dd($lesson_title);
        $question=Question::where('lesson_id',$id)->get();
        //dd($course_lesson);
        return view('lesson.show',['questions'=>$question],['lesson_name'=>$lesson_title]);
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
        $course=Course::all();
        $lesson = Lesson::find($id);
        return view('lesson.edit', compact('lesson'),['course'=>$course]);
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
            'lesson_title'=>'required',
            'lesson_desc'=>'required',
            'course_id'=>'required',
            'status'=>'required'
        ]);
        $lesson = Lesson::find($id);
        $lesson->lesson_title =  $request->get('lesson_title');
        $lesson->lesson_desc = $request->get('lesson_desc');
        $lesson->course_id = $request->get('course_id');
        $lesson->status = $request->get('status');
        $lesson->save();
        return redirect('/manageLesson')->with('success', 'Lesson updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        //write code for deleting that particular row
        $lesson = Lesson::find($id);
        $lesson->delete();
        return redirect('/manageLesson')->with('success', 'Lesson deleted!');
    }
}
