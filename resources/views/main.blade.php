<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Hello</h1>
    
    <p>
        <h2><a href="{{route('login')}}">Login</a></h2>
    </p>

    <p>
        <h2>produits</h2>
        <ul>
            <li><a href="{{route('newProduct')}}">Nouveau produit</a></li>
            <li><a href="{{route('products')}}">Produits</a></li>
        </ul>
    </p>

     <p>
        <h2>Categories</h2>
        <ul>
            <li><a href="{{route('newCategory')}}">Nouvelle Categorie</a></li>
            <li><a href="{{route('categories')}}">Categories</a></li>
        </ul>
    </p>

</body>
</html>