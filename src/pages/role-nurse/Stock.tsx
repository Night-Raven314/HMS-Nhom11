import { FC, useRef, useState } from "react";
import { Helmet } from "react-helmet";
import { NurseSidebar } from "../../components/common/NurseSidebar";
import { NavbarHandles, PageNavbar } from "../../components/common/PageNavbar";
import { UserSession } from "../../helpers/global";
import { Form, useNavigate } from "react-router-dom";
import { useToast } from "../../components/common/CustomToast";
import { FieldArray, Formik, FormikHelpers, FormikProps } from "formik";
import { CustomModal, CustomModalHandles } from "../../components/common/CustomModal";
import { faTrash } from "@fortawesome/free-solid-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { CustomInput } from "../../components/common/CustomInput";

export type StockFullListType = {
  stock_id: string;
  item_id: string;
  change_type: string;
  amount_changed: number;
  amount_final: number;
  stock_note: string | null;
  created_at: string;
  updated_at: string | null;
  status: string; 
}
export type StockListType = {
  item_id: string;
  item_name: string;
  amount_final: number;
}
export type StockFormType = {
  item_id: string;
  amount_final: string;
}
export type DynamicStockFormType = {
  stocks: StockFormType[]
}

export const NurseStock:FC = () => {
  const {openToast} = useToast();
  const navigate = useNavigate();

  const navbarRef = useRef<NavbarHandles>(null);
  const [searchKeyword, setSearchKeyword] = useState<string>("");

  const stockModalRef = useRef<CustomModalHandles>(null);
  const stockFormRef = useRef<FormikProps<DynamicStockFormType>>(null);
  const [initialValue, setInitialValue] = useState<DynamicStockFormType>({
    stocks: [{
      item_id: "",
      amount_final: ""
    }]
  })

  const toggleModal = (action: string) => {
    const clearForm = () => {
      setInitialValue({
        stocks: []
      })
      setTimeout(() => {
        setInitialValue({
          stocks: [{
            item_id: "",
            amount_final: ""
          }]
        })
      }, 0);
    }
    if (stockModalRef.current) {
      switch (action) {
        case "open":
          stockFormRef.current?.resetForm();
          clearForm();
          stockModalRef.current.openModal();
          break;
        case "close":
          stockModalRef.current.closeModal();
          break;

        default:
          break;
      }
    }
  }

  const submitStock = async(value:DynamicStockFormType, helpers: FormikHelpers<DynamicStockFormType>) => {

  }

  return (
    <>
      <Helmet>
        <title>
          Quản lý số lượng hàng - HKL
        </title>
      </Helmet>

      {UserSession ? (
        <div className="main-background">
          <div className="page-container">
            <div className="page-sidebar">
              {UserSession.auth_user_role === "nurse" ? (
                <NurseSidebar selectedItem={"stock"} />
              ) : ""}
            </div>
            <div className="page-content">
              <PageNavbar
                navbarTitle={`Thông tin kho hàng`}
                searchRequest={(keyword) => {setSearchKeyword(keyword)}}
                ref={navbarRef}
              />
              <div className="content">
                <div className="hms-table">
                  <div className="table-header">
                    <div className="header-title">Thông tin số lượng hàng thay đổi</div>
                    <div className="header-button">
                      <button className="btn btn-outline-primary btn-sm" onClick={() => {toggleModal("open")}}>
                        Cập nhật số lượng
                      </button>
                    </div>
                  </div>
                  <div className="table-body">
                    <table>
                      <thead>
                        <tr>
                          <th style={{ width: "120px" }}>Bệnh nhân</th>
                          <th style={{ width: "120px" }}>Bác sỹ</th>
                          <th style={{ width: "100px" }}>Chuyên khoa</th>
                          <th style={{ width: "120px" }}>Ngày hẹn</th>
                          <th style={{ width: "100px" }}>Thành tiền</th>
                        </tr>
                      </thead>
                      <tbody>
                        
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
        headerTitle={`Cập nhật số lượng`}
        size="xl"
        type="modal"
        ref={stockModalRef}
      >
        <Formik
          validateOnChange={true}
          validateOnBlur={true}
          enableReinitialize={true}
          initialValues={initialValue}
          validate={() => {}}
          innerRef={stockFormRef}
          onSubmit={submitStock}
        >
          {(formikProps) => {
            return (
              <Form>
                <div className="body-content">
                  <FieldArray name="stocks">
                    {({push, remove}) => (
                      <div>
                        {formikProps.values.stocks.map((_, index) => (
                          <div className="row" key={index} style={{marginBottom: "15px"}}>
                            {/* <div className="col-md-4">
                              <CustomInput
                                formik={formikProps}
                                id={`stocks[${index}]item_id`}
                                name={`stocks[${index}]item_id`}
                                label="Thuốc"
                                placeholder=""
                                initialValue=""
                                inputType="text"
                                isRequired={true}
                                selectOptions={medOptions}
                                type="select"
                                disabled={false}
                              />
                            </div> */}
                            <div className="col-md-1">
                              {formikProps.values.stocks.length > 1 ? (
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

    </>
  )
}