<?php
define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT']);

include SITE_ROOT . ('/HMS-Nhom11/assets/include/config.php');
include SITE_ROOT . ('/HMS-Nhom11/assets/include/header.php');
include '../TEST_Khoa/get_query.php';

?>

<head>
    <title>
        Apppointment
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
                    <a class="nav-link text-white" href="../TEST_Khoa/work_schedule.php">

                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">event</i>
                            <!-- Check https://fonts.google.com/icons?icon.set=Material+Icons&icon.style=Rounded for ID -->
                        </div>

                        <span class="nav-link-text ms-1">Lịch làm</span>
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link text-white active bg-gradient-primary" href="../TEST_Khoa/appointment_form.php">

                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">calendar_today</i>
                            <!-- Check https://fonts.google.com/icons?icon.set=Material+Icons&icon.style=Rounded for ID -->
                        </div>

                        <span class="nav-link-text ms-1">Đặt lịch khám</span>
                    </a>
                </li>

                <!-- <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Quản trị
                    </h6>
                </li> -->

                <li class="nav-item">
                    <a class="nav-link text-white" href="../TEST_Khoa/profile_test.php">

                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">account_circle</i>
                            <!-- Check https://fonts.google.com/icons?icon.set=Material+Icons&icon.style=Rounded for ID -->
                        </div>

                        <span class="nav-link-text ms-1">Thông tin cá nhân</span>
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

                    <h6 class="font-weight-bolder mb-0">TEST_Khoa</h6>

                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">

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
                            <!-- Right corner user section -->
                        <li class="nav-item d-flex align-items-center">
                            <a class="btn btn-outline-primary btn-sm mb-0 me-3"
                                href="../TEST_Khoa/sign-in_test.php">Đăng xuất</a>
                        </li>
                        </li>

                        <li class="nav-item d-flex align-items-center">
                    </ul>

                </div>
            </div>
        </nav>

        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row justify-content-center"> <!-- Căn giữa cột -->
                <div class="col-md-11"> <!-- Chiếm 8 cột -->
                    <div class="card my-4 mx-auto">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Đăng kí lịch hẹn</h6>
                            </div>
                            <div class="card-body">
                                <form role="form" action="#" method="post">
                                    <div class="row"> <!-- Thêm hàng để chia thành 2 bên -->
                                        <div class="col-md-6"> <!-- Cột bên trái -->
                                            <div class="input-group input-group-outline mb-3">
                                                <label class="form-label">Họ và Tên</label>
                                                <input type="text" name="full_name" class="form-control" required>
                                            </div>
                                            <div class="input-group input-group-outline mb-3">
                                                <label class="form-label">Số điện thoại</label>
                                                <input type="text" name="phone" class="form-control" required>
                                            </div>
                                            <div class="input-group input-group-outline mb-3">
                                                <label class="form-label">Email</label>
                                                <input type="email" name="email" class="form-control" required>
                                            </div>
                                            <div class="input-group input-group-outline mb-3">
                                                <label class="btn-group-vertical" style="margin-right: 10px;">Chuyên khoa</label>
                                                <select name="specialty_id" class="form-control" required>
                                                    <option value="" disabled selected>Chọn chuyên khoa</option> <!-- Tùy chọn mặc định -->
                                                    <?php if (!empty($specialties)): ?>
                                                        <?php foreach ($specialties as $specialty): ?>
                                                            <option value="<?= $specialty['specialty_id'] ?>"><?= $specialty['specialty_name'] ?></option>
                                                        <?php endforeach; ?>
                                                    <?php else: ?>
                                                        <option disabled>Không có chuyên khoa nào</option>
                                                    <?php endif; ?>
                                                </select>
                                            </div>
                                            <div class="input-group input-group-outline mb-3">
                                                <label class="btn-group-vertical" style="margin-right: 10px;">Bác sĩ</label>
                                                <select name="doctor_id" class="form-control" required>
                                                    <option value="" disabled selected>Chọn bác sĩ</option> <!-- Tùy chọn mặc định -->
                                                    <?php if (!empty($get_doctors)): ?>
                                                        <?php foreach ($get_doctors as $doctors): ?>
                                                            <option value="<?= $doctors['user_id'] ?>"><?= $doctors['full_name'] ?></option>
                                                        <?php endforeach; ?>
                                                    <?php else: ?>
                                                        <option disabled>Không có chuyên khoa nào</option>
                                                    <?php endif; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6"> <!-- Cột bên phải -->

                                            <div class="input-group input-group-outline mb-3">
                                                <label class="form-label">Phí khám</label>
                                                <input type="number" name="cons_fee" class="form-control" required>
                                            </div>
                                            <div class="input-group input-group-outline mb-3">
                                                <label class="btn-group-vertical" style="margin-right: 10px;">Ngày hẹn</label>
                                                <input type="date" name="booking_date" class="form-control" required>
                                            </div>
                                            <div class="input-group input-group-outline mb-3">
                                                <label class="btn-group-vertical" style="margin-right: 10px;">Giờ hẹn</label>
                                                <input type="time" name="booking_time" class="form-control" required>
                                            </div>
                                            <div class="input-group input-group-outline mb-3">
                                                <label class="form-label">Thành phố</label>
                                                <input type="text" name="city" class="form-control" required>
                                            </div>
                                            <div class="input-group input-group-outline mb-3">
                                                <label class="form-label">Địa chỉ</label>
                                                <input type="text" name="address" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-check form-check-info text-start ps-0">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Tôi đồng ý <a href="#" class="text-dark font-weight-bolder">Điều khoản và Điều kiện</a>
                                        </label>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Đặt lịch</button>
                                    </div>
                                </form>
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
                                <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Huan,
                                    Khoa and Long</a>
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