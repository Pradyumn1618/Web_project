<?
include("functions.php");
include("connection.php");
if (isset($_POST['reset'])) {
    $password = $_POST['password'];
    $token = $_GET['token'];
    
        $query="select Email from users where token='$token'";
        $result=mysqli_query($con,$query);
        if(!$result){
            
        }
        if ($email) {
            updatePasswordInDatabase($email, $password); 
            echo "Password has been reset successfully.";
        } else {
            echo "Invalid token.";
        }
    } else {
        echo "Invalid password.";
    }
