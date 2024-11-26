-- Thêm dữ liệu các khoa khám chữa bệnh thường gặp
INSERT INTO dim_specialties (specialty_name)
VALUES
    ('Khoa Tim mạch'),
    ('Khoa Thần kinh'),
    ('Khoa Chấn thương chỉnh hình'),
    ('Khoa Nhi'),
    ('Khoa Ung bướu'),
    ('Khoa Tai mũi họng'),
    ('Khoa Hô hấp'),
    ('Khoa Tiêu hóa'),
    ('Khoa Da liễu'),
    ('Khoa Phụ sản');

-- Thêm dữ liệu các user chính
INSERT INTO dim_user (user_name, password, email_address, contact_no, full_name, gender, city, address, role, price)
VALUES
    ('huan_patient', 'password123', 'huan.nguyen@example.com', '84912345601', 'Nguyen Nhut Gia Huan', 'male', 'Ho Chi Minh', '1 Le Duan', 'patient', NULL),
    ('huan_doctor', 'password123', 'huan.nguyen@example.com', '84912345602', 'Nguyen Nhut Gia Huan', 'male', 'Ho Chi Minh', '1 Le Duan', 'doctor', 400000),
    ('huan_admin', 'password123', 'huan.nguyen@example.com', '84912345603', 'Nguyen Nhut Gia Huan', 'male', 'Ho Chi Minh', '1 Le Duan', 'admin', NULL),

    ('long_patient', 'password123', 'long.nguyen@example.com', '84912345604', 'Nguyen Ba Long', 'male', 'Ho Chi Minh', '2 Tran Hung Dao', 'patient', NULL),
    ('long_doctor', 'password123', 'long.nguyen@example.com', '84912345605', 'Nguyen Ba Long', 'male', 'Ho Chi Minh', '2 Tran Hung Dao', 'doctor', 450000),
    ('long_admin', 'password123', 'long.nguyen@example.com', '84912345606', 'Nguyen Ba Long', 'male', 'Ho Chi Minh', '2 Tran Hung Dao', 'admin', NULL),

    ('khoa_patient', 'password123', 'khoa.tran@example.com', '84912345607', 'Tran Nguyen Dang Khoa', 'male', 'Ho Chi Minh', '3 Nguyen Thi Minh Khai', 'patient', NULL),
    ('khoa_doctor', 'password123', 'khoa.tran@example.com', '84912345608', 'Tran Nguyen Dang Khoa', 'male', 'Ho Chi Minh', '3 Nguyen Thi Minh Khai', 'doctor', 500000),
    ('khoa_admin', 'password123', 'khoa.tran@example.com', '84912345609', 'Tran Nguyen Dang Khoa', 'male', 'Ho Chi Minh', '3 Nguyen Thi Minh Khai', 'admin', NULL);

-- Thêm dữ liệu bác sĩ và bệnh nhân
INSERT INTO users (user_name, password, email_address, contact_no, full_name, gender, city, address, role, price)
VALUES
    -- Doctors (user_id từ 10 đến 19)
    ('doctor10', 'password123', 'doctor10@example.com', '84910000010', 'Nguyen Van An', 'male', 'Ho Chi Minh', '10 Phan Xich Long', 'doctor', 350000),
    ('doctor11', 'password123', 'doctor11@example.com', '84910000011', 'Tran Thi Bich', 'female', 'Ho Chi Minh', '11 Le Van Sy', 'doctor', 370000),
    ('doctor12', 'password123', 'doctor12@example.com', '84910000012', 'Pham Minh Cuong', 'male', 'Ho Chi Minh', '12 Nguyen Trai', 'doctor', 400000),
    ('doctor13', 'password123', 'doctor13@example.com', '84910000013', 'Nguyen Thi Hoa', 'female', 'Ho Chi Minh', '13 Vo Thi Sau', 'doctor', 450000),
    ('doctor14', 'password123', 'doctor14@example.com', '84910000014', 'Tran Van Hai', 'male', 'Ho Chi Minh', '14 Hai Ba Trung', 'doctor', 420000),
    ('doctor15', 'password123', 'doctor15@example.com', '84910000015', 'Pham Van Khoa', 'male', 'Ho Chi Minh', '15 Le Lai', 'doctor', 390000),
    ('doctor16', 'password123', 'doctor16@example.com', '84910000016', 'Nguyen Thi Lan', 'female', 'Ho Chi Minh', '16 Tran Hung Dao', 'doctor', 480000),
    ('doctor17', 'password123', 'doctor17@example.com', '84910000017', 'Tran Van Minh', 'male', 'Ho Chi Minh', '17 Nguyen Thi Minh Khai', 'doctor', 460000),
    ('doctor18', 'password123', 'doctor18@example.com', '84910000018', 'Pham Thi Nhi', 'female', 'Ho Chi Minh', '18 Le Duan', 'doctor', 410000),
    ('doctor19', 'password123', 'doctor19@example.com', '84910000019', 'Nguyen Van Quan', 'male', 'Ho Chi Minh', '19 Dong Khoi', 'doctor', 500000),

    -- Patients (user_id từ 20 đến 39)
    ('patient20', 'password123', 'patient20@example.com', '84920000020', 'Nguyen Van Tuan', 'male', 'Ho Chi Minh', '20 Nguyen Hue', 'patient', NULL),
    ('patient21', 'password123', 'patient21@example.com', '84920000021', 'Tran Thi Thao', 'female', 'Ho Chi Minh', '21 Le Thanh Ton', 'patient', NULL),
    ('patient22', 'password123', 'patient22@example.com', '84920000022', 'Pham Van Hoang', 'male', 'Ho Chi Minh', '22 Tran Van Kieu', 'patient', NULL),
    ('patient23', 'password123', 'patient23@example.com', '84920000023', 'Nguyen Thi Ly', 'female', 'Ho Chi Minh', '23 Le Loi', 'patient', NULL),
    ('patient24', 'password123', 'patient24@example.com', '84920000024', 'Tran Van Dat', 'male', 'Ho Chi Minh', '24 Pham Ngoc Thach', 'patient', NULL),
    ('patient25', 'password123', 'patient25@example.com', '84920000025', 'Pham Thi Kim', 'female', 'Ho Chi Minh', '25 Vo Van Tan', 'patient', NULL),
    ('patient26', 'password123', 'patient26@example.com', '84920000026', 'Nguyen Van Phuc', 'male', 'Ho Chi Minh', '26 Nguyen Thi Minh Khai', 'patient', NULL),
    ('patient27', 'password123', 'patient27@example.com', '84920000027', 'Tran Thi Mai', 'female', 'Ho Chi Minh', '27 Le Van Sy', 'patient', NULL),
    ('patient28', 'password123', 'patient28@example.com', '84920000028', 'Pham Van Tinh', 'male', 'Ho Chi Minh', '28 Nguyen Trai', 'patient', NULL),
    ('patient29', 'password123', 'patient29@example.com', '84920000029', 'Nguyen Thi Hanh', 'female', 'Ho Chi Minh', '29 Hai Ba Trung', 'patient', NULL),
    ('patient30', 'password123', 'patient30@example.com', '84920000030', 'Tran Van Quang', 'male', 'Ho Chi Minh', '30 Nguyen Hue', 'patient', NULL),
    ('patient31', 'password123', 'patient31@example.com', '84920000031', 'Pham Thi Trang', 'female', 'Ho Chi Minh', '31 Le Thanh Ton', 'patient', NULL),
    ('patient32', 'password123', 'patient32@example.com', '84920000032', 'Nguyen Van Son', 'male', 'Ho Chi Minh', '32 Tran Van Kieu', 'patient', NULL),
    ('patient33', 'password123', 'patient33@example.com', '84920000033', 'Tran Thi Hoa', 'female', 'Ho Chi Minh', '33 Le Loi', 'patient', NULL),
    ('patient34', 'password123', 'patient34@example.com', '84920000034', 'Pham Van Cuong', 'male', 'Ho Chi Minh', '34 Pham Ngoc Thach', 'patient', NULL),
    ('patient35', 'password123', 'patient35@example.com', '84920000035', 'Nguyen Thi Ngoc', 'female', 'Ho Chi Minh', '35 Vo Van Tan', 'patient', NULL),
    ('patient36', 'password123', 'patient36@example.com', '84920000036', 'Tran Van Hieu', 'male', 'Ho Chi Minh', '36 Nguyen Thi Minh Khai', 'patient', NULL),
    ('patient37', 'password123', 'patient37@example.com', '84920000037', 'Pham Thi An', 'female', 'Ho Chi Minh', '37 Le Van Sy', 'patient', NULL),
    ('patient38', 'password123', 'patient38@example.com', '84920000038', 'Nguyen Van Thanh', 'male', 'Ho Chi Minh', '38 Nguyen Trai', 'patient', NULL),
    ('patient39', 'password123', 'patient39@example.com', '84920000039', 'Tran Thi Kim', 'female', 'Ho Chi Minh', '39 Hai Ba Trung', 'patient', NULL);

-- Thêm dữ liệu vật tư ý tế
    INSERT INTO medicines (item_name, item_price, item_unit)
    VALUES
    ('Paracetamol', 2000, 'viên'),
    ('Aspirin', 3000, 'viên'),
    ('Amoxicillin', 25000, 'hộp'),
    ('Vitamin C', 5000, 'viên'),
    ('Ibuprofen', 1500, 'viên'),
    ('Efferalgan', 12000, 'hộp'),
    ('Panadol', 18000, 'hộp'),
    ('Clarithromycin', 35000, 'hộp'),
    ('Metformin', 2000, 'viên'),
    ('Omeprazole', 10000, 'viên'),
    ('Loratadine', 8000, 'hộp'),
    ('Ciprofloxacin', 12000, 'viên'),
    ('Azithromycin', 30000, 'hộp'),
    ('Cefalexin', 25000, 'hộp'),
    ('Acetylcysteine', 15000, 'gói'),
    ('Silymarin', 4000, 'viên'),
    ('Prednisolone', 12000, 'viên'),
    ('Hydroxyzine', 20000, 'hộp'),
    ('Drotaverin', 15000, 'viên'),
    ('Diclofenac', 5000, 'viên'),
    ('Fexofenadine', 25000, 'hộp'),
    ('Ketoconazole', 20000, 'hộp'),
    ('Cetirizine', 7000, 'hộp'),
    ('Meloxicam', 2500, 'viên'),
    ('Esomeprazole', 20000, 'hộp'),
    ('Trimebutine', 15000, 'hộp'),
    ('Loperamide', 3000, 'viên'),
    ('Simvastatin', 10000, 'viên'),
    ('Spironolactone', 5000, 'viên'),
    ('Dulcolax', 12000, 'viên'),
    ('Calcium carbonate', 8000, 'viên'),
    ('Atorvastatin', 15000, 'hộp'),
    ('Gabapentin', 18000, 'hộp'),
    ('Doxycycline', 25000, 'hộp'),
    ('Fluconazole', 20000, 'hộp'),
    ('Montelukast', 18000, 'hộp'),
    ('Folic Acid', 3000, 'viên'),
    ('Amlodipine', 10000, 'viên'),
    ('Candesartan', 15000, 'hộp'),
    ('Losartan', 13000, 'viên'),
    ('Levofloxacin', 22000, 'viên'),
    ('Metronidazole', 10000, 'viên'),
    ('Propranolol', 12000, 'viên'),
    ('Lansoprazole', 18000, 'hộp'),
    ('Ranitidine', 8000, 'viên'),
    ('Terbinafine', 15000, 'viên'),
    ('Tetracycline', 12000, 'hộp'),
    ('Domperidone', 5000, 'viên'),
    ('Bromhexine', 7000, 'hộp'),
    ('Clotrimazole', 20000, 'hộp'),
    ('Nystatin', 10000, 'viên');
    ('Băng gạc vô trùng', 15000, 'gói'),
    ('Khẩu trang y tế', 50000, 'hộp'),
    ('Bông y tế', 25000, 'hộp'),
    ('Nhiệt kế điện tử', 300000, 'cái'),
    ('Máy đo huyết áp', 500000, 'cái'),
    ('Bộ dụng cụ tiêm insulin', 150000, 'bộ'),
    ('Găng tay y tế', 50000, 'hộp'),
    ('Ống tiêm nhựa', 2000, 'cái'),
    ('Máy đo đường huyết', 600000, 'cái'),
    ('Băng keo cá nhân', 10000, 'gói'),
    ('Bộ truyền dịch', 30000, 'bộ'),
    ('Bình oxy y tế', 1000000, 'bình'),
    ('Máy xông mũi họng', 800000, 'cái'),
    ('Nạng y tế', 250000, 'cái'),
    ('Xe lăn', 2500000, 'cái'),
    ('Gạc rửa vết thương', 10000, 'gói'),
    ('Kim tiêm vô trùng', 1000, 'cái'),
    ('Bộ test đường huyết', 120000, 'bộ'),
    ('Mặt nạ oxy', 50000, 'cái'),
    ('Bộ dụng cụ sơ cứu', 150000, 'bộ'),
    ('Cân sức khỏe điện tử', 250000, 'cái'),
    ('Máy đo nồng độ oxy (SpO2)', 450000, 'cái'),
    ('Máy trợ thở', 1500000, 'cái'),
    ('Găng tay cao su', 40000, 'hộp'),
    ('Ống nghe y tế', 300000, 'cái'),
    ('Bình xịt mũi', 70000, 'chai'),
    ('Băng thun hỗ trợ khớp', 100000, 'cái'),
    ('Bông ngoáy tai y tế', 5000, 'gói'),
    ('Kính bảo hộ y tế', 80000, 'cái'),
    ('Máy đo nhiệt độ trán', 400000, 'cái');

-- Thêm dữ liệu lịch hẹn khám
INSERT INTO fact_appointment (doctor_id, patient_id, specialty_id, cons_fee, booking_date, booking_time, city, address, doctor_status, patient_status)
VALUES
    (13, 25, 4, 450000, '01/08/2024', '09:30 am', 'Ho Chi Minh', '13 Vo Thi Sau', 1, 1),
    (16, 28, 7, 480000, '03/08/2024', '11:00 am', 'Ho Chi Minh', '16 Tran Hung Dao', 1, 1),
    (12, 20, 3, 400000, '05/08/2024', '02:15 pm', 'Ho Chi Minh', '12 Nguyen Trai', 1, 1),
    (15, 24, 6, 390000, '07/08/2024', '04:45 pm', 'Ho Chi Minh', '15 Le Lai', 1, 1),
    (18, 32, 9, 410000, '09/08/2024', '08:00 am', 'Ho Chi Minh', '18 Le Duan', 1, 1),
    (14, 23, 5, 420000, '11/08/2024', '10:00 am', 'Ho Chi Minh', '14 Hai Ba Trung', 1, 1),
    (17, 30, 8, 460000, '13/08/2024', '01:30 pm', 'Ho Chi Minh', '17 Nguyen Thi Minh Khai', 1, 1),
    (11, 31, 2, 370000, '15/08/2024', '05:00 pm', 'Ho Chi Minh', '11 Le Van Sy', 1, 1),
    (10, 21, 1, 350000, '17/08/2024', '06:15 pm', 'Ho Chi Minh', '10 Phan Xich Long', 1, 1),
    (19, 22, 10, 500000, '19/08/2024', '07:00 am', 'Ho Chi Minh', '19 Dong Khoi', 1, 1),
    
    (14, 29, 5, 420000, '21/08/2024', '11:45 am', 'Ho Chi Minh', '14 Hai Ba Trung', 1, 1),
    (13, 33, 4, 450000, '23/08/2024', '12:30 pm', 'Ho Chi Minh', '13 Vo Thi Sau', 1, 1),
    (15, 26, 6, 390000, '25/08/2024', '09:00 am', 'Ho Chi Minh', '15 Le Lai', 1, 1),
    (18, 35, 9, 410000, '27/08/2024', '02:00 pm', 'Ho Chi Minh', '18 Le Duan', 1, 1),
    (17, 27, 8, 460000, '29/08/2024', '04:30 pm', 'Ho Chi Minh', '17 Nguyen Thi Minh Khai', 1, 1),
    (12, 36, 3, 400000, '31/08/2024', '03:00 pm', 'Ho Chi Minh', '12 Nguyen Trai', 1, 1),
    (10, 34, 1, 350000, '02/09/2024', '10:30 am', 'Ho Chi Minh', '10 Phan Xich Long', 1, 1),
    (11, 28, 2, 370000, '04/09/2024', '02:45 pm', 'Ho Chi Minh', '11 Le Van Sy', 1, 1),
    (16, 37, 7, 480000, '06/09/2024', '09:30 am', 'Ho Chi Minh', '16 Tran Hung Dao', 1, 1),
    (19, 38, 10, 500000, '08/09/2024', '01:00 pm', 'Ho Chi Minh', '19 Dong Khoi', 1, 1),
    
    (13, 22, 4, 450000, '10/09/2024', '11:15 am', 'Ho Chi Minh', '13 Vo Thi Sau', 1, 1),
    (12, 24, 3, 400000, '12/09/2024', '05:30 pm', 'Ho Chi Minh', '12 Nguyen Trai', 1, 1),
    (15, 31, 6, 390000, '14/09/2024', '07:00 am', 'Ho Chi Minh', '15 Le Lai', 1, 1),
    (16, 21, 7, 480000, '16/09/2024', '08:45 am', 'Ho Chi Minh', '16 Tran Hung Dao', 1, 1),
    (11, 39, 2, 370000, '18/09/2024', '12:15 pm', 'Ho Chi Minh', '11 Le Van Sy', 1, 1),
    (10, 35, 1, 350000, '20/09/2024', '02:00 pm', 'Ho Chi Minh', '10 Phan Xich Long', 1, 1),
    (14, 30, 5, 420000, '22/09/2024', '03:30 pm', 'Ho Chi Minh', '14 Hai Ba Trung', 1, 1),
    (17, 36, 8, 460000, '24/09/2024', '05:45 pm', 'Ho Chi Minh', '17 Nguyen Thi Minh Khai', 1, 1),
    (18, 32, 9, 410000, '26/09/2024', '06:15 pm', 'Ho Chi Minh', '18 Le Duan', 1, 1),
    (19, 23, 10, 500000, '28/09/2024', '07:00 am', 'Ho Chi Minh', '19 Dong Khoi', 1, 1),
    
    (16, 38, 7, 480000, '30/09/2024', '09:00 am', 'Ho Chi Minh', '16 Tran Hung Dao', 1, 1),
    (12, 27, 3, 400000, '02/10/2024', '11:00 am', 'Ho Chi Minh', '12 Nguyen Trai', 1, 1),
    (15, 28, 6, 390000, '04/10/2024', '02:30 pm', 'Ho Chi Minh', '15 Le Lai', 1, 1),
    (14, 39, 5, 420000, '06/10/2024', '04:00 pm', 'Ho Chi Minh', '14 Hai Ba Trung', 1, 1),
    (13, 34, 4, 450000, '08/10/2024', '06:00 pm', 'Ho Chi Minh', '13 Vo Thi Sau', 1, 1),
    (11, 26, 2, 370000, '10/10/2024', '08:15 am', 'Ho Chi Minh', '11 Le Van Sy', 1, 1),
    (10, 29, 1, 350000, '11/10/2024', '09:45 am', 'Ho Chi Minh', '10 Phan Xich Long', 1, 1),
    (18, 37, 9, 410000, '12/10/2024', '11:00 am', 'Ho Chi Minh', '18 Le Duan', 1, 1),
    (19, 25, 10, 500000, '13/10/2024', '03:45 pm', 'Ho Chi Minh', '19 Dong Khoi', 1, 1),
    (17, 20, 8, 460000, '14/10/2024', '05:15 pm', 'Ho Chi Minh', '17 Nguyen Thi Minh Khai', 1, 1);



-- Thêm dữ liệu lịch sử khám bệnh của bệnh nhân
INSERT INTO fact_med_hist (patient_id, blood_press, blood_sugar, weight, temp, med_note)
VALUES
    (21, '115/75', 5.0, 55, 36.0, 'Kiểm tra sức khỏe bình thường. Tất cả các chỉ số đều ổn định.'),
    (39, '120/80', 5.5, 60, 36.5, 'Kiểm tra sức khỏe bình thường.'),
    (22, '145/92', 7.5, 82, 38.0, 'Huyết áp tăng cao. Đã kê thuốc.'),
    (34, '145/90', 7.1, 78, 37.9, 'Chẩn đoán tiểu đường. Cần theo dõi sức khỏe cẩn thận.'),
    (28, '140/90', 6.8, 75, 37.8, 'Chẩn đoán tiểu đường. Bắt đầu điều trị.'),
    (26, '135/88', 6.4, 75, 37.0, 'Huyết áp hơi cao. Theo dõi thường xuyên.'),
    (30, '135/88', 7.0, 76, 37.5, 'Theo dõi mức đường huyết. Đã điều chỉnh thuốc.'),
    (20, '120/80', 5.5, 65, 36.5, 'Kiểm tra sức khỏe bình thường. Không có vấn đề gì.'),
    (31, '120/78', 5.1, 59, 36.3, 'Không có vấn đề gì.'),
    (35, '120/80', 5.0, 64, 36.5, 'Kiểm tra sức khỏe bình thường.'),
    (36, '125/80', 5.9, 75, 37.0, 'Huyết áp đã ổn định.'),
    (23, '130/85', 5.4, 70, 36.8, 'Kiểm tra cho thấy kết quả bình thường.'),
    (38, '140/90', 7.0, 85, 37.8, 'Chẩn đoán tiểu đường. Cần theo dõi sức khỏe cẩn thận.'),
    (40, '115/75', 5.1, 73, 36.5, 'Tất cả các chỉ số đều trong phạm vi bình thường.'),
    (27, '125/80', 5.2, 70, 36.9, 'Kiểm tra định kỳ. Kết quả bình thường.'),
    (25, '120/78', 5.3, 62, 36.6, 'Tất cả chỉ số trong phạm vi bình thường.'),
    (24, '150/95', 8.0, 90, 38.5, 'Chẩn đoán tiểu đường. Cần thay đổi lối sống ngay lập tức.'),
    (29, '125/82', 5.4, 63, 36.6, 'Đường huyết hơi cao. Khuyên thay đổi chế độ ăn uống.'),
    (32, '130/85', 5.7, 80, 37.5, 'Kiểm tra cho thấy kết quả bình thường.'),
    (33, '125/80', 5.2, 70, 36.9, 'Kiểm tra định kỳ. Kết quả bình thường.'),
    (37, '110/70', 5.4, 58, 36.1, 'Kiểm tra sức khỏe định kỳ. Tất cả bình thường.'),
    (21, '110/70', 4.9, 55, 36.0, 'Kiểm tra sức khỏe bình thường. Tất cả các chỉ số đều ổn định.'),
    (22, '140/90', 6.5, 80, 37.8, 'Chẩn đoán tăng huyết áp. Cần thay đổi lối sống ngay lập tức.'),
    (24, '145/92', 8.5, 91, 38.7, 'Mức đường huyết vẫn cao. Điều chỉnh thuốc.'),
    (25, '125/82', 5.1, 56, 36.3, 'Mức đường huyết bình thường.'),
    (40, '130/85', 6.0, 76, 37.2, 'Cần theo dõi huyết áp thường xuyên.'),
    (39, '125/82', 5.7, 61, 36.6, 'Không có vấn đề gì.'),
    (38, '145/92', 7.5, 87, 38.0, 'Mức đường huyết cao. Đã điều chỉnh thuốc.'),
    (26, '130/85', 6.1, 76, 37.1, 'Cần chú ý đến chế độ ăn uống.'),
    (30, '130/85', 6.5, 74, 37.3, 'Mức đường huyết đã được kiểm soát bằng thuốc.'),
    (28, '130/85', 6.5, 84, 37.8, 'Huyết áp đã ổn định. Tiếp tục điều trị.'),
    (29, '130/84', 5.8, 64, 36.7, 'Theo dõi mức đường huyết. Cần kiểm tra lại.'),
    (27, '120/78', 5.3, 63, 36.4, 'Kiểm tra định kỳ. Không có vấn đề gì.'),
    (20, '135/88', 6.0, 66, 37.0, 'Huyết áp hơi cao. Cần theo dõi chế độ ăn uống.'),
    (31, '115/75', 5.0, 64, 36.5, 'Kiểm tra sức khỏe bình thường.'),
    (36, '135/88', 6.4, 77, 37.2, 'Huyết áp hơi cao. Theo dõi thường xuyên.'),
    (33, '130/85', 5.5, 72, 37.0, 'Không có dấu hiệu bất thường.'),
    (35, '120/80', 5.0, 64, 36.5, 'Kiểm tra sức khỏe bình thường.'),
    (34, '140/88', 6.9, 79, 37.8, 'Cần kiểm tra lại trong tháng tới.'),
    (28, '140/88', 6.8, 86, 38.0, 'Cần theo dõi huyết áp. Kiểm tra định kỳ cần thiết.'),
    (26, '120/80', 5.2, 75, 37.1, 'Kiểm tra sức khỏe bình thường. Tất cả các chỉ số đều ổn định.'),
    (30, '140/90', 6.0, 75, 38.2, 'Huyết áp đã ổn định.'),
    (23, '140/90', 6.5, 78, 37.3, 'Cần theo dõi mức đường huyết. Đã điều chỉnh thuốc.'),
    (21, '110/70', 5.0, 56, 36.2, 'Kiểm tra sức khỏe bình thường. Tất cả các chỉ số đều ổn định.'),
    (22, '130/85', 6.8, 82, 37.1, 'Huyết áp đã ổn định.'),
    (24, '130/85', 5.9, 79, 37.6, 'Huyết áp và đường huyết đều trong mức bình thường.'),
    (39, '120/80', 5.5, 60, 36.5, 'Kiểm tra sức khỏe bình thường.'),
    (37, '115/75', 5.0, 58, 36.2, 'Kiểm tra sức khỏe bình thường. Tất cả các chỉ số đều ổn định.');

-- Thêm dữ liệu khám bệnh với bác sỹ
INSERT INTO fact_patient_details (doctor_id, patient_id, patient_age, med_hist)
VALUES
    (14, 20, 35, 'Huyết áp hơi cao. Theo dõi thường xuyên.'),
    (10, 21, 21, 'Kiểm tra sức khỏe bình thường.'),
    (15, 22, 31, 'Mức đường huyết vẫn cao. Điều chỉnh thuốc.'),
    (13, 23, 35, 'Chẩn đoán tiểu đường. Cần thay đổi lối sống ngay lập tức.'),
    (13, 24, 42, 'Theo dõi mức đường huyết. Đã điều chỉnh thuốc.'),
    (12, 25, 40, 'Kiểm tra sức khỏe bình thường. Tất cả các chỉ số đều ổn định.'),
    (11, 26, 27, 'Huyết áp đã ổn định. Theo dõi thường xuyên.'),
    (16, 27, 38, 'Chẩn đoán tăng huyết áp. Cần thay đổi lối sống ngay lập tức.'),
    (19, 28, 29, 'Chẩn đoán tiểu đường. Cần theo dõi sức khỏe cẩn thận.'),
    (10, 29, 24, 'Kiểm tra sức khỏe bình thường. Không có vấn đề gì.'),
    (11, 30, 45, 'Kiểm tra cho thấy kết quả bình thường.'),
    (15, 31, 33, 'Mức đường huyết cao. Đã điều chỉnh thuốc.'),
    (12, 32, 36, 'Kiểm tra sức khỏe bình thường. Tất cả các chỉ số đều ổn định.'),
    (13, 33, 32, 'Chẩn đoán tiểu đường. Cần theo dõi sức khỏe cẩn thận.'),
    (14, 34, 54, 'Huyết áp hơi cao. Theo dõi thường xuyên.'),
    (19, 35, 26, 'Kiểm tra sức khỏe bình thường. Tất cả các chỉ số đều ổn định.'),
    (16, 36, 42, 'Mức đường huyết vẫn cao. Điều chỉnh thuốc.'),
    (11, 37, 37, 'Theo dõi mức đường huyết. Đã điều chỉnh thuốc.'),
    (18, 38, 44, 'Chẩn đoán tiểu đường. Cần thay đổi lối sống ngay lập tức.'),
    (19, 39, 48, 'Kiểm tra sức khỏe bình thường. Không có vấn đề gì.');


-- Thêm dữ liệu lịch sử cấp thuốc cho bệnh nhân
INSERT INTO fact_prescriptions (med_hist_id, item_id, amount, price, item_note) VALUES
    (3, 1, 1, 2000, 'Uống 1 viên buổi sáng sau ăn'),     -- High blood pressure (Paracetamol)
    (3, 9, 1, 2000, 'Uống 1 viên vào buổi tối'),         -- High blood sugar (Metformin)
    (4, 3, 2, 25000, 'Uống 1 viên mỗi ngày sau ăn'),     -- Diagnosis of diabetes (Amoxicillin)
    (4, 10, 1, 10000, 'Uống 1 viên buổi sáng'),           -- Diagnosis of diabetes (Omeprazole)
    (5, 4, 1, 15000, 'Uống 1 viên sau khi ăn'),           -- Diagnosis of diabetes (Clarithromycin)
    (8, 2, 1, 3000, 'Uống 1 viên trước khi ngủ'),        -- Diagnosis of cold (Aspirin)
    (9, 9, 1, 2000, 'Uống 1 viên buổi tối trước khi ngủ'), -- Diagnosis of diabetes (Metformin)
    (11, 5, 1, 1500, 'Uống 1 viên trước khi ăn'),        -- Regular check-up (Ibuprofen)
    (12, 6, 2, 12000, 'Uống 1 viên vào buổi tối'),       -- Diagnosis of cold (Efferalgan)
    (13, 1, 2, 2000, 'Uống 1 viên vào buổi sáng'),       -- High blood pressure (Paracetamol)
    (14, 10, 1, 10000, 'Uống 1 viên buổi sáng trước ăn'), -- High blood pressure (Omeprazole)
    (15, 4, 1, 12000, 'Uống 1 viên vào buổi tối'),       -- Diagnosis of high blood pressure (Clarithromycin)
    (17, 11, 1, 10000, 'Uống 1 viên trước bữa ăn'),      -- Regular check-up (Amlodipine)
    (18, 10, 1, 2000, 'Uống 1 viên buổi sáng'),          -- Regular check-up (Paracetamol)
    (21, 5, 1, 15000, 'Uống 1 viên mỗi ngày sau ăn'),    -- Diagnosis of high blood pressure (Ibuprofen)
    (22, 3, 1, 25000, 'Uống 1 viên mỗi ngày sau ăn'),    -- Diagnosis of high blood pressure (Amoxicillin)
    (23, 4, 2, 25000, 'Uống 1 viên mỗi ngày sau ăn'),    -- Diagnosis of diabetes (Amoxicillin)
    (24, 9, 1, 2000, 'Uống 1 viên vào buổi tối'),        -- Diagnosis of diabetes (Metformin)
    (27, 1, 1, 2000, 'Uống 1 viên buổi sáng sau ăn'),    -- High blood pressure (Paracetamol)
    (28, 2, 1, 3000, 'Uống 1 viên vào buổi tối'),        -- Diagnosis of cold (Aspirin)
    (30, 6, 2, 12000, 'Uống 1 viên vào buổi tối'),       -- Diagnosis of cold (Efferalgan)
    (31, 3, 1, 25000, 'Uống 1 viên mỗi ngày sau ăn'),    -- Diagnosis of diabetes (Amoxicillin)
    (32, 10, 1, 10000, 'Uống 1 viên buổi sáng'),          -- Diagnosis of diabetes (Omeprazole)
    (35, 4, 1, 15000, 'Uống 1 viên sau khi ăn'),         -- Diagnosis of diabetes (Clarithromycin)
    (37, 3, 1, 2000, 'Uống 1 viên buổi sáng sau ăn'),    -- High blood pressure (Paracetamol)
    (38, 9, 1, 2000, 'Uống 1 viên vào buổi tối'),        -- Diagnosis of diabetes (Metformin)
    (39, 10, 1, 10000, 'Uống 1 viên buổi sáng'),          -- Diagnosis of high blood pressure (Omeprazole)
    (40, 5, 1, 1500, 'Uống 1 viên trước khi ăn');         -- Diagnosis of high blood pressure (Ibuprofen)

-- Thêm dữ liệu phòng
INSERT INTO `dim_room` (`room_name`, `room_floor`, `room_size`, `price`, `status`, `specialty_id`)
VALUES
-- Floor 1
('Room 101', 1, 1, 700000, 'active', 1),
('Room 102', 1, 2, 550000, 'occupied', NULL), -- Set to occupied
('Room 103', 1, 4, 350000, 'active', NULL),
('Room 104', 1, 2, 550000, 'occupied', NULL), -- Set to occupied
('Room 105', 1, 1, 700000, 'active', 2),
('Room 106', 1, 4, 350000, 'inactive', NULL),
('Room 107', 1, 2, 550000, 'active', NULL),
('Room 108', 1, 4, 350000, 'active', NULL),
('Room 109', 1, 1, 700000, 'active', NULL),
('Room 110', 1, 4, 350000, 'active', NULL),

-- Floor 2
('Room 201', 2, 1, 720000, 'active', 3),
('Room 202', 2, 2, 570000, 'inactive', NULL),
('Room 203', 2, 2, 570000, 'occupied', NULL), -- Set to occupied
('Room 204', 2, 4, 370000, 'active', NULL),
('Room 205', 2, 2, 570000, 'active', 4),
('Room 206', 2, 1, 720000, 'occupied', NULL), -- Set to occupied
('Room 207', 2, 4, 370000, 'inactive', NULL),
('Room 208', 2, 2, 570000, 'active', NULL),
('Room 209', 2, 1, 720000, 'active', NULL),

-- Floor 3
('Room 301', 3, 1, 740000, 'active', 5),
('Room 302', 3, 4, 390000, 'occupied', NULL), -- Set to occupied
('Room 303', 3, 2, 590000, 'inactive', NULL),
('Room 304', 3, 2, 590000, 'active', NULL),
('Room 305', 3, 4, 390000, 'active', NULL),
('Room 306', 3, 2, 590000, 'active', 6),
('Room 307', 3, 1, 740000, 'active', NULL),
('Room 308', 3, 4, 390000, 'occupied', NULL), -- Set to occupied
('Room 309', 3, 1, 740000, 'active', NULL),

-- Floor 4
('Room 401', 4, 2, 610000, 'occupied', 7), -- Set to occupied
('Room 402', 4, 4, 410000, 'active', NULL),
('Room 403', 4, 1, 760000, 'active', NULL),
('Room 404', 4, 2, 610000, 'inactive', NULL),
('Room 405', 4, 4, 410000, 'active', NULL),
('Room 406', 4, 1, 760000, 'active', 8),
('Room 407', 4, 2, 610000, 'occupied', NULL), -- Set to occupied
('Room 408', 4, 4, 410000, 'active', NULL),

-- Floor 5 (mainly single rooms)
('Room 501', 5, 1, 780000, 'inactive', 9),
('Room 502', 5, 1, 780000, 'active', NULL),
('Room 503', 5, 1, 780000, 'occupied', NULL), -- Set to occupied
('Room 504', 5, 1, 780000, 'active', 10),
('Room 505', 5, 1, 780000, 'active', NULL),
('Room 506', 5, 1, 780000, 'active', NULL),
('Room 507', 5, 1, 780000, 'occupied', NULL); -- Set to occupied


INSERT INTO users (
    user_name, password, email_address, contact_no, full_name, birthday, 
    gender, city, address, role
) VALUES
('nurse41', 'password123', 'nurse41@example.com', 9123456781, 'Nguyễn Thị Minh Anh', '1990-01-15T00:00:00Z', 'female', 'Ho Chi Minh', '123 Đường Láng Hạ', 'nurse'),
('nurse42', 'password123', 'nurse42@example.com', 9123456782, 'Trần Thị Hồng', '1988-05-20T00:00:00Z', 'female', 'Ho Chi Minh', '45 Nguyễn Văn Cừ', 'nurse'),
('nurse43', 'password123', 'nurse43@example.com', 9123456783, 'Lê Văn Tú', '1992-03-10T00:00:00Z', 'male', 'Ho Chi Minh', '67 Hải Phòng', 'nurse'),
('nurse44', 'password123', 'nurse44@example.com', 9123456784, 'Phạm Thị Lan', '1994-07-25T00:00:00Z', 'female', 'Ho Chi Minh', '89 Đường Mậu Thân', 'nurse'),
('nurse45', 'password123', 'nurse45@example.com', 9123456785, 'Hoàng Minh Đức', '1996-09-14T00:00:00Z', 'male', 'Ho Chi Minh', '12 Lê Hồng Phong', 'nurse'),
('nurse46', 'password123', 'nurse46@example.com', 9123456786, 'Võ Thị Thanh', '1985-12-08T00:00:00Z', 'female', 'Ho Chi Minh', '34 Hoàng Hoa Thám', 'nurse'),
('nurse47', 'password123', 'nurse47@example.com', 9123456787, 'Nguyễn Văn Hòa', '1993-04-18T00:00:00Z', 'male', 'Ho Chi Minh', '78 Cách Mạng Tháng 8', 'nurse'),
('nurse48', 'password123', 'nurse48@example.com', 9123456788, 'Đặng Thị Hương', '1991-11-11T00:00:00Z', 'female', 'Ho Chi Minh', '56 Nguyễn Trãi', 'nurse'),
('nurse49', 'password123', 'nurse49@example.com', 9123456789, 'Lý Văn Khánh', '1989-02-22T00:00:00Z', 'male', 'Ho Chi Minh', '90 Điện Biên Phủ', 'nurse'),
('nurse50', 'password123', 'nurse50@example.com', 9123456790, 'Phan Thị Nga', '1995-06-30T00:00:00Z', 'female', 'Ho Chi Minh', '23 Võ Thị Sáu', 'nurse',);
