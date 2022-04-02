<div class="navbar">
    <!-- LOGO -->
    <div class="logo" >
        INIMOVShop
    </div>
    <!-- NAVIGATION MENU -->
    @if ($title!="Categories")
         <div class="search">
         <h2>{{$title}}</h2>
            <form id="formulaire" action="#" name="formulaire">
                <div>
                    <label class="select" for="slct">
                        <select id="selectCategorie" name="selectCategorie"required="required">
                            <option value="" disabled selected>Categories</option>
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

                    <input type="text" class="searchTerm" name="produitName" placeholder="Recherche le produit..." id='produitName'>
                    <button type="button" class="searchButton" id="searchButton">
                        <i class="fa fa-search"></i>
                    </button>
                   
                     <i class="fa fa-refresh btnIcon" id="refresher" style="font-size: 27px;margin-left: 18px;color: #ffffff;cursor:pointer" aria-hidden="true"></i>
              
                </div>
            </form>
    </div>
    @endif
   
   
    <ul class="nav-links">
        <!-- USING CHECKBOX HACK -->
        <input type="checkbox" id="checkbox_toggle" />
        <label for="checkbox_toggle" class="hamburger">&#9776;</label>
        <!-- NAVIGATION MENUS -->
        <div class="menu">
            @if($authentification)
                <li><a href="{{route('loggout')}}"><i class="fa fa-sign-out" aria-hidden="true"></i>Deconnexion</a></li>
            @else
                <li><a href="{{route('login')}}"><i class="fa fa-sign-in" aria-hidden="true"></i> Se connecter</a></li>
            @endif
        </div>
    </ul>

     
</div>