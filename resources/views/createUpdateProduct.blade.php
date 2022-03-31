<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
{{$operation}}
        <form action="{{route($operation=='create'?'newProduct':'upProduct',$operation=='update'?['product'=>$product->id]:'')}}" method="post" enctype="multipart/form-data">
            @csrf

            @if($operation=='update')
                <div>
                    <img src="{{asset('storage/imageProduct'.$product->product_fileimg)}}" alt="" width="100px">
                </div>
                <div>
                    <label for="product_fileimg">product_fileimg</label><br>
                    <input id="product_fileimg" type="file" name="product_fileimg" value="{{ old('product_fileimg') }}" class="@error('product_fileimg') is-invalid @enderror"><br>
                    @error('product_fileimg')
                        <div class="alert alert-danger">{{ $message }}</div> <br>
                    @enderror
                </div>
            @endif
           <div>
                <label for="product_name">product_name</label><br>
                <input id="product_name" type="text" name="product_name" value="{{ $operation=='update'? old('product_name') ?? $product->product_name:old('product_name') }}" class="@error('product_name') is-invalid @enderror"><br>
                    @error('product_name')
                        <div class="alert alert-danger">{{ $message }}</div> <br>
                    @enderror
           </div>

            <div>

                <label for="product_price">product_price</label><br>
                <input id="product_price" type="number" name="product_price" value="{{ $operation=='update'? old('product_price') ?? $product->product_price:old('product_price') }}" class="@error('product_price') is-invalid @enderror"><br>
                    @error('product_price')
                        <div class="alert alert-danger">{{ $message }}</div> <br>
                    @enderror
            </div>

            <div>

                <label for="category">category</label><br>
                <input id="categorie_id" type="number" name="categorie_id" value={{'2'}} value="{{ $operation=='update'? old('categorie_id') ?? $product->categorie_id:old('categorie_id') }}"><br>
                    @error('categorie_id')
                        <div class="alert alert-danger">{{ $message }}</div> <br>
                    @enderror
            </div>

            <div>
                    <label for="product_stock">product_stock</label><br>
                <input id="product_stock" type="number" name="product_stock" value="{{ $operation=='update'?old('product_stock') ?? $product->product_stock:old('product_stock') }}" class="@error('product_stock') is-invalid @enderror"><br>
                    @error('product_stock')
                        <div class="alert alert-danger">{{ $message }}</div> <br>
                    @enderror
            </div>
            
            @if($operation=='create')
                <div>
                    <label for="product_fileimg">product_fileimg</label><br>
                    <input id="product_fileimg" type="file" name="product_fileimg" value="{{ old('product_fileimg') }}" class="@error('product_fileimg') is-invalid @enderror"><br>
                        @error('product_fileimg')
                            <div class="alert alert-danger">{{ $message }}</div> <br>
                        @enderror
                </div> 
            @endif

            <input type="submit" value="Submit">

        </form>

</body>
</html>