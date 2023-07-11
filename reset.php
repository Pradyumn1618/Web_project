<?php
// session_start();
include("functions.php");
include("connection.php");
// $logged = check_login($con);
// //echo $logged ? 'true' : 'false';
// if (!$logged){
//     header("Location:login.php");
// }
$email;
if (isset($_POST['reset'])) {
    
    if($_POST['Password']=$_POST['Password1']){
        $password = $_POST['Password'];
    $token = $_GET['token'];
        $query="select Email from users where token='$token'";
        $result=mysqli_query($con,$query);
//         if(!$result){
//             echo '<div class="alert alert-danger alert-dismissible fade show" roll="alert">
//     <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
//     <strong> Reset unsuccessful</strong>
//   </div>';
//         }
        // else{
            $row=mysqli_fetch_assoc($result);
            global $email;
            $email=$row['Email'];
        // }
        if ($email) {
            $query="update users set Password='$password' token=NULL;";
            $result=mysqli_query($con,$query);
                if(!$result){
                    echo '<div class="alert alert-danger alert-dismissible fade show" roll="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong> Reset unsuccessful</strong>
          </div>';
            }
            else{
                echo '<div class="alert alert-success alert-dismissible fade show" roll="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong> Password has been reset successfully!</strong>
          </div>';
        //   echo "<script>setTimeout(function(){window.location='login.php';}, 2000);</script>";
            }
        }} else {
            echo '<div class="alert alert-danger alert-dismissible fade show" roll="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong>Confirm password does not match with password!</strong>
          </div>';
        }
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
            <form method="post">
                <div style="font-size:40px;font-family:Century Gothic;text-align:center;color: white">Reset Password</div>
                <br><br>
                <label for="Password"> New Password: </label>
                <input id="password" type="text" name="Password1" placeholder="Password.." required><br><br>
                <label for="Password"> Confirm Password: </label>
                <input id="password" type="password" name="Password" placeholder="Confirm Password.." required><br><br>
                <input id="button" class="buttonlogin" type="submit" name="reset" value="Reset Password"><br>
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
        function validateName(name) {
            const nameRegex = /^[a-zA-Z-' ]*$/;
            return nameRegex.test(name);
        }
        document.getElementById('button').addEventListener('click', function (event) {
            
            const nameInput = document.getElementById('fname');
            const name = nameInput.value;

            if (!validateName(name)) {
                alert('Only letters and white space allowed in Name');
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
