import { forwardRef, Ref, useEffect, useImperativeHandle, useState } from "react";
import { CustomInput } from "./CustomInput";

export type NavbarHandles = {
  resetSearch: () => void
}
export type NavbarProps = {
  navbarTitle:string,
  hideSearch?: boolean,
  searchRequest: (keyword:string) => void
}

export const PageNavbar = forwardRef(({navbarTitle, hideSearch = false, searchRequest}:NavbarProps, ref: Ref<NavbarHandles>) => {
  const [searchKeyword, setSearchKeyword] = useState<string>("");
  useEffect(() => {
    searchRequest(searchKeyword);
  }, [searchKeyword])

  const resetSearch = () => {
    setSearchKeyword("");
  }

  useImperativeHandle(ref, () => ({
    resetSearch
  }))

  return (
    <div className="custom-navbar">
      <div className="nav-left">
        {navbarTitle}
      </div>
      <div className="nav-right">
        {!hideSearch ? (
          <div className="nav-item">
            <div style={{ width: '180px' }}>
              <CustomInput
                id="keyword"
                name="keyword"
                label="Tìm kiếm"
                placeholder="Nhập từ khoá"
                initialValue={searchKeyword}
                inputType="text"
                isRequired={false}
                type="input"
                disabled={false}
                valueChange={(keyword) => setSearchKeyword(keyword)}
              />
            </div>
          </div>
        ) : ""}
        <div className="nav-item">
          <div className="dropdown custom-dropdown">
            <button className="button-avatar dropdown-toggle" data-bs-toggle="dropdown">
              <img src="../backend/assets/image/user login image.png" alt="profile_image" />
            </button>
            <ul className="dropdown-menu">
              <li><a className="dropdown-item" href="/profile">Thông tin người dùng</a></li>
              <li><a className="dropdown-item" href="/logout">Đăng xuất</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  )
})