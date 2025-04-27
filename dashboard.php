<?php
include_once "dbconnect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>P Digital</title>
  <link rel="stylesheet" href="/CSS/admin.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
</head>
<body>
  <div class="container">
    <nav>
      <ul>
        <div class="logo">
          <img src="/Images/logo.jpg" alt="">
          <span class="nav-item">Hello,Ved</span>
          </div>
        
        <li><a href="dashboard.php">
          <i class="fas fa-home"></i>
          <span class="nav-item">Dashboard</span>
        </a></li>
        <li><a href="users.php">
          <i class="fas fa-user"></i>
          <span class="nav-item">Users</span>
        </a></li>
        <li><a href="eventsbooked.php">
          <i class="fas fa-calendar"></i>
          <span class="nav-item">Events Booked</span>
        </a></li>
        <li><a href="contactp.php">
          <i class="fas fa-phone"></i>
          <span class="nav-item">Contact</span>
        </a></li>
        <li><a href="payment.php">
          <i class="fas fa-wallet"></i>
          <span class="nav-item">Payment</span>
        </a></li>
        <li><a href="home.php" class="logout">
          <i class="fas fa-sign-out-alt"></i>
          <span class="nav-item">Log out</span>
        </a></li>
      </ul>
    </nav>
<section class="main">
      <div class="main-top">
        <h1>STATS</h1>
        </div>
      <div class="main-skills">
        <div class="card">
          <i class="fas fa-user"></i>
          <h3>New Users</h3>
          <?php
            $sql="SELECT * from login1";
            $result=$conn-> query($sql);
            $count=0;
            if ($result-> num_rows > 0){
               while ($row=$result-> fetch_assoc()) {
                    
                $count=$count+1;
                }
                 }
                    echo $count;
            ?>
        </div>
       <div class="card">
          <i class="fas fa-book"></i>
          <h3>Total Booking</h3>
          <?php
                        $sql="SELECT * from booknow1";
                        $result=$conn-> query($sql);
                        $count=0;
                        if ($result-> num_rows > 0){
                            while ($row=$result-> fetch_assoc()) {
                    
                                $count=$count+1;
                            }
                        }
                        echo $count;
                        ?>
                         </div>
      </div>
      <section class="main-course">
        <h1>My packages</h1>
        <div class="course-box">
                <div class="course">
            <div class="box">
              <h3>Engagement</h3>
            </div>
            <div class="box">
              <h3>Wedding</h3>
            </div>
            <div class="box">
              <h3>Baby Shower</h3>
            </div>
            <div class="box">
              <h3>Haldi</h3>
            </div>
            <div class="box">
              <h3>Birthday</h3>
              </div>
             
</section>
 </body>
</html>