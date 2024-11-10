import { FC, useEffect, useState } from "react";
import { createBrowserRouter, RouterProvider } from "react-router-dom";
import { HomePage } from "./pages/HomePage";
import { SignInPage } from "./pages/SignIn";
import { SignUpPage } from "./pages/SignUp";
import { setTmpUserSession, setUserSession } from "./helpers/global";
import { AdminGuest } from "./pages/role-admin/Guest";
import { GoogleLoginRedirect } from "./pages/GoogleLoginRedirect";
import { CompleteProfile } from "./pages/role-patient/CompleteProfile";

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
      path: "/sign-up",
      element: <SignUpPage />,
    },
    {
      path: "/google-login-redirect",
      element: <GoogleLoginRedirect />,
    },
    {
      path: "/role-patient/complete-profile",
      element: <CompleteProfile />,
    },
    {
      path: "/role-admin/guest",
      element: <AdminGuest />,
    },
    {
      path: "/role-admin/employee",
      element: <div>To be added</div>,
    },
    {
      path: "/role-admin/payment_log",
      element: <div>To be added</div>,
    },
    {
      path: "/role-admin/specialty",
      element: <div>To be added</div>,
    },
    {
      path: "/role-admin/supply",
      element: <div>To be added</div>,
    },
    {
      path: "/role-doctor/",
      element: <div>To be added</div>,
    },
    {
      path: "/role-patient/",
      element: <div>To be added</div>,
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