<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="side-menu">
            <li class="nav-header">
                @include('menu.partials.profile')
            </li>
            <li @if (Request::is('gastos*')) class="active" @endif >
                <a href="{{ route('gastos.index') }}"><i class="fa fa-shield"></i> <span class="nav-label">Clan</span></a>
            </li>
            <li @if (Request::is('players*')) class="active" @endif >
                <a href="{{ route('players.index') }}"><i class="fa fa-users"></i> <span class="nav-label">Jugadores</span></a>
            </li>
        </ul>
    </div>
</nav>