<?php
define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT']);

include('sess-check.php');
include SITE_ROOT . ('/HMS-Nhom11/assets/include/config.php');
include SITE_ROOT . ('/HMS-Nhom11/assets/include/header.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['create']) && $_POST['create'] == 'create') {
        $post_item_name = mysqli_real_escape_string($conn, $_POST['item_name']);
        $post_item_price = mysqli_real_escape_string($conn, $_POST['price']);
        $post_item_unit = mysqli_real_escape_string($conn, $_POST['unit']);

        $sql = "INSERT INTO `dim_item` (`item_name`, `item_price`, `item_unit`) VALUES ('$post_item_name', '$post_item_price', '$post_item_unit')";

        $add = mysqli_query($conn, $sql);

        echo "<script type='text/javascript'>alert('Thêm vật tư thành công');</script>";

        header('Refresh:0 , url=http://localhost/HMS-Nhom11/role-admin/supply.php');
    }

    if (isset($_POST['update'])) {

        $post_item_name = (empty(mysqli_real_escape_string($conn, $_POST['item_name'])) === true) ? $item_name : mysqli_real_escape_string($conn, $_POST['item_name']);
        $post_item_price = (empty(mysqli_real_escape_string($conn, $_POST['price'])) === true) ? $item_price : mysqli_real_escape_string($conn, $_POST['price']);
        $post_item_unit = (empty(mysqli_real_escape_string($conn, $_POST['unit'])) === true) ? $item_unit : mysqli_real_escape_string($conn, $_POST['unit']);

        $post_update_id = $_POST['update']; //Get user ID that need update

        $sql = "UPDATE `dim_item` SET
        `item_name` = '$post_item_name',
        `item_price` = '$post_item_price',
        `item_unit` = '$post_item_unit'
        WHERE item_id = $post_update_id";

        $update = mysqli_query($conn, $sql);

        echo "<script type='text/javascript'>alert('Cập nhật vật tư thành công');</script>";

        header('Refresh:0 , url=http://localhost/HMS-Nhom11/role-admin/supply.php');
    }

    if (isset($_POST['delete'])) {
        $post_delete_id = $_POST['delete']; //Get user ID that need delete

        $sql = "DELETE FROM `dim_item` WHERE item_id = $post_delete_id";

        $delete = mysqli_query($conn, $sql);

        echo "<script type='text/javascript'>alert('Xoá vật tư thành công');</script>";

        header('Refresh:0 , url=http://localhost/HMS-Nhom11/role-admin/supply.php');
    }
}
?>

<head>
    <title>
        Quản lý vật tư
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
                    <a class="nav-link text-white active bg-gradient-primary" href="supply.php">

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

        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 border-radius-xl shadow-none position-sticky blur shadow-blur mt-4 left-auto top-1 z-index-sticky"
            data-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">

                    <h6 class="font-weight-bolder mb-0">Vật tư y tế</h6>

                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                        <div class="input-group input-group-outline">
                            <label class="form-label">Tìm kiếm</label>
                            <input type="text" class="form-control">
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
                                <h6 class="text-white text-capitalize ps-3" style="float: left;">Bảng vật tư ý tế
                                </h6>
                                <div class="table-float-btn-container">
                                    <a class="table-float-btn btn btn-outline-primary btn-sm mb-0 me-3"
                                        style="background: #ffffff" href="#popup_add">Thêm vật tư</a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                <table id="drugTable" class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                Mã vật tư</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                Tên vật tư</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                Giá cả</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                Loại</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                Ngày nhập</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                ngày chỉnh sửa</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        $sql = "SELECT * FROM `dim_item` ";
                                        $result = $conn->query($sql);
                                        // Kiểm tra và hiển thị dữ liệu
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {



                                                //   $imagePath = "../assets/image/med_items/" . $row['item_id'] . ".png";
                                                $item_id = $row["item_id"];
                                                $item_name = $row["item_name"];
                                                $item_price = $row["item_price"];
                                                $item_unit = $row["item_unit"];
                                                $created_at = $row["created_at"];
                                                $updated_at = $row["updated_at"];
                                                ?>
                                                <tr>
                                                    <td class="align-middle text-center text-sm">
                                                        <p class="text-xs font-weight-bold mb-0"><?php echo $item_id ?></p>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <div class="d-flex px-2 py-1">
                                                            <div>

                                                            </div>
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <h6 class="mb-0 text-sm"><?php echo $item_name ?></h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <p class="text-xs font-weight-bold mb-0"><?php echo number_format(
                                                            $item_price,
                                                            0,
                                                            ',',
                                                            '.'
                                                        ) ?></p> <!-- Định dạng tiền tệ -->
                                                        <p class="text-xs text-secondary mb-0">VNĐ</p>
                                                    </td>
                                                    <td class="align-middle text-center text-sm">
                                                        <p class="text-xs font-weight-bold mb-0"><?php echo $item_unit ?></p>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span
                                                            class="text-secondary text-xs font-weight-bold"><?php echo $created_at ?></span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span
                                                            class="text-secondary text-xs font-weight-bold"><?php echo $updated_at ?></span>
                                                    </td>
                                                    <td class='align-middle text-center'>
                                                        <a href='#popup_edit-<?php echo $item_id; ?>'
                                                            class='text-secondary font-weight-bold text-xs edit-btn'
                                                            data-original-title='edit' title='Sửa thông tin' data-toggle='modal'
                                                            data-target='#popup_edit-<?php echo $item_id; ?>'>Sửa</a>
                                                    </td>
                                                </tr>

                                                <div id="popup_edit-<?php echo $item_id; ?>" class="overlay_flight_traveldil">
                                                    <div class="card popup-cont">
                                                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                                            <div
                                                                class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                                                                <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">
                                                                    Cập nhật thông tin vật tư
                                                                </h4>
                                                            </div>
                                                        </div>
                                                        <div class="card-body edit-body">
                                                            <form name="edit_item" role="form" method="POST">

                                                                <div class="input-group input-group-outline mb-3">
                                                                    <label class="form-label">Tên vật tư</label>
                                                                    <input name="item_name" id="item_name" class="form-control">
                                                                </div>
                                                                <div class="input-group input-group-outline mb-3">
                                                                    <label class="form-label">Đơn giá</label>
                                                                    <input type="number" name="price" id="price"
                                                                        class="form-control">
                                                                </div>
                                                                <div class="input-group input-group-outline mb-3">
                                                                    <!-- <label class="form-label-lg" style="margin-right: 10px;">Giới tính</label> -->
                                                                    <select name="unit" id="unit" class="form-control">
                                                                        <option value="" disabled selected>Chọn đơn vị tính
                                                                        </option>
                                                                        <option value="viên">Viên</option>
                                                                        <option value="gói">Gói</option>
                                                                        <option value="hộp">Hộp</option>
                                                                        <option value="cái">Cái</option>
                                                                        <option value="bộ">Bộ</option>
                                                                    </select>
                                                                </div>

                                                                <div class="text-center">
                                                                    <button type="submit" name="update" value=<?php echo $item_id; ?>
                                                                        class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Cập
                                                                        nhật</button>
                                                                </div>

                                                                <div class="text-center">
                                                                    <button type="submit" name="delete" value=<?php echo $item_id; ?>
                                                                        class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Xoá</button>

                                                                </div>

                                                                <div class="text-center">
                                                                    <button type="button"
                                                                        class="btn btn-lg btn-outline-primary btn-lg w-100 mt-4 mb-0"
                                                                        onclick="location.href='http://localhost/HMS-Nhom11/role-admin/supply.php'">Thoát</button>
                                                                </div>

                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>

                                                <?php
                                            }
                                        } else {
                                            echo "Không tìm thấy người dùng.";
                                        }
                                        ?>

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Popup Section for Form -->
        <!-- Popup to create user -->
        <div id="popup_add" class="overlay_flight_traveldil">
            <div class="card popup-cont">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                        <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Thêm chuyên khoa</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form name="edit_item" role="form" method="POST">

                        <div class="input-group input-group-outline mb-3">
                            <label class="form-label">Tên vật tư</label>
                            <input name="item_name" id="item_name" class="form-control" required>
                        </div>
                        <div class="input-group input-group-outline mb-3">
                            <label class="form-label">Đơn giá</label>
                            <input type="number" name="price" id="price" class="form-control" required>
                        </div>
                        <div class="input-group input-group-outline mb-3">
                            <!-- <label class="form-label-lg" style="margin-right: 10px;">Giới tính</label> -->
                            <select name="unit" id="unit" class="form-control" required>
                                <option value="" disabled selected>Chọn đơn vị tính
                                </option>
                                <option value="viên">Viên</option>
                                <option value="gói">Gói</option>
                                <option value="hộp">Hộp</option>
                                <option value="cái">Cái</option>
                                <option value="bộ">Bộ</option>
                            </select>
                        </div>

                        <div class="text-center">
                            <button type="submit" name="create" value="create"
                                class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Tạo vật tư</button>
                        </div>
                        <div class="text-center" href="#">
                            <button type="button" class="btn btn-lg btn-outline-primary btn-lg w-100 mt-4 mb-0"
                                onclick="location.href='http://localhost/HMS-Nhom11/role-admin/supply.php'">Thoát</button>
                        </div>

                </div>
                </form>
            </div>
        </div>

    </main>



    <footer class="footer py-4  ">
        <div class="container-fluid">
            <div class="row align-items-center justify-content-lg-between">
                <div class="col-lg-6 mb-lg-0 mb-4">
                    <div class="copyright text-center text-sm text-muted text-lg-start">
                        ©
                        <script>
                            document.write(new Date().getFullYear())
                        </script>2024,
                        made with <i class="fa fa-heart" aria-hidden="true"></i> by
                        <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative Tim</a>
                        for a better web.
                    </div>
                </div>
                <div class="col-lg-6">
                    <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative
                                Tim</a>
                        </li>
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted"
                                target="_blank">About Us</a>
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