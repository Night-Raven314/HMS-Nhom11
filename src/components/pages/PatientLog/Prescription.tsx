import { FC, Fragment, useEffect, useRef, useState } from "react";
import { apiGetItem, apiGetPrescription, apiUpdatePrescription } from "../../../helpers/axios";
import { useToast } from "../../common/CustomToast";
import { ItemListType } from "../../../pages/role-admin/Item";
import { CustomInput, SelectOptionType } from "../../common/CustomInput";
import { FieldArray, Form, Formik, FormikHelpers, FormikProps } from "formik";
import { CustomModal, CustomModalHandles } from "../../common/CustomModal";
import { faTrash } from "@fortawesome/free-solid-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";

export type PrescriptionProps = {
  selectedMedHistId: string | null;
  treatmentCompleted: boolean;
  userRole:string | null
}
export type PrescriptionList = {
  med_hist_id: string,
  patient_id: string,
  item_name: string,
  amount: string,
  item_unit: string,
  item_note: string
}
export type PrescriptionFormType = {
  item_id: string,
  amount: string,
  price: string,
  item_note: string
}
type DynamicPrescriptionFormType = {
  meds: PrescriptionFormType[]
}
export type CreatePrescriptionRequestType = {
  action: string,
  med_hist_id: string,
  request?: PrescriptionFormType[]
}

export const PrescriptionTable:FC<PrescriptionProps> = ({
  selectedMedHistId, treatmentCompleted, userRole
}) => {
  const {openToast} = useToast();
  const [presList, setPresList] = useState<PrescriptionList[]>([]);

  const [medList, setMedList] = useState<ItemListType[]>([]);
  const [medOptions, setMedOptions] = useState<SelectOptionType[]>([]);

  const presDeleteModalRef = useRef<CustomModalHandles>(null);
  const presCreateModalRef = useRef<CustomModalHandles>(null);
  const presCreateFormRef = useRef<FormikProps<DynamicPrescriptionFormType>>(null);
  const [presCreateInitialValue, setPresCreateInitialValue] = useState<DynamicPrescriptionFormType>({
    meds: [
      {
        item_id: "",
        amount: "",
        price: "",
        item_note: ""
      }
    ]
  })

  const getPrescription = async() => {
    if(selectedMedHistId) {
      const result = await apiGetPrescription(selectedMedHistId);
      if(result.error) {
        openToast("error", "Lỗi", "Đã xảy ra lỗi khi lấy thông tin!", 5000);
      } else if (result.data) {
        setPresList(result.data);
      }
    }
  }
  const getMedList = async() => {
    const getItem = await apiGetItem("meds");
    if(getItem.error) {
      openToast("error", "Lỗi", `Đã xảy ra lỗi khi lấy thông tin!`, 5000);
    } else if (getItem.data) {
      setMedList(getItem.data);
      const tmpMedList:ItemListType[] = getItem.data;
      tmpMedList.sort((a, b) => {
        if (a.item_name < b.item_name) return -1;
        if (a.item_name > b.item_name) return 1;
        return 0;
      });
      
      let tmpMedOptions: SelectOptionType[] = [{
        value: "none",
        label: "Chọn thuốc"
      }];
      tmpMedList.forEach(med => {
        tmpMedOptions.push({
          value: med.item_id,
          label: `${med.item_name} (${med.item_price}đ/${med.item_unit})`
        })
      })
      setMedOptions(tmpMedOptions)
    }
  }

  const toggleModal = (action: string) => {
    switch (action) {
      case "delete":
        if(presDeleteModalRef.current) {
          presDeleteModalRef.current.openModal();
        }
        break;
      case "open":
        presCreateFormRef.current?.resetForm();
        setPresCreateInitialValue({
          meds: []
        })
        setTimeout(() => {
          setPresCreateInitialValue({
            meds: [
              {
                item_id: "",
                amount: "",
                price: "",
                item_note: ""
              }
            ]
          })
        }, 0);
        if(presCreateModalRef.current) {
          presCreateModalRef.current.openModal();
        }
        break;
      case "close":
        if(presCreateModalRef.current) {
          presCreateModalRef.current.closeModal();
        }
        if(presDeleteModalRef.current) {
          presDeleteModalRef.current.closeModal();
        }
        break;

      default:
        break;
    }
  }

  const submitPrescription = async(value:DynamicPrescriptionFormType, helpers: FormikHelpers<DynamicPrescriptionFormType>) => {
    let formValid = true;
    value.meds.every(item => {
      if(!item.amount || !item.item_note || item.item_id === "none") {
        formValid = false;
        return false;
      }
      return true;
    })
    if(formValid && selectedMedHistId) {
      let tmpRequest:PrescriptionFormType[] = JSON.parse(JSON.stringify(value.meds));
      tmpRequest.forEach(med => {
        const findMed = medList.find(lMed => lMed.item_id === med.item_id);
        if(findMed) {
          med.price = findMed.item_price;
        } else {
          med.price = "0";
        }
      })
      const result = await apiUpdatePrescription({
        action: "create",
        med_hist_id: selectedMedHistId,
        request: tmpRequest
      });
      if(result.error) {
        openToast("error", "Lỗi", `Đã xảy ra lỗi khi lưu thông tin!`, 5000);
      } else if(result.data) {
        openToast("success", "Thành công", `Đơn thuốc đã được tạo!`, 5000);
        toggleModal("close");
        getPrescription();
      }
    } else {
      openToast("error", "Lỗi biểu mẫu", "Một số thuốc chưa điền đủ thông tin!", 5000);
    }
  }
  const deletePres = async() => {
    if(selectedMedHistId) {
      const result = await apiUpdatePrescription({
        action: "delete",
        med_hist_id: selectedMedHistId
      });
      if(result.error) {
        openToast("error", "Lỗi", `Đã xảy ra lỗi khi xoá thông tin!`, 5000);
      } else if(result.data) {
        toggleModal("close");
        getPrescription();
      }
    }
  }

  useEffect(() => {
    getMedList();
  }, [])
  useEffect(() => {
    if(selectedMedHistId) {
      getPrescription();
    }
  }, [selectedMedHistId])

  return (
    <>
      <div className="hms-table">
        <div className="table-header">
          <div className="header-title">Đơn thuốc</div>
          {selectedMedHistId && !treatmentCompleted && userRole === "doctor" ? (
            <div className="header-button">
              {presList.length ? (
                <button className="btn btn-outline-primary btn-sm btn-delete" onClick={() => {toggleModal("delete")}}>
                  Xoá
                </button>
              ) : (
                <button className="btn btn-outline-primary btn-sm" onClick={() => {toggleModal("open")}}>
                  Tạo
                </button>
              )}
            </div>
          ) : ""}
        </div>
        <div className="table-body">
          {selectedMedHistId ? (
            <Fragment>
              {presList.length ? (
                <table>
                  <thead>
                    <tr>
                      <th style={{ width: "100px" }}>Tên thuốc</th>
                      <th style={{ width: "45px" }}>Đơn vị</th>
                      <th style={{ width: "45px" }}>Số lượng</th>
                      <th style={{ width: "150px" }}>Ghi chú</th>
                    </tr>
                  </thead>
                  <tbody>
                    {presList.map((item) => (
                      <tr key={item.item_name}>
                        <td>{item.item_name}</td>
                        <td>{item.item_unit}</td>
                        <td>{item.amount}</td>
                        <td>{item.item_note}</td>
                      </tr>
                    ))}
                  </tbody>
                </table>
              ) : (
                <div className="table-center-alert">Lịch sử kiểm tra sức khoẻ này chưa có đơn thuốc{userRole === "doctor" ? ", bấm Tạo để tạo đơn thuốc." : "" }</div>
              )}
            </Fragment>
          ) : (
            <div className="table-center-alert">Hãy chọn một lịch sử kiểm tra sức khoẻ để xem đơn thuốc</div>
          )}
        </div>
      </div> 

      <CustomModal
        headerTitle={`Tạo đơn thuốc`}
        size="xl"
        type="modal"
        ref={presCreateModalRef}
      >
        <Formik
          validateOnChange={true}
          validateOnBlur={true}
          enableReinitialize={true}
          initialValues={presCreateInitialValue}
          validate={() => {}}
          innerRef={presCreateFormRef}
          onSubmit={submitPrescription}
        >
          {(formikProps) => {
            return (
              <Form>
                <div className="body-content">
                  <FieldArray name="meds">
                    {({push, remove}) => (
                      <div>
                        {formikProps.values.meds.map((_, index) => (
                          <div className="row" key={index} style={{marginBottom: "15px"}}>
                            <div className="col-md-4">
                              <CustomInput
                                formik={formikProps}
                                id={`meds[${index}]item_id`}
                                name={`meds[${index}]item_id`}
                                label="Thuốc"
                                placeholder=""
                                initialValue=""
                                inputType="text"
                                isRequired={true}
                                selectOptions={medOptions}
                                type="select"
                                disabled={false}
                              />
                            </div>
                            <div className="col-md-2">
                              <CustomInput
                                formik={formikProps}
                                id={`meds[${index}]amount`}
                                name={`meds[${index}]amount`}
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
                                id={`meds[${index}]item_note`}
                                name={`meds[${index}]item_note`}
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
                              {formikProps.values.meds.length > 1 ? (
                                <button
                                  type="button"
                                  className="btn btn-gradient form-delete-btn"
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
                          >Thêm thuốc</button>
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

      {/* Alert xoá đơn thuốc */}
      <CustomModal
        headerTitle={"Xoá đơn thuốc"}
        size="md"
        type="alert"
        ref={presDeleteModalRef}
      >
        <div className="body-content">
          Bạn có chắc chắn muốn xoá đơn thuốc này?
        </div>
        <div className="body-footer">
          <div className="button-list">
            <button type="button" className="btn btn-outline" onClick={() => toggleModal("close")}>Không</button>
            <button type="button" className="btn btn-gradient" onClick={() => deletePres()}>Xoá</button>
          </div>
        </div>
      </CustomModal>
    </>
  )
}