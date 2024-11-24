import Axios from "axios";
import { SignInFormType } from "../pages/SignIn";
import { ProfileFormType } from "../pages/role-patient/CompleteProfile";
import { UserFormType, UserRequestType } from "../pages/role-admin/Guest";
import { ItemRequestType } from "../pages/role-admin/Item";
import { FacultyRequestType } from "../pages/role-admin/Faculty";
import { DynamicRequestType, ScheduleFormType, ScheduleRequestType } from "../pages/role-doctor/Schedule";
import { FloorRequestType, RoomAPIRequestType } from "../pages/role-admin/Building";
import { MedHistRequestType } from "../pages/PatientLog";
import { CreatePrescriptionRequestType } from "../components/pages/PatientLog/Prescription";
import { CreateServiceRequestType, RoomUpdateRequestType } from "../components/pages/PatientLog/Service";

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

export const apiAdminGetBuilding = async() => {
  let error = null;
  let data = null;
  try {
    const [dataFloor, dataRoom] = await Promise.all([
      hmsAxios.post(
        "/admin/get-floor.php"
      ),
      hmsAxios.post(
        "/admin/get-room.php"
      ),
    ])
    if(dataFloor.data && dataRoom.data) {
      data = {
        floors: dataFloor.data.data,
        rooms: dataRoom.data.data
      };
    }
  } catch (err:any) {
    error = err.response.data.message;
  }
  return { data, error };
}
export const apiAdminUpdateFloor = async(request:FloorRequestType) => {
  let error = null;
  let data = null;
  try {
    const res = await hmsAxios.post(
      "/admin/update-floor.php",
      JSON.stringify(request)
    );
    if(res.data) {
      data = res.data.data;
    }
  } catch (err:any) {
    error = err.response.data.message;
  }
  return { data, error };
}
export const apiAdminUpdateRooms = async(request:RoomAPIRequestType) => {
  let error = null;
  let data = null;
  try {
    const res = await hmsAxios.post(
      "/admin/update-room.php",
      JSON.stringify(request)
    );
    if(res.data) {
      data = res.data.data;
    }
  } catch (err:any) {
    error = err.response.data.message;
  }
  return { data, error };
}

export const apiAdminGetRoom = async() => {
  let error = null;
  let data = null;
  try {
    const res = await hmsAxios.post(
      "/admin/get-room.php"
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
export const apiCreateDoctorSchedule = async(scheduleForm:DynamicRequestType) => {
  let error = null;
  let data = null;
  try {
    const res = await hmsAxios.post(
      "/doctor/update-work-schedule.php",
      JSON.stringify(scheduleForm)
    );
    if(res.data) {
      data = res.data.data;
    }
  } catch (err:any) {
    error = err.response.data.message;
  }
  return { data, error };
}
export const apiUpdateDoctorSchedule = async(scheduleRequest:ScheduleRequestType) => {
  let error = null;
  let data = null;
  try {
    const res = await hmsAxios.post(
      "/doctor/update-work-schedule.php",
      JSON.stringify(scheduleRequest)
    );
    if(res.data) {
      data = res.data.data;
    }
  } catch (err:any) {
    error = err.response.data.message;
  }
  return { data, error };
}
export const apiGetDoctorAppt = async(userId:string) => {
  let error = null;
  let data = null;
  try {
    const res = await hmsAxios.post(
      "/doctor/get-appointment.php",
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
export const apiGetDoctorPatients = async(userId:string) => {
  let error = null;
  let data = null;
  try {
    const res = await hmsAxios.post(
      "/doctor/get-patient.php",
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

// Patient logs
export type UpdatePatientLogType = {
  patient_id: string,
  faculty_id: string | null,
  ptn_log_id?: string,
  is_inpatient: number,
  auth_user_id: string,
  action: string,
  start_datetime?: string,
  end_datetime?: string | null
}

export const apiGetServiceList = async() => {
  let error = null;
  let data = null;
  try {
    const res = await hmsAxios.post(
      "/doctor/list-service.php"
    );
    if(res.data) {
      data = res.data.data;
    }
  } catch (err:any) {
    error = err.response.data.message;
  }
  return { data, error };
}
export const apiUpdatePatientLog = async(request:UpdatePatientLogType) => {
  let error = null;
  let data = null;
  try {
    const res = await hmsAxios.post(
      "/doctor/update-patient-log.php",
      JSON.stringify(request)
    );
    if(res.data) {
      data = res.data.data;
    }
  } catch (err:any) {
    error = err.response.data.message;
  }
  return { data, error };
}
export const apiGetPatientLogList = async(userId:string) => {
  let error = null;
  let data = null;
  try {
    const res = await hmsAxios.post(
      "/doctor/get-patient-log-list.php",
      JSON.stringify({patient_id: userId})
    );
    if(res.data) {
      data = res.data.data;
    }
  } catch (err:any) {
    error = err.response.data.message;
  }
  return { data, error };
}
export const apiGetPatientLog = async(patientLogId:string) => {
  let error = null;
  let data = null;
  try {
    const res = await hmsAxios.post(
      "/doctor/get-patient-log.php",
      JSON.stringify({ptn_log_id: patientLogId})
    );
    if(res.data) {
      data = res.data.data;
    }
  } catch (err:any) {
    error = err.response.data.message;
  }
  return { data, error };
}
export const apiGetMedHistList = async(patientLogId:string) => {
  let error = null;
  let data = null;
  try {
    const res = await hmsAxios.post(
      "/doctor/get-med-hist.php",
      JSON.stringify({ptn_log_id: patientLogId})
    );
    if(res.data) {
      data = res.data.data;
    }
  } catch (err:any) {
    error = err.response.data.message;
  }
  return { data, error };
}
export const apiUpdateMedHist = async(request:MedHistRequestType) => {
  let error = null;
  let data = null;
  try {
    const res = await hmsAxios.post(
      "/doctor/update-med-hist.php",
      JSON.stringify(request)
    );
    if(res.data) {
      data = res.data.data;
    }
  } catch (err:any) {
    error = err.response.data.message;
  }
  return { data, error };
}

// Presription
export const apiGetPrescription = async(medHistId:string) => {
  let error = null;
  let data = null;
  try {
    const res = await hmsAxios.post(
      "/doctor/get-prescription.php",
      JSON.stringify({med_hist_id: medHistId})
    );
    if(res.data) {
      data = res.data.data;
    }
  } catch (err:any) {
    error = err.response.data.message;
  }
  return { data, error };
}
export const apiUpdatePrescription = async(request:CreatePrescriptionRequestType) => {
  let error = null;
  let data = null;
  try {
    const res = await hmsAxios.post(
      "/doctor/update-prescription.php",
      JSON.stringify(request)
    );
    if(res.data) {
      data = res.data.data;
    }
  } catch (err:any) {
    error = err.response.data.message;
  }
  return { data, error };
}
// Service
export const apiGetService = async(patientLogId:string) => {
  let error = null;
  let data = null;
  try {
    const res = await hmsAxios.post(
      "/doctor/get-services.php",
      JSON.stringify({ptn_log_id: patientLogId})
    );
    if(res.data) {
      data = res.data.data;
    }
  } catch (err:any) {
    error = err.response.data.message;
  }
  return { data, error };
}
export const apiUpdateService = async(request:CreateServiceRequestType) => {
  let error = null;
  let data = null;
  try {
    const res = await hmsAxios.post(
      "/doctor/update-service.php",
      JSON.stringify(request)
    );
    if(res.data) {
      data = res.data.data;
    }
  } catch (err:any) {
    error = err.response.data.message;
  }
  return { data, error };
}
export const apiUpdateRoom = async(request:RoomUpdateRequestType) => {
  let error = null;
  let data = null;
  try {
    const res = await hmsAxios.post(
      "/doctor/update-room.php",
      JSON.stringify(request)
    );
    if(res.data) {
      data = res.data.data;
    }
  } catch (err:any) {
    error = err.response.data.message;
  }
  return { data, error };
}
export const apiCompleteTreatment = async(patientLogId:string) => {
  let error = null;
  let data = null;
  try {
    const res = await hmsAxios.post(
      "/doctor/complete-health-log.php",
      JSON.stringify({ptn_log_id: patientLogId})
    );
    if(res.data) {
      data = res.data.data;
    }
  } catch (err:any) {
    error = err.response.data.message;
  }
  return { data, error };
}
export const apiGetServiceRoom = async() => {
  let error = null;
  let data = null;
  try {
    const [dataFloor, dataRoom] = await Promise.all([
      hmsAxios.post(
        "/admin/get-floor.php"
      ),
      hmsAxios.post(
        "/doctor/list-room.php"
      ),
    ])
    if(dataFloor.data && dataRoom.data) {
      data = {
        floors: dataFloor.data.data,
        rooms: dataRoom.data.data
      };
    }
  } catch (err:any) {
    error = err.response.data.message;
  }
  return { data, error };
}

// Patients
export const apiGetAvailDoctor = async(facultyId:string, datetime:string) => {
  let error = null;
  let data = null;
  try {
    const res = await hmsAxios.post(
      "/patient/get-available-doctor.php",
      JSON.stringify({faculty_id: facultyId, appt_datetime: datetime})
    );
    if(res.data) {
      data = res.data.data;
    }
  } catch (err:any) {
    error = err.response.data.message;
  }
  return { data, error };
}

export const apiGetPatientPayment = async() => {
  let error = null;
  let data = null;
  try {
    const res = await hmsAxios.post(
      "/patient/get-payment.php"
    );
    if(res.data) {
      data = res.data.data;
    }
  } catch (err:any) {
    error = err.response.data.message;
  }
  return { data, error };
}
export const apiGetPatientPaymentDetail = async(paymentId:string) => {
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

export const apiGetPatientAppt = async(userId:string) => {
  let error = null;
  let data = null;
  try {
    const res = await hmsAxios.post(
      "/patient/get-appointment.php",
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