import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { FC } from "react";
import { faCalendar, faClipboard } from "@fortawesome/free-regular-svg-icons";
import { faBookMedical, faIdBadge, faKitMedical, faMoneyBill, faNotesMedical, faPills, faUserPen, faUsers } from "@fortawesome/free-solid-svg-icons";
import { Link } from "react-router-dom";

export type DoctorSidebarProps = {
  selectedItem: string;
}

export const DoctorSidebar:FC<DoctorSidebarProps> = ({selectedItem}) => {
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
            <Link to="/role-doctor/schedule">
              <div className={`nav-link text-white ${selectedItem === "schedule" ? "active bg-gradient-primary" : ""}`}>
                <div className="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <FontAwesomeIcon icon={faCalendar} />
                </div>

                <span className="nav-link-text ms-1">Lịch đặt hẹn khám</span>
              </div>
            </Link>
          </li>
          <li className="nav-item">
            <Link to="/role-doctor/patients">
              <div className={`nav-link text-white ${selectedItem === "patients" ? "active bg-gradient-primary" : ""}`}>
                <div className="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <FontAwesomeIcon icon={faUsers} />
                </div>

                <span className="nav-link-text ms-1">Quản lý bệnh nhân</span>
              </div>
            </Link>
          </li>


          <li className="nav-item mt-3">
            <h6 className="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Quản trị
            </h6>
          </li>

          
        </ul>
      </div>

    </div>
  )
}