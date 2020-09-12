@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h4>{{ __('Lessons') }}</h4></div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-sm-8 offset-sm-2">
                                <h4>Add a Lesson</h4>
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
                                    <form method="post" action="{{ route('manageLesson.store') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="lesson_title">Lesson Title:</label>
                                            <input type="text" class="form-control" name="lesson_title"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="lesson_desc">Description:</label>
                                            <textarea class="form-control" name="lesson_desc" rows="5" id="lesson_desc"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="course_id">Select Course:</label>
                                            <select class="form-control" name="course_id" id="course_id">
                                                @foreach($course as $c)
                                                <option value="{{$c->id}}">{{$c->title}}</option>
                                                @endforeach
                                            </select>
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
