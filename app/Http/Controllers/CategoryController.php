<?php

namespace App\Http\Controllers;

use App\Http\Requests\categoryRequest;
use App\Models\categorie;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('category');
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
        
        if($request->file('category_fileimg')->isValid())
        {
            $name = $request->category_fileimg->getClientOriginalName();
            $request->category_fileimg->storeAs('/public/imageCategory', $name);
            
            $validated['category_fileimg']=$name;
        }
        $validated['user_id']=1;

        $category=categorie::create($validated);

        return response()->json($category);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\categorie  $category
     * @return \Illuminate\Http\Response
     */
    public function show(categorie $category)
    {
        return response()->json($category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\categorie  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(categorie $category)
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
    public function update(categoryRequest $request, categorie $category)
    {
        $validated=$request->all();
        if($request->file('category_fileimg')->isValid())
        {
            $name = $request->category_fileimg->getClientOriginalName();
            $request->category_fileimg->storeAs('/public/imageCategory', $name);
            $validated['category_fileimg']=$name;
        }
        $get=$category->update($validated);
        return $get;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\categorie  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(categorie $category)
    {
        //
    }
}
