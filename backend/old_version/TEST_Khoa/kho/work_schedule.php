<?php
define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT']);

include SITE_ROOT . ('/HMS-Nhom11/backend/assets/include/config.php');
include SITE_ROOT . ('/HMS-Nhom11/backend/assets/include/header.php');
include '../TEST_Khoa/get_query.php';

?>

<head>
    <title>Lịch Làm Việc Nhân Viên</title>
</head>

<body class="g-sidenav-show" style="background-image: url('../backend/assets/image/Hospital_Seamless1.png'); background-size: 400px 400px;">
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

    <main class="main-content border-radius-lg">
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 border-radius-xl shadow-none position-sticky blur shadow-blur mt-4 left-auto top-1 z-index-sticky" data-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <h6 class="font-weight-bolder mb-0">TEST_Khoa</h6>
                </nav>

                <ul class="navbar-nav  justify-content-end">
                    <li class="nav-item d-flex align-items-center">
                        <a class="btn btn-outline-primary btn-sm mb-0 me-3" href="../TEST_Khoa/sign-in_test.php">Đăng xuất</a>
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
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between align-items-center">
                                <h6 class="text-white text-capitalize ps-3">Lịch Làm Việc của Nhân Viên</h6>
                                <button type="button" class="btn btn-light btn-sm me-3 shadow-sm" onclick="div_show('container_popup')">
                                    Đăng ký lịch
                                </button>
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
                                <input type="text" name="doctor_name" class="form-control" required list="doctor-list" placeholder="Nhập tên bác sĩ...">
                                <datalist id="doctor-list">
                                    <?php if (!empty($get_doctors)): ?>
                                        <?php foreach ($get_doctors as $doctors): ?>
                                            <option value="<?= $doctors['full_name'] ?>" data-id="<?= $doctors['user_id'] ?>"></option>
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
                                <button type="button" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Đăng ký</button>
                            </div>

                            <div class="text-center">
                                <!-- Exit Button -->
                                <button type="button" class="btn btn-lg btn-outline-primary btn-lg w-100 mt-4 mb-0" onclick="div_hide('container_popup')">Thoát</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php include SITE_ROOT . ('/HMS-Nhom11/backend/assets/include/footer.php'); ?>
        <script src="http://localhost:8080/HMS-Nhom11/backend/assets/js/popup-copy.js"></script>
        <!-- list gợi í tên bác sĩ -->
        <script>
            const input = document.querySelector('input[name="doctor_name"]');

            input.addEventListener('input', function() {
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