<?php
session_start();
include("connection.php");
include("functions.php");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$_POST['book_now']=true;
//include("login.php");
$logged = check_login($con);
//echo $logged ? 'true' : 'false';
if ($logged) {


    if (isset($_POST['logout_btn'])) {
        // Destroy the session
        session_destroy();

        // Redirect to the login page
        header("Location: login.php");
        exit();
    }
} else {
    header("Location:login.php");
}
if(isset($_POST['cancel'])){
    header("Location:index.php");
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['Name'];
    $email = $_POST['Email'];
    $checkin = $_POST['checkin_date'];
    $checkout = $_POST['checkout_date'];
    $foreign = $_SESSION['Email'];
    
        if (!empty($name) && !empty($checkin) && !empty($email)&&!empty($checkout)) {
            $lastBookingIdQuery = "SELECT MAX(ID) AS last_booking_id FROM Booking";
        $result = mysqli_query($con, $lastBookingIdQuery);
        $row = mysqli_fetch_assoc($result);
        $lastBookingId = $row['last_booking_id'];

        // Increment the last booking ID
        $newBookingId = $lastBookingId ? $lastBookingId + 1 : 1;
            $query = "insert into Booking(`Name`,`Email`,`checkin date`,`checkout date`,`Room 1`,`Room 2`,`Room 3`,`Room 4`,`user`,`ID`) values('$name','$email','$checkin','$checkout','0','0','0','0','$foreign','$newBookingId')";
            mysqli_query($con, $query);
            
            header("Location: booking2.php");
    
}}
/*$user=check_login($con);
//var_dump($user);
//$email=$user['Email'];
echo "<script>var name='$user';</script>";*/
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
    <!-- Head content here -->
</head>

<body>
    <div class="booksign" >
        <img src="https://images.pexels.com/photos/2017802/pexels-photo-2017802.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="book_img">
<div class="box">
            <form method="post">
                <div style="font-size:6.5vh;color:white;font-family:Century Gothic;text-align:center">Bookings</div><br><br>
                <label for="fname" style="color: white;font-size:2.5vh"> Enter Name: </label>
                <input id="fname" type="text" name="Name" placeholder="Booking name..." required><br><br>
                <label for="Email" style="color: white;font-size:2.5vh"> Enter Email: </label>
                <input id="email" type="email" name="Email" placeholder="Your email.." required><br><br>
                <label for="Date" style="color: white;font-size:2.5vh"> Enter Check-in Date: </label><br><br>
                <input id="date" type="date" class="custom-date-input" name="checkin_date" required><br><br>
                <label for="Date" style="color: white;font-size:2.5vh"> Enter Check-out Date: </label><br><br>
                <input id="date" type="date" class="custom-date-input" name="checkout_date" required><br><br>
                

                <input id="button" class="buttonlogin"type="submit" value="Save and choose rooms"><br><br>
                <a href="index.php" class="btn btn-primary">Cancel</a><br>
                
            </form>

        </div>
</div>
    <!--<div class="header" data-aos="zoom-out">
        <div class="logo">

        </div>
        <div class="menu">
            <ul class="navigation">
                <li><a id="home" href="index.php">HOME</a></li>
                <li><a id="about" href="about.php">ABOUT</a></li>
                <li><a id="rooms" href="rooms.php">ROOMS</a></li>
                <li><a id="reviews" href="reviews.php">REVIEWS</a></li>
                <li><a id="contact" href="contact.php">CONTACT</a></li>
                <li><i class="fa fa-search"></i></li>
                <li>
                    <form method="post">
                        <input type="submit" name="logout_btn" value="Logout">
                    </form>
                <li>

            </ul>
        </div>
    </div>

     Booking page content here -->

    <!-- Logout button -->

</body>

</html>