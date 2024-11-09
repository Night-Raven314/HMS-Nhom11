<?php
define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT']);

include('sess-check.php');
include SITE_ROOT . ('/HMS-Nhom11/backend/assets/include/config.php');
include SITE_ROOT . ('/HMS-Nhom11/backend/assets/include/header.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (isset($_POST['create']) && $_POST['create'] == 'create') {
    $post_item_name = mysqli_real_escape_string($conn, $_POST['item_name']);
    $post_item_price = mysqli_real_escape_string($conn, $_POST['price']);
    $post_item_unit = mysqli_real_escape_string($conn, $_POST['unit']);

    $sql = "INSERT INTO `dim_item` (`item_name`, `item_price`, `item_unit`) VALUES ('$post_item_name', '$post_item_price', '$post_item_unit')";

    $add = mysqli_query($conn, $sql);

    echo "<script type='text/javascript'>alert('Thêm vật tư thành công');</script>";

    header('Refresh:0 , url=http://localhost:8080/HMS-Nhom11/role-admin/supply.php');
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

    header('Refresh:0 , url=http://localhost:8080/HMS-Nhom11/role-admin/supply.php');
  }

  if (isset($_POST['delete'])) {
    $post_delete_id = $_POST['delete']; //Get user ID that need delete

    $sql = "DELETE FROM `dim_item` WHERE item_id = $post_delete_id";

    $delete = mysqli_query($conn, $sql);

    echo "<script type='text/javascript'>alert('Xoá vật tư thành công');</script>";

    header('Refresh:0 , url=http://localhost:8080/HMS-Nhom11/role-admin/supply.php');
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
          <a class="nav-link text-white" href="speciality.php">

            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">local_hospital</i>
              <!-- Check https://fonts.google.com/icons?icon.set=Material+Icons&icon.style=Rounded for ID -->
            </div>

            <span class="nav-link-text ms-1">Quản lý chuyên khoa</span>
          </a>
        </li>

        <li class="nav-item">
            <a class="nav-link text-white active bg-gradient-primary" href="payment_log.php">

                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons opacity-10">payments</i>
                    <!-- Check https://fonts.google.com/icons?icon.set=Material+Icons&icon.style=Rounded for ID -->
                </div>

                <span class="nav-link-text ms-1">Lịch sử giao dịch</span>
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
        Lịch sử giao dịch
      </div>
      <div class="nav-right">
        <div class="nav-item">
          <div class="custom-input" style="width: 180px">
            <input type="text" id="searchTableField" placeholder="Nhập loại thanh toán">
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
              <img src="../backend/assets/image/user login image.png" alt="profile_image">
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="profile.php">Thông tin người dùng</a></li>
              <li><a class="dropdown-item" href="../backend/assets/include/log-out.php">Đăng xuất</a></li>
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
                    <h6 class="text-white text-capitalize ps-3">Lịch sử giao dịch thanh toán
                    </h6>
                </div>
            </div>

            <div class="card-body px-0 pb-2">
              <div class="custom-table">
                <table id="drugTable" class="table">
                  <thead>
                    <tr>
                      <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                        Thời gian tạo</th>
                      <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                        Thời gian cập nhật</th>
                      <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                        Mã giao dịch</th>
                      <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                        Loại giao dịch</th>
                      <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                        Mã tham chiếu</th>
                      <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                        Giá trị</th>
                      <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                        Mô tả</th>
                      <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                        Trạng thái</th>
                      <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
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
        </div>
        </form>
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
              <p class="text-xs font-weight-bold mb-0">${item.created_at}</p>
            </td>
            <td class="align-middle text-center text-sm">
              <p class="text-xs font-weight-bold mb-0">${item.updated_at}</p>
            </td>
            <td class="align-middle text-center text-sm">
              <p class="text-xs font-weight-bold mb-0">${item.payment_id}</p>
            </td>
            <td class="align-middle text-center text-sm">
              <p class="text-xs font-weight-bold mb-0">${item.payment_type}</p>
            </td>
            <td class="align-middle text-center">
                <p class="text-xs font-weight-bold mb-0">${item.bank_trans_code}</p>
            </td>
            <td class="align-middle text-center text-sm">
              <p class="text-xs font-weight-bold mb-0">${item.amount}</p>
            </td>
            <td class="align-middle text-center">
              <span class="text-secondary text-xs font-weight-bold">${item.payment_desc}</span>
            </td>
            <td class="align-middle text-center">
              <span class="text-secondary text-xs font-weight-bold">${item.payment_status}</span>
            </td>
            <td class='align-middle text-center'>
            </td>
          </tr>
        `).join("");
        document.getElementById('productTableBody').innerHTML = tbodyHTML;
      }

      <?php
        $sql = "SELECT * FROM `fact_payment` ORDER BY `created_at` DESC, `updated_at` DESC, `payment_id` DESC";
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
      <?php  ?>
      const searchField = document.getElementById("searchTableField");
      searchField.addEventListener("keyup", () => {
        clearTimeout(searchFilterDelay);
        searchFilterDelay = setTimeout(() => {
          const query = searchField.value.toLowerCase();
          if(!query) {
            tableDataFiltered = tableData;
          } else {
            tableDataFiltered = tableData.filter(item => item.payment_type.toLowerCase().includes(query));
          }
          displayTableDataFromFiltered();
        }, 500)
      })
    </script>

    <?php
    include SITE_ROOT . ('/HMS-Nhom11/backend/assets/include/footer.php');
    ?>