@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                    <div class="lessson">Lesson: {{$lesson_name[0]}}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if(!$questions->isEmpty())
                            <div class="row">
                                <label>Please answer the following Questions</label>
                            </div>
                                <form>
                                    @foreach($questions as $question)
                                    <div class="form-group">
                                        <label for="{{$question->id}}">{{$question->id}}. {{$question->question_title}}</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="{{$question->id}}" id="option1" value=" {{$question->option_1}}" >
                                            <label class="form-check-label" for="option1">
                                                {{$question->option_1}}
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="{{$question->id}}" id="option2" value=" {{$question->option_2}}" >
                                            <label class="form-check-label" for="option2">
                                                {{$question->option_2}}
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="{{$question->id}}" id="option3" value=" {{$question->option_3}}" >
                                            <label class="form-check-label" for="option3">
                                                {{$question->option_3}}
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="{{$question->id}}" id=" {{$question->option_4}}" value="" >
                                            <label class="form-check-label" for="option4">
                                                {{$question->option_4}}
                                            </label>
                                        </div>
                                    </div>
                                    @endforeach
                                    <button type="submit" class="btn btn-primary">Submit</button>
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
