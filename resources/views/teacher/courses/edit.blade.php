
@extends('teacher.layout.master')

@section('title')
    Edit Course
@endsection
@section('content')

    @include('admin.layout.messages')

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Course </h4>

                    <form id="signupForm" method="post" action=" {{ route ( 'teacher_course.update',$course) }} ">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input id="name" class="form-control " name="name" type="text" value="{{$course->name}}">
                            @error('name')
                            <div class="alert alert-danger" role="alert">
                                <i data-feather="alert-circle"></i>
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-check-label" for="form-check mb-2">Select Assignment</label>
                            @foreach($assignments as $assignment)
                                <div class="list-group">
                                    <label class="list-group-item" >
                                        <input type="checkbox" class="form-check-input me-1" id="{{$assignment->id}}" name="assignment_id[]"
                                               value="{{$assignment->id}}" {{$course->assignments-> contains($assignment)?'checked':''}}>
                                        {{$assignment->title}}</label>
                                </div>
                            @endforeach
                            @error('assignment_id[]')
                            <div class="alert alert-danger" role="alert">
                                <i data-feather="alert-circle"></i>
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <input  class="btn btn-primary" type="submit" value="Update Course" name="submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection

