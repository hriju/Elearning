@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h4>{{ __('Lesson') }}</h4></div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-sm-8 offset-sm-2">
                                <h4>Update Lesson</h4>
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
                                <form method="post" action="{{ route('manageLesson.update', $lesson->id) }}">
                                    @method('PATCH')
                                    @csrf
                                    <div class="form-group">
                                        <label for="title">Lesson Title:</label>
                                        <input type="text" class="form-control" name="lesson_title" value="{{ $lesson->lesson_title }}" />
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description:</label>
                                        <textarea class="form-control" name="lesson_desc" rows="5" id="lesson_desc" >{{ $lesson->lesson_desc }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="course_id">Select Course:</label>
                                        <select class="form-control" name="course_id" id="course_id">

                                                @foreach($course as $c)
                                                    <option value="{{$c->id}}" {{ $lesson->course_id==$c->id?'selected':'' }}>{{$c->title}}</option>
                                                @endforeach

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Status:</label>
                                        <select class="form-control" name="status" id="status">
                                            <option value="1" {{ $lesson->status==1?'selected':'' }}>Active</option>
                                            <option value="0" {{ $lesson->status==0?'selected':'' }}>Inactive</option>

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

