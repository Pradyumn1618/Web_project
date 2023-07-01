<?php
session_start();
include("connection.php");
if (isset($_POST['cancel_booking'])) {
    $bookingId = $_POST['booking_id'];
    $user = $_SESSION['Email'];

    // Check if the booking belongs to the logged-in user
    $checkBookingQuery = "SELECT * FROM Booking WHERE ID = '$bookingId' AND user = '$user'";
    $checkBookingResult = mysqli_query($con, $checkBookingQuery);

    if ($checkBookingResult && mysqli_num_rows($checkBookingResult) > 0) {
        // Booking exists and belongs to the user, delete the booking
        $cancelBookingQuery = "DELETE FROM Booking WHERE ID = '$bookingId'";
        $cancelBookingResult = mysqli_query($con, $cancelBookingQuery);

        if ($cancelBookingResult) {
            // Booking canceled successfully
            echo '<div class="alert alert-info alert-dismissible fade show" roll="alert">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <strong> Booking Cancelled Successfully! </strong>
  </div>';
            echo "<script>setTimeout(function(){location.reload();}, 2000);</script>";
            // header("Location: bookings.php"); // Redirect to bookings page or any other desired location
        } else {
            // Failed to cancel booking
            echo '<div class="alert alert-danger alert-dismissible fade show" roll="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong> Failed to Cancel Booking! Please try again later... </strong>
          </div>';
        }
    } 
    unset($_POST['cancel_booking']);
}
$current_date=date('Y-m-d');
$email=$_SESSION['Email'];
$query = "select * from Booking where user='$email' and `checkin date`>=CURDATE()";
$result=mysqli_query($con,$query);
$s=1;
if(mysqli_num_rows($result)>0){
    
    echo '<div class="top1" style="text-align:center; display:flex;align-items:center;justify-content:center;flex-direction:column; padding: 6vh 0" data-aos="fade-left">';
echo '<h1 style="font-size:6vh;color: white">My Current Bookings</h1>';
echo '<table>';
echo '<tr style="font-size:3vh;border: 2px outset"><th style="border: 2px outset">Sr. No.</th><th style="border: 2px outset">Booking ID</th><th style="border: 2px outset">Booking Name</th><th style="border: 2px outset">Check-in Date</th><th>Check-out Date</th><th style="border: 2px outset">Cancellation</th><br></tr>';

while(($row=mysqli_fetch_assoc($result))>0){
echo '<tr style="font-size:3vh;"><td style="border: 2px outset">'.$s.' </td><td style="border: 2px outset">' . $row['ID'] . '</td><td style="border: 2px outset">' . $row['Name'] . '</td><td style="border: 2px outset">' . $row['checkin date'] . '</td><td style="border: 2px outset">' . $row['checkout date'] . '</td><td style="border: 2px outset"> <form method="post" action="">
<input type="hidden" name="booking_id" value="' . $row['ID'] . '">
<button type="submit" class="cancel" name="cancel_booking" onclick="showConfirmation()">Cancel Booking</button>
</form></td></tr>';
$s=$s+1;
}
echo '</table>';
echo '</div>';
}
else{
    echo '<div class="top1" style="text-align:center; display:flex;align-items:center;justify-content:center;flex-direction:column;padding: 5vh 0">';
echo '<h1 style="font-size:6vh;color: whitesmoke">My Current Bookings</h1>';
echo '<p style="font-size:3vh;">NO ACTIVE BOOKING FOUND</p>';
echo '<a class="book1" href="booking.php" target="_blank">BOOK HERE!</a>';
echo '</div><br><br>';
}
$query = "select * from Booking where user='$email' and `checkin date`<CURDATE()";
$result=mysqli_query($con,$query);
$s=1;
if(mysqli_num_rows($result)>0){
    echo '<div class="p1" data-aos="fade-right">';
echo '<h1 style="font-size:6vh;color: white;">My Past Bookings</h1>';
echo '<table>';
echo '<tr style="font-size:3vh;border: 2px outset"><th style="border: 2px outset">Sr. No.</th><th style="border: 2px outset">Booking ID</th><th style="border: 2px outset">Booking Name</th><th style="border: 2px outset">Check-in Date</th><th style="border: 2px outset">Check-out Date</th><br></tr>';

while(($row=mysqli_fetch_assoc($result))>0){
echo '<tr style="font-size:3vh;border: 2px outset"><td style="border: 2px outset">'.$s.' </td><td style="border: 2px outset">' . $row['ID'] . '</td><td>' . $row['Name'] . '</td><td style="border: 2px outset">' . $row['checkin date'] . '</td><td style="border: 2px outset">' . $row['checkout date'] . '</td></tr>';
$s=$s+1;
}
echo '</table>';
echo '</div>';
}
else{
    echo '<div style="text-align:center; display:flex;align-items:center;justify-content:center;flex-direction:column;">';
echo '<h1 style="font-size:6vh;">My Past Bookings</h1>';
echo '<p style="font-size:3vh;">NO BOOKING FOUND</p>';

echo '</div><br><br><br>';

}
echo '<div style="display:flex;justify-content:center;background-image: linear-gradient(to right, red 0%, orange 50%, yellow 100%)"><a href="index.php">Back to Home</a></div>';
echo ' <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script>

function showConfirmation() {
    var result = confirm("Are you sure you want to cancel the booking?");
    if (!result) {
        event.preventDefault();
    }
}
    AOS.init({
        duration: 800
    });
</script>';

?>
<style>
    .top1{
        margin-top:3vh;
        background-image: linear-gradient(to right, red 0%, orange 50%, yellow 100%);
    }
    a{
        text-decoration:none;
        background-color: skyblue;
        border: 1px white solid;
        padding:3px 4px;
        color:black;
    }
    th,td{
        padding:8px;
    }
    div{
        display:flex;
        justify-content: center;
        align-items: center;
    }
    .cancel{
        background-color: aquamarine;
        padding: 10px 10px;
       border-radius: 1px;
    }
    @media screen and (max-width:700px){
        table{
            overflow: scroll;
        }
        tr,td,th{
            font-size: 1.5vh;
        }
    }
    @media screen and (max-device-width:700px){
        table{
            overflow: scroll;
        }
        tr,td,th{
            font-size: 1.5vh;
        }
    }
    .p1{
        
        background-image: linear-gradient(to right, red 0%, orange 50%, yellow 100%);
        text-align:center; display:flex;align-items:center;justify-content:center;flex-direction:column;
    }

    </style>
<!DOCTYPE html>

<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
    <link rel="stylesheet" href="style.css">
    
    
    <script src="script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
   

</head>


