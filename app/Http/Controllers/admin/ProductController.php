<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Category;
use App\Models\Product;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::all();
        return view('admin/products/index',compact('products'));
    }

    public function getProductDataTable(){
        $query=Product::all();
        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('function',function ($row){
                return $buttons='
                    <div class="btn-group btn-group-sm" role="group" aria-label="Small button group">
                                                <a type="button" class="btn btn-secondary btn-sm"  href="{{route(\'admin.product.show\','.$row->id.')}}">View</a>
                                                <a type="button" class="btn btn-primary btn-sm" href="{{route(\'admin.product.edit\','.$row->id.')}}">Edit</a>
                                                <form action="{{route(\'admin.product.destroy\','.$row->id.')}}" method="post" >
                                                    @csrf
                                                    @method(\'delete\')
                                                <button type="submit" class="btn btn-danger btn-sm" >Delete</button>
                                                </form>
                                         </div>
                ';
            })
            ->rawColumns(['function'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        return view('admin/products/add-product',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductStoreRequest $request)
    {
//        $request->validate([
//            'name'=> 'required|string|max:20',
//            'price'=> 'required|integer',
//            'size'=> 'required|string',
//            'cat_id'=> 'required|integer'
//        ]);

//        dd($request->toArray());
        $size=$request->input('size');
        $size=json_encode($size);
        $product=new Product();
        $product->name=$request->name;
        $product->price=$request->price;
        $product->views=0;
        $product->size=$size;
        $product->isFeatured=$request->isFeatured;
        $product->cat_id=$request->cat_id;
        $product->description=$request->description;
        $product->save();
        return redirect()->route('product.index')->with('success','The Product has been added successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories=Category::all();
        return view('admin/products/edit-product',compact('categories','product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdateRequest $request, Product $product)
    {
//        dd($request);
        $size=$request->input('size');
        $size=json_encode($size);
        $product->name=$request->name;
        $product->price=$request->price;
        $product->views=$request->views;
        $product->size=$size;
        $product->isFeatured=$request->isFeatured;
        $product->cat_id=$request->cat_id;
        $product->description=$request->description;
        $product->save();
        return redirect()->route('product.index')->with('success','The Product has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index')->with('success','The Product has been deleted successfully');
    }
}
