import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { Field, Formik, Form } from "formik";
import { FC, useEffect, useState } from "react";
import { Helmet } from "react-helmet";
import { useNavigate } from "react-router-dom";
import { CustomInput } from "../../components/common/CustomInput";
import { setUserSession, TmpUserSession } from "../../helpers/global";
import { faCheck, faChevronDown } from "@fortawesome/free-solid-svg-icons";
import { useToast } from "../../components/common/CustomToast";
import { apiCompleteProfile } from "../../helpers/axios";

export type ProfileFormType = {
  fullName?: string,
  userName?: string,
  password?: string,
  gender?: string,
  email?: string,
  contactNo?: string,
  address?: string,
  city?: string,
  userId?: number,
  loginType?: string
}

export const CompleteProfile:FC = () => {
  const navigate = useNavigate();
  const {openToast} = useToast();

  const [initialValue, setInitialValue] = useState<ProfileFormType>({
    userId: undefined,
    loginType: "google_oauth",
    fullName: "",
    userName: "",
    password: "",
    gender: "",
    email: "",
    contactNo: "",
    address: "",
    city: ""
  })
  const genderOption = [
    {value: "", label: "Chọn giới tính"},
    {value: "male", label: "Nam"},
    {value: "female", label: "Nữ"},
  ]
  const [acceptTC, setAcceptTC] = useState<boolean>(false);

  const validate = (value:ProfileFormType) => {
    let errors: ProfileFormType = {};
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

  useEffect(() => {
    if(TmpUserSession) {
      setInitialValue({
        userId: Number(TmpUserSession.auth_user_id),
        loginType: "google_oauth",
        fullName: TmpUserSession.temp_regis_name,
        userName: "",
        password: "",
        gender: "",
        email: TmpUserSession.temp_regis_email,
        contactNo: "",
        address: "",
        city: ""
      })
    } else {
      navigate("/sign-in")
    }
  }, [])

  const handleSubmit = async(value:ProfileFormType) => {
    if(acceptTC) {
      const updateResponse = await apiCompleteProfile(value);
      if(updateResponse.error) {
        openToast("error", "Lỗi", "Đã xảy ra lỗi khi cập nhật thông tin!", 5000);
      } else if (updateResponse.data) {
        window.localStorage.removeItem("tmpUser");
        window.localStorage.setItem("signedInUser", JSON.stringify(updateResponse.data));
        setUserSession(updateResponse.data);
        navigate("/role-patient/schedule");
      }
    } else {
      openToast("error", "Lỗi", "Hãy đồng ý điều khoản và điều kiện!", 5000);
    }
  }

  return (
    <>
      <Helmet>
        <title>
          Hoàn tất tài khoản - HKL
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
                    <h4 className="font-weight-bolder">Cập nhật thông tin</h4>
                    <p className="mb-0">Vui bổ sung các thông tin sau để hoàn tất việc tạo tài khoản</p>
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
                                <button type="submit" className="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Cập nhật thông tin</button>
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