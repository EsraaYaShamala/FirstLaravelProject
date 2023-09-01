
@if(\Illuminate\Support\Facades\Auth::user()->name=='admin')
    @extends('admin.layout.master')
@else
    @extends('teacher.layout.master')
@endif
    @section('title')
    Add Course
@endsection
@section('content')

    @include('admin.layout.messages')

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add Course </h4>
                    <form id="signupForm" method="post" action="{{route('course.store')}}" >
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
                        <br><br>
                        <input class="btn btn-primary" type="submit" value="Create new Course" name="submit">
                    </form>

                </div>
            </div>
        </div>
    </div>
    </div>

@endsection
