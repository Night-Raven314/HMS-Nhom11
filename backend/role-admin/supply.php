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

        <li class="nav-item">
          <a class="nav-link text-white" href="payment_log.php">

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
        Quản lý vật tư y tế
      </div>
      <div class="nav-right">
        <div class="nav-item">
          <div class="custom-input" style="width: 180px">
            <input type="text" id="searchTableField" placeholder="Nhập tên thuốc">
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
                <h6 class="text-white ps-3" style="float: left;">Thông tin vật tư y tế
                </h6>
                <div class="table-float-btn-container">
                  <button class="table-float-btn btn btn-outline-primary btn-sm mb-0 me-3" style="background: #ffffff"
                    data-bs-toggle="modal" data-bs-target="#popup_add">Tạo vật tư</button>
                </div>
              </div>
            </div>

            <!-- Tạo vật tư -->
            <div class="modal fade" id="popup_add" tabindex="-1" aria-labelledby="ItemCreate" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="card">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                      <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                        <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">
                          Tạo vật tư
                        </h4>
                      </div>
                    </div>
                    <div class="card-body edit-body">
                      <form name="itemcreate" role="form" method="POST">
                      <div class="row">
                          <div class="col-md-12">
                            <div class="custom-input">
                              <input type="text" name="item_name" id="item_name" placeholder="Nhập tên vật tư" required>
                              <label>Tên vật tư</label>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="custom-input">
                              <input type="number" name="price" id="price" placeholder="Nhập đơn giá" required>
                              <label>Đơn giá</label>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="custom-input">
                              <!-- <label class="form-label-lg" style="margin-right: 10px;">Giới tính</label> -->
                              <select name="unit" id="unit" required>
                                <option value="" disabled selected>Chọn đơn vị
                                  tính
                                </option>
                                <option value="viên">Viên</option>
                                <option value="gói">Gói</option>
                                <option value="hộp">Hộp</option>
                                <option value="cái">Cái</option>
                                <option value="bộ">Bộ</option>
                              </select>
                              <label>Đơn vị tính</label>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="text-center">
                              <button type="button" class="btn btn-lg btn-outline-primary btn-lg w-100 mt-4 mb-0"
                                data-bs-dismiss="modal">Thoát</button>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="text-center">
                              <button type="submit" name="create" value="create"
                                class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Tạo
                                vật tư</button>
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
              <div class="custom-table">
                <table id="drugTable" class="table">
                  <thead>
                    <tr>
                      <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                        Mã vật tư</th>
                      <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                        Tên vật tư</th>
                      <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                        Đơn giá</th>
                      <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                        Loại</th>
                      <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                        Ngày tạo</th>
                      <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                        Ngày chỉnh sửa</th>
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

    <script>
      let searchFilterDelay = null;
      let tableData = null;
      let tableDataFiltered = null;
      const displayTableDataFromFiltered = () => {
        const tbodyHTML = tableDataFiltered.map(item => `
          <tr>
            <td class="align-middle text-center text-sm">
              <p class="text-xs font-weight-bold mb-0">${item.item_id}</p>
            </td>
            <td class="align-middle text-center">
              <div class="d-flex px-2 py-1">
                <div>

                </div>
                <div class="d-flex flex-column justify-content-center">
                  <h6 class="mb-0 text-sm">${item.item_name}</h6>
                </div>
              </div>
            </td>
            <td class="align-middle text-center">
              <p class="text-xs font-weight-bold mb-0">
                ${item.item_price}
              </p>
              <p class="text-xs text-secondary mb-0">VNĐ</p>
            </td>
            <td class="align-middle text-center text-sm">
              <p class="text-xs font-weight-bold mb-0">${item.item_unit}</p>
            </td>
            <td class="align-middle text-center">
              <span class="text-secondary text-xs font-weight-bold">${item.created_at}</span>
            </td>
            <td class="align-middle text-center">
              <span class="text-secondary text-xs font-weight-bold">${item.updated_at}</span>
            </td>
            <td class='align-middle text-center'>
              <a href='#popup_edit-${item.item_id}'
                class='text-secondary font-weight-bold text-xs edit-btn' data-original-title='edit'
                title='Sửa thông tin' data-bs-toggle="modal"
                data-bs-target="#popup_edit-${item.item_id}">Cập nhật</a>
                <a class='text-secondary font-weight-bold text-xs edit-btn'"> / </a>
                <a href='#popup_delete-${item.item_id}'
                class='text-secondary font-weight-bold text-xs edit-btn'
                data-original-title='delete' title='Xoá vật tư'
                data-bs-toggle="modal"
                data-bs-target="#popup_delete-${item.item_id}">Xoá</a>


              <!-- Popup Sửa thông tin -->
              <div class="modal fade" id="popup_edit-${item.item_id}" tabindex="-1" aria-labelledby="ItemCreate" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="card">
                      <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                          <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">
                            Cập nhật vật tư
                          </h4>
                        </div>
                      </div>
                      <div class="card-body edit-body">
                        <form name="itemcreate" role="form" method="POST">
                          <div class="row">
                            <div class="col-md-12">
                              <div class="custom-input">
                                <input type="text" name="item_name" id="item_name required"
                                  value="${item.item_name}">
                                <label>Tên vật tư</label>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="custom-input">
                                <input type="number" name="price" id="price" value="${item.item_price}" required>
                                <label>Đơn giá</label>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="custom-input">
                                <!-- <label class="form-label-lg" style="margin-right: 10px;">Giới tính</label> -->
                                <select name="unit" id="unit" required>
                                  <option value="" disabled selected>Chọn đơn vị
                                    tính
                                  </option>
                                  <option value="viên">Viên</option>
                                  <option value="gói">Gói</option>
                                  <option value="hộp">Hộp</option>
                                  <option value="cái">Cái</option>
                                  <option value="bộ">Bộ</option>
                                </select>
                                <label>Đơn vị tính</label>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="text-center">
                                <button type="button" class="btn btn-lg btn-outline-primary btn-lg w-100 mt-4 mb-0"
                                  data-bs-dismiss="modal">Thoát</button>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="text-center">
                                <button type="submit" name="update" value=${item.item_id}
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
              <div class="modal fade" id="popup_delete-${item.item_id}" tabindex="-1"
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
                                          Xoá vật tư y tế
                                      </h4>
                                  </div>
                                  <div class="card-header">
                                      <p class="font-weight-bolder text-center mt-2 mb-0">Bạn có chắc chắn muốn xoá vật tư sau?</p>
                                      <p class="text-center mt-2 mb-0">${item.item_name}</p>
                                      <p class="font-weight-bolder text-center mt-2 mb-0">Vật tư này sẽ không thể khôi phục</p>
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
                                                      value=${item.item_id}
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
        $sql = "SELECT * FROM `dim_item` ";
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
            tableDataFiltered = tableData.filter(item => item.item_name.toLowerCase().includes(query));
          }
          displayTableDataFromFiltered();
        }, 500)
      })
    </script>

    <?php
    include SITE_ROOT . ('/HMS-Nhom11/assets/include/footer.php');
    ?>