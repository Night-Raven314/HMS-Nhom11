<?php
define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT']);

include('sess-check.php');
include SITE_ROOT . ('/HMS-Nhom11/assets/include/config.php');
include SITE_ROOT . ('/HMS-Nhom11/assets/include/header.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['create']) && $_POST['create'] == 'create') {
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

        echo "<script type='text/javascript'>alert('Thêm tài khoản thành công');</script>";

        header('Refresh:0 , url=http://localhost/HMS-Nhom11/role-admin/guest.php');
    }

    if (isset($_POST['update'])) {
        $get_full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
        $get_user_name = mysqli_real_escape_string($conn, $_POST['user_name']);
        $get_email = mysqli_real_escape_string($conn, $_POST['email_address']);
        $get_contact_no = mysqli_real_escape_string($conn, $_POST['contact_no']);
        $get_gender = mysqli_real_escape_string($conn, $_POST['gender']);
        $get_role = mysqli_real_escape_string($conn, $_POST['role']);
        $get_address = mysqli_real_escape_string($conn, $_POST['address']);
        $get_city = mysqli_real_escape_string($conn, $_POST['city']);
        $get_pwd = mysqli_real_escape_string($conn, $_POST['password']);

        $post_full_name = (empty($get_full_name) === true) ? $fullname : $get_full_name;
        $post_user_name = (empty($get_user_name) === true) ? $user_name : $get_user_name;
        $post_email = (empty($get_email) === true) ? $emailaddress : $get_email;
        $post_contact_no = (empty($get_contact_no) === true) ? $phone : $get_contact_no;
        $post_gender = (empty($get_gender) === true) ? $gender : $get_gender;
        $post_role = (empty($get_role) === true) ? $role : $get_role;
        $post_address = (empty($get_address) === true) ? $address : $get_address;
        $post_city = (empty($get_city) === true) ? $city : $get_city;
        $post_pwd = (empty($get_pwd) === true) ? $og_pwd : $get_pwd;

        $post_update_id = $_POST['update']; //Get user ID that need update

        $sql = "UPDATE `dim_user` SET
        `user_name` = '$post_user_name',
        `full_name` = '$post_full_name',
        `email_address` = '$post_email',
        `contact_no` = '$post_contact_no',
        `password` = '$post_pwd',
        `role` = '$post_role',
        `gender` = '$post_gender',
        `address` = '$post_address',
        `city` = '$post_city' 
        WHERE user_id = $post_update_id";

        $update = mysqli_query($conn, $sql);

        echo "<script type='text/javascript'>alert('Cập nhật tài khoản thành công');</script>";

        header('Refresh:0 , url=http://localhost/HMS-Nhom11/role-admin/guest.php');
    }

    if (isset($_POST['delete'])) {
        $post_delete_id = $_POST['delete']; //Get user ID that need delete

        $sql = "DELETE FROM `dim_user` WHERE user_id = $post_delete_id";

        $delete = mysqli_query($conn, $sql);

        echo "<script type='text/javascript'>alert('Xoá tài khoản thành công');</script>";

        header('Refresh:0 , url=http://localhost/HMS-Nhom11/role-admin/guest.php');
    }
}
?>

<head>
    <title>
        Quản lý người dùng
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
                    <a class="nav-link text-white" href="F1-schedule.php">

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
                    <a class="nav-link text-white" href="F3-patients.php">

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
                    <a class="nav-link text-white active bg-gradient-primary" href="guest.php">

                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">manage_accounts</i>
                            <!-- Check https://fonts.google.com/icons?icon.set=Material+Icons&icon.style=Rounded for ID -->
                        </div>

                        <span class="nav-link-text ms-1">Quản lý người dùng</span>
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link text-white" href="employee.php">

                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">badge</i>
                            <!-- Check https://fonts.google.com/icons?icon.set=Material+Icons&icon.style=Rounded for ID -->
                        </div>

                        <span class="nav-link-text ms-1">Quản lý nhân viên</span>
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link text-white" href="supply.php">

                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">medication</i>
                            <!-- Check https://fonts.google.com/icons?icon.set=Material+Icons&icon.style=Rounded for ID -->
                        </div>

                        <span class="nav-link-text ms-1">Quản lý vật tư</span>
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link text-white" href="speciality.php">

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

        <div class="custom-navbar">
            <div class="nav-left">
                Quản lý người dùng
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
                                <h6 class="text-white text-capitalize ps-3" style="float: left;">Thông tin người dùng
                                    trên hệ thống</h6>
                                <div class="table-float-btn-container">
                                    <button class="table-float-btn btn btn-outline-primary btn-sm mb-0 me-3"
                                        style="background: #ffffff" data-bs-toggle="modal"
                                        data-bs-target="#popup_add">Thêm người dùng</button>
                                </div>
                            </div>
                        </div>

                        <!-- Popup to create user -->
                        <div class="modal fade" id="popup_add" tabindex="-1" aria-labelledby="EmployeeCreate"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="card">
                                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                            <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                                                <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">
                                                    Tạo tài khoản người dùng
                                                </h4>
                                            </div>
                                        </div>
                                        <div class="card-body edit-body">
                                            <form name="new_user" role="form" method="POST">
                                                <div class="row"> <!-- Thêm hàng để chia thành 2 bên -->
                                                    <div class="col-md-6">
                                                        <div class="custom-input">
                                                            <input type="text" name="full_name" id="full_name"
                                                                placeholder="Nguyen Van A">
                                                            <label>Họ và Tên</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="custom-input">
                                                            <input type="text" name="user_name" id="user_name"
                                                                placeholder="nguyen_a123">
                                                            <label>Tên đăng nhập</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="custom-input">
                                                            <input type="email" name="email_address" id="email_address"
                                                                placeholder="example@mail.com">
                                                            <label>Địa chỉ Email</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="custom-input">
                                                            <input type="text" name="contact_no" id="contact_no"
                                                                placeholder="84xxx">
                                                            <label>Số điện thoại</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="custom-input">
                                                            <select name="gender" id="gender" class="form-control">
                                                                <option value="" disabled selected>Chọn
                                                                    giới tính</option>
                                                                <option value="male">Nam</option>
                                                                <option value="female">Nữ</option>
                                                            </select>
                                                            <label>Giới tính</label>
                                                            <div class="arrow-icon">
                                                                <i class="fa-solid fa-chevron-down"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="custom-input">
                                                            <select name="role" id="role" class="form-control">
                                                                <option value="" disabled selected>Chọn
                                                                    vị trí
                                                                </option>
                                                                <option value="doctor">Bác sỹ</option>
                                                                <option value="nurse">Y tá</option>
                                                                <option value="reception">Lễ tân
                                                                </option>
                                                                <option value="admin">Quản trị viên
                                                                </option>
                                                            </select>
                                                            <label>Vị trí</label>
                                                            <div class="arrow-icon">
                                                                <i class="fa-solid fa-chevron-down"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="custom-input">
                                                            <input type="text" name="address" id="address"
                                                                placeholder="Nhập địa chỉ">
                                                            <label>Địa chỉ</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="custom-input">
                                                            <input type="text" name="city" id="city"
                                                                placeholder="Nhập thành phố">
                                                            <label>Thành phố</label>
                                                        </div>
                                                    </div>

                                                    <div class="text-center">
                                                        <button type="submit" name="create" value="create"
                                                            class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Tạo
                                                            tài
                                                            khoản</button>
                                                    </div>

                                                    <div class="text-center">
                                                        <button type="button"
                                                            class="btn btn-lg btn-outline-primary btn-lg w-100 mt-4 mb-0"
                                                            data-bs-dismiss="modal">Thoát</button>
                                                    </div>

                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body px-0 pb-2">
                            <div class="custom-table">
                                <table id="employeeTable" class="table">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                Mã người dùng</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                Họ và Tên</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                Vị trí</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                Tên đăng nhập</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                Số điện thoại</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                Email</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                Mật khẩu</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                Ngày tạo</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                Ngày chỉnh sửa</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        //Get data for table
                                        $get_data_query = "SELECT * FROM `dim_user` WHERE `role` = 'patient'";

                                        $get_data = mysqli_query($conn, $get_data_query);

                                        $count = mysqli_num_rows($get_data);
                                        // Kiểm tra và hiển thị dữ liệu
                                        if ($count > 0) {
                                            $roleMapping = [
                                                "doctor" => "Bác sĩ",
                                                "admin" => "Quản trị viên",
                                                "patient" => "Bệnh nhân"
                                            ];
                                            while ($row = mysqli_fetch_assoc($get_data)) {
                                                $user_id = $row["user_id"];
                                                $fullname = $row["full_name"];
                                                $role = isset($roleMapping[$row["role"]]) ? $roleMapping[$row["role"]] : $row["role"];
                                                $user_name = $row["user_name"];
                                                // $phone = substr($row["contact_no"], 0, 5) // Get the first two digits
                                                //     . str_repeat('*', (strlen($row["contact_no"]) - 7)) // Apply enough asterisks to cover the middle numbers
                                                //     . substr($row["contact_no"], -2); // Get the last two digits
                                                // $emailaddress = substr($row["email_address"], 0, 5) // Get the first two digits
                                                //     . str_repeat('*', (strlen($row["email_address"]) - 17)) // Apply enough asterisks to cover the middle numbers
                                                //     . substr($row["email_address"], -12); // Get the last two digits
                                                // $password = str_repeat('*', (strlen($row["password"])));
                                                $phone = $row["contact_no"];
                                                $emailaddress = $row["email_address"];
                                                $password = $row["password"];
                                                $created_at = $row["created_at"];
                                                $updated_at = $row["updated_at"];
                                                $gender = $row["gender"];
                                                $address = $row["address"];
                                                $city = $row["city"];

                                                ?>

                                                <tr>
                                                    <td class='align-middle text-center'>
                                                        <h6 class='mb-0 text-sm'><?php echo $user_id; ?></h6>
                                                    </td>
                                                    <td class='align-middle text-center'>
                                                        <h6 class='mb-0 text-sm'><?php echo $fullname; ?></h6>
                                                    </td>
                                                    <td class='align-middle text-center text-sm'>
                                                        <p class='text-xs font-weight-bold mb-0'><?php echo $role; ?></p>
                                                    </td>
                                                    <td class='align-middle text-center text-sm'>
                                                        <p class='text-xs font-weight-bold mb-0'><?php echo $user_name; ?></p>
                                                    </td>
                                                    <td class='align-middle text-center text-sm'>
                                                        <p class='text-xs font-weight-bold mb-0'><?php echo $phone; ?></p>
                                                    </td>
                                                    <td class='align-middle text-center'>
                                                        <span
                                                            class='text-secondary text-xs font-weight-bold'><?php echo $emailaddress; ?></span>
                                                    </td>
                                                    <td class='align-middle text-center'>
                                                        <span
                                                            class='text-secondary text-xs font-weight-bold'><?php echo $password; ?></span>
                                                    </td>
                                                    <td class='align-middle text-center'>
                                                        <span
                                                            class='text-secondary text-xs font-weight-bold'><?php echo $created_at; ?></span>
                                                    </td>
                                                    <td class='align-middle text-center'>
                                                        <span
                                                            class='text-secondary text-xs font-weight-bold'><?php echo $updated_at; ?></span>
                                                    </td>
                                                    <td class='align-middle text-center'>
                                                        <a href='#popup_edit-<?php echo $user_id; ?>'
                                                            class='text-secondary font-weight-bold text-xs edit-btn'
                                                            data-original-title='edit' title='Sửa thông tin'
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#popup_edit-<?php echo $user_id; ?>">Cập nhật</a>
                                                    </td>
                                                </tr>

                                                <!-- Popup Chỉnh sửa thông tin -->
                                                <div class="modal fade" id="popup_edit-<?php echo $user_id; ?>" tabindex="-1"
                                                    aria-labelledby="EmployeeEdit" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="card">
                                                                <div
                                                                    class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                                                    <div
                                                                        class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                                                                        <h4
                                                                            class="text-white font-weight-bolder text-center mt-2 mb-0">
                                                                            Cập nhật tài khoản người dùng
                                                                        </h4>
                                                                    </div>
                                                                </div>
                                                                <div class="card-body edit-body">
                                                                    <form name="new_user" role="form" method="POST">
                                                                        <div class="row"> <!-- Thêm hàng để chia thành 2 bên -->
                                                                            <div class="col-md-6">
                                                                                <div class="custom-input">
                                                                                    <input type="text" name="full_name"
                                                                                        id="full_name"
                                                                                        value="<?php echo $fullname; ?>">
                                                                                    <label>Họ và Tên</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="custom-input">
                                                                                    <input type="text" name="user_name"
                                                                                        id="user_name"
                                                                                        value="<?php echo $user_name; ?>">
                                                                                    <label>Tên đăng nhập</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="custom-input">
                                                                                    <input type="email" name="email_address"
                                                                                        id="email_address"
                                                                                        value="<?php echo $emailaddress; ?>">
                                                                                    <label>Địa chỉ Email</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="custom-input">
                                                                                    <input type="text" name="contact_no"
                                                                                        id="contact_no"
                                                                                        value="<?php echo $phone; ?>">
                                                                                    <label>Số điện thoại</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="custom-input">
                                                                                    <input type="text" name="contact_no"
                                                                                        id="contact_no"
                                                                                        value="<?php echo $password; ?>">
                                                                                    <label>Mật khẩu</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="custom-input">
                                                                                    <select name="gender" id="gender"
                                                                                        class="form-control">
                                                                                        <?php
                                                                                        if ($gender == 'male') {
                                                                                            echo '<option value="male" selected>Nam</option>';
                                                                                            echo '<option value="female">Nữ</option>';
                                                                                        } else {
                                                                                            echo '<option value="male">Nam</option>';
                                                                                            echo '<option value="female" selected>Nữ</option>';
                                                                                        }

                                                                                        ?>
                                                                                    </select>
                                                                                    <label>Giới tính</label>
                                                                                    <div class="arrow-icon">
                                                                                        <i class="fa-solid fa-chevron-down"></i>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <div class="custom-input">
                                                                                    <input type="text" name="address"
                                                                                        id="address"
                                                                                        value="<?php echo $address; ?>">
                                                                                    <label>Địa chỉ</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <div class="custom-input">
                                                                                    <input type="text" name="city" id="city"
                                                                                        value="<?php echo $city; ?>">
                                                                                    <label>Thành phố</label>
                                                                                </div>
                                                                            </div>

                                                                            <div class="text-center">
                                                                                <button type="submit" name="update" value=<?php echo $user_id; ?>
                                                                                    class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Cập
                                                                                    nhật</button>
                                                                            </div>

                                                                            <div class="text-center">
                                                                                <button type="submit" name="delete" value=<?php echo $user_id; ?>
                                                                                    class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Xoá</button>

                                                                            </div>

                                                                            <div class="text-center">
                                                                                <button type="button"
                                                                                    class="btn btn-lg btn-outline-primary btn-lg w-100 mt-4 mb-0"
                                                                                    data-bs-dismiss="modal">Thoát</button>
                                                                            </div>

                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <?php


                                            }
                                        } else {
                                            echo "Không tìm thấy người dùng.";
                                        }

                                        // Đóng kết nối
                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
        include SITE_ROOT . ('/HMS-Nhom11/assets/include/footer.php');
        ?>