<?php
define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT']);

include SITE_ROOT . ('/HMS-Nhom11/assets/include/config.php');
include SITE_ROOT . ('/HMS-Nhom11/assets/include/header.php');
?>

<head>
  <title>
    Quên mật khẩu
  </title>
</head>

<body class="bg-gray-200">
  <main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-100"
      style="background-image: url('./assets/image/Hospital_Seamless1.png'); background-size: 400px 400px;">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-4 col-md-8 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                  <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Tìm mật khẩu</h4>
                </div>
              </div>
              <div class="card-body">
                <p class="mb-0">Vui lòng nhập email đã đăng ký để lấy lại mật khẩu</p>
                <form role="form" class="text-start">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="custom-input">
                        <input type="text" name="email" id="email" placeholder="Nhập địa chỉ email">
                        <label>Địa chỉ email</label>
                      </div>
                    </div>
                  </div>
                  <div class="text-center">
                    <button type="button" class="btn bg-gradient-primary w-100 my-4 mb-2">Lấy lại mật khẩu</button>
                  </div>
                  <p class="mt-4 text-sm text-center">
                    Bạn cần đăng nhập?
                    <a href="./sign-in.php" class="text-primary text-gradient font-weight-bold">Đăng nhập ngay</a>
                  </p>
                  <p class="mt-4 text-sm text-center">
                    Bạn chưa có tài khoản?
                    <a href="./sign-up.php" class="text-primary text-gradient font-weight-bold">Đăng ký ngay</a>
                  </p>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <?php
  include SITE_ROOT . ('/HMS-Nhom11/assets/include/footer.php');
  ?>