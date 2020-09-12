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
                                <h4>Add a Question</h4>
                                <div>
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div><br />
                                    @endif
                                    <form method="post" action="{{ route('manageQuestion.store') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="question_title">Question Title:</label>
                                            <input type="text" class="form-control" name="question_title"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="lesson_id">Select Lesson:</label>
                                            <select class="form-control" name="lesson_id" id="lesson_id">
                                                @foreach($lessons as $lesson)
                                                    <option value="{{$lesson->id}}">{{$lesson->lesson_title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="option_1">Option 1:</label>
                                            <input type="text" class="form-control" name="option_1"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="option_2">Option 2:</label>
                                            <input type="text" class="form-control" name="option_2"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="option_3">Option 3:</label>
                                            <input type="text" class="form-control" name="option_3"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="option_4">Option 4:</label>
                                            <input type="text" class="form-control" name="option_4"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="answer">Answer:</label>
                                            <input type="text" class="form-control" name="answer"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="status">Status:</label>
                                            <select class="form-control" name="status" id="status">
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>

                                            </select>
                                        </div>
                                        <button class="btn btn-outline-primary" type="submit">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready( function () {
            $('#course_table').DataTable();
        } );
    </script>
@endsection
