import { format } from "date-fns";

export const calculateAge = (birthday: string): number => {
  const birthDate = new Date(birthday);
  const today = new Date();

  // Calculate the year difference
  let age = today.getFullYear() - birthDate.getFullYear();
  // Check if the birthday has occurred this year
  const monthDifference = today.getMonth() - birthDate.getMonth();
  const dayDifference = today.getDate() - birthDate.getDate();

  // Adjust if the birthday hasn't occurred yet this year
  if (monthDifference < 0 || (monthDifference === 0 && dayDifference < 0)) {
    age--;
  }

  return age;
}


export const getItemTypeName = (type:string) => {
  switch (type) {
    case "appointment":
      return "Đặt hẹn khám bệnh"
    case "patient-log":
      return "Khám chữa bệnh"
    case "facility":
      return "Dịch vụ";
    case "prescription":
      return "Đơn thuốc";
  
    default:
      return "Không xác định"
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
    case "failed":
      return "Không thành công";
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
export const apptStatusName = (name:string) => {
  switch (name) {
    case "upcoming":
      return "Sắp đến"
    case "missed":
      return "Đã bỏ qua"
    case "completed":
      return "Hoàn thành"
    case "deleted":
      return "Đã xoá"
  
    default:
      break;
  }
}

export const convertISOToDateTime = (date:string) => {
  return format(new Date(date), "dd/MM/yyyy - HH:mm");
}

export const formatPrice = (value: string): string => {
  return value.replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}