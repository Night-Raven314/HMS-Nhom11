import { faPenToSquare, faTrash } from "@fortawesome/free-solid-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { FC, useEffect, useRef, useState } from "react";
import { Helmet } from "react-helmet";
import { NavbarHandles, PageNavbar } from "../../components/common/PageNavbar";
import { CustomModal, CustomModalHandles } from "../../components/common/CustomModal";
import { Form, Formik, FormikProps } from "formik";
import { CustomInput } from "../../components/common/CustomInput";
import { apiGetDoctorSchedule } from "../../helpers/axios";
import { useToast } from "../../components/common/CustomToast";
import { DoctorSidebar } from "../../components/common/DoctorSidebar";
import { UserSession } from "../../helpers/global";

export type ScheduleFormType = {
  name?: string,
  desc?: string,
  note?: string,
}

export type ScheduleListType = {
  appt_id: string;
  doctor_id: string;
  patient_id: string;
  faculty_id: string;
  appt_fee: string;
  appt_datetime: string;
  created_at: string;
  updated_at: string;
  status: string;
};



export type ScheduleRequestType = ScheduleFormType & {
  action: string;
  facId: string | null;
}

export const DoctorSchedule: FC = () => {
  const {openToast} = useToast();

  const navbarRef = useRef<NavbarHandles>(null);

  const updateModalRef = useRef<CustomModalHandles>(null);
  const deleteAlertRef = useRef<CustomModalHandles>(null);
  const updateFormRef = useRef<FormikProps<ScheduleFormType>>(null);

  const [initialValue, setInitialValue] = useState<ScheduleFormType>({
    name: "",
    desc: "",
    note: "",
  })
  const [updateScheduleId, setUpdateScheduleId] = useState<string | null>(null);
  const [searchKeyword, setSearchKeyword] = useState<string>("");
  const [scheduleList, setScheduleList] = useState<ScheduleListType[]>([]);
  const [scheduleListFiltered, setScheduleListFiltered] = useState<ScheduleListType[]>([]);

  const pageTerm = "chuyên khoa";

  useEffect(() => {
    getScheduleList();
  }, [])

  const validate = (value: ScheduleFormType) => {
    let errors: ScheduleFormType = {};
    if (!value.name) {
      errors.name = "Trường này không được bỏ trống!";
    }
    if (!value.desc) {
      errors.desc = "Trường này không được bỏ trống!";
    }
    return errors;
  }

  // const toggleUpdateModal = (action: string, facId?:string) => {
  //   if (updateModalRef.current) {
  //     switch (action) {
  //       case "open":
  //         updateFormRef.current?.resetForm();
  //         setUpdateScheduleId(facId ? facId : null);
  //         if(facId) {
  //           const findSchedule = scheduleList.find(schedule => schedule.fac_id === facId);
  //           if(findSchedule) {
  //             setInitialValue({
  //               name: findSchedule.fac_name,
  //               desc: findSchedule.fac_desc,
  //               note: findSchedule.fac_note,
  //             })
  //           } else {
  //             setInitialValue({
  //               name: "",
  //               desc: "",
  //               note: "",
  //             })
  //           }
  //         } else {
  //           setInitialValue({
  //             name: "",
  //             desc: "",
  //             note: "",
  //           })
  //         }
  //         updateModalRef.current.openModal();
  //         break;
  //       case "close":
  //         updateModalRef.current.closeModal();
  //         break;

  //       default:
  //         break;
  //     }
  //   }
  // }

  const submitUpdateSchedule = async(value:ScheduleFormType, action:string) => {
    const scheduleRequest: ScheduleRequestType = {
      ...value,
      action: action,
      facId: updateScheduleId
    }
    // const updateResponse = await apiUpdateSchedule(scheduleRequest);
    // if(updateResponse.error) {
    //   openToast("error", "Lỗi", "Đã xảy ra lỗi khi tạo chuyên khoa!", 5000);
    // } else if (updateResponse.data) {
    //   openToast("success", "Thành công", updateScheduleId ? "Chuyên khoa đã được cập nhật" : "Chuyên khoa đã được tạo!", 5000);
    //   toggleUpdateModal("close");
    //   getScheduleList();
    // }
  }
  const deleteSchedule = async() => {
    const scheduleRequest: ScheduleRequestType = {
      action: "delete",
      facId: updateScheduleId
    }
    // const updateResponse = await apiUpdateSchedule(scheduleRequest);
    // if(updateResponse.error) {
    //   openToast("error", "Lỗi", `Đã xảy ra lỗi khi xoá chuyên khoa!`, 5000);
    // } else if (updateResponse.data) {
    //   openToast("success", "Thành công", `Chuyên khoa đã xoá!`, 5000);
    //   toggleDeleteAlert("close");
    //   getScheduleList();
    // }
  }
  const getScheduleList = async() => {
    if(UserSession) {
      const getSchedule = await apiGetDoctorSchedule(UserSession.auth_user_id);
      if(getSchedule.error) {
        openToast("error", "Lỗi", "Đã xảy ra lỗi khi lấy thông tin lịch hẹn!", 5000);
      } else if (getSchedule.data) {
        setScheduleList(getSchedule.data);
      }
    }
  }
  const searchSchedule = () => {
    if(searchKeyword) {
      const searchKeywordLower = searchKeyword.toLowerCase();
      const filterList = scheduleList.filter(schedule => schedule.fac_name.toLowerCase().includes(searchKeywordLower));
      setScheduleListFiltered(filterList);
    } else { 
      setScheduleListFiltered(scheduleList);
    }
  }
  useEffect(() => {
    searchSchedule();
  }, [scheduleList, searchKeyword])

  return (
    <>
      <Helmet>
        <title>
          Quản lý {pageTerm} - HKL
        </title>
      </Helmet>

      <div className="main-background">
        <div className="page-container">
          <div className="page-sidebar">
            <DoctorSidebar selectedItem={"schedule"} />
          </div>
          <div className="page-content">
            <PageNavbar
              navbarTitle={`Quản lý ${pageTerm}`}
              searchRequest={(keyword) => {setSearchKeyword(keyword)}}
              ref={navbarRef}
            />
            <div className="content">
              <div className="hms-table">
                <div className="table-header">
                  <div className="header-title">Thông tin {pageTerm} trên hệ thống</div>
                  <div className="header-button">
                    <button className="btn btn-outline-primary btn-sm" onClick={() => toggleUpdateModal("open")}>
                      Tạo {pageTerm}
                    </button>
                  </div>
                </div>
                <div className="table-body">
                  <table>
                    <thead>
                      <tr>
                        <th style={{ width: "200px" }}>Tên chuyên khoa</th>
                        <th style={{ width: "200px" }}>Mô tả</th>
                        <th style={{ width: "140px" }}>Ghi chú</th>
                        <th style={{ width: "140px" }}>Ngày tạo</th>
                        <th style={{ width: "140px" }}>Ngày chỉnh sửa</th>
                        <th style={{ width: "100px" }}>Thao tác</th>
                      </tr>
                    </thead>
                    <tbody>
                      {scheduleListFiltered.map((schedule) => (
                        <tr key={schedule.fac_id}>
                          <td className="text-color">{schedule.fac_name}</td>
                          <td>{schedule.fac_desc}</td>
                          <td>{schedule.fac_note}</td>
                          <td>{schedule.created_at}</td>
                          <td>{schedule.updated_at ? schedule.updated_at : ""}</td>
                          <td>
                            <div className="table-button-list">
                              <button onClick={() => toggleUpdateModal("open", schedule.fac_id)}>
                                <FontAwesomeIcon icon={faPenToSquare} />
                              </button>
                              <button onClick={() => toggleDeleteAlert("open", schedule.fac_id)}>
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

      {/* Form tạo/cập nhật chuyên khoa */}
      <CustomModal
        headerTitle={updateScheduleId ? `Cập nhật ${pageTerm}` : `Tạo ${pageTerm}`}
        size="md"
        type="modal"
        ref={updateModalRef}
      >
        <Formik
          validateOnChange={true}
          validateOnBlur={true}
          enableReinitialize={true}
          initialValues={initialValue}
          validate={validate}
          innerRef={updateFormRef}
          onSubmit={(values) => {
            submitUpdateSchedule(values, updateScheduleId ? "update" : "create")
          }}
        >
          {(formikProps) => {
            return (
              <Form>
                <div className="body-content">
                  <div className="row">
                    <div className="col-md-12">
                      <CustomInput
                        formik={formikProps}
                        id="name"
                        name="name"
                        label="Tên chuyên khoa"
                        placeholder="Nhập tên chuyên khoa"
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
                        id="desc"
                        name="desc"
                        label="Mô tả"
                        placeholder="Nhập mô tả chuyên khoa"
                        initialValue=""
                        inputType="text"
                        isRequired={true}
                        type="textarea"
                        textareaRow={3}
                        disabled={false}
                      />
                    </div>
                    <div className="col-md-12">
                      <CustomInput
                        formik={formikProps}
                        id="note"
                        name="note"
                        label="Ghi chú"
                        placeholder="Nhập ghi chú chuyên khoa"
                        initialValue=""
                        inputType="text"
                        isRequired={false}
                        type="textarea"
                        textareaRow={3}
                        disabled={false}
                      />
                    </div>
                  </div>
                </div>
                <div className="body-footer">
                  <div className="button-list">
                    <button type="button" className="btn btn-outline" onClick={() => toggleUpdateModal("close")}>Thoát</button>
                    <button type="submit" name="create" value="create" className="btn btn-gradient">{updateScheduleId ? "Cập nhật" : "Tạo"}</button>
                  </div>
                </div>
              </Form>
            )
          }}
        </Formik>
      </CustomModal>

      {/* Alert xoá schedule */}
      <CustomModal
        headerTitle={"Xoá chuyên khoa"}
        size="md"
        type="alert"
        ref={deleteAlertRef}
      >
        <div className="body-content">
          Bạn có chắc chắn muốn xoá chuyên khoa <b>{getScheduleDeleteInfo(updateScheduleId)}</b> này?
        </div>
        <div className="body-footer">
          <div className="button-list">
            <button type="button" className="btn btn-outline" onClick={() => toggleDeleteAlert("close")}>Không</button>
            <button type="button" className="btn btn-gradient" onClick={() => deleteSchedule()}>Xoá</button>
          </div>
        </div>
      </CustomModal>

    </>
  )
}