<?php
define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT']);

include('sess-check.php');
include SITE_ROOT . ('/HMS-Nhom11/assets/include/config.php');
include SITE_ROOT . ('/HMS-Nhom11/assets/include/header.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['create']) && $_POST['create'] == 'create') {
        $post_spc_name = mysqli_real_escape_string($conn, $_POST['spc_name']);
        $post_spc_desc = mysqli_real_escape_string($conn, $_POST['spc_desc']);
        $post_spc_note = mysqli_real_escape_string($conn, $_POST['spc_note']);

        $sql = "INSERT INTO `dim_specialties` (`specialty_name`, `description`, `note`) VALUES ('$post_spc_name', '$post_spc_desc', '$post_spc_note')";

        $add = mysqli_query($conn, $sql);

        echo "<script type='text/javascript'>alert('Thêm chuyên khoa thành công');</script>";

        header('Refresh:0 , url=http://localhost/HMS-Nhom11/role-admin/speciality.php');
    }

    if (isset($_POST['update'])) {

        $post_spc_name = (empty(mysqli_real_escape_string($conn, $_POST['spc_name'])) === true) ? $spc_name : mysqli_real_escape_string($conn, $_POST['spc_name']);
        $post_spc_desc = (empty(mysqli_real_escape_string($conn, $_POST['spc_desc'])) === true) ? $spc_desc : mysqli_real_escape_string($conn, $_POST['spc_desc']);
        $post_spc_note = (empty(mysqli_real_escape_string($conn, $_POST['spc_note'])) === true) ? $spc_note : mysqli_real_escape_string($conn, $_POST['spc_note']);

        $post_update_id = $_POST['update']; //Get user ID that need update

        $sql = "UPDATE `dim_specialties` SET
        `specialty_name` = '$post_spc_name',
        `description` = '$post_spc_desc',
        `note` = '$post_spc_note'
        WHERE specialty_id = $post_update_id";

        $update = mysqli_query($conn, $sql);

        echo "<script type='text/javascript'>alert('Cập nhật chuyên khoa thành công');</script>";

        header('Refresh:0 , url=http://localhost/HMS-Nhom11/role-admin/speciality.php');
    }

    if (isset($_POST['delete'])) {
        $post_delete_id = $_POST['delete']; //Get user ID that need delete

        $sql = "DELETE FROM `dim_specialties` WHERE specialty_id = $post_delete_id";

        $delete = mysqli_query($conn, $sql);

        echo "<script type='text/javascript'>alert('Xoá chuyên khoa thành công');</script>";

        header('Refresh:0 , url=http://localhost/HMS-Nhom11/role-admin/speciality.php');
    }
}
?>

<head>
    <title>
        Quản lý chuyên khoa
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
                    <a class="nav-link text-white" href="guest.php">

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
                    <a class="nav-link text-white active bg-gradient-primary" href="speciality.php">

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
                Quản lý chuyên khoa
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
                                <h6 class="text-white text-capitalize ps-3" style="float: left;">Thông tin chuyên khoa
                                </h6>
                                <div class="table-float-btn-container">
                                    <button class="table-float-btn btn btn-outline-primary btn-sm mb-0 me-3"
                                        style="background: #ffffff" data-bs-toggle="modal"
                                        data-bs-target="#popup_add">Thêm chuyên khoa</button>
                                </div>
                            </div>
                        </div>

                        <!-- Tạo chuyên khoa -->
                        <div class="modal fade" id="popup_add" tabindex="-1" aria-labelledby="SpcCreate"
                            aria-hidden="true">
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
                                                    <input type="text" name="spc_name" id="spc_name"
                                                        placeholder="Nhập Tên chuyên khoa">
                                                    <label>Tên chuyên khoa</label>
                                                </div>
                                                <div class="custom-input">
                                                    <input type="text" name="spc_desc" id="spc_desc"
                                                        placeholder="Nhập mô tả">
                                                    <label>Mô tả chuyên khoa</label>
                                                </div>
                                                <div class="custom-input">
                                                    <input type="text" name="spc_note" id="spc_note"
                                                        placeholder="Nhập ghi chú">
                                                    <label>Ghi chú chuyên khoa</label>
                                                </div>
                                                <div class="text-center">
                                                    <button type="submit" name="create" value="create"
                                                        class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Tạo
                                                        chuyên khoa</button>
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
                            <div class="custom-table">
                                <table id="specialtyTable" class="table">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                Mã chuyên khoa</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                Tên chuyên khoa</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                Mô tả</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                Ghi chú</th>
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
                                        
                                        $get_data_query = "SELECT * FROM `dim_specialties`";

                                        $get_data = mysqli_query($conn, $get_data_query);

                                        $count = mysqli_num_rows($get_data);
                                        // Kiểm tra và hiển thị dữ liệu
                                        if ($count > 0) {
                                            while ($row = mysqli_fetch_assoc($get_data)) {
                                                $spc_id = $row["specialty_id"];
                                                $spc_name = $row["specialty_name"];
                                                $spc_desc = $row["description"];
                                                $spc_note = $row["note"];
                                                $created_at = $row["created_at"];
                                                $updated_at = $row["updated_at"];
                                                ?>
                                                <tr>
                                                    <td class="align-middle text-center text-sm">
                                                        <p class="text-xs font-weight-bold mb-0"><?php echo $spc_id; ?></p>
                                                    </td>
                                                    <td class='align-middle text-center'>
                                                        <div class="d-flex px-2 py-1">
                                                            <div>
                                                                <img src="https://medlatec.vn/media/207/catalog/chuyen-khoa-tim-mach.jpg"
                                                                    class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                                                            </div>
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <h6 class="mb-0 text-sm"><?php echo $spc_name; ?></h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class='align-middle text-center'>
                                                        <p class="text-xs font-weight-bold mb-0"><?php echo $spc_desc; ?></p>
                                                    </td>
                                                    <td class='align-middle text-center'>
                                                        <p class="text-xs font-weight-bold mb-0"><?php echo $spc_note; ?></p>
                                                    </td>
                                                    <td class='align-middle text-center'>
                                                        <p class="text-xs font-weight-bold mb-0"><?php echo $created_at; ?></p>
                                                    </td>
                                                    <td class='align-middle text-center'>
                                                        <p class="text-xs font-weight-bold mb-0"><?php echo $updated_at; ?></p>
                                                    </td>
                                                    <td class='align-middle text-center'>
                                                        <a href='#popup_edit-<?php echo $user_id; ?>'
                                                            class='text-secondary font-weight-bold text-xs edit-btn'
                                                            data-original-title='edit' title='Sửa thông tin'
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#popup_edit-<?php echo $spc_id; ?>">Cập nhật</a>
                                                    </td>
                                                </tr>

                                                <!-- Popup for Specialties edit -->
                                                <div class="modal fade" id="popup_edit-<?php echo $spc_id; ?>" tabindex="-1"
                                                    aria-labelledby="SpcEdit" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="card">
                                                                <div
                                                                    class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                                                    <div
                                                                        class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                                                                        <h4
                                                                            class="text-white font-weight-bolder text-center mt-2 mb-0">
                                                                            Cập nhật thông tin chuyên khoa
                                                                        </h4>
                                                                    </div>
                                                                </div>
                                                                <div class="card-body edit-body">
                                                                    <form name="spcedit" role="form" method="POST">
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="custom-input">
                                                                                    <input type="text" name="spc_name"
                                                                                        id="spc_name"
                                                                                        placeholder="<?php echo $spc_name; ?>">
                                                                                    <label>Tên chuyên khoa</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <div class="custom-input">
                                                                                    <input type="text" name="spc_desc"
                                                                                        id="spc_desc"
                                                                                        placeholder="<?php echo $spc_desc; ?>">
                                                                                    <label>Mô tả chuyên khoa</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <div class="custom-input">
                                                                                    <input type="text" name="spc_note"
                                                                                        id="spc_note"
                                                                                        placeholder="<?php echo $spc_note; ?>">
                                                                                    <label>Ghi chú chuyên khoa</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="text-center">
                                                                                    <button type="submit" name="update"
                                                                                        value=<?php echo $spc_id; ?>
                                                                                        class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Cập
                                                                                        nhật</button>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="text-center">
                                                                                    <button type="submit" name="delete"
                                                                                        value=<?php echo $spc_id; ?>
                                                                                        class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Xoá</button>
                                                                                </div>
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
                                            <?php }
                                        } ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

        <!-- Popup Section for Form -->



        <script>
            $(document).ready(function () {
                $('#drugTable').DataTable({
                    "pagingType": "simple_numbers", // Sử dụng phân trang đơn giản
                    "language": {
                        "search": "Tìm kiếm:",
                        "paginate": {
                            "next": "Tiếp",
                            "previous": "Trước"
                        }
                    }
                });
            });
        </script>


        <?php
        include SITE_ROOT . ('/HMS-Nhom11/assets/include/footer.php');
        ?>