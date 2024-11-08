<?php
$servername = "localhost"; // Địa chỉ máy chủ MySQL
$username = "root"; // Tên người dùng MySQL
$password = ""; // Mật khẩu MySQL
$dbname = "dacn-hms"; // Tên cơ sở dữ liệu

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Tiếp theo sau phần kết nối
$userId = 8; // Bạn có thể thay đổi ID này tùy theo yêu cầu

$sql = "SELECT * FROM dim_user WHERE user_id = $userId";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Lấy dữ liệu của người dùng
    $user = $result->fetch_assoc();
} else {
    echo "0 results";
}
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">

    <title>
        Thông tin người dùng
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
    <link id="pagestyle" href="../assets/css/style.css" rel="stylesheet" />

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
                    <a class="nav-link text-white" href="../role-doctor/F1-schedule-ofDoctor.php">

                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">calendar_month</i>
                            <!-- Check https://fonts.google.com/icons?icon.set=Material+Icons&icon.style=Rounded for ID -->
                        </div>

                        <span class="nav-link-text ms-1">Lịch hẹn kiểm tra</span>
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link text-white" href="F2-user-medhist.php">

                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">pending_actions</i>
                            <!-- Check https://fonts.google.com/icons?icon.set=Material+Icons&icon.style=Rounded for ID -->
                        </div>

                        <span class="nav-link-text ms-1">Hồ sơ sức khoẻ</span>
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link text-white" href="../role-doctor/F3-patients-ofDoctor.php">

                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">groups</i>
                            <!-- Check https://fonts.google.com/icons?icon.set=Material+Icons&icon.style=Rounded for ID -->
                        </div>

                        <span class="nav-link-text ms-1">Danh sách bệnh nhân</span>
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link text-white" href="">

                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">description</i>
                            <!-- Check https://fonts.google.com/icons?icon.set=Material+Icons&icon.style=Rounded for ID -->
                        </div>

                        <span class="nav-link-text ms-1">Function 4</span>
                    </a>
                </li>


                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Quản trị
                    </h6>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white active bg-gradient-primary" href="../role-doctor/A1-profile-ofDoctor.php">

                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">person</i>
                            <!-- Check https://fonts.google.com/icons?icon.set=Material+Icons&icon.style=Rounded for ID -->
                        </div>

                        <span class="nav-link-text ms-1">Thông tin cá nhân</span>
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link text-white" href="A2-admin-user.php">

                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">badge</i>
                            <!-- Check https://fonts.google.com/icons?icon.set=Material+Icons&icon.style=Rounded for ID -->
                        </div>

                        <span class="nav-link-text ms-1">Quản lý người dùng</span>
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link text-white" href="A3-supply.php">

                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">medication</i>
                            <!-- Check https://fonts.google.com/icons?icon.set=Material+Icons&icon.style=Rounded for ID -->
                        </div>

                        <span class="nav-link-text ms-1">Quản lý vật tư</span>
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link text-white" href="A4-speciality.php">

                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">local_hospital</i>
                            <!-- Check https://fonts.google.com/icons?icon.set=Material+Icons&icon.style=Rounded for ID -->
                        </div>

                        <span class="nav-link-text ms-1">Quản lý chuyên khoa</span>
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

                    <h6 class="font-weight-bolder mb-0">Thông tin cá nhân</h6>

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
                            <a class="btn btn-outline-primary btn-sm mb-0 me-3" target="_blank" href="sign-in.php">Đăng
                                xuất</a>
                        </li>
                        </l>

                        <li class="nav-item d-flex align-items-center">
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
                            <img src="../assets/image/user login image.png" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                        </div>
                    </div>
                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <h5 class="mb-1">
                                <?php echo $user['full_name']; ?>
                            </h5>
                            <p class="mb-0 font-weight-normal text-sm">
                                <?php echo $user['role']; ?>
                            </p>
                        </div>
                    </div>
                    <div class="col-auto" style="margin-left: auto; margin-right: 10px;">
                        <div class="text-center">
                            <button type="button" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0"
                                title="Edit Profile" onclick="div_show('container-popup')">Cập nhật</button>
                        </div>
                    </div>
                    <div class="card-header pb-0 p-3">
                    </div>
                    <div class="card-body p-3">
                        <ul class="list-group">
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Số điện thoại:</strong>&nbsp; <?php echo $user['contact_no']; ?></li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Email:</strong>&nbsp; <?php echo $user['email_address']; ?></li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Địa chỉ:</strong>&nbsp; <?php echo $user['address']; ?></li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Thành phố:</strong>&nbsp; <?php echo $user['city']; ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


        <!-- <div class="container-fluid px-2 px-md-4">
            <div class="page-header min-height-300 border-radius-xl mt-4"
                style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
                <span class="mask  bg-gradient-primary  opacity-6"></span>
            </div>
            <div class="card card-body mx-3 mx-md-4 mt-n6">
                <div class="row gx-4 mb-2">
                    <div class="col-auto">
                        <div class="avatar avatar-xl position-relative">
                            <img src="../assets/image/user login image.png" alt="profile_image"
                                class="w-100 border-radius-lg shadow-sm">
                        </div>
                    </div>
                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <h5 class="mb-1">
                                Nguyen Van A
                            </h5>
                            <p class="mb-0 font-weight-normal text-sm">
                                Bac sy
                            </p>
                        </div>
                    </div>
                    <div class="col-auto" style="margin-left: auto; margin-right: 10px;">
                        <div class="text-center">
                            <button type="button" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0"
                                title="Edit Profile" onclick="div_show()">Cập nhật</button>
                        </div>
                    </div>
                    <div class="card-header pb-0 p-3">
                    </div>
                    <div class="card-body p-3">
                        <ul class="list-group">
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Số điện
                                    thoại:</strong>&nbsp; +84123456789</li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong
                                    class="text-dark">Email:</strong>&nbsp; doctor@gmail.com</li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Địa
                                    chỉ:</strong> &nbsp; 123 Duong 45</li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Thành
                                    phố:</strong> &nbsp; Ho Chi Minh</li>
                            <li class="list-group-item border-0 ps-0 pb-0">
                        </ul>
                    </div>
                </div>

            </div>
        </div> -->

        <!-- Popup Section for Form -->
        <div id="container-popup" class="popup" style="display: none;" onclick="div_hide('container-popup')">
            <div id="popupFormContainer" onclick="event.stopPropagation()"> <!-- Ngăn sự kiện click nổi bọt -->
                <div class="card">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                            <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Cập nhật thông tin</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form role="form" id="updateForm"> <!-- Thêm id cho form -->
                            <div class="input-group input-group-outline mb-3">
                                <label class="form-label">Họ và tên</label>
                                <input type="text" name="full_name" class="form-control" required> <!-- Đã thêm name cho input -->
                            </div>
                            <div class="input-group input-group-outline mb-3">
                                <label class="form-label">Số điện thoại</label>
                                <input type="text" name="contact_no" class="form-control" required> <!-- Đã thêm name cho input -->
                            </div>
                            <div class="input-group input-group-outline mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" required> <!-- Đã thêm name cho input -->
                            </div>
                            <div class="input-group input-group-outline mb-3">
                                <label class="form-label">Địa chỉ</label>
                                <input type="text" name="address" class="form-control" required> <!-- Đã thêm name cho input -->
                            </div>
                            <div class="input-group input-group-outline mb-3">
                                <label class="form-label">Thành phố</label>
                                <input type="text" name="city" class="form-control" required> <!-- Đã thêm name cho input -->
                            </div>
                            <div class="text-center">
                                <button type="button" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0" onclick="submitUpdateForm()">Cập nhật</button>
                            </div>
                            <div class="text-center">
                                <button type="button" class="btn btn-lg btn-outline-primary btn-lg w-100 mt-4 mb-0" onclick="div_hide('container-popup')">Thoát</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
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
    <script src="../assets/js/popup-copy.js"></script>
</body>

</html>