<?php
include("functions.php");
include("connection.php");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = $_POST['Email'];

    echo '<script>console.log("hii");</script>';
    $token = generateRandomToken(); 
    $query="update Users set token='$token' where Email='$email'";
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
  unset($_POST['submit']);
}
echo "<script>
const element=document.querySelector('.alert');
function removeElement(){
  element.remove();
}
setTimeout(removeElement,2000);
</script>";
echo ' <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    AOS.init({
        duration: 800
    });
</script>';
?>
<!DOCTYPE html>
<html>

<head>
   
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
    <link rel="stylesheet" href="style.css">
    <script>
        function cancel() {
            
            window.location.href = "index.php";
    }
    </script>
</head>

<body>
    <div class="sign1">
        
         
        <div class="box">
            <form method="post" action="forgot.php">
                <div style="font-size:40px;font-family:Century Gothic;text-align:center;color: white">Forgot Password</div>
                <br><br>
                <label for="Email"> Enter email: </label>
                <input id="email" type="email" name="Email" placeholder="Your email.." required><br><br>
                <input id="button" class="buttonlogin" type="submit" value="Send Reset Link"><br>
                <button onclick="cancel()" type="button" id="cancelAlert" class="buttonlogin" data-dismiss="modal">Cancel</button>                
                
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
        
    </script>
    <script src="script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>

