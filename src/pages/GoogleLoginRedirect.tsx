import { FC, useEffect } from "react";
import { apiProcessGoogleSignIn } from "../helpers/axios";
import { setTmpUserSession, setUserSession, UserSession } from "../helpers/global";
import { useNavigate } from "react-router-dom";

export const GoogleLoginRedirect:FC = () => {
  const navigate = useNavigate();
  const handleRedirectBasedOnRoles = () => {
    if(UserSession) {
      switch (UserSession.auth_user_role) {
        case "admin":
          navigate("/role-admin/guest");
          break;
        case "doctor":
          navigate("/role-doctor/schedule");
          break;
        case "patient":
          navigate("/role-patient/schedule");
          break;
      
        default:
          break;
      }
    }
  }
  
  useEffect(() => {
    const processSignIn = async(param:string) => {
      const response = await apiProcessGoogleSignIn(param);
      if(response.data) {
        if(response.data.temp_regis_name) {
          setTmpUserSession(response.data);
          window.localStorage.setItem("tmpUser", JSON.stringify(response.data))
          navigate("/role-patient/complete-profile");
        } else {
          setUserSession(response.data);
          handleRedirectBasedOnRoles();
        }
      }
    }
    const getFullUrl = window.location.href;
    const getParam = getFullUrl.split("http://localhost/google-login-redirect")[1];
    if(getParam) {
      processSignIn(getParam);
    }
  }, [])
  return (
    <div>Đang chuyển hướng...</div>
  )
}