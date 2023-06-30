<?php
session_start();
include("connection.php");
include("functions.php");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$temp=$_SESSION['temp'];
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
  if (!($r1 == 0 && $r2 == 0 && $r3 == 0 && $r4 == 0)) {
    $update="insert into Booking (`Name`, `Email`, `checkin date`, `checkout date`, `Room 1`, `Room 2`, `Room 3`, `Room 4`, `user`) values";
    $update.="('".$temp['Name']."','".$temp['Email']."','".$temp['checkin date']."','".$temp['checkout date']."',".$r1.",".$r2.",".$r3.",".$r4.",'".$user."');";
    if (mysqli_query($con, $update) === true) {
      echo "<script>alert('thanx for booking!')</script>";
      header("Location:thanx.php");
    }
  } else {
    echo '<div class="alert alert-danger alert-dismissible fade show" roll="alert">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <strong> Please select a room! </strong>
  </div>';
  }
}
if (isset($_POST['cancel'])) {
    header("Location:index.php");
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
    <style>
      .total,#total,#total2,#total3{
        font-weight: 600;
      }
      </style>

  </head>
  <div class="roombooking">
    <form method="post">
      <div class="b21" data-aos="fade-left">
        GUEST AND ROOMS <br><br>
        <div class="room_count1">
          <label for="roomCount1" style="color: black;font-size:3vh">The Superior Room:</label><br><br>
          <div id="avl1"> </div>
          <input type="number" id="roomCount1" value="0" name="Count1" min=0 max=100 >
        </div>
        <div class="room_count2">
          <label for="roomCount2" style="color: black;font-size:3vh">The Business Suite:</label>
          <div id="avl2"></div>
          <input type="number" id="roomCount2" value="0" name="Count2" min=0 max=50>
        </div>
        <div class="room_count3">
          <label for="roomCount3" style="color: black;font-size:3vh">The Executive Suite:</label>
          <div id="avl3"></div>
          <input type="number" id="roomCount3" value="0" name="Count3" min=0 max=26>
        </div>
        <div class="room_count4">
          <label for="roomCount4" style="color: black;font-size:3vh">The Presidential Suite:</label>
          <div id="avl4"></div>
          <input type="number" id="roomCount4" value="0" name="Count4" min=0 max=5>
        </div>
      </div><br><br>
      <div class="to1" data-aos="fade-left">
        <div class="total">
          Total amount(in Rs.)
        </div>
        <div id="total"></div>
      </div>
      <div class="to1" data-aos="fade-left">
        <div class="total">
          GST (18%)
        </div>
        <div id="total2"></div>
      </div>
      <hr style="color: white; border: 1px solid white">
      <div class="to1" data-aos="fade-left">
        <div class="total">
          Grand Total amount(in Rs.)
        </div>
        <div id="total3"></div>
      </div>
      <input id="button" type="submit" value="SAVE AND PROCEED FOR PAYMENT" name="book_btn" class="buttonlogin" style="width:30vw;"><br><br>

      <input id="cancel" class="buttonlogin" type="submit" value="Cancel" name="cancel" style="width:30vw;"
        onclick="showConfirmation()">
    </form><br><br>
  </div>
  <?php
  
  $checkin = $temp['checkin date'];
  $checkout = $temp['checkout date'];
  $room1 = "select sum(`Room 1`) from Booking where `checkin date`<='$checkout' and `checkout date`>='$checkin';";
  $result = mysqli_query($con, $room1);
  $row = mysqli_fetch_assoc($result);
  $ct1 = $row["sum(`Room 1`)"];
  if ($ct1 == null)
    $ct1 = 0;

  $room2 = "select sum(`Room 2`) from Booking where `checkin date`<='$checkout' and `checkout date`>= '$checkin';";
  $result = mysqli_query($con, $room2);
  $row = mysqli_fetch_assoc($result);
  $ct2 = $row['sum(`Room 2`)'];
  if ($ct2 == null)
    $ct2 = 0;

  $room3 = "select sum(`Room 3`) from Booking where `checkin date`<='$checkout' and `checkout date`>= '$checkin';";
  $result = mysqli_query($con, $room3);
  $row = mysqli_fetch_assoc($result);
  $ct3 = $row['sum(`Room 3`)'];
  if ($ct3 == null)
    $ct3 = 0;

  $room4 = "select sum(`Room 4`) from Booking where `checkin date`<='$checkout' and `checkout date`>='$checkin';";
  $result = mysqli_query($con, $room4);
  $row = mysqli_fetch_assoc($result);
  $ct4 = $row['sum(`Room 4`)'];
  if ($ct4 == null)
    $ct4 = 0;

  $checkin = DateTime::createFromFormat('Y-m-d', $checkin);
  $checkout = DateTime::createFromFormat('Y-m-d', $checkout);

  $diff = date_diff($checkout, $checkin);
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
    var diff=' . $diff->days . ';
    if(diff==0)diff=1;

    // Update the display
    var total1 =document.getElementById("total").innerHTML=diff*(room1ct*5000+room2ct*10000+room3ct*15000+room4ct*20000)+ "/-";
    var total2 =document.getElementById("total2").innerHTML=diff*(0.18*(room1ct*5000+room2ct*10000+room3ct*15000+room4ct*20000))+"/-";
    var total3 =parseInt(total1.slice(0,total1.length-2))+ parseInt(total2.slice(0,total2.length-2));
    document.getElementById("total3").innerHTML= total3 + "/-";
  }
  document.getElementById("avl1").innerHTML=100-' . $ct1 . '+" rooms available";
  document.getElementById("avl2").innerHTML=50-' . $ct2 . '+" rooms available";
  document.getElementById("avl3").innerHTML=26-' . $ct3 . '+" rooms available";
  document.getElementById("avl4").innerHTML=5-' . $ct4 . '+" rooms available";

  var max1=document.getElementById("roomCount1");
  max1.max=100-' . $ct1 . ';
  var max2=document.getElementById("roomCount2");
  max2.max=50-' . $ct2 . ';
  var max3=document.getElementById("roomCount3");
  max3.max=26-' . $ct3 . ';
  var max4=document.getElementById("roomCount4");
  max4.max=5-' . $ct4 . ';
  </script>';
  ?>


  <script src="script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
  <script>AOS.init({ duration: 800 });</script>

</body>