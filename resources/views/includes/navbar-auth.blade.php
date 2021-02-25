  <nav class="navbar navbar-expand-lg navbar-light navbar-store fixed-top navbar-fixed-top" data-aos="fade-down">
      <div class="container">
          <a href="{{ route('home') }}" class="navbar-brand">
              <img src="{{ url('/images/logo.svg') }}" alt="Logo" />
          </a>

          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
              aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
              <!-- ml -> ms -->
              <ul class="navbar-nav ms-auto">
                  <li class="nav-item">
                      <a href="{{ route('home') }}" class="nav-link" aria-current="page">Home</a>
                  </li>
                  <li class="nav-item">
                      <a href="portofolio" class="nav-link">Shop</a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ route('categories') }}" class="nav-link">Categories</a>
                  </li>
                  <li class="nav-item">
                      <a href="about" class="nav-link">About</a>
                  </li>

              </ul>
          </div>
      </div>
  </nav>
