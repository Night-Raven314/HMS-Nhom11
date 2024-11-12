import Axios from "axios";
import { SignInFormType } from "../pages/SignIn";
import { ProfileFormType } from "../pages/role-patient/CompleteProfile";
import { UserFormType, UserRequestType } from "../pages/role-admin/Guest";

export const hmsAxios = Axios.create({
  baseURL: `/HMS-Nhom11/backend/api/`,
  headers: {
    "Content-Type": "application/json",
    Accept: "application/json",
    "Access-Control-Allow-Headers": "Authorization, Lang",
    "Access-Control-Allow-Methods": "GET,POST,OPTIONS,PUT,DELETE,PATCH",
  },
});

// Account
export const apiSignIn = async(signInForm:SignInFormType) => {
  let error = null;
  let data = null;
  try {
    const res = await hmsAxios.post(
      "/account/sign-in.php",
      JSON.stringify(signInForm)
    );
    if(res.data) {
      data = res.data.data;
    }
  } catch (err:any) {
    error = err.response.data.message;
  }
  return { data, error };
}

export const apiRequestGoogleSignIn = async() => {
  let error = null;
  let data = null;
  try {
    const res = await hmsAxios.post(
      "/account/request-google-sign-in.php"
    );
    if(res.data) {
      data = res.data.data;
    }
  } catch (err:any) {
    error = err.response.data.message;
  }
  return { data, error };
}

export const apiProcessGoogleSignIn = async(param:string) => {
  let error = null;
  let data = null;
  try {
    const res = await hmsAxios.post(
      `/oauth/g-authenticate.php${param}`
    );
    if(res.data) {
      data = res.data.data;
    }
  } catch (err:any) {
    error = err.response.data.message;
  }
  return { data, error };
}

export const apiCompleteProfile = async(profileForm:ProfileFormType) => {
  let error = null;
  let data = null;
  try {
    const res = await hmsAxios.post(
      "/account/complete-profile.php",
      JSON.stringify(profileForm)
    );
    if(res.data) {
      data = res.data.data;
    }
  } catch (err:any) {
    error = err.response.data.message;
  }
  return { data, error };
}

// User
export const apiUpdateUser = async(userForm:UserRequestType) => {
  let error = null;
  let data = null;
  try {
    const res = await hmsAxios.post(
      "/admin/update-user.php",
      JSON.stringify(userForm)
    );
    if(res.data) {
      data = res.data.data;
    }
  } catch (err:any) {
    error = err.response.data.message;
  }
  return { data, error };
}

export const apiGetUser = async(pageType:string) => {
  let error = null;
  let data = null;
  try {
    const res = await hmsAxios.post(
      "/admin/get-user.php",
      JSON.stringify({pageType})
    );
    if(res.data) {
      data = res.data.data;
    }
  } catch (err:any) {
    error = err.response.data.message;
  }
  return { data, error };
}