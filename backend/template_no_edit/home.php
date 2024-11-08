<?php
define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT']);

include SITE_ROOT . ('/HMS-Nhom11/assets/include/config.php');
include SITE_ROOT . ('/HMS-Nhom11/assets/include/header.php');
?>

<head>
    <title>
        Default
    </title>
</head>

<!-- Side Nav -->

<body class="g-sidenav-show bg-gray-300">

  <!-- End Side Nav -->

  <main class="main-content border-radius-lg ">
    <!-- Navbar -->

    <nav
      class="navbar navbar-main navbar-expand-lg px-0 mx-4 border-radius-xl shadow-none position-sticky blur shadow-blur mt-4 left-auto top-1 z-index-sticky"
      id="navbarBlur" data-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <img src="assets/image/logo01-sq.png" class="navbar-brand-img" style="height:35px" alt="main_logo">
          <span class="ms-1 font-weight-bold text-dark">HKL Hospital</span>

        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">

          </div>
          <ul class="navbar-nav  justify-content-end">

            <li class="nav-item d-flex align-items-center">
          </ul>

          <ul class="navbar-nav  justify-content-end">

            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <!-- Right corner user section -->
            </li>
            <li class="nav-item d-flex align-items-center">
              <a class="btn btn-outline-primary btn-sm mb-0 me-3" target="_blank" href="sign-in.php">Đăng nhập</a>
            </li>
            <li class="nav-item d-flex align-items-center">
              <a class="btn bg-gradient-primary btn-sm mb-0 me-3" target="_blank" href="sign-up.php">Đăng ký</a>
            </li>
            </li>

            <li class="nav-item d-flex align-items-center">
          </ul>

        </div>
      </div>
    </nav>

    <!-- End Navbar -->

  </main>

  <!-- Site Details -->

  <!-- End Site Details -->

  <footer class="footer py-4  ">
    <div class="container-fluid">
      <div class="row align-items-center justify-content-lg-between">
        <div class="col-lg-6 mb-lg-0 mb-4">
          <div class="copyright text-center text-sm text-muted text-lg-start">
            ©
            <script>
              document.write(new Date().getFullYear())
            </script>,
            made with <i class="fa fa-heart"></i> by
            <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Huan, Khoa and Long</a>
            for Uni 24-25.
          </div>
        </div>
        <div class="col-lg-6">
          <ul class="nav nav-footer justify-content-center justify-content-lg-end">
            <li class="nav-item">
              <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative Tim</a>
            </li>
            <li class="nav-item">
              <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted" target="_blank">About
                Us</a>
            </li>
            <li class="nav-item">
              <a href="https://www.creative-tim.com/blog" class="nav-link text-muted" target="_blank">Blog</a>
            </li>
            <li class="nav-item">
              <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted"
                target="_blank">License</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>

<?php
include SITE_ROOT . ('/HMS-Nhom11/assets/include/footer.php');
?>