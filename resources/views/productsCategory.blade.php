@extends('layouts.structure',['page'=>'product'])

@section('link')
     <link rel="stylesheet" href="{{asset('styles/main.css')}}" />
    <link rel="stylesheet" href="{{asset('styles/font-awesome/css/font-awesome.min.css')}}" />
@endsection

@section('title', $title)

@section('header')
    @include('layouts.partial._header',['title'=>$title,"authentification"=>true])
@endsection

@section('nav')
     @include('layouts.partial._navbar',["title"=>"Talla","subtitle"=>"Jonathan"])
@endsection

@section('main')
    @if ($title=="Produits")
        <div class="search">
            <form action="">
                <div>
                    <label class="select" for="slct">
                        <select id="slct" required="required">
                            <option value="" disabled selected> Categories </option>
                            @foreach ($category as $categorie)
                            <option value="{{$categorie->id}}">{{$categorie->category_title}}</option>
                            @endforeach                            
                        </select>
                        <svg>
                            <use xlink:href="#select-arrow-down"></use>
                        </svg>
                    </label>
                    <!-- SVG Sprites-->
                    <svg class="sprites">
                        <symbol id="select-arrow-down" viewbox="0 0 10 6">
                            <polyline points="1 1 5 5 9 1"></polyline>
                        </symbol>
                    </svg>

                    <input type="text" class="searchTerm" placeholder="Recherche le produit...">
                    <button type="submit" class="searchButton">
                        <i class="fa fa-search"></i>
                    </button>
                </div>

            </form>
        </div>
    @endif
      

        <div class="button" style="margin-top: 80px;margin-left: 21px;">
                <a href="{{route($title=="Produits"?'newProduct':'newCategory')}}" class="Addprod"> <i class="fa fa-plus"></i> {{$title=="Produits"?'Nouveau produit':'Nouvelle categorie'}}</a>
        </div>
      
        <div class="product">
           @if($title=="Produits")
                @foreach ($products as $product)
                    <div class="el-wrapper">
                    <div class="box-up">
                        <img class="img" src="{{asset('storage/imageProduct/'.$product->product_fileimg)}}" width="200px" alt="">
                        <div class="img-info">
                            <div class="info-inner">
                                <span class="p-name">{{$product->product_name}}</span>
                                <span class="p-company">IniMovShop</span>
                            </div>
                            <div class="a-size">
                                Quantité en stock : <span class="size">{{$product->product_stock}}</span><br>
                                <div class="iconne">
                                    <a href="{{url('upProduct/'.$product->id)}}"><i class="fa fa-pencil"></i></a>
                                    
                                    <a href="{{url('deleteProduct/'.$product->id)}}"><i class="fa fa-trash"></i></a>
                                </div>
                            
                            </div
                            </div>
                        </div>
                    </div>

                    <div class="box-down">
                        <div class="h-bg">
                            <div class="h-bg-inner"></div>
                        </div>

                        <a class="cart" href="#">
                            <span class="price">{{$product->product_price.'FCFA'}}</span>
                            <span class="add-to-cart">
                                <span class="txt">Plus de détail</span>
                            </span>
                        </a>
                    </div>
                </div>
                @endforeach  
            @else
                 @foreach ($category as $cat)
                    <div class="el-wrapper">
                    <div class="box-up">
                        <img class="img" src="{{asset('storage/imageCategory/'.$cat->category_fileimg)}}" width="200px" alt="">
                        <div class="img-info">
                            <div class="info-inner">
                                <span class="p-name">{{$cat->category_title}}</span>
                                <span class="p-company">Categories</span>
                            </div>
                            <div class="a-size">
                                Description <br><br><span class="size">{{$cat->category_description?$cat->category_description:"Aucune description"	}}</span><br>
                                <div class="iconne">
                                    <a href="{{url('upCategory/'.$cat->id)}}"><i class="fa fa-pencil"></i></a>
                                    
                                    <a href="{{url('deleteCategory/'.$cat->id)}}"><i class="fa fa-trash"></i></a>
                                </div>
                            
                            </div
                            </div>
                        </div>
                    </div>

                    <div class="box-down">
                        <div class="h-bg">
                            <div class="h-bg-inner"></div>
                        </div>

                        <a class="cart" href="#">
                            <span class="price">Categorie {{$loop->index+1}}</span>
                            <span class="add-to-cart">
                                <span class="txt">Plus de détail</span>
                            </span>
                        </a>
                    </div>
                </div>
                @endforeach  
            @endif       
        </div>     
@endsection
@section('footer')
     @include('layouts.partial._footer')
@endsection