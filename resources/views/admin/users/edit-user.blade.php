
@extends('admin.layout.master')

@section('title')
    EditUser
@endsection
@section('content')

    @include('admin.layout.messages')

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit User </h4>

                    <form id="signupForm" method="post" enctype="multipart/form-data" action=" {{ route ( 'user.update', $user ) }} ">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input id="name" class="form-control " name="name" type="text" value="{{$user->name}}">
                            @error('name')
                            <div class="alert alert-danger" role="alert">
                                <i data-feather="alert-circle"></i>
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input id="email" class="form-control " name="email" type="email" value="{{$user->email}}">
                            @error('email')
                            <div class="alert alert-danger" role="alert">
                                <i data-feather="alert-circle"></i>
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="current_password" class="form-label">Current Password</label>
                            <input id="current_password" class="form-control " name="current_password" type="password">
                            @error('current_password')
                            <div class="alert alert-danger" role="alert">
                                <i data-feather="alert-circle"></i>
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="new_password" class="form-label">New Password</label>
                            <input id="new_password" class="form-control " name="new_password" type="password">
                            @error('new_password')
                            <div class="alert alert-danger" role="alert">
                                <i data-feather="alert-circle"></i>
                                {{$message}}
                            </div>
                            @enderror
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
                                    <input type="file" id="myDropify" name="image"/>
                                </div>
                            </div>
                        </div>

                        <input class="btn btn-primary" type="submit" value="Update User" name="submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection

