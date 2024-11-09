<?php
//error_reporting(0);

define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT']);

include SITE_ROOT . ('/HMS-Nhom11/backend/assets/include/config.php');
include SITE_ROOT . ('/HMS-Nhom11/backend/assets/include/header.php');

require_once SITE_ROOT . ('/HMS-Nhom11/backend/assets/vendor/google-oauth/vendor/autoload.php');

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
    header('Refresh:0 , url=http://localhost:8080/HMS-Nhom11/backend/assets/include/redirect.php');
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
  <title>
    Default
  </title>
</head>

<body class="">
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100"
        style="background-image: url('./backend/assets/image/Hospital_Seamless1.png'); background-size: 400px 400px;">
        <div class="container">
          <div class="row">
            <div
              class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
              <div
                class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center"
                style="background-image: url('./backend/assets/image/HKL.png'); background-size: cover;">
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
                    <div class="row">
                      <div class="col-md-12">
                        <div class="custom-input">
                          <input type="text" name="full_name" id="full_name" placeholder="Nhập họ và tên">
                          <label>Họ và tên</label>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="custom-input">
                          <input type="text" name="email" id="email" placeholder="Nhập địa chỉ email">
                          <label>Địa chỉ email</label>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="custom-input">
                          <input type="text" name="user_name" id="user_name" placeholder="Nhập tên đăng nhập">
                          <label>Tên đăng nhập</label>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="custom-input">
                          <input type="password" name="password" id="password" placeholder="Nhập mật khẩu">
                          <label>Mật khẩu</label>
                        </div>
                      </div>
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
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

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

  <?php
  include SITE_ROOT . ('/HMS-Nhom11/backend/assets/include/footer.php');
  ?>