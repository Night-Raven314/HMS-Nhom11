<?php
define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT']);
session_start();

include('sess-check.php');
include SITE_ROOT . ('/HMS-Nhom11/assets/include/config.php');
include SITE_ROOT . ('/HMS-Nhom11/assets/include/header.php');
?>

<head>
    <title>
        Thông tin cá nhân
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
                <img src="../../assets/image/logo01-sq.png" class="navbar-brand-img h-100" alt="main_logo">
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
                    <a class="nav-link text-white active bg-gradient-primary" href="../../TEST_Khoa/chot/profile_doc.php">

                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">person</i>
                            <!-- Check https://fonts.google.com/icons?icon.set=Material+Icons&icon.style=Rounded for ID -->
                        </div>

                        <span class="nav-link-text ms-1">Thông tin cá nhân</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white" href="../../TEST_Khoa/chot/medhist_doc.php">

                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">description</i>
                            <!-- Check https://fonts.google.com/icons?icon.set=Material+Icons&icon.style=Rounded for ID -->
                        </div>

                        <span class="nav-link-text ms-1">Bệnh án</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white" href="../../TEST_Khoa/chot/patient_doc.php">

                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">groups</i>
                            <!-- Check https://fonts.google.com/icons?icon.set=Material+Icons&icon.style=Rounded for ID -->
                        </div>

                        <span class="nav-link-text ms-1">Bệnh nhân</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white " href="../../TEST_Khoa/chot/schedule_doc.php">

                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">event</i>
                            <!-- Check https://fonts.google.com/icons?icon.set=Material+Icons&icon.style=Rounded for ID -->
                        </div>

                        <span class="nav-link-text ms-1">Đặt lịch khám</span>
                    </a>
                </li>



                <li class="nav-item">
                    <a class="nav-link text-white" href="../../TEST_Khoa/chot/work_doc.php">

                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">calendar_today</i>
                            <!-- Check https://fonts.google.com/icons?icon.set=Material+Icons&icon.style=Rounded for ID -->
                        </div>

                        <span class="nav-link-text ms-1">Lịch làm</span>
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
                        <li class="nav-item dropdown pe-2 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="../../assets/image/user login image.png" alt="profile_image"
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
                                    <a class="dropdown-item border-radius-md" href="../../TEST_Khoa/sign-in_test.php">
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



        <div class="container-fluid px-2 px-md-4">
            <div class="page-header min-height-300 border-radius-xl mt-4"
                style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
                <span class="mask bg-gradient-primary opacity-6"></span>
            </div>
            <div class="card card-body mx-3 mx-md-4 mt-n6">
                <div class="row gx-4 mb-2">
                    <div class="col-auto">
                        <div class="avatar avatar-xl position-relative">
                            <img src="../../assets/image/user login image.png" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                        </div>
                    </div>
                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <h5 class="mb-1"><?php echo $user['full_name']; ?></h5>
                            <p class="mb-0 font-weight-normal text-sm"><?php echo $user['role']; ?></p>
                        </div>
                    </div>
                    <div class="col-auto" style="margin-left: auto; margin-right: 10px;">
                        <div class="text-center">
                            <button type="button" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0" title="Edit Profile" onclick="div_show('container_popup')">Cập nhật</button>
                        </div>
                    </div>
                    <div class="card-header pb-0 p-3"></div>
                    <div class="card-body p-3">
                        <ul class="list-group">
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Số điện thoại:</strong>&nbsp; <?php echo $user['contact_no']; ?></li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Email:</strong>&nbsp; <?php echo $user['email_address']; ?></li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Địa chỉ:</strong>&nbsp; <?php echo $user['address']; ?></li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Thành phố:</strong>&nbsp; <?php echo $user['city']; ?></li>
                            <li class="list-group-item border-0 ps-0 pb-0"></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Popup Section for Form -->
        <div class="popup-container" id="container_popup" style="display: none;">
            <div id="popupFormContainer">
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
                                <label class="form-label">SĐT</label>
                                <input type="contact_no" class="form-control">
                            </div>
                            <div class="input-group input-group-outline mb-3">
                                <label class="form-label">Email</label>
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
                                    onclick="div_hide('container_popup')">Thoát</button>
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
    <script src="http://localhost/HMS-Nhom11/assets/js/popup-copy.js"></script>