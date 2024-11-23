import { faTrash } from "@fortawesome/free-solid-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { FC, useRef, useState } from "react";
import { useToast } from "../../common/CustomToast";
import { FieldArray, Form, Formik, FormikHelpers, FormikProps } from "formik";
import { CustomInput, SelectOptionType } from "../../common/CustomInput";
import { CustomModal, CustomModalHandles } from "../../common/CustomModal";

export type ServiceProps = {
  patientLogId?: string;
}
export type ServiceList = {
  med_hist_id: string,
  patiend_id: string,
  item_name: string,
  amount: string,
  item_unit: string,
  item_note: string
}
export type ServiceFormType = {
  item_id: string,
  item_type: string,
  amount: string,
  price: string,
  item_note: string,
  start_time: string,
  end_time: string | null
}
type DynamicServiceFormType = {
  services: ServiceFormType[]
}
export type CreateServiceRequestType = {
  action: string,
  ptn_log_id: string,
  request?: ServiceFormType[]
}

export const ServiceTable:FC<ServiceProps> = ({patientLogId}) => {
  const {openToast} = useToast();
  const [serviceList, setServiceList] = useState<ServiceList[]>([]);
  const [serviceOptions, setServiceOptions] = useState<SelectOptionType[]>([]);

  const serviceDeleteModalRef = useRef<CustomModalHandles>(null);
  const serviceCreateModalRef = useRef<CustomModalHandles>(null);
  const serviceCreateFormRef = useRef<FormikProps<DynamicServiceFormType>>(null);
  const [serviceCreateInitialValue, setPresCreateInitialValue] = useState<DynamicServiceFormType>({
    services: [
      {
        item_id: "",
        item_type: "",
        amount: "",
        price: "",
        item_note: "",
        start_time: "",
        end_time: ""
      }
    ]
  })

  const toggleModal = (action: string) => {
    switch (action) {
      case "delete":
        if(serviceDeleteModalRef.current) {
          serviceDeleteModalRef.current.openModal();
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
                end_time: ""
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

      default:
        break;
    }
  }

  const submitService = async(value:DynamicServiceFormType, helpers: FormikHelpers<DynamicServiceFormType>) => {

  }

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
              {Array.from({ length: 30 }, (_, index) => index).map((item) => (
                <tr>
                  <td>Bộ dụng cụ tiêm insulin</td>
                  <td>bộ</td>
                  <td>69</td>
                  <td>Just use it god damn it</td>
                  <td>
                    <div className="table-button-list">
                      <button onClick={() => {}}>
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
                                isRequired={true}
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
    </>
  )
}