<?php
//error_reporting(0);

define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT']);

include SITE_ROOT . ('/HMS-Nhom11/backend/assets/include/config.php');
include SITE_ROOT . ('/HMS-Nhom11/backend/assets/include/header.php');

session_start();
$user_id = $_SESSION['auth_user_id'];

$error = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (isset($_POST['create']) && $_POST['create'] == 'create') {
    // username and password sent from form 
    $post_full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
    $post_user_name = mysqli_real_escape_string($conn, $_POST['user_name']);
    $post_password = mysqli_real_escape_string($conn, $_POST['password']);
    $post_email = mysqli_real_escape_string($conn, $_POST['email']);
    $post_contact_no = mysqli_real_escape_string($conn, $_POST['contact_no']);
    $post_address = mysqli_real_escape_string($conn, $_POST['address']);
    $post_city = mysqli_real_escape_string($conn, $_POST['city']);
    $post_gender = mysqli_real_escape_string($conn, $_POST['gender']);

    $sql = "UPDATE `dim_user` SET
        `user_name` = '$post_user_name',
        `full_name` = '$post_full_name',
        `contact_no` = $post_contact_no,
        `gender` = '$post_gender',
        `email_address` = '$post_email',
        `address` = '$post_address',
        `city` = '$post_city',
        `password` = '$post_password' 
        WHERE user_id = $user_id";

    $result = mysqli_query($conn, $sql);

    $_SESSION['auth_user_id'] = $user_id;
    $_SESSION['auth_user_role'] = 'patient';
    $_SESSION['auth_login_type'] = 'google_oauth';

    header('Refresh:0 , url=http://localhost:8080/HMS-Nhom11/role-patient/schedule.php');
  }
}
?>

<head>
  <title>
    Hoàn tất đăng ký
  </title>
</head>

<body class="">
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100"
        style="background-image: url('../assets/image/Hospital_Seamless1.png'); background-size: 400px 400px;">
        <div class="container">
          <div class="row">
            <div
              class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
              <div
                class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center"
                style="background-image: url('../assets/image/HKL.png'); background-size: cover;">
              </div>
            </div>
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
              <div class="card">
                <div class="card-header">
                  <h4 class="font-weight-bolder">Cập nhật thông tin</h4>
                  <p class="mb-0">Vui bổ sung các thông tin sau để hoàn tất việc tạo tài khoản</p>
                </div>

                <?php
                $temp_user_name = $_SESSION['temp_regis_name'];
                $temp_user_email = $_SESSION['temp_regis_email'];
                ?>

                <div class="card-body">
                  <form name="update_form" role="form" method="POST">
                    <div class="custom-input">
                      <input type="text" name="full_name" id="full_name" value="<?php echo $temp_user_name ?>" required>
                      <label>Họ và tên</label>
                    </div>
                    <div class="custom-input">
                      <input type="text" name="user_name" id="user_name" placeholder="Nhập tên đăng nhập" required>
                      <label>Tên đăng nhập</label>
                    </div>
                    <div class="custom-input">
                      <input type="password" name="password" id="password" placeholder="Nhập mật khẩu" required>
                      <label>Mật khẩu</label>
                    </div>
                    <div class="custom-input">
                      <select name="gender" id="gender" class="form-control" required>
                        <option value="" disabled selected>Chọn
                          giới tính</option>
                        <option value="male">Nam</option>
                        <option value="female">Nữ</option>
                      </select>
                      <label>Giới tính</label>
                      <div class="arrow-icon">
                        <i class="fa-solid fa-chevron-down"></i>
                      </div>
                    </div>
                    <div class="custom-input">
                      <input type="text" name="email" id="email" placeholder="Nhập địa chỉ email" value="<?php echo $temp_user_email ?>"
                        required>
                      <label>Địa chỉ email</label>
                    </div>
                    <div class="custom-input">
                      <input type="text" name="contact_no" id="contact_no" placeholder="84xxx" required>
                      <label>Số điện thoại</label>
                    </div>
                    <div class="custom-input">
                      <input type="text" name="address" id="address" placeholder="Địa chỉ" required>
                      <label>Địa chỉ</label>
                    </div>
                    <div class="custom-input">
                      <input type="text" name="city" id="city" placeholder="Nhập tên đăng nhập" required>
                      <label>Thành phố</label>
                    </div>
                    <div class="form-check form-check-info text-start ps-0">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                      <label class="form-check-label" for="flexCheckDefault">
                        Tôi đồng ý <a href="javascript:;" class="text-dark font-weight-bolder">Điều khoản và Điều
                          kiện</a>
                      </label>
                    </div>
                    <div class="text-center">
                      <button type="submit" name="create" value="create"
                        class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Cập nhật thông
                        tin</button>
                    </div>
                  </form>
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