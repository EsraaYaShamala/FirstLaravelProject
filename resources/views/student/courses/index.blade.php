@extends('student.layout.master')

@section('title')
    List Courses TimeLine
@endsection

@section('content')
    @include('admin.layout.messages')
  @foreach(\Illuminate\Support\Facades\Auth::user()->courses as $course)
   <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">{{$course->name}}</h6>
                        <div id="content">
                            <ul class="timeline">
                                @if($course->assignments->isEmpty())
                                    <li>
                                        <h3 class="title">No Assignments</h3>
                                        <p>No assignments register for this course.</p>
                                    </li>
                                @else
                                    @php
                                        $sortedAssignments = $course->assignments->sortBy('due_date');
                                    @endphp
                                    @foreach($sortedAssignments as $assignment)
                                            <li class="event" data-date="{{$assignment->due_date}}">
                                                <h3 class="title">{{$assignment->title}}</h3>
                                                <p>{{$assignment->details}}.</p>
                                                @if($assignment->answers->isEmpty())
                                                    <form method="post" enctype="multipart/form-data" action="{{route('answer.store',$assignment->id)}}">
                                                        @csrf
                                                        <br>
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <h6 class="card-title">Select File</h6>
                                                                <input type="file" id="myDropify" name="answer"/>
                                                                <input type="submit" id="submit" name="submit" value="save"/>
                                                                @error('answer')
                                                                <div class="alert alert-danger" role="alert">
                                                                    <i data-feather="alert-circle"></i>
                                                                    {{$message}}
                                                                </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </form>
                                                @else
                                                    <br>
                                                    <div class="alert alert-fill-info" role="alert">
                                                        You Upload Answers !
                                                    </div>
                                                @endif
                                            </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   <br><br>
   @endforeach
    </div>

@endsection
