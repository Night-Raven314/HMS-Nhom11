-- Kiểm tra trùng user_name
SELECT
    COUNT(user_name) -- >0 => trùng user_name
FROM dim_user
WHERE
    user_name = 'long_patient' -- Điền user_name đang được đăng ký mới để xem hệ thống đã có chưa

-- Kiểm tra danh tính user login trên CSDL
SELECT
    user_name,
    full_name
FROM dim_user
WHERE
    user_name = 'huan_admin'
    AND password = 'password123'

-- Kiểm tra trạng thái đăng nhập // Có thể dùng làm cơ sở để phát triển tính năng tự động log out
SELECT
    *
FROM fact_user_login
WHERE
    user_name = 'khoa_doctor'

-- Lịch sử khám bệnh của user
SELECT
    hst.created_at,
    usr.full_name,
    usr.user_name,
    hst.blood_press,
    hst.blood_sugar,
    hst.weight,
    hst.temp,
    hst.med_hist
FROM fact_med_hist hst
    LEFT JOIN dim_user usr
        ON hst.patient_id = usr.user_id
WHERE
    -- usr.full_name = 'Pham Thi Kim'
    usr.user_id = 25
ORDER BY
    created_at DESC, med_hist_id DESC

-- Danh sách thuốc chỉ định và kết quả khám
SELECT
    hst.created_at,
    usr.full_name,
    usr.user_name,
    hst.med_note,
    itm.item_name,
    pre.amount,
    itm.item_unit,
    pre.price,
    pre.amount * pre.price AS total_price
FROM fact_prescriptions pre
    LEFT JOIN fact_med_hist hst
        ON pre.med_hist_id = hst.med_hist_id
    LEFT JOIN dim_user usr
        ON hst.patient_id = usr.user_id
    LEFT JOIN dim_item itm
        ON pre.item_id = itm.item_id
WHERE
    -- usr.full_name = 'Pham Van Cuong'
    usr.user_id = 34

-- Kiểm tra lịch hẹn của bác sỹ
SELECT
    ptn.full_name AS patient_name,
    dct.full_name AS doctor_name,
    spc.specialty_name,
    app.booking_date,
    app.booking_time
FROM fact_appointment app
    LEFT JOIN dim_user ptn
        ON app.parient_id = ptn.user_id
    LEFT JOIN dim_user dct
        ON app.doctor_id = dct.user_id
    LEFT JOIN dim_specialties spc
        ON app.specialty_id = spc.specialty_id
WHERE
    -- usr.full_name = 'Pham Van Cuong'
    -- usr.user_id = 34
    dct.user_id = 14

-- Lấy thông tin của bệnh nhân
SELECT
    usr.full_name,
    usr.email_address,
    usr.contact_no,
    usr.address,
    usr.city,
    usr.gender,
    ptn.patient_age,
    ptn.med_hist
FROM dim_user usr
    LEFT JOIN fact_patient_details ptn
        ON ptn.patient_id = usr.user_id
WHERE
    -- usr.full_name = 'Pham Van Cuong'
    usr.user_id = 34

-- Lấy profile
SELECT
    *
FROM dim_user usr
WHERE
    user_id = 14