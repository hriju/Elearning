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
                          <div class="col-md-4">Course</div>
                          <div class="col-md-4">Lesson</div>
                          <div class="col-md-4">Question</div>
                      </div>
                     @else
                            <div class="row">
                                <div class="col-md-12">List of Course</div>
                                <li><a href="courses/1">course 1</a></li>
                                <li><a href="courses/1">course 2</a></li>
                                <li><a href="courses/1">course 3</a></li>
                                <li><a href="courses/1">course 4</a></li>
                                <li><a href="courses/1">course 5</a></li>
                            </div>
                        @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
