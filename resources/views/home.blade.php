@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (Auth::user()->role=='admin')
                      <div class="row">
                          <div class="col-md-4"><a href="{{route('manageCourse.index')}}">Manage Course</a></div>
                          <div class="col-md-4"><a href="{{route('manageLesson.index')}}">Manage Lesson</a></div>
                          <div class="col-md-4"><a href="{{route('manageQuestion.index')}}">Manage Question</a></div>
                      </div>
                     @else
                            <div class="row">

                                    <div class="col-md-12">List of Course</div>
                                    <ul>
                                    @foreach($course as $c)
                                        <li><a href="course/{{$c->id}}">{{$c->title}}</a></li>
                                    @endforeach
                                    </ul>
                            </div>
                        @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
