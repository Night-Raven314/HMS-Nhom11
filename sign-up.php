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
    $_SESSION['auth_login_email'] = $row['email_address'];
    $_SESSION['auth_user_id'] = $row['user_id'];
    $_SESSION['auth_user_role'] = $row['role'];
    $_SESSION['auth_login_type'] = 'manual';
    header('Refresh:0 , url=http://localhost/HMS-Nhom11/redirect.php');
  } else {
    $error = "Your Login Name or Password is invalid";
  }
}

// Google oAuth Initialize
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

// Facebook oAuth Initialize
$params = [
  'client_id' => facebook_app_id,
  'redirect_uri' => facebook_app_callback_url,
  'response_type' => 'code',
  'scope' => 'email'
];
$facebook_url = 'https://www.facebook.com/dialog/oauth?' . http_build_query($params)


  ?>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta name="referrer" content="no-referrer-when-downgrade">
  <meta name="Cross-Origin-Opener-Policy" content="same-origin-allow-popups">

  <title>
    Đăng ký
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css"
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="./assets/css/material_dash.css" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body class="">
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100"
        style="background-image: url('./assets/image/Hospital_Seamless1.png'); background-size: 400px 400px;">
        <div class="container">
          <div class="row">
            <div
              class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
              <div
                class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center"
                style="background-image: url('./assets/image/HKL.png'); background-size: cover;">
              </div>
            </div>
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
              <div class="card">
                <div class="card-header">
                  <h4 class="font-weight-bolder">Đăng ký</h4>
                  <p class="mb-0">Vui lòng điền các thông tin sau để đăng ký</p>
                </div>
                <div class="card-body">
                  <form role="form">
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Họ và Tên</label>
                      <input type="full_name" class="form-control">
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Email</label>
                      <input type="email" class="form-control">
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Tên đăng nhập</label>
                      <input type="user_name" class="form-control">
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Mật khẩu</label>
                      <input type="password" class="form-control">
                    </div>
                    <div class="form-check form-check-info text-start ps-0">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                      <label class="form-check-label" for="flexCheckDefault">
                        Tôi đồng ý <a href="javascript:;" class="text-dark font-weight-bolder">Điều khoản và Điều
                          kiện</a>
                      </label>
                    </div>
                    <div class="text-center">
                      <button type="button" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Đăng
                        ký</button>
                    </div>
                    <div class="text-center" style="padding-top: 20px; padding-bottom: 10px;">
                      <a class="text-primary text-gradient font-weight-bold">Hoặc sử dụng tài khoản liên kết</a>
                    </div>
                    <div class="text-center">
                      <a class="btn bg-gradient-primary" onclick="googleAuthRedirect()">
                        <i class="fab fa-google" aria-hidden="true"></i>
                      </a>
                      <script>
                        function googleAuthRedirect() {
                          window.location.href = "<?php echo $google_url ?>";
                        }
                      </script>
                      <a class="btn bg-gradient-primary" href="assets/include/oauth/f-authenticate.php">
                        <i class="fab fa-facebook" aria-hidden="true"></i>
                      </a>
                      <script>
                        function facebookAuthRedirect() {
                          window.location.href = "<?php echo $facebook_url ?>";
                        }
                      </script>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  </p>
                  <p class="mt-4 text-sm text-center">
                    Bạn đã có tài khoản?
                    <a href="./sign-in.php" class="text-primary text-gradient font-weight-bold">Đăng nhập ngay</a>
                  </p>
                  <p class="mt-4 text-sm text-center">
                    Bạn là nhân viên?
                    <a href="./sign-in.php" class="text-primary text-gradient font-weight-bold">Đăng nhập ở đây</a>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
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
    window.fbAsyncInit = function () {
      FB.init({
        appId: '{your-app-id}',
        cookie: true,
        xfbml: true,
        version: '{api-version}'
      });

      FB.AppEvents.logPageView();

    };

    (function (d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) { return; }
      js = d.createElement(s); js.id = id;
      js.src = "https://connect.facebook.net/en_US/sdk.js";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
  </script>

  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.min.js?v=3.1.0"></script>
  <script src="https://accounts.google.com/gsi/client" async></script>
</body>

</html>