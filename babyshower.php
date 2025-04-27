
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>babyshower - P Digital</title>
  <link rel="stylesheet" href="/CSS/babyshower.css">
  <link rel="icon" href="Images/logo.jpg" type="image">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
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

  <div class="center">
    <div class="title">
      <h3>babyshower <span>Photo</span></h3>
    </div>
  </div>
  <div class="content">
    <div class="image-container">
      <img src="/Images/babyshower.jpg" alt="babyshower Photo">
      <img src="/Images/babyshower2.jpg" alt="babyshower Photo">
      <img src="/Images/babyshower3.jpg" alt="babyshower Photo">
      </div>
      <div class="image-container">
      <img src="/Images/babyshower7.jpg" alt="babyshower Photo">
      <img src="/Images/babyshower8.jpg" alt="babyshower Photo">
      <img src="/Images/babyshower9.jpg" alt="babyshower Photo">

      </div>
      <div class="image-container">
      <img src="/Images/babyshower4.jpg" alt="babyshower Photo">
      <img src="/Images/babyshower5.jpg" alt="babyshower Photo">
      <img src="/Images/babyshower6.jpg" alt="babyshower Photo">
      
      </div>
    </div>
  </div>

  <footer>
    Copyright © 2024 P Digital . All Rights Reserved||Designed by: Ved Wadekar
  </footer>
</body>

</html>