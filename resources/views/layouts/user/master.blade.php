<!DOCTYPE html>
<html lang="en">
<head>
  @include('layouts.user.header')
  @stack('customcss')
</head>
<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>

  {{-- <header>
    <div class="topbar">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 text-sm">
            <div class="site-info">
              <a href="#"><span class="mai-call text-primary"></span> +00 123 4455 6666</a>
              <span class="divider">|</span>
              <a href="#"><span class="mai-mail text-primary"></span> mail@example.com</a>
            </div>
          </div>
          <div class="col-sm-4 text-right text-sm">
            <div class="social-mini-button">
              <a href="#"><span class="mai-logo-facebook-f"></span></a>
              <a href="#"><span class="mai-logo-twitter"></span></a>
              <a href="#"><span class="mai-logo-dribbble"></span></a>
              <a href="#"><span class="mai-logo-instagram"></span></a>
            </div>
          </div>
        </div> <!-- .row -->
      </div> <!-- .container -->
    </div> <!-- .topbar -->

    <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
      <div class="container">
        <a class="navbar-brand" href="#"><span class="text-primary">One</span>-Health</a>

        <div class="collapse navbar-collapse" id="navbarSupport">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="">Beranda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="">Tentang Kami</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="">Dokter</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="">Antrian</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="">Kontak</a>
            </li>
            <li class="nav-item">
              <a class="btn btn-primary ml-lg-3" href="{{ route('masuk') }}">Login / Register</a>
            </li>
          </ul>
        </div> <!-- .navbar-collapse -->
      </div> <!-- .container -->
    </nav>
  </header> --}}
  @include('layouts.user.nav')

  <div class="page-hero bg-image overlay-dark" style="background-image: url(../assets/img/bg_image_1.jpg);">
    <div class="hero-section">
      <div class="container text-center wow zoomIn">
        {{-- <span class="subhead">Let's make your life happier</span> --}}
        <span class="subhead">Jadilah Hidup Anda Lebih Bahagia</span>
        <h1 class="display-4">Hidup Sehat</h1>
        <a href="#" class="btn btn-primary">Ayo Berkonsultasi</a>
      </div>
    </div>
  </div>

  <div id="content">
      @yield('content')
  </div>

  @include('layouts.user.footer')

<script src="../assets/js/jquery-3.5.1.min.js"></script>

<script src="../assets/js/bootstrap.bundle.min.js"></script>

<script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

<script src="../assets/vendor/wow/wow.min.js"></script>

<script src="../assets/js/theme.js"></script>

@stack('customjs')
  
</body>
</html>