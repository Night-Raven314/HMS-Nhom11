import { faTrash } from "@fortawesome/free-solid-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { FC, useEffect, useRef, useState } from "react";
import { useToast } from "../../common/CustomToast";
import { FieldArray, Form, Formik, FormikHelpers, FormikProps } from "formik";
import { CustomInput, SelectOptionType } from "../../common/CustomInput";
import { CustomModal, CustomModalHandles } from "../../common/CustomModal";
import { ItemListType } from "../../../pages/role-admin/Item";
import { apiGetItem, aptGetService, aptUpdateService } from "../../../helpers/axios";

export type ServiceProps = {
  patientLogId?: string;
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
  amount: string,
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

export const ServiceTable:FC<ServiceProps> = ({patientLogId}) => {
  const {openToast} = useToast();
  const [serviceTable, setServiceTable] = useState<ServiceTableType[]>([]);
  const [serviceList, setServiceList] = useState<ItemListType[]>([]);
  const [serviceOptions, setServiceOptions] = useState<SelectOptionType[]>([]);

  const serviceDeleteModalRef = useRef<CustomModalHandles>(null);
  const serviceCreateModalRef = useRef<CustomModalHandles>(null);
  const serviceCreateFormRef = useRef<FormikProps<DynamicServiceFormType>>(null);
  const [updateService, setUpdateService] = useState<ServiceTableType | null>(null);
  const [serviceCreateInitialValue, setPresCreateInitialValue] = useState<DynamicServiceFormType>({
    services: [
      {
        item_id: "",
        item_type: "",
        amount: "",
        price: "",
        item_note: "",
        start_time: "",
        end_time: "",
        is_lending: "false"
      }
    ]
  })

  const serviceRoomModalRef = useRef<CustomModalHandles>(null);

  const getServiceTable = async() => {
    if(patientLogId) {
      const result = await aptGetService(patientLogId);
      if(result.error) {
        openToast("error", "Lỗi", "Đã xảy ra lỗi khi lấy thông tin!", 5000);
      } else if (result.data) {
        setServiceTable(result.data);
      }
    }
  }

  const getServiceList = async() => {
    const getItem = await apiGetItem("item");
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

  const toggleModal = (action: string, item?:ServiceTableType) => {
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
        serviceCreateFormRef.current?.resetForm();
        setPresCreateInitialValue({
          services: []
        })
        setTimeout(() => {
          setPresCreateInitialValue({
            services: [
              {
                item_id: "",
                item_type: "",
                amount: "",
                price: "",
                item_note: "",
                start_time: "",
                end_time: "",
                is_lending: "false"
              }
            ]
          })
        }, 0);
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

  const submitService = async(value:DynamicServiceFormType, helpers: FormikHelpers<DynamicServiceFormType>) => {
    let formValid = true;
    value.services.every(item => {
      if(!item.amount || !item.start_time || item.item_id === "none") {
        formValid = false;
        return false;
      }
      return true;
    })
    if(formValid && patientLogId) {
      let tmpRequest:ServiceFormType[] = JSON.parse(JSON.stringify(value.services));
      tmpRequest.forEach(service => {
        const findService = serviceList.find(lService => lService.item_id === service.item_id);
        if(findService) {
          service.price = findService.item_price;
          service.item_type = "item";
          service.is_lending = findService.item_lending_price === "0" ? "false" : "true";
        } else {
          service.price = "0";
          service.item_type = "item";
        }
        service.end_time = null;
      })
      const result = await aptUpdateService({
        action: "create",
        ptn_log_id: patientLogId,
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
      const result = await aptUpdateService({
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

  useEffect(() => {
    getServiceList();
  }, [])
  useEffect(() => {
    if(patientLogId) {
      getServiceTable();
    }
  }, [patientLogId])

  return (
    <>
      <div className="hms-table">
        <div className="table-header">
          <div className="header-title">Dịch vụ</div>
          <div className="header-button">
            <button className="btn btn-outline-primary btn-sm" onClick={() => {toggleModal("open")}}>
              Thêm dịch vụ
            </button>
          </div>
        </div>
        <div className="table-body">
          <table>
            <thead>
              <tr>
                <th style={{ width: "100px" }}>Tên dịch vụ</th>
                <th style={{ width: "45px" }}>Đơn vị</th>
                <th style={{ width: "45px" }}>Số lượng</th>
                <th style={{ width: "150px" }}>Ghi chú</th>
                <th style={{ width: "50px" }}>Thao tác</th>
              </tr>
            </thead>
            <tbody>
              {serviceTable.map((item) => (
                <tr key={item.fac_asmt_id}>
                  <td>{item.item_name}</td>
                  <td>{item.item_unit}</td>
                  <td>{item.amount}</td>
                  <td>{item.item_note}</td>
                  <td>
                    <div className="table-button-list">
                      <button onClick={() => {toggleModal("delete", item)}}>
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
      <CustomModal
        headerTitle={`Thêm dịch vụ`}
        size="xl"
        type="modal"
        ref={serviceCreateModalRef}
      >
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
                          <div className="row" key={index} style={{marginBottom: "15px", paddingBottom: "10px", borderBottom: "1px solid #c4c4c4"}}>
                            <div className="col-md-6">
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
                            <div className="col-md-4">
                              <CustomInput
                                formik={formikProps}
                                id={`services[${index}]start_time`}
                                name={`services[${index}]start_time`}
                                label="Thời gian bắt đầu"
                                placeholder="Chọn thời gian bắt đầu"
                                initialValue=""
                                inputType="datetime-local"
                                isRequired={true}
                                type="input"
                                disabled={false}
                              />
                            </div>
                            <div className="col-md-11">
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
                              {formikProps.values.services.length > 1 ? (
                                <button
                                  type="button"
                                  className="btn btn-gradient delete-btn"
                                  onClick={() => {
                                    remove(index)
                                  }}
                                ><FontAwesomeIcon icon={faTrash} /></button>
                              ) : ""}
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
                        <div className="col-md-12">
                          <button
                            type="button"
                            className="btn btn-gradient"
                            style={{marginTop: "15px"}}
                            onClick={() => {toggleModal("openRoom")}}
                          >Thêm phòng</button>
                        </div>
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
        <div className="body-content">

        </div>
        <div className="body-footer">
          <div className="button-list">
            <button type="button" className="btn btn-outline" onClick={() => toggleModal("closeRoom")}>Thoát</button>
            <button type="submit" className="btn btn-gradient">Tạo</button>
          </div>
        </div>
      </CustomModal>
    </>
  )
}