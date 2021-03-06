{{--  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
{{$operation}}
        <form action="{{route($operation=='create'?'newCategory':'upCategory',$operation=='update'?['category'=>$category->id]:'')}}" method="post" enctype="multipart/form-data">
            @csrf

            @if($operation=='update')
                <div>
                    <img src="{{asset('storage/imageCategory/'.$category->category_fileimg)}}" alt="" width="100px">
                </div>
                <div>
                    <label for="category_fileimg">category_fileimg</label><br>
                    <input id="category_fileimg" type="file" name="category_fileimg" value="{{ old('category_fileimg') }}" class="@error('category_fileimg') is-invalid @enderror"><br>
                    @error('category_fileimg')
                        <div class="alert alert-danger">{{ $message }}</div> <br>
                    @enderror
                </div>
            @endif
           <div>
                <label for="category_title">category_title</label><br>
                <input id="category_title" type="text" name="category_title" value="{{ $operation=='update'? old('category_title') ?? $category->category_title:old('category_title') }}" class="@error('category_title') is-invalid @enderror"><br>
                    @error('category_title')
                        <div class="alert alert-danger">{{ $message }}</div> <br>
                    @enderror
           </div>
            <div>
                <label for="category_description">category_description</label><br>
                <input id="category_description" type="text" name="category_description" value="{{ $operation=='update'? old('category_description') ?? $category->category_description:old('category_description') }}" class="@error('category_description') is-invalid @enderror"><br>
                    @error('category_description')
                        <div class="alert alert-danger">{{ $message }}</div> <br>
                    @enderror
           </div>   
            
            @if($operation=='create')
                <div>
                    <label for="category_fileimg">category_fileimg</label><br>
                    <input id="category_fileimg" type="file" name="category_fileimg" value="{{ old('category_fileimg') }}" class="@error('category_fileimg') is-invalid @enderror"><br>
                        @error('category_fileimg')
                            <div class="alert alert-danger">{{ $message }}</div> <br>
                        @enderror
                </div> 
            @endif

            <input type="submit" value="Submit">

        </form>

</body>
</html>  --}}


@extends('layouts.structure',['page'=>'product'])

@section('link')
    <link rel="stylesheet" href="{{asset('styles/main.css')}}" />
    <link rel="stylesheet" href="{{asset('styles/form.css')}}">
    <link rel="stylesheet" href="{{asset('styles/font-awesome/css/font-awesome.min.css')}}" />
@endsection

@section('title', 'Categories')

@section('header')
    @include('layouts.partial._header',['title'=>"Categories","authentification"=>true])
@endsection

@section('nav')
     @include('layouts.partial._navbar',["title"=>"Talla","subtitle"=>"Jonathan","items"=>['Categories','Produits']])
@endsection

@section('main')
    <div class="containerForm">
        <div class="title">Nouvelle Categorie</div>
        <div class="content">
            <form {{route($operation=='create'?'newCategory':'upCategory',$operation=='update'?['category'=>$category->id]:'')}}" method="post" enctype="multipart/form-data" class="formProduct">
                @csrf

                <div class="user-detail">
                    @if($operation=='update')
                        <div>
                            <img src="{{asset('storage/imageCategory/'.$category->category_fileimg)}}" alt="" width="100px">
                        </div>
                        <div class="input-box">
                                <span class="details">image</span>
                                <input id="category_fileimg" type="file" name="category_fileimg" value="{{ old('category_fileimg') }}" class="@error('category_fileimg') is-invalid @enderror">
                                @error('category_fileimg')
                                    <div class="alert alert-danger">{{ $message }}</div> <br>
                                @enderror
                        </div>
                    @endif
                    @if($operation=='create')
                            <div class="input-box">
                                <span class="details">image</span>
                                <input id="category_fileimg" type="file" name="category_fileimg" value="{{ old('category_fileimg') }}" class="@error('category_fileimg') is-invalid @enderror" placeholder="Enter your email">
                                @error('category_fileimg')
                                    <div class="alert alert-danger">{{ $message }}</div> <br>
                                @enderror
                            </div>
                    @endif
                </div>
                

                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Titre</span>
                        <input id="category_title" type="text" name="category_title" value="{{ $operation=='update'? old('category_title') ?? $category->category_title:old('category_title') }}" class="@error('category_title') is-invalid @enderror" placeholder="Saisir le nom de la categorie">
                         @error('category_title')
                            <div class="alert alert-danger">{{ $message }}</div> <br>
                         @enderror
                    </div>               
                </div>
                 <div class="input-box">
                        <span class="details">Description</span>
                        <textarea id="" cols="50" rows="10" name="category_description"  class="@error('category_description') is-invalid @enderror">
                            {{ $operation=='update'? old('category_description') ?? $category->category_description:old('category_description') }}
                        </textarea>
                         @error('category_description')
                            <div class="alert alert-danger">{{ $message }}</div> <br>
                        @enderror
                    </div>

                <div class="buttons category">
                    <input type="submit" value="Enregistrer">
                   
                    <a href="{{route('categories')}}" style="width: 700px;"><input type="button" value="Annuler"></a>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('footer')
     @include('layouts.partial._footer')
@endsection