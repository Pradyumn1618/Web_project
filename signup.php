<?php
session_start();
include("connection.php");
include("functions.php");
 
// unset($_SESSION['user_exists']);
if(isset($_SESSION['user_exists'])){
    echo '<div class="alert alert-info alert-dismissible fade show" roll="alert">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <strong> User already exists! </strong>
  </div>';
//   echo "<script>setTimeout(function(){location.reload();}, 2000);</script>";
  unset($_SESSION['user_exists']);
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = mysqli_real_escape_string($con,$_POST['Name']);
    $email = mysqli_real_escape_string($con,$_POST['Email']);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email address");
    }
    
    $password = $_POST['Password'];
    
    $query = "select * from Users where Email='$email' limit 1";
    $result = mysqli_query($con, $query);
    if ($result && mysqli_num_rows($result) > 0) {
        $_SESSION['user_exists']=true;
        header("Location:signup.php");
        // echo "<script>alert('Account already exits')</script>";
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
    <div class="sign">
        
        <!-- <img src="signup.webp" alt="" class="bg-img"> -->
        <div class="box">
            <form method="post" action="signup.php">
                <div style="font-size:40px;font-family:Century Gothic;text-align:center;color: white">Sign Up</div>
                <br><br>
                <label for="fname" style="color: white"> Enter Name: </label>
                <input id="fname" type="text" name="Name" placeholder="Your full name..." required><br><br>
                <label for="Email"> Enter email: </label>
                <input id="email" type="email" name="Email" placeholder="Your email.." required><br><br>
                <label for="Password"> Create Password: </label>
                <input id="password" type="text" name="Password" placeholder="Password.." required><br><br>

                <input id="button" class="buttonlogin" type="submit" value="SIGN UP"><br>
                <button onclick="cancel()" type="button" id="cancelAlert" class="buttonlogin" data-dismiss="modal">Cancel</button>                
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