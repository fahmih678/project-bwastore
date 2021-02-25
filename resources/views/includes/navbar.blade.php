<nav class="navbar navbar-expand-lg navbar-light navbar-store fixed-top navbar-fixed-top" data-aos="fade-down">
    <div class="container">
        <a href="{{ route('home') }}" class="navbar-brand">
            <img src="/images/logo.svg" alt="logo" />
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <!-- ml -> ms -->
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link {{ (request()->is('/')) ? 'active' : '' }}" aria-current="page">Home</a>
                </li>
                <li class="nav-item">
                    <a href="/portofolio" class="nav-link {{ (request()->is('/portofolio')) ? 'active' : '' }}">Shop</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('categories') }}" class="nav-link {{ (request()->is('categories')) ? 'active' : '' }}">Categories</a>
                </li>
                <li class="nav-item">
                    <a href="/about.html" class="nav-link {{ (request()->is('/about')) ? 'active' : '' }}">About</a>
                </li>
                @guest
                    <li class="nav-item">
                        <a href="{{ route('register') }}" class="nav-link">Sign Up</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="btn btn-success nav-link px-4 text-white">
                            Sign In
                        </a>
                    </li>
                @endguest
            </ul>

            @auth
               <!-- Dekstop Menu-->
                <ul class="navbar-nav d-none d-lg-flex">
                    <li class="nav-item dropdown">
                        <a 
                            class="nav-link" 
                            href="#" 
                            id="navbarDropdown" 
                            role="button" 
                            data-bs-toggle="dropdown" 
                            aria-expanded="false"
                        >
                            <img src="/images/user_pc.svg" alt="" class="rounded-circle me-2 profile-pricture" />
                            Hi, {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a>
                
                            <a class="dropdown-item" href="{{ route('dashboard-setting-account') }}">Setting</a>
                
                            <hr class="dropdown-divider" />
                
                            <a class="dropdown-item" 
                                href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
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
                <ul class="navbar-nav d-block d-lg-none">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            Hi, {{ Auth::user()->name }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('cart') }}" class="nav-link d-inline-block">Cart</a>
                    </li>
                </ul> 
            @endauth
        </div>
    </div>
</nav>
