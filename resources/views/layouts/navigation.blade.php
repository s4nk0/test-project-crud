<!-- Left Side Of Navbar -->
<ul class="navbar-nav me-auto">
    <li class="nav-item">
        <a class="nav-link {{ Request::routeIs('dashboard') ? 'active' : '' }}" aria-current="page" href="{{route('dashboard')}}">Dashboard</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Request::routeIs('order.*') ? 'active' : '' }}" aria-current="page" href="{{route('order.index')}}">Заказы</a>
    </li>
</ul>
