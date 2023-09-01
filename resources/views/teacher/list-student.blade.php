
@extends('teacher.layout.master')

@section('title')
    List Students
@endsection

@section('content')


    @include('admin.layout.messages')

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Data Users Table</h6>
                    <div class="table-sm">
                        <table id="dataTableExample" class="table ms-1" >
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Image</th>
                                <th>Courses</th>
                                <th>Assignment</th>
{{--                                <th class="">Function</th>--}}
                            </tr>
                            </thead>
                            <tbody class="table-group-divider " id="tbody">
                            @if($students=\App\Models\User::where('is_teacher',0)->get())
                                @foreach($students as $student)
                                    <tr>
                                        <td class=" ">{{$student->name}}</td>
                                        <td class=" ">{{$student->email}}</td>
                                        <td class=""><img alt="User" src="{{asset('user_images/'.$student->image)}}" width="50px"></td>
                                        <td class="">
                                            @if((!$student->courses->isEmpty()))
                                                @foreach($student->courses as $course)
                                                    <li>{{$course->name}}</li>
                                                @endforeach
                                            @else
                                                {{'NO Courses Register'}}
                                            @endif
                                        </td>
                                        <td class="">
                                            @if(!$student->courses->isEmpty())
                                                <ul>
                                                    @foreach($student->courses as $course)
                                                        @if(!$course->assignments->isEmpty() )
                                                            <li>Assignments for {{ $course->name }}:</li>
                                                            <ul>
                                                                @foreach($student->assignments as $assignment)
                                                                    <li>{{ $assignment->title }}</li>
                                                                @endforeach
                                                            </ul>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            @else
                                                {{ 'Have not assignment' }}
                                            @endif
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
