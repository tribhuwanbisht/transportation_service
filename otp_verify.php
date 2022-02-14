<?php
session_start();

$otp_email=$_POST['otp'];
$otp_page= $_SESSION["otp_page"];
if($otp_page==$otp_email){
    echo "<script>window.location.assign('dashboard.php')</script>";
}
else{
    echo "<script>alert('INVALID OTP');window.location.assign('index.html')</script>";
}
?>