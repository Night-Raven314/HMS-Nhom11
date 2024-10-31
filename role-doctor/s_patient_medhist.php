<!DOCTYPE html>
<html lang="en">

<?php
define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT']);

include SITE_ROOT . ('/HMS-Nhom11/assets/include/config.php');
include('sess-check.php');
?>

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">

    <title>
        Hồ sơ bệnh nhân
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
    <link id="pagestyle" href="../assets/css/material_dash.css" rel="stylesheet" />

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
                    <a class="nav-link text-white" href="schedule.php">

                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">calendar_month</i>
                            <!-- Check https://fonts.google.com/icons?icon.set=Material+Icons&icon.style=Rounded for ID -->
                        </div>

                        <span class="nav-link-text ms-1">Lịch hẹn kiểm tra</span>
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link text-white active bg-gradient-primary" href="patient.php">

                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">groups</i>
                            <!-- Check https://fonts.google.com/icons?icon.set=Material+Icons&icon.style=Rounded for ID -->
                        </div>

                        <span class="nav-link-text ms-1">Danh sách bệnh nhân</span>
                    </a>
                </li>

                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Quản trị
                    </h6>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white" href="profile.php">

                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">person</i>
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

                    <h6 class="font-weight-bolder mb-0">HỒ SƠ BỆNH NHÂN</h6>

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
                                href="../assets/include/log-out.php">Đăng xuất</a>
                        </li>
                        </li>

                        <li class="nav-item d-flex align-items-center">
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
                                <h6 class="text-white text-capitalize ps-3">Thông tin bệnh nhân</h6>

                            </div>
                        </div>

                        <div class="card-body px-0 pb-2">

                            <div class="table-responsive p-0">

                                <table class="table align-items-center mb-0">


                                    <table class="table table-bordered ">





                                        <?php

                                        $sql = "SELECT  usr.full_name,
                                              usr.email_address,
                                              usr.contact_no,
                                              usr.address,
                                              usr.city,
                                              usr.gender,
                                              usr.created_at,
                                              ptn.patient_age,
                                              ptn.med_hist
                                      FROM dim_user usr
                                      LEFT JOIN fact_patient_details ptn
                                      ON ptn.patient_id = usr.user_id
                                      WHERE
                                          -- usr.full_name = 'Pham Van Cuong'
                                          usr.user_id =34; ";
                                        $result = $conn->query($sql);
                                        // Kiểm tra và hiển thị dữ liệu
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {


                                                $fullname = $row["full_name"];
                                                $emailaddress = $row["email_address"];
                                                $sdt = $row["contact_no"];
                                                $address = $row["address"];
                                                $gioitinh = $row["gender"];
                                                $tuoi = $row["patient_age"];
                                                $tsb = $row["med_hist"];
                                                $created_at = $row["created_at"];

                                                echo "<tr>";
                                                echo " <th>Họ và tên</th>  ";
                                                echo "<td>$fullname</td>";
                                                echo " <th>Địa chỉ email</th>  ";
                                                echo "<td>$emailaddress</td>";
                                                echo "</tr>";
                                                echo "<tr>";
                                                echo " <th>Số điện thoại</th>  ";
                                                echo "<td>$sdt</td>";
                                                echo " <th>Địa chỉ</th>  ";
                                                echo "<td>$address</td>";
                                                echo "</tr>";
                                                echo " <th>Giới tính</th>  ";
                                                echo "<td>$gioitinh</td>";
                                                echo " <th>Tuổi</th>  ";
                                                echo "<td>$tuoi</td>";
                                                echo "</tr>";
                                                echo " <th>Tiền sử bệnh (nếu có )</th>  ";
                                                echo "<td>$tsb</td>";
                                                echo " <th>Ngày/Giờ hẹn khám</th>  ";
                                                echo "<td>$created_at</td>";
                                                echo "</td>";

                                            }
                                        } else {
                                            // echo "Không tìm thấy người dùng.";
                                        }


                                        // Đóng kết nối
                                        








                                        ?>





                                    </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3"> Lịch sử kiểm tra y tế</h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center justify-content-center mb-0">
                                    <tr>
                                        <th>Huyết áp</th>

                                        <th>Trọng lượng</th>



                                        <th>Lượng đường trong máu</th>

                                        <th>Nhiệt độ cơ thể</th>


                                        <th>Đơn thuốc</th>

                                        <th>Ngày/Giờ hẹn khám</th>


                                    </tr>
                                    <?php


                                    $sql = "SELECT fmh.blood_press,fmh.blood_sugar,fmh.weight,fmh.temp,fmh.med_note,fmh.created_at

                                        FROM fact_med_hist fmh
                                            LEFT JOIN dim_user usr
                                                ON fmh.patient_id = usr.user_id
                                        WHERE
                                            -- usr.full_name = 'Pham Thi Kim'
                                            usr.user_id = 34
                                        ORDER BY
                                            created_at DESC, med_hist_id DESC";

                                    $result = $conn->query($sql);
                                    // Kiểm tra và hiển thị dữ liệu
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            $bp = $row["blood_press"];
                                            $weight = $row["weight"];
                                            $bs = $row["blood_sugar"];
                                            $temp = $row["temp"];
                                            $pres = $row["med_note"];
                                            $created_at = $row["created_at"];



                                            echo "<tr>";
                                            echo "<td>$bp</td>";
                                            echo "<td>$weight</td>";
                                            echo "<td>$bs</td>";
                                            echo "<td>$temp</td>";
                                            echo "<td>$pres</td>";
                                            echo "<td>$created_at</td>";
                                            echo "</tr>";

                                        }
                                    } else {
                                        // echo "Không tìm thấy người dùng.";
                                    }


                                    // Đóng kết nối
                                    








                                    ?>



                                </table>
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
    <script src="../assets/js/material-dashboard.min.js"></script>
</body>

</html>