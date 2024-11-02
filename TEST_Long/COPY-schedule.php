<?php
define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT']);

include('sess-check.php');
include SITE_ROOT . ('/HMS-Nhom11/assets/include/config.php');
include SITE_ROOT . ('/HMS-Nhom11/assets/include/header.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['booking']) && $_POST['booking'] == 'create') {
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

        echo "<script type='text/javascript'>alert('Đăng ký thành công');</script>";

        header('Refresh:0 , url=http://localhost/HMS-Nhom11/role-patient/schedule.php');
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
                    <a class="nav-link text-white" href="medhist.php">

                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">manage_search</i>
                            <!-- Check https://fonts.google.com/icons?icon.set=Material+Icons&icon.style=Rounded for ID -->
                        </div>

                        <span class="nav-link-text ms-1">Lịch sử y tế</span>
                    </a>
                </li>

                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Quản trị
                    </h6>
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
                                <h6 class="text-white text-capitalize ps-3" style="float: left;">Danh sách lịch hẹn kiểm
                                    tra</h6>
                                <div class="table-float-btn-container">
                                    <a class="table-float-btn btn btn-outline-primary btn-sm mb-0 me-3"
                                        style="background: #ffffff" href="#popup_booking">Đăng ký</a>
                                </div>
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
// Truy vấn cuộc hẹn từ cơ sở dữ liệu
$sql = "SELECT app.appointment_id,
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
        WHERE ptn.user_id = $auth_user_id
        ORDER BY app.booking_date DESC, app.booking_time DESC;";
$result = $conn->query($sql);

// Hiển thị các cuộc hẹn và tạo popup sửa lịch hẹn cho mỗi cuộc hẹn
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $appointment_id = $row["appointment_id"];
        $ptn = $row["patient_name"];
        $dtn = $row["doctor_name"];
        $spn = $row["specialty_name"];
        $bkd = $row["booking_date"];
        $bkt = $row["booking_time"];
        $cf = $row["cons_fee"];
        
        echo "<tr>";
        echo "<td class='align-middle text-center'><h6 class='mb-0 text-sm'>$dtn</h6></td>";
        echo "<td class='align-middle text-center'><h6 class='mb-0 text-sm'>$ptn</h6></td>";
        echo "<td class='align-middle text-center'><span class='text-xs font-weight-bold mb-0'>$spn</span></td>";
        echo "<td class='align-middle text-center'><p class='text-xs font-weight-bold mb-0'>$cf VNĐ</p></td>";
        echo "<td class='align-middle text-center'><span class='text-xs font-weight-bold mb-0'>$bkd</span></td>";
        echo "<td class='align-middle text-center'><span class='text-xs font-weight-bold mb-0'>$bkt</span></td>";

        // Nút Sửa mở popup
        echo "<td>
                <a href='#popup_edit-$appointment_id' class='text-secondary font-weight-bold text-xs edit-btn' title='Sửa thông tin' data-toggle='modal' data-target='#popup_edit-$appointment_id'>Sửa</a>
              </td>";
        echo "</tr>";
?>

<!-- Popup Sửa Lịch Hẹn -->
<div id="popup_edit-<?php echo $appointment_id; ?>" class="overlay_flight_traveldil">
    <div class="card popup-cont">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Sửa Lịch Hẹn</h4>
            </div>
        </div>
        <div class="card-body">
            <form method="POST" action="update_appointment.php">
                <input type="hidden" name="appointment_id" value="<?php echo $appointment_id; ?>">
                
                <!-- Các trường chỉnh sửa -->
                <div class="mb-3">
                    <label for="booking_date-<?php echo $appointment_id; ?>" class="form-label">Ngày hẹn</label>
                    <input type="date" name="booking_date" id="booking_date-<?php echo $appointment_id; ?>" class="form-control" value="<?php echo $bkd; ?>">
                </div>
                <div class="mb-3">
                    <label for="booking_time-<?php echo $appointment_id; ?>" class="form-label">Giờ hẹn</label>
                    <input type="time" name="booking_time" id="booking_time-<?php echo $appointment_id; ?>" class="form-control" value="<?php echo $bkt; ?>">
                </div>
                <div class="mb-3">
                    <label for="cons_fee-<?php echo $appointment_id; ?>" class="form-label">Phí khám</label>
                    <input type="number" name="cons_fee" id="cons_fee-<?php echo $appointment_id; ?>" class="form-control" value="<?php echo $cf; ?>">
                </div>

                <!-- Nút cập nhật -->
                <div class="text-center">
                    <button type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Cập nhật</button>
                </div>
                <!-- Nút thoát -->
                <div class="text-center">
                    <button type="button" class="btn btn-lg btn-outline-primary btn-lg w-100 mt-4 mb-0" onclick="closePopup(<?php echo $appointment_id; ?>)">Thoát</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
    }
} else {
    echo "<p>Không tìm thấy lịch hẹn nào.</p>";
}
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

        <!-- Popup Section for Form -->
        <!-- Popup to create user -->
        <div id="popup_booking" class="overlay_flight_traveldil">
            <div class="card popup-cont">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                        <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Đăng ký lịch hẹn</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form role="form" action="#" method="POST">
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
                                    <select name="specialty_id" class="form-control" required>
                                        <option value="" disabled selected>Chọn chuyên khoa</option>
                                        <!-- Tùy chọn mặc định -->
                                        <?php if (!empty($specialties)): ?>
                                            <?php foreach ($specialties as $specialty): ?>
                                                <option value="<?= $specialty['specialty_id'] ?>">
                                                    <?= $specialty['specialty_name'] ?>
                                                </option>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <option disabled>Không có chuyên khoa nào</option>
                                        <?php endif; ?>
                                    </select>
                                </div>
                                <div class="input-group input-group-outline mb-3">
                                    <select name="doctor_id" class="form-control" required>
                                        <option value="" disabled selected>Chọn bác sĩ</option>
                                        <!-- Tùy chọn mặc định -->
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
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="col-form-label-lg">Ngày hẹn</label>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-form-label-lg">Giờ hẹn</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="date" name="booking_date" class="form-control" required>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="time" name="booking_time" class="form-control" required>
                                        </div>
                                    </div>
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
                            <button type="submit" name="delete" value="create" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Đặt
                                lịch</button>
                        </div>
                        <div class="text-center" href="#">
                                <button type="button" class="btn btn-lg btn-outline-primary btn-lg w-100 mt-4 mb-0"
                                    onclick="location.href='http://localhost/HMS-Nhom11/role-patient/schedule.php'">Thoát</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>

    </main>

    <?php
    include SITE_ROOT . ('/HMS-Nhom11/assets/include/footer.php');
    ?>