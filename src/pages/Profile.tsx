import { FC, useEffect, useRef, useState } from "react";
import { Helmet } from "react-helmet";
import { AdminSidebar } from "../components/common/AdminSidebar";
import { PageNavbar } from "../components/common/PageNavbar";
import { faChevronDown } from "@fortawesome/free-solid-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { Formik, Form, Field, FormikProps } from "formik";
import { useNavigate } from "react-router-dom";
import { CustomInput } from "../components/common/CustomInput";
import { setUserSession, UserSession } from "../helpers/global";
import { useToast } from "../components/common/CustomToast";
import { apiGetUserAccount, apiCompleteProfile, apiSignIn, apiUpdateUser } from "../helpers/axios";
import { UserAccountType } from "../helpers/types";
import { DoctorSidebar } from "../components/common/DoctorSidebar";
import { UserFormType, UserRequestType } from "./role-admin/Guest";
import { CustomModal, CustomModalHandles } from "../components/common/CustomModal";
import { getRoleName } from "../helpers/utils";

type DateInfoType = {
  created: string,
  updated: string | null
}

export const ProfilePage:FC = () => {
  const updateModalRef = useRef<CustomModalHandles>(null);
  const updateFormRef = useRef<FormikProps<UserFormType>>(null);
  const navigate = useNavigate();
  const {openToast} = useToast();

  const [currentUser, setCurrentUser] = useState<UserAccountType | null>(null);
  const [initialValue, setInitialValue] = useState<UserFormType>({
    fullName: "",
    userName: "",
    gender: "",
    email: "",
    contactNo: "",
    address: "",
    city: "",
    role: ""
  })
  const genderOption = [
    {value: "", label: "Chọn giới tính"},
    {value: "male", label: "Nam"},
    {value: "female", label: "Nữ"},
  ]

  const validate = (value:UserFormType) => {
    let errors: UserFormType = {};
    if(!value.fullName) {
      errors.fullName = "Trường này không được bỏ trống!";
    }
    if(!value.userName) {
      errors.userName = "Trường này không được bỏ trống!";
    }
    if(!value.password) {
      errors.password = "Trường này không được bỏ trống!";
    }
    if(!value.gender) {
      errors.gender = "Hãy lựa chọn giới tính!";
    }
    if(!value.email) {
      errors.email = "Trường này không được bỏ trống!";
    }
    if(!value.contactNo) {
      errors.contactNo = "Trường này không được bỏ trống!";
    }
    if(!value.address) {
      errors.address = "Trường này không được bỏ trống!";
    }
    if(!value.city) {
      errors.city = "Trường này không được bỏ trống!";
    }
    return errors;
  }

  const getUserData = async() => {
    if(UserSession) {
      const resultUser = await apiGetUserAccount(UserSession.auth_user_id);
      if(resultUser.error) {
        openToast("error", "Lỗi", "Đã xảy ra lỗi khi lấy thông tin!", 5000);
      } else if (resultUser.data) {
        const userData:UserAccountType = resultUser.data[0];
        setCurrentUser(userData);
        setInitialValue({
          fullName: userData.full_name,
          userName: userData.user_name,
          password: userData.password,
          gender: userData.gender,
          email: userData.email_address,
          contactNo: userData.contact_no,
          address: userData.address,
          city: userData.city,
          role: userData.role
        })
      }
    } else {
      navigate("/sign-in")
    }
  }

  useEffect(() => {
    getUserData();
  }, [])

  const toggleUpdateModal = (action: string, userId?:string) => {
    if (updateModalRef.current) {
      switch (action) {
        case "open":
          updateFormRef.current?.resetForm();
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

  const handleSubmit = async(value:UserFormType) => {
    if(UserSession) {
      const userRequest: UserRequestType = {
        ...value,
        action: "update",
        userId: UserSession.auth_user_id
      }
      const updateResponse = await apiUpdateUser(userRequest);
      if(updateResponse.error) {
        openToast("error", "Lỗi", "Đã xảy ra lỗi khi cập nhật tài khoản!", 5000);
      } else if (updateResponse.data) {
        openToast("success", "Thành công", "Tài khoản đã được cập nhật!", 5000);
        toggleUpdateModal("close");
        getUserData();
      }
    }
  }
  return (
    <>
      <Helmet>
        <title>
          Thông tin tài khoản - HKL
        </title>
      </Helmet>
      <div className="main-background">
        {currentUser ? (
          <div className="page-container">
            <div className="page-sidebar">
              {currentUser.role === "admin" ? (
                <AdminSidebar selectedItem="" />
              ) : ""}
              {currentUser.role === "doctor" ? (
                <DoctorSidebar selectedItem="" />
              ) : ""}
            </div>
            <div className="page-content">
              <PageNavbar
                navbarTitle={`Thông tin tài khoản`}
                hideSearch={true}
                searchRequest={() => {}}
              />
              <div className="content">
                <div className="hms-page-banner">
                  <div className="page-banner" style={{backgroundImage: "url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80')"}}></div>
                  <div className="page-body">
                    <div className="content-profile">
                      <div className="profile-user-container">
                        <div className="user-avatar">
                          <img src="/image/default-avatar.png" />
                        </div>
                        <div className="user-info">
                          <div className="info-name">{currentUser.full_name}</div>
                          <div className="info-role">{getRoleName(currentUser.role)}</div>
                        </div>
                        <div className="user-action">
                          <button className="btn btn-gradient" onClick={() => toggleUpdateModal("open")}>Cập nhật</button>
                        </div>
                      </div>
                      <div className="profile-desc-container">
                        <div className="desc-content">
                          <b>Ngày tạo tài khoản: </b>{currentUser.created_at}
                        </div>
                        {currentUser.updated_at ? (
                          <div className="desc-content">
                            <b>Ngày cập nhật lần cuối: </b>{currentUser.updated_at}
                          </div>
                        ) : ""}
                        <div className="desc-content">
                          <b>Số điện thoại: </b>{currentUser.contact_no}
                        </div>
                        <div className="desc-content">
                          <b>Email: </b>{currentUser.email_address}
                        </div>
                        <div className="desc-content">
                          <b>Địa chỉ: </b>{currentUser.address}
                        </div>
                        <div className="desc-content">
                          <b>Thành phố: </b>{currentUser.city}
                        </div>
                      </div>
                    </div>
                  </div>
                </div>"
              </div>
            </div>
          </div>
        ) : ""}
      </div>
      
      <CustomModal
        headerTitle={`Cập nhật tài khoản`}
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
            handleSubmit(values)
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
                        id="password"
                        name="password"
                        label="Mật khẩu"
                        placeholder="Nhập mật khẩu"
                        initialValue=""
                        inputType="password"
                        isRequired={true}
                        type="input"
                        disabled={false}
                      />
                    </div>
                    <div className="col-md-6">
                      <div className="custom-input">
                        <Field as="select" id="gender" name="gender">
                          {genderOption.map(option => (
                            <option key={option.value} value={option.value}>{option.label}</option>
                          ))}
                        </Field>
                        <label>Giới tính</label>
                        <div className="arrow-icon">
                          <FontAwesomeIcon icon={faChevronDown} />
                        </div>
                      </div>
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
                        placeholder="84xxxxxxxxx"
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
                    <div className="col-md-6">
                      <CustomInput
                        formik={formikProps}
                        id="city"
                        name="city"
                        label="Thành phố"
                        placeholder="Nhập thành phôs"
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
                    <button type="submit" name="create" value="create" className="btn btn-gradient">Cập nhật</button>
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