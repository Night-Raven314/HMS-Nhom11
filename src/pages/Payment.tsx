import { FC, Fragment, useEffect, useState } from "react";
import { Helmet } from "react-helmet";
import { useParams } from "react-router-dom";
import { apiGetFinalPaymentDetails, apiGetFinalPaymentInfo, apiGetPaymentUrl } from "../helpers/axios";
import { useToast } from "../components/common/CustomToast";
import { PaymentDetailsTableType, PaymentDetailsType } from "./role-patient/PaymentLog";
import { getItemTypeName } from "../helpers/utils";

export const PaymentPage:FC = () => {
  const {openToast} = useToast();
  const {type, id} = useParams();
  const [viewPayment, setViewPayment] = useState<PaymentDetailsTableType[]>([]);
  const [totalInfo, setTotalInfo] = useState<PaymentDetailsType>();

  const getPaymentDetails = async() => {
    if(id) {
      const result = await apiGetFinalPaymentDetails(id);
      if(result.error) {
        openToast("error", "Lỗi", "Đã xảy ra lỗi khi lấy thông tin!", 5000);
      } else if(result.data) {
        setupPaymentDetail(result.data)
      }
    }
  }
  const getPaymentInfo = async() => {
    if(id) {
      const result = await apiGetFinalPaymentInfo(id);
      if(result.error) {
        openToast("error", "Lỗi", "Đã xảy ra lỗi khi lấy thông tin!", 5000);
      } else if(result.data) {
        setTotalInfo(result.data[0])
      }
    }
  }

  const setupPaymentDetail = (data:any) => {
    let uniqueType:string[] = [];
    data.forEach((item:any) => {
      if(!uniqueType.includes(item.item_type) && item.item_type !== null) {
        uniqueType.push(item.item_type);
      }
    });
    let tmpDetailsTable:PaymentDetailsTableType[] = []
    uniqueType.forEach(type => {
      tmpDetailsTable.push({
        tableType: type,
        tableDetails: data.filter((item:any) => item.item_type === type)
      })
    })
    setViewPayment(tmpDetailsTable);
  }

  const startPayment = async() => {
    if(id) {
      const result = await apiGetPaymentUrl(id);
      if(result.error) {
        openToast("error", "Lỗi", "Đã xảy ra lỗi khi lấy thông tin!", 5000);
      } else if(result.data) {
        window.open(result.data.vnp_Url, "_self");
      }
    }
  }

  useEffect(() => {
    if(id) {
      getPaymentDetails();
      getPaymentInfo();
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
                  <button className="btn btn-gradient" onClick={() => startPayment()}>Thanh toán</button>
                </div>
              </div>
            ) : ""}
          </div>
          <div className="row">
            {viewPayment.map((type, typeIndex) => (
              <Fragment>
                {type.tableType === "appointment" ? (
                  <div className="col-md-12" key={typeIndex}>
                    <div className="hms-table appt" style={{marginBottom: "30px"}}>
                      <div className="table-header">
                        <div className="header-title">{getItemTypeName(type.tableType)}</div>
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
                            {type.tableDetails.map((payment,index) => (
                              <tr key={index}>
                                <td>{payment.full_name}</td>
                                <td>{payment.fac_name}</td>
                                <td>{payment.amount}</td>
                                <td>{payment.appt_fee}</td>
                                <td>{payment.total_value}</td>
                                <td>{payment.item_note}</td>
                              </tr>
                            ))}
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                ) : (
                  <div className="col-md-6" key={typeIndex}>
                    <div className="hms-table" style={{marginBottom: "30px"}}>
                      <div className="table-header">
                        <div className="header-title">{getItemTypeName(type.tableType)}</div>
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
                            {type.tableDetails.map((payment,index) => (
                              <tr key={index}>
                                <td>{payment.full_name}</td>
                                <td>{payment.fac_name}</td>
                                <td>{payment.amount}</td>
                                <td>{payment.appt_fee}</td>
                                <td>{payment.total_value}</td>
                                <td>{payment.item_note}</td>
                              </tr>
                            ))}
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                )}
              </Fragment>
            ))}
          </div>
        </div>
      </div>
    </>
  )
}