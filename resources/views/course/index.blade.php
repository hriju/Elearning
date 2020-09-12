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

                            <div class="row">
                                <div class="col-md-12">List of Course</div>
                                @foreach($course as $c)
                                <li><a href="courses/1">{{$c->title}}</a></li>
                               @endforeach
                            </div>


                    </div>
                </div>
            </div>
        </div>
    </div>