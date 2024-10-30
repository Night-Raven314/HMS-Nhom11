<?php
    session_start();
    error_reporting(0);
    include('../L-connect.php');
    

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">

    <title>
        Lịch hẹn kiểm tra
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

</head>

<!-- Side Nav -->

<body class="g-sidenav-show"
    style="background-image: url('./assets/image/Hospital_Seamless1.png'); background-size: 400px 400px;">

    <aside
        class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark"
        id="sidenav-main">

        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard "
                target="_blank">
                <img src="assets/image/logo01-sq.png" class="navbar-brand-img h-100" alt="main_logo">
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
                    <a class="nav-link text-white active bg-gradient-primary" href="F1-schedule.php">

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
                    <a class="nav-link text-white" href="A1-profile.php">

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
                            <!-- Right corner user section -->
                            <li class="nav-item d-flex align-items-center">
                                <a class="btn btn-outline-primary btn-sm mb-0 me-3" target="_blank" href="sign-in.php">Đăng
                                    xuất</a>
                            </li>
                        </li>

                        <li class="nav-item d-flex align-items-center">
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
                <h6 class="text-white text-capitalize ps-3">Danh sách lịch hẹn kiểm tra</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Bác sĩ</th>
                      <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Tên bệnh nhân</th>
                      <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Khoa khám</th>
                      <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Phí tư vấn</th>
                      <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Ngày hẹn khám</th>
                      <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Giờ hẹn khám</th>
                      <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Ngày tạo cuộc hẹn</th>
                      <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Trạng thái</th>
                      
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                    

                  </thead>
                
                <?php 
                              
                              $sql = "SELECT ptn.full_name AS patient_name,
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
                                        WHERE ptn.user_id = 34
                                        ORDER BY app.booking_date DESC, app.booking_time DESC; " ; 
                             $result = $conn->query($sql);
                              // Kiểm tra và hiển thị dữ liệu
                              if ($result->num_rows > 0) {
                                 while($row = $result->fetch_assoc()) {
                                  
                                 
                                  $fullname=$row["full_name"];
                                  $ptn=$row["patient_name"];
                                  $dtn=$row["doctor_name"];
                                  $spn=$row["specialty_name"];
                                  $bkd=$row["booking_date"];
                                  $bkt=$row["booking_time"];
                                  $cf=$row["cons_fee"];
                                  $created_at=$row["created_at"];
                                  
                                  echo"<tr>";
                                  echo ' <td class="align-middle text-center">
                                            <h6 class="mb-0 text-sm">' . $dtn . '</h6>
                                        </td>';
                                        echo ' <td class="align-middle text-center">
                                        <h6 class="mb-0 text-sm">' . $ptn . '</h6>
                                    </td>';
                                  

                                 echo ' <td class="align-middle text-center">
                                            <span class="text-xs font-weight-bold mb-0">' . $spn . '</span>
                                        </td>';
                                 
                                echo'<td class="align-middle text-center">
                                        <p class="text-xs font-weight-bold mb-0">'.$cf.'</p>
                                        <p class="text-xs text-secondary mb-0">VNĐ</p>
                                    </td>';
                                 
                                echo'<td class="align-middle text-center">
                                        <span class="text-xs font-weight-bold mb-0">'.$bkd.'</span>
                                    </td>';
                                echo'<td class="align-middle text-center">
                                        <span class="text-xs font-weight-bold mb-0">'.$bkt.'</span>
                                    </td>';
                                echo'<td class="align-middle text-center">
                                        <span class="text-xs font-weight-bold mb-0">'.$created_at.'</span>
                                    </td>';
                                
                                 
                                  
                                 
                                  
                                  echo "</tr>";

                              } }else {
                                  echo "Không tìm thấy người dùng.";
                              }
                              
                              
                              // Đóng kết nối
                              
                              
                              
                             
                             
                          
              
                              
                             
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
            <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Huan, Khoa and Long</a>
            for Uni 24-25.
          </div>
        </div>
      </div>
    </div>
  </footer>
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
</body>

</html>