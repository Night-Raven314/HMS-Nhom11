import { faPenToSquare, faTrash } from "@fortawesome/free-solid-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { FC, useEffect, useRef, useState } from "react";
import { Helmet } from "react-helmet";
import { AdminSidebar } from "../../components/common/AdminSidebar";
import { NavbarHandles, PageNavbar } from "../../components/common/PageNavbar";
import { CustomModal, CustomModalHandles } from "../../components/common/CustomModal";
import { Form, Formik, FormikProps } from "formik";
import { CustomInput } from "../../components/common/CustomInput";
import { apiUpdateItem, apiGetItem } from "../../helpers/axios";
import { useToast } from "../../components/common/CustomToast";

export type ItemFormType = {
  itemName?: string,
  price?: string,
  unit?: string,
}

export type ItemListType = {
  item_id: string;
  item_name: string;
  item_price: string;
  item_lending_price: string;
  item_unit: string;
  created_at: string;
  updated_at: string;
  status: string;
};

export type ItemRequestType = ItemFormType & {
  action: string;
  pageType: string;
  itemId: string | null;
}

export type AdminItemProps = {
  pageType: "item" | "meds" | "med_service"
}

export const AdminItem: FC<AdminItemProps> = ({pageType}) => {
  const {openToast} = useToast();

  const navbarRef = useRef<NavbarHandles>(null);

  const updateModalRef = useRef<CustomModalHandles>(null);
  const deleteAlertRef = useRef<CustomModalHandles>(null);
  const updateFormRef = useRef<FormikProps<ItemFormType>>(null);

  const [initialValue, setInitialValue] = useState<ItemFormType>({
    itemName: "",
    unit: "",
    price: "",
  })
  const [updateItemId, setUpdateItemId] = useState<string | null>(null);
  const [searchKeyword, setSearchKeyword] = useState<string>("");
  const [itemList, setItemList] = useState<ItemListType[]>([]);
  const [itemListFiltered, setItemListFiltered] = useState<ItemListType[]>([]);

  const itemOption = {
    item: [
      { value: "", label: "Chọn đơn vị tính" },
      { value: "gói", label: "Gói" },
      { value: "hộp", label: "Hộp" },
      { value: "cái", label: "Cái" },
      { value: "bộ", label: "Bộ" },
      { value: "bình", label: "Bình" },
      { value: "chai", label: "Chai" }
    ],
    meds: [
      { value: "", label: "Chọn đơn vị tính" },
      {value: "viên", label: "Viên"},
      {value: "gói", label: "Gói"},
      {value: "hộp", label: "Hộp"},
    ],
    med_service: [
      { value: "lần", label: "Lần" }
    ]
  }

  const pageTerm = pageType === "item" ? "vật tư" : (pageType === "meds" ? "thuốc" : "dịch vụ y tế");

  const getItemDeleteInfo = (itemId:string | null, param: "item_name") => {
    const findItem = itemList.find(item => item.item_id === itemId);
    if(findItem) {
      return findItem[param];
    } else {
      return ""
    }
  }

  useEffect(() => {
    getItemList();
  }, [pageType])

  const validate = (value: ItemFormType) => {
    let errors: ItemFormType = {};
    if (!value.itemName) {
      errors.itemName = "Trường này không được bỏ trống!";
    }
    if (!value.price) {
      errors.price = "Trường này không được bỏ trống!";
    }
    if (!value.unit) {
      errors.unit = "Hãy lựa chọn đơn vị tính!";
    }
    return errors;
  }

  const toggleUpdateModal = (action: string, itemId?:string) => {
    if (updateModalRef.current) {
      switch (action) {
        case "open":
          updateFormRef.current?.resetForm();
          setUpdateItemId(itemId ? itemId : null);
          if(itemId) {
            const findItem = itemList.find(item => item.item_id === itemId);
            if(findItem) {
              setInitialValue({
                itemName: findItem.item_name,
                unit: findItem.item_unit,
                price: findItem.item_price,
              })
            } else {
              setInitialValue({
                itemName: "",
                unit: pageType === "med_service" ? "lần" : "",
                price: "",
              })
            }
          } else {
            setInitialValue({
              itemName: "",
              unit: pageType === "med_service" ? "lần" : "",
              price: "",
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
  const toggleDeleteAlert = (action: string, itemId?:string) => {
    if (deleteAlertRef.current) {
      switch (action) {
        case "open":
          setUpdateItemId(itemId ? itemId : null);
          deleteAlertRef.current.openModal();
          break;
        case "close":
          deleteAlertRef.current.closeModal();
          break;

        default:
          break;
      }
    }
  }

  const submitUpdateItem = async(value:ItemFormType, action:string) => {
    const itemRequest: ItemRequestType = {
      ...value,
      pageType: pageType,
      action: action,
      itemId: updateItemId
    }
    const updateResponse = await apiUpdateItem(itemRequest);
    if(updateResponse.error) {
      openToast("error", "Lỗi", "Đã xảy ra lỗi khi tạo mục!", 5000);
    } else if (updateResponse.data) {
      openToast("success", "Thành công", updateItemId ? `${pageTerm} đã được cập nhật` : `${pageTerm} đã được tạo`, 5000);
      toggleUpdateModal("close");
      getItemList();
    }
  }
  const deleteItem = async() => {
    const itemRequest: ItemRequestType = {
      pageType: pageType,
      action: "delete",
      itemId: updateItemId
    }
    const updateResponse = await apiUpdateItem(itemRequest);
    if(updateResponse.error) {
      openToast("error", "Lỗi", `Đã xảy ra lỗi khi xoá ${pageTerm}!`, 5000);
    } else if (updateResponse.data) {
      openToast("success", "Thành công", `${pageTerm} đã xoá`, 5000);
      toggleDeleteAlert("close");
      getItemList();
    }
  }
  const getItemList = async() => {
    const getItem = await apiGetItem(pageType);
    if(getItem.error) {
      openToast("error", "Lỗi", `Đã xảy ra lỗi khi lấy thông tin ${pageTerm}!`, 5000);
    } else if (getItem.data) {
      setItemList(getItem.data);
    }
  }
  const searchItem = () => {
    if(searchKeyword) {
      const searchKeywordLower = searchKeyword.toLowerCase();
      const filterList = itemList.filter(item => item.item_name.toLowerCase().includes(searchKeywordLower));
      setItemListFiltered(filterList);
    } else { 
      setItemListFiltered(itemList);
    }
  }
  useEffect(() => {
    searchItem();
  }, [itemList, searchKeyword])

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
            <AdminSidebar selectedItem={pageType} />
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
                        <th style={{ width: "200px" }}>Tên {pageTerm}</th>
                        <th style={{ width: "65px" }}>Đơn giá</th>
                        <th style={{ width: "140px" }}>Loại</th>
                        <th style={{ width: "140px" }}>Ngày tạo</th>
                        <th style={{ width: "140px" }}>Ngày chỉnh sửa</th>
                        <th style={{ width: "100px" }}>Thao tác</th>
                      </tr>
                    </thead>
                    <tbody>
                      {itemListFiltered.map((item) => (
                        <tr key={item.item_id}>
                          <td className="text-color">{item.item_name}</td>
                          <td>{item.item_price}</td>
                          <td>{item.item_unit}</td>
                          <td>{item.created_at}</td>
                          <td>{item.updated_at ? item.updated_at : ""}</td>
                          <td>
                            <div className="table-button-list">
                              <button onClick={() => toggleUpdateModal("open", item.item_id)}>
                                <FontAwesomeIcon icon={faPenToSquare} />
                              </button>
                              <button onClick={() => toggleDeleteAlert("open", item.item_id)}>
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

      {/* Form tạo/cập nhật mục */}
      <CustomModal
        headerTitle={updateItemId ? `Cập nhật ${pageTerm}` : `Tạo ${pageTerm}`}
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
            submitUpdateItem(values, updateItemId ? "update" : "create")
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
                        id="itemName"
                        name="itemName"
                        label={`Tên ${pageTerm}`}
                        placeholder={`Nhập ${pageTerm}`}
                        initialValue=""
                        inputType="text"
                        isRequired={true}
                        type="input"
                        disabled={false}
                      />
                    </div>
                    <div className="col-md-6">
                      <CustomInput
                        formik={formikProps}
                        id="price"
                        name="price"
                        label="Đơn giá"
                        placeholder="Nhập đơn giá"
                        initialValue=""
                        inputType="text"
                        isRequired={true}
                        type="input"
                        disabled={false}
                      />
                    </div>
                    <div className="col-md-6">
                      <CustomInput
                        formik={formikProps}
                        id="unit"
                        name="unit"
                        label="Đơn vị tính"
                        placeholder=""
                        initialValue=""
                        inputType="text"
                        isRequired={true}
                        selectOptions={itemOption[pageType]}
                        type="select"
                        disabled={false}
                      />
                    </div>
                  </div>
                </div>
                <div className="body-footer">
                  <div className="button-list">
                    <button type="button" className="btn btn-outline" onClick={() => toggleUpdateModal("close")}>Thoát</button>
                    <button type="submit" name="create" value="create" className="btn btn-gradient">{updateItemId ? "Cập nhật" : "Tạo"}</button>
                  </div>
                </div>
              </Form>
            )
          }}
        </Formik>
      </CustomModal>

      {/* Alert xoá item */}
      <CustomModal
        headerTitle={`Xoá ${pageTerm}`}
        size="md"
        type="alert"
        ref={deleteAlertRef}
      >
        <div className="body-content">
          Bạn có chắc chắn muốn xoá {pageTerm} <b>{getItemDeleteInfo(updateItemId, "item_name")}</b> này?
        </div>
        <div className="body-footer">
          <div className="button-list">
            <button type="button" className="btn btn-outline" onClick={() => toggleDeleteAlert("close")}>Không</button>
            <button type="button" className="btn btn-gradient" onClick={() => deleteItem()}>Xoá</button>
          </div>
        </div>
      </CustomModal>

    </>
  )
}