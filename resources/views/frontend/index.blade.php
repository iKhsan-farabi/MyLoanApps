<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
      rel="stylesheet"
    />

    <title>MyLoan - Inventory</title>

    <!-- Bootstrap core CSS -->
<link href="{{ asset('assets/frontend/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />

<!-- Additional CSS Files -->
<link rel="stylesheet" href="{{ asset('assets/frontend/assets/css/fontawesome.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/frontend/assets/css/templatemo-cyborg-gaming.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/frontend/assets/css/owl.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/frontend/assets/css/animate.css') }}" />
<link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

  </head>

  <body>
    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
      <div class="preloader-inner">
        <span class="dot"></span>
        <div class="dots">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <nav class="main-nav">
              <!-- ***** Logo Start ***** -->
              <a href="index.html" class="logo">
                <img src="{{ asset('assets/frontend/assets\images\logo.png') }}" alt="" />
              </a>
              <!-- ***** Logo End ***** -->
              <!-- ***** Search End ***** -->
              <!-- ***** Search End ***** -->
              <!-- ***** Menu Start ***** -->
              <ul class="nav">
                <li><a href="index.html" class="active">Home</a></li>
                <li><a href="#ourteam">Our Team</a></li>
                <li><a href="#our-superiority">Our Benefit</a></li>
                       
                @if (Route::has('login'))
                    @auth
                        <li><a href="{{ url('/home') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a></li>
                    @else
                        <li><a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a></li>
                
                        @if (Route::has('register'))
                            <li><a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a></li>
                        @endif
                    @endauth
                @endif
             
              </ul>
              <a class="menu-trigger">
                <span>Menu</span>
              </a>
              <!-- ***** Menu End ***** -->
            </nav>
          </div>
        </div>
      </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="page-content shadow p-3 mb-5">
            <!-- ***** Banner Start ***** -->
            <div class="main-banner">
              <div class="row">
                <div class="col-lg-7">
                  <div class="header-text" style="display: none">
                    <h6>Selamat datang di</h6>
                    <h4 class="text-dark"><em class="text-primary">MY</em> LOAN</h4>
                    <div class="main-button">
                      <a href="#browse.html"
                        >Inventaris Efektif, Bisnis Efisien!</a
                      >
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- ***** Banner End ***** -->

            <!-- ***** Most Popular Start ***** -->
            <div id="ourteam" class="most-popular">
              <div class="row">
                <div class="col-lg-12">
                  <div class="heading-section">
                    <h4 class="text-primary"><em class="text-dark">MEET</em> OUR TEAM</h4>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-sm-6 ">
                      <div class="item shadow p-3 mb-5">
                        <img src="{{ asset('assets\frontend\assets\GIF\1. royan.gif') }}" alt="royan" />
                        <h4 class="text-dark">Royan Sabila Rosyad<br /><span>Project Manager</span></h4>
                      </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                      <div class="item shadow p-3 mb-5">
                        <img src="{{ asset('assets\frontend\assets\GIF\2. ikhsan.gif') }}" alt="ikhsan" />
                        <h4 class="text-dark">Nadhif Ali Ikhsani<br /><span>Backend Dev</span></h4>
                      </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                      <div class="item shadow p-3 mb-5">
                        <img src="{{ asset('assets\frontend\assets\GIF\3. reja.gif') }}" alt="reja" />
                        <h4 class="text-dark">M. Rehza Pahlevi<br /><span>Frontend Dev</span></h4>
                      </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                      <div class="item shadow p-3 mb-5">
                        <img src="{{ asset('assets\frontend\assets\GIF\4. gibral.gif') }}" alt="gibral" />
                        <h4 class="text-dark">Gibral Anugrah<br /><span>Quality Assurance</span></h4>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="main-button">
                        <a href="{{ url('#browse.html') }}">Soliiid! 😠✊🔥</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>            
            <!-- ***** Most Popular End ***** -->

            <!-- ***** Gaming Library Start ***** -->
<div id="our-superiority" class="gaming-library">
  <div class="col-lg-12">
    <div class="heading-section">
      <h4 class="text-primary"><em class="text-dark">OUR</em> BENEFIT</h4>
    </div>

    <div class="featured-games header-text shadow p-3 mb-5">
      <div class="owl-features owl-carousel">
        <div class="item">
          <div class="thumb">
            <img src="{{ asset('assets\frontend\assets\images\analisis-data.jpeg') }}" alt="">
            <div class="hover-effect">
              <h6>1.4K Melihat</h6>
            </div>
          </div>
          <h4 class="text-dark">Analisis Data<br><span>Menyediakan informasi analitis untuk pengambilan keputusan yang lebih baik.</span></h4>
        </div>
        <div class="item">
          <div class="thumb">
            <img src="{{ asset('assets\frontend\assets\images\inofativ.jpeg') }}" alt="">
            <div class="hover-effect">
              <h6>2.4K Melihat</h6>
            </div>
          </div>
          <h4 class="text-dark">Inovatif<br><span>Menghadirkan solusi inventarisasi terkini dan terdepan.</span></h4>
        </div>
        <div class="item">
          <div class="thumb">
            <img src="{{ asset('assets\frontend\assets\images\canggih.jpeg') }}" alt="">
            <div class="hover-effect">
              <h6>2.1K Melihat</h6>
            </div>
          </div>
          <h4 class="text-dark">Canggih<br><span>Teknologi terbaru untuk efisiensi dan keakuratan yang tinggi.</span></h4>
        </div>
        <div class="item">
          <div class="thumb">
            <img src="{{ asset('assets\frontend\assets\images\skalabilitas.jpeg') }}" alt="">
            <div class="hover-effect">
              <h6>1.1K Melihat</h6>
            </div>
          </div>
          <h4 class="text-dark">Skalabilitas<br><span>Dapat disesuaikan kebutuhan perusahaan berbagai skala.</span></h4>
        </div>
        <div class="item">
          <div class="thumb">
            <img src="{{ asset('assets\frontend\assets\images\secure.jpeg') }}" alt="">
            <div class="hover-effect">
              <h6>3.4K Melihat</h6>
            </div>
          </div>
          <h4 class="text-dark">Keamanan<br><span>Sistem keamanan tinggi untuk melindungi data inventaris Anda.</span></h4>
        </div>
        <div class="item">
          <div class="thumb">
            <img src="{{ asset('assets\frontend\assets\images\real-time.jpeg') }}" alt="">
            <div class="hover-effect">
              <h6>5.1K Melihat</h6>
            </div>
          </div>
          <h4 class="text-dark">Pelaporan Real-time<br><span>Laporan yang akurat dan up-to-date untuk kontrol yang lebih baik.</span></h4>
        </div>
      </div>
    </div>
  </div>
</div>

            <!-- ***** Gaming Library End ***** -->
          </div>
        </div>
      </div>
    </div>

    <footer>
      <div class="container">
        <div class="row">
          <div class="col-lg-12 ">
            <p class="text-dark">
              Copyright © 2023 <a href="#" class="text-primary">MyLoan</a> Company. All rights
              reserved.            
            </p>
          </div>
        </div>
      </div>
    </footer>

<!-- Scripts -->
<!-- Bootstrap core JavaScript -->
<script src="{{ asset('assets/frontend/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/frontend/vendor/bootstrap/js/bootstrap.min.js') }}"></script>

<script src="{{ asset('assets/frontend/assets/js/isotope.min.js') }}"></script>
<script src="{{ asset('assets/frontend/assets/js/owl-carousel.js') }}"></script>
<script src="{{ asset('assets/frontend/assets/js/tabs.js') }}"></script>
<script src="{{ asset('assets/frontend/assets/js/popup.js') }}"></script>
<script src="{{ asset('assets/frontend/assets/js/custom.js') }}"></script>

  </body>
</html>
