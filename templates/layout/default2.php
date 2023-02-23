<!DOCTYPE html>
<html lang="en">
<?php
$currentController = $this->request->getParam('controller');
$currentAction = $this->request->getParam('action');
$isHome =$currentController === "Pages" && $currentAction === 'home';
// $isAbout =$currentController === "Pages" && $currentAction === 'about';
// $isContact =$currentController === "Pages" && $currentAction === 'contact';
// $isProject =$currentController === "Pages" && $currentAction === 'project';
$isLogin =$currentController === "Users" && $currentAction === 'login';
?>

<head>
<?= $this->Html->charset('utf-8') ?>
  <!-- <meta charset="utf-8"> -->
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>48 Degrees</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->

  <?= $this->Html->meta('/assets/img/logoweb.png') ?>



  <!-- <link href="/assets/img/favicon.png" rel="icon">
  <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon"> -->

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->

  <?= $this->Html->css('/assets/vendor/bootstrap/css/bootstrap.min.css') ?>
  <?= $this->Html->css('/assets/vendor/icofont/icofont.min.css') ?>
  <?= $this->Html->css('/assets/vendor/boxicons/css/boxicons.min.css') ?>
  <?= $this->Html->css('/assets/vendor/owl.carousel/assets/owl.carousel.min.css') ?>
  <?= $this->Html->css('/assets/vendor/venobox/venobox.css') ?>
  <?= $this->Html->css('/assets/vendor/aos/aos.css') ?>

  <!-- <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="/assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="/assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="/assets/vendor/aos/aos.css" rel="stylesheet"> -->

  <!-- Template Main CSS File -->
  <?= $this->Html->css('/assets/css/style.css') ?>
   <!-- <link href="/assets/css/style.css" rel="stylesheet"> -->

  <!-- =======================================================
  * Template Name: Maxim - v2.3.1
  * Template URL: https://bootstrapmade.com/maxim-free-onepage-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex">

      <div class="logo mr-auto">
        <!--text logo   -->
        <!-- <h1 class="text-light"><a href="index.html">48 Degrees</a></h1> -->
        <!-- image logo -->
        <!-- image logo -->
          <?php echo $this->Html->link(
          $this->Html->image('/assets/img/logo.png',array('alt'=>'our bigass logo', 'class'=>'logo me-auto')),
              array('controller' => 'pages', 'action' => 'home'), array('escape' => false)
              );?>


      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active">
<!--            <a class="nav-link" href="/pages/home">Home</a>-->
              <?php echo $this->Html->link('Home', array('controller' => 'pages', 'action' => 'home')); ?>
          </li>
            <li><?php echo $this->Html->link('About Us', array('controller' => 'pages', 'action' => '/home#about')); ?></li>
            <li><?php echo $this->Html->link('Services', array('controller' => 'pages', 'action' => '/home#services')); ?></li>
            <li><?php echo $this->Html->link('Portfolio', array('controller' => 'pages', 'action' => '/home#portfolio')); ?></li>
            <li><?php echo $this->Html->link('Testimonials', array('controller' => 'pages', 'action' => '/home#testimonials')); ?></li>
            <li><?php echo $this->Html->link('Contact Us', array('controller' => 'pages', 'action' => '/home#contact')); ?></li>

<!--          <li><a href="#about">About Us</a></li>-->
<!--          <li><a href="#services">Services</a></li>-->
<!--          <li><a href="#portfolio">Portfolio</a></li>-->
<!--          <li><a href="#testimonials">Testimonials</a></li>-->
<!--          <li><a href="/pages/contact">Contact Us</a></li>-->

          <li class="nav-item">
             <?= $this->Html->link('Login', ['controller'=>'Users', 'action'=>'login']) ?>
          </li>

          <!-- <li class="drop-down"><a href="">Drop Down</a>
            <ul>



              <li><a href="#">Drop Down 1</a></li>
              <li class="drop-down"><a href="#">Drop Down 2</a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
              <li><a href="#">Drop Down 5</a></li>
            </ul>
          </li> -->


        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->



            <?= $this->fetch('content') ?>
           <?= $this->Flash->render()  ?>



  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <h3>48 Degrees</h3>
              <p>
                <br>A108 Adam Street </br>
                  <br>Woodside Building for Technology and Design, Clayton VIC 3800</br>
                <strong>Phone:</strong> +61 32445 234<br>
                <strong>Email:</strong> info@48.com<br>
              </p>

              <!-- SOCIAL MEDIA LINKS       -->

              <!-- <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div> -->
            </div>
          </div>

          <!-- <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>

          </div> -->

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>48 Degrees</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/maxim-free-onepage-bootstrap-theme/ -->
        <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <?= $this->Html->script('/assets/vendor/jquery/jquery.min.js') ?>
  <?= $this->Html->script('/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>
  <?= $this->Html->script('/assets/vendor/jquery.easing/jquery.easing.min.js') ?>
  <?= $this->Html->script('/assets/vendor/php-email-form/validate.js') ?>
  <?= $this->Html->script('/assets/vendor/owl.carousel/owl.carousel.min.js') ?>
  <?= $this->Html->script('/assets/vendor/isotope-layout/isotope.pkgd.min.js') ?>
  <?= $this->Html->script('/assets/vendor/venobox/venobox.min.js') ?>
  <?= $this->Html->script('/assets/vendor/aos/aos.js') ?>

  <!-- <script src="/assets/vendor/jquery/jquery.min.js"></script>
  <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="/assets/vendor/php-email-form/validate.js"></script>
  <script src="/assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="/assets/vendor/venobox/venobox.min.js"></script>
  <script src="/assets/vendor/aos/aos.js"></script> -->

  <!-- Template Main JS File -->
  <?= $this->Html->script('/assets/js/main.js') ?>
  <!-- <script src="/assets/js/main.js"></script> -->

</body>

</html>
