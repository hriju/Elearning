@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h5><strong>Course:</strong>{{$data['course']}}</h5></div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-md-12">List of Lessons</div>
                            <ul>
                            @if(!$lessons->isEmpty())
                                @foreach($lessons as $lesson)
                                    <li><a href="lesson/{{$lesson->id}}">{{$lesson->lesson_title}}</a></li>
                                   {{-- @if($course=1)
                                        (Completed)
                                    @endif--}}
                                @endforeach
                            @else
                                <li>   No Lesson found</li>
                            @endif
                            </ul>

                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
