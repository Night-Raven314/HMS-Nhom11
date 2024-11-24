import { faFacebook, faGoogle } from "@fortawesome/free-brands-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { Form, Formik } from "formik";
import { FC, useEffect, useState } from "react";
import { Helmet } from "react-helmet";
import { useNavigate } from "react-router-dom";
import { CustomInput } from "../components/common/CustomInput";
import { apiRequestGoogleSignIn, apiSignIn } from "../helpers/axios";
import { useToast } from "../components/common/CustomToast";
import { setUserSession, UserSession } from "../helpers/global";

export type SignInFormType = {
  username?: string,
  password?: string
}

export const SignInPage:FC = () => {
  const navigate = useNavigate();
  const {openToast} = useToast();
  const [signInInitialValues, setSignInInitialValues] = useState<SignInFormType>({
    username: "",
    password: ""
  })

  // Check if user logged in yet
  useEffect(() => {
    if(UserSession) {
      handleRedirectBasedOnRoles();
    }
  }, [])

  const validate = (value:SignInFormType) => {
    let errors: SignInFormType = {};
    if(!value.username) {
      errors.username = "Trường này không được bỏ trống!";
    }
    if(!value.password) {
      errors.password = "Trường này không được bỏ trống!";
    }
    return errors;
  }

  const handleRedirectBasedOnRoles = () => {
    if(UserSession) {
      switch (UserSession.auth_user_role) {
        case "admin":
          navigate("/role-admin/guest");
          break;
        case "doctor":
          navigate("/role-doctor/schedule");
          break;
        case "nurse":
          navigate("/role-nurse/schedule");
          break;
        case "patient":
          navigate("/role-patient/schedule");
          break;
      
        default:
          break;
      }
    }
  }

  const processSignIn = async(value:SignInFormType) => {
    const signInResponse = await apiSignIn(value);
    if(signInResponse.error) {
      openToast("error", "Đăng nhập thất bại!", "Tên đăng nhập hoặc mật khẩu không đúng!", 5000);
    } else if (signInResponse.data) {
      window.localStorage.setItem("signedInUser", JSON.stringify(signInResponse.data));
      setUserSession(signInResponse.data);
      handleRedirectBasedOnRoles();
    }
  }

  const socialRedirect = async(socialNetwork:string) => {
    switch (socialNetwork) {
      case "google":
        const getLink = await apiRequestGoogleSignIn();
        if(getLink.error) {
          openToast("error", "Đã xảy ra lỗi!", "Đăng nhập Google hiện tại không khả dụng!", 5000);
        } else if(getLink.data) {
          window.open(getLink.data, "_self")
        }
        break;
      case "facebook":
        window.open("/HMS-Nhom11/backend/api/oauth/f-authenticate.php", "_self");
        break;
    
      default:
        break;
    }
  }

  return (
    <>
      <Helmet>
        <title>
          Đăng nhập - HKL
        </title>
      </Helmet>
      <div className="page-header align-items-start min-vh-100"
      style={{ backgroundImage: "url('./image/Hospital_Seamless1.png')", backgroundSize: '400px 400px' }}>
        <span className="mask bg-gradient-dark opacity-6"></span>
        <div className="container my-auto">
          <div className="row">
            <div className="col-lg-4 col-md-8 col-12 mx-auto">
              <div className="card z-index-0 fadeIn3 fadeInBottom">
                <div className="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                  <div className="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                    <h4 className="text-white font-weight-bolder text-center mt-2 mb-0">Đăng nhập</h4>
                  </div>
                </div>
                <div className="card-body">
                  <Formik
                    validateOnChange={true}
                    validateOnBlur={true}
                    enableReinitialize={true}
                    initialValues={signInInitialValues}
                    validate={validate}
                    onSubmit={(values) => {
                      processSignIn(values)
                    }}
                  >
                    {(formikProps) => {
                      return (
                        <Form>
                          <div className="row">
                            <div className="col-md-12">
                              <CustomInput
                                formik={formikProps}
                                id="username"
                                name="username"
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
                              <div className="text-center">
                                <button type="submit" className="btn bg-gradient-primary w-100 my-4 mb-2">Đăng nhập</button>
                              </div>
                              <div className="text-center" style={{ paddingTop: '20px', paddingBottom: '10px'}}>
                                <a className="text-primary text-gradient font-weight-bold">Hoặc sử dụng tài khoản liên kết</a>
                              </div>
                              <div className="text-center">
                                <a className="btn bg-gradient-primary" onClick={() => socialRedirect("google")} style={{margin: "0 5px"}}>
                                  <FontAwesomeIcon icon={faGoogle} />
                                </a>
                                <a className="btn bg-gradient-primary" onClick={() => socialRedirect("facebook")} style={{margin: "0 5px"}}>
                                <FontAwesomeIcon icon={faFacebook} />
                                </a>
                              </div>
                              <p className="mt-4 text-sm text-center">
                                <a href="./forgot-pwd.php" className="text-primary text-gradient font-weight-bold">Quên mật khẩu</a>
                              </p>
                              <p className="mt-4 text-sm text-center">
                                Bạn chưa có tài khoản? <a onClick={() => navigate("/sign-up")} className="text-primary text-gradient font-weight-bold">Đăng ký ngay</a>
                              </p>
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
    </>
  )
}