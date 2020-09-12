@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h4>{{ __('Course List') }}</h4></div>

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
                                <a style="margin: 19px;" href="{{ route('manageCourse.create') }}" class="btn btn-primary">New Course</a>
                            </div>
                            <div class="row">
                                <table id="course_table" class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Course Title</th>
                                        <th>Course Description</th>
                                        <th>Course Status</th>
                                        <th>Actions</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($course as $c)
                                    <tr>
                                        <td>
                                            {{$c->title}}
                                        </td>
                                        <td>
                                            {{$c->description}}
                                        </td>
                                        <td>
                                           @if($c->status==1)
                                               Active
                                           @else
                                               Inactive
                                           @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('manageCourse.edit',$c->id) }}" class="btn btn-primary">Edit</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('manageCourse.destroy',$c->id) }}" method="post">
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
