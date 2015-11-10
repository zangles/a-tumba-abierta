<div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" style="max-width: 49px" src="{{ asset('/img/avatar.jpg') }}" />
                             </span>
    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">{{ Auth::user()->name }}</strong>
                             </span> <span class="text-muted text-xs block">{{ Auth::user()->role }} <b class="caret"></b></span> </span> </a>
    <ul class="dropdown-menu animated fadeInRight m-t-xs">
        <li><a href="profile.html">Perfil</a></li>
        <li class="divider"></li>
        <li><a href="{{ route('logout') }}">Salir</a></li>
    </ul>
</div>
<div class="logo-element">
    IN+
</div>