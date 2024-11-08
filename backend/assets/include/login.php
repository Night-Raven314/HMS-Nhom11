<?php

include  ('../config.php');

$username = $_POST['user_name'];
$password = $_POST['password'];

//to prevent from mysqli injection  
$username = stripcslashes($username);
$password = stripcslashes($password);
$username = mysqli_real_escape_string($conn, $username);
$password = mysqli_real_escape_string($conn, $password);

$sql = "select * from dim_user where user_name = '$username' and password = '$password'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$count = mysqli_num_rows($result);

if ($count == 1) {
    echo "<h1><center> Login successful </center></h1>";
} else {
    echo "<h1> Login failed. Invalid username or password.</h1>";
}
?>