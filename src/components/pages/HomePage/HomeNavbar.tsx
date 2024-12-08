import { FC } from "react";
import { useNavigate } from "react-router-dom";


export const HomeNavbar: FC = () => {
  const navigate = useNavigate();
  return (
    <nav className="home-navbar navbar navbar-main navbar-expand-lg"
      id="navbarBlur" data-scroll="true">
      <div className="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <img src="./image/logo01-sq.png" className="navbar-brand-img" style={{height: "35px"}} alt="main_logo" />
            <span className="ms-1 font-weight-bold text-dark">HKL Hospital</span>

        </nav>
        <div className="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <ul className="navbar-nav mx-auto">
            <li className="nav-item">
              <a className="nav-link d-flex align-items-center me-2 active" aria-current="page" href="#about_us">
                <i className="fa fa-chart-pie opacity-6 text-dark me-1" aria-hidden="true"></i>
                Giới thiệu
              </a>
            </li>
            <li className="nav-item">
              <a className="nav-link me-2" href="#services">
                <i className="fa fa-plus-square opacity-6 text-dark me-1" aria-hidden="true"></i>
                Chuyên khoa
              </a>
            </li>
            <li className="nav-item">
              <a className="nav-link me-2" href="#contact">
                <i className="fas fa-user-circle opacity-6 text-dark me-1" aria-hidden="true"></i>
                Liên hệ
              </a>
            </li>
          </ul>

          <ul className="navbar-nav  justify-content-end">

            <li className="nav-item d-xl-none ps-3 d-flex align-items-center">
              {/* Right corner user section */}
            </li>
            <li className="nav-item d-flex align-items-center">
              <a className="btn btn-outline-primary btn-sm mb-0 me-3" onClick={() => navigate("sign-in")}>Đăng nhập</a>
            </li>
            <li className="nav-item d-flex align-items-center">
              <a className="btn bg-gradient-primary btn-sm mb-0 me-3" onClick={() => navigate("sign-up")}>Đăng ký</a>
            </li>

          </ul>

        </div>
      </div>
    </nav>
  )
}