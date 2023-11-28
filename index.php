<?php

require_once 'main/function.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Syalalala Workshop</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/Index/img/favicon.png" rel="icon">
  <link href="assets/Index/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/index/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/index/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/index/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/index/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/index/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/index/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/index/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: FlexStart - v1.11.1
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index.php" class="logo d-flex align-items-center">
        <img src="assets/index/img/logo.png" alt="">
        <span>Syalalala Workshop</span>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#portfolio">Workshop</a></li>
          <li><a class="nav-link scrollto" href="#team">Pemateri</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          <li><a class="getstarted scrollto" href="main/login.php">Daftar</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center">
          <h1 data-aos="fade-up">Mahir Frontend dengan React JS</h1>
          <h2 data-aos="fade-up" data-aos-delay="400">Build reusable UI components</h2>
          <div data-aos="fade-up" data-aos-delay="600">
            <div class="text-center text-lg-start">
              <a href="main/login.php" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                <span>Daftar Sekarang</span>
                <i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
          <img src="assets/index/img/react/React4.png" class="img-fluid" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">
    <!-- ======= About Section ======= -->
    <section id="about" class="about">

      <div class="container" data-aos="fade-up">
        <div class="row gx-0">

          <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
            <div class="content">
              <h3>Apa itu React JS?</h3>
              <h2>React adalah sebuah library JavaScript untuk membangun antarmuka pengguna yang dikembangkan oleh Facebook.</h2>
              <p>
                React memungkinkan Anda membangun bagian-bagian antarmuka pengguna yang dapat digunakan kembali dalam aplikasi yang berbeda.
                Dengan menggunakan React, Anda dapat dengan mudah membangun aplikasi yang responsif, cepat, dan mudah dikelola dengan menggunakan komponen yang dapat digunakan kembali.
              </p>
            </div>
          </div>

          <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
            <img src="assets/index/img/React/React2.jpg" class="img-fluid" alt="">
          </div>

        </div>
      </div>

    </section>
    <section class="about">

      <div class="container" data-aos="fade-up">
        <div class="row gx-0">

          <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
            <img src="assets/index/img/React/React7.jpeg" class="img-fluid" alt="">
          </div>

          <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
            <div class="content">
              <h3>Digunakan perusahaan besar</h3>
              <h2>Keunggulan yang dimiliki React JS tidak hanya di kalangan developer kecil.</h2>
              <p>
                React juga memiliki komunitas yang sangat aktif dan terus tumbuh, sehingga ada banyak sumber daya, dokumentasi, dan plugin tersedia untuk membantu dalam pengembangan aplikasi.
                Beberapa contoh website besar yang menggunakan React antara lain Facebook, Instagram, Netflix, Airbnb, dan Asana.
              </p>
            </div>
          </div>
        </div>
      </div>

    </section><!-- End About Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>Workshop</h2>
          <p>Check our list workshop to learn React</p>
        </header>

        <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">
          <?php
          $show = showAllWorkshopSort();
          foreach ($show as $r) { ?>

            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
              <div class="portfolio-wrap">
                <img src="gambar/<?php echo $r["gambar"] ?>" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4><?php echo $r["judul"] ?></h4>
                  <p><?php echo $r["deskripsi"] ?></p>
                  <div class="portfolio-links">
                    <a href="gambar/<?php echo $r["gambar"] ?>" data-gallery="portfolioGallery" class="portfokio-lightbox" title="App 1"><i class="bi bi-plus"></i></a>
                    <a href="main/login.php" title="More Details"><i class="bi bi-link"></i></a>
                  </div>
                </div>
              </div>
            </div>
          <?php }; ?>
        </div>

      </div>

    </section><!-- End Portfolio Section -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>Great Tutor</h2>
          <p>Speakers who have a lot of experience</p>
        </header>

        <div class="row gy-4">

          <?php
          $show = showAllData('pemateri');
          $delay = 100;
          foreach ($show as $r) {
            $delay = $delay + 100;
          ?>
            <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="<?php echo $delay ?>">
              <div class="member">
                <div class="member-img">
                  <img src="gambar/<?php echo $r["gambar"] ?>" class="img-fluid" alt="">
                  <div class="social">
                    <a><i class="bi bi-twitter"></i></a>
                    <a><i class="bi bi-facebook"></i></a>
                    <a><i class="bi bi-instagram"></i></a>
                    <a><i class="bi bi-linkedin"></i></a>
                  </div>
                </div>
                <div class="member-info">
                  <h4><?php echo $r["nama_pemateri"] ?></h4>
                  <span><?php echo $r["job"] ?></span>
                  <p><?php echo $r["deskripsi"] ?></p>
                </div>
              </div>
            </div>
          <?php }; ?>
        </div>

      </div>

    </section><!-- End Team Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>Contact</h2>
          <p>Contact Us</p>
        </header>

        <div class="row gy-4">

          <div class="col-lg-6">

            <div class="row gy-4">
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bi bi-geo-alt"></i>
                  <h3>Address</h3>
                  <p>Daerah Kobar ko lah<br>Jambi Indonesia</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bi bi-telephone"></i>
                  <h3>Call Us</h3>
                  <p>08123 456 789<br>08789 456 123</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bi bi-envelope"></i>
                  <h3>Email Us</h3>
                  <p>syalalalacorp@syalalala.com<br>contact@syalalala.com</p>
                </div>
              </div>
            </div>

          </div>

          <div class="col-lg-6">
            <form action="" method="post" class="php-email-form">
              <div class="row gy-4">

                <div class="col-md-6">
                  <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                </div>

                <div class="col-md-6 ">
                  <input type="email" class="form-control" name="email" placeholder="Your Email" required>
                </div>

                <div class="col-md-12">
                  <input type="text" class="form-control" name="subject" placeholder="Subject" required>
                </div>

                <div class="col-md-12">
                  <textarea class="form-control" name="message" rows="6" placeholder="Message" required></textarea>
                </div>

                <div class="col-md-12 text-center">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>

                  <button type="submit">Send Message</button>
                </div>

              </div>
            </form>

          </div>

        </div>

      </div>

    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-5 col-md-12 footer-info">
            <a href="index.php" class="logo d-flex align-items-center">
              <img src="assets/index/img/logo.png" alt="">
              <span>Syalalala Workshop</span>
            </a>
            <p>Hidup ini seperti sebuah kebun. Kita semua adalah tanaman yang sedang tumbuh. Jangan terlalu sibuk mencuri cahaya matahari orang lain, fokuslah pada pertumbuhanmu dan cahaya matahari mu sendiri. Serta kebahagiaan itu tidak terletak pada apa yang kamu miliki, tapi pada apa yang kamu rasakan. </p>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Syalalala</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/flexstart-bootstrap-startup-template/ -->
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/index/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/index/vendor/aos/aos.js"></script>
  <script src="assets/index/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/index/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/index/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/index/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/index/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/index/js/main.js"></script>

</body>

</html>