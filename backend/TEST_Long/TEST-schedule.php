<?php
define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT']);

include('sess-check.php');
include SITE_ROOT . ('/HMS-Nhom11/backend/assets/include/config.php');
include SITE_ROOT . ('/HMS-Nhom11/backend/assets/include/header.php');
?>

<head>
    <title>
        Lịch hẹn kiểm tra
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
                    <a class="nav-link text-white active bg-gradient-primary" href="schedule.php">

                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">calendar_month</i>
                            <!-- Check https://fonts.google.com/icons?icon.set=Material+Icons&icon.style=Rounded for ID -->
                        </div>

                        <span class="nav-link-text ms-1">Lịch hẹn kiểm tra</span>
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link text-white" href="patient.php">

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

                    <h6 class="font-weight-bolder mb-0">LỊCH HẸN KIỂM TRA</h6>

                </nav>
                

                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">

                    </div>
                    <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                        <form method="GET" action="" class="input-group input-group-outline">
                            <label class="form-label">Tìm kiếm</label>
                            <input type="text" name="query" class="form-control" placeholder="">
                            <button type="submit" class="btn btn-primary ms-2">Tìm</button>
                        </form>
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
                            <!-- Right corner user section -->
                        <li class="nav-item d-flex align-items-center">
                            <a class="btn btn-outline-primary btn-sm mb-0 me-3"
                                href="../backend/assets/include/log-out.php">Đăng xuất</a>
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
                                <h6 class="text-white text-capitalize ps-3">Danh sách lịch hẹn kiểm tra</h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                Bác sĩ</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                Tên bệnh nhân</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                Khoa khám</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                Phí tư vấn</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                Ngày hẹn khám</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                Giờ hẹn khám</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                Ngày tạo cuộc hẹn</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                Trạng thái</th>

                                            <th class="text-secondary opacity-7"></th>
                                        </tr>


                                    </thead>

                                    <?php

                                    // $sql = "SELECT ptn.full_name AS patient_name,
                                    //         dct.full_name AS doctor_name,
                                    //         spc.specialty_name,
                                    //         app.booking_date,
                                    //         app.booking_time,
                                    //         app.cons_fee,
                                    //         app.created_at
                                    //     FROM fact_appointment app
                                    //     LEFT JOIN dim_user ptn ON app.patient_id = ptn.user_id
                                    //     LEFT JOIN dim_user dct ON app.doctor_id = dct.user_id
                                    //     LEFT JOIN dim_specialties spc ON app.specialty_id = spc.specialty_id
                                    //     WHERE dct.user_id = $auth_user_id
                                    //     ORDER BY app.booking_date DESC, app.booking_time DESC; ";
                                    // $result = $conn->query($sql);
                                    // // Kiểm tra và hiển thị dữ liệu
                                    // if ($result->num_rows > 0) {
                                    //     while ($row = $result->fetch_assoc()) {


                                    //         $fullname = $row["full_name"];
                                    //         $ptn = $row["patient_name"];
                                    //         $dtn = $row["doctor_name"];
                                    //         $spn = $row["specialty_name"];
                                    //         $bkd = $row["booking_date"];
                                    //         $bkt = $row["booking_time"];
                                    //         $cf = $row["cons_fee"];
                                    //         $created_at = $row["created_at"];

                                    //         echo "<tr>";
                                    //         echo '<td class="align-middle text-center">
                                    //         <div class="d-flex px-2 py-1">
                                    //             <div class="d-flex flex-column justify-content-center">
                                    //                 <h6 class="mb-0 text-sm">' . $dtn . '</h6>
                                    //             </div>
                                    //         </div>
                                    //     </td>';
                                    //         echo '<td class="align-middle text-center">
                                    //         <div class="d-flex px-2 py-1">
                                    //             <div class="d-flex flex-column justify-content-center">
                                    //                 <h6 class="mb-0 text-sm">' . $ptn . '</h6>
                                    //             </div>
                                    //         </div>
                                    //     </td>';

                                    //         echo ' <td class="align-middle text-center">
                                    //         <span class="text-xs font-weight-bold mb-0">' . $spn . '</span>
                                    //     </td>';

                                    //         echo '<td class="align-middle text-center">
                                    //     <p class="text-xs font-weight-bold mb-0">' . $cf . '</p>
                                    //     <p class="text-xs text-secondary mb-0">VNĐ</p>
                                    // </td>';

                                    //         echo '<td class="align-middle text-center">
                                    //     <span class="text-xs font-weight-bold mb-0">' . $bkd . '</span>
                                    // </td>';
                                    //         echo '<td class="align-middle text-center">
                                    //     <span class="text-xs font-weight-bold mb-0">' . $bkt . '</span>
                                    // </td>';
                                    //         echo '<td class="align-middle text-center">
                                    //     <span class="text-xs font-weight-bold mb-0">' . $created_at . '</span>
                                    // </td>';





                                    //         echo "</tr>";
                                    //     }
                                    // } else {
                                    //     // echo "Không tìm thấy người dùng.";
                                    // }


                                    // // Đóng kết nối
                                    $query = isset($_GET['query']) ? $_GET['query'] : '';
                                    $sql = "SELECT ptn.full_name AS patient_name,
                                    dct.full_name AS doctor_name,
                                    spc.specialty_name,
                                    app.booking_date,
                                    app.booking_time,
                                    app.cons_fee,
                                    app.created_at
                            FROM fact_appointment app
                            LEFT JOIN dim_user ptn ON app.patient_id = ptn.user_id
                            LEFT JOIN dim_user dct ON app.doctor_id = dct.user_id
                            LEFT JOIN dim_specialties spc ON app.specialty_id = spc.specialty_id
                            WHERE dct.user_id = $auth_user_id";
                    
                    // Nếu có từ khóa, thêm điều kiện tìm kiếm
                    if (!empty($query)) {
                        $sql .= " AND (ptn.full_name LIKE ? OR dct.full_name LIKE ? OR spc.specialty_name LIKE ?)";
                    }
                    
                    // Sắp xếp kết quả
                    $sql .= " ORDER BY app.booking_date DESC, app.booking_time DESC";
                    
                    $stmt = $conn->prepare($sql);
                    
                    if (!empty($query)) {
                        $searchTerm = '%' . $query . '%';
                        $stmt->bind_param("sss", $searchTerm, $searchTerm, $searchTerm);
                    }
                    
                    $stmt->execute();
                    $result = $stmt->get_result();
                    
                    // Hiển thị dữ liệu
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $ptn = $row["patient_name"];
                            $dtn = $row["doctor_name"];
                            $spn = $row["specialty_name"];
                            $bkd = $row["booking_date"];
                            $bkt = $row["booking_time"];
                            $cf = $row["cons_fee"];
                            $created_at = $row["created_at"];
                    
                            echo "<tr>";
                            echo '<td class="align-middle text-center">
                                    <div class="d-flex px-2 py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">' . htmlspecialchars($dtn) . '</h6>
                                        </div>
                                    </div>
                                  </td>';
                            echo '<td class="align-middle text-center">
                                    <div class="d-flex px-2 py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">' . htmlspecialchars($ptn) . '</h6>
                                        </div>
                                    </div>
                                  </td>';
                            echo '<td class="align-middle text-center">
                                    <span class="text-xs font-weight-bold mb-0">' . htmlspecialchars($spn) . '</span>
                                  </td>';
                            echo '<td class="align-middle text-center">
                                    <p class="text-xs font-weight-bold mb-0">' . number_format($cf, 0, ',', '.') . ' VNĐ</p>
                                  </td>';
                            echo '<td class="align-middle text-center">
                                    <span class="text-xs font-weight-bold mb-0">' . htmlspecialchars($bkd) . '</span>
                                  </td>';
                            echo '<td class="align-middle text-center">
                                    <span class="text-xs font-weight-bold mb-0">' . htmlspecialchars($bkt) . '</span>
                                  </td>';
                            echo '<td class="align-middle text-center">
                                    <span class="text-xs font-weight-bold mb-0">' . htmlspecialchars($created_at) . '</span>
                                  </td>';
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7' class='text-center'>Không tìm thấy kết quả nào.</td></tr>";
                    }
                    
                    // Đóng kết nối
                    $stmt->close();
                    $conn->close();







                                    ?>
                                    <tbody>

                                    </tbody>
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
                    </div>
                </div>
            </footer>
        </div>

    </main>

<?php
include SITE_ROOT . ('/HMS-Nhom11/backend/assets/include/footer.php');
?>