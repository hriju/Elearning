<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $question=Question::latest()->get();
        return view('question.index',['questions'=>$question]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $lessons=lesson::all();
        return view('question.create',["lessons"=>$lessons]);
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
            'question_title'=>'required',
            'lesson_id'=>'required',
            'option_1'=>'required',
            'option_2'=>'required',
            'option_3'=>'required',
            'option_4'=>'required',
            'answer'=>'required',
            'status'=>'required'
        ]);
        $question = new Question([
            'question_title' => $request->get('question_title'),
            'lesson_id' => $request->get('lesson_id'),
            'option_1' => $request->get('option_1'),
            'option_2' => $request->get('option_2'),
            'option_3' => $request->get('option_3'),
            'option_4' => $request->get('option_4'),
            'answer' => $request->get('answer'),
            'status' => $request->get('status')

        ]);
        $question->save();
        return redirect('/manageQuestion')->with('success', 'Question Inserted!');
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
        $lesson=Lesson::all();
        $question = Question::find($id);
        return view('question.edit', compact('question'),['lesson'=>$lesson]);
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
            'question_title'=>'required',
            'lesson_id'=>'required',
            'option_1'=>'required',
            'option_2'=>'required',
            'option_3'=>'required',
            'option_4'=>'required',
            'answer'=>'required',
            'status'=>'required'
        ]);
        $question = Question::find($id);
        $question->question_title =  $request->get('question_title');
        $question->lesson_id = $request->get('lesson_id');
        $question->option_1 = $request->get('option_1');
        $question->option_2 = $request->get('option_2');
        $question->option_3 = $request->get('option_3');
        $question->option_4 = $request->get('option_4');
        $question->answer = $request->get('answer');
        $question->status = $request->get('status');
        $question->save();
        return redirect('/manageQuestion')->with('success', 'Question updated!');
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
        $question = Question::find($id);
        $question->delete();
        return redirect('/manageQuestion')->with('success', 'Question deleted!');
    }



}
