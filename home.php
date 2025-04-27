
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>P Digital</title>
  <link rel="stylesheet" href="/CSS/home.css">
  <link rel="icon" href="Images/logo.jpg" type="image">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</head>

<body>
  <div class="wrapper">
    <nav>
      <div class="menu">
        <div class="logo">
          <img src="/Images/logo.png" alt="P Digital Logo">
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

    <div class="img"></div>
    <div class="center">
      <div class="title">We Capture Moments</div>
    </div>

    <div class="header">
      <h1>Welcome to P DIGITAL</h1>
      <p>We are an award-winning photography studio. We are dedicated to capturing timeless images.</p>
    </div>

    <main>
      <div class="categories">
        <div class="card" style="width: 25rem;">
          <a href="engagement.php">
            <img src="/Images/engagement1.jpg" class="card-img-top" alt="Engagement">
            <div class="card-img-overlay">
              <h5 class="card-title"></h5>
              <p class="card-text">Engagement</p>
            </div>
          </a>
        </div>

        <div class="card" style="width: 25rem;">
          <a href="haldi.php">
            <img src="/Images/haldi1.jpg" class="card-img-top" alt="Haldi">
            <div class="card-img-overlay">
              <h5 class="card-title"></h5>
              <p class="card-text">Haldi</p>
            </div>
          </a>
        </div>

        <div class="card" style="width: 25rem;">
          <a href="wedding.php">
            <img src="/Images/wedding1.jpg" class="card-img-top" alt="Wedding">
            <div class="card-img-overlay">
              <h5 class="card-title"></h5>
              <p class="card-text">Wedding</p>
            </div>
          </a>
        </div>

        <div class="card" style="width: 25rem;">
          <a href="babyshower.php">
            <img src="/Images/babyshower.jpg" class="card-img-top" alt="Baby Shower">
            <div class="card-img-overlay">
              <h5 class="card-title"></h5>
              <p class="card-text">Baby Shower</p>
            </div>
          </a>
        </div>

        <div class="card" style="width: 25rem;">
          <a href="birthday.php">
            <img src="/Images/birthday.jpg" class="card-img-top" alt="Birthday">
            <div class="card-img-overlay">
              <h5 class="card-title"></h5>
              <p class="card-text">Birthday</p>
            </div>
          </a>
        </div>
      </div>

      <section class="about">
        <div class="about-container">
          <div class="about-image">
            <img src="Images/photographer.jpg" alt="Photographer">
          </div>
          <div class="about-content">
            <h1 class="about-title">MEET YOUR PHOTOGRAPHER</h1>
            <p class="about-location">LOCATED IN India</p>
            <h2 class="about-name">Hi, I'm Ved</h2>
            <p class="about-description">
              Through a blend of digital and film photography, I create imagery that is romantic, timeless, and emotionally resonant, capturing not just moments, but memories that will be cherished for generations.
            </p>
            <a href="about.php" class="about-button">ABOUT ME &rarr;</a>
          </div>
        </div>
      </section>
    </main>

    <footer class="footer">
      Copyright © 2024 P Digital. All Rights Reserved || Designed by: Ved Wadekar
    </footer>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
