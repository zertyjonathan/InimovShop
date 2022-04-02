<?php

namespace App\Http\Controllers;

use App\Http\Requests\productRequest;
use App\Models\categorie;
use App\Models\product;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products[]=new product();
        $category[]=new categorie();
        $title="Produits";
        $pages="";
        if (Auth::user())
        {
            foreach(Auth()->user()->categories as $category)
            {
                foreach($category->products as $product)
                {
                    array_push($products,$product);
                }
            }
            $category=Auth()->user()->categories;
            $pages="productsCategory";
        }
        else
        {
            $products= product::all();
            $category=categorie::all();
             $pages="index";
        }
        // dd($products);
        
        return view($pages,compact('products','category','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $operation="create";
        $category=Auth()->user()->categories;
        return view('createUpdateProduct',compact('operation','category'));
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
         if ($request->hasFile('category_fileimg') ) {
            if($request->file('product_fileimg')->isValid())
            {
                $name = $request->product_fileimg->getClientOriginalName();
                $request->product_fileimg->storeAs('/public/imageProduct', $name);
                
                $validated['product_fileimg']=$name;
            }
         }
         else
         {
             $validated['product_fileimg']="";
         }
       
        $product=product::create($validated);
        Toastr::success('Produit Ajouté avec succès','Succès');
        return redirect('products');
        // return response()->json($product);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        $product= product::find($product->id);
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
        $category=Auth()->user()->categories;
        return view('createUpdateProduct',compact('operation','product','category'));
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
        $validated=$request->all();
        if ($request->hasFile('category_fileimg') ) {
            if($request->file('product_fileimg')->isValid())
            {
                $name = $request->product_fileimg->getClientOriginalName();
                $request->product_fileimg->storeAs('/public/imageProduct', $name);
                $validated['product_fileimg']=$name;
            }
        }
         else
        {
            $validated['category_fileimg']=$product->category_fileimg;
        }

        $product->update($validated);
        Toastr::success('Produit Modifié avec succès','Succès');
        return redirect('products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        $product->delete();
        Toastr::success('Produit Supprimé avec succès','Succès');
        return redirect('products');
    }

    public function apiUrl(Request $request)
    {
        $uri=$request->apiUrl;

    }
}
