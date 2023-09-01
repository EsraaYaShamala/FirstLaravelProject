@extends('student.layout.master')

@section('title')
    List Unresolved Assidnments
@endsection

@section('content')
    @include('admin.layout.messages')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @foreach($assignments as $assignment)
                        <h3 class="text-instagram">{{$assignment->course->name}}</h3>
                        <h6 class="card-title">{{$assignment->title}}</h6>
                        <div class="accordion" id="FaqAccordion">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        {{$assignment->details}}
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#FaqAccordion">
                                    <div class="accordion-body">
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
                                    </div>
                                    <div class="accordion-body">
{{--                                        <form action="{{route('answer.destroy',$answer)}}" method="post" >--}}
{{--                                            @csrf--}}
{{--                                            @method('delete')--}}
{{--                                            <button type="submit" class="btn btn-danger btn-sm" >Delete File</button>--}}
{{--                                        </form>--}}
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
