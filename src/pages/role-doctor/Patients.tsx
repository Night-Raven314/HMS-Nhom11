import { FC, useEffect, useRef, useState } from "react";
import { Helmet } from "react-helmet";
import { NavbarHandles, PageNavbar } from "../../components/common/PageNavbar";
import { CustomModal, CustomModalHandles } from "../../components/common/CustomModal";
import { apiGetDoctorPatients } from "../../helpers/axios";
import { useToast } from "../../components/common/CustomToast";
import { convertISOToDateTime, getGenderName, getItemTypeName } from "../../helpers/utils";
import { DoctorSidebar } from "../../components/common/DoctorSidebar";
import { UserSession } from "../../helpers/global";

export type PatientListType = {
  doctor_id: string;
  doctor_name: string;
  patient_id: string;
  patient_name: string;
  fac_id: string;
  fac_name: string;
  contact_no: string;
  gender: string;
  med_note: string;
};

export const DoctorPatients: FC = () => {
  const {openToast} = useToast();

  const navbarRef = useRef<NavbarHandles>(null);
  const [searchKeyword, setSearchKeyword] = useState<string>("");
  const [patientList, setPatientList] = useState<PatientListType[]>([]);
  const [patientListFiltered, setPatientListFiltered] = useState<PatientListType[]>([]);

  const pageTerm = "Quản lý bệnh nhân";

  useEffect(() => {
    getPatientList();
  }, [])

  const getPatientList = async() => {
    if(UserSession) {
      const getPatient = await apiGetDoctorPatients(UserSession.auth_user_id);
      if(getPatient.error) {
        openToast("error", "Lỗi", "Đã xảy ra lỗi khi lấy danh sách bệnh nhân!", 5000);
      } else if (getPatient.data) {
        let tmpPatientList:PatientListType[] = [];
        getPatient.data.forEach((patient:PatientListType) => {
          const findExistingPatient = tmpPatientList.find(tmpPatient => tmpPatient.patient_id === patient.patient_id);
          if(!findExistingPatient) {
            tmpPatientList.push(patient);
          }
        })
        setPatientList(getPatient.data);
      }
    }
  }
  const searchPatient = () => {
    if(searchKeyword) {
      const searchKeywordLower = searchKeyword.toLowerCase();
      const filterList = patientList.filter(patient => patient.patient_id.toLowerCase().includes(searchKeywordLower));
      setPatientListFiltered(filterList);
    } else {
      setPatientListFiltered(patientList);
    }
  }
  useEffect(() => {
    searchPatient();
  }, [patientList, searchKeyword])

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
            <DoctorSidebar selectedItem={"patients"} />
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
                  <div className="header-title">Danh sách bệnh nhân đã khám trên khoa</div>
                </div>
                <div className="table-body">
                  <table>
                    <thead>
                      <tr>
                        <th style={{ width: "120px" }}>Bệnh nhân</th>
                        <th style={{ width: "120px" }}>Số điện thoại</th>
                        <th style={{ width: "50px" }}>Giới tính</th>
                        <th style={{ width: "120px" }}>Bác sỹ khám lần cuối</th>
                        <th style={{ width: "100px" }}>Chuyên khoa</th>
                        <th style={{ width: "200px" }}>Ghi chú</th>
                      </tr>
                    </thead>
                    <tbody>
                      {patientListFiltered.map((patient, index) => (
                        <tr key={index}>
                          <td>{patient.patient_name}</td>
                          <td>{patient.contact_no}</td>
                          <td>{getGenderName(patient.gender)}</td>
                          <td>{patient.doctor_name}</td>
                          <td>{patient.fac_name}</td>
                          <td>{patient.med_note}</td>
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