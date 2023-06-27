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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
    <link rel="stylesheet" href="style.css">
    <script>
        window.onload = function () {
            setTimeout(function () {
                window.scrollTo(0, 0); // Scrolls the page to the top
            }, 80); // Scrolls the page to the top
        };
        
    </script>

</head>

<body id="index_header" data-aos="zoom-out">
    <!-- <div class="pic">  -->
    <div class="header" id="navigation"><!--  > -->
        <div class="logo">
            <!-- <img src="logo.png"> -->
        </div>
        <div class="menu">
            <ul class="navigation">
                <li><a id="home" href="index.php" style="color: aquamarine">HOME</a></li>
                <li><a id="about" href="about.php" style="color: aquamarine">ABOUT</a></li>
                <li><a id="rooms" href="rooms.php" style="color: aquamarine">ROOMS</a></li>
                <!-- <li><a id="reviews" href="reviews.php" style="color: aquamarine">REVIEWS</a></li> -->
                <li><a id="contact" href="contact.php" style="color: aquamarine">CONTACT</a></li>
                <!--<li><i class="fa fa-search"></i></li>-->
                <li>
                    <a href="booking.php" target="_blank" class="book" id="book" name="book_now">BOOK NOW</a>
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
            <div class="dropdown" id="responsive">
                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
                    <i class="fa fa-bars"></i>
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" id="home" href="index.php">HOME</a></li>
                    <li><a class="dropdown-item" id="about" href="about.php">ABOUT</a></li>
                    <li><a class="dropdown-item" id="rooms" href="rooms.php">ROOMS</a></li>
                    <!-- <li><a class="dropdown-item" id="reviews" href="reviews.php">REVIEWS</a></li> -->
                    <li><a class="dropdown-item" id="contact" href="contact.php">CONTACT</a></li>
                    <!--<li><i class="fa fa-search"></i></li>-->
                    <li>

                        <a href="booking.php" target="_blank" class="dropdown-item" name="book_now">BOOK NOW</a>

                    </li>


                    <li class="dropdown">
                        
                            <?php if ($logged_in): ?>
                                <!-- Logout button -->


                                <!-- <div class="dropdown"> -->

                                    <a href="#" class="dropdown-item"><button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
                                        My Account
                                    </button></a>
                                    <ul class="dropdown-menu" class="dropdown-submenu">
                                        <li><a class="dropdown-item" href="myprofile.php">My Profile</a></li>
                                        <li> <a class="dropdown-item" href="mybookings.php">My Bookings</a></li>
                                        <li>
                                            <form method="post">
                                                <input class="book" id="logout" type="submit" name="logout_btn"
                                                    value="Logout">
                                            </form>
                                        </li>
                                    </ul>
                                <!-- </div> -->




                            <?php else: ?>

                                <form method="post">
                                    <input class="book" type="submit" name="login_btn" value="Login">
                                    
                                </form>

                            <?php endif; ?>
                        
                    </li>


                </ul>
            </div>
        </div>
    </div>
    <br><br><br><br><br><br><br><br><br><br>
    <div class="main2" data-aos="fade-up">

        <div class="para2">
            <div class="hotel2">
                <h1 style="color:white;" id="hotel2">EKA NAIROBI</h1>
            </div>
            <div class="content2">
                <p>
                    Eka is a contemporary 4-star hotel in Nairobi, conveniently located at the intersection of
                    Mombasa
                    Road and Southern By-pass, 5 minutes from JKIA through the express highway with close proximity
                    to
                    the Nairobi national park, major government and corporate organizations.

                    Eka Hotel Nairobi features 167 well-appointed rooms, five meeting & conference rooms, restaurant
                    &
                    bar, gym, swimming pool, gift shop, wellness center among other top facilities offering the best
                    choice venue for your business and leisure stay.
                </p>
            </div>
        </div>
    </div>
    <!-- </div>               -->

    <div class="main"><!--  > -->

        <div class="para" data-aos="fade-up">
            <div class="info" id="Index_About" data-aos="fade-right">

                <div class="content index_content_odd">
                    <div class="info_heading" id="Index_About_Heading">
                        <h1 style="color:whitesmoke;" id="hotel">About</h1>
                    </div>
                    <p>
                        Eka is a contemporary 4-star hotel in Nairobi, conveniently located at the intersection
                        of
                        Mombasa
                        Road and Southern By-pass, 5 minutes from JKIA through the express highway with close
                        proximity to
                        the Nairobi national park, major government and corporate organizations.
                    </p><br>
                    <p><a href="about.php" class="get_more">More..</a></p>
                </div>

                <div class="image_container" id="Index_About_Image">
                    <img class="image"
                        src="https://c4.wallpaperflare.com/wallpaper/850/698/458/lankanfushi-island-vacation-travel-gili-lankanfushi-wallpaper-preview.jpg">
                </div>
            </div>
            <div class="info" id="Index_Facilities" data-aos="fade-left">

                <div class="content index_content_even">
                    <div class="info_heading" id="Index_Facilities_Heading">
                        <h1 style="color:whitesmoke;" id="hotel">Facilities</h1>
                    </div>
                    <p>
                        Eka Hotel Nairobi features 167 well-appointed rooms, five meeting & conference rooms,
                        restaurant &
                        bar, gym, swimming pool, gift shop, wellness center among other top facilities offering
                        the
                        best
                        choice venue for your business and leisure stay.
                    </p>
                </div>
                <div class="image_container" id="Index_Facilities_Image">
                    <img class="image"
                        src="https://images.pexels.com/photos/258154/pexels-photo-258154.jpeg?auto=compress&cs=tinysrgb&w=1600">
                </div>
            </div>
            <div class="info" id="Index_Room" data-aos="fade-right">

                <div class="content index_content_odd">
                    <div class="info_heading" id="Index_About_Heading">
                        <h1 style="color:whitesmoke;" id="hotel">Rooms</h1>
                    </div>
                    <p>
                        Eka Hotel rooms are designed to provide the highest levels of Comfort, Convenience and
                        Eﬃciency. The
                        hotel has 167 air-conditioned rooms, of these 158 are Superior rooms, 2 rooms for guests
                        with
                        special needs, 3 triple rooms, 1 Junior Suite and 3 Executive Suites. Guests staying in
                        the
                        Hotel
                        have exclusive access to the gym and swimming pool.
                    </p>
                    <p><a href="rooms.php" class="get_more">More..</a></p>

                </div>

                <div class="image_container" id="Index_About_Image">
                    <img class="image"
                        src="https://images.pexels.com/photos/271624/pexels-photo-271624.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1">
                </div>
            </div>
            <div class="info" id="Index_Facilities" data-aos="fade-left">

                <div class="content index_content_even">
                    <div class="info_heading" id="Index_About_Heading">
                        <h1 style="color:whitesmoke;" id="hotel">Dining</h1>
                    </div>
                    <p>
                        Eka Hotel has stirred up the local culinary scene with two restaurants, two bars and a
                        24-hr
                        coffee shop that cater to the needs of our diverse clientele. Each dining experience
                        provides our guests with a taste of a broad selection of international and local
                        cuisine.
                    </p>

                </div>

                <div class="image_container" id="Index_Facilities_Image">
                    <img class="image"
                        src="https://images.pexels.com/photos/1267320/pexels-photo-1267320.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1">
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="intro" data-aos="fade-up">
        <div class="hanuma">
            <div class="room">
                <h1 style=" color: purple;font-family: 'Times New Roman', Times, serif;background-color: orange;border-left: 3px solid blueviolet;border-top: 3px solid blueviolet;border-bottom: 3px solid blueviolet;font-size: 4vh">
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
    <script>
        AOS.init({
            duration: 800
        });
    </script>

</body>