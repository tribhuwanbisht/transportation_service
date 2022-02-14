<?php
include 'config.php';
 
 $conn= mysqli_connect($server,$username,$password);
 if(!$conn)
 {
     echo "Can't connect to database";
 }
 
     //echo "Connection successful";
     
     $name=$_POST["name"];
     $email=$_POST["email"];
     $password=$_POST["password"];
     $mobile_number=$_POST["mobile_number"];
     $nature_of_material=$_POST["nature_of_material"];
     $weight_of_material=$_POST["weight_of_material"];
     $quantity=$_POST["quantity"];
     $city =$_POST["dealer_city"];
     $state=$_POST["dealer_state"];
     $user_type="dealer";
   
    $sql= "INSERT INTO `goods_transportation_service`.`dealers` (`name`,`email`,`password`,`mobile_number`,`nature_of_material`,`weight_of_material`,`quantity`,`city`,`state`,`user_type`) VALUES ('$name','$email','$password','$mobile_number','$nature_of_material','$weight_of_material','$quantity','$city','$state','$user_type')";
         if(mysqli_query($conn, $sql))
        {
           // echo "Data entered successfully";
            echo "<script> alert(`REGISTRATION SUCCESFUL`)</script>";
            echo "<script>window.location.assign('index.html')</script>";
        }
        else{
            echo "Data did not enter successfully";
        }
?>
