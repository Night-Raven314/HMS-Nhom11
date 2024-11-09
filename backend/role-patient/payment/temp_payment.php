<!DOCTYPE html>
<html lang="en">

<?php
//error_reporting(0);

define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT']);

include SITE_ROOT . ('/HMS-Nhom11/backend/assets/include/config.php');

date_default_timezone_set('Asia/Ho_Chi_Minh');

session_start();

?>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../backend/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../backend/assets/img/favicon.png">
  <meta name="referrer" content="no-referrer-when-downgrade">
  <meta name="Cross-Origin-Opener-Policy" content="same-origin-allow-popups">

  <title>
    Thông tin thanh toán
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css"
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />

  <!-- Nucleo Icons -->
  <link href="../backend/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../backend/assets/css/nucleo-svg.css" rel="stylesheet" />

  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

  <!-- CSS Files -->
  <link id="pagestyle" href="../backend/assets/css/material_dash.css" rel="stylesheet" />
  <link id="pagestyle" href="../backend/assets/css/style.css" rel="stylesheet" />
</head>

<body>
  <main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-100"
      style="background-image: url('../backend/assets/image/Hospital_Seamless1.png'); background-size: 400px 400px;">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-4 col-md-8 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                  <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Test Thanh toán</h4>
                </div>
              </div>
              <div class="card-body">
                <form action="process_payment.php" role="form" class="text-start" method="POST">
                  <div class="input-group input-group-outline my-3">
                    <label class="form-label">Loại đơn hàng</label>
                    <input name="payment_type" id="payment_type" class="form-control">
                  </div>
                  <div class="input-group input-group-outline my-3">
                    <label class="form-label">Giá trị</label>
                    <input name="amount" id="amount" class="form-control">
                  </div>
                  <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Nội dung</label>
                    <input name="payment_desc" id="payment_desc" class="form-control">
                  </div>
                  <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Tham chiếu hệ thống</label>
                    <input name="reference_id" id="reference_id" class="form-control">
                  </div>
                  <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Phương thức</label>
                    <input name="bank_code" id="bank_code" class="form-control">
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Thanh toán</button>
                  </div>

                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
</body>

<!--   Core JS Files   -->
<script src="../backend/assets/js/core/popper.min.js"></script>
<script src="../backend/assets/js/core/bootstrap.min.js"></script>
<script src="../backend/assets/js/plugins/perfect-scrollbar.min.js"></script>
<script src="../backend/assets/js/plugins/smooth-scrollbar.min.js"></script>


<script>
  var win = navigator.platform.indexOf('Win') > -1;
  if (win && document.querySelector('#sidenav-scrollbar')) {
    var options = {
      damping: '0.5'
    }
    Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
  }
</script>

<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>


<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="../backend/assets/js/material-dashboard.min.js"></script>
<script src="../backend/assets/js/popup.js"></script>
</body>

</html>