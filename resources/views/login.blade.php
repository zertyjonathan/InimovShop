<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
        <form action="{{route('login')}}" method="post">
            @csrf
           <div>
                <label for="email">email</label><br>
                <input id="email" type="email" name="email" value="{{ old('email') }}" class="@error('email') is-invalid @enderror"><br>
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div> <br>
                    @enderror
           </div>
            <div>
                <label for="password">password</label><br>
                <input id="password" type="text" name="password" value="{{ old('password') }}" class="@error('password') is-invalid @enderror"><br>
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div> <br>
                    @enderror
           </div> 
           
           <div>
                <input id="remember" type="checkbox" name="remember" value="{{ old('remember') }}"> <label for="remember">remember</label>
           </div> 
            
           

            <input type="submit" value="Submit">

        </form>

</body>
</html>