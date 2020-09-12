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
                            <div class="col-sm-12">
                                @if(session()->get('success'))
                                    <div class="alert alert-success">
                                        {{ session()->get('success') }}
                                    </div>
                                @endif
                            </div>
                            <div>
                                <a style="margin: 19px;" href="{{ route('manageQuestion.create') }}" class="btn btn-primary">New Question</a>
                            </div>
                            <div class="row">
                                <table id="course_table" class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Question Title</th>
                                        <th>Lesson id</th>
                                        <th>Option 1</th>
                                        <th>Option 2</th>
                                        <th>Option 3</th>
                                        <th>Option 4</th>
                                        <th>Answer</th>
                                        <th>status</th>
                                        <th>Actions</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($questions as $question)
                                    <tr>
                                        <td>
                                            {{$question->question_title}}
                                        </td>
                                        <td>
                                            {{$question->lesson->lesson_title}}
                                        </td>
                                        <td>
                                            {{$question->option_1}}
                                        </td>
                                        <td>
                                            {{$question->option_2}}
                                        </td>
                                        <td>
                                            {{$question->option_3}}
                                        </td>
                                        <td>
                                            {{$question->option_4}}
                                        </td>
                                        <td>
                                            {{$question->answer}}
                                        </td>
                                        <td>
                                           @if($question->status==1)
                                               Active
                                           @else
                                               Inactive
                                           @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('manageQuestion.edit',$question->id) }}" class="btn btn-primary">Edit</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('manageQuestion.destroy',$question->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit">Delete</button>
                                            </form>
                                        </td>

                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
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
