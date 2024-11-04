<?php
define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT']);

include('sess-check.php');
include SITE_ROOT . ('/HMS-Nhom11/assets/include/config.php');
include SITE_ROOT . ('/HMS-Nhom11/assets/include/header.php');

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

        header('Refresh:0 , url=http://localhost/HMS-Nhom11/role-admin/guest.php');
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
        $post_pwd = (empty(mysqli_real_escape_string($conn, $_POST['password'])) === true) ? $og_pwd : mysqli_real_escape_string($conn, $_POST['password']);

        $post_update_id = $_POST['update']; //Get user ID that need update

        $sql = "UPDATE `dim_user` SET
        `user_name` = '$post_user_name',
        `full_name` = '$post_full_name',
        `email_address` = '$post_email',
        `contact_no` = '$post_contact_no',
        `password` = '$post_pwd',
        `role` = '$post_role',
        `gender` = '$post_gender',
        `address` = '$post_address',
        `city` = '$post_city' 
        WHERE user_id = $post_update_id";

        $update = mysqli_query($conn, $sql);

        echo "<script type='text/javascript'>alert('Cập nhật tài khoản thành công');</script>";

        header('Refresh:0 , url=http://localhost/HMS-Nhom11/role-admin/guest.php');
    }

    if (isset($_POST['delete'])) {
        $post_delete_id = $_POST['delete']; //Get user ID that need delete

        $sql = "DELETE FROM `dim_user` WHERE user_id = $post_delete_id";

        $delete = mysqli_query($conn, $sql);

        echo "<script type='text/javascript'>alert('Xoá tài khoản thành công');</script>";

        header('Refresh:0 , url=http://localhost/HMS-Nhom11/role-admin/guest.php');
    }
}
?>

<head>
    <title>
        Quản lý người dùng
    </title>
</head>

<!-- Side Nav -->

<body class="g-sidenav-show"
    style="background-image: url('../assets/image/Hospital_Seamless1.png'); background-size: 400px 400px;">

    <aside
        class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark"
        id="sidenav-main">

        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard "
                target="_blank">
                <img src="../assets/image/logo01-sq.png" class="navbar-brand-img h-100" alt="main_logo">
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
                    <a class="nav-link text-white active bg-gradient-primary" href="guest.php">

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

            </ul>
        </div>

    </aside>
    <!-- End Side Nav -->

    <main class="main-content border-radius-lg ">
        <!-- Navbar -->

        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 border-radius-xl shadow-none position-sticky blur shadow-blur mt-4 left-auto top-1 z-index-sticky"
            data-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">

                    <h6 class="font-weight-bolder mb-0">Quản lý người dùng</h6>

                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                        <div class="input-group input-group-outline">
                            <label class="form-label">Tìm kiếm</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <ul class="navbar-nav  justify-content-end">

                        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>
                            </a>
                        </li>

                        <li class="nav-item d-flex align-items-center">
                    </ul>

                    <ul class="navbar-nav  justify-content-end">
                        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                        <li class="nav-item dropdown pe-2 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="../assets/image/user login image.png" alt="profile_image"
                                    class="border-radius-lg shadow-sm" style="max-width:45px">
                            </a>


                            <ul class="dropdown-menu dropdown-menu-end px-2 py-3 me-sm-n4"
                                aria-labelledby="dropdownMenuButton">
                                <li class="mb-2">
                                    <a class="dropdown-item border-radius-md" href="profile.php">
                                        <div class="d-flex py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="text-primary text-gradient font-weight-bold"
                                                    style="padding-top:10px !important;">
                                                    Thông tin người dùng
                                                </h6>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <a class="dropdown-item border-radius-md" href="../assets/include/log-out.php">
                                        <div class="d-flex py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="text-primary text-gradient font-weight-bold"
                                                    style="padding-top:10px !important;">
                                                    Đăng xuất
                                                </h6>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>

        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3" style="float: left;">Thông tin người dùng
                                    trên hệ thống</h6>
                                <div class="table-float-btn-container">
                                    <a class="table-float-btn btn btn-outline-primary btn-sm mb-0 me-3"
                                        style="background: #ffffff" href="#popup_user_add"
                                        data-target="#popup_user_add">Thêm người dùng</a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                <table id="drugTable" class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                User ID</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                Họ và Tên</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                Vị trí</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                Username</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                Số điện thoại</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                Email</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                Mật khẩu</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                Ngày tạo</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                Ngày chỉnh sửa</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        //Get data for table
                                        
                                        $get_data_query = "SELECT * FROM `dim_user` WHERE `role` = 'patient' ";

                                        $get_data = mysqli_query($conn, $get_data_query);

                                        $count = mysqli_num_rows($get_data);
                                        // Kiểm tra và hiển thị dữ liệu
                                        if ($count > 0) {
                                            $roleMapping = [
                                                "doctor" => "Bác sĩ",
                                                "admin" => "Quản trị viên",
                                                "patient" => "Bệnh nhân"
                                            ];
                                            while ($row = mysqli_fetch_assoc($get_data)) {
                                                $user_id = $row["user_id"];
                                                $fullname = $row["full_name"];
                                                $role = isset($roleMapping[$row["role"]]) ? $roleMapping[$row["role"]] : $row["role"];
                                                $user_name = $row["user_name"];
                                                $phone = substr($row["contact_no"], 0, 5) // Get the first two digits
                                                    . str_repeat('*', (strlen($row["contact_no"]) - 7)) // Apply enough asterisks to cover the middle numbers
                                                    . substr($row["contact_no"], -2); // Get the last two digits
                                                $emailaddress = substr($row["email_address"], 0, 5) // Get the first two digits
                                                    . str_repeat('*', (strlen($row["email_address"]) - 17)) // Apply enough asterisks to cover the middle numbers
                                                    . substr($row["email_address"], -12); // Get the last two digits
                                                $password = str_repeat('*', (strlen($row["password"])));
                                                $og_pwd = $created_at = $row["password"];
                                                $created_at = $row["created_at"];
                                                $updated_at = $row["updated_at"];
                                                $gender = $row["gender"];
                                                $address = $row["address"];
                                                $city = $row["city"];

                                                echo "<td class='align-middle text-center'>";
                                                echo "<h6 class='mb-0 text-sm'>" . $user_id . "</h6>";
                                                echo "</td>";
                                                echo "<td class='align-middle text-center'>";
                                                echo "<h6 class='mb-0 text-sm'>" . $fullname . "</h6>";
                                                echo "</td>";
                                                echo "<td class='align-middle text-center text-sm'>";
                                                echo "<p class='text-xs font-weight-bold mb-0'>" . $role . "</p>";
                                                echo "</td>";
                                                echo "<td class='align-middle text-center text-sm'>";
                                                echo "<p class='text-xs font-weight-bold mb-0'>" . $user_name . "</p>";
                                                echo "</td>";
                                                echo "<td class='align-middle text-center text-sm'>";
                                                echo "<p class='text-xs font-weight-bold mb-0'>" . $phone . "</p>";
                                                echo "</td>";
                                                echo "<td class='align-middle text-center'>";
                                                echo "<span class='text-secondary text-xs font-weight-bold'>" . $emailaddress . "</span>";
                                                echo "</td>";
                                                echo "<td class='align-middle text-center'>";
                                                echo "<span class='text-secondary text-xs font-weight-bold'>" . $password . "</span>";
                                                echo "</td>";
                                                echo "<td class='align-middle text-center'>";
                                                echo "<span class='text-secondary text-xs font-weight-bold'>" . $created_at . "</span>";
                                                echo "</td>";
                                                echo "<td class='align-middle text-center'>";
                                                echo "<span class='text-secondary text-xs font-weight-bold'>" . $updated_at . "</span>";
                                                echo "</td>";
                                                ?>
                                                <td class='align-middle text-center'>
                                                    <a href='#popup_edit-<?php echo $user_id; ?>'
                                                        class='text-secondary font-weight-bold text-xs edit-btn'
                                                        data-original-title='edit' title='Sửa thông tin' data-toggle='modal'
                                                        data-target='#popup_edit-<?php echo $user_id; ?>'>Sửa</a>
                                                </td>
                                                </tr>



                                                <!-- Popup for User edit -->
                                                <div id="popup_edit-<?php echo $user_id; ?>" class="overlay_flight_traveldil">
                                                    <div class="card popup-cont">
                                                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                                            <div
                                                                class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                                                                <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">
                                                                    Cập nhật tài khoản người dùng
                                                                </h4>
                                                            </div>
                                                        </div>
                                                        <div class="card-body edit-body">
                                                            <form name="new_user" role="form" method="POST">
                                                                <div class="row"> <!-- Thêm hàng để chia thành 2 bên -->
                                                                    <div class="col-md-6"> <!-- Cột bên trái -->
                                                                        <div class="input-group input-group-outline mb-3">
                                                                            <label for="full_name" class="form-label">Họ và
                                                                                Tên</label>
                                                                            <input name="full_name" id="full_name"
                                                                                class="form-control" value="">
                                                                        </div>
                                                                        <div class="input-group input-group-outline mb-3">
                                                                            <label class="form-label">Email</label>
                                                                            <input type="email" name="email_address"
                                                                                id="email_address" class="form-control">
                                                                        </div>
                                                                        <div class="input-group input-group-outline mb-3">
                                                                            <!-- <label class="form-label-lg" style="margin-right: 10px;">Giới tính</label> -->
                                                                            <select name="gender" id="gender"
                                                                                class="form-control">
                                                                                <option value="" disabled selected>Chọn giới
                                                                                    tính</option>
                                                                                <option value="male">Nam</option>
                                                                                <option value="female">Nữ</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6"> <!-- Cột bên phải -->
                                                                        <div class="input-group input-group-outline mb-3">
                                                                            <label class="form-label">Tên đăng nhập</label>
                                                                            <input name="user_name" id="user_name"
                                                                                class="form-control" />
                                                                        </div>
                                                                        <div class="input-group input-group-outline mb-3">
                                                                            <label class="form-label">Mật khẩu</label>
                                                                            <input name="password" id="password"
                                                                                class="form-control" required>
                                                                        </div>
                                                                        <div class="input-group input-group-outline mb-3">
                                                                            <label class="form-label">Số điện thoại</label>
                                                                            <input name="contact_no" id="contact_no"
                                                                                class="form-control">
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
                                                                        <button type="submit" name="update" value=<?php echo $user_id; ?>
                                                                            class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Cập
                                                                            nhật</button>
                                                                    </div>

                                                                    <div class="text-center">
                                                                        <button type="submit" name="delete" value=<?php echo $user_id; ?>
                                                                            class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Xoá</button>

                                                                    </div>

                                                                    <div class="text-center" href="#">
                                                                        <button type="button"
                                                                            class="btn btn-lg btn-outline-primary btn-lg w-100 mt-4 mb-0"
                                                                            onclick="location.href='http://localhost/HMS-Nhom11/role-admin/guest.php'">Thoát</button>
                                                                    </div>

                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                                <?php


                                            }
                                        } else {
                                            echo "Không tìm thấy người dùng.";
                                        }

                                        // Đóng kết nối
                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Popup Section for Form -->
        <!-- Popup to create user -->
        <div id="popup_user_add" class="overlay_flight_traveldil">
            <div class="card popup-cont">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                        <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Thêm tài khoản người dùng</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form name="new_user" role="form" method="POST">
                        <div class="row"> <!-- Thêm hàng để chia thành 2 bên -->
                            <div class="col-md-6"> <!-- Cột bên trái -->
                                <div class="input-group input-group-outline mb-3">
                                    <label class="form-label">Họ và Tên</label>
                                    <input name="full_name" id="full_name" class="form-control" required>
                                </div>
                                <div class="input-group input-group-outline mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email_address" id="email_address" class="form-control"
                                        required>
                                </div>
                                <div class="input-group input-group-outline mb-3">
                                    <!-- <label class="form-label-lg" style="margin-right: 10px;">Giới tính</label> -->
                                    <select name="gender" id="gender" class="form-control" required>
                                        <option value="" disabled selected>Chọn giới tính</option>
                                        <option value="male">Nam</option>
                                        <option value="female">Nữ</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6"> <!-- Cột bên phải -->
                                <div class="input-group input-group-outline mb-3">
                                    <label class="form-label">Tên đăng nhập</label>
                                    <input name="user_name" id="user_name" class="form-control" required>
                                </div>
                                <div class="input-group input-group-outline mb-3">
                                    <label class="form-label">Mật khẩu</label>
                                    <input name="password" id="password" class="form-control" required>
                                </div>
                                <div class="input-group input-group-outline mb-3">
                                    <label class="form-label">Số điện thoại</label>
                                    <input name="contact_no" id="contact_no" class="form-control" required>
                                </div>
                            </div>
                            <div class="input-group input-group-outline mb-3">
                                <label class="form-label">Địa chỉ</label>
                                <input name="address" id="address" class="form-control" required>
                            </div>
                            <div class="input-group input-group-outline mb-3">
                                <label class="form-label">Thành phố</label>
                                <input name="city" id="city" class="form-control" required>
                            </div>
                            <div class="text-center">
                                <button type="submit" name="create" value="create"
                                    class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Tạo tài khoản</button>
                            </div>
                            <div class="text-center" href="#">
                                <button type="button" class="btn btn-lg btn-outline-primary btn-lg w-100 mt-4 mb-0"
                                    onclick="location.href='http://localhost/HMS-Nhom11/role-admin/guest.php'">Thoát</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>

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
                            <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Huan, Khoa
                                and Long</a>
                            for Uni 24-25.
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com" class="nav-link text-muted"
                                    target="_blank">Creative Tim</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted"
                                    target="_blank">About
                                    Us</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/blog" class="nav-link text-muted"
                                    target="_blank">Blog</a>
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
        </div>


    </main>

<?php
  include SITE_ROOT . ('/HMS-Nhom11/assets/include/footer.php');
?>