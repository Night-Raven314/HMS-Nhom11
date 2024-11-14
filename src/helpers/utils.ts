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

export const convertISOToDateTime = (date:string) => {
  return format(new Date(date), "yyyy-MM-dd HH:mm");
}