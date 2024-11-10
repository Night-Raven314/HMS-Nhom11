import { Helmet } from "react-helmet";
import { HomeNavbar } from "../components/pages/HomePage/HomeNavbar";

export const HomePage = () => {

  return (
    <div className="bg-gray-300">
      <Helmet>
        <title>Quản lý bệnh viện HKL</title>
      </Helmet>
      <HomeNavbar />
      <section id="slider">
        <div className="container-xl">
          <div className="row">
            <div className="col-lg-6 py-5 slid-detail align-self-center">
              <h1 className="fw-bolder fs-11">Website quản lý bệnh viện <span className="text-primary">HKL</span></h1>
              <p className="pt-4">Bảo mật cao: &gt; Tất cả dữ liệu của bạn được mã hóa và bảo vệ bởi các tiêu chuẩn bảo mật cao nhất, đảm bảo an toàn thông tin.</p>

              <p className="pt-4">Cập nhật thường xuyên: &gt; Chúng tôi thường xuyên cập nhật các tính năng mới và cải tiến để phục vụ bạn tốt hơn.</p>

              <p className="pt-4">Giao diện thân thiện người dùng: &gt; Giao diện đơn giản, dễ sử dụng ngay cả với những người không rành công nghệ.</p>

              <p className="pt-4">Hỗ trợ khách hàng 24/7: &gt; Đội ngũ hỗ trợ luôn sẵn sàng giúp đỡ bạn mọi lúc mọi nơi, bất cứ khi nào bạn cần.</p>
              <li className="nav-item d-flex align-items-center">
                <a className="btn bg-gradient-primary btn-sm mb-0 me-3" target="_blank" href="sign-up.php">Đăng ký lịch khám</a>
              </li>
            </div>
            <div className="col-lg-6 py-5 px-5">
              <img src="/image/Areas&Rooms/Hospital waiting room HKL.png" alt="" style={{ width: "100%", height: "auto" }} />
            </div>
          </div>
        </div>
      </section>


      {/* Services */}
      <section id="services" className="key-features department">
        <div className="container">
          <div className="inner-title">
            <h2 style={{
              fontSize: '38px',
              fontFamily: 'Times New Roman, serif',
              textAlign: 'center',
              marginBottom: '20px'
            }}>Các chuyên khoa chính</h2>
          </div>

          <div className="row">
            {/* <?php

            $sql = "SELECT * FROM `dim_specialties`";

            $specialties = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_assoc($specialties)) {

              $specialties_name = $row["specialty_name"];
            $description = $row["description"];

              ?>
            <div className="col-lg-4 col-md-6">
              <div className="single-key">
                <i className="fas fa-heart"></i>
                <h5><?php echo $specialties_name; ?></h5>
                <p><?php echo $description; ?></p>
              </div>
            </div>

            <?php
                  }?> */}

          </div>
        </div>
      </section>
      {/* ################# About us ####################### */}

      <section id="about_us" className="container">
        <div className="row no-margin">
          <div className="col-lg-6 py-5 px-5" style={{ display: 'flex', alignItems: 'center', padding: '0', margin: '0', height: '100%' }}>
            <img src="/image/HKL.png" alt="" style={{ width: '100%', height: 'auto', objectFit: 'cover', display: 'block', flexGrow: 1 }} />
          </div>
          <div className="col-sm-6 about-content">
            <h3 style={{ fontSize: '38px', fontFamily: 'Times New Roman, serif', textAlign: 'center', marginBottom: '20px' }}>Về Bệnh viện của Chúng tôi</h3>
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


      <section className="container-xl">
        <div id="contact" className="col-md-6 col-sm-12 map-img">
          <h2 style={{ fontFamily: "'Times New Roman', Times, serif", color: '#344767', textDecoration: 'underline' }}><b>Liên hệ</b></h2>
          <address className="md-margin-bottom-40">
            123 Đường Bệnh viện, Thành phố, Quốc gia
            <br />Điện thoại: +123 456 7890
            <br />Email: <a href="mailto:info@hospital.com" className="">info@hospital.com</a>
            <br />Thời gian: Thứ Hai - Thứ Sáu: 8:00 AM - 6:00 PM
          </address>
        </div>
      </section>

      {/* ################# nut len dau trang ####################### */}
      <a id="scroll-top" href="#" style={{ right: '15px', bottom: '60px', width: '50px', height: '50px', position: 'fixed', background: '#167070', padding: '15px', display: 'none', borderRadius: '50%', textAlign: 'center' }}>
        <i className="fas fa-chevron-up" aria-hidden="true" style={{ color: 'white', fontSize: '20px', display: 'inline-block', verticalAlign: 'middle' }}></i>
      </a>




      {/* ################# Footer Starts Here####################### */}

      <footer className="footer py-4  ">


        <div className="container-fluid">
          <div className="row align-items-center justify-content-lg-between">
            <div className="col-lg-6 mb-lg-0 mb-4">

              <div className="copyright text-center text-sm text-muted text-lg-start">
                ©
                <script>
                  document.write(new Date().getFullYear())
                </script>,
                made with <i className="fa fa-heart"></i> by
                <a href="https://www.creative-tim.com" className="font-weight-bold" target="_blank">Huan, Khoa and Long</a>
                for Uni 24-25.
              </div>
            </div>

            <div className="col-lg-6">
              <ul className="nav nav-footer justify-content-center justify-content-lg-end">
                <li className="nav-item">
                  <a href="#about_us" className="nav-link text-muted">Giới thiệu</a>
                </li>
                <li className="nav-item">
                  <a href="#services" className="nav-link text-muted">Chuyên khoa</a>
                </li>
                <li className="nav-item">
                  <a href="#contact" className="nav-link text-muted">Liên hệ</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
    </div>
  )
}