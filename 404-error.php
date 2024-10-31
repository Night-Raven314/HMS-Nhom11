<?php
define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT']);

include SITE_ROOT . ('/HMS-Nhom11/assets/include/config.php');
include SITE_ROOT . ('/HMS-Nhom11/assets/include/header.php');
?>

<head>
    <title>
        Not Found
    </title>
</head>

<body>
    <div class="err-background">
        <div class="err-content">
            <h1 class="text-primary text-gradient">Oops, Chúng tôi không tìm thấy trang này</h1>
            <p class="zoom-area">Vui lòng thử lại sau hoặc trở lại trang chủ</p>
            <section class="error-container">
                <span class="four"><span class="screen-reader-text">4</span></span>
                <span class="zero"><span class="screen-reader-text">0</span></span>
                <span class="four"><span class="screen-reader-text">4</span></span>
            </section>
            <div class="text-center" href="index.php">
            <a class="btn bg-gradient-primary btn-sm mb-0 me-3" href="index.php">Quay lại trang chủ</a>
            </div>
        </div>
    </div>
</body>

</html>