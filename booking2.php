<?php
session_start();
include("connection.php");
include("functions.php");
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

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
        <input type="number" id="roomCount1" value="0" name="Count1" min=0 max=100 >
      </div>
      <div class="room_count2">
        <label for="roomCount2">Room 2 Count:</label>
        <input type="number" id="roomCount2" value="0" name="Count2" min=0 max=50>
      </div><br><br>
      <div class="room_count3">
        <label for="roomCount3">Room 3 Count:</label>
        <input type="number" id="roomCount3" value="0" name="Count3" min=0 max=26>
      </div>
      <div class="room_count4">
        <label for="roomCount4">Room 4 Count:</label>
        <input type="number" id="roomCount4" value="0" name="Count4" min=0 max=5>
      </div>
  </div><br><br>
  <input id="button" type="submit" value="BOOK" name="book_btn" class="buttonlogin" style="width:30vw;"><br><br>

  <input id="cancel" class="buttonlogin" type="submit" value="Cancel" name="cancel" style="width:30vw;" onclick="showConfirmation()"></form><br><br>

  </div>

  <script src="script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
  <script>AOS.init({ duration: 800 });</script>

</body>