import { FC, useEffect, useRef, useState } from "react";
import { Helmet } from "react-helmet";
import { AdminSidebar } from "../../components/common/AdminSidebar";
import { NavbarHandles, PageNavbar } from "../../components/common/PageNavbar";
import { CustomModal, CustomModalHandles } from "../../components/common/CustomModal";
import { apiGetPayment, apiGetPaymentDetail } from "../../helpers/axios";
import { useToast } from "../../components/common/CustomToast";
import { getItemTypeName } from "../../helpers/utils";
import { PaymentReceipt } from "../../components/pdf/PaymentReceipt";

export type PaymentListType = {
  payment_id: string;
  payment_type: string;
  appt_id: string;
  med_hist_id: string;
  fac_mgmt_id: string | null;
  amount: string;
  payment_desc: string;
  payment_status: string;
  bank_trans_code: string | null;
  created_at: string;
  updated_at: string;
};
type PaymentDetailsType = {
  payment_id: string;
  payment_type: string;
  payment_desc: string;
  appt_id: string;
  full_name: string;
  fac_name: string;
  amount: string;
  appt_fee: string;
  total_value: string;
  item_type: string;
  item_note: string;
};
type PaymentDetailsTableType = {
  tableType: string;
  tableDetails: PaymentDetailsType[]
}



export const AdminPaymentLog: FC = () => {
  const {openToast} = useToast();

  const navbarRef = useRef<NavbarHandles>(null);
  const infoModalRef = useRef<CustomModalHandles>(null);
  const [viewPayment, setViewPayment] = useState<PaymentDetailsTableType[]>([]);
  const [searchKeyword, setSearchKeyword] = useState<string>("");
  const [paymentList, setPaymentList] = useState<PaymentListType[]>([]);
  const [paymentListFiltered, setPaymentListFiltered] = useState<PaymentListType[]>([]);
  const [paymentIdForExport, setPaymentIdForExport] = useState<string | null>(null)

  const pageTerm = "Lịch sử giao dịch";

  useEffect(() => {
    getPaymentList();
  }, [])

  const toggleViewModal = async(action: string, paymentId?:string) => {
    if (infoModalRef.current) {
      switch (action) {
        case "open":
          if(paymentId) {
            const getPaymentDetails = await apiGetPaymentDetail(paymentId);
            if(getPaymentDetails.error) {
              openToast("error", "Lỗi", "Đã xảy ra lỗi khi lấy lịch sử giao dịch này!", 5000);
            } else if(getPaymentDetails.data) {
              setupPaymentDetail(getPaymentDetails.data);
              infoModalRef.current.openModal();
            }
          }
          break;
        case "close":
          infoModalRef.current.closeModal();
          break;

        default:
          break;
      }
    }
  }

  const setupPaymentDetail = (data:any) => {
    let uniqueType:string[] = [];
    data.forEach((item:any) => {
      if(!uniqueType.includes(item.item_type)) {
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

  const getPaymentList = async() => {
    const getPayment = await apiGetPayment();
    if(getPayment.error) {
      openToast("error", "Lỗi", "Đã xảy ra lỗi khi lấy lịch sử giao dịch!", 5000);
    } else if (getPayment.data) {
      setPaymentList(getPayment.data);
    }
  }
  const searchPayment = () => {
    if(searchKeyword) {
      const searchKeywordLower = searchKeyword.toLowerCase();
      const filterList = paymentList.filter(payment => payment.payment_id.toLowerCase().includes(searchKeywordLower));
      setPaymentListFiltered(filterList);
    } else { 
      setPaymentListFiltered(paymentList);
    }
  }
  const downloadPayment = (paymentId:string) => {
    setPaymentIdForExport(paymentId);
    setTimeout(() => {
      setPaymentIdForExport(null);
    }, 1000);
  }
  useEffect(() => {
    searchPayment();
  }, [paymentList, searchKeyword])

  return (
    <>
      <Helmet>
        <title>
          {pageTerm} - HKL
        </title>
      </Helmet>

      <div className="main-background">
        <div className="page-container">
          <div className="page-sidebar">
            <AdminSidebar selectedItem={"payment-log"} />
          </div>
          <div className="page-content">
            <PageNavbar
              navbarTitle={`${pageTerm}`}
              searchRequest={(keyword) => {setSearchKeyword(keyword)}}
              ref={navbarRef}
            />
            <div className="content">
              <div className="hms-table">
                <div className="table-header">
                  <div className="header-title">Thông tin {pageTerm} trên hệ thống</div>
                </div>
                <div className="table-body">
                  <table>
                    <thead>
                      <tr>
                        <th style={{ width: "200px" }}>Mã giao dịch</th>
                        <th style={{ width: "140px" }}>Ngày tạo</th>
                        <th style={{ width: "140px" }}>Thời gian cập nhật</th>
                        <th style={{ width: "120px" }}>Loại giao dịch</th>
                        <th style={{ width: "100px" }}>Mã tham chiếu</th>
                        <th style={{ width: "100px" }}>Giá trị</th>
                        <th style={{ width: "110px" }}>Thao tác</th>
                      </tr>
                    </thead>
                    <tbody>
                      {paymentListFiltered.map((payment) => (
                        <tr key={payment.payment_id} style={{cursor: "pointer"}}>
                          <td className="text-color" onClick={() => toggleViewModal("open", payment.payment_id)}>{payment.payment_id}</td>
                          <td onClick={() => toggleViewModal("open", payment.payment_id)}>{payment.created_at}</td>
                          <td onClick={() => toggleViewModal("open", payment.payment_id)}>{payment.updated_at ? payment.updated_at : ""}</td>
                          <td>{getItemTypeName(payment.payment_type)}</td>
                          <td>{payment.bank_trans_code}</td>
                          <td>{payment.amount}</td>
                          <td>
                            <div className="table-button-row">
                              <div style={{flex:1}}>
                                <button onClick={() => {downloadPayment(payment.payment_id)}}>
                                  Tải về PDF
                                </button>
                              </div>
                            </div>
                          </td>
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

      {paymentIdForExport ? (
        <PaymentReceipt paymentId={paymentIdForExport} />
      ) : ""}

      {/* Modal xem giao dịch */}
      <CustomModal
        headerTitle={"Thông tin giao dịch"}
        size="xl"
        type="modal"
        ref={infoModalRef}
      >
        <div className="body-content">
          {viewPayment.length ? (
            <>
              {viewPayment.map(type => (
                <>
                  <div className="table-title">{getItemTypeName(type.tableType)}</div>
                  <div className="hms-table no-header full-height" style={{marginBottom: "30px"}}>
                    <div className="table-body">
                      <table>
                        <thead>
                          <tr>
                            <th style={{ width: "150px" }}>{type.tableType === "appointment" ? "Bác sỹ" : "Tên sản phẩm"}</th>
                            <th style={{ width: "140px" }}>{type.tableType === "appointment" ? "Chuyên khoa" : "Đơn vị"}</th>
                            <th style={{ width: "50px" }}>Số lượng</th>
                            <th style={{ width: "100px" }}>Đơn giá</th>
                            <th style={{ width: "100px" }}>Tổng</th>
                            <th style={{ width: "140px" }}>Ghi chú</th>
                          </tr>
                        </thead>
                        <tbody>
                          {type.tableDetails.map((payment, index) => (
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
                </>
              ))}
            </>
          ) : (
            <div>Không có dữ liệu</div>
          )}
        </div>
        <div className="body-footer">
          <div className="button-list">
            <button type="button" className="btn btn-outline" onClick={() => toggleViewModal("close")}>Đóng</button>
          </div>
        </div>
      </CustomModal>

    </>
  )
}