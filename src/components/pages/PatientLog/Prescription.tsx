import { FC, useEffect } from "react";
import { aptGetPrescription } from "../../../helpers/axios";
import { useToast } from "../../common/CustomToast";

export type PrescriptionProps = {
  selectedMedHistId: string | null;
}

export const PrescriptionTable:FC<PrescriptionProps> = ({
  selectedMedHistId
}) => {
  const {openToast} = useToast();
  const getPrescription = async() => {
    if(selectedMedHistId) {
      const result = await aptGetPrescription(selectedMedHistId);
      if(result.error) {
        openToast("error", "Lỗi", "Đã xảy ra lỗi khi lấy thông tin!", 5000);
      } else if (result.data) {
        
      }
    }
  }

  useEffect(() => {
    if(selectedMedHistId) {
      getPrescription();
    }
  }, [selectedMedHistId])

  return (
    <>
      <div className="hms-table">
        <div className="table-header">
          <div className="header-title">Đơn thuốc</div>
          {selectedMedHistId ? (
            <div className="header-button">
              <button className="btn btn-outline-primary btn-sm" onClick={() => {}}>
                Tạo
              </button>
            </div>
          ) : ""}
        </div>
        <div className="table-body">
          {selectedMedHistId ? (
            <table>
              <thead>
                <tr>
                  <th style={{ width: "100px" }}>Tên thuốc</th>
                  <th style={{ width: "45px" }}>Đơn vị</th>
                  <th style={{ width: "45px" }}>Số lượng</th>
                  <th style={{ width: "150px" }}>Ghi chú</th>
                </tr>
              </thead>
              <tbody>
                {Array.from({ length: 30 }, (_, index) => index).map((item) => (
                  <tr>
                    <td>OnabotulinumtoxinA</td>
                    <td>hộp</td>
                    <td>69</td>
                    <td>Uống 1 viên buổi sáng trước ăn</td>
                  </tr>
                ))}
              </tbody>
            </table>
          ) : (
            <div className="table-center-alert">Hãy chọn một lịch sử kiểm tra sức khoẻ để xem đơn thuốc</div>
          )}
        </div>
      </div>  
    </>
  )
}