import { faPenToSquare, faTrash } from "@fortawesome/free-solid-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { FC, useEffect, useRef, useState } from "react";
import { Helmet } from "react-helmet";
import { AdminSidebar } from "../../components/common/AdminSidebar";
import { NavbarHandles, PageNavbar } from "../../components/common/PageNavbar";
import { CustomModal, CustomModalHandles } from "../../components/common/CustomModal";
import { Form, Formik, FormikProps } from "formik";
import { CustomInput } from "../../components/common/CustomInput";
import { apiUpdateFaculty, apiGetFaculty } from "../../helpers/axios";
import { useToast } from "../../components/common/CustomToast";

export type FacultyFormType = {
  name?: string,
  desc?: string,
  note?: string,
}

export type FacultyListType = {
  fac_id: string;
  fac_name: string;
  fac_desc: string;
  fac_note: string;
  created_at: string;
  updated_at: string;
  status: string;
};


export type FacultyRequestType = FacultyFormType & {
  action: string;
  facId: string | null;
}

export const AdminFaculty: FC = () => {
  const {openToast} = useToast();

  const navbarRef = useRef<NavbarHandles>(null);

  const updateModalRef = useRef<CustomModalHandles>(null);
  const deleteAlertRef = useRef<CustomModalHandles>(null);
  const updateFormRef = useRef<FormikProps<FacultyFormType>>(null);

  const [initialValue, setInitialValue] = useState<FacultyFormType>({
    name: "",
    desc: "",
    note: "",
  })
  const [updateFacultyId, setUpdateFacultyId] = useState<string | null>(null);
  const [searchKeyword, setSearchKeyword] = useState<string>("");
  const [facultyList, setFacultyList] = useState<FacultyListType[]>([]);
  const [facultyListFiltered, setFacultyListFiltered] = useState<FacultyListType[]>([]);

  const pageTerm = "chuyên khoa";

  const getFacultyDeleteInfo = (facId:string | null) => {
    const findFaculty = facultyList.find(faculty => faculty.fac_id === facId);
    if(findFaculty) {
      return findFaculty.fac_name;
    } else {
      return ""
    }
  }

  useEffect(() => {
    getFacultyList();
  }, [])

  const validate = (value: FacultyFormType) => {
    let errors: FacultyFormType = {};
    if (!value.name) {
      errors.name = "Trường này không được bỏ trống!";
    }
    if (!value.desc) {
      errors.desc = "Trường này không được bỏ trống!";
    }
    return errors;
  }

  const toggleUpdateModal = (action: string, facId?:string) => {
    if (updateModalRef.current) {
      switch (action) {
        case "open":
          updateFormRef.current?.resetForm();
          setUpdateFacultyId(facId ? facId : null);
          if(facId) {
            const findFaculty = facultyList.find(faculty => faculty.fac_id === facId);
            if(findFaculty) {
              setInitialValue({
                name: findFaculty.fac_name,
                desc: findFaculty.fac_desc,
                note: findFaculty.fac_note,
              })
            } else {
              setInitialValue({
                name: "",
                desc: "",
                note: "",
              })
            }
          } else {
            setInitialValue({
              name: "",
              desc: "",
              note: "",
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
  const toggleDeleteAlert = (action: string, facId?:string) => {
    if (deleteAlertRef.current) {
      switch (action) {
        case "open":
          setUpdateFacultyId(facId ? facId : null);
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

  const submitUpdateFaculty = async(value:FacultyFormType, action:string) => {
    const facultyRequest: FacultyRequestType = {
      ...value,
      action: action,
      facId: updateFacultyId
    }
    const updateResponse = await apiUpdateFaculty(facultyRequest);
    if(updateResponse.error) {
      openToast("error", "Lỗi", "Đã xảy ra lỗi khi tạo chuyên khoa!", 5000);
    } else if (updateResponse.data) {
      openToast("success", "Thành công", updateFacultyId ? "Chuyên khoa đã được cập nhật" : "Chuyên khoa đã được tạo!", 5000);
      toggleUpdateModal("close");
      getFacultyList();
    }
  }
  const deleteFaculty = async() => {
    const facultyRequest: FacultyRequestType = {
      action: "delete",
      facId: updateFacultyId
    }
    const updateResponse = await apiUpdateFaculty(facultyRequest);
    if(updateResponse.error) {
      openToast("error", "Lỗi", `Đã xảy ra lỗi khi xoá chuyên khoa!`, 5000);
    } else if (updateResponse.data) {
      openToast("success", "Thành công", `Chuyên khoa đã xoá!`, 5000);
      toggleDeleteAlert("close");
      getFacultyList();
    }
  }
  const getFacultyList = async() => {
    const getFaculty = await apiGetFaculty();
    if(getFaculty.error) {
      openToast("error", "Lỗi", "Đã xảy ra lỗi khi lấy thông tin người dùng!", 5000);
    } else if (getFaculty.data) {
      setFacultyList(getFaculty.data);
    }
  }
  const searchFaculty = () => {
    if(searchKeyword) {
      const searchKeywordLower = searchKeyword.toLowerCase();
      const filterList = facultyList.filter(faculty => faculty.fac_name.toLowerCase().includes(searchKeywordLower));
      setFacultyListFiltered(filterList);
    } else { 
      setFacultyListFiltered(facultyList);
    }
  }
  useEffect(() => {
    searchFaculty();
  }, [facultyList, searchKeyword])

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
            <AdminSidebar selectedItem={"faculty"} />
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
                      {facultyListFiltered.map((faculty) => (
                        <tr key={faculty.fac_id}>
                          <td className="text-color">{faculty.fac_name}</td>
                          <td>{faculty.fac_desc}</td>
                          <td>{faculty.fac_note}</td>
                          <td>{faculty.created_at}</td>
                          <td>{faculty.updated_at ? faculty.updated_at : ""}</td>
                          <td>
                            <div className="table-button-list">
                              <button onClick={() => toggleUpdateModal("open", faculty.fac_id)}>
                                <FontAwesomeIcon icon={faPenToSquare} />
                              </button>
                              <button onClick={() => toggleDeleteAlert("open", faculty.fac_id)}>
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
        headerTitle={updateFacultyId ? `Cập nhật ${pageTerm}` : `Tạo ${pageTerm}`}
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
            submitUpdateFaculty(values, updateFacultyId ? "update" : "create")
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
                    <button type="submit" name="create" value="create" className="btn btn-gradient">{updateFacultyId ? "Cập nhật" : "Tạo"}</button>
                  </div>
                </div>
              </Form>
            )
          }}
        </Formik>
      </CustomModal>

      {/* Alert xoá faculty */}
      <CustomModal
        headerTitle={"Xoá chuyên khoa"}
        size="md"
        type="alert"
        ref={deleteAlertRef}
      >
        <div className="body-content">
          Bạn có chắc chắn muốn xoá chuyên khoa <b>{getFacultyDeleteInfo(updateFacultyId)}</b> này?
        </div>
        <div className="body-footer">
          <div className="button-list">
            <button type="button" className="btn btn-outline" onClick={() => toggleDeleteAlert("close")}>Không</button>
            <button type="button" className="btn btn-gradient" onClick={() => deleteFaculty()}>Xoá</button>
          </div>
        </div>
      </CustomModal>

    </>
  )
}