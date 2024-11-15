import Axios from "axios";
import { SignInFormType } from "../pages/SignIn";
import { ProfileFormType } from "../pages/role-patient/CompleteProfile";
import { UserFormType, UserRequestType } from "../pages/role-admin/Guest";
import { ItemRequestType } from "../pages/role-admin/Item";
import { FacultyRequestType } from "../pages/role-admin/Faculty";
import { ScheduleFormType, ScheduleRequestType } from "../pages/role-doctor/Schedule";

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

export const apiGetUserAccount = async(userId:string) => {
  let error = null;
  let data = null;
  try {
    const res = await hmsAxios.post(
      `/account/get-user.php`,
      JSON.stringify({auth_user_id: userId})
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

export const apiProcessFacebookSignIn = async(param:string) => {
  let error = null;
  let data = null;
  try {
    const res = await hmsAxios.post(
      `/oauth/f-authenticate.php${param}`
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

// Item
export const apiUpdateItem = async(itemForm:ItemRequestType) => {
  let error = null;
  let data = null;
  try {
    const res = await hmsAxios.post(
      "/admin/update-item.php",
      JSON.stringify(itemForm)
    );
    if(res.data) {
      data = res.data.data;
    }
  } catch (err:any) {
    error = err.response.data.message;
  }
  return { data, error };
}

export const apiGetItem = async(pageType:string) => {
  let error = null;
  let data = null;
  try {
    const res = await hmsAxios.post(
      "/admin/get-item.php",
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

// Faculty
export const apiUpdateFaculty = async(facultyForm:FacultyRequestType) => {
  let error = null;
  let data = null;
  try {
    const res = await hmsAxios.post(
      "/admin/update-faculty.php",
      JSON.stringify(facultyForm)
    );
    if(res.data) {
      data = res.data.data;
    }
  } catch (err:any) {
    error = err.response.data.message;
  }
  return { data, error };
}

export const apiGetFaculty = async() => {
  let error = null;
  let data = null;
  try {
    const res = await hmsAxios.post(
      "/admin/get-faculty.php"
    );
    if(res.data) {
      data = res.data.data;
    }
  } catch (err:any) {
    error = err.response.data.message;
  }
  return { data, error };
}

// Payment log
export const apiGetPayment = async() => {
  let error = null;
  let data = null;
  try {
    const res = await hmsAxios.post(
      "/payment/get-payment.php"
    );
    if(res.data) {
      data = res.data.data;
    }
  } catch (err:any) {
    error = err.response.data.message;
  }
  return { data, error };
}
export const apiGetPaymentDetail = async(paymentId:string) => {
  let error = null;
  let data = null;
  try {
    const res = await hmsAxios.post(
      "/payment/get-payment-details.php",
      JSON.stringify({"payment_id": paymentId})
    );
    if(res.data) {
      data = res.data.data;
    }
  } catch (err:any) {
    error = err.response.data.message;
  }
  return { data, error };
}

// Doctor schedule
export const apiGetDoctorSchedule = async(userId:string) => {
  let error = null;
  let data = null;
  try {
    const res = await hmsAxios.post(
      "/doctor/get-work-schedule.php",
      JSON.stringify({auth_user_id: userId})
    );
    if(res.data) {
      data = res.data.data;
    }
  } catch (err:any) {
    error = err.response.data.message;
  }
  return { data, error };
}
export const apiUpdateDoctorSchedule = async(facultyForm:ScheduleRequestType) => {
  let error = null;
  let data = null;
  try {
    const res = await hmsAxios.post(
      "/doctor/update-work-schedule.php",
      JSON.stringify(facultyForm)
    );
    if(res.data) {
      data = res.data.data;
    }
  } catch (err:any) {
    error = err.response.data.message;
  }
  return { data, error };
}