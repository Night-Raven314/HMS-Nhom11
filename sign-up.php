<!DOCTYPE html>
<html lang="en">

<?php
include('site_root.php');

require_once SITE_ROOT.('\assets\include\config.php');
require_once SITE_ROOT.('\assets\include\oauth\user.class.php');

if(isset($_GET['code'])){ 
  $gClient->authenticate($_GET['code']); 
  $_SESSION['token'] = $gClient->getAccessToken(); 
  header('Location: ' . filter_var(GOOGLE_REDIRECT_URL, FILTER_SANITIZE_URL)); 
} 

if(isset($_SESSION['token'])){ 
  $gClient->setAccessToken($_SESSION['token']); 
} 

if($gClient->getAccessToken()){ 
  // Get user profile data from google 
  $gpUserProfile = $google_oauthV2->userinfo->get(); 
   
  // Initialize User class 
  $user = new User(); 
   
  // Getting user profile info 
  $gpUserData = array(); 
  $gpUserData['oauth_uid']  = !empty($gpUserProfile['id'])?$gpUserProfile['id']:''; 
  $gpUserData['first_name'] = !empty($gpUserProfile['given_name'])?$gpUserProfile['given_name']:''; 
  $gpUserData['last_name']  = !empty($gpUserProfile['family_name'])?$gpUserProfile['family_name']:''; 
  $gpUserData['email']       = !empty($gpUserProfile['email'])?$gpUserProfile['email']:''; 
  $gpUserData['gender']       = !empty($gpUserProfile['gender'])?$gpUserProfile['gender']:''; 
  $gpUserData['locale']       = !empty($gpUserProfile['locale'])?$gpUserProfile['locale']:''; 
  $gpUserData['picture']       = !empty($gpUserProfile['picture'])?$gpUserProfile['picture']:''; 
   
  // Insert or update user data to the database 
  $gpUserData['oauth_provider'] = 'google'; 
  $userData = $user->checkUser($gpUserData); 
   
  // Storing user data in the session 
  $_SESSION['userData'] = $userData; 
   
  // Render user profile data 
  if(!empty($userData)){ 
      $output     = '<h2>Google Account Details</h2>'; 
      $output .= '<div class="ac-data">'; 
      $output .= '<img src="'.$userData['picture'].'">'; 
      $output .= '<p><b>Google ID:</b> '.$userData['oauth_uid'].'</p>'; 
      $output .= '<p><b>Name:</b> '.$userData['first_name'].' '.$userData['last_name'].'</p>'; 
      $output .= '<p><b>Email:</b> '.$userData['email'].'</p>'; 
      $output .= '<p><b>Gender:</b> '.$userData['gender'].'</p>'; 
      $output .= '<p><b>Locale:</b> '.$userData['locale'].'</p>'; 
      $output .= '<p><b>Logged in with:</b> Google Account</p>'; 
      $output .= '<p>Logout from <a href="logout.php">Google</a></p>'; 
      $output .= '</div>'; 
  }else{ 
      $output = '<h3 style="color:red">Some problem occurred, please try again.</h3>'; 
  } 
}else{ 
  // Get login url 
  $authUrl = $gClient->createAuthUrl(); 
   
  // Render google login button 
  $output = '<a href="'.filter_var($authUrl, FILTER_SANITIZE_URL).'" class="login-btn">Sign in with Google</a>'; 
} 

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
                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <a class="text-primary text-gradient font-weight-bold">Hoặc sử dụng tài khoản liên kết</a>
                  <p class="mt-4 text-sm text-center">
                    <script src="https://accounts.google.com/gsi/client" async></script>
                  <div id="g_id_onload"
                    data-client_id="104458844677-uvj7eo80ufvo6cimqoa3jr4s2rldoje2.apps.googleusercontent.com"
                    data-login_uri="http://localhost/HMS-Nhom11/HMS-Nhom11/" data-auto_prompt="false">
                  </div>
                  <div class="g_id_signin" data-type="standard" data-size="large" data-theme="outline"
                    data-text="sign_in_with" data-shape="rectangular" data-logo_alignment="left">
                  </div>
                  <a class="btn bg-gradient-primary" data-client_id="104458844677-uvj7eo80ufvo6cimqoa3jr4s2rldoje2.apps.googleusercontent.com"
                  data-login_uri="http://localhost/HMS-Nhom11/HMS-Nhom11/" data-auto_prompt="false">
                    <i class="fab fa-facebook" aria-hidden="true"
                      ></i>
                  </a>
                  <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/material-dashboard"
                    class="btn bg-gradient-primary" target="_blank">
                    <i class="fab fa-zalo" aria-hidden="true"></i>
                  </a>
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
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.min.js?v=3.1.0"></script>
  <script src="https://accounts.google.com/gsi/client" async></script>
</body>

</html>