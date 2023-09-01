
@if(\Illuminate\Support\Facades\Session::has('success'))
    <div class="alert alert-success" role="alert">
        <i data-feather="alert-circle"></i>
        {{\Illuminate\Support\Facades\Session::get('success')}}
    </div>
@endif

@if(\Illuminate\Support\Facades\Session::has('error'))
    <div class="alert alert-danger" role="alert">
        <i data-feather="alert-circle"></i>
        {{\Illuminate\Support\Facades\Session::get('error')}}
    </div>
@endif

{{--@if($errors->any())--}}
{{--    <div class="alert alert-success" role="alert">--}}
{{--    @foreach($errors->all() as $error)--}}
{{--        <i data-feather="alert-circle"></i>--}}
{{--            {{$error}}--}}
{{--    @endforeach--}}
{{--    </div>--}}
{{--@endif--}}
