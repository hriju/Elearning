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
                          <div class="col-md-4">Manage Course</div>
                          <div class="col-md-4">Manage Lesson</div>
                          <div class="col-md-4">Manage Question</div>
                      </div>
                     @else
                            <div class="row">

                                    <div class="col-md-12">List of Course</div>
                                    @foreach($course as $c)
                                        <li><a href="course/{{$c->id}}">{{$c->title}}</a></li>
                                    @endforeach

                            </div>
                        @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
