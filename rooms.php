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

<body id="rooms_header">

    <!-- <div class="body"> -->
    <div class="header" id="navigation"><!--  > -->
        <div class="logo">

        </div>
        <div class="menu">
            <ul class="navigation">
                <li><a id="home" href="index.php" style="color: aquamarine">HOME</a></li>
                <li><a id="about" href="about.php" style="color: aquamarine">ABOUT</a></li>
                <li><a id="rooms" href="rooms.php" style="color: aquamarine">ROOMS</a></li>
                <li><a id="reviews" href="reviews.php" style="color: aquamarine">REVIEWS</a></li>
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
    <div class="top" data-aos="fade-up">
        ROOMS
    </div>
    <script src="script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>AOS.init({ duration: 800 });</script>
</body>