import { FC } from "react";
import { Helmet } from "react-helmet";
import { AdminSidebar } from "../components/common/AdminSidebar";
import { PageNavbar } from "../components/common/PageNavbar";

export const ProfilePage:FC = () => {
  return (
    <>
      <Helmet>
        <title>
          Thông tin tài khoản - HKL
        </title>
      </Helmet>
      <div className="main-background">
        <div className="page-container">
          <div className="page-sidebar">
            <AdminSidebar selectedItem="" />
          </div>
          <div className="page-content">
            <PageNavbar
              navbarTitle={`Thông tin tài khoản`}
              hideSearch={true}
              searchRequest={() => {}}
            />
            <div className="content">
              
            </div>
          </div>
        </div>
      </div>  
    </>
  )
}