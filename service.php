<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>P DIgital</title>
  <link rel="stylesheet" href="CSS\Ved\Ved\service.css">
  <link rel="icon" href="Images/logo.jpg" type="image">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</head>

<body>
  <div class="wrapper">
    <nav>
      <div class="menu">
        <div class="logo">
          <img src="/Images/logo.png">
        </div>
        <ul>
          <li><a href="home.php">Home</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="service.php">Services</a>
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
    <section class="hero">
      <div class="overlay">
        <div class="hero-content">
          <h1>Our Services</h1>
          <p>Capturing Moments That Matter</p>
        </div>
      </div>
    </section>

    <section class="services">
      <div class="container">

      <div class="service-box">
  <a href="book.php?service=Engagement">
    <img src="/Images/e1.jpg" alt="">
    <div class="service-content">
      <h3>Engagement Photography</h3>
      <p>We capture your special day with elegance and style, creating memories that will last a lifetime.</p>
    </div>
  </a>
</div>

<div class="service-box">
  <a href="book.php?service=Haldi">
    <img src="/Images/haldi1.jpg" alt=" Photography">
    <div class="service-content">
      <h3>Haldi Photography</h3>
      <p>Professional portraits that highlight your personality and style, perfect for any occasion.</p>
    </div>
  </a>
</div>

<div class="service-box">
  <a href="book.php?service=Wedding">
    <img src="/Images/wed1.jpg" alt="">
    <div class="service-content">
      <h3>Wedding Photography</h3>
      <p>From corporate events to personal celebrations, we cover it all with a keen eye for detail.</p>
    </div>
  </a>
</div>

<div class="service-box">
  <a href="book.php?service=Babyshower">
    <img src="/Images/babyshower.jpg" alt="">
    <div class="service-content">
      <h3>Babyshower Photography</h3>
      <p>Beautiful family portraits that capture the love and connection between your loved ones.</p>
    </div>
  </a>
</div>

<div class="service-box">
  <a href="book.php?service=Birthday">
    <img src="/Images/bd1.jpg" alt="">
    <div class="service-content">
      <h3>Birthday Photography</h3>
      <p>High-quality images that showcase your products or services, helping you stand out in the market.</p>
    </div>
  </a>
</div>

      </div>
    </section>
    <div class="custom-section">
    <div class="section-content">
        <div class="section about">
            <img src="/Images/logo2.png">
            <p>Destination wedding and elopement photographer. Atlanta-based and ready to travel!</p>
        </div>

        <div class="section explore">
            <h2>Explore</h2>
            <ul>
                <li><a href="about.php">About</a></li>
                <li><a href="service.php">Service</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </div>

        <div class="section contact">
            <h2>Contact</h2>
            <p><a href="#">The Knot</a></p>
            <div class="socials">
                <a href="#"><i class="facebook"></i></a>
                <a href="#"><i class="instagram"></i></a>
                <a href="#"><i class="envelope"></i></a>
            </div>
        </div>
    </div>
</div>

    <footer>
      <p>Copyright © 2024 P-Digital. All Rights Reserved || Designed by: Ved Wadekar</p>
    </footer>
  </body>
</html>
