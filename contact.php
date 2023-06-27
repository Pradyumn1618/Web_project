<!DOCTYPE html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
    <script>
        window.onload = function () {
            setTimeout(function () {
                window.scrollTo(0, 0); // Scrolls the page to the top
            }, 80); // Scrolls the page to the top
        };
    </script>
</head>
  

<body id="contacts_header">

<div class="header" id="navigation">
    <div class="logo">

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
        </ul>
        <div class="dropdown" id="responsive">
            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
                <i class="fa fa-bars"></i>
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" id="home" href="index.php">HOME</a></li>
                <li><a class="dropdown-item" id="about" href="about.php">ABOUT</a></li>
                <li><a class="dropdown-item" id="rooms" href="rooms.php">ROOMS</a></li>
                <li><a class="dropdown-item" id="reviews" href="reviews.php">REVIEWS</a></li>
                <li><a class="dropdown-item" id="contact" href="contact.php">CONTACT</a></li>
                <!--<li><i class="fa fa-search"></i></li>-->
                <li>

                    <a href="booking.php" target="_blank" class="dropdown-item" name="book_now">BOOK NOW</a>

                </li>
            </ul>
        </div>
    </div>
</div>

<div class="c1" data-aos="fade-up">
    <p style="font-family:'Times New Roman', Times, serif;">CONTACTS</p>    
</div>



<div class="c2" data-aos="fade-right" >
    <div class="c3" data-aos="fade-right">
        <h1 style="text-align: center;"> Address </h1>
    </div>
    <div class="c4" data-aos="fade-right">
        <div class="c5">
            <address class="address">
                <br>
                <i class="fa fa-map-marker"></i>
                &nbsp;&nbsp; Plot No. XX,<br>
                &emsp;&ensp;  Mombasa Road,<br>
                &emsp;&ensp;  JKIA,<br>
                &emsp;&ensp;  Nairobi,Kenya.<br><br>
                <i class="fa fa-anchor"></i>&emsp; Pincode-44XXXXX.<br><br>
                <i class="fa fa-phone"></i>&emsp; Phone-7888XXXXXX
            </address>
        </div>
        <div class="c6">
            MAP
        </div>
    </div>
</div>
<div class="c2" data-aos="fade-left">
    <div class="c3" data-aos="fade-left">
        <h1 style="text-align: center;">Social Media</h1>
    </div>
    <div class="c4" data-aos="fade-left">
        <p>
            Follow us on Social Media...<br><br>
            
            <a href="https://www.facebook.com" id="links"><i class="fa fa-facebook" style="  display: flex;flex-direction: row;justify-content: center;width: 2vw;height: 2vw;border-radius: 2vw;background-color: blue;color: white;padding-top:0.5vw;font-size:large;"> </i>&emsp; facebook </a><br><br>
            
            <a href="https://www.google.com/" id="links"><i class="fa fa-google" style="display: flex;flex-direction: row;justify-content: center;width: 2vw;height: 2vw;border-radius: 2vw;background-color: white;padding-top:0.5vw;color:green;font-size:large;"></i>&emsp; Google </a><br><br>

            <a href="https://www.instagram.com/" id="links"><i class="fa fa-instagram" style="display: flex;flex-direction: row;justify-content: center;width: 2vw;height: 2vw;border-radius: 2vw;background-color: white;color: rgb(170, 51, 106);padding-top:0.5vw;font-size:large;"></i>&emsp; Instagram</a><br><br>

        </p>
    </div>
</div>

<script src="script.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>AOS.init({ duration: 800 });</script>
</body>