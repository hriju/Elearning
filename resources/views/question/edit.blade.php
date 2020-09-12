@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h4>{{ __('Question Board') }}</h4></div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-sm-8 offset-sm-2">
                                <h4>Update Question</h4>
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <br />
                                @endif
                                <form method="post" action="{{ route('manageQuestion.update', $question->id) }}">
                                    @method('PATCH')
                                    @csrf
                                   {{-- <div class="form-group">
                                        <label for="question_title">Question Title:</label>
                                        <input type="text" class="form-control" name="question_title" value={{ $question->question_title }} />
                                    </div>--}}
                                    <div class="form-group">
                                        <label for="question_title">Question Title:</label>
                                        <input type="text" class="form-control" name="question_title" value="{{ $question->question_title }}" />
                                    </div>

                                    <div class="form-group">
                                        <label for="lesson_id">Select Course:</label>
                                        <select class="form-control" name="lesson_id" id="lesson_id">

                                            @foreach($lesson as $l)
                                                <option value="{{$l->id}}" {{ $question->lesson_id==$l->id?'selected':'' }}>{{$l->lesson_title}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="title">Option 1:</label>
                                        <input type="text" class="form-control" name="option_1" value="{{ $question->option_1 }}" />
                                    </div>
                                    <div class="form-group">
                                        <label for="option_2">Option 2:</label>
                                        <input type="text" class="form-control" name="option_2" value="{{ $question->option_2 }}" />
                                    </div>
                                    <div class="form-group">
                                        <label for="option_3">Option 3:</label>
                                        <input type="text" class="form-control" name="option_3" value="{{ $question->option_3 }}" />
                                    </div>
                                    <div class="form-group">
                                        <label for="option_4">Option 4:</label>
                                        <input type="text" class="form-control" name="option_4" value="{{ $question->option_4 }}" />
                                    </div>
                                    <div class="form-group">
                                        <label for="answer">Answer</label>
                                        <input type="text" class="form-control" name="answer" value="{{ $question->answer }}" />
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Status:</label>
                                        <select class="form-control" name="status" id="status">
                                            <option value="1" {{ $question->status==1?'selected':'' }}>Active</option>
                                            <option value="0" {{ $question->status==0?'selected':'' }}>Inactive</option>

                                        </select>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Update</button>
                                </form>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

