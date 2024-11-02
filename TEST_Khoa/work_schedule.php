<?php
define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT']);

include SITE_ROOT . ('/HMS-Nhom11/assets/include/config.php');
include SITE_ROOT . ('/HMS-Nhom11/assets/include/header.php');


?>

<head>
    <title>Lịch Làm Việc Nhân Viên</title>
</head>

<body class="g-sidenav-show" style="background-image: url('../assets/image/Hospital_Seamless1.png'); background-size: 400px 400px;">
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
                    <a class="nav-link text-white active bg-gradient-primary" href="../TEST_Khoa/work_schedule.php">

                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">event</i>
                            <!-- Check https://fonts.google.com/icons?icon.set=Material+Icons&icon.style=Rounded for ID -->
                        </div>

                        <span class="nav-link-text ms-1">Lịch làm</span>
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link text-white " href="../TEST_Khoa/appointment_form.php">

                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">calendar_today</i>
                            <!-- Check https://fonts.google.com/icons?icon.set=Material+Icons&icon.style=Rounded for ID -->
                        </div>

                        <span class="nav-link-text ms-1">Đặt lịch khám</span>
                    </a>
                </li>



                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Quản trị
                    </h6>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white" href="#">

                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">#</i>
                            <!-- Check https://fonts.google.com/icons?icon.set=Material+Icons&icon.style=Rounded for ID -->
                        </div>

                        <span class="nav-link-text ms-1">function03</span>
                    </a>
                </li>

            </ul>
        </div>

    </aside>

    <main class="main-content border-radius-lg">
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 border-radius-xl shadow-none position-sticky blur shadow-blur mt-4 left-auto top-1 z-index-sticky" data-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <h6 class="font-weight-bolder mb-0">TEST_Khoa</h6>
                </nav>
                <ul class="navbar-nav  justify-content-end">
                    <li class="nav-item d-flex align-items-center">
                        <a class="btn btn-outline-primary btn-sm mb-0 me-3" href="../assets/include/log-out.php">Đăng xuất</a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Nội dung trang -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Lịch Làm Việc của Nhân Viên</h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Bác sĩ</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Chuyên khoa</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ngày làm việc</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Giờ làm việc</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- keo du lieu -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include SITE_ROOT . ('/HMS-Nhom11/assets/include/footer.php'); ?>


    </main>

</body>