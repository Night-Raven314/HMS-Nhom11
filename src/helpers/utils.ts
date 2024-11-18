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

export const convertISOToDateTime = (date:string) => {
  return format(new Date(date), "yyyy-MM-dd HH:mm");
}