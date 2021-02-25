<nav class="navbar navbar-expand-lg navbar-light navbar-store fixed-top navbar-fixed-top" data-aos="fade-down">
    <div class="container">
        <a href="index.html" class="navbar-brand">
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
                    <a href="/index.html" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="/portofolio.html" class="nav-link">Shop</a>
                </li>
                <li class="nav-item">
                    <a href="/categories.html" class="nav-link">Categories</a>
                </li>
                <li class="nav-item">
                    <a href="/about.html" class="nav-link">About</a>
                </li>
            </ul>
            <!-- Dekstop Menu-->
            <ul class="navbar-nav d-none d-lg-flex">
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <img src="/images/user_pc.svg" alt="" class="rounded-circle me-2 profile-pricture" />
                        Hi Fahmi
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/dashboard.html">Dashboard</a>

                        <a class="dropdown-item" href="/dashboard-account.html">Setting</a>

                        <hr class="dropdown-divider" />

                        <a class="dropdown-item" href="/">Logout</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link d-inline-block mt-2">
                        <img src="/images/shopping-empty.svg" alt="" />
                    </a>
                </li>
            </ul>
            <!-- + Dropdown -->
            <ul class="navbar-nav d-block d-lg-none">
                <li class="nav-item">
                    <a href="#" class="nav-link"> Hi, Fahmi</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('cart') }}" class="nav-link d-inline-block">Cart</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
