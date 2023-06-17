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
            echo "<script>location.reload();</script>";
            // header("Location: bookings.php"); // Redirect to bookings page or any other desired location
        } else {
            // Failed to cancel booking
            echo '<div class="alert alert-danger alert-dismissible fade show" roll="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong> Failed to Cancel Booking! Please try again later... </strong>
          </div>';
        }
    } 
}
$current_date=date('Y-m-d');
$email=$_SESSION['Email'];
$query = "select * from Booking where user='$email' and `checkin date`>=CURDATE()";
$result=mysqli_query($con,$query);
$s=1;
if(mysqli_num_rows($result)>0){
    
    echo '<div style="text-align:center; display:flex;align-items:center;justify-content:center;flex-direction:column;" data-aos="fade-up">';
echo '<h1 style="font-size:6vh;">My Current Bookings</h1>';
echo '<table>';
echo '<tr style="font-size:3vh;"><th>Sr. No.</th><th>Booking ID</th><th>Booking Name</th><th>Check-in Date</th><th>Check-out Date</th><br></tr>';

while(($row=mysqli_fetch_assoc($result))>0){
echo '<tr style="font-size:3vh;"><td>'.$s.' </td><td>' . $row['ID'] . '</td><td>' . $row['Name'] . '</td><td>' . $row['checkin date'] . '</td><td>' . $row['checkout date'] . '</td><td> <form method="post" action="">
<input type="hidden" name="booking_id" value="' . $row['ID'] . '">
<button type="submit" name="cancel_booking">Cancel Booking</button>
</form></td></tr>';
$s=$s+1;
}
echo '</table>';
echo '</div><br><br>';
}
else{
    echo '<div style="text-align:center; display:flex;align-items:center;justify-content:center;flex-direction:column;">';
echo '<h1 style="font-size:6vh;">My Current Bookings</h1>';
echo '<p style="font-size:3vh;">NO ACTIVE BOOKING FOUND</p>';
echo '<a class="book" href="booking.php" target="_blank">BOOK HERE!</a>';
echo '</div><br><br>';
}
$query = "select * from Booking where user='$email' and `checkin date`<CURDATE()";
$result=mysqli_query($con,$query);
$s=1;
if(mysqli_num_rows($result)>0){
    
    echo '<div style="text-align:center; display:flex;align-items:center;justify-content:center;flex-direction:column;" data-aos="fade-up">';
echo '<h1 style="font-size:6vh;">My Past Bookings</h1>';
echo '<table>';
echo '<tr style="font-size:3vh;"><th>Sr. No.</th><th>Booking ID</th><th>Booking Name</th><th>Check-in Date</th><th>Check-out Date</th><br></tr>';

while(($row=mysqli_fetch_assoc($result))>0){
echo '<tr style="font-size:3vh;"><td>'.$s.' </td><td>' . $row['ID'] . '</td><td>' . $row['Name'] . '</td><td>' . $row['checkin date'] . '</td><td>' . $row['checkout date'] . '</td></tr>';
$s=$s+1;
}
echo '</table>';
echo '</div><br><br><br>';
}
else{
    echo '<div style="text-align:center; display:flex;align-items:center;justify-content:center;flex-direction:column;">';
echo '<h1 style="font-size:6vh;">My Past Bookings</h1>';
echo '<p style="font-size:3vh;">NO BOOKING FOUND</p>';
echo '<a class="book" href="booking.php">BOOK HERE!</a>';
echo '</div><br><br><br>';

}
echo '<div style="display:flex;justify-content:center;"><a href="index.php">Back to Home</a></div>';
echo ' <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    AOS.init({
        duration: 800
    });
</script>';

?>
<style>
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
    </style>



