import { FC, useEffect, useRef, useState } from "react";
import { Helmet } from "react-helmet";
import { AdminSidebar } from "../../components/common/AdminSidebar";
import { NavbarHandles, PageNavbar } from "../../components/common/PageNavbar";
import { CustomModal, CustomModalHandles } from "../../components/common/CustomModal";
import { apiGetPayment, apiGetPaymentDetail } from "../../helpers/axios";
import { useToast } from "../../components/common/CustomToast";

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


export const AdminPaymentLog: FC = () => {
  const {openToast} = useToast();

  const navbarRef = useRef<NavbarHandles>(null);
  const infoModalRef = useRef<CustomModalHandles>(null);
  const [viewPayment, setViewPayment] = useState<PaymentListType | null>(null);
  const [searchKeyword, setSearchKeyword] = useState<string>("");
  const [paymentList, setPaymentList] = useState<PaymentListType[]>([]);
  const [paymentListFiltered, setPaymentListFiltered] = useState<PaymentListType[]>([]);

  const pageTerm = "chuyên khoa";

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
              setViewPayment(getPaymentDetails.data);
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
  useEffect(() => {
    searchPayment();
  }, [paymentList, searchKeyword])

  return (
    <>
      <Helmet>
        <title>
          Quản lý {pageTerm} - HKL
        </title>
      </Helmet>

      <div className="main-background">
        <div className="page-container">
          <div className="page-sidebar">
            <AdminSidebar selectedItem={"payment-log"} />
          </div>
          <div className="page-content">
            <PageNavbar
              navbarTitle={`Quản lý ${pageTerm}`}
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
                      </tr>
                    </thead>
                    <tbody>
                      {paymentListFiltered.map((payment) => (
                        <tr key={payment.payment_id} onClick={() => toggleViewModal("open", payment.payment_id)} style={{cursor: "pointer"}}>
                          <td className="text-color">{payment.payment_id}</td>
                          <td>{payment.created_at}</td>
                          <td>{payment.updated_at ? payment.updated_at : ""}</td>
                          <td>{payment.payment_type}</td>
                          <td>{payment.bank_trans_code}</td>
                          <td>{payment.amount}</td>
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

      {/* Modal xem giao dịch */}
      <CustomModal
        headerTitle={"Thông tin giao dịch"}
        size="md"
        type="modal"
        ref={infoModalRef}
      >
        <div className="body-content">
          
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