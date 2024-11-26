import { FC, useEffect, useRef, useState } from "react";
import { Helmet } from "react-helmet";
import { NurseSidebar } from "../../components/common/NurseSidebar";
import { NavbarHandles, PageNavbar } from "../../components/common/PageNavbar";
import { UserSession } from "../../helpers/global";
import { useNavigate } from "react-router-dom";
import { useToast } from "../../components/common/CustomToast";
import { FieldArray, Form, Formik, FormikHelpers, FormikProps } from "formik";
import { CustomModal, CustomModalHandles } from "../../components/common/CustomModal";
import { faTrash } from "@fortawesome/free-solid-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { CustomInput, SelectOptionType } from "../../components/common/CustomInput";
import { apiGetAllItem, apiGetNurseStock, apiGetNurseStockInfo, apiUpdateNurseStock } from "../../helpers/axios";
import { ItemListType } from "../role-admin/Item";
import { convertISOToDateTime } from "../../helpers/utils";

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
  stock_id: string;
  updated_by: string;
  item_id: string;
  item_name: string;
  amount_final: number;
  created_at: string
}
export type StockFormType = {
  item_id: string;
  action: string;
  amount: string;
  note: string;
}
export type DynamicStockFormType = {
  stocks: StockFormType[]
}
export type StockRequestType = {
  auth_user_id: string;
  request: StockFormType[];
}
export type StockInfoType = {

}

export const NurseStock:FC = () => {
  const {openToast} = useToast();
  const navigate = useNavigate();

  const navbarRef = useRef<NavbarHandles>(null);
  const [searchKeyword, setSearchKeyword] = useState<string>("");

  const [itemList, setItemList] = useState<ItemListType[]>([]);
  const [itemOptions, setItemOptions] = useState<SelectOptionType[]>([]);
  const [stockList, setStockList] = useState<StockListType[]>([]);

  const [viewInfo, setViewInfo] = useState<StockInfoType[]>([]);
  const infoModalRef = useRef<CustomModalHandles>(null);
  const stockModalRef = useRef<CustomModalHandles>(null);
  const stockFormRef = useRef<FormikProps<DynamicStockFormType>>(null);
  const [initialValue, setInitialValue] = useState<DynamicStockFormType>({
    stocks: [{
      item_id: "",
      action: "",
      amount: "",
      note: ""
    }]
  })

  const stockChangeOptions:SelectOptionType[] = [
    {
      value: "",
      label: "Chọn thay đổi"
    },
    {
      value: "addition",
      label: "Thêm"
    },
    {
      value: "deduction",
      label: "Giảm"
    }
  ]

  const getStockInfo = async(itemId:string) => {
    const getItem = await apiGetNurseStockInfo(itemId);
    if(getItem.error) {
      openToast("error", "Lỗi", "Đã xảy ra lỗi khi lấy danh sách tầng!", 5000);
    } else if (getItem.data) {

    }
  }

  const toggleModal = (action: string, itemId?:string) => {
    const clearForm = () => {
      setInitialValue({
        stocks: []
      })
      setTimeout(() => {
        setInitialValue({
          stocks: [{
            item_id: "",
            action: "",
            amount: "",
            note: ""
          }]
        })
      }, 0);
    }
    switch (action) {
      case "openInfo":
        if(itemId) {
          getStockInfo(itemId);
          infoModalRef.current?.openModal();
        }
        break;
      case "closeInfo":
        infoModalRef.current?.closeModal();
        break;
      case "open":
        stockFormRef.current?.resetForm();
        clearForm();
        stockModalRef.current?.openModal();
        break;
      case "close":
        stockModalRef.current?.closeModal();
        break;

      default:
        break;
    }
  }

  const submitStock = async(value:DynamicStockFormType, helpers: FormikHelpers<DynamicStockFormType>) => {
    let formValid = true;
    value.stocks.every(item => {
      if(!item.item_id || !item.amount || !item.action) {
        formValid = false;
        return false;
      }
      return true;
    })
    if(formValid && UserSession) {
      const result = await apiUpdateNurseStock({
        auth_user_id: UserSession.auth_user_id,
        request: value.stocks
      });
      if(result.error) {
        openToast("error", "Lỗi", `Đã xảy ra lỗi khi lưu thông tin!`, 5000);
      } else if(result.data) {
        openToast("success", "Thành công", `Đã cập nhật số lượng sản phẩm!`, 5000);
        toggleModal("close");
        getStock();
      }
    } else {
      openToast("error", "Lỗi biểu mẫu", "Một số sản phẩm chưa điền đủ thông tin!", 5000);
    }
  }

  const getStock = async() => {
    const getItem = await apiGetNurseStock();
    if(getItem.error) {
      openToast("error", "Lỗi", "Đã xảy ra lỗi khi lấy danh sách tầng!", 5000);
    } else if (getItem.data) {
      let tmpStockList:StockListType[] = [];
      getItem.data.forEach((item:StockListType) => {
        const findProduct = itemList.find(product => product.item_id === item.item_id);
        if(findProduct) {
          tmpStockList.push({
            stock_id: item.stock_id,
            updated_by: item.updated_by,
            created_at: convertISOToDateTime(item.created_at),
            item_id: item.item_id,
            item_name: findProduct.item_name,
            amount_final: item.amount_final
          })
        }
      })
      setStockList(tmpStockList);
    }
  }

  const getAllItem = async() => {
    const getAllItem = await apiGetAllItem();
    if(getAllItem.error) {
      openToast("error", "Lỗi", "Đã xảy ra lỗi khi lấy danh sách tầng!", 5000);
    } else if (getAllItem.data) {
      let tmpItemList:ItemListType[] = [];
      getAllItem.data.item.forEach((item:ItemListType) => {
        tmpItemList.push(item)
      })
      getAllItem.data.meds.forEach((item:ItemListType) => {
        tmpItemList.push(item)
      })
      let tmpItemOptions:SelectOptionType[] = [{
        value: "",
        label: "Chọn sản phẩm"
      }];
      tmpItemList.forEach(item => {
        tmpItemOptions.push({
          value: item.item_id,
          label: item.item_name
        })
      })
      setItemList(tmpItemList);
      setItemOptions(tmpItemOptions);
    }
  }

  useEffect(() => {
    getAllItem();
  }, [])
  useEffect(() => {
    if(itemList.length) {
      getStock();
    }
  }, [itemList])

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
                          <th style={{ width: "200px" }}>Người cập nhật</th>
                          <th style={{ width: "200px" }}>Tên sản phẩm</th>
                          <th style={{ width: "100px" }}>Số lượng</th>
                          <th style={{ width: "200px" }}>Lần cập nhật cuối</th>
                        </tr>
                      </thead>
                      <tbody>
                        {stockList.map((item) => (
                          <tr key={item.stock_id} onClick={() => toggleModal("openInfo", item.item_id)} style={{cursor: "pointer"}}>
                            <td>{item.updated_by}</td>
                            <td>{item.item_name}</td>
                            <td>{item.amount_final}</td>
                            <td>{item.created_at}</td>
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
        headerTitle={`Cập nhật số lượng`}
        size="lg"
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
                          <div className="row" key={index} style={{marginBottom: "15px", paddingBottom: "10px", borderBottom: "1px solid #c4c4c4"}}>
                            <div className="col-md-6">
                              <CustomInput
                                formik={formikProps}
                                id={`stocks[${index}]item_id`}
                                name={`stocks[${index}]item_id`}
                                label="Sản phẩm"
                                placeholder=""
                                initialValue=""
                                inputType="text"
                                isRequired={true}
                                selectOptions={itemOptions}
                                type="select"
                                disabled={false}
                              />
                            </div>
                            <div className="col-md-3">
                              <CustomInput
                                formik={formikProps}
                                id={`stocks[${index}]action`}
                                name={`stocks[${index}]action`}
                                label="Thay đổi"
                                placeholder=""
                                initialValue=""
                                inputType="text"
                                isRequired={true}
                                selectOptions={stockChangeOptions}
                                type="select"
                                disabled={false}
                              />
                            </div>
                            <div className="col-md-2">
                              <CustomInput
                                formik={formikProps}
                                id={`stocks[${index}]amount`}
                                name={`stocks[${index}]amount`}
                                label="Số lượng"
                                placeholder="Nhập số lượng"
                                initialValue=""
                                inputType="text"
                                isRequired={true}
                                type="input"
                                disabled={false}
                              />
                            </div>
                            <div className="col-md-1">
                              {formikProps.values.stocks.length > 1 ? (
                                <button
                                  type="button"
                                  className="btn btn-gradient form-delete-btn"
                                  onClick={() => {
                                    remove(index)
                                  }}
                                ><FontAwesomeIcon icon={faTrash} /></button>
                              ) : ""}
                            </div>
                            <div className="col-md-11">
                              <CustomInput
                                formik={formikProps}
                                id={`stocks[${index}]note`}
                                name={`stocks[${index}]note`}
                                label="Ghi chú"
                                placeholder="Nhập ghi chú"
                                initialValue=""
                                inputType="text"
                                isRequired={false}
                                type="input"
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
                                item_id: "",
                                amount: ""
                              })
                            }}
                          >Thêm sản phẩm</button>
                        </div>
                      </div>
                    )}
                  </FieldArray>
                </div>
                <div className="body-footer">
                  <div className="button-list">
                    <button type="button" className="btn btn-outline" onClick={() => toggleModal("close")}>Thoát</button>
                    <button type="submit" className="btn btn-gradient">Cập nhật</button>
                  </div>
                </div>
              </Form>
            )
          }}
        </Formik>
      </CustomModal>

      <CustomModal
        headerTitle={"Thông tin cập nhật sản phẩm"}
        size="xl"
        type="modal"
        ref={infoModalRef}
      >
        {/* <div className="body-content">
          {viewInfo.length ? (
            <>
              <div className="hms-table no-header full-height" style={{marginBottom: "30px"}}>
                <div className="table-body">
                  <table>
                    <thead>
                      <tr>
                        <th style={{ width: "150px" }}>Tên sản phẩm</th>
                        <th style={{ width: "140px" }}>Đơn vị</th>
                        <th style={{ width: "50px" }}>Số lượng</th>
                        <th style={{ width: "100px" }}>Đơn giá</th>
                        <th style={{ width: "100px" }}>Tổng</th>
                        <th style={{ width: "140px" }}>Ghi chú</th>
                      </tr>
                    </thead>
                    <tbody>
                      {viewInfo.map((payment, index) => (
                        <tr key={index}>
                          <td>{payment.full_name}</td>
                          <td>{payment.fac_name}</td>
                          <td>{payment.amount}</td>
                          <td>{payment.appt_fee}</td>
                          <td>{payment.total_value}</td>
                          <td>{payment.item_note}</td>
                        </tr>
                      ))}
                    </tbody>
                  </table>
                </div>
              </div>
            </>
          ) : (
            <div>Không có dữ liệu</div>
          )}
        </div> */}
        <div className="body-footer">
          <div className="button-list">
            <button type="button" className="btn btn-outline" onClick={() => toggleModal("closeInfo")}>Đóng</button>
          </div>
        </div>
      </CustomModal>

    </>
  )
}