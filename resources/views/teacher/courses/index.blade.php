
@extends('teacher.layout.master')

@section('title')
    List Courses
@endsection

@section('content')


    @include('admin.layout.messages')

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Coursesrs Table</h6>
                    <div class="table-sm">
                        <table id="dataTableExample" class="table ms-1" >
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Related-Assignments</th>
                                <th class="">Function</th>
                            </tr>
                            </thead>
                            <tbody class="table-group-divider " id="tbody">
                            @if(isset(Auth::user()->courses))
                                @foreach(Auth::user()->courses as $course)
                                    <tr>
                                        <td class=" ">{{$course->id}}</td>
                                        <td class=" ">{{$course->name}}</td>
                                        <td class="">
                                            @if(!$course->assignments->isEmpty())
                                                @foreach($course->assignments as $assignment)
                                                    <li>{{$assignment->title}}</li>
                                                @endforeach
                                            @else
                                                {{'NO Assignment Register'}}
                                            @endif
                                        </td>
                                        <td class="">
                                            <div class="btn-group btn-group-sm" role="group" aria-label="Small button group">
                                                <a type="button" class="btn btn-secondary btn-sm"  href="{{route('assignment.create',$course)}}">Add Assignment</a>
                                                <a type="button" class="btn btn-secondary btn-sm"  href="{{route('teacher_course.show',$course)}}">View</a>
                                                <a type="button" class="btn btn-primary btn-sm" href="{{route('teacher_course.edit',$course)}}">Edit Course Assignments</a>
                                                <form action="{{route('teacher_course.destroy',$course)}}" method="post" >
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger btn-sm" >Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

