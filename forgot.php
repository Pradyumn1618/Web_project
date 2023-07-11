<?
include("functions.php");
include("connection.php");
if (isset($_POST['submit'])) {
    $email = $_POST['email'];


    $token = generateRandomToken(); 
    $query="update users(token) values('$token') where Email='$email'";
    $result=mysqli_query($con,$query);
    $resetLink = "http://localhost/Web_project/reset.php?token=" . $token;
    $message = "Click the following link to reset your password: " . $resetLink;
    $subject = "Password Reset";
    $headers = "From: pradyumnkangule@gmail.com";
    mail($email, $subject, $message, $headers); 

    echo '<div class="alert alert-info alert-dismissible fade show" roll="alert">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <strong> Reset link has been sent to your email!</strong>
  </div>';
}


