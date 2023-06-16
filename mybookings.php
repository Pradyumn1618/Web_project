<?php
session_start();
include("connection.php");
$current_date=date('Y-m-d');
$email=$_SESSION['Email'];
$query = "select * from Booking where user='$email' and `checkin date`>=CURDATE()";
$result=mysqli_query($con,$query);
$s=1;
if(mysqli_num_rows($result)>0){
    
    echo '<div style="text-align:center; display:flex;align-items:center;justify-content:center;flex-direction:column;">';
echo '<h1 style="font-size:6vh;">My Current Bookings</h1>';
echo '<table>';
echo '<tr style="font-size:3vh;"><th>Sr. No.</th><th>Booking ID</th><th>Booking Name</th><th>Check-in Date</th><th>Check-out Date</th><br></tr>';

while(($row=mysqli_fetch_assoc($result))>0){
echo '<tr style="font-size:3vh;"><td>'.$s.' </td><td>' . $row['ID'] . '</td><td>' . $row['Name'] . '</td><td>' . $row['checkin date'] . '</td><td>' . $row['checkout date'] . '</td><td><button onclick="cancelBooking(' . $row['ID'] . ')">Cancel Booking</button></td></tr>';
$s=$s+1;
}
echo '</table>';
echo '</div><br><br>';
}
else{
    echo '<div style="text-align:center; display:flex;align-items:center;justify-content:center;flex-direction:column;">';
echo '<h1 style="font-size:6vh;">My Current Bookings</h1>';
echo '<p style="font-size:3vh;">NO ACTIVE BOOKING FOUND</p>';
echo '<a class="book" href="booking.php">BOOK HERE!</a>';
echo '</div><br><br>';
}
$query = "select * from Booking where user='$email' and `checkin date`<CURDATE()";
$result=mysqli_query($con,$query);
$s=1;
if(mysqli_num_rows($result)>0){
    
    echo '<div style="text-align:center; display:flex;align-items:center;justify-content:center;flex-direction:column;">';
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



