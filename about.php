<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>P DIgital</title>
    <link rel="stylesheet" href="/CSS/about.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
<nav>
    <div class="menu">
        <div class="logo">
            <img src="/Images/logo.png" alt="Jessica Jones Photography Logo">
        </div>
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="service.php">Services</a></li>
            <li><a href="contact.php">Contact Us</a></li>
        </ul>
        <div class="Login">
          <ul>
          <?php
               session_start(); // Start the session

               // Check if the user is logged in
               if (isset($_SESSION['username'])):
                  $username = htmlspecialchars($_SESSION['username']);
               ?>
                  <li><a href="#"><i class="fa-solid fa-user"></i> Hello, <?php echo $username; ?></a></li>
                  <li><a href="logout.php"><i class="fa-solid fa-sign-out-alt"></i> Logout</a></li>
               <?php else: ?>
                  <li><a href="login.php"><i class="fa-solid fa-user"></i> Login</a></li>
               <?php endif; ?>
          </ul>
        </div>
    </div>
</nav>

<div class="about-section">
        <h2>About Us</h2>
        <h1>A Dedicated Team of Photographers, Capturing Precious Moments with Every Click</h1>
        <p class="about-description">
            With our expertise and artistic vision, we are committed to presenting a unique story every time our shutter closes. We believe that beauty lies in the small details.
        </p>

        <div class="photographer-gallery">
            <div class="photographer"><img src="/Images/photograph1.jpeg" alt="Photographer 1"></div>
            <div class="photographer"><img src="/Images/photograph2.jpeg" alt="Photographer 2"></div>
            <div class="photographer"><img src="/Images/photograph3.jpeg" alt="Photographer 3"></div>
            <div class="photographer"><img src="/Images/photograph4.jpeg" alt="Photographer 4"></div>
            <div class="photographer"><img src="/Images/photograph5.jpeg" alt="Photographer 5"></div>
        </div>

        <div class="why-choose-us">
            <h2>Why Choose Us</h2>
            <p>We create visual stories that provide unique experiences. With our dedication to exploring the beauty in every moment, we offer more than just images—we capture the emotion, intimacy, and uniqueness that makes every moment worthwhile.</p>
        </div>

        <div class="features">
            <div class="feature">
                <h3>Complete Service</h3>
                <p>Get your preferred photographer for every occasion</p>
            </div>
            <div class="feature">
                <h3>Unlimited Editing</h3>
                <p>Awesome editing to get the best photo possible</p>
            </div>
            <div class="feature">
                <h3>Fixed Rate</h3>
                <p>Easily book your photographer with a fixed hourly rate</p>
            </div>
        </div>
    </div>



        <div class="about-footer">
            <h3>Ready to Document Your Story?</h3>
            <p>Let's capture the moments that matter most to you.</p>
            <a href="contact.php" class="cta-button">Get in Touch</a>
        </div>
    


<footer>
    <p>Copyright © 2024 P Digital. All Rights Reserved || Designed by: Ved Wadekar</p>
</footer>
</body>
</html>
