import { FC, useEffect, useRef, useState } from "react";
import { Helmet } from "react-helmet";
import { AdminSidebar } from "../../components/common/AdminSidebar";
import { NavbarHandles, PageNavbar } from "../../components/common/PageNavbar";
import { CustomModal, CustomModalHandles } from "../../components/common/CustomModal";
import { apiGetDoctorAppt } from "../../helpers/axios";
import { useToast } from "../../components/common/CustomToast";
import { convertISOToDateTime, getItemTypeName } from "../../helpers/utils";
import { DoctorSidebar } from "../../components/common/DoctorSidebar";
import { UserSession } from "../../helpers/global";

export type ApptListType = {
  appt_id: string,
  doctor_id: string;
  doctor_name: string;
  patient_id: string;
  patient_name: string;
  faculty_id: string;
  faculty_name: string;
  appt_fee: string;
  appt_datetime: string;
};



export const DoctorAppointment: FC = () => {
  const {openToast} = useToast();

  const navbarRef = useRef<NavbarHandles>(null);
  const [searchKeyword, setSearchKeyword] = useState<string>("");
  const [apptList, setApptList] = useState<ApptListType[]>([]);
  const [apptListFiltered, setApptListFiltered] = useState<ApptListType[]>([]);

  const pageTerm = "Lịch đặt hẹn khám";

  useEffect(() => {
    getApptList();
  }, [])

  const getApptList = async() => {
    if(UserSession) {
      const getAppt = await apiGetDoctorAppt(UserSession.auth_user_id);
      if(getAppt.error) {
        openToast("error", "Lỗi", "Đã xảy ra lỗi khi lấy lịch đặt hẹn khám!", 5000);
      } else if (getAppt.data) {
        setApptList(getAppt.data);
      }
    }
  }
  const searchAppt = () => {
    if(searchKeyword) {
      const searchKeywordLower = searchKeyword.toLowerCase();
      const filterList = apptList.filter(appt => appt.appt_id.toLowerCase().includes(searchKeywordLower));
      setApptListFiltered(filterList);
    } else { 
      setApptListFiltered(apptList);
    }
  }
  useEffect(() => {
    searchAppt();
  }, [apptList, searchKeyword])

  return (
    <>
      <Helmet>
        <title>
          {pageTerm} - HKL
        </title>
      </Helmet>

      <div className="main-background">
        <div className="page-container">
          <div className="page-sidebar">
            <DoctorSidebar selectedItem={"appointment"} />
          </div>
          <div className="page-content">
            <PageNavbar
              navbarTitle={`${pageTerm}`}
              searchRequest={(keyword) => {setSearchKeyword(keyword)}}
              ref={navbarRef}
            />
            <div className="content">
              <div className="hms-table">
                <div className="table-header">
                  <div className="header-title">Thông tin {pageTerm} trên hệ thống</div>
                </div>
                <div className="table-body">
                  <table>
                    <thead>
                      <tr>
                        <th style={{ width: "120px" }}>Bác sỹ</th>
                        <th style={{ width: "120px" }}>Bệnh nhân</th>
                        <th style={{ width: "100px" }}>Chuyên khoa</th>
                        <th style={{ width: "120px" }}>Ngày hẹn</th>
                        <th style={{ width: "100px" }}>Thành tiền</th>
                      </tr>
                    </thead>
                    <tbody>
                      {apptListFiltered.map((appt) => (
                        <tr key={appt.appt_id}>
                          <td>{appt.doctor_name}</td>
                          <td>{appt.patient_name}</td>
                          <td>{appt.faculty_name}</td>
                          <td>{convertISOToDateTime(appt.appt_datetime)}</td>
                          <td>{appt.appt_fee}</td>
                        </tr>
                      ))}
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </>
  )
}