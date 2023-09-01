
@extends('admin.layout.master')

@section('title')
    List Users
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
                                <th>is Teacher</th>
                                <th class="">Courses</th>
                                <th>Image</th>
                                <th class="">Function</th>
                            </tr>
                            </thead>
                            <tbody class="table-group-divider " id="tbody">
                            @if(isset($users))
                                @foreach($users as $user)
                                    <tr>
                                        <td class=" ">{{$user->name}}</td>
                                        <td class=" ">{{$user->email}}</td>
                                        <td class="">{{$user->is_teacher}}</td>
                                        <td class="">
                                        @if((!$user->courses->isEmpty()))
                                            @foreach($user->courses as $course)
                                                <li>{{$course->name}}</li>
                                            @endforeach
                                        @else
                                            {{'NO Courses Register'}}
                                        @endif
                                        </td>
                                        <td class=""><img alt="User" src="{{asset('user_images/'.$user->image)}}" width="50px"></td>
                                        <td class="">
                                            <div class="btn-group btn-group-sm" role="group" aria-label="Small button group">
                                                <a type="button" class="btn btn-secondary btn-sm"  href="{{route('user.show',$user)}}">View</a>
                                                <a type="button" class="btn btn-primary btn-sm" href="{{route('user.edit',$user)}}">Edit</a>
                                                <form action="{{route('user.destroy',$user)}}" method="post" >
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
{{--@push('javascript')--}}


{{--    <script type="text/javascript">--}}

{{--        table= $(document).ready(function () {--}}
{{--            $.noConflict();--}}
{{--            $('dataTableExample').DataTable({--}}
{{--                processing :true,--}}
{{--                serverSide: true,--}}
{{--                order:[--}}
{{--                    [2,'desc']--}}
{{--                ],--}}
{{--                ajax:'{!! route('products.all') !!}',--}}
{{--                column:[--}}
{{--                    {--}}
{{--                        data :'name',--}}
{{--                        name:'name'--}}
{{--                    },--}}
{{--                    {--}}
{{--                        data :'price',--}}
{{--                        name:'price'--}}
{{--                    },--}}
{{--                    {--}}
{{--                        data :'views',--}}
{{--                        name:'views'--}}
{{--                    },--}}
{{--                    {--}}
{{--                        data :'size',--}}
{{--                        name:'size'--}}
{{--                    },--}}
{{--                    {--}}
{{--                        data :'isFeatured',--}}
{{--                        name:'isFeatured'--}}
{{--                    },--}}
{{--                    {--}}
{{--                        data :'cat_id',--}}
{{--                        name:'cat_id'--}}
{{--                    },--}}
{{--                    {--}}
{{--                        data :'description',--}}
{{--                        name:'description'--}}
{{--                    },--}}
{{--                    {--}}
{{--                        data :'image',--}}
{{--                        name:'image'--}}
{{--                    },--}}
{{--                    {--}}
{{--                        data :'function',--}}
{{--                        name:'function',--}}
{{--                    }--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}
{{--@endpush--}}
