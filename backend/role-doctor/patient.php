<?php
define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT']);

include('sess-check.php');
include SITE_ROOT . ('/HMS-Nhom11/assets/include/config.php');
include SITE_ROOT . ('/HMS-Nhom11/assets/include/header.php');
?>

<head>
    <title>
        Quản lý bệnh nhân
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

                        <span class="nav-link-text ms-1">Quản lý bệnh nhân</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white" href="s_patient_medhist.php">

                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">groups</i>
                            <!-- Check https://fonts.google.com/icons?icon.set=Material+Icons&icon.style=Rounded for ID -->
                        </div>

                        <span class="nav-link-text ms-1">[Temp] Bệnh án</span>
                    </a>
                </li>

                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Quản trị
                    </h6>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white" href="work_hour.php">

                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">calendar_month</i>
                            <!-- Check https://fonts.google.com/icons?icon.set=Material+Icons&icon.style=Rounded for ID -->
                        </div>

                        <span class="nav-link-text ms-1">Lịch làm việc</span>
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
            Quản lý bệnh nhân
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
                  <img src="../assets/image/user login image.png" alt="profile_image">
                </button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="profile.php">Thông tin người dùng</a></li>
                  <li><a class="dropdown-item" href="../assets/include/log-out.php">Đăng xuất</a></li>
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
                                <h6 class="text-white text-capitalize ps-3">Danh sách bệnh nhân</h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="custom-table">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                STT</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                Họ và Tên</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                Số điện thoại</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                Giới tính</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                Ngày giờ hẹn khám</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                Ngày tạo cuộc hẹn</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                Thao tác</th>

                                            <th class="text-secondary opacity-7"></th>
                                        </tr>
                                    </thead>

                                    <?php

                                    $sql = "SELECT p.user_id AS patient_id,
                                            p.full_name AS patient_name,
                                            p.contact_no ,
                                            p.gender ,
                                            a.booking_date ,
                                            a.booking_time ,
                                            a.created_at 
                                        FROM 
                                            fact_appointment a
                                        LEFT JOIN 
                                            dim_user p ON a.patient_id = p.user_id
                                        WHERE 
                                            a.doctor_id = $auth_user_id
                                        ORDER BY 
                                            a.booking_date,a.booking_time ASC; ";
                                    $result = $conn->query($sql);
                                    // Kiểm tra và hiển thị dữ liệu
                                    $i = 0;
                                    if ($result->num_rows > 0) {
                                        $roleMapping = [
                                            "male" => "Nam",
                                            "female" => "Nữ"
                                        ];

                                        while ($row = $result->fetch_assoc()) {
                                            $i++;
                                            $gender = isset($roleMapping[$row["gender"]]) ? $roleMapping[$row["gender"]] : $row["gender"];
                                            $patient_id = $row["patient_id"];
                                            $fullname = $row["full_name"];
                                            $ptn = $row["patient_name"];
                                            $sdt = $row["contact_no"];
                                            $bkd = $row["booking_date"];
                                            $bkt = $row["booking_time"];

                                            $created_at = $row["created_at"];
                                            ?>
                                            <tr>
                                                <td class="align-middle text-center">
                                                    <h6 class="mb-0 text-sm"><?php echo $i; ?></h6>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <h6 class="mb-0 text-sm"><?php echo $ptn; ?></h6>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-xs font-weight-bold mb-0"><?php echo $sdt; ?></span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-xs font-weight-bold mb-0"><?php echo $gender; ?></span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <p class="text-xs font-weight-bold mb-0"><?php echo $bkd; ?>
                                                        <?php echo $bkt; ?>
                                                    </p>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span
                                                        class="text-xs font-weight-bold mb-0"><?php echo $created_at; ?></span>
                                                </td>
                                                <td class='align-middle text-center'>
                                                    <a href="s_patient_medhist.php?usrid='<?php echo $patient_id; ?>'"
                                                        class='text-secondary font-weight-bold text-xs edit-btn'>Xem bệnh án</a>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    } else {
                                        // echo "Không tìm thấy người dùng.";
                                    }

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

    <?php
    include SITE_ROOT . ('/HMS-Nhom11/assets/include/footer.php');
    ?>