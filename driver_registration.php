<?php
 $server="localhost";
 $username="root";
 $password="";
 
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
     $age=$_POST["age"];
     $truck_number=$_POST["truck_number"];
     $truck_capacity=$_POST["truck_capacity"];
     $transporter_name =$_POST["transporter_name"];
     $driving_experience=$_POST["driving_experience"];

     $route_1=$_POST["route1_city_from"].",".$_POST["route1_state_from"]."-".$_POST["route1_city_to"].",".$_POST["route1_state_to"];
     $route_2=$_POST["route2_city_from"].",".$_POST["route2_state_from"]."-".$_POST["route2_city_to"].",".$_POST["route2_state_to"];
     $route_3=$_POST["route3_city_from"].",".$_POST["route3_state_from"]."-".$_POST["route3_city_to"].",".$_POST["route3_state_to"];
    //  $route_1=$_POST["route_1"];
    //  $route_2=$_POST["route_2"];
    //  $route_3=$_POST["route_3"];
     $user_type="driver";
   
    $sql= "INSERT INTO `goods_transportation_service`.`drivers` (`name`,`email`,`password`,`mobile_number`,`age`,`truck_number`,`truck_capacity`,`transporter_name`,`driving_experience`,`route_1`,`route_2`,`route_3`,`user_type`) VALUES ('$name','$email','$password','$mobile_number','$age','$truck_number','$truck_capacity','$transporter_name','$driving_experience','$route_1','$route_2','$route_3','$user_type')";
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
