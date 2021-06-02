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
        {{-- Datatables --}}
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.23/datatables.min.css" />    
    
    @stack('addon-style')
</head>

<body>
    <div class="page-dashboard">
        <div class="d-flex" id="wrapper">
            <!-- Sidebar -->
            <div class="border-right" id="sidebar-wrapper">
                <div class="sidebar-heading text-center">
                    <img src="/images/admin.png" alt="" class="my-4 rounded-3" style="max-width: 150px" />
                </div>
                <div class="list-group list-group-flush">
                    <a
                        href="{{ route('admin-dashboard') }}" 
                        class="list-group-item list-group-item-action {{ (request()->is('admin')) ? 'active' : '' }}">
                        Dashboard
                    </a>
                    <a 
                        href="{{ route('product-store.index') }}"
                        class="list-group-item list-group-item-action {{ (request()->is('admin/myproduct')) ? 'active' : '' }}">
                        My Products
                    </a>
                    <a 
                        href="{{ route('product.index') }}"
                        class="list-group-item list-group-item-action {{ (request()->is('admin/product')) ? 'active' : '' }}">
                        Products
                    </a>
                    <a 
                        href="{{ route('product-gallery.index') }}"
                        class="list-group-item list-group-item-action {{ (request()->is('admin/product-gallery')) ? 'active' : '' }}">
                        Galleries
                    </a>
                    <a 
                        href="{{ route('category.index') }}" 
                        class="list-group-item list-group-item-action {{ (request()->is('admin/category')) ? 'active' : '' }}">
                        Categories
                    </a>
                    <a 
                        href="{{ route('transaction.index') }}" 
                        class="list-group-item list-group-item-action {{ (request()->is('admin/transaction')) ? 'active' : '' }}">
                        Transactions
                    </a>
                    <a 
                        href="{{ route('user.index') }}" 
                        class="list-group-item list-group-item-action {{ (request()->is('admin/user')) ? 'active' : '' }}">
                        Users
                    </a>
                   
                    <a 
                        href="{{ route('home') }}" 
                        class="list-group-item list-group-item-action">
                        Sign Out
                    </a>
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
                                    Hi Fahmi
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    

                                    {{-- <hr class="dropdown-divider" /> --}}

                                    <a class="dropdown-item" href="/">Logout</a>
                                </div>
                            </li>
                            
                        </ul>
                        <!-- + Dropdown -->
                        <ul class="navbar-nav d-block d-lg-none mt-3">
                            <li class="nav-item">
                                <a href="#" class="nav-link"> Hi, Fahmi</a>
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
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>        
        <!-- Bootstrap -->
        <script src="{{ url('/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
        {{-- Datatables --}}
        <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.23/datatables.min.js"></script>        
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
