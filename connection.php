<?php
$con=mysqli_connect("localhost","root","","logins");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}