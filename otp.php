<?php
session_start();
include 'config.php';
$_SESSION["otp_page"]=(rand(1000,9999));
$conn= mysqli_connect($server,$username,$password);
if(!$conn)
{
    echo "Can't connect to database";
}

else
{
$email=$_POST['email'];

$sql1="SELECT * FROM `goods_transportation_service`.`dealers` WHERE email='$email'";
$sql2="SELECT * FROM `goods_transportation_service`.`drivers` WHERE email='$email'";
$result1=mysqli_query($conn,$sql1);
$result2=mysqli_query($conn,$sql2);

//$num=mysqli_num_rows($result);
$row1=mysqli_fetch_assoc($result1);
$row2=mysqli_fetch_assoc($result2);
if($row1 > 0 || $row2 > 0){
    mail($email,"Your one time password for mail verification:",$_SESSION["otp_page"], 'From: pritibangari1508@gmail.com');
    echo ' <!DOCTYPE html>
    <html lang="en">
      <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
    />
    <link
      rel="stylesheet"
      href="css/card_new.css"
    />
        <title>Document</title>
        <style>
          
          .container{
            padding-left: 30%;
            padding-right: 30%;
            padding-top: 10%;
          }
          </style>
      </head>
      <body >
        <div class="container">
        <form action="otp_verify.php" method="POST" class="form">
          <span class="text-center font-weight-bold"   style="margin-left: 90px; font-size: x-large;color: floralwhite">ENTER OTP</span>
          <input type="text" name="otp" class="form-control" />
          <button type="submit" class="btn btn-dark" style="margin-left: 110px; margin-top: 10px;">VERIFY</button>
        </form>
      </div>
      </body>
    </html>
    ';
    

}
else{
    echo "<script> alert (`EMAIL does not exist`)</script>";
}
}

?>
