<?php
define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT']);

session_start();

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
        <!-- Navbar -->

        <div class="custom-navbar">
            <div class="nav-left">
                Quản lý lịch làm việc
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

        <!-- Nội dung trang -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
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
                        <div class="modal fade" id="popup_add" tabindex="-1" aria-labelledby="SpcCreate"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="card">
                                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                            <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                                                <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">
                                                    Đăng ký thời gian làm việc
                                                </h4>
                                            </div>
                                        </div>
                                        <div class="card-body edit-body">
                                            <form name="work_sched" role="form" method="POST">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="custom-input">
                                                            <input type="date" name="work_date" id="work_date"
                                                                placeholder="Ngày làm việc" required>
                                                            <label>Ngày làm việc</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="custom-input">
                                                            <input type="time" name="start_time" id="start_time"
                                                                placeholder="Giờ bắt đầu" required>
                                                            <label>Giờ bắt đầu</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="custom-input">
                                                            <input type="time" name="end_time" id="end_time"
                                                                placeholder="Giờ kết thúc" required>
                                                            <label>Giờ kết thúc</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="custom-input">
                                                            <input type="text" name="work_note" id="work_note"
                                                                placeholder="Nhập ghi chú" required>
                                                            <label>Ghi chú</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="text-center">
                                                            <button type="button"
                                                                class="btn btn-lg btn-outline-primary btn-lg w-100 mt-4 mb-0"
                                                                data-bs-dismiss="modal">Thoát</button>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="text-center">
                                                            <button type="submit" name="create" value="create"
                                                                class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Đăng
                                                                ký</button>
                                                        </div>
                                                    </div>
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
                                                Chuyên khoa</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                Ngày làm việc</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                Giờ bắt đầu</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                Giờ kết thúc</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                Ghi chú</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody id="productTableBody">
                                        <!-- Data appear here -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            let searchFilterDelay = null;
            let tableData = null;
            let tableDataFiltered = null;
            const displayTableDataFromFiltered = () => {
                const tbodyHTML = tableDataFiltered.map(item => `
          <tr>
            <td class="align-middle text-center text-sm">
              <p class="text-xs font-weight-bold mb-0">${item.specialty_name}</p>
            </td>
            <td class="align-middle text-center">
              <p class="text-xs font-weight-bold mb-0">
                ${item.booking_date}
              </p>
            </td>
            <td class="align-middle text-center">
              <p class="text-xs font-weight-bold mb-0">
                ${item.start_time}
              </p>
            </td>
            <td class="align-middle text-center">
              <p class="text-xs font-weight-bold mb-0">
                ${item.end_time}
              </p>
            </td>
            <td class="align-middle text-center text-sm">
              <p class="text-xs font-weight-bold mb-0">${item.work_note}</p>
            </td>
            <td class='align-middle text-center'>
              <a href='#popup_edit-${item.work_id}'
                class='text-secondary font-weight-bold text-xs edit-btn' data-original-title='edit'
                title='Sửa thông tin' data-bs-toggle="modal"
                data-bs-target="#popup_edit-${item.work_id}">Cập nhật</a>
                <a class='text-secondary font-weight-bold text-xs edit-btn'"> / </a>
                <a href='#popup_delete-${item.work_id}'
                class='text-secondary font-weight-bold text-xs edit-btn'
                data-original-title='delete' title='Xoá vật tư'
                data-bs-toggle="modal"
                data-bs-target="#popup_delete-${item.work_id}">Xoá</a>


              <!-- Popup Sửa thông tin -->
              <div class="modal fade" id="popup_edit-${item.work_id}" tabindex="-1" aria-labelledby="ItemCreate" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="card">
                      <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                          <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">
                            Cập nhật lịch làm
                          </h4>
                        </div>
                      </div>
                      <div class="card-body edit-body">
                        <form name="work_sched_edit" role="form" method="POST">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="custom-input">
                                        <input type="date" name="work_date" id="work_date"
                                            value="${item.booking_date}" required>
                                        <label>Ngày làm việc</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="custom-input">
                                        <input type="time" name="start_time" id="start_time"
                                            value="${item.start_time}" required>
                                        <label>Giờ bắt đầu</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="custom-input">
                                        <input type="time" name="end_time" id="end_time"
                                            value="${item.end_time}" required>
                                        <label>Giờ kết thúc</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="custom-input">
                                        <input type="text" name="work_note" id="work_note"
                                            value="${item.work_note}" required>
                                        <label>Ghi chú</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-center">
                                        <button type="button"
                                            class="btn btn-lg btn-outline-primary btn-lg w-100 mt-4 mb-0"
                                            data-bs-dismiss="modal">Thoát</button>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-center">
                                        <button type="submit" name="update"
                                            value=${item.work_id}
                                            class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Cập
                                            nhật</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Popup Xoá thông tin -->
              <div class="modal fade" id="popup_delete-${item.work_id}" tabindex="-1"
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
                                          Xoá lịch làm việc
                                      </h4>
                                  </div>
                                  <div class="card-header">
                                      <p class="font-weight-bolder text-center mt-2 mb-0">Bạn có chắc chắn muốn xoá lịch làm sau?</p>
                                      <p class="text-center mt-2 mb-0">Ngày ${item.booking_date} (${item.start_time} đến ${item.end_time})</p>
                                      <p class="font-weight-bolder text-center mt-2 mb-0">Bạn sẽ phải đăng ký lại nếu cần</p>
                                  </div>
                              </div>
                              <div class="card-body edit-body">
                                  <form name="edit_user" role="form" method="POST">
                                      <div class="row"> <!-- Thêm hàng để chia thành 2 bên -->
                                          <!-- Thêm hàng để chia thành 2 bên -->
                                          <div class="col-md-6">
                                              <div class="text-center">
                                                  <button type="button"
                                                      class="btn btn-lg btn-outline-primary btn-lg w-100 mt-4 mb-0"
                                                      data-bs-dismiss="modal">Thoát</button>
                                              </div>
                                          </div>
                                          <div class="col-md-6">
                                              <div class="text-center">
                                                  <button type="submit" name="delete"
                                                      value=${item.work_id}
                                                      class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Xoá</button>
                                              </div>
                                          </div>
                                          
                                      </div>
                                  </form>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
            </td>
          </tr>
        `).join("");
                document.getElementById('productTableBody').innerHTML = tbodyHTML;
            }

            <?php
            $current_user = $_SESSION['auth_user_id'];
            $sql = "SELECT spc.specialty_name AS specialty_name, sch.* 
            FROM `fact_work_schedule` sch 
            LEFT JOIN `dim_specialties` spc 
            ON spc.specialty_id = sch.specialty_id 
            WHERE `user_id` = $current_user ";
            $result = $conn->query($sql);
            // Kiểm tra và hiển thị dữ liệu
            $productList = [];
            while ($row = $result->fetch_assoc()) {
                $productList[] = $row;
            }
            ?>
            tableData = <?php echo json_encode($productList) ?>;
            tableDataFiltered = tableData;
            displayTableDataFromFiltered();
            <?php ?>
            const searchField = document.getElementById("searchTableField");
            searchField.addEventListener("keyup", () => {
                clearTimeout(searchFilterDelay);
                searchFilterDelay = setTimeout(() => {
                    const query = searchField.value.toLowerCase();
                    if (!query) {
                        tableDataFiltered = tableData;
                    } else {
                        tableDataFiltered = tableData.filter(item => item.item_name.toLowerCase().includes(query));
                    }
                    displayTableDataFromFiltered();
                }, 500)
            })
        </script>

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

        <?php include SITE_ROOT . ('/HMS-Nhom11/assets/include/footer.php'); ?>