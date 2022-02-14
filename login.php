<?php

session_start();
$user_type=$_POST['user_type'];


if($user_type=="")
{
    echo "<script>alert(`Please select user type`)</script>";
    echo "<script>window.location.assign('index.html')</script>";
}


include 'config.php';

$conn= mysqli_connect($server,$username,$password);
if(!$conn)
{
    echo "Can't connect to database";
}

else
{
$email=$_POST['email'];
$password=$_POST['password'];
// $database=`goods_transportation_service`;

if($user_type=="dealer")
{
$sql="SELECT * FROM `goods_transportation_service`.`dealers` WHERE email='$email'";

$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
$row=mysqli_fetch_assoc($result);
$_SESSION["dealer_name"]=$row["name"];
$_SESSION["dealer_id"]=$row["dealer_id"];
$_SESSION["dealer_city"]=$row["city"];
$_SESSION["dealer_state"]=$row["state"];
$_SESSION["user_type"]=$row['user_type'];

        if($row['password']==$password)
            {
                echo "<script>window.location.assign('dashboard.php')</script>";
            }
        else
            { 
                echo "<script>alert(`Incorrent email or password`)</script>";
                echo "<script>window.location.assign('index.html')</script>";
            }
            $conn->close();

        }

else{
    $sql="SELECT * FROM `goods_transportation_service`.`drivers` WHERE email='$email'";
    $result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
$row=mysqli_fetch_assoc($result);
    $_SESSION["driver_name"]=$row["name"];
    $_SESSION["driver_id"]=$row["driver_id"];
    $_SESSION["truck_number"]=$row["truck_number"];
    $_SESSION["truck_capacity"]=$row["truck_capacity"];
    $_SESSION["driving_experience"]=$row["driving_experience"];
    $_SESSION["transporter_name"]=$row["transporter_name"];
    $_SESSION["user_type"]=$row['user_type'];
    // $_SESSION["driver_city"]=$row["city"];
    // $_SESSION["dealer_state"]=$row["state"];


        if($row['password']==$password)
            {
                echo "<script>window.location.assign('dashboard.php')</script>";
            }
        else
            { 
                echo "<script>alert(`Incorrent email or password`)</script>";
                echo "<script>window.location.assign('index.html')</script>";
            }
            $conn->close();
}
}
?>