<?php
session_start();
if (isset($_SESSION["user_type"])) {
include 'config.php';
$conn= mysqli_connect($server,$username,$password);
if(!$conn)
{
    echo "Can't connect to database";
}
//Closes at end
else{

$user_type=$_SESSION["user_type"];
if($user_type=="dealer"){
$dealer_name=$_SESSION["dealer_name"];
$dealer_id=$_SESSION["dealer_id"];
$dealer_city=$_SESSION["dealer_city"];
$dealer_state=$_SESSION["dealer_state"];
$dealer_route=$dealer_city.",".$dealer_state;

//Query for table
if (isset($_POST['route1_city_from'])) {
    
    $search_route=$_POST["route1_city_from"].",".$_POST["route1_state_from"]."-".$_POST["route1_city_to"].",".$_POST["route1_state_to"];
    $search_route_reverse=$_POST["route1_city_to"].",".$_POST["route1_state_to"]."-".$_POST["route1_city_from"].",".$_POST["route1_state_from"];
    
    // echo $search_route."<br>".$search_route_reverse;
    
    $sql2="SELECT * FROM `goods_transportation_service`.`drivers` WHERE route_1 LIKE '%$search_route%' OR route_2 LIKE '%$search_route%' OR route_3 LIKE '%$search_route%' OR route_1 LIKE '%$search_route_reverse%' OR route_2 LIKE '%$search_route_reverse%' OR route_3 LIKE '%$search_route_reverse%'";
    $result2=mysqli_query($conn,$sql2);
    $num2=mysqli_num_rows($result2);
}

//Query for button


//Query for button end

//Query for table ends

//Query for cards

$sql="SELECT * FROM `goods_transportation_service`.`drivers` WHERE route_1 LIKE '%$dealer_route%' OR route_2 LIKE '%$dealer_route%' OR route_3 LIKE '%$dealer_route%'";

$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);

// echo $num;
// $row=mysqli_fetch_assoc($result);
// while($row=mysqli_fetch_assoc($result))
// {
// echo $row['mobile_number']." ".$row['name']." ".$row['email']." ".$row['age']."<br/>";
// }

// Query for cards end

?>
<!-- Dealer HTML Part -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dealer Dashboard</title>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
    />
    <link rel="stylesheet" href="css/card_new.css" />
  </head>
  <body>
    <!-- Top Content -->
    <div class="top-content row">
      <div class="col-md-11">
          <?php
        echo '<h1 class="text-left" style="display: inline ;color: #5596a1">Welcome ,'.$dealer_name.'</h1>';
        ?>
      </div>
      <div class="col-md-1">
        <button class="btn btn-outline-danger" onclick="logout()">Logout</button>
      </div>
    </div>
    <!-- End of top content -->
    <br /><br />
    <!-- Main Content -->
    <div class="main">
      <div class="row">
        <!-- Table -->
        <div class="col-md-5" style="border-right: 2px solid rgb(40, 139, 118)">
          <div class="contaier" style="padding-right: 10px">
            <div class="row">
              <form action="" method="post">
                <div class="row">
                  <h4
                    class="form-control"
                    style="border: none; font-weight: 600; font-size: 20px"
                  >
                    Search Manually:
                  </h4>
                  <div class="col-md-6">
                    <p
                      class="form-control"
                      style="border: none; font-weight: 600"
                    >
                      From:
                    </p>
                    <div class="form-group text-left">
                      <select
                        id="route1StateSelectFrom"
                        name="route1_state_from"
                        class="form-control stateSelect"
                        size="1"
                        onchange="makeSubmenu1(this.value)"
                      ></select>
                      <br />
                      <select
                        id="route1CitySelectFrom"
                        size="1"
                        name="route1_city_from"
                        class="form-control"
                      >
                        <option value="" disabled selected>Choose City</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <p
                      class="form-control"
                      style="border: none; font-weight: 600"
                    >
                      To:
                    </p>
                    <div class="form-group text-left">
                      <select
                        id="route1StateSelectTo"
                        name="route1_state_to"
                        class="form-control stateSelect"
                        size="1"
                        onchange="makeSubmenu2(this.value)"
                      ></select>
                      <br />
                      <select
                        id="route1CitySelectTo"
                        size="1"
                        name="route1_city_to"
                        class="form-control"
                      >
                        <option value="" disabled selected>Choose City</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-5"></div>
                  <div class="col-md-2">
                    <button type="submit" class="btn btn-outline-warning">
                      Search
                    </button>
                  </div>
                </div>
              </form>
            </div>
            <br />
            <div class="row">
              <table class="table table-hover table-striped">
                <thead style="color: cornflowerblue">
                  <tr>
                    <th>Name</th>
                    <th>Mobile Number</th>
                    <th>Truck Number</th>
                    <th>Truck Capacity</th>
                    <th>Book</th>
                  </tr>
                </thead>
                <tbody style="color: aliceblue">

                <?php
                if (isset($_POST['route1_city_from'])) {

                while($row2=mysqli_fetch_assoc($result2))
                {
                    // '.$row2['driver_id'].'
                    $driver_id_test=$row2['driver_id'];
                    $_SESSION['driver_id']=$driver_id_test;
                    // echo  $driver_id_test." ".$dealer_id;
                echo'  <tr>
                    <td>'.$row2['name'].'</td>
                    <td>+91 '.$row2['mobile_number'].'</td>
                    <td>'.$row2['truck_number'].'</td>
                    <td>'.$row2['truck_capacity'].' (tons)</td>
                    <td>
                    <button type="submit" class="btn btn-outline-primary table_book">Book</button>
                    <button class="btn btn-outline-danger" id="cancel_button_1" style="display:none;" >Cancel</button>
                    </td>
                  </tr>';
                }

                // $sql3="INSERT INTO drivers_dealers (dealer_id,driver_id) values($dealer_id,$driver_id_test)";
                // $result=mysqli_query($conn,$sql);
// $num=mysqli_num_rows($result);
            }
                 ?> 
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-md-7">
        <div class="container">
            <div class="row">
         
        <?php
        while($row=mysqli_fetch_assoc($result))
        {
            $driver_id_new=$row['driver_id'];
        // echo $row['mobile_number']." ".$row['name']." ".$row['email']." ".$row['age']."<br/>";
        echo '<div class="col-md-4">
        <div class="card card-1">
        <h4>'.$row['name'].'</h4>
        <p>Age: <span>'.$row['age'].' years</span></p>
        <p>Mobile: <span>+91 '.$row['mobile_number'].'</span></p>
        <p>Truck no.: <span>'.$row['truck_number'].'</span></p>
        <p>Capacity: <span>'.$row['truck_capacity'].' (tons)</span></p>
        <p>Transporter name: <span>'.$row['transporter_name'].'</span></p>
        <p>Driving Experience: <span>'.$row['driving_experience'].' years</span></p>
        <button class="btn btn-outline-success card_book">Book</button>
        <button class="btn btn-outline-danger" id="cancel_button_2" style="display:none;" >Cancel</button>
       </div> 
      </div>';
        }
        ?>

       </div>
      </div>
    </div>
    <script src="js/states_and_cities.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.3.6/dist/jquery.slim.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
        const logout=()=>window.location.assign('index.html');
        $(document).ready(function(){
            $( ".table_book" ).click(function() {
  
        var driverId ='<?php echo $_SESSION['driver_id'];
        ?>'
        var dealerId='<?php echo $dealer_id;
?>'
                $.ajax({
            url: "book.php",
            type: "post",
            data: {
                driverId:driverId,
                dealerId:dealerId
            } ,
            success: function (response) {
                
                
                document.querySelector('.table_book').remove();
                document.querySelector('#cancel_button_1').style.display="block";
                // const cardBook=document.getElementsByClassName('card_book')

                // document.querySelector('')
            // console.log(`Great success!! ${response}`);
            // console.log('Great success!!' + response);
            },
            error: function(jqXHR, textStatus, errorThrown) {
               console.log(textStatus, errorThrown);
            }
        });
    });
    
    // Card AJAX

    $( ".card_book" ).click(function() {
        
        var driverId ='<?php echo $_SESSION['driver_id'];
  ?>'
  var dealerId='<?php echo $dealer_id;
?>'
          $.ajax({
              url: "book.php",
              type: "post",
              data: {
                  driverId:driverId,
                  dealerId:dealerId
                } ,
                success: function (response) {
                    
                    
                    document.querySelector('.card_book').remove();
                    document.querySelector('#cancel_button_2').style.display="block";
    //   for(let i=0;i<cardBook.length;i++)
    //   {
    //       console.log(i);
    //      cardBook[i].remove();
    //   }
      
      // console.log(`Great success!! ${response}`);
      // console.log('Great success!!' + response);
      },
      error: function(jqXHR, textStatus, errorThrown) {
         console.log(textStatus, errorThrown);
      }
  });
});
});


       


    </script>
  </body>
</html>



<!-- End of dealer part -->
<?php
}
else{
    $driver_name=$_SESSION["driver_name"];
    $driver_id=$_SESSION["driver_id"];
    $truck_number=$_SESSION["truck_number"];
    $truck_capacity=$_SESSION["truck_capacity"];
    $driving_experience=$_SESSION["driving_experience"];
    $transporter_name=$_SESSION["transporter_name"];
    
    //   echo $driver_id;
    // echo $driver_name."<br>";
    // echo $user_type;
   $sql="SELECT * FROM `goods_transportation_service`.`drivers_dealers` WHERE driver_id='$driver_id'";


$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$num=mysqli_num_rows($result);
if ($num>0){
$dealer_id=$row['dealer_id'];
$sql2="SELECT * FROM `goods_transportation_service`.`dealers` WHERE dealer_id='$dealer_id'";
$result2=mysqli_query($conn,$sql2);
}
// $row2=mysqli_fetch_assoc($result2);


// $num=mysqli_num_rows($result);
// echo $num;

// echo $num;
     
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Driver Dashboard</title>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
    />
    <link rel="stylesheet" href="css/card_new.css" />
</head>
<body>
<div class="top-content row">
      <div class="col-md-11">
          <?php
        echo '<h2 class="text-left" style="display: inline ;color: #5596a1">Welcome ,'.$driver_name.'</h2>';
        ?>
      </div>
      <div class="col-md-1">
        <button class="btn btn-outline-danger" onclick="logout()">Logout</button>
      </div>
</div>
<br><br>
<div class="main">
    <h2 style="color: floralwhite">Dealers that have booked for your service</h2>
    <br><br>
    <table class="table table-hover table-striped">
                <thead style="color: #5596a1">
                  <tr>
                    <th>Name</th>
                    <th>Mobile Number</th>
                    <th>City</th>
                    <th>Nature of material</th>
                    <th>Weight of material</th>
                    <th>Quantity</th>
                  </tr>
                </thead>
                <tbody style="color: floralwhite">

                <?php
                if($num>0){
                while($row2=mysqli_fetch_assoc($result2))
                {
                echo'  <tr>
                    <td>'.$row2['name'].'</td>
                    <td>+91 '.$row2['mobile_number'].'</td>
                    <td>'.$row2['city'].'</td>
                    <td>'.$row2['nature_of_material'].' (tons)</td>
                    <td>'.$row2['weight_of_material'].'</td>
                    <td>'.$row2['quantity'].'</td>
                    
                  </tr>';
                }
              }
                 ?> 
                </tbody>
              </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const logout=()=>window.location.assign('index.html');
    </script>
</body>
</html>



<?php
}
}}

else
{
    session_unset();
    session_destroy();
    echo "<script>alert(`Please login to continue`)</script>";
    echo "<script>window.location.assign('index.html')</script>";
}
?>



<!-- Card -->

              
          
          <!-- card-end -->