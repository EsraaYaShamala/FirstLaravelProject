
@extends('admin.layout.master')

@section('title')
    List Product
@endsection

@section('content')


        @include('admin.layout.messages')

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Data Product Table</h6>
                        <div class="table-sm">
                            <table id="dataTableExample" class="table ms-1" >
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Views</th>
                                    <th class="text-lg-center">Classes</th>
                                    <th>isFeatured</th>
                                    <th>Caterory</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th class="text-lg-center">Function</th>
                                </tr>
                                </thead>
{{--                                {{ $dataTable->table() }}--}}
                                <tbody class="table-group-divider " id="tbody">

                                @foreach($products as $product)
                                    <tr>
                                        <td class=" ">{{$product->name}}</td>
                                        <td class=" ">{{$product->price}}</td>
                                        <td class=" ">{{$product->views}}</td>
                                        <td class=" ">{{$product->size}}</td>
                                        <td class=" text-lg-center">{{$product->isFeatured}}</td>
                                        <td class="">{{$product->category->type}}</td>
                                        <td class="   text-wrap">{{$product->description}}</td>
                                        <td class=" "><img alt="Product" src="{{$product->image}}" width="50px"></td>
                                        <td class="">
                                            <div class="btn-group btn-group-sm" role="group" aria-label="Small button group">
                                                <a type="button" class="btn btn-secondary btn-sm"  href="{{route('product.show',$product)}}">View</a>
                                                <a type="button" class="btn btn-primary btn-sm" href="{{route('product.edit',$product)}}">Edit</a>
                                                <form action="{{route('product.destroy',$product)}}" method="post" >
                                                    @csrf
                                                    @method('delete')
                                                <button type="submit" class="btn btn-danger btn-sm" >Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
@push('javascript')


    <script type="text/javascript">

        table= $(document).ready(function () {
        $.noConflict();
            $('dataTableExample').DataTable({
                processing :true,
                serverSide: true,
                order:[
                    [2,'desc']
                ],
                ajax:'{!! route('products.all') !!}',
                column:[
                    {
                        data :'name',
                        name:'name'
                    },
                    {
                        data :'price',
                        name:'price'
                    },
                    {
                        data :'views',
                        name:'views'
                    },
                    {
                        data :'size',
                        name:'size'
                    },
                    {
                        data :'isFeatured',
                        name:'isFeatured'
                    },
                    {
                        data :'cat_id',
                        name:'cat_id'
                    },
                    {
                        data :'description',
                        name:'description'
                    },
                    {
                        data :'image',
                        name:'image'
                    },
                    {
                        data :'function',
                        name:'function',
                    }
            });
        });


        {{--$.ajax({--}}
        {{--    type: 'GET',--}}
        {{--    url: {!! route('products.all') !!},--}}
        {{--    mimeType: 'json',--}}
        {{--    success: function(data) {--}}
        {{--        $.each(data, function(i, data) {--}}
        {{--            var body = "<tr>";--}}
        {{--            body    += "<td>" + data.name + "</td>";--}}
        {{--            body    += "<td>" + data.price + "</td>";--}}
        {{--            body    += "<td>" + data.views + "</td>";--}}
        {{--            body    += "<td>" + data.size + "</td>";--}}
        {{--            body    += "<td>" + data.isFeatured + "</td>";--}}
        {{--            body    += "<td>" + data.cat_id + "</td>";--}}
        {{--            body    += "<td>" + data.description + "</td>";--}}
        {{--            body    += "<td>" + data.image + "</td>";--}}
        {{--            // body    += "<td>" + data.image + "</td>";--}}
        {{--            body    += "</tr>";--}}
        {{--            $( "tbody" ).append(body);--}}
        {{--        });--}}
        {{--        /*DataTables instantiation.*/--}}
        {{--        $( "dataTableExample" ).DataTable();--}}
        {{--    },--}}
        {{--    error: function() {--}}
        {{--        alert('Fail!');--}}
        {{--    }--}}
        {{--});--}}
        {{--});--}}
        {{--}--}}
    </script>
@endpush
