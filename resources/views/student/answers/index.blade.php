@extends('student.layout.master')

@section('title')
    List Answered Assidnments
@endsection

@section('content')
    @include('admin.layout.messages')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @foreach($answers as $answer)
                        @dd($answer->toArray())
                        <h3 class="text-instagram">{{$answer->assignment->course->name}}</h3>
                        <h6 class="card-title">{{$answer->assignment->title}}</h6>
                        <div class="accordion" id="FaqAccordion">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        {{$answer->assignment->details}}
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#FaqAccordion">
                                    <div class="accordion-body">
                                        <a href="{{ route('download',$answer->file_path) }}">Download File</a>
                                    </div>
                                    <div class="accordion-body">
                                        <form action="{{route('answer.destroy',$answer)}}" method="post" >
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm" >Delete File</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
