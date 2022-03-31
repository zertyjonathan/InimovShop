<?php

namespace App\Http\Controllers;

use App\Http\Requests\productRequest;
use App\Models\categorie;
use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('products');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $operation="create";
        return view('createUpdateProduct',compact('operation'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(productRequest $request)
    {

        $validated= $request->validated();
        
        if($request->file('product_fileimg')->isValid())
        {
            $name = $request->product_fileimg->getClientOriginalName();
            $request->product_fileimg->storeAs('/public/imageProduct', $name);
            
            $validated['product_fileimg']=$name;
        }

        // dd($validated);
        $product=product::create($validated);

        return response()->json($product);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        // dd($product);
        $product= product::find($product->id);
        dd($product->categories);
        // $categories->products;
        return response()->json($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        $operation="update";
        return view('createProduct',compact('operation','product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(productRequest $request, product $product)
    {
        return $request;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        //
    }
}
