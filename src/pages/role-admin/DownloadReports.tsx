import { FC, useEffect, useRef, useState } from "react";
import { PageNavbar } from "../../components/common/PageNavbar";
import { AdminSidebar } from "../../components/common/AdminSidebar";
import { Helmet } from "react-helmet";
import { FormikProps, Formik, Form } from "formik";
import { CustomInput } from "../../components/common/CustomInput";
import { endOfMonth, format, setDate, setDay } from "date-fns";
import { apiExportAppointment, apiExportPaymentLog } from "../../helpers/axios";
import { useToast } from "../../components/common/CustomToast";
import { apptStatusName, convertISOToDateTime, formatPrice, getItemTypeName, getPaymentStatus } from "../../helpers/utils";

export type DownloadReportFormType = {
  start_date?: string,
  end_date?: string
}
export type PaymentLogReportType = {
  created_at: string;
  updated_at: string | null;
  payment_status: string;
  payment_id: string;
  payment_type: string;
  payment_desc: string;
  item_type: string | null;
  full_name: string | null;
  fac_name: string | null;
  amount: string | null;
  appt_fee: string | null;
  total_value: string | null;
  item_note: string | null;
};
type AppointmentReportType = {
  appt_id: string;
  doctor_id: string;
  doctor_name: string;
  patient_id: string;
  patient_name: string;
  faculty_id: string;
  faculty_name: string;
  appt_fee: string;
  appt_datetime: string;
  appt_status: string;
};


export const AdminDownloadReports:FC = () => {
  const {openToast} = useToast();

  // Payment log
  const [paymentLogFormInitial, setPaymentLogFormInitial] = useState<DownloadReportFormType>({
    start_date: "",
    end_date: "",
  })
  const downloadPaymentLogForm = useRef<FormikProps<DownloadReportFormType>>(null);
  const submitDownloadPaymentLog = async(values:DownloadReportFormType) => {
    const getData = await apiExportPaymentLog(values);
    if(getData.error) {
      openToast("error", "Lỗi", "Đã xảy ra lỗi khi lấy dữ liệu!", 5000);
    } else if(getData.data && values.start_date && values.end_date) {
      const result:PaymentLogReportType[] = getData.data;
      const headers = ["Mã thanh toán", "Tên sản phẩm", "Đơn vị", "Số lượng", "Đơn giá", "Thành tiền", "Loại sản phẩm", "Ghi chú sản phẩm", "Loại thanh toán", "Nội dung thanh toán", "Trạng thái thanh toán", "Ngày tạo", "Lần cuối cập nhật"];
      let csvRows:string[] = [];
      csvRows.push(headers.map((header) => `${header}`).join(";"));
      result.forEach(item => {
        const value = [ item.payment_id || "", item.full_name || "", item.fac_name || "", item.amount || "", item.appt_fee ? formatPrice(item.appt_fee) : "", item.total_value ? formatPrice(item.total_value) : "", item.item_type ? getItemTypeName(item.item_type) : "", item.item_note || "", item.payment_type ? getItemTypeName(item.payment_type) : "", item.payment_desc || "", item.payment_status ? getPaymentStatus(item.payment_status) : "", item.created_at || "", item.updated_at || ""];
        csvRows.push(value.join(";"))
      })
      // Create CSV string
      const csvString: string = "\uFEFF" + csvRows.join("\n");

      // Create a Blob object
      const blob = new Blob([csvString], { type: "text/csv;charset=utf-8;" });
      const url = URL.createObjectURL(blob);

      // Create a temporary link element and trigger download
      const link = document.createElement("a");
      link.href = url;
      link.download = `Lịch sử thanh toán ${format(new Date(values.start_date), "dd.MM.yyyy")} - ${format(new Date(values.end_date), "dd.MM.yyyy")}.csv`;
      document.body.appendChild(link);
      link.click();
      document.body.removeChild(link);
    }
  }
  const validatePaymentLogForm = (value: DownloadReportFormType) => {
    let errors: DownloadReportFormType = {};
    if (!value.start_date) {
      errors.start_date = "Trường này không được bỏ trống!";
    }
    if (!value.end_date) {
      errors.end_date = "Trường này không được bỏ trống!";
    }
    return errors;
  }

  // Appointment
  const [appointmentFormInitial, setAppointmentFormInitial] = useState<DownloadReportFormType>({
    start_date: "",
    end_date: "",
  })
  const downloadAppointmentForm = useRef<FormikProps<DownloadReportFormType>>(null);
  const submitDownloadAppointment = async(values:DownloadReportFormType) => {
    const getData = await apiExportAppointment(values);
    if(getData.error) {
      openToast("error", "Lỗi", "Đã xảy ra lỗi khi lấy dữ liệu!", 5000);
    } else if(getData.data && values.start_date && values.end_date) {
      const result:AppointmentReportType[] = getData.data;
      const headers = ["Mã đặt hẹn", "Tên bác sĩ", "Mã bác sĩ", "Tên bệnh nhân", "Mã bệnh nhân", "Chuyên khoa", "Mã chuyên khoa", "Phí đặt hẹn", "Ngày hẹn", "Trạng thái"];
      let csvRows:string[] = [];
      csvRows.push(headers.map((header) => `${header}`).join(";"));
      result.forEach(item => {
        const value = [ item.appt_id, item.doctor_name, item.doctor_id, item.patient_name, item.patient_id, item.faculty_name, item.faculty_id, formatPrice(item.appt_fee), convertISOToDateTime(item.appt_datetime), apptStatusName(item.appt_status) ];
        csvRows.push(value.join(";"))
      })
      // Create CSV string
      const csvString: string = "\uFEFF" + csvRows.join("\n");

      // Create a Blob object
      const blob = new Blob([csvString], { type: "text/csv;charset=utf-8;" });
      const url = URL.createObjectURL(blob);

      // Create a temporary link element and trigger download
      const link = document.createElement("a");
      link.href = url;
      link.download = `Lịch sử đặt hẹn ${format(new Date(values.start_date), "dd.MM.yyyy")} - ${format(new Date(values.end_date), "dd.MM.yyyy")}.csv`;
      document.body.appendChild(link);
      link.click();
      document.body.removeChild(link);
    }
  }
  const validateAppointmentForm = (value: DownloadReportFormType) => {
    let errors: DownloadReportFormType = {};
    if (!value.start_date) {
      errors.start_date = "Trường này không được bỏ trống!";
    }
    if (!value.end_date) {
      errors.end_date = "Trường này không được bỏ trống!";
    }
    return errors;
  }

  useEffect(() => {
    setPaymentLogFormInitial({
      start_date: format(setDate(new Date(), 1), "yyyy-MM-dd"),
      end_date: format(endOfMonth(new Date()), "yyyy-MM-dd"),
    })
    setAppointmentFormInitial({
      start_date: format(setDate(new Date(), 1), "yyyy-MM-dd"),
      end_date: format(endOfMonth(new Date()), "yyyy-MM-dd"),
    })
  }, [])

  return (
    <>
      <Helmet>
        <title>
          Tải về báo cáo - HKL
        </title>
      </Helmet>

      <div className="main-background">
        <div className="page-container">
          <div className="page-sidebar">
            <AdminSidebar selectedItem={"download-reports"} />
          </div>
          <div className="page-content">
            <PageNavbar
              navbarTitle={`Tải về báo cáo`}
              searchRequest={() => {}}
              hideSearch={true}
            />
            <div className="content">
              <div className="hms-page">

                <div className="title-only">Lịch sử thanh toán</div>
                <Formik
                  validateOnChange={true}
                  validateOnBlur={true}
                  enableReinitialize={true}
                  initialValues={paymentLogFormInitial}
                  validate={validatePaymentLogForm}
                  innerRef={downloadPaymentLogForm}
                  onSubmit={(values) => submitDownloadPaymentLog(values)}
                >
                  {(formikProps) => {
                    return (
                      <Form>
                        <div className="row" style={{marginBottom: "15px"}}>
                          <div className="col-md-2">
                            <CustomInput
                              formik={formikProps}
                              id={`start_date`}
                              name={`start_date`}
                              label="Thời gian bắt đầu"
                              placeholder="Chọn thời gian bắt đầu"
                              initialValue=""
                              inputType="date"
                              isRequired={true}
                              type="input"
                              disabled={false}
                            />
                          </div>
                          <div className="col-md-2">
                            <CustomInput
                              formik={formikProps}
                              id={`end_date`}
                              name={`end_date`}
                              label="Thời gian kết thúc"
                              placeholder="Chọn thời gian kết thúc"
                              initialValue=""
                              inputType="date"
                              isRequired={true}
                              type="input"
                              disabled={!formikProps.values.start_date}
                              minDate={formikProps.values.start_date ? formikProps.values.start_date : ""}
                            />
                          </div>
                          <div className="col-md-3">
                            <button type="submit" className="btn btn-gradient">Tải về</button>
                          </div>
                        </div>
                      </Form>
                    )
                  }}
                </Formik>

                <div className="title-only">Lịch sử đặt hẹn</div>
                <Formik
                  validateOnChange={true}
                  validateOnBlur={true}
                  enableReinitialize={true}
                  initialValues={appointmentFormInitial}
                  validate={validateAppointmentForm}
                  innerRef={downloadAppointmentForm}
                  onSubmit={(values) => submitDownloadAppointment(values)}
                >
                  {(formikProps) => {
                    return (
                      <Form>
                        <div className="row" style={{marginBottom: "15px"}}>
                          <div className="col-md-2">
                            <CustomInput
                              formik={formikProps}
                              id={`start_date`}
                              name={`start_date`}
                              label="Thời gian bắt đầu"
                              placeholder="Chọn thời gian bắt đầu"
                              initialValue=""
                              inputType="date"
                              isRequired={true}
                              type="input"
                              disabled={false}
                            />
                          </div>
                          <div className="col-md-2">
                            <CustomInput
                              formik={formikProps}
                              id={`end_date`}
                              name={`end_date`}
                              label="Thời gian kết thúc"
                              placeholder="Chọn thời gian kết thúc"
                              initialValue=""
                              inputType="date"
                              isRequired={true}
                              type="input"
                              disabled={!formikProps.values.start_date}
                              minDate={formikProps.values.start_date ? formikProps.values.start_date : ""}
                            />
                          </div>
                          <div className="col-md-3">
                            <button type="submit" className="btn btn-gradient">Tải về</button>
                          </div>
                        </div>
                      </Form>
                    )
                  }}
                </Formik>

              </div>
            </div>
          </div>
        </div>
      </div>
    </>
  )
}