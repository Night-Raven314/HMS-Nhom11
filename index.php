<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Home Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&amp;display=swap">
    <!-- icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="icon" type="image/x-icon" href="assets/image/HKL logo in a rectangular shape.png">
    <!-- Preload CSS and JavaScript -->
    <link rel='stylesheet' href='assets/css/style.css'>
    <link rel="modulepreload" href="https://www.smarteyeapps.com/build/assets/home-6dd98ea4.js">
    <link rel="modulepreload" href="https://www.smarteyeapps.com/build/assets/bootstrap.esm-03e0081a.js">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
    <script type="module" src="https://www.smarteyeapps.com/build/assets/home-6dd98ea4.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        window.onscroll = function() {
            var scrollButton = document.getElementById('scroll-top');
            if (window.scrollY > 0) {
                scrollButton.style.display = "block";
            } else {
                scrollButton.style.display = "none";
            }
        };

        document.getElementById('scroll-top').addEventListener('click', function(event) {
            event.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    </script>

</head>


<body>

    <!-- ################# Header #######################--->
    <div class="container-fluid header-top bg-white sticky-top">
        <div class="container-xl">
            <div class="row m-0 bg-white">
                <div class="col-lg-3 nav-col align-self-center">
                    <a href="#">
                        <img class="max-250" src="assets/image/logo01.png" alt="">
                    </a>
                    <a data-bs-toggle="collapse" data-bs-target="#menu" class="float-end pt-1 d-lg-none "><i class="bi  fs-1 cp bi-list"></i></a>
                </div>
                <div id="menu" class="col-lg-7 col-md-8 d-none d-lg-block align-self-center  justify-content-center d-flex">
                    <ul class="fw-bold main-nav">
                        <li><a href="#">Home</a></li>
                        <li><a href="#services">Tính năng</a></li>
                        <li><a href="#about_us">Về chúng tôi</a></li>
                        <li><a href="#blog">Hình ảnh</a></li>
                        <li><a href="#footer">Liên hệ</a></li>
                        <li><a href="sign-in.php">Đăng nhập</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 d-none d-lg-block align-self-center text-end ">
                    <a href="sign-up.php">
                        <button class="btn btn-primary float-end fs-8 fw-bolder" fdprocessedid="rg3f1m">Đăng kí</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- ################# Hero Section Starts Here #######################--->
    <section id="slider">
        <div class="container-xl">
            <div class="row">
                <div class="col-lg-6 py-5 slid-detail align-self-center">
                    <h1 class="fw-bolder fs-11">Website quản lý bệnh viện <span class="text-primary">HKL</span></h1>
                    <p class="pt-4">Bảo mật cao: > Tất cả dữ liệu của bạn được mã hóa và bảo vệ bởi các tiêu chuẩn bảo mật cao nhất, đảm bảo an toàn thông tin.</p>

                    <p class="pt-4">Cập nhật thường xuyên: > Chúng tôi thường xuyên cập nhật các tính năng mới và cải tiến để phục vụ bạn tốt hơn.</p>

                    <p class="pt-4">Giao diện thân thiện người dùng: > Giao diện đơn giản, dễ sử dụng ngay cả với những người không rành công nghệ.</p>

                    <p class="pt-4">Hỗ trợ khách hàng 24/7: > Đội ngũ hỗ trợ luôn sẵn sàng giúp đỡ bạn mọi lúc mọi nơi, bất cứ khi nào bạn cần.</p>
                    <div class="pt-5">
                        <button class="btn btn-primary shadow-md fw-bold p-3 px-5">Đăng kí lịch khám</button>
                    </div>
                </div>
                <div class="col-lg-6 py-5 px-5">
                    <img src="assets/image/Areas&Rooms/Hospital waiting room HKL.png" alt="">
                </div>
            </div>
        </div>
    </section>


    <!-- ################# Login Starts Here #######################--->
    <section id="logins" class="our-blog container-fluid">
        <div class="container">
            <div class="inner-title">

                <h2 style="font-size: 38px;font-family:times new roman; text-align: center; margin-bottom: 20px;"><b>Đăng nhập</b></h2>
            </div>
            <div class="col-sm-12 blog-cont">
                <div class="row no-margin">
                    <div class="col-sm-4 blog-smk">
                        <div class="blog-single">

                            <img src="assets/image/user login image.png" height="200px" alt="">

                            <div class="blog-single-det">
                                <h6>Đăng nhập (user)</h6>
                                <a href="hms/user-login.php">
                                    <button class="btn btn-success btn-sm" fdprocessedid="g10ku">Click Here</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 blog-smk">
                        <div class="blog-single">

                            <img src="assets/image/admin login logo.png" height="200px" alt="">

                            <div class="blog-single-det">
                                <h6>Đăng nhập (admin)</h6>
                                <a href="hms/doctor">
                                    <button class="btn btn-success btn-sm" fdprocessedid="r1iqwl">Click Here</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 blog-smk">
                        <div class="blog-single">

                            <img src="assets/image/hero section.png" height="200px" alt="">

                            <div class="blog-single-det">
                                <h6>Đăng nhập (Nội bộ)</h6>
                                <a href="hms/doctor">
                                    <button class="btn btn-success btn-sm" fdprocessedid="r1iqwl">Click Here</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- ################# services #######################--->
    <section id="services" class="key-features department">
        <div class="container">
            <div class="inner-title">
                <h2 style="font-size: 38px;font-family:times new roman; text-align: center; margin-bottom: 20px;">Các tính năng chính của chúng tôi</h2>
            </div>

            <div class="row">
                <!-- Khoa Tim mạch -->
                <div class="col-lg-4 col-md-6">
                    <div class="single-key">
                        <i class="fas fa-heart"></i>
                        <h5>Khoa Tim mạch</h5>
                        <p>Chăm sóc chuyên sâu cho các vấn đề liên quan đến tim, bao gồm ECG và phẫu thuật tim.</p>
                    </div>
                </div>

                <!-- Khoa Thần kinh -->
                <div class="col-lg-4 col-md-6">
                    <div class="single-key">
                        <i class="fas fa-brain"></i>
                        <h5>Khoa Thần kinh</h5>
                        <p>Chăm sóc chuyên sâu cho các rối loạn thần kinh, bao gồm dịch vụ MRI và EEG.</p>
                    </div>
                </div>

                <!-- Khoa Chấn thương chỉnh hình -->
                <div class="col-lg-4 col-md-6">
                    <div class="single-key">
                        <i class="fas fa-bone"></i>
                        <h5>Khoa Chấn thương chỉnh hình</h5>
                        <p>Dịch vụ chỉnh hình toàn diện cho sức khỏe xương, bao gồm điều trị gãy xương.</p>
                    </div>
                </div>

                <!-- Khoa Nhi -->
                <div class="col-lg-4 col-md-6">
                    <div class="single-key">
                        <i class="fas fa-baby"></i>
                        <h5>Khoa Nhi</h5>
                        <p>Chăm sóc chuyên sâu cho trẻ sơ sinh, trẻ em và thanh thiếu niên, bao gồm tiêm chủng.</p>
                    </div>
                </div>

                <!-- Khoa Ung bướu -->
                <div class="col-lg-4 col-md-6">
                    <div class="single-key">
                        <i class="fas fa-dna"></i>
                        <h5>Khoa Ung bướu</h5>
                        <p>Chăm sóc và điều trị chuyên sâu cho bệnh nhân ung thư, bao gồm hóa trị.</p>
                    </div>
                </div>

                <!-- Khoa Tai mũi họng -->
                <div class="col-lg-4 col-md-6">
                    <div class="single-key">
                        <i class="fas fa-head-side-mask"></i>
                        <h5>Khoa Tai mũi họng</h5>
                        <p>Chăm sóc toàn diện cho các vấn đề về tai, mũi và họng, bao gồm phẫu thuật xoang.</p>
                    </div>
                </div>


                <!-- Khoa Hô hấp -->
                <div class="col-lg-4 col-md-6">
                    <div class="single-key">
                        <i class="fas fa-lungs"></i>
                        <h5>Khoa Hô hấp</h5>
                        <p>Chăm sóc chuyên sâu cho các bệnh về đường hô hấp và phổi, bao gồm điều trị hen suyễn.</p>
                    </div>
                </div>

                <!-- Khoa Tiêu hóa -->
                <div class="col-lg-4 col-md-6">
                    <div class="single-key">
                        <i class="fas fa-stethoscope"></i>
                        <h5>Khoa Tiêu hóa</h5>
                        <p>Dịch vụ chuyên khoa cho các vấn đề về tiêu hóa, bao gồm nội soi đại tràng.</p>
                    </div>
                </div>

                <!-- Khoa Da liễu -->
                <div class="col-lg-4 col-md-6">
                    <div class="single-key">
                        <i class="fas fa-syringe"></i>
                        <h5>Khoa Da liễu</h5>
                        <p>Chăm sóc chuyên sâu cho các bệnh về da, bao gồm điều trị mụn.</p>
                    </div>
                </div>

                <!-- Khoa Phụ sản -->
                <div class="col-lg-4 col-md-6">
                    <div class="single-key">
                        <i class="fas fa-baby-carriage"></i>
                        <h5>Khoa Phụ sản</h5>
                        <p>Chăm sóc toàn diện cho sức khỏe phụ nữ và dịch vụ sinh sản, bao gồm chăm sóc tiền sản.</p>
                    </div>
                </div>

            </div>

    </section>
    <!-- ################# About us #######################--->

    <section id="about_us" class="about-us">
        <div class="row no-margin">
            <div class="col-sm-6 image-bg no-padding">
                <img src="assets/image/HKL.png" alt="" style="width: 100%; height: auto;">
            </div>
            <div class="col-sm-6 about-content">
                <h3 style="font-size: 38px; font-family: times new roman; text-align: center; margin-bottom: 20px;">Về Bệnh viện của Chúng tôi</h3>
                <p>
                    Tại Bệnh viện HKL, chúng tôi cam kết cung cấp chăm sóc y tế chất lượng cao và dịch vụ bệnh nhân xuất sắc. Cơ sở vật chất hiện đại của chúng tôi được trang bị công nghệ y tế tiên tiến nhất, đảm bảo chẩn đoán chính xác và điều trị hiệu quả.
                </p>
                <p>
                    Đội ngũ bác sĩ, y tá và nhân viên của chúng tôi rất chuyên nghiệp và tận tâm, luôn cam kết cung cấp dịch vụ chăm sóc cá nhân hóa cho từng bệnh nhân. Chúng tôi chuyên về nhiều dịch vụ y tế, bao gồm tim mạch, thần kinh, chỉnh hình, nhi khoa và ung bướu.
                </p>
                <p>
                    Sứ mệnh của chúng tôi là nâng cao sức khỏe cộng đồng bằng cách cung cấp các dịch vụ chăm sóc sức khỏe toàn diện trong môi trường tập trung vào bệnh nhân. Chúng tôi luôn nỗ lực làm cho chăm sóc sức khỏe trở nên dễ tiếp cận và hợp lý cho tất cả mọi người.
                </p>
                <p>
                    Tại Bệnh viện HKL, sức khỏe và sự thoải mái của bạn là ưu tiên hàng đầu của chúng tôi. Chúng tôi luôn sẵn sàng hỗ trợ bạn trong suốt quá trình chăm sóc sức khỏe.
                </p>
                <p>
                    Chúng tôi cũng đặt sự nhấn mạnh mạnh mẽ vào việc chăm sóc và giáo dục phòng ngừa. Bằng cách cung cấp cho bệnh nhân kiến thức và công cụ cần thiết, chúng tôi giúp họ kiểm soát sức khỏe của mình và ngăn ngừa bệnh tật trước khi nó bắt đầu.
                </p>
                <p>
                    Ngoài ra, chúng tôi còn tích cực tham gia vào các chương trình tiếp cận cộng đồng để mở rộng sự chăm sóc của mình ra ngoài phạm vi bệnh viện. Những sáng kiến này bao gồm các hội chợ sức khỏe, các sự kiện khám bệnh miễn phí và các buổi hội thảo giáo dục được thiết kế để thúc đẩy sức khỏe và sự khỏe mạnh trong cộng đồng.
                </p>
                <p>
                    Bệnh viện của chúng tôi không chỉ là nơi điều trị; nó còn là nơi học hỏi và phát triển. Chúng tôi cung cấp các chương trình đào tạo và phát triển toàn diện cho nhân viên của mình để đảm bảo họ luôn được trang bị những kiến thức và kỹ năng mới nhất trong lĩnh vực chăm sóc sức khỏe.
                </p>
            </div>
        </div>
    </section>


    <!-- ################# lich kham #######################--->
    <div id="scroll-top" style="right: 15px; bottom: 15px; position: fixed; background: bisque; padding: 10px; display: none;">
        <a href="#" style="font-family:'lexend deca'">
            <i aria-hidden="true" class="fa fa-long-arrow-up"></i>
        </a>
        <a href="#" style="font-family:'lexend deca'">Lên đầu trang</a>
    </div>
    <!-- ################# Footer Starts Here#######################--->
    <footer id="footer" class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <h2 style="color: white; font-family: 'Times New Roman', Times, serif;">Liên kết hữu ích</h2>
                    <ul class="list-unstyled link-list">
                        <li><a ui-sref="about" href="#about_us">Về chúng tôi</a><i class="fa fa-angle-right"></i></li>
                        <li><a ui-sref="portfolio" href="#services">Tính năng</a><i class="fa fa-angle-right"></i></li>
                        <li><a ui-sref="products" href="#logins">Đăng nhập</a><i class="fa fa-angle-right"></i></li>
                        <li><a ui-sref="gallery" href="#gallery">Hình ảnh</a><i class="fa fa-angle-right"></i></li>
                        <!-- <li><a ui-sref="contact" href="#contact">Liên hệ</a><i class="fa fa-angle-right"></i></li> -->
                    </ul>
                </div>
                <div class="col-md-6 col-sm-12 map-img">
                    <h2 style="font-family: 'Times New Roman', Times, serif; color: white; text-decoration: underline;"><b>Liên hệ</b></h2>
                    <address class="md-margin-bottom-40">
                        123 Đường Bệnh viện, Thành phố, Quốc gia <br>
                        Điện thoại: +123 456 7890 <br>
                        Email: <a href="mailto:info@hospital.com" class="">info@hospital.com</a><br>
                        Thời gian: Thứ Hai - Thứ Sáu: 8:00 AM - 6:00 PM
                    </address>
                </div>
            </div>
        </div>
    </footer>

    <div class="copy" style="text-align: right; font-family: 'Times New Roman', Times, serif;">
        <div class="container">
            <b> Hệ thống quản lý bệnh viện | It's Me </b>
        </div>
    </div>

</body>

</html>