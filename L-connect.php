<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'dacn-hms';

// Tạo kết nối
$conn = new mysqli(  $servername, $username, $password, $database);

// Kiểm tra kết nối
if ($conn) 
{
    mysqli_query($conn,"SET NAMES 'utf8' ");
    
}
else {  
    echo 'Kết nối thất bại';
}
?>
