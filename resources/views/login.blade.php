{{--  <!DOCTYPE html>
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
</html>  --}}
@extends('layouts.structure',['page'=>'login'])

@section('link')
     <link rel="stylesheet" href="{{asset('styles/login.css')}}" />
    <link rel="stylesheet" href="{{asset('styles/font-awesome/css/font-awesome.min.css')}}" />
@endsection

@section('content')
     <div class="screen">
           
            <div class="screen__content">
                {{--  @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif  --}}
                <form class="login" action="{{route('login')}}" method="post">
                     @csrf
                    <div class="login__field">
                        <i class="login__icon fa fa-envelope-o"></i>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" class="login__input @error('email') is-invalid @enderror" placeholder="Email">
                         @error('email')
                            <div class="alert alert-danger">{{ $message }}</div> <br>
                        @enderror
                    </div>
                    <div class="login__field">
                        <i class="login__icon fa fa-key"></i>
                        <input id="password" type="password" name="password" value="{{ old('password') }}" class="login__input @error('password') is-invalid @enderror" placeholder="Mots de passe">
                        @error('password')
                            <div class="alert alert-danger">{{ $message }}</div> <br>
                        @enderror
                    </div>
                    <div class="login__field">
                            <input id="remember" type="checkbox" name="remember" value="{{ old('remember') }}" class=""> 
                            <label for="remember">remember</label>
                    </div> 
                    <button class="button login__submit" type="submit">
                        <span class="button__text">Connexion</span>
                        <i class="button__icon fa fa-angle-right"></i>
                    </button>
                </form>
                <div class="social-login">
                    <h3>INIMOV-Shop</h3>
                    <!-- <div class="social-icons">
                        <a href="#" class="social-login__icon fab fa-instagram"></a>
                        <a href="#" class="social-login__icon fab fa-facebook"></a>
                        <a href="#" class="social-login__icon fab fa-twitter"></a>
                    </div> -->
                </div>
            </div>
            <div class="screen__background">
                <span class="screen__background__shape screen__background__shape4"></span>
                <span class="screen__background__shape screen__background__shape3"></span>
                <span class="screen__background__shape screen__background__shape2"></span>
                <span class="screen__background__shape screen__background__shape1"></span>
            </div>
        </div>
@endsection
