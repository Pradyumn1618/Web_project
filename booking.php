<?php
session_start();
include("connection.php");
include("functions.php");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$_POST['book_now'] = true;
$_SESSION['temp']=[];
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
// if(isset($_POST['cancel'])){
//     header("Location:index.php");
// }

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = mysqli_real_escape_string($con,$_POST['Name']);
    $email = mysqli_real_escape_string($con,$_POST['Email']);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email address");
    }
    
    $checkin = $_POST['checkin_date'];
    $checkout = $_POST['checkout_date'];
    $foreign = $_SESSION['Email'];

    if (!empty($name) && !empty($checkin) && !empty($email) && !empty($checkout)) {
        $lastBookingIdQuery = "SELECT MAX(ID) AS last_booking_id FROM Booking";
        $result = mysqli_query($con, $lastBookingIdQuery);
        $row = mysqli_fetch_assoc($result);
        $lastBookingId = $row['last_booking_id'];

        // Increment the last booking ID
        $newBookingId = $lastBookingId ? $lastBookingId + 1 : 1;
        $_SESSION['temp']['Name']=$name;
        $_SESSION['temp']['Email']=$email;
        $_SESSION['temp']['checkin date']=$checkin;
        $_SESSION['temp']['checkout date']=$checkout;
        $_SESSION['temp']['ID']=$newBookingId;
       var_dump($_SESSION['temp']['ID']);
        // $query = "insert into Booking(`Name`,`Email`,`checkin date`,`checkout date`,`Room 1`,`Room 2`,`Room 3`,`Room 4`,`user`,`ID`) values('$name','$email','$checkin','$checkout','0','0','0','0','$foreign','$newBookingId')";
        // mysqli_query($con, $query);

        header("Location: booking2.php");

    }
}

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
    <script>
        window.open("", "_blank");
        window.focus();

        function showConfirmation() {
            var result = confirm('Are you sure you want to cancel?');
            if (result) {
                window.location = 'index.php';
            }
        }
        function checkDate(){
            var checkin = new Date(document.getElementById("date1").value);
            var checkout = new Date(document.getElementById("date2").value);
            if(checkout<=checkin){
                alert("Check-out date must after the Check-in date");
                event.preventDefault();
            }

        }

    </script>
    
</head>

<body>
    <div class="booksign">
        <img src="https://images.pexels.com/photos/2017802/pexels-photo-2017802.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
            class="book_img">
        <div class="box">
            <form method="post" onsubmit="checkDate()">
                <div style="font-size:6.5vh;color:white;font-family:Century Gothic;text-align:center">Bookings</div>
                <br><br>
                <label for="fname" style="color: white;font-size:2.5vh"> Enter Name: </label>
                <input id="fname" type="text" name="Name" placeholder="Booking name..." required><br><br>
                <label for="Email" style="color: white;font-size:2.5vh"> Enter Email: </label>
                <input id="email" type="email" name="Email" placeholder="Your email.." required><br><br>
                <label for="Date" style="color: white;font-size:2.5vh"> Enter Check-in Date: </label><br><br>
                <input id="date1" type="date" class="custom-date-input" name="checkin_date"
                    min="<?php echo date('Y-m-d'); ?>" max="2025-12-31" required><br><br>
                <label for="Date" style="color: white;font-size:2.5vh"> Enter Check-out Date: </label><br><br>
                <input id="date2" type="date" class="custom-date-input" name="checkout_date"
                    min="<?php echo date('Y-m-d'); ?>" max="2025-12-31" required><br><br>


                <input id="button" class="buttonlogin" type="submit" value="Save and choose rooms"><br><br>
                <button id="cancelButton" type="button" onclick="showConfirmation()" class="buttonlogin">Cancel<button><br>

            </form>

        </div>
    </div>
    <script>
        function validateEmail(email) {
            const emailRegex = /^[^\s@]+@[^\s\d@]+\.[^\s\d@]+$/;
            return emailRegex.test(email);
        }
        document.getElementById('button').addEventListener('click', function (event) {
            
            const emailInput = document.getElementById('email');
            const email = emailInput.value;

            if (!validateEmail(email)) {
                alert('Please enter a valid Email');
                event.preventDefault();
            }
        });
        function validateName(name) {
            const nameRegex = /^[a-zA-Z-' ]*$/;
            return nameRegex.test(name);
        }
        document.getElementById('button').addEventListener('click', function (event) {
            
            const nameInput = document.getElementById('fname');
            const name = nameInput.value;

            if (!validateName(name)) {
                alert('Only letters and white space allowed in Name');
                event.preventDefault();
            }
        });
    </script>

</body>

</html>