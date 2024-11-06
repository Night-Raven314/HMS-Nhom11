<?php
define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT']);

include('sess-check.php');
include SITE_ROOT . ('/HMS-Nhom11/assets/include/config.php');
include SITE_ROOT . ('/HMS-Nhom11/assets/include/header.php');

// Khởi tạo biến
$specialties = []; // Khởi tạo mảng

// Lấy dữ liệu chuyên khoa
$sql = "SELECT specialty_id, specialty_name FROM dim_specialties";
$result = $conn->query($sql);

if ($result) {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $specialties[] = $row; // Thêm mỗi hàng vào mảng
        }
    } else {
        echo "Không có chuyên khoa nào được tìm thấy.";
    }
} else {
    die("Truy vấn thất bại: " . $conn->error);
}

// Khởi tạo biến
$get_doctors = []; // Khởi tạo mảng

// Lấy dữ liệu chuyên khoa
$sql = "SELECT user_id, full_name FROM dim_user WHERE role = 'doctor' AND user_name LIKE '%doctor%'";
$result = $conn->query($sql);

if ($result) {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $get_doctors[] = $row; // Thêm mỗi hàng vào mảng
        }
    } else {
        echo "Không có chuyên khoa nào được tìm thấy.";
    }
} else {
    die("Truy vấn thất bại: " . $conn->error);
}
?>

<head>
    <title>Lịch Làm Việc Nhân Viên</title>
</head>

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
                    <a class="nav-link text-white" href="schedule.php">

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
                    <a class="nav-link text-white active bg-gradient-primary" href="work_hour.php">

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

    <main class="main-content border-radius-lg">
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 border-radius-xl shadow-none position-sticky blur shadow-blur mt-4 left-auto top-1 z-index-sticky"
            data-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <h6 class="font-weight-bolder mb-0">QUẢN LÝ LỊCH LÀM VIỆC</h6>
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

        <!-- Nội dung trang -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div
                                class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between align-items-center">
                                <h6 class="text-white text-capitalize ps-3">Lịch Làm Việc</h6>
                                <div class="table-float-btn-container">
                                    <button class="table-float-btn btn btn-outline-primary btn-sm mb-0 me-3"
                                        style="background: #ffffff" data-bs-toggle="modal"
                                        data-bs-target="#popup_add">Đăng ký lịch</button>
                                </div>
                            </div>
                        </div>

                        <!-- Tạo lịch làm -->
                        <div class="modal fade" id="popup_add" tabindex="-1"
                            aria-labelledby="SpcCreate" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="card">
                                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                            <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                                                <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">
                                                    Tạo chuyên khoa
                                                </h4>
                                            </div>
                                        </div>
                                        <div class="card-body edit-body">
                                            <form name="spccreate" role="form" method="POST">
                                                <div class="custom-input">
                                                    <input type="date" name="work_date" id="work_date"
                                                        placeholder="Nhập Tên chuyên khoa">
                                                    <label>Tên chuyên khoa</label>
                                                </div>
                                                <div class="custom-input">
                                                    <input type="time" name="start_time" id="start_time"
                                                        placeholder="Nhập mô tả">
                                                    <label>Mô tả chuyên khoa</label>
                                                </div>
                                                <div class="custom-input">
                                                    <input type="time" name="end_time" id="end_time"
                                                        placeholder="Nhập ghi chú">
                                                    <label>Ghi chú chuyên khoa</label>
                                                </div>
                                                <div class="text-center">
                                                    <button type="submit" name="create" value="create"
                                                        class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Tạo chuyên khoa</button>
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
                                                Chuyên khoa</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                Ngày làm việc</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                Giờ làm việc</th>
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

        <!-- Popup Section for Doctor Appointment Scheduling -->



        <div class="popup-container" id="container_popup" style="display: none;">
            <div id="popupFormContainer">
                <div class="card">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                            <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Đăng ký lịch</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form role="form">
                            <!-- Doctor's Name -->
                            <div class="input-group input-group-outline mb-3">
                                <label class="btn-group-vertical" style="margin-right: 10px;">Tên bác sĩ</label>
                                <input type="text" name="doctor_name" class="form-control" required list="doctor-list"
                                    placeholder="Nhập tên bác sĩ...">
                                <datalist id="doctor-list">
                                    <?php if (!empty($get_doctors)): ?>
                                        <?php foreach ($get_doctors as $doctors): ?>
                                            <option value="<?= $doctors['full_name'] ?>" data-id="<?= $doctors['user_id'] ?>">
                                            </option>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <option disabled>Không có chuyên khoa nào</option>
                                    <?php endif; ?>
                                </datalist>
                            </div>


                            <!-- Appointment Date -->
                            <div class="input-group input-group-outline mb-3">
                                <label class="btn-group-vertical" style="margin-right: 10px;">Ngày</label>
                                <input type="date" class="form-control">
                            </div>

                            <!-- Start Time -->
                            <div class="input-group input-group-outline mb-3">
                                <label class="btn-group-vertical" style="margin-right: 10px;">Giờ bắt đầu</label>
                                <input type="time" class="form-control">
                            </div>

                            <!-- End Time -->
                            <div class="input-group input-group-outline mb-3">
                                <label class="btn-group-vertical" style="margin-right: 10px;">Giờ kết thúc</label>
                                <input type="time" class="form-control">
                            </div>

                            <div class="text-center">
                                <!-- Register Button -->
                                <button type="button" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Đăng
                                    ký</button>
                            </div>

                            <div class="text-center">
                                <!-- Exit Button -->
                                <button type="button" class="btn btn-lg btn-outline-primary btn-lg w-100 mt-4 mb-0"
                                    onclick="div_hide('container_popup')">Thoát</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php include SITE_ROOT . ('/HMS-Nhom11/assets/include/footer.php'); ?>
        <!-- list gợi í tên bác sĩ -->
        <script>
            const input = document.querySelector('input[name="doctor_name"]');

            input.addEventListener('input', function () {
                const options = document.querySelectorAll('#doctor-list option');
                options.forEach(option => {
                    if (option.value === this.value) {
                        // Lấy user_id từ data-id
                        const doctorId = option.getAttribute('data-id');
                        console.log('Doctor ID:', doctorId);
                        // Bạn có thể lưu doctorId vào một biến hoặc gửi nó cùng với form
                    }
                });
            });
        </script>


    </main>

</body>