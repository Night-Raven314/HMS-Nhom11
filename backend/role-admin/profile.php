<?php
define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT']);

include('sess-check.php');
include SITE_ROOT . ('/HMS-Nhom11/backend/assets/include/config.php');
include SITE_ROOT . ('/HMS-Nhom11/backend/assets/include/header.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['update'])) {
        $post_full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
        $post_user_name = mysqli_real_escape_string($conn, $_POST['user_name']);
        $post_email = mysqli_real_escape_string($conn, $_POST['email_address']);
        $post_contact_no = mysqli_real_escape_string($conn, $_POST['contact_no']);
        $post_gender = mysqli_real_escape_string($conn, $_POST['gender']);
        $post_address = mysqli_real_escape_string($conn, $_POST['address']);
        $post_city = mysqli_real_escape_string($conn, $_POST['city']);
        $post_pwd = mysqli_real_escape_string($conn, $_POST['password']);

        $post_update_id = $_POST['update']; //Get user ID that need update

        $sql = "UPDATE `dim_user` SET
        `user_name` = '$post_user_name',
        `full_name` = '$post_full_name',
        `email_address` = '$post_email',
        `contact_no` = '$post_contact_no',
        `password` = '$post_pwd',
        `gender` = '$post_gender',
        `address` = '$post_address',
        `city` = '$post_city' 
        WHERE user_id = $post_update_id";

        $update = mysqli_query($conn, $sql);

        echo "<script type='text/javascript'>alert('Cập nhật tài khoản thành công');</script>";

        header('Refresh:0 , url=http://localhost:8080/HMS-Nhom11/role-admin/profile.php');
    }
}
?>

<head>
    <title>
        Thông tin cá nhân
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
                    <a class="nav-link text-white" href="employee.php">

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
                Quản lý người dùng
            </div>
            <div class="nav-right">
                <div class="nav-item">
                    <div class="custom-input" style="width: 180px">
                        <input type="text" placeholder="Nhập từ khoá">
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



        <div class="container-fluid px-2 px-md-4">
            <div class="page-header min-height-300 border-radius-xl mt-4"
                style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
                <span class="mask  bg-gradient-primary  opacity-6"></span>
            </div>
            <div class="card card-body mx-3 mx-md-4 mt-n6">
                <div class="row gx-4 mb-2">
                    <div class="col-auto">
                        <div class="avatar avatar-xl position-relative">
                            <img src="../backend/assets/image/user login image.png" alt="profile_image"
                                class="w-100 border-radius-lg shadow-sm">
                        </div>
                    </div>
                    <?php

                    $sql = "SELECT * FROM `dim_user` WHERE user_id = $auth_user_id; ";
                    $result = $conn->query($sql);
                    // Kiểm tra và hiển thị dữ liệu
                    if ($result->num_rows > 0) {
                        $roleMapping = [
                            "doctor" => "Bác sĩ",
                            "admin" => "Quản trị viên",
                            "patient" => "Bệnh nhân"
                        ];

                        $row = mysqli_fetch_assoc($result);

                        $user_id = $row["user_id"];
                        $fullname = $row["full_name"];
                        $role = isset($roleMapping[$row["role"]]) ? $roleMapping[$row["role"]] : $row["role"];
                        $user_name = $row["user_name"];
                        $phone = $row["contact_no"];
                        $emailaddress = $row["email_address"];
                        $password = $row["password"];
                        $created_at = $row["created_at"];
                        $updated_at = $row["updated_at"];
                        $gender = $row["gender"];
                        $address = $row["address"];
                        $city = $row["city"];

                        ?>
                        <tr>
                            <div class="col-auto my-auto">
                                <div class="h-100">
                                    <h5 class="mb-1"><?php echo $fullname ?></h5>
                                    <p class="mb-0 font-weight-normal text-sm"><?php echo $role ?></p>
                                </div>
                            </div>
                            <div class="col-auto" style="margin-left: auto; margin-right: 10px;">
                                <div class="text-center">
                                    <button type="button" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0"
                                        title="Edit Profile" data-bs-toggle="modal" data-bs-target="#popup_edit">Cập
                                        nhật</button>
                                </div>
                            </div>
                            <div class="card-header pb-0 p-3">
                            </div>
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-md-5">
                                        <ul class="list-group">
                                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Tên đăng nhập:</strong>&nbsp;<?php echo $user_name ?></li>
                                            <li class="list-group-item border-0 ps-0 text-sm"><strong
                                                    class="text-dark">Giới tính:</strong>&nbsp;<?php if($gender = 'male') {echo 'Nam';} else {echo 'Nữ';} ?></li>
                                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Ngày đăng ký:</strong>&nbsp;<?php echo $created_at ?></li>
                                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Ngày cập nhật:</strong>&nbsp;<?php echo $updated_at ?></li>
                                            <li class="list-group-item border-0 ps-0 pb-0"></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-5">
                                        <ul class="list-group">
                                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Số điện
                                                    thoại:</strong>&nbsp;<?php echo $phone ?></li>
                                            <li class="list-group-item border-0 ps-0 text-sm"><strong
                                                    class="text-dark">Email:</strong>&nbsp;<?php echo $emailaddress ?></li>
                                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Địa
                                                    chỉ:</strong>&nbsp;<?php echo $address ?></li>
                                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Thành
                                                    phố:</strong>&nbsp;<?php echo $city ?></li>
                                            <li class="list-group-item border-0 ps-0 pb-0"></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </tr>

                        <!-- Popup for User edit -->
                        <div class="modal fade" id="popup_edit" tabindex="-1" aria-labelledby="EmployeeEdit"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="card">
                                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                            <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                                                <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">
                                                    Cập nhật thông tin tài khoản
                                                </h4>
                                            </div>
                                        </div>
                                        <div class="card-body edit-body">
                                            <form name="new_user" role="form" method="POST">
                                                <div class="row"> <!-- Thêm hàng để chia thành 2 bên -->
                                                    <div class="col-md-6">
                                                        <div class="custom-input">
                                                            <input type="text" name="full_name" id="full_name"
                                                                value="<?php echo $fullname ?>" required>
                                                            <label>Họ và Tên</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="custom-input">
                                                            <input type="text" name="user_name" id="user_name"
                                                                value="<?php echo $user_name ?>" required>
                                                            <label>Tên đăng nhập</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="custom-input">
                                                            <input type="email" name="email_address" id="email_address"
                                                                value="<?php echo $emailaddress ?>" required>
                                                            <label>Địa chỉ Email</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="custom-input">
                                                            <input type="text" name="contact_no" id="contact_no"
                                                                value="<?php echo $phone ?>" required>
                                                            <label>Số điện thoại</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="custom-input">
                                                            <select name="gender" id="gender" required>
                                                            <?php if ($gender = 'male') {
                                                                echo '<option value="male" selected>Nam</option>
                                                                <option value="female">Nữ</option>';
                                                            } else {
                                                                echo '<option value="male">Nam</option>
                                                                <option value="female" selected>Nữ</option>';
                                                            } ?>
                                                            </select>
                                                            <label>Giới tính</label>
                                                            <div class="arrow-icon">
                                                                <i class="fa-solid fa-chevron-down"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="custom-input">
                                                            <input type="password" name="password" id="password"
                                                                value="<?php echo $password ?>" required>
                                                            <label>Mật khẩu</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="custom-input">
                                                            <input type="text" name="address" id="address"
                                                                value="<?php echo $address ?>" required>
                                                            <label>Địa chỉ</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="custom-input">
                                                            <input type="text" name="city" id="city" value="<?php echo $city ?>"
                                                                required>
                                                            <label>Thành phố</label>
                                                        </div>
                                                    </div>
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
                                                            <button type="submit" name="update" value=<?php echo $user_id ?>
                                                                class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Cập
                                                                nhật</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php

                    } else {
                        echo "Không tìm thấy người dùng.";
                    }


                    // Đóng kết nối
                    ?>


                </div>

            </div>
        </div>

        <!-- Popup Section for Form -->
        <!-- Popup to create user -->
        <div id="popup_update" class="overlay_flight_traveldil">
            <div class="card popup-cont">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                        <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Thêm tài khoản nhân viên</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form name="new_user" role="form" method="POST">
                        <div class="row"> <!-- Thêm hàng để chia thành 2 bên -->
                            <div class="col-md-6"> <!-- Cột bên trái -->
                                <div class="input-group input-group-outline mb-3">
                                    <label class="form-label">Họ và Tên</label>
                                    <input name="full_name" id="full_name" class="form-control">
                                </div>
                                <div class="input-group input-group-outline mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email_address" id="email_address" class="form-control">
                                </div>
                                <div class="input-group input-group-outline mb-3">
                                    <!-- <label class="form-label-lg" style="margin-right: 10px;">Giới tính</label> -->
                                    <select name="gender" id="gender" class="form-control">
                                        <option value="" disabled selected>Chọn giới tính</option>
                                        <option value="male">Nam</option>
                                        <option value="female">Nữ</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6"> <!-- Cột bên phải -->
                                <div class="input-group input-group-outline mb-3">
                                    <label class="form-label">Tên đăng nhập</label>
                                    <input name="user_name" id="user_name" class="form-control">
                                </div>
                                <div class="input-group input-group-outline mb-3">
                                    <label class="form-label">Mật khẩu</label>
                                    <input name="password" id="password" class="form-control">
                                </div>
                                <div class="input-group input-group-outline mb-3">
                                    <label class="form-label">Số điện thoại</label>
                                    <input name="contact_no" id="contact_no" class="form-control">
                                </div>
                            </div>
                            <div class="input-group input-group-outline mb-3">
                                <label class="form-label">Địa chỉ</label>
                                <input name="address" id="address" class="form-control">
                            </div>
                            <div class="input-group input-group-outline mb-3">
                                <label class="form-label">Thành phố</label>
                                <input name="city" id="city" class="form-control">
                            </div>
                            <div class="text-center">
                                <button type="submit" name="update" value="update"
                                    class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Cập nhật tài
                                    khoản</button>
                            </div>
                            <div class="text-center" href="#">
                                <button type="button" class="btn btn-lg btn-outline-primary btn-lg w-100 mt-4 mb-0"
                                    onclick="location.href='http://localhost:8080/HMS-Nhom11/role-admin/profile.php'">Thoát</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>

    </main>

    <?php
    include SITE_ROOT . ('/HMS-Nhom11/backend/assets/include/footer.php');
    ?>