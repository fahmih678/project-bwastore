<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>

    @stack('prepend-style')
    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <!-- Bootstrap and Custom -->
    <link rel="stylesheet" href="{{ url('/style/main.css') }}" />
    @stack('addon-style')
</head>

<body>
    <div class="page-dashboard">
        <div class="d-flex" id="wrapper">
            <!-- Sidebar -->
            <div class="border-right" id="sidebar-wrapper">
                <div class="sidebar-heading text-center">
                    <img src="/images/logo.svg" alt="" class="my-4" />
                </div>
                <div class="list-group list-group-flush">
                    <a href="{{ route('dashboard') }}" 
                        class="list-group-item list-group-item-action {{ (request()->is('dashboard')) ? 'active' : '' }}">
                        Dashboard
                    </a>
                    <a href="{{ route('dashboard-product') }}" 
                        class="list-group-item list-group-item-action {{ (request()->is('dashboard/products*')) ? 'active' : '' }}">
                        My Products
                    </a>
                    <a href="{{ route('dashboard-transactions') }}"
                        class="list-group-item list-group-item-action {{ (request()->is('dashboard/transactions')) ? 'active' : '' }}">
                        Transactions
                    </a>
                    <a href="{{ route('dashboard-myorder') }}"
                        class="list-group-item list-group-item-action {{ (request()->is('dashboard/myorder')) ? 'active' : '' }}">
                        My Order
                    </a>
                    <a href="{{ route('dashboard-setting-account') }}" 
                        class="list-group-item list-group-item-action {{ (request()->is('dashboard/account')) ? 'active' : '' }}">
                        My Account
                    </a>
                    <a href="{{ route('dashboard-setting-store') }}" 
                        class="list-group-item list-group-item-action {{ (request()->is('dashboard/settings')) ? 'active' : '' }}">
                        Store Setting
                    </a>
                    <a href="{{ route('home') }}" 
                        class="list-group-item list-group-item-action"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Sign Out
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>

                </div>
            </div>

            <!-- Page Content -->
            <div class="page-content-wrapper" id="page-content-wrapper">
                <!-- Navigation -->
                <nav class="navbar navbar-expand-lg navbar-light navbar-store fixed-top">
                    <button class="btn btn-secondary d-md-none me-auto me-2" id="menu-toggle">
                        &laquo; Menu
                    </button>
                    <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <!-- Dekstop Menu-->
                        <ul class="navbar-nav d-none d-lg-flex ms-auto">
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false" aria-haspopup="true">
                                    <img src="/images/user_pc.svg" alt=""
                                        class="rounded-circle me-2 profile-pricture" />
                                    Hi, {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/dashboard.html">Dashboard</a>

                                    <a class="dropdown-item" href="/dashboard-account.html">Setting</a>

                                    <hr class="dropdown-divider" />

                                    <a class="dropdown-item" href="/">Logout</a>
                                </div>
                            </li>
                            <li class="nav-item">
                               <a href="{{ route('cart') }}" class="nav-link d-inline-block mt-2">
                                @php
                                    $carts = \App\Cart::where('users_id', Auth::user()->id)->count();
                                @endphp
                                @if ($carts > 0)
                                    <img src="/images/shopping-filled.svg" alt="" />
                                    <div class="card-badge">{{ $carts }}</div>
                                @else
                                    <img src="/images/shopping-empty.svg" alt="" />
                                @endif
                            </a>
                            </li>
                        </ul>
                        <!-- + Dropdown -->
                        <ul class="navbar-nav d-block d-lg-none mt-3">
                            <li class="nav-item">
                                <a href="#" class="nav-link"> Hi, Fahmi</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link d-inline-block">Cart</a>
                            </li>
                        </ul>
                    </div>
                </nav>

                {{-- Content --}}
                @yield('content')

            </div>
        </div>
    </div>
    @stack('prepend-script')
    <!-- Jquery -->
    <script src="{{ url('/vendor/jquery-3.5.1.slim.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ url('/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AOS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();

    </script>
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });

    </script>
    @stack('addon-script')
</body>

</html>
