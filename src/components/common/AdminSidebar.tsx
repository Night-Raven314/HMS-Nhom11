import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { FC } from "react";
import { faCalendar, faClipboard } from "@fortawesome/free-regular-svg-icons";
import { faBookMedical, faIdBadge, faKitMedical, faMoneyBill, faNotesMedical, faPills, faUserPen, faUsers } from "@fortawesome/free-solid-svg-icons";
import { Link } from "react-router-dom";

export type AdminSidebarProps = {
  selectedItem: string;
}

export const AdminSidebar:FC<AdminSidebarProps> = ({selectedItem}) => {
  return (
    <div className="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl bg-gradient-dark">

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
              </div>

              <span className="nav-link-text ms-1">Lịch hẹn kiểm tra</span>
            </a>
          </li>


          <li className="nav-item">
            <a className="nav-link text-white" href="F2-user-medhist.php">

              <div className="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <FontAwesomeIcon icon={faClipboard} />
              </div>

              <span className="nav-link-text ms-1">Hồ sơ sức khoẻ</span>
            </a>
          </li>


          <li className="nav-item">
            <a className="nav-link text-white" href="F3-patients.php">

              <div className="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <FontAwesomeIcon icon={faUsers} />
              </div>

              <span className="nav-link-text ms-1">Danh sách bệnh nhân</span>
            </a>
          </li>


          <li className="nav-item mt-3">
            <h6 className="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Quản trị
            </h6>
          </li>

          <li className="nav-item">
            <Link to="/role-admin/guest">
              <div className={`nav-link text-white ${selectedItem === "guest" ? "active bg-gradient-primary" : ""}`}>
                <div className="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <FontAwesomeIcon icon={faUserPen} />
                </div>

                <span className="nav-link-text ms-1">Quản lý người dùng</span>
              </div>
            </Link>
          </li>

          <li className="nav-item">
            <Link to="/role-admin/employee">
              <div className={`nav-link text-white ${selectedItem === "employee" ? "active bg-gradient-primary" : ""}`}>
                <div className="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <FontAwesomeIcon icon={faIdBadge} />
                </div>

                <span className="nav-link-text ms-1">Quản lý nhân viên</span>
              </div>
            </Link>
          </li>

          <li className="nav-item">
            <Link to="/role-admin/supply">
              <div className={`nav-link text-white ${selectedItem === "item" ? "active bg-gradient-primary" : ""}`}>
                <div className="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <FontAwesomeIcon icon={faKitMedical} />
                </div>
                <span className="nav-link-text ms-1">Quản lý vật tư</span>
              </div>
            </Link>
          </li>

          <li className="nav-item">
            <Link to="/role-admin/medicine">
              <div className={`nav-link text-white ${selectedItem === "meds" ? "active bg-gradient-primary" : ""}`}>
                <div className="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <FontAwesomeIcon icon={faPills} />
                </div>
                <span className="nav-link-text ms-1">Quản lý thuốc</span>
              </div>
            </Link>
          </li>

          <li className="nav-item">
            <Link to="/role-admin/med-service">
              <div className={`nav-link text-white ${selectedItem === "med_service" ? "active bg-gradient-primary" : ""}`}>
                <div className="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <FontAwesomeIcon icon={faBookMedical} />
                </div>
                <span className="nav-link-text ms-1">Quản lý dịch vụ y tế</span>
              </div>
            </Link>
          </li>

          <li className="nav-item">
            <Link to="/role-admin/faculty">
              <div className={`nav-link text-white ${selectedItem === "faculty" ? "active bg-gradient-primary" : ""}`}>
                <div className="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <FontAwesomeIcon icon={faNotesMedical} />
                </div>
                <span className="nav-link-text ms-1">Quản lý chuyên khoa</span>
              </div>
            </Link>
          </li>

          <li className="nav-item">
            <Link to="/role-admin/payment-log">
              <div className={`nav-link text-white ${selectedItem === "payment-log" ? "active bg-gradient-primary" : ""}`}>
                <div className="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <FontAwesomeIcon icon={faMoneyBill} />
                </div>
                <span className="nav-link-text ms-1">Lịch sử giao dịch</span>
              </div>
            </Link>
          </li>

        </ul>
      </div>

    </div>
  )
}