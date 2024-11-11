import { faCalendar, faClipboard } from "@fortawesome/free-regular-svg-icons";
import { faIdBadge, faKitMedical, faMoneyBill, faNotesMedical, faUserPen, faUsers } from "@fortawesome/free-solid-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { FC, useEffect, useState } from "react";
import { Helmet } from "react-helmet";

export const AdminGuest: FC = () => {
  return (
    <>
      <Helmet>
        <title>
          Quản lý người dùng - HKL
        </title>
      </Helmet>

      <div className="g-sidenav-show" style={{ backgroundImage: "url('../backend/assets/image/Hospital_Seamless1.png')", backgroundSize: '400px 400px' }}>

        <aside
          className="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark"
          id="sidenav-main">

          <div className="sidenav-header">
            <a className="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard "
              target="_blank">
              <img src="../backend/assets/image/logo01-sq.png" className="navbar-brand-img h-100" alt="main_logo" />
              <span className="ms-1 font-weight-bold text-white">HKL Hospital</span>
            </a>
          </div>

          <hr className="horizontal light mt-0 mb-2" />

          <div className="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
            <ul className="navbar-nav">

              <li className="nav-item mt-3">
                <h6 className="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Tính năng chính
                </h6>
              </li>

              <li className="nav-item">
                <a className="nav-link text-white" href="F1-schedule.php">

                  <div className="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <FontAwesomeIcon icon={faCalendar} />
                    {/* Check https://fonts.google.com/icons?icon.set=Material+Icons&icon.style=Rounded for ID */}
                  </div>

                  <span className="nav-link-text ms-1">Lịch hẹn kiểm tra</span>
                </a>
              </li>


              <li className="nav-item">
                <a className="nav-link text-white" href="F2-user-medhist.php">

                  <div className="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <FontAwesomeIcon icon={faClipboard} />
                    {/* Check https://fonts.google.com/icons?icon.set=Material+Icons&icon.style=Rounded for ID */}
                  </div>

                  <span className="nav-link-text ms-1">Hồ sơ sức khoẻ</span>
                </a>
              </li>


              <li className="nav-item">
                <a className="nav-link text-white" href="F3-patients.php">

                  <div className="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <FontAwesomeIcon icon={faUsers} />
                    {/* Check https://fonts.google.com/icons?icon.set=Material+Icons&icon.style=Rounded for ID */}
                  </div>

                  <span className="nav-link-text ms-1">Danh sách bệnh nhân</span>
                </a>
              </li>


              <li className="nav-item mt-3">
                <h6 className="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Quản trị
                </h6>
              </li>

              <li className="nav-item">
                <a className="nav-link text-white active bg-gradient-primary" href="guest.php">

                  <div className="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <FontAwesomeIcon icon={faUserPen} />
                    {/* Check https://fonts.google.com/icons?icon.set=Material+Icons&icon.style=Rounded for ID */}
                  </div>

                  <span className="nav-link-text ms-1">Quản lý người dùng</span>
                </a>
              </li>


              <li className="nav-item">
                <a className="nav-link text-white" href="employee.php">

                  <div className="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <FontAwesomeIcon icon={faIdBadge} />
                    {/* Check https://fonts.google.com/icons?icon.set=Material+Icons&icon.style=Rounded for ID */}
                  </div>

                  <span className="nav-link-text ms-1">Quản lý nhân viên</span>
                </a>
              </li>


              <li className="nav-item">
                <a className="nav-link text-white" href="supply.php">

                  <div className="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <FontAwesomeIcon icon={faKitMedical} />
                    {/* Check https://fonts.google.com/icons?icon.set=Material+Icons&icon.style=Rounded for ID */}
                  </div>

                  <span className="nav-link-text ms-1">Quản lý vật tư</span>
                </a>
              </li>


              <li className="nav-item">
                <a className="nav-link text-white" href="speciality.php">

                  <div className="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <FontAwesomeIcon icon={faNotesMedical} />
                    {/* Check https://fonts.google.com/icons?icon.set=Material+Icons&icon.style=Rounded for ID */}
                  </div>

                  <span className="nav-link-text ms-1">Quản lý chuyên khoa</span>
                </a>
              </li>

              <li className="nav-item">
                <a className="nav-link text-white" href="payment_log.php">

                  <div className="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <FontAwesomeIcon icon={faMoneyBill} />
                    {/* Check https://fonts.google.com/icons?icon.set=Material+Icons&icon.style=Rounded for ID */}
                  </div>

                  <span className="nav-link-text ms-1">Lịch sử giao dịch</span>
                </a>
              </li>

            </ul>
          </div>

        </aside>
        {/* End Side Nav */}

        <main className="main-content border-radius-lg ">
          {/* Navbar */}

          <div className="custom-navbar">
            <div className="nav-left">
              Quản lý người dùng
            </div>
            <div className="nav-right">
              <div className="nav-item">
                <div className="custom-input" style={{ width: '180px' }}>
                  <input type="text" id="searchTableField" placeholder="Nhập email" />
                  <label>Tìm kiếm</label>
                </div>
              </div>
              <div className="nav-item">
                <a href="javascript:;" id="iconNavbarSidenav">
                  <i className="fa-solid fa-bars"></i>
                </a>
              </div>
              <div className="nav-item">
                <div className="dropdown custom-dropdown">
                  <button className="button-avatar dropdown-toggle" data-bs-toggle="dropdown">
                    <img src="../backend/assets/image/user login image.png" alt="profile_image" />
                  </button>
                  <ul className="dropdown-menu">
                    <li><a className="dropdown-item" href="profile.php">Thông tin người dùng</a></li>
                    <li><a className="dropdown-item" href="../backend/assets/include/log-out.php">Đăng xuất</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          {/* End Navbar */}
          <div className="container-fluid py-4">
            <div className="row">
              <div className="col-12">
                <div className="card">
                  <div className="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div className="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                      <h6 className="text-white text-capitalize ps-3" style={{ float: 'left' }}> Thông tin người dùng trên hệ thống </h6>
                      <div className="table-float-btn-container">
                        <button
                          className="table-float-btn btn btn-outline-primary btn-sm mb-0 me-3"
                          style={{ background: '#ffffff' }}
                          data-bs-toggle="modal"
                          data-bs-target="#popup_add"
                        >
                          Tạo người dùng
                        </button>

                      </div>
                    </div>
                  </div>

                  {/* TODO: Popup to create user */}

                </div>
              </div>

              <div className="card-body px-0 pb-2">
                <div className="custom-table">
                  <table id="employeeTable" className="table">
                    <thead>
                      <tr>
                        <th
                          className="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                          Mã người dùng</th>
                        <th
                          className="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                          Họ và Tên</th>
                        <th
                          className="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                          Vị trí</th>
                        <th
                          className="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                          Tên đăng nhập</th>
                        <th
                          className="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                          Số điện thoại</th>
                        <th
                          className="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                          Email</th>
                        <th
                          className="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                          Mật khẩu</th>
                        <th
                          className="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                          Ngày tạo</th>
                        <th
                          className="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                          Ngày chỉnh sửa</th>
                        <th
                          className="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                          Thao tác</th>
                      </tr>
                    </thead>
                    <tbody id="productTableBody">
                      {/* Data appear here */}
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </main>
      </div>

    </>
  )
}