<?php
define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT']);

include('sess-check.php');
include SITE_ROOT . ('/HMS-Nhom11/backend/assets/include/config.php');
include SITE_ROOT . ('/HMS-Nhom11/backend/assets/include/header.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['create']) && $_POST['create'] == 'create') {
        $post_full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
        $post_user_name = mysqli_real_escape_string($conn, $_POST['user_name']);
        $post_email = mysqli_real_escape_string($conn, $_POST['email_address']);
        $post_contact_no = mysqli_real_escape_string($conn, $_POST['contact_no']);
        $post_gender = mysqli_real_escape_string($conn, $_POST['gender']);
        $post_role = mysqli_real_escape_string($conn, $_POST['role']);
        $post_address = mysqli_real_escape_string($conn, $_POST['address']);
        $post_city = mysqli_real_escape_string($conn, $_POST['city']);
        $default_pwd = "P@ss123";

        $sql = "INSERT INTO `dim_user` (`user_name`, `full_name`, `password`, `email_address`, `contact_no`, `role`, `gender`, `address`, `city`) VALUES ('$post_user_name', '$post_full_name', '$default_pwd', '$post_email', $post_contact_no, '$post_role', '$post_gender', '$post_address', '$post_city')";

        $add = mysqli_query($conn, $sql);

        echo "<script type='text/javascript'>alert('Thêm tài khoản thành công');</script>";

        header('Refresh:0 , url=http://localhost:8080/HMS-Nhom11/role-admin/employee.php');
    }

    if (isset($_POST['update'])) {
        $post_full_name = (empty(mysqli_real_escape_string($conn, $_POST['full_name'])) === true) ? $fullname : mysqli_real_escape_string($conn, $_POST['full_name']);
        $post_user_name = (empty(mysqli_real_escape_string($conn, $_POST['user_name'])) === true) ? $user_name : mysqli_real_escape_string($conn, $_POST['user_name']);
        $post_email = (empty(mysqli_real_escape_string($conn, $_POST['email_address'])) === true) ? $emailaddress : mysqli_real_escape_string($conn, $_POST['email_address']);
        $post_contact_no = (empty(mysqli_real_escape_string($conn, $_POST['contact_no'])) === true) ? $phone : mysqli_real_escape_string($conn, $_POST['contact_no']);
        $post_gender = (empty(mysqli_real_escape_string($conn, $_POST['gender'])) === true) ? $gender : mysqli_real_escape_string($conn, $_POST['gender']);
        $post_role = (empty(mysqli_real_escape_string($conn, $_POST['role'])) === true) ? $role : mysqli_real_escape_string($conn, $_POST['role']);
        $post_address = (empty(mysqli_real_escape_string($conn, $_POST['address'])) === true) ? $address : mysqli_real_escape_string($conn, $_POST['address']);
        $post_city = (empty(mysqli_real_escape_string($conn, $_POST['city'])) === true) ? $city : mysqli_real_escape_string($conn, $_POST['city']);
        $post_password = (empty(mysqli_real_escape_string($conn, $_POST['password'])) === true) ? $password : mysqli_real_escape_string($conn, $_POST['password']);

        $post_update_id = $_POST['update']; //Get user ID that need update

        $sql = "UPDATE `dim_user` SET
        `user_name` = '$post_user_name',
        `full_name` = '$post_full_name',
        `email_address` = '$post_email',
        `contact_no` = '$post_contact_no',
        `role` = '$post_role',
        `gender` = '$post_gender',
        `address` = '$post_address',
        `city` = '$post_city',
        `password` = '$password' 
        WHERE user_id = $post_update_id";

        $update = mysqli_query($conn, $sql);

        echo "<script type='text/javascript'>alert('Cập nhật tài khoản thành công');</script>";

        header('Refresh:0 , url=http://localhost:8080/HMS-Nhom11/role-admin/employee.php');
    }

    if (isset($_POST['delete'])) {
        $post_delete_id = $_POST['delete']; //Get user ID that need delete

        $sql = "DELETE FROM `dim_user` WHERE user_id = $post_delete_id";

        $delete = mysqli_query($conn, $sql);

        echo "<script type='text/javascript'>alert('Xoá tài khoản thành công');</script>";

        header('Refresh:0 , url=http://localhost:8080/HMS-Nhom11/role-admin/employee.php');
    }


}
?>

<head>
  <title>
    Quản lý nhân viên
  </title>
</head>

<!-- Side Nav -->

<body class="g-sidenav-show"
  style="background-image: url('../backend/assets/image/Hospital_Seamless1.png'); background-size: 400px 400px;">

  <aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark"
    id="sidenav-main">

    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
        aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard "
        target="_blank">
        <img src="../backend/assets/image/logo01-sq.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white">HKL Hospital</span>
      </a>
    </div>

    <hr class="horizontal light mt-0 mb-2">

    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">

        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Tính năng chính
          </h6>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white" href="F1-schedule.php">

            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">calendar_month</i>
              <!-- Check https://fonts.google.com/icons?icon.set=Material+Icons&icon.style=Rounded for ID -->
            </div>

            <span class="nav-link-text ms-1">Lịch hẹn kiểm tra</span>
          </a>
        </li>


        <li class="nav-item">
          <a class="nav-link text-white" href="F2-user-medhist.php">

            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">pending_actions</i>
              <!-- Check https://fonts.google.com/icons?icon.set=Material+Icons&icon.style=Rounded for ID -->
            </div>

            <span class="nav-link-text ms-1">Hồ sơ sức khoẻ</span>
          </a>
        </li>


        <li class="nav-item">
          <a class="nav-link text-white" href="F3-patients.php">

            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">groups</i>
              <!-- Check https://fonts.google.com/icons?icon.set=Material+Icons&icon.style=Rounded for ID -->
            </div>

            <span class="nav-link-text ms-1">Danh sách bệnh nhân</span>
          </a>
        </li>


        <li class="nav-item">
          <a class="nav-link text-white" href="">

            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">description</i>
              <!-- Check https://fonts.google.com/icons?icon.set=Material+Icons&icon.style=Rounded for ID -->
            </div>

            <span class="nav-link-text ms-1">Function 4</span>
          </a>
        </li>


        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Quản trị
          </h6>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white" href="guest.php">

            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">manage_accounts</i>
              <!-- Check https://fonts.google.com/icons?icon.set=Material+Icons&icon.style=Rounded for ID -->
            </div>

            <span class="nav-link-text ms-1">Quản lý người dùng</span>
          </a>
        </li>


        <li class="nav-item">
          <a class="nav-link text-white active bg-gradient-primary" href="employee.php">

            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">badge</i>
              <!-- Check https://fonts.google.com/icons?icon.set=Material+Icons&icon.style=Rounded for ID -->
            </div>

            <span class="nav-link-text ms-1">Quản lý nhân viên</span>
          </a>
        </li>


        <li class="nav-item">
          <a class="nav-link text-white" href="supply.php">

            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">medication</i>
              <!-- Check https://fonts.google.com/icons?icon.set=Material+Icons&icon.style=Rounded for ID -->
            </div>

            <span class="nav-link-text ms-1">Quản lý vật tư</span>
          </a>
        </li>


        <li class="nav-item">
          <a class="nav-link text-white" href="speciality.php">

            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">local_hospital</i>
              <!-- Check https://fonts.google.com/icons?icon.set=Material+Icons&icon.style=Rounded for ID -->
            </div>

            <span class="nav-link-text ms-1">Quản lý chuyên khoa</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white" href="payment_log.php">

            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">payments</i>
              <!-- Check https://fonts.google.com/icons?icon.set=Material+Icons&icon.style=Rounded for ID -->
            </div>

            <span class="nav-link-text ms-1">Lịch sử giao dịch</span>
          </a>
        </li>

      </ul>
    </div>

  </aside>
  <!-- End Side Nav -->

  <main class="main-content border-radius-lg ">
    <!-- Navbar -->

    <div class="custom-navbar">
      <div class="nav-left">
        Quản lý nhân viên
      </div>
      <div class="nav-right">
        <div class="nav-item">
          <div class="custom-input" style="width: 180px">
            <input type="text" id="searchTableField" placeholder="Nhập email">
            <label>Tìm kiếm</label>
          </div>
        </div>
        <div class="nav-item">
          <a href="javascript:;" id="iconNavbarSidenav">
            <i class="fa-solid fa-bars"></i>
          </a>
        </div>
        <div class="nav-item">
          <div class="dropdown custom-dropdown">
            <button class="button-avatar dropdown-toggle" data-bs-toggle="dropdown">
              <img src="../backend/assets/image/user login image.png" alt="profile_image">
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="profile.php">Thông tin người dùng</a></li>
              <li><a class="dropdown-item" href="../backend/assets/include/log-out.php">Đăng xuất</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3" style="float: left;">Thông tin nhân viên
                  trên hệ thống</h6>
                <div class="table-float-btn-container">
                  <button class="table-float-btn btn btn-outline-primary btn-sm mb-0 me-3" style="background: #ffffff"
                    data-bs-toggle="modal" data-bs-target="#popup_add">Tạo nhân
                    viên</button>
                </div>
              </div>
            </div>

            <!-- Popup to create user -->
            <div class="modal fade" id="popup_add" tabindex="-1" aria-labelledby="EmployeeCreate" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="card">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                      <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                        <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">
                          Tạo tài khoản nhân viên
                        </h4>
                      </div>
                    </div>
                    <div class="card-body edit-body">
                      <form name="new_user" role="form" method="POST">
                        <div class="row">
                          <!-- Thêm hàng để chia thành 2 bên -->
                          <div class="col-md-6">
                            <div class="custom-input">
                              <input type="text" name="full_name" id="full_name" placeholder="Nguyen Van A" required>
                              <label>Họ và Tên</label>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="custom-input">
                              <input type="text" name="user_name" id="user_name" placeholder="nguyen_a123" required>
                              <label>Tên đăng nhập</label>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="custom-input">
                              <input type="email" name="email_address" id="email_address" placeholder="example@mail.com"
                                required>
                              <label>Địa chỉ Email</label>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="custom-input">
                              <input type="text" name="contact_no" id="contact_no" placeholder="84xxx" required>
                              <label>Số điện thoại</label>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="custom-input">
                              <select name="gender" id="gender" required>
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
                          </div>
                          <div class="col-md-6">
                            <div class="custom-input">
                              <select name="role" id="role" required>
                                <option value="" disabled selected>Chọn
                                  vị trí
                                </option>
                                <option value="doctor">Bác sỹ</option>
                                <option value="nurse">Y tá</option>
                                <option value="reception">Lễ tân
                                </option>
                                <option value="admin">Quản trị viên
                                </option>
                              </select>
                              <label>Vị trí</label>
                              <div class="arrow-icon">
                                <i class="fa-solid fa-chevron-down"></i>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="custom-input">
                              <input type="text" name="address" id="address" placeholder="123 Đường Abc" required>
                              <label>Địa chỉ</label>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="custom-input">
                              <input type="text" name="city" id="city" placeholder="Ho Chi Minh" required>
                              <label>Thành phố</label>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="text-center">
                              <button type="button" class="btn btn-lg btn-outline-primary btn-lg w-100 mt-4 mb-0"
                                data-bs-dismiss="modal">Thoát</button>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="text-center">
                              <button type="submit" name="create" value="create"
                                class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Tạo
                                tài
                                khoản</button>
                            </div>
                          </div>

                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="card-body px-0 pb-2">
              <div class="custom-table">
                <table id="employeeTable" class="table">
                  <thead>
                    <tr>
                      <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                        Mã nhân viên</th>
                      <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                        Họ và Tên</th>
                      <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                        Vị trí</th>
                      <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                        Tên đăng nhập</th>
                      <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                        Số điện thoại</th>
                      <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                        Email</th>
                      <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                        Mật khẩu</th>
                      <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                        Ngày tạo</th>
                      <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                        Ngày chỉnh sửa</th>
                      <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                        Thao tác</th>
                    </tr>
                  </thead>
                  <tbody id="productTableBody">
                    <!-- Data appear here -->
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script>
    let searchFilterDelay = null;
    let tableData = null;
    let tableDataFiltered = null;
    const displayTableDataFromFiltered = () => {
      const tbodyHTML = tableDataFiltered.map(item => `
            <tr>
                <td class='align-middle text-center'>
                    <h6 class='mb-0 text-sm'>${item.user_id}</h6>
                </td>
                <td class='align-middle text-center'>
                    <h6 class='mb-0 text-sm'>${item.full_name}</h6>
                </td>
                <td class='align-middle text-center text-sm'>
                    <p class='text-xs font-weight-bold mb-0'>${item.role}</p>
                </td>
                <td class='align-middle text-center text-sm'>
                    <p class='text-xs font-weight-bold mb-0'>${item.user_name}</p>
                </td>
                <td class='align-middle text-center text-sm'>
                    <p class='text-xs font-weight-bold mb-0'>${item.contact_no}</p>
                </td>
                <td class='align-middle text-center'>
                    <span
                        class='text-secondary text-xs font-weight-bold'>${item.email_address}</span>
                </td>
                <td class='align-middle text-center'>
                    <span
                        class='text-secondary text-xs font-weight-bold'>${item.password}</span>
                </td>
                <td class='align-middle text-center'>
                    <span
                        class='text-secondary text-xs font-weight-bold'>${item.created_at}</span>
                </td>
                <td class='align-middle text-center'>
                    <span
                        class='text-secondary text-xs font-weight-bold'>${item.updated_at}</span>
                </td>
                <td class='align-middle text-center'>
                    <a href='#popup_edit-${item.user_id}'
                        class='text-secondary font-weight-bold text-xs edit-btn'
                        data-original-title='edit' title='Sửa thông tin'
                        data-bs-toggle="modal"
                        data-bs-target="#popup_edit-${item.user_id}">Cập nhật</a>
                    <a class='text-secondary font-weight-bold text-xs edit-btn'"> / </a>
                    <a href='#popup_delete-${item.user_id}'
                        class='text-secondary font-weight-bold text-xs edit-btn'
                        data-original-title='delete' title='Xoá tài khoản'
                        data-bs-toggle="modal"
                        data-bs-target="#popup_delete-${item.user_id}">Xoá</a>

        <!-- Popup Chỉnh sửa thông tin -->
        <div class="modal fade" id="popup_edit-${item.user_id}" tabindex="-1"
            aria-labelledby="EmployeeEdit" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="card">
                        <div
                            class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div
                                class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                                <h4
                                    class="text-white font-weight-bolder text-center mt-2 mb-0">
                                    Cập nhật tài khoản nhân viên
                                </h4>
                            </div>
                        </div>
                        <div class="card-body edit-body">
                            <form name="edit_user" role="form" method="POST">
                                <div class="row"> <!-- Thêm hàng để chia thành 2 bên -->
                                    <div class="col-md-6">
                                        <div class="custom-input">
                                            <input type="text" name="full_name"
                                                id="full_name"
                                                value="${item.full_name}" required>
                                            <label>Họ và Tên</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="custom-input">
                                            <input type="text" name="user_name"
                                                id="user_name"
                                                value="${item.user_name}" required>
                                            <label>Tên đăng nhập</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="custom-input">
                                            <input type="email" name="email_address"
                                                id="email_address"
                                                value="${item.email_address}" required>
                                            <label>Địa chỉ Email</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="custom-input">
                                            <input type="text" name="contact_no"
                                                id="contact_no"
                                                value="${item.contact_no}" required>
                                            <label>Số điện thoại</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="custom-input">
                                            <select name="gender" id="gender"
                                                required>
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
                                    </div>
                                    <div class="col-md-6">
                                        <div class="custom-input">
                                            <select name="role" id="role" required>
                                                <option value="" disabled selected>Chọn
                                                    vị trí
                                                </option>
                                                <option value="doctor">Bác sỹ</option>
                                                <option value="nurse">Y tá</option>
                                                <option value="reception">Lễ tân
                                                </option>
                                                <option value="admin">Quản trị viên
                                                </option>
                                            </select>
                                            <label>Vị trí</label>
                                            <div class="arrow-icon">
                                                <i class="fa-solid fa-chevron-down"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="custom-input">
                                            <input type="password" name="contact_no"
                                                id="contact_no"
                                                value="${item.password}" required>
                                            <label>Mật khẩu</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="custom-input">
                                            <input type="text" name="address"
                                                id="address"
                                                value="${item.address}" required>
                                            <label>Địa chỉ</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="custom-input">
                                            <input type="text" name="city" id="city"
                                                value="${item.city}" required>
                                            <label>Thành phố</label>
                                        </div>
                                    </div>
                                    <!-- Thêm hàng để chia thành 2 bên -->
                                    <div class="col-md-6">
                                        <div class="text-center">
                                            <button type="submit" name="update"
                                                value=${item.user_id}
                                                class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Cập
                                                nhật</button>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="text-center">
                                            <button type="submit" name="delete"
                                                value=${item.user_id}
                                                class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Xoá</button>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="button"
                                            class="btn btn-lg btn-outline-primary btn-lg w-100 mt-4 mb-0"
                                            data-bs-dismiss="modal">Thoát</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <!-- Popup Xoá thông tin -->
                    <div class="modal fade" id="popup_delete-${item.user_id}" tabindex="-1"
                        aria-labelledby="EmployeeEdit" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="card">
                                    <div
                                        class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                        <div
                                            class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                                            <h4
                                                class="text-white font-weight-bolder text-center mt-2 mb-0">
                                                Xoá tài khoản nhân viên
                                            </h4>
                                        </div>
                                        <div class="card-header">
                                            <p class="font-weight-bolder text-center mt-2 mb-0">Bạn có chắc chắn muốn xoá tài khoản sau?</p>
                                            <p class="text-center mt-2 mb-0">${item.full_name} (${item.user_name})</p>
                                            <p class="font-weight-bolder text-center mt-2 mb-0">Tài khoản này sẽ không thể khôi phục</p>
                                        </div>
                                    </div>
                                    <div class="card-body edit-body">
                                        <form name="edit_user" role="form" method="POST">
                                            <div class="row"> <!-- Thêm hàng để chia thành 2 bên -->
                                                <!-- Thêm hàng để chia thành 2 bên -->
                                                <div class="col-md-6">
                                                    <div class="text-center">
                                                        <button type="button"
                                                            class="btn btn-lg btn-outline-primary btn-lg w-100 mt-4 mb-0"
                                                            data-bs-dismiss="modal">Thoát</button>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="text-center">
                                                        <button type="submit" name="delete"
                                                            value=${item.user_id}
                                                            class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Xoá</button>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        `).join("");
      document.getElementById('productTableBody').innerHTML = tbodyHTML;
    }

    <?php
            $sql = "SELECT * FROM `dim_user` WHERE `role` <> 'patient'";
            $result = $conn->query($sql);
            // Kiểm tra và hiển thị dữ liệu
            $productList = [];
            while ($row = $result->fetch_assoc()) {
                $productList[] = $row;
            }
            ?>
    tableData = <?php echo json_encode($productList) ?>;
    tableDataFiltered = tableData;
    displayTableDataFromFiltered();
    <?php ?>
    const searchField = document.getElementById("searchTableField");
    searchField.addEventListener("keyup", () => {
      clearTimeout(searchFilterDelay);
      searchFilterDelay = setTimeout(() => {
        const query = searchField.value.toLowerCase();
        if (!query) {
          tableDataFiltered = tableData;
        } else {
          tableDataFiltered = tableData.filter(item => item.email_address.toLowerCase().includes(query));
        }
        displayTableDataFromFiltered();
      }, 500)
    })
    </script>

    <?php
        include SITE_ROOT . ('/HMS-Nhom11/backend/assets/include/footer.php');
        ?>