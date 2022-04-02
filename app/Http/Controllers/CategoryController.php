<?php

namespace App\Http\Controllers;

use App\Http\Requests\categoryRequest;
use App\Models\Categorie;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category[]=new Categorie();
        $title="Categories";
        $category=Auth()->user()->categories;
        return view("productsCategory",compact('category','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $operation="create";
         return view('createUpdateCategory',compact('operation'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(categoryRequest $request)
    {
         $validated= $request->validated();
         
         if ($request->hasFile('category_fileimg') ) {
             if($request->file('category_fileimg')->isValid())
            {
                $name = $request->category_fileimg->getClientOriginalName();
                $request->category_fileimg->storeAs('/public/imageCategory', $name);
                
                $validated['category_fileimg']=$name;
            }
         }
         else
         {
                $validated['category_fileimg']="";
         }
       
        $validated['user_id']=Auth()->user()->id;

        $category=Categorie::create($validated);
        Toastr::success('Categorie Ajoutée avec succès','Succès');
        return redirect('categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\categorie  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Categorie $category)
    {

        return response()->json($category);
    }

    /**
     * method get products of a category.
     *
     * @param  \App\Models\categorie  $category
     * @return \Illuminate\Http\Response
     */
    public function showProductCategory(Categorie $category)
    {
        $products=$category->products;
        return response()->json($products);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categorie  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Categorie $category)
    {
        $operation="update";
        return view('createUpdateCategory',compact('operation','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\categorie  $category
     * @return \Illuminate\Http\Response
     */
    public function update(categoryRequest $request, Categorie $category)
    {
        $validated=$request->all();
        // dd( $validated);
         if ($request->hasFile('category_fileimg') ) {
            if($request->file('category_fileimg')->isValid())
            {
                $name = $request->category_fileimg->getClientOriginalName();
                $request->category_fileimg->storeAs('/public/imageCategory', $name);
                $validated['category_fileimg']=$name;
            }
        }
        else
        {
            $validated['category_fileimg']=$category->category_fileimg;
        }
        
        $category->update($validated);
        Toastr::success('Categorie Modifée avec succès','Succès');
        return redirect('categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\categorie  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categorie $category)
    {
        //
    }
}
