@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h4>{{ __('Lesson List') }}</h4></div>

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
                                <a style="margin: 19px;" href="{{ route('manageLesson.create') }}" class="btn btn-primary">New Lesson</a>
                            </div>
                            <div class="row">
                                <table id="course_table" class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Lesson Title</th>
                                        <th>Lesson Description</th>
                                        <th>Course Id</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($lessons as $lesson)
                                    <tr>
                                        <td>
                                            {{$lesson->lesson_title}}
                                        </td>
                                        <td>
                                            {{$lesson->lesson_desc}}
                                        </td>
                                        <td>
                                            {{$lesson->course->title}}
                                        </td>
                                        <td>
                                           @if($lesson->status==1)
                                               Active
                                           @else
                                               Inactive
                                           @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('manageLesson.edit',$lesson->id) }}" class="btn btn-primary">Edit</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('manageLesson.destroy',$lesson->id) }}" method="post">
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
