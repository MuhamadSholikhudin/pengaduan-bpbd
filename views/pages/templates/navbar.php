  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="<?= $url ?>/?pages=home"><img src="<?= $url ?>/assets/images/bpbdkudus.png" alt="logo"><span>BPBD</span>KUDUS</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="<?= $url ?>/assets/pages/assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a href="<?= $url ?>/?pages=home" class="<?= $_GET[array_keys($_GET)[0]] == "home" ? "active" : "" ?>">Home</a></li>

          <!-- <li class="dropdown"><a href="#"><span>About</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="about.html">About Us</a></li>
              <li><a href="team.html">Team</a></li>
              <li><a href="testimonials.html">Testimonials</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
            </ul>
          </li>

          <li><a href="services.html">Services</a></li>
          <li><a href="portfolio.html">Portfolio</a></li>
          <li><a href="pricing.html">Pricing</a></li> -->
          <li><a href="<?= $url ?>/?pages=blog" class="<?= $_GET[array_keys($_GET)[0]] == "blog" || $_GET[array_keys($_GET)[0]] == "blog_post"  ? "active" : "" ?>">Blog</a></li>
          <li><a href="<?= $url ?>/?pages=contact" class="<?= $_GET[array_keys($_GET)[0]] == "contact" ? "active" : "" ?>">Contact</a></li>

          <?php
          if (isset($_SESSION['id_user'])) { ?>
            <li><a href="<?= $url ?>/?dashboard=dashboard">Dashboard</a></li>
          <?php
          } else {
          ?>
            <li><a href="<?= $url ?>/?pages=login">Login</a></li>
          <?php
          }
          ?>


        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <div class="header-social-links d-flex">
        <a href="#" class="twitter"><i class="bu bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bu bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bu bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bu bi-linkedin"></i></i></a>
      </div>

    </div>
  </header><!-- End Header -->