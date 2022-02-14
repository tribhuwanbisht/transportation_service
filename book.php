<?php
session_start();
include "config.php";
$conn= mysqli_connect($server,$username,$password,$database);
if(!$conn)
{
    echo "Can't connect to database";
}
else{

$dealer_id=$_SESSION["dealer_id"];
$driver_id=$_SESSION['driver_id'];
$sql="INSERT INTO drivers_dealers (dealer_id,driver_id) values($dealer_id,$driver_id)";
$result=mysqli_query($conn,$sql);
return $result;
}
?>