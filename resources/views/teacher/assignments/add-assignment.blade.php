
@extends('teacher.layout.master')

@section('title')
    Add Assignment
@endsection
@section('content')

    @include('admin.layout.messages')

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add Assigment </h4>
                    <form id="signupForm" method="post" action="{{route('assignment.store')}}" >
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Title</label>
                            <input id="name" class="form-control " name="title" type="text" value="{{old('title')}}">
                            @error('title')
                            <div class="alert alert-danger" role="alert">
                                <i data-feather="alert-circle"></i>
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Due_Date</label>
                            <input id="name" class="form-control " name="date" type="date" value="{{old('date')}}">
                            @error('date')
                            <div class="alert alert-danger" role="alert">
                                <i data-feather="alert-circle"></i>
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Details</label>
                            <input id="name" class="form-control " name="detail" type="text" value="{{old('detail')}}">
                            @error('detail')
                            <div class="alert alert-danger" role="alert">
                                <i data-feather="alert-circle"></i>
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label class="form-check-label" for="form-check mb-2">Select Course</label>
                            @foreach($courses as $course)
                                <div class="form-check form-check-inline">
                                        <label class="form-check-label" >
                                            <input type="radio" class="form-check-input" id="{{$course->id}}" name="course_id[]" value="{{$course->id}}">
                                            {{$course->name}}</label>
                                </div>
                            @endforeach
                            @error('course_id[]')
                            <div class="alert alert-danger" role="alert">
                                <i data-feather="alert-circle"></i>
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <br><br>
                        <input class="btn btn-primary" type="submit" value="Create new Assignment" name="submit">
                    </form>

                </div>
            </div>
        </div>
    </div>
    </div>

@endsection
