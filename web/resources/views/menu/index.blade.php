<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="side-menu">
            <li class="nav-header">
                @include('menu.partials.profile')
            </li>
            <li class="active">
                <a href="index.html"><i class="fa fa-tachometer"></i> <span class="nav-label">Dashboards</span></a>
            </li>
            <li>
                <a href="{{ route('players.index') }}"><i class="fa fa-users"></i> <span class="nav-label">Jugadores</span></a>
            </li>
        </ul>
    </div>
</nav>