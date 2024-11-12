import { faPenToSquare, faTrash } from "@fortawesome/free-solid-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { FC, useEffect, useRef, useState } from "react";
import { Helmet } from "react-helmet";
import { AdminSidebar } from "../../components/common/AdminSidebar";
import { NavbarHandles, PageNavbar } from "../../components/common/PageNavbar";
import { CustomModal, CustomModalHandles } from "../../components/common/CustomModal";
import { Form, Formik, FormikProps } from "formik";
import { CustomInput } from "../../components/common/CustomInput";
import { apiUpdateUser, apiGetUser } from "../../helpers/axios";
import { useToast } from "../../components/common/CustomToast";

export type UserFormType = {
  fullName?: string,
  userName?: string,
  password?: string,
  gender?: string,
  email?: string,
  contactNo?: string,
  address?: string,
  city?: string,
  role?: string
}

export type UserListType = {
  user_id: string;
  user_name: string;
  password: string;
  full_name: string;
  email_address: string;
  contact_no: string;
  address: string;
  city: string;
  gender: string;
  role: string;
  specialty_id: string | null;
  created_at: string;
  updated_at: string;
  status: string;
  oauth_facebook: string | null;
  oauth_google: string | null;
  pricing: string | null;
};

export type UserRequestType = UserFormType & {
  action: string;
  userId: string | null;
}

export type AdminGuestProps = {
  pageType:string
}

export const AdminGuest: FC<AdminGuestProps> = ({pageType}) => {
  const {openToast} = useToast();

  const navbarRef = useRef<NavbarHandles>(null);

  const updateModalRef = useRef<CustomModalHandles>(null);
  const deleteAlertRef = useRef<CustomModalHandles>(null);
  const updateFormRef = useRef<FormikProps<UserFormType>>(null);

  const [initialValue, setInitialValue] = useState<UserFormType>({
    fullName: "",
    userName: "",
    gender: "",
    email: "",
    contactNo: "",
    address: "",
    city: "",
    role: "patient"
  })
  const [updateUserId, setUpdateUserId] = useState<string | null>(null);
  const [searchKeyword, setSearchKeyword] = useState<string>("");
  const [userList, setUserList] = useState<UserListType[]>([]);
  const [userListFiltered, setUserListFiltered] = useState<UserListType[]>([]);

  const genderOption = [
    { value: "", label: "Chọn giới tính" },
    { value: "male", label: "Nam" },
    { value: "female", label: "Nữ" },
  ]

  const guestRoleOption = [
    { value: "patient", label: "Bệnh nhân" }
  ]
  const employeeRoleOption = [
    {value: "", label: "Chọn vị trí"},
    {value: "admin", label: "Quản trị viên"},
    {value: "doctor", label: "Bác sỹ"},
    {value: "nurse", label: "Y tá"}
  ]

  const pageTerm = pageType === "guest" ? "người dùng" : "nhân viên";

  const getUserDeleteInfo = (userId:string | null, param: "user_name" | "full_name") => {
    const findUser = userList.find(user => user.user_id === userId);
    if(findUser) {
      return findUser[param];
    } else {
      return ""
    }
  }

  useEffect(() => {
    getUserList();
  }, [])

  const validate = (value: UserFormType) => {
    let errors: UserFormType = {};
    if (!value.fullName) {
      errors.fullName = "Trường này không được bỏ trống!";
    }
    if (!value.userName) {
      errors.userName = "Trường này không được bỏ trống!";
    }
    if (!value.gender) {
      errors.gender = "Hãy lựa chọn giới tính!";
    }
    if (!value.email) {
      errors.email = "Trường này không được bỏ trống!";
    }
    if (!value.contactNo) {
      errors.contactNo = "Trường này không được bỏ trống!";
    }
    if (!value.address) {
      errors.address = "Trường này không được bỏ trống!";
    }
    if (!value.city) {
      errors.city = "Trường này không được bỏ trống!";
    }
    return errors;
  }

  const toggleUpdateModal = (action: string, userId?:string) => {
    if (updateModalRef.current) {
      switch (action) {
        case "open":
          updateFormRef.current?.resetForm();
          setUpdateUserId(userId ? userId : null);
          if(userId) {
            const findUser = userList.find(user => user.user_id === userId);
            if(findUser) {
              setInitialValue({
                fullName: findUser.full_name,
                userName: findUser.user_name,
                gender: findUser.gender,
                email: findUser.email_address,
                contactNo: findUser.contact_no,
                address: findUser.address,
                city: findUser.city,
                role: findUser.role
              })
            } else {
              setInitialValue({
                fullName: "",
                userName: "",
                gender: "",
                email: "",
                contactNo: "",
                address: "",
                city: "",
                role: "patient"
              })
            }
          } else {
            setInitialValue({
              fullName: "",
              userName: "",
              gender: "",
              email: "",
              contactNo: "",
              address: "",
              city: "",
              role: "patient"
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
  const toggleDeleteAlert = (action: string, userId?:string) => {
    if (deleteAlertRef.current) {
      switch (action) {
        case "open":
          setUpdateUserId(userId ? userId : null);
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

  const submitUpdateUser = async(value:UserFormType, action:string) => {
    const userRequest: UserRequestType = {
      ...value,
      action: action,
      userId: updateUserId
    }
    const updateResponse = await apiUpdateUser(userRequest);
    if(updateResponse.error) {
      openToast("error", "Lỗi", "Đã xảy ra lỗi khi tạo tài khoản!", 5000);
    } else if (updateResponse.data) {
      openToast("success", "Thành công", updateUserId ? "Tài khoản đã được cập nhật" : "Tài khoản đã được tạo!", 5000);
      toggleUpdateModal("close");
      getUserList();
    }
  }
  const deleteUser = async() => {
    const userRequest: UserRequestType = {
      action: "delete",
      userId: updateUserId
    }
    const updateResponse = await apiUpdateUser(userRequest);
    if(updateResponse.error) {
      openToast("error", "Lỗi", "Đã xảy ra lỗi khi xoá tài khoản!", 5000);
    } else if (updateResponse.data) {
      openToast("success", "Thành công", "Tài khoản đã xoá!", 5000);
      toggleDeleteAlert("close");
      getUserList();
    }
  }
  const getUserList = async() => {
    const getUser = await apiGetUser(pageType);
    if(getUser.error) {
      openToast("error", "Lỗi", "Đã xảy ra lỗi khi lấy thông tin người dùng!", 5000);
    } else if (getUser.data) {
      setUserList(getUser.data);
    }
  }
  const searchUser = () => {
    if(searchKeyword) {
      const searchKeywordLower = searchKeyword.toLowerCase();
      const filterList = userList.filter(user => user.full_name.toLowerCase().includes(searchKeywordLower) || user.user_name.toLowerCase().includes(searchKeywordLower));
      setUserListFiltered(filterList);
    } else { 
      setUserListFiltered(userList);
    }
  }
  useEffect(() => {
    searchUser();
  }, [userList, searchKeyword])

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
                        <th style={{ width: "200px" }}>Họ và Tên</th>
                        <th style={{ width: "65px" }}>Vị trí</th>
                        <th style={{ width: "140px" }}>Tên đăng nhập</th>
                        <th style={{ width: "115px" }}>Số điện thoại</th>
                        <th style={{ width: "200px" }}>Email</th>
                        <th style={{ width: "140px" }}>Ngày tạo</th>
                        <th style={{ width: "140px" }}>Ngày chỉnh sửa</th>
                        <th style={{ width: "100px" }}>Thao tác</th>
                      </tr>
                    </thead>
                    <tbody>
                      {userListFiltered.map((user) => (
                        <tr key={user.user_id}>
                          <td className="text-color">{user.full_name}</td>
                          <td>{user.role}</td>
                          <td>{user.user_name}</td>
                          <td>{user.contact_no}</td>
                          <td>{user.email_address}</td>
                          <td>{user.created_at}</td>
                          <td>{user.updated_at ? user.updated_at : ""}</td>
                          <td>
                            <div className="table-button-list">
                              <button onClick={() => toggleUpdateModal("open", user.user_id)}>
                                <FontAwesomeIcon icon={faPenToSquare} />
                              </button>
                              <button onClick={() => toggleDeleteAlert("open", user.user_id)}>
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

      {/* Form tạo/cập nhật tài khoản */}
      <CustomModal
        headerTitle={updateUserId ? `Cập nhật tài khoản ${pageTerm}` : `Tạo tài khoản ${pageTerm}`}
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
            submitUpdateUser(values, updateUserId ? "update" : "create")
          }}
        >
          {(formikProps) => {
            return (
              <Form>
                <div className="body-content">
                  <div className="row">
                    <div className="col-md-6">
                      <CustomInput
                        formik={formikProps}
                        id="fullName"
                        name="fullName"
                        label="Họ và tên"
                        placeholder="Nhập họ và tên"
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
                        id="userName"
                        name="userName"
                        label="Tên đăng nhập"
                        placeholder="Nhập tên đăng nhập"
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
                        id="email"
                        name="email"
                        label="Địa chỉ email"
                        placeholder="Nhập địa chỉ email"
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
                        id="contactNo"
                        name="contactNo"
                        label="Số điện thoại"
                        placeholder="Nhập số điện thoại"
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
                        id="gender"
                        name="gender"
                        label="Giới tính"
                        placeholder=""
                        initialValue=""
                        inputType="text"
                        isRequired={true}
                        selectOptions={genderOption}
                        type="select"
                        disabled={false}
                      />
                    </div>
                    <div className="col-md-6">
                      <CustomInput
                        formik={formikProps}
                        id="role"
                        name="role"
                        label="Vị trí"
                        placeholder=""
                        initialValue=""
                        inputType="text"
                        isRequired={true}
                        selectOptions={pageType === "guest" ? guestRoleOption : employeeRoleOption}
                        type="select"
                        disabled={false}
                      />
                    </div>
                    <div className="col-md-12">
                      <CustomInput
                        formik={formikProps}
                        id="address"
                        name="address"
                        label="Địa chỉ"
                        placeholder="Nhập địa chỉ"
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
                        id="city"
                        name="city"
                        label="Thành phố"
                        placeholder="Nhập thành phố"
                        initialValue=""
                        inputType="text"
                        isRequired={true}
                        type="input"
                        disabled={false}
                      />
                    </div>
                  </div>
                </div>
                <div className="body-footer">
                  <div className="button-list">
                    <button type="button" className="btn btn-outline" onClick={() => toggleUpdateModal("close")}>Thoát</button>
                    <button type="submit" name="create" value="create" className="btn btn-gradient">{updateUserId ? "Cập nhật" : "Tạo tài khoản"}</button>
                  </div>
                </div>
              </Form>
            )
          }}
        </Formik>
      </CustomModal>

      {/* Alert xoá user */}
      <CustomModal
        headerTitle={"Xoá tài khoản"}
        size="md"
        type="alert"
        ref={deleteAlertRef}
      >
        <div className="body-content">
          Bạn có chắc chắn muốn xoá tài khoản này: 
          <br/>- Mã {pageTerm}: <b>{updateUserId}</b>
          <br/>- Họ và tên: <b>{getUserDeleteInfo(updateUserId, "full_name")}</b>
          <br/>- Tên {pageTerm}: <b>{getUserDeleteInfo(updateUserId, "user_name")}</b>
        </div>
        <div className="body-footer">
          <div className="button-list">
            <button type="button" className="btn btn-outline" onClick={() => toggleDeleteAlert("close")}>Không</button>
            <button type="button" className="btn btn-gradient" onClick={() => deleteUser()}>Xoá</button>
          </div>
        </div>
      </CustomModal>

    </>
  )
}