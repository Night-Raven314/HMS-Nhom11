import { FC, useEffect } from "react";
import { setUserSession } from "../helpers/global";
import { useNavigate } from "react-router-dom";

export const Logout:FC = () => {
  const navigate = useNavigate();
  useEffect(() => {
    window.localStorage.removeItem("signedInUser");
    window.localStorage.removeItem("tmpUser");
    setUserSession(null);
    navigate("/sign-in");
  }, [])
  return (
    <></>
  )
}