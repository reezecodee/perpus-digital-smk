<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav d-flex align-items-center justify-content-between">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a data-toggle="dropdown" href="javascript:void(0)">
                <div class="d-flex align-items-center">
                    <span class="block mr-2 text-dark">{{ auth()->user()->username }}</span>
                    <img src="{{ asset('storage/img/profile/' . (auth()->user()->photo ?? 'unknown.jpg')) }}"
                        alt="" srcset="" width="40" class="rounded-circle block">
                </div>
            </a>
            <ul class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                <li><a class="dropdown-item" href="{{ route('profile.overview') }}">Profile</a></li>
                <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
            </ul>
        </li>
    </ul>
</nav>
<!-- /.navbar -->
