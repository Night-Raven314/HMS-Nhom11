import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { Field, Formik, Form } from "formik";
import { FC, useEffect, useState } from "react";
import { Helmet } from "react-helmet";
import { useNavigate } from "react-router-dom";
import { faCheck, faChevronDown } from "@fortawesome/free-solid-svg-icons";
import { CustomInput } from "../components/common/CustomInput";
import { useToast } from "../components/common/CustomToast";
import { apiGetUserAccount, apiCompleteProfile, apiUpdateUser, apiSignIn } from "../helpers/axios";
import { TmpUserSession, setUserSession } from "../helpers/global";
import { UserAccountType } from "../helpers/types";
import { UserFormType, UserRequestType } from "./role-admin/Guest";

export const SignUpPage:FC = () => {
  const navigate = useNavigate();
  const {openToast} = useToast();

  const [initialValue, setInitialValue] = useState<UserFormType>({
    fullName: "",
    userName: "",
    password: "",
    gender: "",
    email: "",
    contactNo: "",
    address: "",
    city: "",
    birthday: "",
    role: "patient"
  })
  const genderOption = [
    {value: "", label: "Chọn giới tính"},
    {value: "male", label: "Nam"},
    {value: "female", label: "Nữ"},
  ]
  const [acceptTC, setAcceptTC] = useState<boolean>(false);

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
    if(!value.birthday) {
      errors.birthday = "Trường này không được bỏ trống!";
    }
    if(!value.address) {
      errors.address = "Trường này không được bỏ trống!";
    }
    if(!value.city) {
      errors.city = "Trường này không được bỏ trống!";
    }
    return errors;
  }

  const handleSubmit = async(value:UserFormType) => {
    if(acceptTC) {
      const userRequest: UserRequestType = {
        ...value,
        birthday: value.birthday ? new Date(value.birthday).toISOString() : value.birthday,
        action: "create",
        userId: null
      }
      const updateResponse = await apiUpdateUser(userRequest);
      if(updateResponse.error) {
        openToast("error", "Lỗi", "Đã xảy ra lỗi khi tạo tài khoản!", 5000);
      } else if (updateResponse.data) {
        openToast("success", "Thành công", "Tài khoản đã được tạo!", 5000);
        
        const signInResponse = await apiSignIn({
          username: value.userName,
          password: value.password
        });
        if(signInResponse.error) {
          openToast("error", "Đăng nhập thất bại!", "Tên đăng nhập hoặc mật khẩu không đúng!", 5000);
        } else if (signInResponse.data) {
          window.localStorage.setItem("signedInUser", JSON.stringify(signInResponse.data));
          setUserSession(signInResponse.data);
          navigate("/role-patient/appointment");
        }
      }
    } else {
      openToast("error", "Lỗi", "Hãy đồng ý điều khoản và điều kiện!", 5000);
    }
  }

  return (
    <>
      <Helmet>
        <title>
          Đăng ký tài khoản - HKL
        </title>
      </Helmet>
      <div className="main-content mt-0">
        <div className="page-header min-vh-100"
          style={{ backgroundImage: "url('../backend/assets/image/Hospital_Seamless1.png')", backgroundSize: '400px 400px'}}>
          <div className="container">
            <div className="row">
              <div
                className="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
                <div
                  className="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center"
                  style={{ backgroundImage: "url('../backend/assets/image/HKL.png')", backgroundSize: 'cover' }}>
                </div>
              </div>
              <div className="col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
                <div className="card">
                  <div className="card-header">
                    <h4 className="font-weight-bolder">Đăng ký tài khoản</h4>
                    <p className="mb-0">Tạo tài khoản để quản lý quá trình khám bệnh của bạn tại bệnh viện.</p>
                  </div>

                  <div className="card-body">
                    <Formik
                      validateOnChange={true}
                      validateOnBlur={true}
                      enableReinitialize={true}
                      initialValues={initialValue}
                      validate={validate}
                      onSubmit={(values) => {
                        handleSubmit(values)
                      }}
                    >
                      {(formikProps) => {
                        return (
                          <Form>
                            <div className="row">
                              <div className="col-md-12">
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
                              <div className="col-md-12">
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
                              <div className="col-md-12">
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
                              <div className="col-md-12">
                                <CustomInput
                                  formik={formikProps}
                                  id={`gender`}
                                  name={`gender`}
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
                              <div className="col-md-12">
                                <CustomInput
                                  formik={formikProps}
                                  id="birthday"
                                  name="birthday"
                                  label="Ngày sinh"
                                  placeholder="Chọn ngày sinh"
                                  initialValue=""
                                  inputType="date"
                                  isRequired={true}
                                  type="input"
                                  disabled={false}
                                />
                              </div>
                              <div className="col-md-12">
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
                              <div className="col-md-12">
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
                                  placeholder="Nhập thành phôs"
                                  initialValue=""
                                  inputType="text"
                                  isRequired={true}
                                  type="input"
                                  disabled={false}
                                />
                              </div>
                              <div className="col-md-12">
                                <div className="custom-checkbox" style={{marginTop: "10px"}}>
                                  <input type="checkbox" checked={acceptTC} onChange={(e) => setAcceptTC(e.target.checked)} />
                                  <div className="checkbox-box">
                                    <FontAwesomeIcon icon={faCheck} />
                                  </div>
                                  <div className="checkbox-label">
                                    Tôi đồng ý <a href="" className="text-dark font-weight-bolder">Điều khoản và Điều kiện</a>
                                  </div>
                                </div>
                              </div>
                              <div className="col-md-12">
                                <button type="submit" className="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Đăng ký tài khoản</button>
                              </div>
                            </div>
                          </Form>
                        )
                      }}
                    </Formik>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </>
  )
}