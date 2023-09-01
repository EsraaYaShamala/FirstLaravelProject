
@extends('teacher.layout.master')

@section('title')
    List Assignment
@endsection

@section('content')
    @include('admin.layout.messages')

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Data Assignment Table</h6>
                    <div class="table-sm">
                        <table id="dataTableExample" class="table ms-1" >
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>due_date</th>
                                <th>details</th>
                                <th>Course</th>
                                <th class="">Function</th>
                            </tr>
                            </thead>
                            <tbody class="table-group-divider " id="tbody">
                            @if(isset($assignments))
                                @foreach($assignments as $assignment)
                                    <tr>
                                        <td class=" ">{{$assignment->id}}</td>
                                        <td class=" ">{{$assignment->title}}</td>
                                        <td class=" ">{{$assignment->due_date}}</td>
                                        <td class=" ">{{$assignment->details}}</td>
                                        <td class="">
                                            @if($assignment->course!==null)
                                                {{$assignment->course->name}}
                                            @endif
                                        </td>
                                        <td class="">
                                            <div class="btn-group btn-group-sm" role="group" aria-label="Small button group">
                                                <a type="button" class="btn btn-secondary btn-sm"  href="{{route('assignment.create',$assignment)}}">Add Assignment</a>
                                                <a type="button" class="btn btn-secondary btn-sm"  href="{{route('teacher_course.show',$assignment)}}">View</a>
                                                <a type="button" class="btn btn-primary btn-sm" href="{{route('teacher_course.edit',$assignment)}}">Edit Course Assignments</a>
                                                <form action="{{route('teacher_course.destroy',$assignment)}}" method="post" >
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

