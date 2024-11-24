import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { FC } from "react";
import { faCalendar, faClipboard } from "@fortawesome/free-regular-svg-icons";
import { faBookMedical, faClock, faIdBadge, faKitMedical, faMoneyBill, faNotesMedical, faPills, faUserPen, faUsers } from "@fortawesome/free-solid-svg-icons";
import { Link } from "react-router-dom";

export type PatientSidebarProps = {
  selectedItem: string;
}

export const PatientSidebar:FC<PatientSidebarProps> = ({selectedItem}) => {
  return (
    <div className="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl bg-gradient-dark">

      <div className="sidenav-header">
        <a className="navbar-brand m-0" href="/">
          <img src="../backend/assets/image/logo01-sq.png" className="navbar-brand-img h-100" alt="main_logo" />
          <span className="ms-1 font-weight-bold text-white">HKL Hospital</span>
        </a>
      </div>

      <hr className="horizontal light mt-0 mb-2" />

      <div className="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul className="navbar-nav">

          <li className="nav-item mt-3">
            <h6 className="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Chức năng chính
            </h6>
          </li>

          <li className="nav-item">
            <Link to="/role-patient/appointment">
              <div className={`nav-link text-white ${selectedItem === "appointment" ? "active bg-gradient-primary" : ""}`}>
                <div className="side-icon">
                  <FontAwesomeIcon icon={faCalendar} />
                </div>

                <span className="side-text">Đặt hẹn khám bệnh</span>
              </div>
            </Link>
          </li>

          <li className="nav-item">
            <Link to="/role-patient/patient-log">
              <div className={`nav-link text-white ${selectedItem === "patientlog" ? "active bg-gradient-primary" : ""}`}>
                <div className="side-icon">
                  <FontAwesomeIcon icon={faKitMedical} />
                </div>

                <span className="side-text">Lịch sử khám bệnh</span>
              </div>
            </Link>
          </li>

          <li className="nav-item">
            <Link to="/role-patient/payment-log">
              <div className={`nav-link text-white ${selectedItem === "payment-log" ? "active bg-gradient-primary" : ""}`}>
                <div className="side-icon">
                  <FontAwesomeIcon icon={faMoneyBill} />
                </div>

                <span className="side-text">Lịch sử thanh toán</span>
              </div>
            </Link>
          </li>
          
        </ul>
      </div>

    </div>
  )
}