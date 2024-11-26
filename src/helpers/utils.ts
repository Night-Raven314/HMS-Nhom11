import { format } from "date-fns";

export const getItemTypeName = (type:string) => {
  switch (type) {
    case "appointment":
      return "Đặt hẹn khám bệnh"
    case "prescription":
      return "Đơn thuốc"
    case "facility":
      return "Dịch vụ"
  
    default:
      break;
  }
}
export const getRoleName = (role:string) => {
  switch (role) {
    case "admin":
      return "Quản trị viên"
    case "doctor":
      return "Bác sỹ"
    case "nurse":
      return "Y tá"
    case "patient":
      return "Bệnh nhân"
  
    default:
      return "Không xác định"
  }
}
export const getGenderName = (gender:string) => {
  switch (gender) {
    case "male":
      return "Nam"
    case "female":
      return "Nữ"
  
    default:
      return "Chưa chọn";
  }
}
export const getFloorStatus = (status:string) => {
  switch (status) {
    case "active":
      return "Hoạt động"
  
    default:
      return "Không xác định";
  }
}
export const getRoomStatus = (status:string) => {
  switch (status) {
    case "active":
      return "Còn trống"
    case "occupied":
      return "Hết chỗ"
    case "maintenance":
      return "Bảo trì"
  
    default:
      return "Không xác định";
  }
}
export const getApptStatus = (status:string) => {
  switch (status) {
    case "active":
      return "Đang điều trị";
    case "upcoming":
      return "Đã đặt hẹn";
  
    default:
      return "Không xác định";
  }
}
export const getPaymentStatus = (status:string) => {
  switch (status) {
    case "pending":
      return "Chưa thanh toán";
    case "completed":
      return "Đã thanh toán";
    case "refund":
      return "Đã hoàn thành";
  
    default:
      return "Không xác định";
  }
}
export const stockChangeName = (name:string) => {
  switch (name) {
    case "addition":
      return "Thêm"
    case "deduction":
      return "Giảm"
  
    default:
      break;
  }
}

export const convertISOToDateTime = (date:string) => {
  return format(new Date(date), "dd/MM/yyyy - HH:mm");
}