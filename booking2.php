<?php
session_start();
include("connection.php");
include("functions.php");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$logged = check_login($con);

if ($logged) {


  if (isset($_POST['logout_btn'])) {
   
    session_destroy();
    header("Location: login.php");
    exit();
  }
} else {
  header("Location:login.php");
}

if (isset($_POST['book_btn'])) {
  $r1 = $_POST['Count1'];
  $r2 = $_POST['Count2'];
  $r3 = $_POST['Count3'];
  $r4 = $_POST['Count4'];
  $user = $_SESSION['Email'];
  if(!($r1==0&&$r2==0&&$r3==0&&$r4==0)){
  $cancelbookid = "SELECT MAX(ID) as update_booking from Booking where user='$user'";
  $result = mysqli_query($con, $cancelbookid);
  $row = mysqli_fetch_assoc($result);
  $ID = $row['update_booking'];
  $update = "UPDATE Booking set `Room 1`='$r1',`Room 2`='$r2',`Room 3`='$r3',`Room 4`='$r4' where ID='$ID'";
  if (mysqli_query($con, $update) === true) {
    echo "<script>alert('thanx for booking!')</script>";
    header("Location:thanx.php");
  }
}
else{
  echo '<div class="alert alert-danger alert-dismissible fade show" roll="alert">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <strong> Please select a room! </strong>
  </div>';
}
}
if (isset($_POST['cancel'])) {
  $user = $_SESSION['Email'];
  $cancelbookid = "SELECT MAX(ID) as cancel_booking from Booking where user='$user'";
  $result = mysqli_query($con, $cancelbookid);
  $row = mysqli_fetch_assoc($result);
  $ID = $row['cancel_booking'];
  $cancel = "DELETE from Booking where ID='$ID'";
  $result2 = mysqli_query($con, $cancel);
  if ($result2) {
    header("Location:index.php");
  } else{
    echo "unsuccessful";
  }
  unset($_POST['cancel']);
}
?>
<!DOCTYPE html>

<body>

  <head>


    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
    <script>
      function showConfirmation() {
            var result = confirm('Are you sure you want to cancel?');
            if (!result) {
                event.preventDefault();
            }
        }
        </script>

  </head>
  <div class="roombooking">
    <form method="post">
      <div class="room_count1">
        <label for="roomCount1">Room 1 Count:</label>
        <div id="avl1"> </div>
        <input type="number" id="roomCount1" value="0" name="Count1" min=0 max=100 >
      </div>
      <div class="room_count2">
        <label for="roomCount2">Room 2 Count:</label>
        <div id="avl2"></div>
        <input type="number" id="roomCount2" value="0" name="Count2" min=0 max=50>
      </div><br><br>
      <div class="room_count3">
        <label for="roomCount3">Room 3 Count:</label>
        <div id="avl3"></div>
        <input type="number" id="roomCount3" value="0" name="Count3" min=0 max=26>
      </div>
      <div class="room_count4">
        <label for="roomCount4">Room 4 Count:</label>
        <div id="avl4"></div>
        <input type="number" id="roomCount4" value="0" name="Count4" min=0 max=5>
      </div>
  </div><br><br>
  <div class="total" >
    <h3>Total amount : Rs.</h3><div id="total"></div>
      </div>
      <div class="total" >
    <h3>GST (18%) : Rs. </h3><div id="total2"></div>
      </div>
      <div class="total" >
    <h3>Grand Total amount : Rs.</h3><div id="total3"></div>
      </div>
  <input id="button" type="submit" value="BOOK" name="book_btn" class="buttonlogin" style="width:30vw;"><br><br>

  <input id="cancel" class="buttonlogin" type="submit" value="Cancel" name="cancel" style="width:30vw;" onclick="showConfirmation()"></form><br><br>
<?php
$user = $_SESSION['Email'];
$query="SELECT MAX(ID) as update_booking from Booking where user='$user'";
 $result = mysqli_query($con, $query);
  $row = mysqli_fetch_assoc($result);
  $ID = $row['update_booking'];
  $query="select `checkin date`,`checkout date` from Booking where ID='$ID';";
$result=mysqli_query($con,$query);
$row=mysqli_fetch_assoc($result);
$checkin=$row['checkin date'];
$checkout=$row['checkout date'];
$room1="select sum(`Room 1`) from Booking where `checkin date`<='$checkout' and `checkout date`>='$checkin';";
$result=mysqli_query($con,$room1);
$row = mysqli_fetch_assoc($result);
$ct1=$row["sum(`Room 1`)"];
if($ct1==null)$ct1=0;

$room2="select sum(`Room 2`) from Booking where `checkin date`<='$checkout' and `checkout date`>= '$checkin';";
$result=mysqli_query($con,$room2);
$row = mysqli_fetch_assoc($result);
$ct2=$row['sum(`Room 2`)'];
if($ct2==null)$ct2=0;

$room3="select sum(`Room 3`) from Booking where `checkin date`<='$checkout' and `checkout date`>= '$checkin';";
$result=mysqli_query($con,$room3);
$row = mysqli_fetch_assoc($result);
$ct3=$row['sum(`Room 3`)'];
if($ct3==null)$ct3=0;

$room4="select sum(`Room 4`) from Booking where `checkin date`<='$checkout' and `checkout date`>='$checkin';";
$result=mysqli_query($con,$room4);
$row = mysqli_fetch_assoc($result);
$ct4=$row['sum(`Room 4`)'];
if($ct4==null)$ct4=0;

$checkin=DateTime::createFromFormat('Y-m-d',$checkin);
$checkout=DateTime::createFromFormat('Y-m-d',$checkout);

$diff=date_diff($checkout,$checkin);
echo '
<script>
  var room1=document.getElementById("roomCount1");
  var room2=document.getElementById("roomCount2");
  var room3=document.getElementById("roomCount3");
  var room4=document.getElementById("roomCount4");

  room1.addEventListener("input", handleRoomCountChange);
  room2.addEventListener("input", handleRoomCountChange);
  room3.addEventListener("input", handleRoomCountChange);
  room4.addEventListener("input", handleRoomCountChange);

  function handleRoomCountChange() {
    
    var room1ct = room1.value;
    var room2ct = room2.value;
    var room3ct = room3.value;
    var room4ct = room4.value;
    var diff='.$diff->days.';

    // Update the display
    var total1 =document.getElementById("total").innerHTML=diff*(room1ct*1000+room2ct*1200+room3ct*1400+room4ct*1600) ;
    var total2 =document.getElementById("total2").innerHTML=diff*(0.18*(room1ct*1000+room2ct*1200+room3ct*1400+room4ct*1600));
    var total3 =total1 +total2;
    document.getElementById("total3").innerHTML= total3 + "/-";
  }
  document.getElementById("avl1").innerHTML=100-'.$ct1.'+" rooms available";
  document.getElementById("avl2").innerHTML=50-'.$ct2.'+" rooms available";
  document.getElementById("avl3").innerHTML=26-'.$ct3.'+" rooms available";
  document.getElementById("avl4").innerHTML=5-'.$ct4.'+" rooms available";

  var max1=document.getElementById("roomCount1");
  max1.max=100-'.$ct1.';
  var max2=document.getElementById("roomCount2");
  max1.max=100-'.$ct2.';
  var max3=document.getElementById("roomCount3");
  max1.max=100-'.$ct3.';
  var max4=document.getElementById("roomCount4");
  max1.max=100-'.$ct4.';
  </script>';
  ?>
 

  <script src="script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
  <script>AOS.init({ duration: 800 });</script>

</body>