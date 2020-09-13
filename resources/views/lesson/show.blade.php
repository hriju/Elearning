@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"> <h5>  <strong>Course:</strong>{{$data['course']}}  <strong>Lesson:</strong>  {{$lesson_name[0]}}</h5></div>
                    @if($completed=1)
                        <div class="alert-success">Completed</div>
                    @endif
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                            <div class="col-sm-12">
                                @if(session()->get('success'))
                                    <div class="alert alert-success">
                                        {{ session()->get('success') }}
                                    </div>
                                @endif
                                @if(session()->get('failed'))
                                    <div class="alert alert-danger">
                                        {{ session()->get('failed') }}
                                    </div>
                                @endif
                            </div>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div><br />
                            @endif

                        @if(!$questions->isEmpty())
                            <div class="row">
                                <label>Please answer the following Questions</label>
                            </div>
                                <form  method="POST" action="{{route('submitQuestion','1')}}">
                                    @csrf
                                   {{-- <input type="hiddedn" name="id" value="{{data['id']}}">--}}
                                    @php
                                        $i=1
                                    @endphp
                                    @foreach($questions as $question)
                                    <div class="form-group">
                                        <label for="question_{{$i}}">{{$i}}. {{$question->question_title}}</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="question_{{$i}}" id="option1" value=" {{$question->option_1}}" >
                                            <label class="form-check-label" for="option1">
                                                {{$question->option_1}}
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="question_{{$i}}" id="option2" value=" {{$question->option_2}}" >
                                            <label class="form-check-label" for="option2">
                                                {{$question->option_2}}
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="question_{{$i}}" id="option3" value=" {{$question->option_3}}" >
                                            <label class="form-check-label" for="option3">
                                                {{$question->option_3}}
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="question_{{$i}}" id=" {{$question->option_4}}" value="" >
                                            <label class="form-check-label" for="option4">
                                                {{$question->option_4}}
                                            </label>
                                        </div>
                                    </div>
                                        @php
                                            $i++
                                        @endphp
                                    @endforeach
                                    @if($completed=0)

                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    @else
                                        <button type="submit" class="btn btn-primary" disabled>Submit</button>
                                        (You have already completed this lesson)
                                    @endif
                                </form>
                            @else
                                <div> No questions found</div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
