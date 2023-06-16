<?php
session_start();
include("connection.php");
include("functions.php");

$logged_in = check_login($con);
if (isset($_POST['logout_btn'])) {
    // Destroy the session
    session_destroy();
    header("Location:index.php");
} elseif (isset($_POST['login_btn'])) {
    header("Location:login.php");
} elseif (isset($_POST['register_btn'])) {
    header("Location:signup.php");

}
if (isset($_POST['book_now'])) {
    global $book_now;
    $book_now = true;
    header("Location:booking.php");
}


//$user_data=check_login($con);
?>
<!DOCTYPE html>

<head>
     <script>
        window.onload = function() {
      // Scroll the page to the top
      window.scrollTo(0, 0);
    };
        </script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
    <link rel="stylesheet" href="style.css">

</head>

<body>

    <div class="header" data-aos="zoom-out">
        <div class="logo">

        </div>
        <div class="menu">
            <ul class="navigation">
                <li><a id="home" href="index.php">HOME</a></li>
                <li><a id="about" href="about.php">ABOUT</a></li>
                <li><a id="rooms" href="rooms.php">ROOMS</a></li>
                <li><a id="reviews" href="reviews.php">REVIEWS</a></li>
                <li><a id="contact" href="contact.php">CONTACT</a></li>
                <!--<li><i class="fa fa-search"></i></li>-->
                <li>
                    <form method="post"><input class="book" type="submit" name="book_now"
                            value="Book Now"><!--<a href="booking.php" target="_blank" id="book" name="book_now">BOOK NOW</a>-->
                    </form>
                </li>


                <?php if ($logged_in): ?>
                    <!-- Logout button -->
                    <li>

                        <div class="dropdown">

                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
                                My Account
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="myprofile.php">My Profile</a></li>
                                <li> <a class="dropdown-item" href="mybookings.php">My Bookings</a></li>
                                <li>
                                    <form method="post">
                                        <input class="book" id="logout" type="submit" name="logout_btn" value="Logout">
                                    </form>
                                </li>
                        </div>



                    </li>
                <?php else: ?>
                    <li>
                        <form method="post">
                            <input class="book" type="submit" name="login_btn" value="Login">
                            <!-- <li> <form method="post"> -->
                            <!-- <input class="book" type="submit" name="register_btn" value="Register"> -->
                        </form>
                    </li>
                <?php endif; ?>


            </ul>
        </div>
    </div>

    <div class="main" data-aos="fade-up">

        <div class="para">
            <div class="hotel">
                <h1 style="color:white;" id="hotel">EKA NAIROBI</h1>
            </div>
            <div class="content">
                <p>
                    Eka is a contemporary 4-star hotel in Nairobi, conveniently located at the intersection of Mombasa
                    Road and Southern By-pass, 5 minutes from JKIA through the express highway with close proximity to
                    the Nairobi national park, major government and corporate organizations.

                    Eka Hotel Nairobi features 167 well-appointed rooms, five meeting & conference rooms, restaurant &
                    bar, gym, swimming pool, gift shop, wellness center among other top facilities offering the best
                    choice venue for your business and leisure stay.
                </p>
            </div>
        </div>
    </div>
    <!-- <div class="intro" data-aos="fade-up">
        <div class="hanuma">
            <div class="room">
                <h1
                    style=" color: purple;font-family: 'Times New Roman', Times, serif;background-color: orange;border-left: 3px solid blueviolet;border-top: 3px solid blueviolet;border-bottom: 3px solid blueviolet;font-size: 4vh;padding-left:1vh">
                    ROOMS </h1>
            </div>
            <div class="room-content">
                <p>Eka Hotel rooms are designed to provide the highest levels of Comfort, Convenience and Eﬃciency. The
                    hotel has 167 air-conditioned rooms, of these 158 are Superior rooms, 2 rooms for guests with
                    special needs, 3 triple rooms, 1 Junior Suite and 3 Executive Suites. Guests staying in the Hotel
                    have exclusive access to the gym and swimming pool.
                </p>
                <button class="room-btn"><a href="rooms.php">Get more details</a></button>
            </div>
        </div>
    </div> -->

    <script src="script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>


    <script>AOS.init({ duration: 800 });</script>

</body>