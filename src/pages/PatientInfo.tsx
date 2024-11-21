import { FC, useEffect, useState } from "react";
import { Helmet } from "react-helmet";
import { DoctorSidebar } from "../components/common/DoctorSidebar";
import { PageNavbar } from "../components/common/PageNavbar";
import { convertISOToDateTime } from "../helpers/utils";
import { UserSession } from "../helpers/global";
import { CustomInput } from "../components/common/CustomInput";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { faArrowRotateBack, faArrowsRotate, faCalendar, faChevronRight, faHospital, faMoneyBill, faNotesMedical, faNoteSticky, faUserDoctor } from "@fortawesome/free-solid-svg-icons";
import { Link, useParams } from "react-router-dom";
import { UserAccountType } from "../helpers/types";
import { apiGetFaculty, apiGetPatientLogList, apiGetUserAccount, apiUpdatePatientLog, UpdatePatientLogType } from "../helpers/axios";
import { useToast } from "../components/common/CustomToast";
import { FacultyListType } from "./role-admin/Faculty";

export type PatientLogType = {
  ptn_log_id: string;
  patient_id: string;
  doctor_id: string;
  full_name: string;
  faculty_id: string;
  fac_name: string;
  is_inpatient: string;
  med_note: string | null;
  start_datetime: string;
  end_datetime: string | null;
  status: string;
};

export const PatientInfo:FC = () => {
  const {openToast} = useToast();
  const {patientId} = useParams();
  const [userInfo, setUserInfo] = useState<UserAccountType | null>(null);
  const [patientLogList, setPatientLogList] = useState<PatientLogType[]>([]);

  const getPatientInfo = async() => {
    if(patientId) {
      const resultUser = await apiGetUserAccount(patientId);
      if(resultUser.error) {
        openToast("error", "Lỗi", "Đã xảy ra lỗi khi lấy thông tin!", 5000);
      } else if (resultUser.data) {
        const userData:UserAccountType = resultUser.data[0];
        setUserInfo(userData);
      }
    }
  }
  const getPatientLogList = async() => {
    if(patientId) {
      const resultLog = await apiGetPatientLogList(patientId);
      if(resultLog.error) {
        openToast("error", "Lỗi", "Đã xảy ra lỗi khi lấy thông tin!", 5000);
      } else if (resultLog.data) {
        setPatientLogList(resultLog.data);
      }
    }
  }

  useEffect(() => {
    getPatientInfo();
    getPatientLogList();
  }, [])

  const createPatientLog = async() => {
    if(patientId && UserSession) {
      const request:UpdatePatientLogType = {
        patient_id: patientId,
        faculty_id: UserSession.faculty_id,
        auth_user_id: UserSession.auth_user_id,
        is_inpatient: 0,
        action: "create"
      }
      const resultUser = await apiUpdatePatientLog(request);
      if(resultUser.error) {
        openToast("error", "Lỗi", "Đã xảy ra lỗi khi tạo hồ sơ khám!", 5000);
      } else if (resultUser.data) {
        openToast("success", "Thành công", "Đã tạo hồ sơ khám mới!");
        getPatientLogList();
      }
    }
  }

  return (
    <>
      <Helmet>
        <title>
          Thông tin bệnh nhân - HKL
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
              navbarTitle={`Thông tin bệnh nhân`}
              searchRequest={() => {}}
              hideSearch={true}
            />
            <div className="content">
              <div className="hms-page">
                {userInfo ? (
                  <div className="profile-user-container">
                    <div className="user-avatar">
                      <img src="/image/default-avatar.png" />
                    </div>
                    <div className="user-info">
                      <div className="info-name">{userInfo.full_name}</div>
                      {/* <div className="info-desc">69 tuổi</div> */}
                    </div>
                    <div className="user-action">
                      <button className="btn btn-gradient" onClick={() => {createPatientLog()}}>Tạo hồ sơ khám</button>
                    </div>
                  </div>
                ) : ""}
                <div className="title-container-with-action">
                  <div className="title-text">Hồ sơ khám</div>
                  {/* <div className="title-action">
                    <CustomInput
                      id="month"
                      name="month"
                      label="Tháng"
                      placeholder=""
                      initialValue=""
                      inputType="text"
                      isRequired={false}
                      selectOptions={[
                        {value: "11/2024", label: "Tháng 11, 2024"}
                      ]}
                      type="select"
                      disabled={false}
                    />
                  </div> */}
                </div>
                <div className="patient-log-list">
                  
                  {patientLogList.map(log => (
                    <Link to={`/patient-log/${log.ptn_log_id}`}>
                      <div className="log-item">

                        <div className="item-info-container">
                          <div className="row">
                            <div className="col-md-3 info-container">
                              <div className="info-icon">
                                <FontAwesomeIcon icon={faCalendar} />
                              </div>
                              <div className="info-text">
                                <div className="text-title">Ngày tạo</div>
                                <div className="text-desc">{convertISOToDateTime(log.start_datetime)}</div>
                              </div>
                            </div>
                            <div className="col-md-3 info-container">
                              <div className="info-icon">
                                <FontAwesomeIcon icon={faNotesMedical} />
                              </div>
                              <div className="info-text">
                                <div className="text-title">Chuyên khoa</div>
                                <div className="text-desc">{log.fac_name}</div>
                              </div>
                            </div>
                            <div className="col-md-3 info-container">
                              <div className="info-icon">
                                <FontAwesomeIcon icon={faUserDoctor} />
                              </div>
                              <div className="info-text">
                                <div className="text-title">Bác sỹ khám ban đầu</div>
                                <div className="text-desc">{log.full_name}</div>
                              </div>
                            </div>
                            <div className="col-md-3 info-container">
                              <div className="info-icon">
                                <FontAwesomeIcon icon={faHospital} />
                              </div>
                              <div className="info-text">
                                <div className="text-title">Loại hình điều trị</div>
                                <div className="text-desc">{Number(log.is_inpatient) ? "Nội trú" : "Ngoại trú"}</div>
                              </div>
                            </div>
                            <div className="col-md-3 info-container">
                              <div className="info-icon">
                                <FontAwesomeIcon icon={faArrowsRotate} />
                              </div>
                              <div className="info-text">
                                <div className="text-title">Trạng thái</div>
                                <div className="text-desc">Đang điều trị</div>
                              </div>
                            </div>
                            {log.med_note ? (
                              <div className="col-md-9 info-container">
                                <div className="info-icon">
                                  <FontAwesomeIcon icon={faNoteSticky} />
                                </div>
                                <div className="info-text">
                                  <div className="text-title">Ghi chú gần nhất</div>
                                  <div className="text-desc">{log.med_note}</div>
                                </div>
                              </div>
                            ) : ""}
                          </div>
                        </div>

                        <div className="item-arrow">
                          <FontAwesomeIcon icon={faChevronRight} />
                        </div>

                      </div>
                    </Link>
                  ))}
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </>
  )
}