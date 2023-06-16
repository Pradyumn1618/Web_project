<?php
session_start();
include("connection.php");
$email=$_SESSION['Email'];
$query = "select * from Users where Email='$email' limit 1";
$result=mysqli_query($con,$query);
$row=mysqli_fetch_assoc($result);
echo '<div style="text-align:center; display:flex;align-items:center;justify-content:center;flex-direction:column;">';
echo '<h1 style="font-size:8vh;">My Profile</h1><br><br>';
echo '<table>';
echo '<tr style="font-size:3vh;"><th>Name: </th><td>' . $row['Name'] . '</td><br></tr>';
echo '<tr style="font-size:3vh;"><th>Email: </th><td>' . $row['Email'] . '</td></tr>';
echo '</div>';
?>
<style>
    
th,td{
    padding:10px;
}