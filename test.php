<?php

$email=$_POST['email'];
$password=$_POST['password'];
$user_type=$_POST['user_type'];
if($user_type=="")
{
    echo "<script>alert(`Please select user type`)</script>";
    echo "<script>window.location.assign('index.html')</script>";
}



?>