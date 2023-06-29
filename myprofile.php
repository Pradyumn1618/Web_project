<?php
session_start();
include("connection.php");
$email=$_SESSION['Email'];
$query = "select * from Users where Email='$email' limit 1";
$result=mysqli_query($con,$query);
$row=mysqli_fetch_assoc($result);
echo '<div class="myprof">';
echo '<div class="myprof2">';
echo '<h1 style="font-size:8vh;padding-right: 2vh;border-right: 12px solid red">My Profile</h1><br><br>';
echo '<table style="padding: 1vh">';
echo '<tr style="font-size:3vh;color: whitesmoke;font-weight: 400"><th>Name: </th><td>' . $row['Name'] . '</td><br></tr>';
echo '<tr style="font-size:3vh;color: whitesmoke;font-weight: 400"><th>Email: </th><td>' . $row['Email'] . '</td></tr>';
echo '</div></div>';
?>
<style>
    
th,td{
    padding:10px;
}

.myprof{
    display: flex;
    flex-direction: column;
    justify-content: center;
    width: 100%;
    height: 100%;
    background-image: url(myprof.png);
    background-size: cover;
    box-sizing: border-box;
}

.myprof2{
    display: flex;
    flex-direction: row;
    justify-content: center;
    width: 100%;
    box-sizing: border-box;
    border: 2px inset red;

    /* padding-top: 40%; */
}