<div class="navbar">
    <!-- LOGO -->
    <div class="logo" >
        INIMOVShop
    </div>
    <!-- NAVIGATION MENU -->
    <h2>{{$title}}</h2>
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