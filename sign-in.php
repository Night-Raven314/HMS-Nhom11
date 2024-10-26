<!DOCTYPE html>
<html lang="en">

<?php
//error_reporting(0);

define('SITE_ROOT', __DIR__);

include SITE_ROOT . ('/assets/include/config.php');
require_once SITE_ROOT . ('/assets/vendor/google-oauth/vendor/autoload.php');

session_start();
$error = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // username and password sent from form 
  $myusername = mysqli_real_escape_string($conn, $_POST['user_name']);
  $mypassword = mysqli_real_escape_string($conn, $_POST['password']);

  $sql = "SELECT * FROM `dim_user` WHERE `user_name` = '$myusername' and `password` = '$mypassword'";

  $result = mysqli_query($conn, $sql);
  $row = mysqli_num_rows($result);
  $count = mysqli_num_rows($result);

  if ($count == 1) {

    $row = mysqli_fetch_assoc($result);

    // session_register("myusername");
    $_SESSION['auth_login_user'] = $myusername;
    $_SESSION['auth_user_id'] = $row['user_id'];
    $_SESSION['auth_user_role'] = $row['role'];
    $_SESSION['auth_login_type'] = 'manual';
    header('Refresh:0 , url=http://localhost/HMS-Nhom11/redirect.php');
  } else {
    $error = "Your Login Name or Password is invalid";
  }
}

$client = new Google_Client();
$client->setClientId(google_app_id);
$client->setClientSecret(google_app_secret);
$client->setRedirectUri(google_app_callback_url);
$client->addScope("email");
$client->addScope("profile");
$client->addScope("https://www.googleapis.com/auth/user.addresses.read");
$client->addScope("https://www.googleapis.com/auth/user.birthday.read");
$client->addScope("https://www.googleapis.com/auth/user.gender.read");
$client->addScope("https://www.googleapis.com/auth/user.phonenumbers.read");

$google_url = $client->createAuthUrl();

?>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Đăng nhập
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css"
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="assets/css/material_dash.css" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
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
                  <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Đăng nhập</h4>
                </div>
              </div>
              <div class="card-body">
                <form name="auth_form" role="form" class="text-start" onsubmit="return validation()" method="POST">
                  <div class="input-group input-group-outline my-3">
                    <label class="form-label">Tên đăng nhập</label>
                    <input name="user_name" id="user_name" class="form-control">
                  </div>
                  <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Mật khẩu</label>
                    <input name="password" id="password" class="form-control">
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Đăng nhập</button>
                  </div>
                  <a class="btn bg-gradient-primary" onclick="googleAuthRedirect()">
                    <i class="fab fa-google" aria-hidden="true"></i>
                  </a>
                  <script>
                    function googleAuthRedirect() {
                      window.location.href = "<?php echo $google_url ?>";
                    }
                  </script>
                  <p class="mt-4 text-sm text-center">
                    <a href="./forgot-pwd.php" class="text-primary text-gradient font-weight-bold">Quên mật khẩu</a>
                  </p>
                  <p class="mt-4 text-sm text-center">
                    Bạn là nhân viên?
                    <a href="./sign-up.php" class="text-primary text-gradient font-weight-bold">Đăng nhập nhân viên</a>
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
  <!--   Core JS Files   -->
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>

  <script>
    function validation() {
      var id = document.auth_form.user_name.value;
      var ps = document.auth_form.password.value;
      if (id.length == "" && ps.length == "") {
        alert("Vui lòng điền tên đăng nhập và mật khẩu");
        return false;
      }
      else {
        if (id.length == "") {
          alert("Tên đăng nhập không được để trống");
          return false;
        }
        if (ps.length == "") {
          alert("Mật khẩu không được để trống");
          return false;
        }
      }
    }  
  </script>


  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/material-dashboard.min.js?v=3.1.0"></script>
</body>

</html>