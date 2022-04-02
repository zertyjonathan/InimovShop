 <h1 class="logo">
    <a href="#">{{$title}} <span>{{$subtitle}}</span></a>
    </h1>
    <div class="nav-wrap">
        <div class="main-nav" role="navigation">
            <ul class="unstyled list-hover-slide">
                 @if(Auth()->user())
                    <li><a href="{{route('categories')}}">Categories</a></li>
                     <li><a href="{{route('products')}}">Produits</a></li>
                  @else
                    @foreach ($items as $item )
                            <li><a href="#" id="cat-{{$item->id}}" onclick="recupererIdCategorie({{$item->id}})">{{$item->category_title}}</a></li>
                    @endforeach
                 @endif
               
                
            </ul>
        </div>
</div>