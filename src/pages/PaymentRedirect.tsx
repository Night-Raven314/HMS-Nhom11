import { FC, useEffect, useState } from "react";
import { apiGetFinalPaymentInfo, apiProcessPaymentRedirect } from "../helpers/axios";
import { useToast } from "../components/common/CustomToast";
import { PaymentDetailsType } from "./role-patient/PaymentLog";
import { Link, useNavigate } from "react-router-dom";

export const PaymentRedirect:FC = () => {
  const {openToast} = useToast();
  const navigate = useNavigate();
  const [totalInfo, setTotalInfo] = useState<PaymentDetailsType>();
  const [status, setStatus] = useState<string>("pending")

  useEffect(() => {
    const processSignIn = async(param:string) => {
      const response = await apiProcessPaymentRedirect(param);
      if(response.data) {
        if(response.data.status !== "pending") {
          setStatus(response.data.status);
          const result = await apiGetFinalPaymentInfo(response.data.payment_id);
          if(result.error) {
            openToast("error", "Lỗi", "Đã xảy ra lỗi khi lấy thông tin!", 5000);
          } else if(result.data) {
            setTotalInfo(result.data[0])
          }
        }
      }
    }
    const getFullUrl = window.location.href;
    const getParam = getFullUrl.split("https://localhost/payment-redirect")[1];
    if(getParam) {
      processSignIn(getParam);
    }
  }, [])

  return (
    <div className="center-fixed-container">
      <div className="payment-container">
        <div className="centered-content">
          <div className="logo-container">
            <div className="logo-img">
              <img src="/backend/assets/image/logo01-sq.png" className="navbar-brand-img h-100" alt="main_logo" />
            </div>
          </div>
          <div className="payment-title">{status === "pending" ? "Đang xử lý giao dịch..." : (status === "success" ? "Giao dịch thành công" : "Giao dịch thất bại")}</div>
          {totalInfo ? (
            <div className="payment-box">
              <div className="box-container">
                <div className="container-left">
                  Thành tiền
                </div>
                <div className="container-right">
                  {totalInfo.amount}đ
                </div>
              </div>
              <div className="box-container">
                <div className="container-left">
                  Nội dung
                </div>
                <div className="container-right">
                  {totalInfo.payment_desc}
                </div>
              </div>
              <div className="box-button">
                <button className="btn btn-gradient" onClick={() => {
                  if(status === "success") {
                    navigate("/role-patient/appointment");
                  }
                  if(status === "failed") {
                    navigate("/role-patient/payment-log");
                  }
                }}>Quay lại</button>
              </div>
            </div>
          ) : ""}
        </div>
      </div>
    </div>
  )
}