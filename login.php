<?php
session_start();
include("connection.php");
include("functions.php");
// include("index.php");
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

if (isset($_SESSION['login_error'])) {
    echo '<div class="alert alert-danger alert-dismissible fade show" roll="alert">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <strong> Incorrect Password! </strong>
  </div>';
    unset($_SESSION['login_error']);
}
if (isset($_POST['cancel'])) {
    header("Location:index.php");
}
if (isset($_SESSION['user_not_found'])) {
    echo '<div class="alert alert-danger alert-dismissible fade show" roll="alert">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <strong> User not found! </strong>
  </div>';
    unset($_SESSION['user_not_found']);
}


if (isset($_POST['login_btn'])) {
    $email = mysqli_real_escape_string($con,$_POST['Email']);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo '<div class="alert alert-danger alert-dismissible fade show" roll="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Invalid email address</strong>
      </div>';
    }
    
    $password = $_POST['Password'];
    if (!empty($password) && !empty($email)) {
        $query = "select * from Users where Email='$email' limit 1";
        $result = mysqli_query($con, $query);


        if ($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);
            if ($user_data['Password'] === $password) {
                $_SESSION['Email'] = $user_data['Email'];
                $_SESSION['login_success'] = true;
                header("Location:index.php");
                die;
            } else {
                $_SESSION['login_error'] = true;

                header("Location:login.php");
            }
        } else {
            $_SESSION['user_not_found'] = true;
            header("Location:login.php");
            // echo ("<script>alert('User not found')</script>");
            die;
        }

    } else {
        echo "Please enter all details!";

    }
}
echo
    "<script>
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
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById('password');
            var togglePassword = document.getElementById('togglePassword');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                document.getElementById('togglePassword').innerHTML = "HIDE";
            } else {
                passwordInput.type = 'password';
                document.getElementById('togglePassword').innerHTML = "SHOW";

            }
        }
        function cancel() {
            
                window.location.href = "index.php";
        }
    </script>

</head>

<body>
    <div class="sign">
        <div class="box">
            <form method="post" action="login.php">
                <div style="font-size:6.5vh;color:white;font-family:Century Gothic;text-align:center">Login</div>
                <br><br>
                <label for="Email" style="color: white;font-size:2.5vh"> Enter Email: </label>
                <input id="text" type="text" name="Email" placeholder="Your email.." required><br><br>
                <label for="Password" style="color: white;font-size:2.5vh"> Enter Password: </label>
                <input id="password" type="password" name="Password" placeholder="Password.." autocomplete="off"required><br><br>
                <span id="togglePassword" class="toggle-password" onclick="togglePasswordVisibility()">SHOW</span>

                <input id="button" type="submit" value="LOGIN" name="login_btn" class="buttonlogin">

                <br>
                <button onclick="cancel()" type="button" id="cancelAlert" class="buttonlogin" data-dismiss="modal">Cancel</button>


                <a href="forgot.php" style="color:blue;font-size:2vh">Forgot Password</a><br>
                <a href="signup.php" style="color:blue;font-size:2vh">New user?Register here!</a><br><br>
            </form>


        </div>
    </div>
    <script src="script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>




</body>

</html>