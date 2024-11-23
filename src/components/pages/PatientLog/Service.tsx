import { faBuilding, faCalendar, faCalendarDay, faDoorOpen, faNoteSticky, faPenToSquare, faRotate, faTrash } from "@fortawesome/free-solid-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { FC, Fragment, useEffect, useRef, useState } from "react";
import { useToast } from "../../common/CustomToast";
import { FieldArray, Form, Formik, FormikHelpers, FormikProps } from "formik";
import { CustomInput, SelectOptionType } from "../../common/CustomInput";
import { CustomModal, CustomModalHandles } from "../../common/CustomModal";
import { ItemListType } from "../../../pages/role-admin/Item";
import { apiAdminGetBuilding, apiCompleteTreatment, apiGetItem, apiGetService, apiGetServiceList, apiUpdatePatientLog, apiUpdateRoom, apiUpdateService, UpdatePatientLogType } from "../../../helpers/axios";
import { ServiceRoomModal } from "./ServiceRoom";
import { BuildingType, FloorType, RoomType } from "../../../pages/role-admin/Building";
import { convertISOToDateTime } from "../../../helpers/utils";
import { PatientLogType } from "../../../pages/PatientInfo";

export type ServiceProps = {
  patientLog: PatientLogType;
  requestReload: () => void;
}
export type ServiceTableType = {
  fac_asmt_id: string;
  item_type: string;
  item_id: string;
  item_name: string;
  item_unit: string;
  amount: string;
  item_price: string;
  item_note: string;
  start_datetime: string;
  end_datetime: string | null;
}

export type ServiceList = {
  med_hist_id: string,
  patient_id: string,
  item_name: string,
  amount: string,
  item_unit: string,
  item_note: string,
  item_lending_price: string,
}
export type ServiceFormType = {
  item_id: string,
  item_type: string,
  amount: string | null,
  price: string,
  item_note: string,
  start_time: string,
  end_time: string | null,
  is_lending: string
}
type DynamicServiceFormType = {
  services: ServiceFormType[]
}
export type CreateServiceRequestType = {
  action: string,
  ptn_log_id?: string,
  fact_asmt_id?: string,
  request?: ServiceFormType[]
}
export type RoomUpdateRequestType = {
  fac_asmt_id: string,
  ptn_log_id: string,
  item_id: string,
  amount: string,
  price: string,
  item_note: string,
  start_time: string,
  end_time: string
}

export const ServiceTable:FC<ServiceProps> = ({patientLog, requestReload}) => {
  const {openToast} = useToast();
  const [serviceTable, setServiceTable] = useState<ServiceTableType[]>([]);
  const [serviceList, setServiceList] = useState<ItemListType[]>([]);
  const [serviceOptions, setServiceOptions] = useState<SelectOptionType[]>([]);
  const [buildingList, setBuildingList] = useState<BuildingType[]>([]);

  const serviceDeleteModalRef = useRef<CustomModalHandles>(null);
  const serviceCreateModalRef = useRef<CustomModalHandles>(null);
  const serviceCreateFormRef = useRef<FormikProps<DynamicServiceFormType>>(null);
  const [updateService, setUpdateService] = useState<ServiceTableType | null>(null);
  const [serviceCreateInitialValue, setPresCreateInitialValue] = useState<DynamicServiceFormType>({
    services: []
  })
  // Service create room
  const [selectedRoom, setSelectedRoom] = useState<RoomType | undefined>(undefined);
  const [selectedFloor, setSelectedFloor] = useState<FloorType | undefined>(undefined);
  const [selectedRoomUpdate, setSelectedRoomUpdate] = useState<RoomType | undefined>(undefined);
  const [selectedFloorUpdate, setSelectedFloorUpdate] = useState<FloorType | undefined>(undefined);
  const [roomStartDate, setRoomStartDate] = useState<string>("");
  const [roomNote, setRoomNote] = useState<string>("");

  const serviceRoomModalRef = useRef<CustomModalHandles>(null);

  const getBuilding = async() => {
    const getBuilding = await apiAdminGetBuilding();
    if(getBuilding.error) {
      openToast("error", "Lỗi", "Đã xảy ra lỗi khi lấy danh sách tầng!", 5000);
    } else if (getBuilding.data) {
      let tmpBuilding:BuildingType[] = [];
      getBuilding.data.floors.forEach((floor:FloorType) => {
        if(getBuilding.data) {
          let tmpRoomList:RoomType[] = [];
          getBuilding.data.rooms.forEach((room:RoomType) => {
            if(room.floor_id === floor.floor_id) {
              tmpRoomList.push(room);
            }
          })
          tmpRoomList.sort((a, b) => a.room_order - b.room_order);
          tmpBuilding.push({
            ...floor,
            rooms: tmpRoomList
          })
        }
      })
      tmpBuilding.sort((a, b) => b.floor_order - a.floor_order);
      setBuildingList(tmpBuilding);
    }
  }

  const getServiceTable = async() => {
    if(patientLog) {
      const result = await apiGetService(patientLog.ptn_log_id);
      if(result.error) {
        openToast("error", "Lỗi", "Đã xảy ra lỗi khi lấy thông tin!", 5000);
      } else if (result.data) {
        setServiceTable(result.data);
      }
    }
  }

  const getServiceList = async() => {
    const getItem = await apiGetServiceList();
    if(getItem.error) {
      openToast("error", "Lỗi", `Đã xảy ra lỗi khi lấy thông tin!`, 5000);
    } else if (getItem.data) {
      setServiceList(getItem.data);
      const tmpServiceList:ItemListType[] = getItem.data;
      tmpServiceList.sort((a, b) => {
        if (a.item_name < b.item_name) return -1;
        if (a.item_name > b.item_name) return 1;
        return 0;
      });
      
      let tmpServiceOptions: SelectOptionType[] = [{
        value: "none",
        label: "Chọn dịch vụ"
      }];
      tmpServiceList.forEach(med => {
        tmpServiceOptions.push({
          value: med.item_id,
          label: `${med.item_name} (${med.item_price}đ/${med.item_unit})`
        })
      })
      setServiceOptions(tmpServiceOptions)
    }
  }

  const toggleModal = (action: string, item?:ServiceTableType, roomId?:string) => {
    switch (action) {
      case "delete":
        if(item) {
          setUpdateService(item);
          if(serviceDeleteModalRef.current) {
            serviceDeleteModalRef.current.openModal();
          }
        }
        break;
      case "open":
        resetRoomForm();
        serviceCreateFormRef.current?.resetForm();
        setSelectedFloorUpdate(undefined);
        setSelectedRoomUpdate(undefined);
        setPresCreateInitialValue({
          services: []
        })
        if(serviceCreateModalRef.current) {
          serviceCreateModalRef.current.openModal();
        }
        break;
      case "openRoomSwap":
        if(item) {
          setUpdateService(item);
        }
        resetRoomForm();
        serviceCreateFormRef.current?.resetForm();
        setPresCreateInitialValue({
          services: []
        })
        // Find rooms
        let getRoom:RoomType | undefined;
        let getFloor:FloorType | undefined;
        buildingList.forEach(bFloor => {
          bFloor.rooms.forEach(bRoom => {
            if(bRoom.room_id === roomId) {
              getRoom = bRoom;
              getFloor = bFloor;
            }
          })
        });
        if(getRoom && getFloor) {
          setSelectedFloorUpdate(getFloor);
          setSelectedRoomUpdate(getRoom);
        }
        if(serviceCreateModalRef.current) {
          serviceCreateModalRef.current.openModal();
        }
        break;
      case "close":
        if(serviceCreateModalRef.current) {
          serviceCreateModalRef.current.closeModal();
        }
        if(serviceDeleteModalRef.current) {
          serviceDeleteModalRef.current.closeModal();
        }
        break;
      case "openRoom":
        if(serviceRoomModalRef.current) {
          serviceRoomModalRef.current.openModal();
        }
        break;
      case "closeRoom":
        if(serviceRoomModalRef.current) {
          serviceRoomModalRef.current.closeModal();
        }
        break;
      default:
        break;
    }
  }

  const resetRoomForm = () => {
    setSelectedFloor(undefined);
    setSelectedRoom(undefined);
    setRoomNote("");
    setRoomStartDate("");
  }

  const submitSwapRoom = async() => {
    if(selectedRoom && updateService) {
      if(!roomStartDate) {
        openToast("error", "Lỗi biểu mẫu", "Phòng chưa điền đủ thông tin!", 5000);
      } else {
        let tmpRequest:RoomUpdateRequestType = {
          fac_asmt_id: updateService.fac_asmt_id,
          ptn_log_id: patientLog.ptn_log_id,
          item_id: selectedRoom.room_id,
          amount: "",
          price: selectedRoom.room_price,
          item_note: roomNote,
          end_time: "",
          start_time: new Date(roomStartDate).toISOString()
        }
        const result = await apiUpdateRoom(tmpRequest);
        if(result.error) {
          openToast("error", "Lỗi", `Đã xảy ra lỗi khi lưu thông tin!`, 5000);
        } else if(result.data) {
          openToast("success", "Thành công", `Phòng đã được đổi!`, 5000);
          toggleModal("close");
          getServiceTable();
        }
      }
    }
  }

  const submitService = async(value:DynamicServiceFormType, helpers: FormikHelpers<DynamicServiceFormType>) => {
    let formValid = true;
    value.services.every(item => {
      if(!item.amount || item.item_id === "none" || (selectedRoom && !roomStartDate)) {
        formValid = false;
        return false;
      }
      return true;
    })
    if(formValid && patientLog) {
      let tmpRequest:ServiceFormType[] = JSON.parse(JSON.stringify(value.services));
      tmpRequest.forEach(service => {
        const findService = serviceList.find(lService => lService.item_id === service.item_id);
        if(findService) {
          service.price = findService.item_price;
          service.item_type = findService.item_type ? findService.item_type : "item";
          service.is_lending = findService.item_lending_price === "0" ? "false" : "true";
        } else {
          service.price = "0";
          service.item_type = "item";
        }
        service.end_time = "";
        service.start_time = new Date().toISOString();
      })
      if(selectedRoom) {
        tmpRequest.push({
          item_id: selectedRoom.room_id,
          amount: "",
          price: selectedRoom.room_price,
          item_note: roomNote,
          end_time: "",
          start_time: new Date(roomStartDate).toISOString(),
          is_lending: "false",
          item_type: "room"
        })
        if(patientLog.is_inpatient === "0") {
          const request:UpdatePatientLogType = {
            ptn_log_id: patientLog.ptn_log_id,
            patient_id: patientLog.patient_id,
            faculty_id: patientLog.faculty_id,
            auth_user_id: patientLog.doctor_id,
            start_datetime: patientLog.start_datetime,
            end_datetime: patientLog.end_datetime,
            is_inpatient: 1,
            action: "update"
          }
          const resultUser = await apiUpdatePatientLog(request);
          if(resultUser.error) {
            openToast("error", "Lỗi", "Đã xảy ra lỗi khi tạo hồ sơ khám!", 5000);
          } else if (resultUser.data) {
            requestReload();
          }
        }
      }
      const result = await apiUpdateService({
        action: "create",
        ptn_log_id: patientLog.ptn_log_id,
        request: tmpRequest
      });
      if(result.error) {
        openToast("error", "Lỗi", `Đã xảy ra lỗi khi lưu thông tin!`, 5000);
      } else if(result.data) {
        openToast("success", "Thành công", `Dịch vụ đã được thêm!`, 5000);
        toggleModal("close");
        getServiceTable();
      }
    } else {
      openToast("error", "Lỗi biểu mẫu", "Một số dịch vụ chưa điền đủ thông tin!", 5000);
    }
  }
  const deleteService = async() => {
    if(updateService) {
      const result = await apiUpdateService({
        action: "delete",
        fact_asmt_id: updateService.fac_asmt_id
      });
      if(result.error) {
        openToast("error", "Lỗi", `Đã xảy ra lỗi khi xoá thông tin!`, 5000);
      } else if(result.data) {
        toggleModal("close");
        getServiceTable();
      }
    }
  }

  const checkSaveRoom = (floor:FloorType, room:RoomType) => {
    if(selectedRoomUpdate && selectedFloorUpdate) {
      if(selectedFloorUpdate.floor_id === floor.floor_id && selectedRoomUpdate.room_id === room.room_id) {
        openToast("error", "Lỗi", `Phòng sẽ đổi qua không được trùng với phòng đã chọn!`, 5000);
      } else {
        setSelectedFloor(floor);
        setSelectedRoom(room);
        toggleModal("closeRoom");
      }
    } else {
      setSelectedFloor(floor);
      setSelectedRoom(room);
      toggleModal("closeRoom");
    }
  }

  useEffect(() => {
    getServiceList();
    getBuilding();
  }, [])
  useEffect(() => {
    if(patientLog) {
      getServiceTable();
    }
  }, [patientLog])

  return (
    <>
      <div className="hms-table">
        <div className="table-header">
          <div className="header-title">Dịch vụ</div>
          <div className="header-button">
            {patientLog.status !== "completed" ? (
              <button className="btn btn-outline-primary btn-sm" onClick={() => {toggleModal("open")}}>
                Thêm dịch vụ
              </button>
            ) : ""}
          </div>
        </div>
        <div className="table-body">
          <table>
            <thead>
              <tr>
                <th style={{ width: "100px" }}>Tên dịch vụ</th>
                <th style={{ width: "55px" }}>Đơn vị</th>
                <th style={{ width: "45px" }}>Số lượng</th>
                <th style={{ width: "150px" }}>Ghi chú</th>
                {patientLog.status !== "completed" ? (
                  <th style={{ width: "50px" }}>Thao tác</th>
                ) : ""}
              </tr>
            </thead>
            <tbody>
              {serviceTable.map((item) => (
                <tr key={item.fac_asmt_id}>
                  <td>{item.item_name}</td>
                  <td>{item.item_unit}</td>
                  <td>{item.amount}</td>
                  <td>{item.item_note}</td>
                  {patientLog.status !== "completed" ? (
                    <td>
                      {!item.end_datetime ? (
                        <div className="table-button-list">
                          {item.item_type === "room" ? (
                            <button onClick={() => {toggleModal("openRoomSwap", item, item.item_id)}}>
                              <FontAwesomeIcon icon={faRotate} />
                            </button>
                          ) : (
                            <button onClick={() => {toggleModal("delete", item)}}>
                              <FontAwesomeIcon icon={faTrash} />
                            </button>
                          )}
                        </div>
                      ) : ""}
                    </td>
                  ) : ""}
                </tr>
              ))}
            </tbody>
          </table>
        </div>
      </div>
      <CustomModal
        headerTitle={selectedRoomUpdate ? "Đổi phòng" : `Thêm dịch vụ`}
        size="xl"
        type="modal"
        ref={serviceCreateModalRef}
      >
        {selectedRoomUpdate && selectedFloorUpdate && updateService ? (
          <Fragment>
            <div className="body-content">
              <div>
                <div className="title-with-btn" style={{marginBottom: 0}}>
                  <div className="title-text">Phòng đã chọn</div>
                </div>
                <div className="patient-log-list no-floating">
                  <div className="log-item">

                    <div className="item-info-container">
                      <div className="row">
                        <div className="col-md-3 info-container">
                          <div className="info-icon">
                            <FontAwesomeIcon icon={faBuilding} />
                          </div>
                          <div className="info-text">
                            <div className="text-title">Tầng</div>
                            <div className="text-desc">
                              {selectedFloorUpdate.floor_name}{selectedFloorUpdate.floor_note ? " (" + selectedFloorUpdate.floor_note + ")" : ""}
                            </div>
                          </div>
                        </div>
                        <div className="col-md-2 info-container">
                          <div className="info-icon">
                            <FontAwesomeIcon icon={faDoorOpen} />
                          </div>
                          <div className="info-text">
                            <div className="text-title">Phòng</div>
                            <div className="text-desc">
                              {selectedRoomUpdate.room_name}
                            </div>
                          </div>
                        </div>
                        <div className="col-md-3 info-container">
                          <div className="info-icon">
                            <FontAwesomeIcon icon={faCalendar} />
                          </div>
                          <div className="info-text">
                            <div className="text-title">Ngày bắt đầu</div>
                            <div className="text-desc">
                              {convertISOToDateTime(updateService.start_datetime)}
                            </div>
                          </div>
                        </div>
                        <div className="col-md-4 info-container">
                          <div className="info-icon">
                            <FontAwesomeIcon icon={faNoteSticky} />
                          </div>
                          <div className="info-text">
                            <div className="text-title">Ghi chú</div>
                            <div className="text-desc">
                              {updateService.item_note}
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </div>

              {selectedRoom && selectedFloor ? (
                <div className="col-md-12">
                  <div className="title-with-btn" style={{marginTop: "30px", marginBottom: 0}}>
                    <div className="title-text">Phòng được đổi</div>
                    <div className="title-button">
                      <button
                        type="button"
                        className="btn btn-gradient"
                        onClick={() => {
                          toggleModal("openRoom")
                        }}
                      ><FontAwesomeIcon icon={faPenToSquare} /></button>
                      <button
                        type="button"
                        className="btn btn-gradient"
                        onClick={() => {
                          resetRoomForm();
                        }}
                      ><FontAwesomeIcon icon={faTrash} /></button>
                    </div>
                  </div>
                  <div className="patient-log-list no-floating">
                    <div className="log-item">

                      <div className="item-info-container">
                        <div className="row">
                          <div className="col-md-3 info-container">
                            <div className="info-icon">
                              <FontAwesomeIcon icon={faBuilding} />
                            </div>
                            <div className="info-text">
                              <div className="text-title">Tầng</div>
                              <div className="text-desc">
                                {selectedFloor.floor_name}{selectedFloor.floor_note ? " (" + selectedFloor.floor_note + ")" : ""}
                              </div>
                            </div>
                          </div>
                          <div className="col-md-2 info-container">
                            <div className="info-icon">
                              <FontAwesomeIcon icon={faDoorOpen} />
                            </div>
                            <div className="info-text">
                              <div className="text-title">Phòng</div>
                              <div className="text-desc">
                                {selectedRoom.room_name}
                              </div>
                            </div>
                          </div>
                          <div className="col-md-3">
                            <CustomInput
                              id={`room_start_time`}
                              name={`room_start_time`}
                              label="Thời gian bắt đầu"
                              placeholder="Chọn thời gian bắt đầu"
                              initialValue=""
                              inputType="datetime-local"
                              isRequired={true}
                              type="input"
                              disabled={false}
                              changeDelay={0}
                              valueChange={(value) => setRoomStartDate(value)}
                            />
                          </div>
                          <div className="col-md-4">
                            <CustomInput
                              id={`room_note`}
                              name={`room_note`}
                              label="Ghi chú"
                              placeholder="Nhập ghi chú"
                              initialValue=""
                              inputType="text"
                              isRequired={false}
                              type="input"
                              disabled={false}
                              changeDelay={0}
                              valueChange={(value) => setRoomNote(value)}
                            />
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
              ) : ""}
              {!selectedRoom ? (
                <div className="col-md-12">
                  <button
                    type="button"
                    className="btn btn-gradient"
                    style={{marginTop: "15px"}}
                    onClick={() => {toggleModal("openRoom")}}
                  >Chọn phòng mới</button>
                </div>
              ) : ""}

            </div>
            <div className="body-footer">
              <div className="button-list">
                <button type="button" className="btn btn-outline" onClick={() => toggleModal("close")}>Thoát</button>
                <button type="submit" className="btn btn-gradient" disabled={!selectedRoom} onClick={() => submitSwapRoom()}>Lưu thay đổi</button>
              </div>
            </div>
          </Fragment>
        ) : (
          <Formik
            validateOnChange={true}
            validateOnBlur={true}
            enableReinitialize={true}
            initialValues={serviceCreateInitialValue}
            validate={() => {}}
            innerRef={serviceCreateFormRef}
            onSubmit={submitService}
          >
            {(formikProps) => {
              return (
                <Form>
                  <div className="body-content">
                    <FieldArray name="services">
                      {({push, remove}) => (
                        <div>
                          {formikProps.values.services.map((_, index) => (
                            <div className="row" key={index} style={{marginBottom: "15px"}}>
                              <div className="col-md-4">
                                <CustomInput
                                  formik={formikProps}
                                  id={`services[${index}]item_id`}
                                  name={`services[${index}]item_id`}
                                  label="Dịch vụ"
                                  placeholder=""
                                  initialValue=""
                                  inputType="text"
                                  isRequired={true}
                                  selectOptions={serviceOptions}
                                  type="select"
                                  disabled={false}
                                />
                              </div>
                              <div className="col-md-2">
                                <CustomInput
                                  formik={formikProps}
                                  id={`services[${index}]amount`}
                                  name={`services[${index}]amount`}
                                  label="Số lượng"
                                  placeholder="Nhập số lượng"
                                  initialValue=""
                                  inputType="text"
                                  isRequired={true}
                                  type="input"
                                  disabled={false}
                                />
                              </div>
                              <div className="col-md-5">
                                <CustomInput
                                  formik={formikProps}
                                  id={`services[${index}]item_note`}
                                  name={`services[${index}]item_note`}
                                  label="Ghi chú"
                                  placeholder="Nhập ghi chú"
                                  initialValue=""
                                  inputType="text"
                                  isRequired={false}
                                  type="input"
                                  disabled={false}
                                />
                              </div>
                              <div className="col-md-1">
                                <button
                                  type="button"
                                  className="btn btn-gradient form-delete-btn"
                                  onClick={() => {
                                    remove(index)
                                  }}
                                ><FontAwesomeIcon icon={faTrash} /></button>
                              </div>
                            </div>
                          ))}
                          <div className="col-md-12">
                            <button
                              type="button"
                              className="btn btn-gradient"
                              onClick={() => {
                                push({
                                  item_id: "",
                                  amount: "",
                                  price: "",
                                  item_note: ""
                                })
                              }}
                            >Thêm dịch vụ</button>
                          </div>

                          {/* Quản lý phòng */}
                          {selectedRoom && selectedFloor ? (
                            <div className="col-md-12">
                              <div className="title-with-btn" style={{marginTop: "30px", marginBottom: 0}}>
                                <div className="title-text">Phòng đã chọn</div>
                                <div className="title-button">
                                  <button
                                    type="button"
                                    className="btn btn-gradient"
                                    onClick={() => {
                                      toggleModal("openRoom")
                                    }}
                                  ><FontAwesomeIcon icon={faPenToSquare} /></button>
                                  <button
                                    type="button"
                                    className="btn btn-gradient"
                                    onClick={() => {
                                      resetRoomForm();
                                    }}
                                  ><FontAwesomeIcon icon={faTrash} /></button>
                                </div>
                              </div>
                              <div className="patient-log-list no-floating">
                                <div className="log-item">

                                  <div className="item-info-container">
                                    <div className="row">
                                      <div className="col-md-3 info-container">
                                        <div className="info-icon">
                                          <FontAwesomeIcon icon={faBuilding} />
                                        </div>
                                        <div className="info-text">
                                          <div className="text-title">Tầng</div>
                                          <div className="text-desc">
                                            {selectedFloor.floor_name}{selectedFloor.floor_note ? " (" + selectedFloor.floor_note + ")" : ""}
                                          </div>
                                        </div>
                                      </div>
                                      <div className="col-md-2 info-container">
                                        <div className="info-icon">
                                          <FontAwesomeIcon icon={faDoorOpen} />
                                        </div>
                                        <div className="info-text">
                                          <div className="text-title">Phòng</div>
                                          <div className="text-desc">
                                            {selectedRoom.room_name}
                                          </div>
                                        </div>
                                      </div>
                                      <div className="col-md-3">
                                        <CustomInput
                                          id={`room_start_time`}
                                          name={`room_start_time`}
                                          label="Thời gian bắt đầu"
                                          placeholder="Chọn thời gian bắt đầu"
                                          initialValue=""
                                          inputType="datetime-local"
                                          isRequired={true}
                                          type="input"
                                          disabled={false}
                                          changeDelay={0}
                                          valueChange={(value) => setRoomStartDate(value)}
                                        />
                                      </div>
                                      <div className="col-md-4">
                                        <CustomInput
                                          id={`room_note`}
                                          name={`room_note`}
                                          label="Ghi chú"
                                          placeholder="Nhập ghi chú"
                                          initialValue=""
                                          inputType="text"
                                          isRequired={false}
                                          type="input"
                                          disabled={false}
                                          changeDelay={0}
                                          valueChange={(value) => setRoomNote(value)}
                                        />
                                      </div>
                                    </div>
                                  </div>

                                </div>
                              </div>
                            </div>
                          ) : ""}
                          {!selectedRoom && patientLog.is_inpatient !== "1" ? (
                            <div className="col-md-12">
                              <button
                                type="button"
                                className="btn btn-gradient"
                                style={{marginTop: "15px"}}
                                onClick={() => {toggleModal("openRoom")}}
                              >Thêm phòng</button>
                            </div>
                          ) : ""}
                        </div>
                      )}
                    </FieldArray>
                  </div>
                  <div className="body-footer">
                    <div className="button-list">
                      <button type="button" className="btn btn-outline" onClick={() => toggleModal("close")}>Thoát</button>
                      <button type="submit" className="btn btn-gradient">Tạo</button>
                    </div>
                  </div>
                </Form>
              )
            }}
          </Formik>
        )}
      </CustomModal>

      {/* Alert xoá dịch vụ */}
      <CustomModal
        headerTitle={"Xoá dịch vụ"}
        size="md"
        type="alert"
        ref={serviceDeleteModalRef}
      >
        <div className="body-content">
          Bạn có chắc chắn muốn xoá <b>{updateService?.item_name}</b>?
        </div>
        <div className="body-footer">
          <div className="button-list">
            <button type="button" className="btn btn-outline" onClick={() => toggleModal("close")}>Không</button>
            <button type="button" className="btn btn-gradient" onClick={() => deleteService()}>Xoá</button>
          </div>
        </div>
      </CustomModal>

      {/* Modal chọn phòng */}
      <CustomModal
        headerTitle={`Chọn phòng`}
        size="xl"
        type="modal"
        ref={serviceRoomModalRef}
      >
        <ServiceRoomModal
          saveRoom={(floor, room) => {
            checkSaveRoom(floor, room);
          }}
          initialSelectedRoom={selectedRoom}
          closeModal={() => toggleModal("closeRoom")}
          buildingList={buildingList}
          patientLog={patientLog}
        />
      </CustomModal>
    </>
  )
}