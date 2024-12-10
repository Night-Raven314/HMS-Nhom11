import { FC } from "react";
import { PageNavbar } from "../../components/common/PageNavbar";
import { AdminSidebar } from "../../components/common/AdminSidebar";
import { Helmet } from "react-helmet";

export const AdminDownloadReports:FC = () => {
  return (
    <>
      <Helmet>
        <title>
          Tải về báo cáo - HKL
        </title>
      </Helmet>

      <div className="main-background">
        <div className="page-container">
          <div className="page-sidebar">
            <AdminSidebar selectedItem={"download-reports"} />
          </div>
          <div className="page-content">
            <PageNavbar
              navbarTitle={`Tải về báo cáo`}
              searchRequest={() => {}}
            />
            <div className="content">
              <div className="hms-table">
                <div className="table-header">
                  <div className="header-title">Tải</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </>
  )
}