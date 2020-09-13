<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\completed_lesson;
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
        $course_title=Course::where('id',$id)->select('title')->pluck('title');
        $completed=completed_lesson::where('lesson_id',$id)->where('user_id',Auth::user()->id)->pluck('is_completed');
        //dd($completed);

        //dd($lesson_title);
        $question=Question::where('lesson_id',$id)->get();
        //dd($course_lesson);
        return view('lesson.show',['questions'=>$question],['lesson_name'=>$lesson_title])->with('data',[
            'course'=>$course_title[0],
            'completed'=>$completed[0],
            'id'=>$id]);
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

    /**
     * Submit questions
     */
    public function submit(Request $request,$id)
    {
        $request->validate([
            'question_1'=>'required',
            'question_2'=>'required',
            'question_3'=>'required',
            'question_4'=>'required',
            'question_5'=>'required',
            'question_6'=>'required',
            'question_7'=>'required',
            'question_9'=>'required',
            'question_10'=>'required'
        ]);
        $db_records =Question::where('lesson_id',$id)->pluck('answer')->toArray();
        $incoming_request =$request->all();
        $request=array_shift($incoming_request);
        foreach($db_records as $key=>$val){
            $data[]=$val;
        }
        foreach($incoming_request as $k=>$v){
            $sata[]=$v;
        }

        if($data==$sata){
         $completed=new completed_lesson([
             'lesson_id'=>$id,
             'user_id'=>Auth::user()->id,
             'is_completed'=>1

         ]);
         $completed->save();
        return redirect('/course/lesson/'.$id)->with('success', 'Lesson Completed!');
        }
        else{
            return redirect('/course/lesson/'.$id)->with('failed', 'Sorry You did not pass, Please try again');
        }
      /*

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
        return redirect('/manageQuestion')->with('success', 'Question Inserted!');*/
    }
}
