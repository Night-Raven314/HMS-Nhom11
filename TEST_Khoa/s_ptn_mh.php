<?php
define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT']);

include('../role-doctor/sess-check.php');
include SITE_ROOT . ('/HMS-Nhom11/assets/include/config.php');
include SITE_ROOT . ('/HMS-Nhom11/assets/include/header.php');




?>

<script>
    const urlParams = new URLSearchParams(window.location.search);
    const greetingValue = urlParams.get('usrid');
    console.log(greetingValue);
</script>

<head>
    <title>
        Hồ sơ bệnh nhân
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
                    <a class="nav-link text-white" href="../TEST_Khoa/schedule_test.php">

                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">calendar_month</i>
                            <!-- Check https://fonts.google.com/icons?icon.set=Material+Icons&icon.style=Rounded for ID -->
                        </div>

                        <span class="nav-link-text ms-1">Lịch hẹn kiểm tra</span>
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link text-white" href="../TEST_Khoa/ptn_test.php">

                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">groups</i>
                            <!-- Check https://fonts.google.com/icons?icon.set=Material+Icons&icon.style=Rounded for ID -->
                        </div>

                        <span class="nav-link-text ms-1">Quản lý bệnh nhân</span>
                    </a>
                </li>

                <!-- <li class="nav-item">
                    <a class="nav-link text-white active bg-gradient-primary" href="../TEST_Khoa/s_ptn_mh.php">

                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">groups</i> -->
                <!-- Check https://fonts.google.com/icons?icon.set=Material+Icons&icon.style=Rounded for ID -->
                <!-- </div>

                        <span class="nav-link-text ms-1">[Temp] Bệnh án</span>
                    </a>
                </li> -->

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

    <main class="main-content border-radius-lg ps ">
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
                                <h6 class="text-white text-capitalize ps-3">Thông tin bệnh nhân</h6>

                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <table class="table table-bordered ">
                                        <?php
                                        // Kiểm tra nếu có giá trị usrid trong URL
                                        if (isset($_GET['usrid'])) {
                                            $patient_id = intval($_GET['usrid']); // Chuyển đổi ID sang kiểu số nguyên

                                            $sql = "SELECT usr.full_name,
                                                    usr.email_address,
                                                    usr.contact_no,
                                                    usr.address,
                                                    usr.city,
                                                    usr.gender,
                                                    usr.created_at,
                                                    ptn.patient_age,
                                                    ptn.med_hist
                                                    FROM dim_user usr
                                                    LEFT JOIN fact_patient_details ptn ON ptn.patient_id = usr.user_id
                                                    WHERE usr.user_id = $patient_id;"; // Lấy thông tin theo patient_id

                                            $result = $conn->query($sql);

                                            // Kiểm tra và hiển thị dữ liệu
                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    $roleMapping = [
                                                        "male" => "Nam",
                                                        "female" => "Nữ"
                                                    ];

                                                    $fullname = $row["full_name"];
                                                    $emailaddress = $row["email_address"];
                                                    $sdt = $row["contact_no"];
                                                    $address = $row["address"];
                                                    $gender = isset($roleMapping[$row["gender"]]) ? $roleMapping[$row["gender"]] : $row["gender"];
                                                    $tuoi = $row["patient_age"];
                                                    $tsb = $row["med_hist"];
                                                    $created_at = $row["created_at"];
                                        ?>
                                                    <tr>
                                                        <th>Họ và tên</th>
                                                        <td><?php echo $fullname ?></td>
                                                        <th>Địa chỉ email</th>
                                                        <td><?php echo $emailaddress ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Số điện thoại</th>
                                                        <td><?php echo $sdt ?></td>
                                                        <th>Địa chỉ</th>
                                                        <td><?php echo $address ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Giới tính</th>
                                                        <td><?php echo $gender ?></td>
                                                        <th>Tuổi</th>
                                                        <td><?php echo $tuoi ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Tiền sử bệnh (nếu có)</th>
                                                        <td><?php echo $tsb ?></td>
                                                        <th>Ngày/Giờ hẹn khám</th>
                                                        <td><?php echo $created_at ?></td>
                                                    </tr>
                                        <?php
                                                }
                                            } else {
                                                echo "<tr><td colspan='8' class='text-center'>Không tìm thấy thông tin bệnh nhân.</td></tr>";
                                            }
                                        } else {
                                            echo "<tr><td colspan='8' class='text-center'>ID bệnh nhân không được cung cấp.</td></tr>";
                                        }
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
                                        <th>Ghi chú</th>
                                        <th>Ngày/Giờ khám</th>
                                    </tr>
                                    <?php
                                    // Kiểm tra nếu có giá trị usrid trong URL
                                    if (isset($_GET['usrid'])) {
                                        $patient_id = $_GET['usrid'];   

                                        // Chú ý: cần kiểm tra xem patient_id có phải là số hay không
                                        if (is_numeric($patient_id)) {
                                            $sql = "SELECT fmh.blood_press, fmh.blood_sugar, fmh.weight, fmh.temp, fmh.med_note, fmh.created_at
                                                    FROM fact_med_hist fmh
                                                    LEFT JOIN dim_user usr ON fmh.patient_id = usr.user_id
                                                    WHERE usr.user_id = $patient_id
                                                    ORDER BY fmh.created_at DESC, fmh.med_hist_id DESC";

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
                                    ?>
                                                    <tr>
                                                        <td><?php echo htmlspecialchars($bp); ?></td>
                                                        <td><?php echo htmlspecialchars($weight); ?></td>
                                                        <td><?php echo htmlspecialchars($bs); ?></td>
                                                        <td><?php echo htmlspecialchars($temp); ?></td>
                                                        <td><?php echo htmlspecialchars($pres); ?></td>
                                                        <td><?php echo htmlspecialchars($created_at); ?></td>
                                                    </tr>


                                    <?php
                                                }
                                            } else {
                                                echo "<tr><td colspan='6' class='text-center'>Không có thông tin y tế nào cho bệnh nhân này.</td></tr>";
                                            }
                                        } else {
                                            echo "<tr><td colspan='6' class='text-center'>ID bệnh nhân không hợp lệ.</td></tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='6' class='text-center'>ID bệnh nhân không được cung cấp.</td></tr>";
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