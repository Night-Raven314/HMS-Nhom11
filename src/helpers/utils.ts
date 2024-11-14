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