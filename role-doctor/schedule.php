<?php
define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT']);

include('sess-check.php');
include SITE_ROOT . ('/HMS-Nhom11/assets/include/config.php');
include SITE_ROOT . ('/HMS-Nhom11/assets/include/header.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['update_health_metrics'])) {
        $bld_press = mysqli_real_escape_string($conn, $_POST['blood_pressure']);
        $temp = mysqli_real_escape_string($conn, $_POST['body_temperature']);
        ;
        $weight = mysqli_real_escape_string($conn, $_POST['weight']);
        ;
        $bld_sgr = mysqli_real_escape_string($conn, $_POST['blood_sugar']);
        ;
        $note = mysqli_real_escape_string($conn, $_POST['notes']);

        $row_id = $_POST['update_health_metrics'];

        $sql = "INSERT INTO `fact_med_hist` (`appointment_id`, `patient_id`, `blood_press`, `blood_sugar`, `weight`, `temp`, `med_note`) VALUES ($row_id, $ptnid, '$bld_press', '$bld_sgr', '$weight', '$temp', '$note')";

        $result = mysqli_query($conn, $sql);

        echo "<script type='text/javascript'>alert('Lưu kết quả thành công');</script>";

        header('Refresh:0 , url=http://localhost/HMS-Nhom11/role-doctor/schedule_test.php');
    }
}
?>

<head>
    <title>
        Lịch hẹn kiểm tra
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

                        <span class="nav-link-text ms-1">Quản lý bệnh nhân</span>
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

        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 border-radius-xl shadow-none position-sticky blur shadow-blur mt-4 left-auto top-1 z-index-sticky"
            data-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">

                    <h6 class="font-weight-bolder mb-0">LỊCH HẸN KIỂM TRA</h6>

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

                                            <th
                                                class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                Thao tác</th>
                                        </tr>

                                    </thead>
                                    <tbody>
                                        <?php

                                        $sql = "SELECT ptn.user_id AS patient_id,
                                            app.appointment_id AS appt_id,
                                            ptn.full_name AS patient_name,
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
                                        -- WHERE ptn.user_id = $auth_user_id
                                        ORDER BY app.booking_date DESC, app.booking_time DESC; ";

                                        $result = $conn->query($sql);

                                        // Kiểm tra và hiển thị dữ liệu
                                        
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {

                                                $ptnid = $row["patient_id"];
                                                $appt_id = $row["appt_id"];
                                                $fullname = $row["full_name"];
                                                $ptn = $row["patient_name"];
                                                $dtn = $row["doctor_name"];
                                                $spn = $row["specialty_name"];
                                                $bkd = $row["booking_date"];
                                                $bkt = $row["booking_time"];
                                                $cf = $row["cons_fee"];
                                                $created_at = $row["created_at"];
                                                ?>

                                                <tr>
                                                    <td class="align-middle text-center">
                                                        <div class="d-flex px-2 py-1">
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <h6 class="mb-0 text-sm"><?php echo $dtn; ?></h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <div class="d-flex px-2 py-1">
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <h6 class="mb-0 text-sm"><?php echo $ptn; ?></h6>
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <td class="align-middle text-center">
                                                        <span class="text-xs font-weight-bold mb-0"><?php echo $spn; ?></span>
                                                    </td>

                                                    <td class="align-middle text-center">
                                                        <p class="text-xs font-weight-bold mb-0"><?php $cf; ?></p>
                                                        <p class="text-xs text-secondary mb-0">VNĐ</p>
                                                    </td>

                                                    <td class="align-middle text-center">
                                                        <span class="text-xs font-weight-bold mb-0"><?php $bkd; ?></span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span class="text-xs font-weight-bold mb-0"><?php $bkt; ?></span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span class="text-xs font-weight-bold mb-0"><?php $created_at; ?></span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span class="text-xs font-weight-bold mb-0">N/A</span>
                                                    </td>
                                                    <td>
                                                        <a href='#popup_health_metrics-<?php echo $appt_id; ?>'
                                                            class='text-secondary font-weight-bold text-xs edit-btn'
                                                            data-original-title='edit' title='Sửa thông tin'
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#popup_health_metrics-<?php echo $appt_id; ?>">Sửa</a>
                                                        <a class=' text-secondary font-weight-bold text-xs edit-btn'> / </a>
                                                        <a href='#popup_prescription-<?php echo $appt_id; ?>'
                                                            class='text-secondary font-weight-bold text-xs edit-btn'
                                                            data-original-title='edit' title='Sửa thông tin'
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#popup_prescription-<?php echo $appt_id; ?>">Lập đơn
                                                            thuốc</a>
                                                    </td>

                                                </tr>
                                                <!-- popup_health_metrics -->
                                                <div class="modal fade" id="popup_health_metrics-<?php echo $appt_id; ?>"
                                                    tabindex="-1" aria-labelledby="HealthEdit" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="card">
                                                                <div
                                                                    class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                                                    <div
                                                                        class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                                                                        <h4
                                                                            class="text-white font-weight-bolder text-center mt-2 mb-0">
                                                                            Cập nhật thông tin sức khoẻ
                                                                        </h4>
                                                                    </div>
                                                                </div>
                                                                <div class="card-body edit-body">
                                                                    <form name="spcedit" role="form" method="POST">
                                                                        <div class="custom-input">
                                                                            <input type="text" name="blood_pressure"
                                                                                id="blood_pressure" placeholder="120/80">
                                                                            <label>Huyết áp</label>
                                                                        </div>
                                                                        <div class="custom-input">
                                                                            <input type="text" name="weight" id="weight"
                                                                                placeholder="70kg">
                                                                            <label>Cân nặng</label>
                                                                        </div>
                                                                        <div class="custom-input">
                                                                            <input type="text" name="blood_sugar"
                                                                                id="blood_sugar" placeholder="100 mg/Dl">
                                                                            <label>Lượng đường trong máu</label>
                                                                        </div>
                                                                        <div class="custom-input">
                                                                            <input type="text" name="body_temperature"
                                                                                id="body_temperature" placeholder="36.5C">
                                                                            <label>Nhiệt độ cơ thể</label>
                                                                        </div>
                                                                        <div class="custom-input">
                                                                            <input type="text" name="notes" id="notes"
                                                                                placeholder="Ghi chú thêm nếu cần">
                                                                            <label>Ghi chú y tế</label>
                                                                        </div>
                                                                        <div class="text-center">
                                                                            <button type="submit" name="update_health"
                                                                                value="<?php echo $appt_id; ?>"
                                                                                class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Cập
                                                                                nhật</button>
                                                                        </div>
                                                                        <div class="text-center">
                                                                            <button type="button"
                                                                                class="btn btn-lg btn-outline-primary btn-lg w-100 mt-4 mb-0"
                                                                                data-bs-dismiss="modal">Thoát</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Popup đơn thuốc -->
                                                <div class="modal fade" id="popup_prescription-<?php echo $appt_id; ?>"
                                                    tabindex="-1" aria-labelledby="PresEdit" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="card">
                                                                <div
                                                                    class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                                                    <div
                                                                        class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                                                                        <h4
                                                                            class="text-white font-weight-bolder text-center mt-2 mb-0">
                                                                            Lập đơn thuốc
                                                                        </h4>
                                                                    </div>
                                                                </div>
                                                                <div class="card-body edit-body">
                                                                    <form name="prescription_form" role="form" method="POST">
                                                                        <input type="hidden" name="med_hist_id"
                                                                            value="<?php echo $med_hist_id; ?>">
                                                                        <!-- Thêm med_hist_id làm hidden field -->
                                                                        <div class="custom-input">
                                                                            <input type="text" name="item_name" id="item_name"
                                                                                placeholder="">
                                                                            <label>Tên thuốc</label>
                                                                        </div>
                                                                        <div class="custom-input">
                                                                            <input type="number" name="amount" id="amount"
                                                                                placeholder="">
                                                                            <label>Số lượng</label>
                                                                        </div>
                                                                        <div class="custom-input">
                                                                            <input type="text" name="item_note" id="item_note"
                                                                                placeholder="">
                                                                            <label>Ghi chú</label>
                                                                        </div>
                                                                        <!-- <div class="text-center">
                                                                            <button type="submit" name="update_health"
                                                                                value="<?php echo $appt_id; ?>"
                                                                                class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Cập
                                                                                nhật</button>
                                                                        </div> -->
                                                                        <div class="text-center">
                                                                            <button type="submit" name="submit_prescription"
                                                                                class="btn btn-lg bg-gradient-primary w-100 mt-4 mb-0">Lập
                                                                                Đơn</button>
                                                                        </div>
                                                                        <div class="text-center">
                                                                            <button type="button"
                                                                                class="btn btn-lg btn-outline-primary btn-lg w-100 mt-4 mb-0"
                                                                                data-bs-dismiss="modal">Thoát</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                        }
                                        ?>

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
    include SITE_ROOT . ('/HMS-Nhom11/assets/include/footer.php');
    ?>