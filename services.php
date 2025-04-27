<?php
session_start();
$user_id=$_SESSION['user_id'];

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Anil Vedak</title>
  <link rel="stylesheet"href="/CSS/service.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,500' rel='stylesheet' type='text/css'>  
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
<link href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" type="text/css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css" type="text/css" rel="stylesheet" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

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
        <li><a href="services.php">Services</a>
        <li><a href="contact.php">Contact Us</a></li>
      </ul>
      <div class="Login">
        <ul>
          <?php
          if (!isset($user_id)) {
            echo '<li><a href="login.php"><i class="fa-solid fa-user">Login</i></a></li>';
          } else {
            echo '<li><a href="logout.php"><i class="fa-solid fa-user">Logout</i></a></li>';
          }
           ?>
        </ul>
      </div>
    </div>
  </nav>
  <section class="testimonials">
	<div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div id="customers-testimonials" class="owl-carousel">
            <div class="item">
              <div class="shadow-effect">
                <img class="img-responsive" src="/Images/w3.jpg" alt="">
                <div class="item-details">
									<h5>Wedding</h5>
									<p>Locked For Life</p>
								</div>
              </div>
            </div>
            <div class="item">
              <div class="shadow-effect">
                <img class="img-responsive" src="/Images/g3.jpg" alt="">
                <div class="item-details">
									<h5>Baby Shower</h5>
									<p>Upcoming Bundle Of Joy</p>
								</div>
              </div>
            </div>
            <div class="item">
              <div class="shadow-effect">
                <img class="img-responsive" src="/Images/n1.jpg" alt="">
                <div class="item-details">
									<h5>Naming Ceremony</h5>
									<p>A Name That Will Carry The Legacy Of The Family Into The Future.</p>
								</div>
              </div>
            </div>
            <div class="item">
              <div class="shadow-effect">
                <img class="img-responsive" src="/Images/b1.jpg" alt="">
                <div class="item-details">
									<h5>Birthday</h5>
									<p>Day Filled With Laughter, Fun, And All The Cake You Can Eat.</p>
								</div>
              </div>
            </div>
            <div class="item">
              <div class="shadow-effect">
                <img class="img-responsive" src="/Images/s1.jpg" alt="">
                <div class="item-details">
                  <h5>Couple Shoot</h5>
                  <p>Two Hearts, One Love, And A Lifetime Of Adventures Together</p>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="shadow-effect">
                <img class="img-responsive" src="/Images/n3.jpg" alt="">
                <div class="item-details">
									<h5>Modeling Shoot</h5>
									<p>Strike A Pose, Make It Bold</p>
								</div>
              </div>
            </div>  
            <div class="item">
              <div class="shadow-effect">
                <img class="img-responsive" src="/Images/e1.jpg" alt="">
                <div class="item-details">
									<h5>Engagement</h5>
									<p>Here's To The Beginning Of A Wonderful Adventure Together.</p>
								</div>
              </div>
            </div> 
          </div>
        </div>
      </div>
      </div>
      </section>
      <!-- <script>
        jQuery(document).ready(function($) {
    "use strict";
    $('#customers-testimonials').owlCarousel( {
            loop: true,
            center: true,
            items: 3,
            margin: 30,
           
        nav:true,
            
        stopOnHover:true,
            smartSpeed: 850,
          navText: ['<i class="fa fa-arrow-alt-circle-left" style="font-size:30px;color:blue"></i>','<i class="fa fa-arrow-alt-circle-right" style="font-size:30px;color:blue"></i>'],
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                1170: {
                    items: 3
                }
            }
        });
    });
      </script> -->
      <a href="Book.php" id="booknow">Booknow</a>
      <footer>
Copyright © 2024 p Digital. All Rights Reserved||Designed by:Ved Wadekar
</footer>

</body>
  
</html>
  