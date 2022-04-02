<html>
   <head>
      <title>INIMOVShop - @yield('title')</title>
      @yield('link')
       <link rel="stylesheet" href="{{asset('styles/toastr.min.css')}}"> 
   </head>
   @if($page=='main'|| $page=='product' || $page=='categorie')
   <body class="container" >
    <header>
         @yield('header')
    </header>
    <nav>
         @yield('nav')
    </nav>
    <main>
         @yield('main')
    </main>
    <footer>
         @yield('footer')
    </footer>
          {!! Toastr::message() !!}
   </body>
   @elseif($page="login")
     <body>
          <div class="container">
                @yield('content')
          </div>    
         <script src="{{asset('script/jquery-3.5.1.js')}}"></script>
          <script src="{{asset('script/toastr.min.js')}}"></script>
          {!! Toastr::message() !!}     
     </body>
   @endif
</html>