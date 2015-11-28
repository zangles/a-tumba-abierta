<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="side-menu">
            <li class="nav-header">
                @include('menu.partials.profile')
            </li>
            <li @if (Request::is('gastos*') or Request::is('donation/recaudacion')) class="active" @endif>
                <a href="#"><i class="fa fa-shield"></i> <span class="nav-label">Clan</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse" style="height: 0px;">
                    <li @if (Request::is('gastos*')) class="active" @endif ><a href="{{ route('gastos.index') }}"><i class="fa fa-money"></i> <span class="nav-label">Gastos</span></a></li>
                    <li @if (Request::is('donation/recaudacion')) class="active" @endif ><a href="{{ url('donation/recaudacion') }}"><i class="fa fa-usd"></i> <span class="nav-label">Recaudacion</span></a></li>
                </ul>
            </li>
            <li @if (Request::is('players*')) class="active" @endif >
                <a href="#"><i class="fa fa-users"></i> <span class="nav-label">Jugadores</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse" style="height: 0px;">
                    <li @if (Request::is('players')) class="active" @endif ><a href="{{ route('players.index') }}"><i class="fa fa-list"></i> <span class="nav-label">Listado</span></a></li>
                    <li @if (Request::is('players/black')) class="active" @endif ><a href="{{ url('players/black') }}"><i class="fa fa-user-times"></i> <span class="nav-label">BlackList</span></a></li>
                    <li @if (Request::is('players/postulantes')) class="active" @endif ><a href="{{ url('players/postulantes') }}"><i class="fa fa-user-plus"></i> <span class="nav-label">Postulantes</span> <span class="badge">{{ \App\Postulantes::getCantPostulantes() }}</span></a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>