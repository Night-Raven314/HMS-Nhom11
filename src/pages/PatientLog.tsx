import { FC } from "react";
import { Helmet } from "react-helmet";
import { DoctorSidebar } from "../components/common/DoctorSidebar";
import { PageNavbar } from "../components/common/PageNavbar";
import { UserSession } from "../helpers/global";

export const PatientLog:FC = () => {
  return (
    <>
      <Helmet>
        <title>
          Hồ sơ khám bệnh - HKL
        </title>
      </Helmet>

      <div className="main-background">
        <div className="page-container">
          <div className="page-sidebar">
            {UserSession?.auth_user_role === "doctor" ? (
              <DoctorSidebar selectedItem={""} />
            ) : ""}
          </div>
          <div className="page-content">
            <PageNavbar
              navbarTitle={`Hồ sơ khám bệnh`}
              searchRequest={() => {}}
              hideSearch={true}
            />
            <div className="content">
              
            </div>
          </div>
        </div>
      </div>

    </>
  )
}