<?php
define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT']);

include('sess-check.php');
include SITE_ROOT . ('/HMS-Nhom11/assets/include/config.php');
include SITE_ROOT . ('/HMS-Nhom11/assets/include/header.php');
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
                                                <h6 class="text-primary text-gradient font-weight-bold" style="padding-top:10px !important;">
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
                                                <h6 class="text-primary text-gradient font-weight-bold" style="padding-top:10px !important;">
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
                                <h6 class="text-white text-capitalize ps-3">Thông tin người dùng trên hệ thống</h6>
                            </div>
                        </div>

                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                <table id="drugTable" class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Họ và Tên</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Vị trí</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Username</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Email</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Mật khẩu</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Ngày tạo</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Ngày chỉnh sửa</th>
                                            <th class="text-secondary opacity-7"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        $sql = "SELECT * FROM `dim_user` WHERE `role` = 'patient' ";
                                        $result = $conn->query($sql);
                                        // Kiểm tra và hiển thị dữ liệu
                                        if ($result->num_rows > 0) {
                                            $roleMapping = [
                                                "doctor" => "Bác sĩ",
                                                "admin" => "Quản trị viên",
                                                "patient" => "Bệnh nhân"
                                            ];
                                            while ($row = $result->fetch_assoc()) {
                                                $role = isset($roleMapping[$row["role"]]) ? $roleMapping[$row["role"]] : $row["role"];
                                                $fullname = $row["full_name"];
                                                //   $role=$row["role"];
                                                $user_name = $row["user_name"];
                                                $emailaddress = $row["email_address"];
                                                $password = $row["password"];
                                                $created_at = $row["created_at"];
                                                $updated_at = $row["updated_at"];

                                                echo "<tr>";
                                                echo '<td class="align-middle text-center">
                                                        <h6 class="mb-0 text-sm">' . $fullname . '</h6>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <p class="text-xs font-weight-bold mb-0">' . $role . '</p>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <p class="text-xs font-weight-bold mb-0">' . $user_name . '</p>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">' . $emailaddress . '</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">' . $password . '</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">' . $created_at . '</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">' . $updated_at . '</span>
                                            </td>
                                            <td class="align-middle" onclick="div_show()">
                                                <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user" title="Edit user">
                                                    Edit
                                                </a>
                                            </td>';






                                                echo "</tr>";

                                            }
                                        } else {
                                            echo "Không tìm thấy người dùng.";
                                        }


                                        // Đóng kết nối
                                        








                                        ?>
                                        <!-- <tr>
                                            <td class="align-middle text-center">
                                                        <h6 class="mb-0 text-sm">Nguyen Van A</h6>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <p class="text-xs font-weight-bold mb-0">Bac sy</p>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <p class="text-xs font-weight-bold mb-0">a.nguyenvan</p>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">van_a@gmail.com</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">pasword123</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">23/04/18</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">24/04/18</span>
                                            </td>
                                            <td class="align-middle" onclick="div_show()">
                                                <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user" title="Edit user">
                                                    Edit
                                                </a>
                                            </td>
                                        </tr> -->
                                        <!-- <tr>
                                            <td class="align-middle text-center">
                                                        <h6 class="mb-0 text-sm">Nguyen Van B</h6>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <p class="text-xs font-weight-bold mb-0">Benh nhan</p>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <p class="text-xs font-weight-bold mb-0">b.nguyenvan</p>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">van_b@gmail.com</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">pasword123</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">23/04/18</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">24/04/18</span>
                                            </td>
                                            <td class="align-middle" onclick="div_show()">
                                                <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user" title="Edit user">
                                                    Edit
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle text-center">
                                                        <h6 class="mb-0 text-sm">Nguyen Van A</h6>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <p class="text-xs font-weight-bold mb-0">Bac sy</p>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <p class="text-xs font-weight-bold mb-0">a.nguyenvan</p>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">van_a@gmail.com</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">pasword123</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">23/04/18</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">24/04/18</span>
                                            </td>
                                            <td class="align-middle" onclick="div_show()">
                                                <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user" title="Edit user">
                                                    Edit
                                                </a>
                                            </td>
                                        </tr> -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
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

        <!-- Popup Section for Form -->
        <div id="container-popup">
            <div id="popupContact">
                <div class="card">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                            <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Cập nhật thông tin</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form role="form">
                            <div class="input-group input-group-outline mb-3">
                                <label class="form-label">Nguyen Van A</label>
                                <input type="full_name" class="form-control">
                            </div>
                            <div class="input-group input-group-outline mb-3">
                                <label class="form-label">+84123456789</label>
                                <input type="contact_no" class="form-control">
                            </div>
                            <div class="input-group input-group-outline mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control">
                            </div>
                            <div class="input-group input-group-outline mb-3">
                                <label class="form-label">Mật khẩu</label>
                                <input type="email" class="form-control">
                            </div>
                            <div class="input-group input-group-outline mb-3">
                                <label class="form-label">Địa chỉ</label>
                                <input type="address" class="form-control">
                            </div>
                            <div class="input-group input-group-outline mb-3">
                                <label class="form-label">Thành phố</label>
                                <input type="city" class="form-control">
                            </div>
                            <div class="text-center">
                                <button type="button" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Cập
                                    nhật</button>
                            </div>
                            <div class="text-center">
                                <button type="button" class="btn btn-lg btn-outline-primary btn-lg w-100 mt-4 mb-0"
                                    onclick="div_hide()">Thoát</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <?php
    include SITE_ROOT . ('/HMS-Nhom11/assets/include/footer.php');
    ?>