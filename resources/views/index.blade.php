@extends('layouts.structure',['page'=>'main'])

@section('link')
     <link rel="stylesheet" href="{{asset('styles/main.css')}}" />
    <link rel="stylesheet" href="{{asset('styles/font-awesome/css/font-awesome.min.css')}}" />
@endsection

@section('title', 'Accueil')

@section('header')
    @include('layouts.partial._header',['title'=>"produits","authentification"=>false])
@endsection

@section('nav')
     @include('layouts.partial._navbar',["title"=>"Categories","subtitle"=>"Produits","items"=>$category])
@endsection

@section('main')
        <div class="product" id="productMain">
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
                            @auth
                                     <div class="iconne">
                                        <a href="{{url('upProduct/'.$product->id)}}"><i class="fa fa-pencil"></i></a>
                                        
                                        <a href="{{url('deleteProduct/'.$product->id)}}"><i class="fa fa-trash"></i></a>
                                    </div>
                            @endauth
                           
                           
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
                  
        </div>  
        
@endsection

@section('footer')
     @include('layouts.partial._footer')
@endsection