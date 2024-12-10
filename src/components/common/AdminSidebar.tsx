import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { FC } from "react";
import { faCalendar, faClipboard } from "@fortawesome/free-regular-svg-icons";
import { faBookMedical, faBuilding, faFileArrowDown, faIdBadge, faKitMedical, faMoneyBill, faNotesMedical, faPills, faUserPen, faUsers } from "@fortawesome/free-solid-svg-icons";
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
            <h6 className="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Quản trị
            </h6>
          </li>

          <li className="nav-item">
            <Link to="/role-admin/guest">
              <div className={`nav-link text-white ${selectedItem === "guest" ? "active bg-gradient-primary" : ""}`}>
                <div className="side-icon">
                  <FontAwesomeIcon icon={faUserPen} />
                </div>

                <span className="side-text">Quản lý người dùng</span>
              </div>
            </Link>
          </li>

          <li className="nav-item">
            <Link to="/role-admin/employee">
              <div className={`nav-link text-white ${selectedItem === "employee" ? "active bg-gradient-primary" : ""}`}>
                <div className="side-icon">
                  <FontAwesomeIcon icon={faIdBadge} />
                </div>

                <span className="side-text">Quản lý nhân viên</span>
              </div>
            </Link>
          </li>

          <li className="nav-item">
            <Link to="/role-admin/supply">
              <div className={`nav-link text-white ${selectedItem === "item" ? "active bg-gradient-primary" : ""}`}>
                <div className="side-icon">
                  <FontAwesomeIcon icon={faKitMedical} />
                </div>
                <span className="side-text">Quản lý vật tư</span>
              </div>
            </Link>
          </li>

          <li className="nav-item">
            <Link to="/role-admin/medicine">
              <div className={`nav-link text-white ${selectedItem === "meds" ? "active bg-gradient-primary" : ""}`}>
                <div className="side-icon">
                  <FontAwesomeIcon icon={faPills} />
                </div>
                <span className="side-text">Quản lý thuốc</span>
              </div>
            </Link>
          </li>

          <li className="nav-item">
            <Link to="/role-admin/med-service">
              <div className={`nav-link text-white ${selectedItem === "med_service" ? "active bg-gradient-primary" : ""}`}>
                <div className="side-icon">
                  <FontAwesomeIcon icon={faBookMedical} />
                </div>
                <span className="side-text">Quản lý dịch vụ y tế</span>
              </div>
            </Link>
          </li>

          <li className="nav-item">
            <Link to="/role-admin/building">
              <div className={`nav-link text-white ${selectedItem === "building" ? "active bg-gradient-primary" : ""}`}>
                <div className="side-icon">
                  <FontAwesomeIcon icon={faBuilding} />
                </div>

                <span className="side-text">Quản lý khu nội trú</span>
              </div>
            </Link>
          </li>

          <li className="nav-item">
            <Link to="/role-admin/faculty">
              <div className={`nav-link text-white ${selectedItem === "faculty" ? "active bg-gradient-primary" : ""}`}>
                <div className="side-icon">
                  <FontAwesomeIcon icon={faNotesMedical} />
                </div>
                <span className="side-text">Quản lý chuyên khoa</span>
              </div>
            </Link>
          </li>

          <li className="nav-item">
            <Link to="/role-admin/payment-log">
              <div className={`nav-link text-white ${selectedItem === "payment-log" ? "active bg-gradient-primary" : ""}`}>
                <div className="side-icon">
                  <FontAwesomeIcon icon={faMoneyBill} />
                </div>
                <span className="side-text">Lịch sử giao dịch</span>
              </div>
            </Link>
          </li>

          <li className="nav-item">
            <Link to="/role-admin/download-reports">
              <div className={`nav-link text-white ${selectedItem === "download-reports" ? "active bg-gradient-primary" : ""}`}>
                <div className="side-icon">
                  <FontAwesomeIcon icon={faFileArrowDown} />
                </div>
                <span className="side-text">Tải về báo cáo</span>
              </div>
            </Link>
          </li>

        </ul>
      </div>

    </div>
  )
}