<?php
session_start();
include("connection.php");
include("functions.php");
// include("index.php");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if(isset($_SESSION['login_error'])){
    echo '<div class="alert alert-danger alert-dismissible fade show" roll="alert">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <strong> Incorrect Password! </strong>
  </div>';
  unset($_SESSION['login_error']);
}
if (isset($_POST['cancel'])) {
    header("Location:index.php");
}

if (isset($_POST['login_btn'])) {
    $email = $_POST['Email'];
    $password = $_POST['Password'];
    if (!empty($password) && !empty($email)) {
        $query = "select * from Users where Email='$email' limit 1";
        $result = mysqli_query($con, $query);


        if ($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);
            if ($user_data['Password'] === $password) {
                $_SESSION['Email'] = $user_data['Email'];
                global $book_now;
                if ($book_now) {
                    ob_start();
                    header("Location: booking.php");
                    ob_end_flush();
                } else {
                    $_SESSION['login_success'] = true;
                    header("Location: index.php");
                   
                    header("Location: index.php");
                }

                exit();
            } else {
                $_SESSION['login_error'] = true;
                
              header("Location:login.php");
                // echo "<script>alert('Incorrect password!!')</script>";

            }
        } else {
            echo ("<script>alert('User not found')</script>");
            // header("Location: signup.php");
            die;
        }

    } else {
        echo "Please enter all details!";

    }
}


?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
    <style>
        .alert-dismissible .fade-out {
            animation: fadeOut 2s ease-in-out forwards;
        }

        @keyframes fadeOut {
            0% {
                opacity: 1;
            }
            100% {
                opacity: 0;
            }
        }
    </style>
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
                <input id="text" type="text" name="Password" placeholder="Password.." required><br><br>

                <input id="button" type="submit" value="LOGIN" name="login_btn" class="buttonlogin">

                <br>


                <!-- <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="cancel()">
                        Cancel
                    </button>
                </div> -->
                <button onclick="cancel()" type="button" class="buttonlogin" data-dismiss="modal">Cancel</button>



                <a href="signup.php" style="color:blue;font-size:2vh">New user?Register here!</a><br><br>
            </form>


        </div>
    </div>
    <script src="script.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>




</body>

</html>