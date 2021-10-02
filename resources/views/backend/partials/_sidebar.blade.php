@guest
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('login')}}">
                <i class="icon-paper menu-icon"></i>
                <span class="menu-title">Login</span>
            </a>
        </li>
        {{-- <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="icon-paper menu-icon"></i>
                <span class="menu-title">Peminjam</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('pinjaman')}}">Tambah</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('pinjaman.booking')}}">Booking</a></li>
                </ul>
            </div>
        </li> --}}

    </ul>
</nav>
@endguest
@auth

@if (Auth::check() && Auth::user()->role == 'operator' )
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{route('history.dashboard')}}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('kendaraan.dashboard')}}">
                <i class="icon-paper menu-icon"></i>
                <span class="menu-title">Kendaraan</span>
            </a>
        </li>
        <hr style="border: 1px solid black">
        <li class="nav-item">
            <a class="nav-link btn btn-danger" href="{{route('logout')}}">
                <i class=""></i>
                <span class="menu-title text-white">Logout</span>
            </a>
        </li>
    </ul>
</nav>
@else
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{route('user.dashboard')}}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <hr>
        <hr style="border: 1px solid black">
        <li class="nav-item">
            <a class="nav-link btn btn-danger" href="{{route('logout')}}">
                <i class=""></i>
                <span class="menu-title text-white">Logout</span>
            </a>
        </li>
    </ul>
</nav>
@endif

@endauth



