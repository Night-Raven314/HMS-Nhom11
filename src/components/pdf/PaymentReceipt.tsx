import React, { FC } from 'react';
import {
  Document,
  Font,
  Page,
  StyleSheet,
  Text,
  View
} from '@react-pdf/renderer';
import { PaymentDetailsTableType, PaymentDetailsType } from '../../pages/role-patient/PaymentLog';
import { formatPrice, getItemTypeName } from '../../helpers/utils';
Font.register({
  family: 'Roboto',
  fonts: [
    {src: '/backend/assets/fonts/Roboto-Regular.ttf'},
    {src: '/backend/assets/fonts/Roboto-Bold.ttf', fontWeight: 'bold'},
  ],
});

// Define styles
const styles = StyleSheet.create({
  page: {
    padding: 20,
    fontSize: 12,
    fontFamily: 'Roboto'
  },
  section: {
    marginBottom: 20,
  },
  header: {
    fontSize: 18,
    marginBottom: 10,
    fontWeight: 'bold',
  },
  table: {
    marginVertical: 10,
  },
  tableHeader: {
    fontSize: 16,
    marginTop: 15,
    fontWeight: 'bold',
  },
  tableRow: {
    flexDirection: 'row',
  },
  tableCellHeader: {
    fontWeight: 'bold',
    borderBottom: '1 solid black',
    padding: 5,
  },
  tableCell: {
    padding: 5,
  },
});

type ReceiptProp = {
  totalInfo: PaymentDetailsType,
  viewPayment: PaymentDetailsTableType[]
}

// PDF Document Component
export const PaymentReceipt:FC<ReceiptProp> = ({totalInfo, viewPayment}) => (
  <Document>
    <Page size="A4" style={styles.page}>
      {/* Text outside table */}
      <View style={styles.section}>
        <Text style={styles.header}>HKL Hospital</Text>
        <Text style={styles.header}>Phiếu thanh toán</Text>
        <Text>{totalInfo.payment_desc}</Text>
      </View>

      {/* Table */}
      {viewPayment.map((type, typeIndex) => (
        <View key={"table" + typeIndex} style={{marginTop: "20px"}}>
          <Text style={styles.tableHeader}>{getItemTypeName(type.tableType)}</Text>
          <View style={styles.table}>
            <View style={[styles.tableRow, { borderBottom: '1 solid black' }]}>
              <Text style={[styles.tableCellHeader, { flex: 2 }]}>Tên sản phẩm</Text>
              <Text style={[styles.tableCellHeader, { flex: 1 }]}>Đơn vị</Text>
              <Text style={[styles.tableCellHeader, { flex: 1 }]}>Số lượng</Text>
              <Text style={[styles.tableCellHeader, { flex: 1 }]}>Đơn giá</Text>
              <Text style={[styles.tableCellHeader, { flex: 1 }]}>Tổng</Text>
              <Text style={[styles.tableCellHeader, { flex: 3 }]}>Ghi chú</Text>
            </View>
            {type.tableDetails.map((payment,index) => (
              <View key={index} style={styles.tableRow}>
                <Text style={[styles.tableCell, {flex:2}]}>{payment.full_name}</Text>
                <Text style={[styles.tableCell, {flex:1}]}>{payment.fac_name}</Text>
                <Text style={[styles.tableCell, {flex:1}]}>{payment.amount}</Text>
                <Text style={[styles.tableCell, {flex:1}]}>{formatPrice(payment.appt_fee)}</Text>
                <Text style={[styles.tableCell, {flex:1}]}>{formatPrice(payment.total_value)}</Text>
                <Text style={[styles.tableCell, {flex:3}]}>{payment.item_note}</Text>
              </View>
            ))}
          </View>
        </View>
      ))}

      {/* More text */}
      <View style={styles.section}>
        <Text style={styles.tableHeader}>Thành tiền: {formatPrice(totalInfo.amount)}đ</Text>
      </View>
    </Page>
  </Document>
);