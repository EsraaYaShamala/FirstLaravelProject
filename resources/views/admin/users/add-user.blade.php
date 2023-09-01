
@extends('admin.layout.master')

@section('title')
    Add User
@endsection
@section('content')

    @include('admin.layout.messages')

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add User </h4>
                    <form id="signupForm" method="post" action="{{route('user.store')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input id="name" class="form-control " name="name" type="text" value="{{old('name')}}">
                            @error('name')
                            <div class="alert alert-danger" role="alert">
                                <i data-feather="alert-circle"></i>
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input id="email" class="form-control " name="email" type="email" value="{{old('email')}}">
                            @error('email')
                            <div class="alert alert-danger" role="alert">
                                <i data-feather="alert-circle"></i>
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input id="password" class="form-control " name="password" type="password">
                            @error('password')
                            <div class="alert alert-danger" role="alert">
                                <i data-feather="alert-circle"></i>
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">IS Teacher</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" name="isTeacher" id="yes" value="1">
                                    <label class="form-check-label" for="yes">1</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" name="isTeacher" id="no" value="0">
                                    <label class="form-check-label" for="no">0</label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-check-label" for="form-check mb-2">Select Courses</label>
                            @foreach($courses as $course)
                                <div class="list-group">
                                    <label class="list-group-item" >
                                    <input type="checkbox" class="form-check-input me-1" id="{{$course->id}}" name="course_id[]" value="{{$course->id}}">
                                        {{$course->name}}</label>
                                </div>
                            @endforeach
                            @error('course_id')
                            <div class="alert alert-danger" role="alert">
                                <i data-feather="alert-circle"></i>
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="col-md-6 stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="card-title">Select Image</h6>
                                    <input type="file" id="myDropify" name="user_image"/>
                                    @error('user_image')
                                    <div class="alert alert-danger" role="alert">
                                        <i data-feather="alert-circle"></i>
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <br><br>
                        <input class="btn btn-primary" type="submit" value="Create new User" name="submit">
                    </form>

                </div>
            </div>
        </div>
    </div>
    </div>

@endsection
