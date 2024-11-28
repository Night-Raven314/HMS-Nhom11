import { FC, useEffect } from "react";
import { Helmet } from "react-helmet";
import { useParams } from "react-router-dom";
import { apiGetFinalPaymentDetails } from "../helpers/axios";
import { useToast } from "../components/common/CustomToast";

export const PaymentPage:FC = () => {
  const {openToast} = useToast();
  const {type, id} = useParams();

  const getPaymentDetails = async() => {
    if(id) {
      const result = await apiGetFinalPaymentDetails(id);
      if(result.error) {
        openToast("error", "Lỗi", "Đã xảy ra lỗi khi lấy thông tin!", 5000);
      } else if(result.data) {

      }
    }
  }

  useEffect(() => {
    if(id) {
      getPaymentDetails();
    }
  }, [id])

  return (
    <>
      <Helmet>
        <title>Thanh toán - HKL</title>
      </Helmet>
      <div className="center-fixed-container">
        <div className="payment-container">
          <div className="centered-content">
            <div className="logo-container">
              <div className="logo-img">
                <img src="/backend/assets/image/logo01-sq.png" className="navbar-brand-img h-100" alt="main_logo" />
              </div>
            </div>
            <div className="payment-title">Phiếu thanh toán</div>
            <div className="payment-box">
              <div className="box-container">
                <div className="container-left">
                  Thành tiền
                </div>
                <div className="container-right">
                  69.000.000đ
                </div>
              </div>
              <div className="box-container">
                <div className="container-left">
                  Nội dung
                </div>
                <div className="container-right">
                  Thanh toán viện phí
                </div>
              </div>
              <div className="box-button">
                <button className="btn btn-gradient">Bắt đầu thanh toán</button>
              </div>
            </div>
          </div>
          <div className="row">
            <div className="col-md-6">
              <div className="hms-table" style={{marginBottom: "30px"}}>
                <div className="table-header">
                  <div className="header-title">Đơn thuốc</div>
                </div>
                <div className="table-body">
                  <table>
                    <thead>
                      <tr>
                        <th style={{ width: "150px" }}>Tên sản phẩm</th>
                        <th style={{ width: "140px" }}>Đơn vị</th>
                        <th style={{ width: "50px" }}>Số lượng</th>
                        <th style={{ width: "100px" }}>Đơn giá</th>
                        <th style={{ width: "100px" }}>Tổng</th>
                        <th style={{ width: "140px" }}>Ghi chú</th>
                      </tr>
                    </thead>
                    <tbody>
                      {[...Array(30)].map((_,index) => (
                        <tr key={index}>
                          <td>fuck nigga ass</td>
                          <td>weed</td>
                          <td>6969</td>
                          <td>69000000đ</td>
                          <td>69000000đ</td>
                          <td>fuck nigga ass</td>
                        </tr>
                      ))}
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div className="col-md-6">
              <div className="hms-table" style={{marginBottom: "30px"}}>
                <div className="table-header">
                  <div className="header-title">Dịch vụ</div>
                </div>
                <div className="table-body">
                  <table>
                    <thead>
                      <tr>
                        <th style={{ width: "150px" }}>Tên sản phẩm</th>
                        <th style={{ width: "140px" }}>Đơn vị</th>
                        <th style={{ width: "50px" }}>Số lượng</th>
                        <th style={{ width: "100px" }}>Đơn giá</th>
                        <th style={{ width: "100px" }}>Tổng</th>
                        <th style={{ width: "140px" }}>Ghi chú</th>
                      </tr>
                    </thead>
                    <tbody>
                      {[...Array(30)].map((_,index) => (
                        <tr key={index}>
                          <td>fuck nigga ass</td>
                          <td>weed</td>
                          <td>6969</td>
                          <td>69000000đ</td>
                          <td>69000000đ</td>
                          <td>fuck nigga ass</td>
                        </tr>
                      ))}
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </>
  )
}