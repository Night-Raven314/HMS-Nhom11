import { FC, useEffect, useState } from "react";
import { createBrowserRouter, RouterProvider } from "react-router-dom";
import { HomePage } from "./pages/HomePage";
import { SignInPage } from "./pages/SignIn";
import { SignUpPage } from "./pages/SignUp";
import { setTmpUserSession, setUserSession } from "./helpers/global";
import { AdminGuest } from "./pages/role-admin/Guest";
import { GoogleLoginRedirect } from "./pages/GoogleLoginRedirect";
import { CompleteProfile } from "./pages/role-patient/CompleteProfile";
import { ProfilePage } from "./pages/Profile";
import { AdminItem } from "./pages/role-admin/Item";
import { AdminFaculty } from "./pages/role-admin/Faculty";
import { AdminPaymentLog } from "./pages/role-admin/PaymentLog";
import { DoctorSchedule } from "./pages/role-doctor/Schedule";
import { Logout } from "./pages/Logout";
import { FacebookLoginRedirect } from "./pages/FacebookLoginRedirect";
import { DoctorAppointment } from "./pages/role-doctor/Appointment";
import { DoctorPatients } from "./pages/role-doctor/Patients";
import { AdminBuilding } from "./pages/role-admin/Building";
import { PatientInfo } from "./pages/PatientInfo";
import { PatientLog } from "./pages/PatientLog";
import { PatientAppointment } from "./pages/role-patient/Appointment";
import { PatientPaymentLog } from "./pages/role-patient/PaymentLog";

export const App:FC = () => {
  const [checkLogin, setCheckLogin] = useState<boolean>(false);
  useEffect(() => {
    const getLoginSession = window.localStorage.getItem("signedInUser");
    if(getLoginSession) {
      setUserSession(JSON.parse(getLoginSession));
    }
    const getTmpUser = window.localStorage.getItem("tmpUser");
    if(getTmpUser) {
      setTmpUserSession(JSON.parse(getTmpUser));
    }
    setTimeout(() => {
      setCheckLogin(true);
    }, 100);
  }, [])
  const router = createBrowserRouter([
    {
      path: "/",
      element: <HomePage />,
    },
    {
      path: "/sign-in",
      element: <SignInPage />,
    },
    {
      path: "/logout",
      element: <Logout />,
    },
    {
      path: "/sign-up",
      element: <SignUpPage />,
    },
    {
      path: "/profile",
      element: <ProfilePage />,
    },
    {
      path: "/patient-info/:patientId",
      element: <PatientInfo />,
    },
    {
      path: "/patient-log/:patientLogId",
      element: <PatientLog />,
    },
    {
      path: "/google-login-redirect",
      element: <GoogleLoginRedirect />,
    },
    {
      path: "/facebook-login-redirect",
      element: <FacebookLoginRedirect />,
    },
    {
      path: "/role-patient/complete-profile",
      element: <CompleteProfile />,
    },
    // Admin page
    {
      path: "/role-admin/building",
      element: <AdminBuilding />,
    },
    {
      path: "/role-admin/guest",
      element: <AdminGuest pageType="guest" />,
    },
    {
      path: "/role-admin/employee",
      element: <AdminGuest pageType="employee" />,
    },
    {
      path: "/role-admin/payment-log",
      element: <AdminPaymentLog />,
    },
    {
      path: "/role-admin/faculty",
      element: <AdminFaculty />,
    },
    {
      path: "/role-admin/supply",
      element: <AdminItem pageType="item" />,
    },
    {
      path: "/role-admin/medicine",
      element: <AdminItem pageType="meds" />,
    },
    {
      path: "/role-admin/med-service",
      element: <AdminItem pageType="med_service" />,
    },
    // Doctor page
    {
      path: "/role-doctor/schedule",
      element: <DoctorSchedule />,
    },
    {
      path: "/role-doctor/appointment",
      element: <DoctorAppointment />,
    },
    {
      path: "/role-doctor/patients",
      element: <DoctorPatients />,
    },
    // Nurse page
    {
      path: "/role-nurse/schedule",
      element: <DoctorSchedule />,
    },
    {
      path: "/role-nurse/appointment",
      element: <DoctorAppointment />,
    },
    {
      path: "/role-nurse/patients",
      element: <DoctorPatients />,
    },
    // Patient page
    {
      path: "/role-patient/appointment",
      element: <PatientAppointment />,
    },
    {
      path: "/role-patient/patient-log",
      element: <PatientPaymentLog />,
    },
    {
      path: "/role-patient/",
      element: <div>To be added</div>,
    },
  ]);
  return (
    <>
      {checkLogin ? (
        <RouterProvider router={router} />
      ) : ""}
    </>
  )
}