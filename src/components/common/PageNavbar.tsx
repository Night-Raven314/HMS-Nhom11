import { FC } from "react";

export const PageNavbar:FC = () => {
  return (
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
  )
}