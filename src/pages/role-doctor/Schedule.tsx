import { faPenToSquare, faTrash } from "@fortawesome/free-solid-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { FC, Fragment, useEffect, useRef, useState } from "react";
import { Helmet } from "react-helmet";
import { NavbarHandles, PageNavbar } from "../../components/common/PageNavbar";
import { CustomModal, CustomModalHandles } from "../../components/common/CustomModal";
import { FieldArray, Form, Formik, FormikErrors, FormikHelpers, FormikProps } from "formik";
import { CustomInput } from "../../components/common/CustomInput";
import { apiGetDoctorSchedule, apiUpdateDoctorSchedule } from "../../helpers/axios";
import { useToast } from "../../components/common/CustomToast";
import { DoctorSidebar } from "../../components/common/DoctorSidebar";
import { UserSession } from "../../helpers/global";
import { convertISOToDateTime } from "../../helpers/utils";
import { format } from "date-fns";

export type ScheduleFormType = {
  start_datetime?: string,
  end_datetime?: string,
  work_note?: string,
}

export type ScheduleListType = {
  work_id: string;
  user_id: string;
  start_datetime: string;
  end_datetime: string;
  work_note: string | null;
  created_at: string;
  updated_at: string;
  status: string;
};

export type DynamicFormType = {
  schedules: ScheduleFormType[];
}

export type ScheduleRequestType = {
  action: string;
  auth_user_id: string;
  request: ScheduleFormType[];
}

export const DoctorSchedule: FC = () => {
  const {openToast} = useToast();

  const navbarRef = useRef<NavbarHandles>(null);

  const updateModalRef = useRef<CustomModalHandles>(null);
  const deleteAlertRef = useRef<CustomModalHandles>(null);
  const updateFormRef = useRef<FormikProps<ScheduleFormType>>(null);
  const createFormRef = useRef<FormikProps<DynamicFormType>>(null);

  const [initialValue, setInitialValue] = useState<DynamicFormType>({
    schedules: [{
      start_datetime: "",
      end_datetime: "",
      work_note: "",
    }]
  })
  const [initialValueUpdate, setInitialValueUpdate] = useState<ScheduleFormType>({
    start_datetime: "",
    end_datetime: "",
    work_note: "",
  })
  const [updateScheduleId, setUpdateScheduleId] = useState<string | null>(null);
  const [searchKeyword, setSearchKeyword] = useState<string>("");
  const [scheduleList, setScheduleList] = useState<ScheduleListType[]>([]);
  const [scheduleListFiltered, setScheduleListFiltered] = useState<ScheduleListType[]>([]);

  const pageTerm = "Lịch làm việc";

  useEffect(() => {
    getScheduleList();
  }, [])

  const validate = (value: DynamicFormType): FormikErrors<DynamicFormType> => {
    let errors: FormikErrors<DynamicFormType> = {
      schedules: []
    };
    value.schedules.forEach((sch, index) => {
      const schError: Partial<ScheduleFormType> = {};
      if (!sch.start_datetime) {
        schError.start_datetime = "Trường này không được bỏ trống!";
      }
      if (!sch.end_datetime) {
        schError.end_datetime = "Trường này không được bỏ trống!";
      }
      if(Object.keys(schError).length > 0) {
        (errors.schedules as FormikErrors<ScheduleFormType>[])[index] = schError;
      }
    })
    return errors;
  }

  const toggleUpdateModal = (action: string, workId?:string) => {
    if (updateModalRef.current) {
      switch (action) {
        case "open":
          updateFormRef.current?.resetForm();
          setUpdateScheduleId(workId ? workId : null);
          if(workId) {
            const findSchedule = scheduleList.find(schedule => schedule.work_id === workId);
            if(findSchedule) {
              setInitialValueUpdate({
                start_datetime: format(new Date(findSchedule.start_datetime), "yyyy-MM-dd'T'HH:mm"),
                end_datetime: format(new Date(findSchedule.end_datetime), "yyyy-MM-dd'T'HH:mm"),
                work_note: findSchedule.work_note ? findSchedule.work_note : "",
              })
            } else {
              createFormRef.current?.resetForm();
              setInitialValue({
                schedules: [{
                  start_datetime: "",
                  end_datetime: "",
                  work_note: "",
                }]
              })
            }
          } else {
            createFormRef.current?.resetForm();
            setInitialValue({
              schedules: [{
                start_datetime: "",
                end_datetime: "",
                work_note: "",
              }]
            })
          }
          updateModalRef.current.openModal();
          break;
        case "close":
          updateModalRef.current.closeModal();
          break;

        default:
          break;
      }
    }
  }
  const toggleDeleteAlert = (action: string, workId?:string) => {
    if (deleteAlertRef.current) {
      // switch (action) {
      //   case "open":
      //     setUpdateFacultyId(workId ? workId : null);
      //     deleteAlertRef.current.openModal();
      //     break;
      //   case "close":
      //     deleteAlertRef.current.closeModal();
      //     break;

      //   default:
      //     break;
      // }
    }
  }
  const submitCreateSchedule = async(value:DynamicFormType, helpers: FormikHelpers<DynamicFormType>) => {
    let formValid = true;
    value.schedules.every(sch => {
      if(!sch.start_datetime || !sch.end_datetime) {
        formValid = false;
        return false;
      }
      return true;
    })
    if(formValid && UserSession) {
      let tmpRequest:ScheduleFormType[] = [];
      value.schedules.forEach(sch => {
        tmpRequest.push(sch);
      })
      const createResult = await apiUpdateDoctorSchedule({
        action: "create",
        auth_user_id: UserSession.auth_user_id,
        request: tmpRequest
      })
      if(createResult.error) {
        openToast("error", "Lỗi", "Đã xảy ra lỗi khi tạo lịch làm việc!", 5000);
      } else if (createResult.data) {
        helpers.resetForm();
        openToast("success", "Thành công", "Các lịch làm việc đã được tạo!", 5000);
        toggleUpdateModal("close");
        getScheduleList();
      }
    } else {
      openToast("error", "Lỗi biểu mẫu", "Một số lịch làm việc chưa chọn ngày giờ!", 5000);
    }
  }
  const submitUpdateSchedule = async(value:ScheduleFormType, action:string) => {
    // const scheduleRequest: ScheduleRequestType = {
    //   ...value,
    //   action: action,
    //   workId: updateScheduleId
    // }
    // const updateResponse = await apiUpdateDoctorSchedule(scheduleRequest);
    // if(updateResponse.error) {
    //   openToast("error", "Lỗi", "Đã xảy ra lỗi khi tạo chuyên khoa!", 5000);
    // } else if (updateResponse.data) {
    //   openToast("success", "Thành công", updateScheduleId ? "Chuyên khoa đã được cập nhật" : "Chuyên khoa đã được tạo!", 5000);
    //   toggleUpdateModal("close");
    //   getScheduleList();
    // }
  }
  const deleteSchedule = async() => {
    // const scheduleRequest: ScheduleRequestType = {
    //   action: "delete",
    //   workId: updateScheduleId
    // }
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
      // const filterList = scheduleList.filter(schedule => schedule.fac_name.toLowerCase().includes(searchKeywordLower));
      // setScheduleListFiltered(filterList);
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
                        <th style={{ width: "100px" }}>Thời gian bắt đầu</th>
                        <th style={{ width: "100px" }}>Thời gian kết thúc</th>
                        <th style={{ width: "265px" }}>Ghi chú</th>
                        <th style={{ width: "140px" }}>Ngày tạo</th>
                        <th style={{ width: "140px" }}>Ngày chỉnh sửa</th>
                        <th style={{ width: "100px" }}>Thao tác</th>
                      </tr>
                    </thead>
                    <tbody>
                      {scheduleListFiltered.map((schedule) => (
                        <tr key={schedule.work_id}>
                          <td className="text-color">{convertISOToDateTime(schedule.start_datetime)}</td>
                          <td className="text-color">{convertISOToDateTime(schedule.end_datetime)}</td>
                          <td>{schedule.work_note}</td>
                          <td>{schedule.created_at}</td>
                          <td>{schedule.updated_at ? schedule.updated_at : ""}</td>
                          <td>
                            <div className="table-button-list">
                              <button onClick={() => toggleUpdateModal("open", schedule.work_id)}>
                                <FontAwesomeIcon icon={faPenToSquare} />
                              </button>
                              <button onClick={() => toggleDeleteAlert("open", schedule.work_id)}>
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

      {/* Form tạo */}
      <CustomModal
        headerTitle={updateScheduleId ? `Cập nhật ${pageTerm}` : `Tạo ${pageTerm}`}
        size="lg"
        type="modal"
        ref={updateModalRef}
      >
        <Formik
          validateOnChange={true}
          validateOnBlur={true}
          enableReinitialize={true}
          initialValues={initialValue}
          validate={() => {}}
          innerRef={createFormRef}
          onSubmit={submitCreateSchedule}
        >
          {(formikProps) => {
            return (
              <Form>
                <div className="body-content">
                  <FieldArray name="schedules">
                    {({push, remove}) => (
                      <div>
                        {formikProps.values.schedules.map((_, index) => (
                          <div className="row" key={index} style={{marginBottom: "15px"}}>
                            <div className="title-with-btn">
                              <div className="title-text">Lịch làm việc {index + 1}</div>
                              <div className="title-button">
                                <button
                                  type="button"
                                  className="btn btn-gradient"
                                  onClick={() => {
                                    remove(index)
                                  }}
                                ><FontAwesomeIcon icon={faTrash} /></button>
                              </div>
                            </div>
                            <div className="col-md-3">
                              <CustomInput
                                formik={formikProps}
                                id={`schedules[${index}]start_datetime`}
                                name={`schedules[${index}]start_datetime`}
                                label="Thời gian bắt đầu"
                                placeholder="Chọn thời gian bắt đầu"
                                initialValue=""
                                inputType="datetime-local"
                                isRequired={true}
                                type="input"
                                disabled={false}
                              />
                            </div>
                            <div className="col-md-3">
                              <CustomInput
                                formik={formikProps}
                                id={`schedules[${index}]end_datetime`}
                                name={`schedules[${index}]end_datetime`}
                                label="Thời gian kết thúc"
                                placeholder="Chọn thời gian kết thúc"
                                initialValue=""
                                inputType="datetime-local"
                                isRequired={true}
                                type="input"
                                disabled={false}
                              />
                            </div>
                            <div className="col-md-6">
                              <CustomInput
                                formik={formikProps}
                                id={`schedules[${index}]work_note`}
                                name={`schedules[${index}]work_note`}
                                label="Ghi chú"
                                placeholder="Nhập ghi chú chuyên khoa"
                                initialValue=""
                                inputType="text"
                                isRequired={false}
                                type="input"
                                textareaRow={3}
                                disabled={false}
                              />
                            </div>
                          </div>
                        ))}
                        <div className="col-md-12">
                          <button
                            type="button"
                            className="btn btn-gradient"
                            onClick={() => {
                              push({
                                start_datetime: "",
                                end_datetime: "",
                                work_note: "",
                              })
                            }}
                          >Thêm lịch làm việc</button>
                        </div>
                      </div>
                    )}
                  </FieldArray>
                </div>
                <div className="body-footer">
                  <div className="button-list">
                    {/* <button type="button" className="btn btn-outline" onClick={() => toggleUpdateModal("close")}>Thoát</button> */}
                    <button type="submit" className="btn btn-gradient">{updateScheduleId ? "Cập nhật" : "Tạo"}</button>
                  </div>
                </div>
              </Form>
            )
          }}
        </Formik>
      </CustomModal>

    </>
  )
}