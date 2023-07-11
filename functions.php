<?php
$logged_in=false;
global $book_now;
$book_now=false;
function check_login($con) {
    if(isset($_SESSION['Email'])) {
        $email = $_SESSION['Email'];
        $query = "SELECT * FROM Users WHERE Email='$email' LIMIT 1";
        $result = mysqli_query($con, $query);
        
        if($result && mysqli_num_rows($result) > 0) {
            //$user_data = mysqli_fetch_assoc($result);
            return true;
        }
    }
    
    return false; // User not logged in
}
function generateRandomToken(){
    return rand(100000,999999);
}
?>

