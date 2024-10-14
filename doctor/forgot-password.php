<?php
session_start();
error_reporting(0);
include("include/config.php");
//Checking Details for reset password
if(isset($_POST['submit'])){
$contactno=$_POST['contactno'];
$email=$_POST['email'];
$query=mysqli_query($con,"select id from  doctors where contactno='$contactno' and docEmail='$email'");
$row=mysqli_num_rows($query);
if($row>0){

$_SESSION['cnumber']=$contactno;
$_SESSION['email']=$email;
header('location:reset-password.php');
} else {
echo "<script>alert('Invalid details. Please try with valid details');</script>";
echo "<script>window.location.href ='forgot-password.php'</script>";


}

}
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Password Recovery</title>
		
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="../assets/vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="../assets/vendor/themify-icons/themify-icons.min.css">
		<link href="../assets/vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="../assets/vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="../assets/vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="assets/css/styles.css">
		<link rel="stylesheet" href="assets/css/plugins.css">
		<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
	</head>
	<body class="login">
		<div class="row">
			<div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
				<div class="logo margin-top-30">
				<a href="../../index.php"><h2> HKL | Phục hồi mật khẩu bác sĩ </h2></a>
				</div>

				<div class="box-login">
					<form class="form-login" method="post">
						<fieldset>
							<legend>
								Phục hồi mật khẩu bác sĩ
							</legend>
							<p>
								Vui lòng nhập số liên lạc và Email của bạn để khôi phục mật khẩu.<br />
					
							</p>

							<div class="form-group form-actions">
								<span class="input-icon">
									<input type="text" class="form-control" name="contactno" placeholder="Số điện thoại đã đăng kí">
									<i class="fa fa-lock"></i>
									 </span>
							</div>

							<div class="form-group">
								<span class="input-icon">
									<input type="email" class="form-control" name="email" placeholder=" Email đã đăng kí ">
									<i class="fa fa-user"></i> </span>
							</div>

							<div class="form-actions">
								
								<button type="submit" class="btn btn-primary pull-right" name="submit">
									Đặt lại <i class="fa fa-arrow-circle-right"></i>
								</button>
							</div>
							<div class="new-account">
								Đã có tài khoản ? 
								<a href="index.php">
									Đăng nhập
								</a>
							</div>
						</fieldset>
					</form>

					<div class="copyright">
					<span class="text-bold text-uppercase"> Hệ thống quản lý bệnh viện</span>
					</div>
			
				</div>

			</div>
		</div>
		<script src="../assets/vendor/jquery/jquery.min.js"></script>
		<script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="../assets/vendor/modernizr/modernizr.js"></script>
		<script src="../assets/vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="../assets/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="../assets/vendor/switchery/switchery.min.js"></script>
		<script src="../assets/vendor/jquery-validation/jquery.validate.min.js"></script>
	
		<script src="assets/js/main.js"></script>

		<script src="assets/js/login.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				Login.init();
			});
		</script>
	
	</body>
	<!-- end: BODY -->
</html>