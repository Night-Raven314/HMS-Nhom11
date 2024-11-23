import { FC, useEffect, useRef, useState } from "react";
import { Helmet } from "react-helmet";
import { DoctorSidebar } from "../components/common/DoctorSidebar";
import { PageNavbar } from "../components/common/PageNavbar";
import { UserSession } from "../helpers/global";
import { UserAccountType } from "../helpers/types";
import { useParams } from "react-router-dom";
import { useToast } from "../components/common/CustomToast";
import { PatientLogType } from "./PatientInfo";
import { apiCompleteTreatment, apiGetMedHistList, apiGetPatientLog, apiGetUserAccount, apiUpdateMedHist } from "../helpers/axios";
import { faCalendar, faNotesMedical, faUserDoctor, faHospital, faArrowsRotate, faNoteSticky, faTrash } from "@fortawesome/free-solid-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { convertISOToDateTime } from "../helpers/utils";
import { Formik, FormikProps, Form } from "formik";
import { CustomInput } from "../components/common/CustomInput";
import { CustomModal, CustomModalHandles } from "../components/common/CustomModal";
import { PrescriptionTable } from "../components/pages/PatientLog/Prescription";
import { ServiceTable } from "../components/pages/PatientLog/Service";

export type MedHistList = {
  med_hist_id: string;
  doctor_id: string;
  doctor_name: string;
  patient_id: string;
  patient_name: string;
  fac_id: string;
  fac_name: string;
  contact_no: string;
  email_address: string;
  address: string;
  city: string;
  gender: string;
  blood_press: string;
  blood_sugar: string | null;
  spo2: string;
  weight: string;
  height: string;
  temp: string;
  med_note: string;
  created_at: string;
};


export type MedHistForm = {
  weight?: string,
  height?: string,
  temp?: string,
  spo2?: string,
  blood_press?: string,
  med_note?: string,
}
export type MedHistRequestType = MedHistForm & {
  action: string,
  med_hist_id?: string,
  ptn_log_id?: string,
  doctor_id?:string,
  patient_id?:string
}

export const PatientLog:FC = () => {
  const {openToast} = useToast();
  const {patientLogId} = useParams();

  const confirmCompleteModalRef = useRef<CustomModalHandles>(null);
  const medHistTableRef = useRef<HTMLTableSectionElement | null>(null);
  const presTableRef = useRef<HTMLDivElement | null>(null);

  const [userInfo, setUserInfo] = useState<UserAccountType | null>(null);
  const [patientLog, setPatientLog] = useState<PatientLogType | null>(null);

  const [medHistList, setMedHistList] = useState<MedHistList[]>([]);
  const [selectedMedHistId, setSelectedMedHistId] = useState<string | null>(null);

  // Modal med hist
  const medHistDeleteModalRef = useRef<CustomModalHandles>(null);
  const medHistModalRef = useRef<CustomModalHandles>(null);
  const medHistFormRef = useRef<FormikProps<MedHistForm>>(null);
  const [updateMedHistId, setUpdateMedHistId] = useState<string | null>();
  const [medHistInitial, setMedHistInitial] = useState<MedHistForm>({
    weight: "",
    height: "",
    temp: "",
    spo2: "",
    blood_press: "",
    med_note: "",
  })
  const medHistValidate = (value: MedHistForm) => {
    let errors: MedHistForm = {};
    if (!value.weight) {
      errors.weight = " ";
    }
    if (!value.height) {
      errors.height = " ";
    }
    if (!value.spo2) {
      errors.spo2 = " ";
    }
    if (!value.temp) {
      errors.temp = " ";
    }
    if (!value.blood_press) {
      errors.blood_press = " ";
    }
    return errors;
  }
  const toggleMedHistModal = (action: string, medHistId?:string) => {
    setUpdateMedHistId(medHistId ? medHistId : null);
    switch (action) {
      case "open":
        medHistFormRef.current?.resetForm();
        setMedHistInitial({
          weight: "",
          height: "",
          temp: "",
          blood_press: "",
          med_note: "",
        })
        medHistModalRef?.current?.openModal();
        break;
      case "openDelete":
        medHistDeleteModalRef?.current?.openModal();
        break;
      case "close":
        medHistModalRef?.current?.closeModal();
        medHistDeleteModalRef?.current?.closeModal();
        break;

      default:
        break;
    }
  }

  const handleClickOutside = (event:MouseEvent) => {
    if(
      medHistTableRef.current && !medHistTableRef.current.contains(event.target as Node) &&
      presTableRef.current && !presTableRef.current.contains(event.target as Node)
    ) {
      setSelectedMedHistId(null);
    }
  }
  // ------------------------------

  const getPatientInfo = async() => {
    if(patientLog && patientLog.patient_id) {
      const resultUser = await apiGetUserAccount(patientLog.patient_id);
      if(resultUser.error) {
        openToast("error", "Lỗi", "Đã xảy ra lỗi khi lấy thông tin!", 5000);
      } else if (resultUser.data) {
        const userData:UserAccountType = resultUser.data[0];
        setUserInfo(userData);
      }
    }
  }
  const getPatientLog = async() => {
    if(patientLogId) {
      const resultLog = await apiGetPatientLog(patientLogId);
      if(resultLog.error) {
        openToast("error", "Lỗi", "Đã xảy ra lỗi khi lấy thông tin!", 5000);
      } else if (resultLog.data) {
        setPatientLog(resultLog.data[0]);
      }
    }
  }

  // Med hist
  const getMedHistList = async() => {
    if(patientLogId) {
      const result = await apiGetMedHistList(patientLogId);
      if(result.error) {
        openToast("error", "Lỗi", "Đã xảy ra lỗi khi lấy thông tin!", 5000);
      } else if (result.data) {
        setMedHistList(result.data)
      }
    }
  }
  const submitUpdateMedHist = async(value:MedHistForm, action:string) => {
    if(patientLogId && patientLog) {
      const userRequest: MedHistRequestType = {
        ...value,
        action: action,
        ptn_log_id: patientLogId,
        doctor_id: patientLog.doctor_id,
        patient_id: patientLog.patient_id
      }
      const updateResponse = await apiUpdateMedHist(userRequest);
      if(updateResponse.error) {
        openToast("error", "Lỗi", "Đã xảy ra lỗi khi lưu thông tin!", 5000);
      } else if (updateResponse.data) {
        openToast("success", "Thành công", "Đã thêm thông tin sức khoẻ", 5000);
        toggleMedHistModal("close");
        getPatientLog();
        getMedHistList();
      }
    }
  }
  const deleteMedHist = async() => {
    if(updateMedHistId) {
      const userRequest: MedHistRequestType = {
        action: "delete",
        med_hist_id: updateMedHistId
      }
      const updateResponse = await apiUpdateMedHist(userRequest);
      if(updateResponse.error) {
        openToast("error", "Lỗi", "Đã xảy ra lỗi khi xoá thông tin!", 5000);
      } else if (updateResponse.data) {
        openToast("success", "Thành công", "Đã xoá thông tin sức khoẻ", 5000);
        setSelectedMedHistId(null);
        toggleMedHistModal("close");
        getMedHistList();
      }
    }
  }

  const completeTreatment = async() => {
    if(patientLog) {
      const result = await apiCompleteTreatment(patientLog.ptn_log_id);
      if(result.error) {
        openToast("error", "Lỗi", "Đã xảy ra lỗi đánh dấu hoàn thành!", 5000);
      } else if (result.data) {
        getPatientLog();
        confirmCompleteModalRef.current?.closeModal();
      }
    }
  }

  useEffect(() => {
    getPatientLog();
    getMedHistList();
    document.addEventListener('mousedown', handleClickOutside);
    return () => {
      document.removeEventListener('mousedown', handleClickOutside);
    };
  }, [])
  useEffect(() => {
    if(patientLog) {
      getPatientInfo();
    }
  }, [patientLog])
  
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
              <div className="hms-log-container">
                <div className="hms-container">
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
                        <button className="btn btn-gradient" disabled={patientLog && patientLog.status === "completed" ? true : false} onClick={() => {confirmCompleteModalRef.current?.openModal()}}>{patientLog && patientLog.status === "completed" ? "Đã hoàn thành" : "Hoàn thành"} điều trị</button>
                      </div>
                    </div>
                  ) : ""}
                  {patientLog ? (
                    <div className="patient-log-list no-floating">
                      <div className="log-item">

                        <div className="item-info-container">
                          <div className="row">
                            <div className="col-md-3 info-container">
                              <div className="info-icon">
                                <FontAwesomeIcon icon={faCalendar} />
                              </div>
                              <div className="info-text">
                                <div className="text-title">Ngày tạo</div>
                                <div className="text-desc">{convertISOToDateTime(patientLog.start_datetime)}</div>
                              </div>
                            </div>
                            <div className="col-md-3 info-container">
                              <div className="info-icon">
                                <FontAwesomeIcon icon={faNotesMedical} />
                              </div>
                              <div className="info-text">
                                <div className="text-title">Chuyên khoa</div>
                                <div className="text-desc">{patientLog.fac_name}</div>
                              </div>
                            </div>
                            <div className="col-md-3 info-container">
                              <div className="info-icon">
                                <FontAwesomeIcon icon={faUserDoctor} />
                              </div>
                              <div className="info-text">
                                <div className="text-title">Bác sỹ khám ban đầu</div>
                                <div className="text-desc">{patientLog.full_name}</div>
                              </div>
                            </div>
                            <div className="col-md-3 info-container">
                              <div className="info-icon">
                                <FontAwesomeIcon icon={faHospital} />
                              </div>
                              <div className="info-text">
                                <div className="text-title">Loại hình điều trị</div>
                                <div className="text-desc">{Number(patientLog.is_inpatient) ? "Nội trú" : "Ngoại trú"}</div>
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
                            {patientLog.med_note ? (
                              <div className="col-md-9 info-container">
                                <div className="info-icon">
                                  <FontAwesomeIcon icon={faNoteSticky} />
                                </div>
                                <div className="info-text">
                                  <div className="text-title">Ghi chú gần nhất</div>
                                  <div className="text-desc">{patientLog.med_note}</div>
                                </div>
                              </div>
                            ) : ""}
                          </div>
                        </div>

                      </div>
                    </div>
                  ) : ""}
                </div>
                <div className="patient-log-grid">
                  <div className="grid-med-hist">
                    <div className="hms-table">
                      <div className="table-header">
                        <div className="header-title">Lịch sử kiểm tra sức khoẻ</div>
                        <div className="header-button">
                          {patientLog && patientLog.status !== "completed" ? (
                            <button className="btn btn-outline-primary btn-sm" onClick={() => toggleMedHistModal("open")}>
                            Tạo
                          </button>
                          ) : ""}
                        </div>
                      </div>
                      <div className="table-body">
                        <table>
                          <thead>
                            <tr>
                              <th style={{ width: "75px" }}>Cân nặng</th>
                              <th style={{ width: "75px" }}>Chiều cao</th>
                              <th style={{ width: "75px" }}>Nhiệt độ</th>
                              <th style={{ width: "75px" }}>Huyết áp</th>
                              <th style={{ width: "75px" }}>SpO2</th>
                              <th style={{ width: "140px" }}>Ngày kiểm tra</th>
                              <th style={{ width: "200px" }}>Ghi chú</th>
                              {patientLog && patientLog.status !== "completed" ? (
                                <th style={{ width: "50px" }}>Thao tác</th>
                              ) : ""}
                            </tr>
                          </thead>
                          <tbody ref={medHistTableRef}>
                            {medHistList.map((item) => (
                              <tr
                                key={item.med_hist_id}
                                style={{cursor: "pointer"}}
                                className={`${selectedMedHistId === item.med_hist_id ? "selected" : ""}`}
                                onClick={() => setSelectedMedHistId(item.med_hist_id)}
                              >
                                <td>{item.weight} kg</td>
                                <td>{item.height} cm</td>
                                <td>{item.temp}°C</td>
                                <td>{item.blood_press} mmHg</td>
                                <td>{item.spo2}%</td>
                                <td>{convertISOToDateTime(item.created_at)}</td>
                                <td>{item.med_note}</td>
                                {patientLog && patientLog.status !== "completed" ? (
                                  <td>
                                    <div className="table-button-list">
                                      <button onClick={() => {toggleMedHistModal("openDelete", item.med_hist_id)}}>
                                        <FontAwesomeIcon icon={faTrash} />
                                      </button>
                                    </div>
                                  </td>
                                ) : ""}
                              </tr>
                            ))}
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>

                  <div className="grid-pres" ref={presTableRef}>
                    <PrescriptionTable
                      selectedMedHistId={selectedMedHistId}
                      treatmentCompleted={patientLog && patientLog.status === "completed" ? true : false}
                    />
                  </div>

                  <div className="grid-service">
                    {patientLog ? (
                      <ServiceTable
                        patientLog={patientLog}
                        requestReload={() => getPatientLog()}
                      />
                    ) : ""}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <CustomModal
        headerTitle={`Kiểm tra sức khoẻ`}
        size="lg"
        type="modal"
        ref={medHistModalRef}
      >
        <Formik
          validateOnChange={true}
          validateOnBlur={true}
          enableReinitialize={true}
          initialValues={medHistInitial}
          validate={medHistValidate}
          innerRef={medHistFormRef}
          onSubmit={(values) => {
            submitUpdateMedHist(values, "create")
          }}
        >
          {(formikProps) => {
            return (
              <Form>
                <div className="body-content">
                  <div className="row">
                    <div className="col-md-2">
                      <CustomInput
                        formik={formikProps}
                        id="weight"
                        name="weight"
                        label="Cân nặng"
                        placeholder="Nhập cân nặng"
                        initialValue=""
                        inputType="text"
                        isRequired={true}
                        type="input"
                        disabled={false}
                      />
                    </div>
                    <div className="col-md-2">
                      <CustomInput
                        formik={formikProps}
                        id="height"
                        name="height"
                        label="Chiều cao"
                        placeholder="Nhập chiều cao"
                        initialValue=""
                        inputType="text"
                        isRequired={true}
                        type="input"
                        disabled={false}
                      />
                    </div>
                    <div className="col-md-2">
                      <CustomInput
                        formik={formikProps}
                        id="spo2"
                        name="spo2"
                        label="SpO2"
                        placeholder="Nhập SpO2"
                        initialValue=""
                        inputType="text"
                        isRequired={true}
                        type="input"
                        disabled={false}
                      />
                    </div>
                    <div className="col-md-2">
                      <CustomInput
                        formik={formikProps}
                        id="temp"
                        name="temp"
                        label="Nhiệt độ"
                        placeholder="Nhập nhiệt độ"
                        initialValue=""
                        inputType="text"
                        isRequired={true}
                        type="input"
                        disabled={false}
                      />
                    </div>
                    <div className="col-md-4">
                      <CustomInput
                        formik={formikProps}
                        id="blood_press"
                        name="blood_press"
                        label="Huyết áp"
                        placeholder="Nhập huyết áp"
                        initialValue=""
                        inputType="text"
                        isRequired={true}
                        type="input"
                        disabled={false}
                      />
                    </div>
                    <div className="col-md-12">
                      <CustomInput
                        formik={formikProps}
                        id="med_note"
                        name="med_note"
                        label="Ghi chú"
                        placeholder="Nhập ghi chú"
                        initialValue=""
                        inputType="text"
                        isRequired={false}
                        type="textarea"
                        textareaRow={2}
                        disabled={false}
                      />
                    </div>
                  </div>
                </div>
                <div className="body-footer">
                  <div className="button-list">
                    <button type="button" className="btn btn-outline" onClick={() => toggleMedHistModal("close")}>Thoát</button>
                    <button type="submit" name="create" value="create" className="btn btn-gradient">Tạo</button>
                  </div>
                </div>
              </Form>
            )
          }}
        </Formik>
      </CustomModal>

      {/* Alert xoá med hist */}
      <CustomModal
        headerTitle={"Xoá thông tin"}
        size="md"
        type="alert"
        ref={medHistDeleteModalRef}
      >
        <div className="body-content">
          Bạn có chắc chắn muốn xoá thông tin kiểm tra sức khoẻ này? Thông tin đơn thuốc kèm theo thông tin kiểm tra sức khoẻ này cũng sẽ bị xoá.
        </div>
        <div className="body-footer">
          <div className="button-list">
            <button type="button" className="btn btn-outline" onClick={() => toggleMedHistModal("close")}>Không</button>
            <button type="button" className="btn btn-gradient" onClick={() => deleteMedHist()}>Xoá</button>
          </div>
        </div>
      </CustomModal>

      {/* Alert confirm hoàn thành điều trị */}
      <CustomModal
        headerTitle={"Hoàn thành điều trị?"}
        size="md"
        type="alert"
        ref={confirmCompleteModalRef}
      >
        <div className="body-content">
          Bạn có chắc chắn muốn đánh dấu hồ sơ khám bệnh này đã hoàn thành điều trị? Bạn sẽ không thể chỉnh sửa hồ sơ này sau khi hoàn thành điều trị.
        </div>
        <div className="body-footer">
          <div className="button-list">
            <button type="button" className="btn btn-outline" onClick={() => toggleMedHistModal("close")}>Không</button>
            <button type="button" className="btn btn-gradient" onClick={() => completeTreatment()}>Chắc chắn</button>
          </div>
        </div>
      </CustomModal>

    </>
  )
}