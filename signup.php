<?php
session_start();
include("connection.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['Name'];
    $email = $_POST['Email'];
    $password = $_POST['Password'];
    $query = "select * from Users where Email='$email' limit 1";
    $result = mysqli_query($con, $query);
    if ($result && mysqli_num_rows($result) > 0) {
        echo "<script>alert('Account already exits')</script>";
    } else {
        if (!empty($name) && !empty($password) && !empty($email)) {
            $query = "insert into Users(Name,Email,Password) values('$name','$email','$password')";
            mysqli_query($con, $query);
            echo ("<script>alert('Please login into your account')</script>");
            header("Location: login.php");
        } else {
            echo "Please enter all details!";
        }

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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
</head>

<body>
    <div class="sign">
        <img src="signup.webp" alt="" class="bg-img">
        <div class="box">
            <form method="post">
                <div style="font-size:40px;font-family:Century Gothic;text-align:center;color: white">Sign Up</div>
                <br><br>
                <label for="fname" style="color: white"> Enter Name: </label>
                <input id="fname" type="text" name="Name" placeholder="Your full name..." required><br><br>
                <label for="Email"> Enter email: </label>
                <input id="email" type="email" name="Email" placeholder="Your email.." required><br><br>
                <label for="Password"> Create Password: </label>
                <input id="password" type="text" name="Password" placeholder="Password.." required><br><br>

                <input id="button" class="buttonlogin" type="submit" value="SIGN UP"><br>
                <a href="index.php" class="buttonlogin" style="width:auto">Cancel</a><br>
                <a href="login.php" style="color:blue;">Already an user?Click to login</a><br><br>
            </form>
        </div>
    </div>
    <script>
        function validateEmail(email) {
            const emailRegex = /^[^\s@]+@[^\s\d@]+\.[^\s\d@]+$/;
            return emailRegex.test(email);
        }
        document.getElementById('button').addEventListener('click', function (event) {
            //event.preventDefault(); // Prevent form submission

            const emailInput = document.getElementById('email');
            const email = emailInput.value;

            if (!validateEmail(email)) {
                alert('Invalid email');
                event.preventDefault();
            }
        });
    </script>
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>AOS.init({ duration: 800 });</script>
</body>

</html>