import { FC, useEffect, useRef, useState } from "react";
import { Helmet } from "react-helmet";
import { AdminSidebar } from "../../components/common/AdminSidebar";
import { NavbarHandles, PageNavbar } from "../../components/common/PageNavbar";
import { CustomModal, CustomModalHandles } from "../../components/common/CustomModal";
import { apiGetAvailDoctor, apiGetPatientAppt, apiGetFaculty, apiUpdatePatientAppt, apiCreatePayment, apiGetLastApptId } from "../../helpers/axios";
import { useToast } from "../../components/common/CustomToast";
import { convertISOToDateTime, apptStatusName, getItemTypeName, getPaymentStatus } from "../../helpers/utils";
import { DoctorSidebar } from "../../components/common/DoctorSidebar";
import { UserSession } from "../../helpers/global";
import { useNavigate } from "react-router-dom";
import { PatientSidebar } from "../../components/common/PatientSidebar";
import { Form, Formik, FormikProps } from "formik";
import { CustomInput, SelectOptionType } from "../../components/common/CustomInput";
import { format } from "date-fns";
import { FacultyListType } from "../role-admin/Faculty";
import { ApptListType } from "../role-doctor/Appointment";
import { faPenToSquare, faTrash } from "@fortawesome/free-solid-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { CreatePaymentRequestType } from "../PatientLog";

export type ApptFormType = {
  doctor_id?: string,
  faculty_id?: string,
  appt_datetime?: string
}
export type ApptRequestType = ApptFormType & {
  action: string,
  appt_id?: string,
  appt_fee?: string
  auth_user_id?: string
}
type AvailDoctorType = {
  doctor_id: string;
  doctor_name: string;
  fac_pricing: string;
}

export const PatientAppointment: FC = () => {
  const {openToast} = useToast();
  const navigate = useNavigate();

  const navbarRef = useRef<NavbarHandles>(null);
  const [searchKeyword, setSearchKeyword] = useState<string>("");
  const [apptList, setApptList] = useState<ApptListType[]>([]);
  const [facultyOptions, setFacultyOptions] = useState<SelectOptionType[]>([]);
  const [apptListFiltered, setApptListFiltered] = useState<ApptListType[]>([]);

  // Handle faculty/doctor selection
  const [availableDoctor, setAvailableDoctor] = useState<SelectOptionType[]>([]);
  const [availableDoctorList, setAvailableDoctorList] = useState<AvailDoctorType[]>([]);

  const [updateApptId, setUpdateApptId] = useState<string | null>();
  const deleteApptModalRef = useRef<CustomModalHandles>(null);
  const apptModalRef = useRef<CustomModalHandles>(null);
  const successNoPaymentApptModalRef = useRef<CustomModalHandles>(null);
  const successPaymentApptModalRef = useRef<CustomModalHandles>(null);
  const apptFormRef = useRef<FormikProps<ApptFormType>>(null);
  const [initialValue, setInitialValue] = useState<ApptFormType>({
    doctor_id: "",
    faculty_id: "",
    appt_datetime: ""
  })
  const validate = (value: ApptFormType) => {
    let errors: ApptFormType = {};
    if (!value.doctor_id) {
      errors.doctor_id = "Hãy chọn bác sỹ!";
    }
    if (!value.faculty_id) {
      errors.faculty_id = "Hãy chọn chuyên khoa!";
    }
    if (!value.appt_datetime) {
      errors.appt_datetime = "Hãy chọn ngày giờ!";
    }
    return errors;
  }
  const toggleModal = (action: string, apptId?:string) => {
    const clearForm = () => {
      setAvailableDoctor([]);
      setAvailableDoctorList([]);
      setInitialValue({
        doctor_id: "",
        faculty_id: "",
        appt_datetime: ""
      })
    }
    if (apptModalRef.current) {
      switch (action) {
        case "openDelete":
          setUpdateApptId(apptId ? apptId : null);
          if(apptId) {
            deleteApptModalRef.current?.openModal();
          }
          break;
        case "closeDelete":
          deleteApptModalRef.current?.closeModal();
          break;
        case "closeConfirm":
          successNoPaymentApptModalRef.current?.closeModal();
          successPaymentApptModalRef.current?.closeModal();
          break;
        case "open":
          apptFormRef.current?.resetForm();
          setUpdateApptId(apptId ? apptId : null);
          if(apptId) {
            const findAppt = apptList.find(appt => appt.appt_id === apptId);
            if(findAppt) {
              setInitialValue({
                doctor_id: findAppt.doctor_id,
                faculty_id: findAppt.faculty_id,
                appt_datetime: format(new Date(findAppt.appt_datetime), "yyyy-MM-dd'T'HH:mm")
              })
              getAvailDoctor(findAppt.faculty_id, findAppt.appt_datetime);
            } else {
              clearForm();
            }
          } else {
            clearForm();
          }
          apptModalRef.current.openModal();
          break;
        case "close":
          apptModalRef.current.closeModal();
          break;

        default:
          break;
      }
    }
  }
  const getAvailDoctor = async(faculty_id:string, datetime: string) => {
    const getAvail = await apiGetAvailDoctor(faculty_id, new Date(datetime).toISOString());
    if(getAvail.error) {
      openToast("error", "Lỗi", "Đã xảy ra lỗi khi lấy thông tin bác sỹ!", 5000);
    } else if (getAvail.data) {
      setAvailableDoctorList(getAvail.data);
      let tmpAvailDoctor:SelectOptionType[] = [
        {
          value: "",
          label: "Chọn bác sỹ"
        }
      ];
      getAvail.data.forEach((doctor:any) => {
        tmpAvailDoctor.push({
          value: doctor.doctor_id,
          label: doctor.doctor_name
        })
      });
      setAvailableDoctor(tmpAvailDoctor)
    }
  }

  const getFacultyList = async() => {
    const getFloor = await apiGetFaculty();
    if(getFloor.error) {
      openToast("error", "Lỗi", "Đã xảy ra lỗi khi lấy thông tin chuyên khoa!", 5000);
    } else if (getFloor.data) {
      const faculty:FacultyListType[] = getFloor.data;
      let tmpFacultyOptions:SelectOptionType[] = [{
        label: "Chọn chuyên khoa",
        value: ""
      }];
      faculty.forEach(fac => {
        tmpFacultyOptions.push({
          label: fac.fac_name,
          value: fac.fac_id
        })
      })
      setFacultyOptions(tmpFacultyOptions);
    }
  }

  useEffect(() => {
    getApptList();
    getFacultyList();
  }, [])

  const getApptList = async() => {
    if(UserSession) {
      const getAppt = await apiGetPatientAppt(UserSession.auth_user_id);
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
  const submitAppt = async(value:ApptFormType, action:string) => {
    if(UserSession) {
      const findSelectedDoctor = availableDoctorList.find(doc => doc.doctor_id === value.doctor_id);
      if(findSelectedDoctor) {
        let request: ApptRequestType = {
          ...value,
          action: action,
          appt_datetime: value.appt_datetime ? new Date(value.appt_datetime).toISOString() : "",
          appt_fee: findSelectedDoctor.fac_pricing,
          auth_user_id: UserSession.auth_user_id
        }
        if(updateApptId) {
          request.appt_id = updateApptId
        }
        if(availableDoctor.length > 1) {
          const updateResponse = await apiUpdatePatientAppt(request);
          if(updateResponse.error) {
            openToast("error", "Lỗi", "Đã xảy ra lỗi khi cập nhật thông tin!", 5000);
          } else if (updateResponse.data) {
            toggleModal("close");
            openToast("success", "Thành công", updateApptId ? "Lịch hẹn đã được cập nhật" : "Đã đặt hẹn thành công!", 5000);
            getApptList();
            const getApptId = await apiGetLastApptId(UserSession.auth_user_id);
            if(getApptId.data) {
              createPayment(getApptId.data[0].appt_id, value);
            }
          }
        }
      }
    }
  }
  const createPayment = async(apptId:string, value:ApptFormType) => {
    const findSelectedDoctor = availableDoctorList.find(doc => doc.doctor_id === value.doctor_id);
    if(findSelectedDoctor && value.appt_datetime && UserSession) {
      let tmpTotalAmount = Number(findSelectedDoctor.fac_pricing);
      const request:CreatePaymentRequestType = {
        action: "appointment",
        post_id: apptId,
        total_amount: tmpTotalAmount,
        payment_desc: `Thanh toán đặt hẹn ngày ${format(new Date(value.appt_datetime), "dd/MM/yyyy")}`
      }
      const create = await apiCreatePayment(request);
      if(create.error) {
        openToast("error", "Lỗi", "Đã xảy ra lỗi xử lý!", 5000);
      } else if (create.data) {
        const getAppt = await apiGetLastApptId(UserSession.auth_user_id);
        if(getAppt.data) {
          openPaymentPage(getAppt.data[0].payment_id);
        }
      }
    }
  }
  const deleteAppt = async() => {
    if(updateApptId) {
      let request: ApptRequestType = {
        action: "delete",
        appt_id: updateApptId
      }
      if(updateApptId) {
        request.appt_id = updateApptId
      }
      const updateResponse = await apiUpdatePatientAppt(request);
      if(updateResponse.error) {
        openToast("error", "Lỗi", "Đã xảy ra lỗi khi cập nhật thông tin!", 5000);
      } else if (updateResponse.data) {
        toggleModal("closeDelete");
        const findAppt = apptList.find(appt => appt.appt_id === updateApptId);
        if(findAppt) {
          if(findAppt.payment_status === "completed") {
            successPaymentApptModalRef.current?.openModal();
          } else {
            successNoPaymentApptModalRef.current?.openModal();
          }
        }
        getApptList();
      }
    }
  }
  useEffect(() => {
    searchAppt();
  }, [apptList, searchKeyword]);

  const openPatientInfo = (userId:string) => {
    navigate(`/patient-info/${userId}`);
  }
  const openPaymentPage = (paymentId:string | undefined) => {
    navigate(`/payment/appointment/${paymentId}`);
  }

  return (
    <>
      <Helmet>
        <title>
          Đặt hẹn khám bệnh - HKL
        </title>
      </Helmet>

      {UserSession ? (
        <div className="main-background">
          <div className="page-container">
            <div className="page-sidebar">
              <PatientSidebar selectedItem={"appointment"} />
            </div>
            <div className="page-content">
              <PageNavbar
                navbarTitle={`Đặt hẹn khám bệnh`}
                searchRequest={(keyword) => {setSearchKeyword(keyword)}}
                ref={navbarRef}
              />
              <div className="content">
                <div className="hms-table">
                  <div className="table-header">
                    <div className="header-title">Lịch đặt hẹn trên hệ thống</div>
                    <div className="header-button">
                      <button className="btn btn-outline-primary btn-sm" onClick={() => {toggleModal("open")}}>
                        Đặt hẹn mới
                      </button>
                    </div>
                  </div>
                  <div className="table-body">
                    <table>
                      <thead>
                        <tr>
                          <th style={{ width: "200px" }}>Bác sỹ</th>
                          <th style={{ width: "150px" }}>Chuyên khoa</th>
                          <th style={{ width: "120px" }}>Ngày hẹn</th>
                          <th style={{ width: "100px" }}>Thành tiền</th>
                          <th style={{ width: "100px" }}>Trạng thái</th>
                          <th style={{ width: "100px" }}>Thanh toán</th>
                          <th style={{ width: "100px" }}>Thao tác</th>
                        </tr>
                      </thead>
                      <tbody>
                        {apptListFiltered.map((appt) => (
                          <tr key={appt.appt_id} style={{cursor: "pointer"}}>
                            <td onClick={() => openPatientInfo(appt.patient_id)}>{appt.doctor_name}</td>
                            <td onClick={() => openPatientInfo(appt.patient_id)}>{appt.faculty_name}</td>
                            <td>{convertISOToDateTime(appt.appt_datetime)}</td>
                            <td>{appt.appt_fee}</td>
                            <td><div className={`${appt.appt_status}-color`}>{apptStatusName(appt.appt_status ? appt.appt_status : "")}</div>
                            </td>
                            <td>
                              {(appt.payment_status !== "pending" && appt.payment_status !== "failed") ? (
                                <div className={`${appt.payment_status}-color`}>{getPaymentStatus(appt.payment_status ? appt.payment_status : "")}</div>
                              ) : ""}
                              {(appt.payment_status === "pending" || appt.payment_status === "failed") && appt.payment_id ? (
                                <div className="table-button-list full">
                                  <button onClick={() => {openPaymentPage(appt.payment_id)}}>
                                    Thanh toán
                                  </button>
                                </div>
                              ) : ""}
                            </td>
                            <td>
                              <div className="table-button-list">
                                <button onClick={() => toggleModal("open", appt.appt_id)}>
                                  <FontAwesomeIcon icon={faPenToSquare} />
                                </button>
                                <button onClick={() => toggleModal("openDelete", appt.appt_id)}>
                                  <FontAwesomeIcon icon={faTrash} />
                                </button>
                              </div>
                            </td>
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
      ) : ""}

      <CustomModal
        headerTitle={updateApptId ? `Cập nhật lịch hẹn` : `Tạo lịch hẹn`}
        size="lg"
        type="modal"
        ref={apptModalRef}
      >
        <Formik
          validateOnChange={true}
          validateOnBlur={true}
          enableReinitialize={true}
          initialValues={initialValue}
          validate={validate}
          innerRef={apptFormRef}
          onSubmit={(values) => {
            submitAppt(values, updateApptId ? "update" : "create")
          }}
        >
          {(formikProps) => {
            return (
              <Form>
                <div className="body-content">
                  <div className="row">
                    <div className="col-md-4">
                      <CustomInput
                        formik={formikProps}
                        id="appt_datetime"
                        name="appt_datetime"
                        label="Ngày hẹn"
                        placeholder="Chọn ngày hẹn"
                        initialValue=""
                        inputType="datetime-local"
                        isRequired={true}
                        valueChange={(value) => {
                          if(formikProps.values.faculty_id) {
                            getAvailDoctor(formikProps.values.faculty_id, value)
                          }
                        }}
                        type="input"
                        disabled={false}
                      />
                    </div>
                    <div className="col-md-4">
                      <CustomInput
                        formik={formikProps}
                        id={`faculty_id`}
                        name={`faculty_id`}
                        label="Chuyên khoa"
                        placeholder=""
                        initialValue=""
                        inputType="text"
                        isRequired={true}
                        selectOptions={facultyOptions}
                        valueChange={(value) => {
                          if(formikProps.values.appt_datetime) {
                            formikProps.setFieldTouched("doctor_id", false);
                            getAvailDoctor(value, formikProps.values.appt_datetime);
                            formikProps.setFieldValue("doctor_id", "");
                          }
                        }}
                        type="select"
                        disabled={!formikProps.values.appt_datetime || updateApptId ? true : false}
                      />
                    </div>
                    <div className="col-md-4">
                      <CustomInput
                        formik={formikProps}
                        id={`doctor_id`}
                        name={`doctor_id`}
                        label="Bác sỹ"
                        placeholder=""
                        initialValue=""
                        inputType="text"
                        isRequired={true}
                        selectOptions={availableDoctor}
                        type="select"
                        disabled={(availableDoctor.length === 1) ? true : false}
                      />
                    </div>
                  </div>
                </div>
                <div className="body-footer">
                  <div className="button-list">
                    <button type="button" className="btn btn-outline" onClick={() => toggleModal("close")}>Thoát</button>
                    <button type="submit" name="create" value="create" className="btn btn-gradient">{updateApptId ? "Cập nhật" : "Tạo"}</button>
                  </div>
                </div>
              </Form>
            )
          }}
        </Formik>
      </CustomModal>

      {/* Alert xoá appt */}
      <CustomModal
        headerTitle={"Huỷ đặt hẹn"}
        size="md"
        type="alert"
        ref={deleteApptModalRef}
      >
        <div className="body-content">
          Bạn có chắc chắn muốn huỷ lịch hẹn này?
        </div>
        <div className="body-footer">
          <div className="button-list">
            <button type="button" className="btn btn-outline" onClick={() => toggleModal("closeDelete")}>Không</button>
            <button type="button" className="btn btn-gradient" onClick={() => deleteAppt()}>Chắc chắn</button>
          </div>
        </div>
      </CustomModal>

      {/* Alert success */}
      <CustomModal
        headerTitle={"Thành công"}
        size="md"
        type="alert"
        ref={successNoPaymentApptModalRef}
      >
        <div className="body-content">
          Lịch đặt hẹn đã được huỷ thành công
        </div>
        <div className="body-footer">
          <div className="button-list">
            <button type="button" className="btn btn-outline" onClick={() => toggleModal("closeConfirm")}>Đóng</button>
          </div>
        </div>
      </CustomModal>
      <CustomModal
        headerTitle={"Thành công"}
        size="md"
        type="alert"
        ref={successPaymentApptModalRef}
      >
        <div className="body-content">
          Lịch đặt hẹn đã được huỷ thành công và chúng tôi sẽ hoàn tiền trong 2 ngày làm việc
        </div>
        <div className="body-footer">
          <div className="button-list">
            <button type="button" className="btn btn-outline" onClick={() => toggleModal("closeConfirm")}>Đóng</button>
          </div>
        </div>
      </CustomModal>
    </>
  )
}