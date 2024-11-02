<?php
define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT']);

include SITE_ROOT . ('/HMS-Nhom11/assets/include/config.php');
include SITE_ROOT . ('/HMS-Nhom11/assets/include/header.php');
?>

<head>
    <title>
        Default
    </title>

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

<!-- Side Nav -->

<body class="g-sidenav-show bg-gray-300">

    <!-- End Side Nav -->

    <main class="main-content border-radius-lg ">
        <!-- Navbar -->

        <nav
            class="navbar navbar-main navbar-expand-lg px-0 mx-4 border-radius-xl shadow-none position-sticky blur shadow-blur mt-4 left-auto top-1 z-index-sticky"
            id="navbarBlur" data-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <img src="assets/image/logo01-sq.png" class="navbar-brand-img" style="height:35px" alt="main_logo">
                    <span class="ms-1 font-weight-bold text-dark">HKL Hospital</span>

                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center me-2 active" aria-current="page" href="#about_us">
                                <i class="fa fa-chart-pie opacity-6 text-dark me-1" aria-hidden="true"></i>
                                Giới thiệu
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link me-2" href="#services">
                                <i class="fa fa-plus-square opacity-6 text-dark me-1" aria-hidden="true"></i>
                                Chuyên khoa
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link me-2" href="#contact">
                                <i class="fas fa-user-circle opacity-6 text-dark me-1" aria-hidden="true"></i>
                                Liên hệ
                            </a>
                        </li>
                    </ul>
                    <!-- <div class="ms-md-auto pe-md-3 d-flex align-items-center">

                    </div> -->
                    <!-- <ul class="navbar-nav  justify-content-end">

                        <li class="nav-item d-flex align-items-center">
                    </ul> -->

                    <ul class="navbar-nav  justify-content-end">

                        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                            <!-- Right corner user section -->
                        </li>
                        <li class="nav-item d-flex align-items-center">
                            <a class="btn btn-outline-primary btn-sm mb-0 me-3" href="sign-in.php">Đăng nhập</a>
                        </li>
                        <li class="nav-item d-flex align-items-center">
                            <a class="btn bg-gradient-primary btn-sm mb-0 me-3" href="sign-up.php">Đăng ký</a>
                        </li>
                        </li>

                        <li class="nav-item d-flex align-items-center">
                    </ul>

                </div>
            </div>
        </nav>

        <!-- End Navbar -->

    </main>

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
                    <li class="nav-item d-flex align-items-center">
                        <a class="btn bg-gradient-primary btn-sm mb-0 me-3" target="_blank" href="sign-up.php">Đăng ký lịch khám</a>
                    </li>
                </div>
                <div class="col-lg-6 py-5 px-5">
                    <img src="assets/image/Areas&Rooms/Hospital waiting room HKL.png" alt="" style="width: 100%; height: auto" ;>
                </div>
            </div>
        </div>
    </section>


    <!-- ################# # #######################--->

    <!-- ################# services #######################--->
    <section id="services" class="key-features department">
        <div class="container">
            <div class="inner-title">
                <h2 style="font-size: 38px;font-family:times new roman; text-align: center; margin-bottom: 20px;">Các chuyên khoa chính</h2>
            </div>

            <div class="row">
            <?php

                $sql = "SELECT * FROM `dim_specialties`";

                $specialties = mysqli_query($conn, $sql);

                while ($row = mysqli_fetch_assoc($specialties)) {
                    
                    $specialties_name = $row["specialty_name"];
                    $description = $row["description"];

            ?>
                <div class="col-lg-4 col-md-6">
                    <div class="single-key">
                        <i class="fas fa-heart"></i>
                        <h5><?php echo $specialties_name; ?></h5>
                        <p><?php echo $description; ?></p>
                    </div>
                </div>

                <?php
                }?>

                <!-- Khoa Thần kinh -->
                <!-- <div class="col-lg-4 col-md-6">
                    <div class="single-key">
                        <i class="fas fa-brain"></i>
                        <h5>Khoa Thần kinh</h5>
                        <p>Chăm sóc chuyên sâu cho các rối loạn thần kinh, bao gồm dịch vụ MRI và EEG.</p>
                    </div>
                </div> -->

                <!-- Khoa Chấn thương chỉnh hình -->
                <!-- <div class="col-lg-4 col-md-6">
                    <div class="single-key">
                        <i class="fas fa-bone"></i>
                        <h5>Khoa Chấn thương chỉnh hình</h5>
                        <p>Dịch vụ chỉnh hình toàn diện cho sức khỏe xương, bao gồm điều trị gãy xương.</p>
                    </div>
                </div> -->

                <!-- Khoa Nhi -->
                <!-- <div class="col-lg-4 col-md-6">
                    <div class="single-key">
                        <i class="fas fa-baby"></i>
                        <h5>Khoa Nhi</h5>
                        <p>Chăm sóc chuyên sâu cho trẻ sơ sinh, trẻ em và thanh thiếu niên, bao gồm tiêm chủng.</p>
                    </div>
                </div> -->

                <!-- Khoa Ung bướu -->
                <!-- <div class="col-lg-4 col-md-6">
                    <div class="single-key">
                        <i class="fas fa-dna"></i>
                        <h5>Khoa Ung bướu</h5>
                        <p>Chăm sóc và điều trị chuyên sâu cho bệnh nhân ung thư, bao gồm hóa trị.</p>
                    </div>
                </div> -->

                <!-- Khoa Tai mũi họng -->
                <!-- <div class="col-lg-4 col-md-6">
                    <div class="single-key">
                        <i class="fas fa-head-side-mask"></i>
                        <h5>Khoa Tai mũi họng</h5>
                        <p>Chăm sóc toàn diện cho các vấn đề về tai, mũi và họng, bao gồm phẫu thuật xoang.</p>
                    </div>
                </div> -->


                <!-- Khoa Hô hấp -->
                <!-- <div class="col-lg-4 col-md-6">
                    <div class="single-key">
                        <i class="fas fa-lungs"></i>
                        <h5>Khoa Hô hấp</h5>
                        <p>Chăm sóc chuyên sâu cho các bệnh về đường hô hấp và phổi, bao gồm điều trị hen suyễn.</p>
                    </div>
                </div> -->

                <!-- Khoa Tiêu hóa -->
                <!-- <div class="col-lg-4 col-md-6">
                    <div class="single-key">
                        <i class="fas fa-stethoscope"></i>
                        <h5>Khoa Tiêu hóa</h5>
                        <p>Điều trị các bệnh đường tiêu hóa như viêm gan, dạ dày, ruột, gan, mật và tuyến tụy.</p>
                    </div>
                </div> -->

                <!-- Khoa Da liễu -->
                <!-- <div class="col-lg-4 col-md-6">
                    <div class="single-key">
                        <i class="fas fa-syringe"></i>
                        <h5>Khoa Da liễu</h5>
                        <p>Chăm sóc chuyên sâu cho các bệnh về da, bao gồm điều trị mụn.</p>
                    </div>
                </div> -->

            </div>

    </section>
    <!-- ################# About us #######################--->

    <section id="about_us" class="container">
        <div class="row no-margin">
            <div class="col-lg-6 py-5 px-5" style="display: flex; align-items: center; padding: 0; margin: 0; height: 100%;">
                <img src="assets/image/HKL.png" alt="" style="width: 100%; height: auto; object-fit: cover; display: block; flex-grow: 1;">
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


    <section class="container-xl">
        <div id="contact" class="col-md-6 col-sm-12 map-img">
            <h2 style="font-family: 'Times New Roman', Times, serif; color: #344767; text-decoration: underline;"><b>Liên hệ</b></h2>
            <address class="md-margin-bottom-40">
                123 Đường Bệnh viện, Thành phố, Quốc gia <br>
                Điện thoại: +123 456 7890 <br>
                Email: <a href="mailto:info@hospital.com" class="">info@hospital.com</a><br>
                Thời gian: Thứ Hai - Thứ Sáu: 8:00 AM - 6:00 PM
            </address>
        </div>
    </section>

    <!-- ################# nut len dau trang #######################--->
    <a id="scroll-top" href="#" style="right: 15px; bottom: 60px; width: 50px; height: 50px; position: fixed; background: #167070; padding: 15px; display: none; border-radius: 50%; text-align: center;">
        <i class="fas fa-chevron-up" aria-hidden="true" style="color:white; font-size: 20px; display: inline-block; vertical-align: middle;"></i>
    </a>




    <!-- ################# Footer Starts Here#######################--->

    <footer class="footer py-4  ">


        <div class="container-fluid">
            <div class="row align-items-center justify-content-lg-between">
                <div class="col-lg-6 mb-lg-0 mb-4">

                    <div class="copyright text-center text-sm text-muted text-lg-start">
                        ©
                        <script>
                            document.write(new Date().getFullYear())
                        </script>,
                        made with <i class="fa fa-heart"></i> by
                        <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Huan, Khoa and Long</a>
                        for Uni 24-25.
                    </div>
                </div>

                <div class="col-lg-6">
                    <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                        <li class="nav-item">
                            <a href="#about_us" class="nav-link text-muted">Giới thiệu</a>
                        </li>
                        <li class="nav-item">
                            <a href="#services" class="nav-link text-muted">Chuyên khoa</a>
                        </li>
                        <li class="nav-item">
                            <a href="#contact" class="nav-link text-muted">Liên hệ</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

<?php
include SITE_ROOT . ('/HMS-Nhom11/assets/include/footer.php');
?>