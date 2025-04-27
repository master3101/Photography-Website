<?php
session_start();
if(isset($_SESSION['user_id'])){
  $user_id=$_SESSION['user_id'];
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $mob = $_POST["mob"];
    $msg = $_POST["msg"];
    $conn=mysqli_connect("localhost","root","","proj");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
$sql = "INSERT INTO `cont`(`name`, `email`, `mob`, `msg`) VALUES ('$name','$email','$mob','$msg')";
    if ($conn->query($sql) === TRUE) {
        echo "Successful!";
        header('location:ty_con.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Contac Us </title>
    <link rel="stylesheet" href="/CSS/contact.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
  <div class="Container">
    <div class="Cont">
      <div class="Left_side">
        <div class="Address details">
          <div class="Top">Address</div>
          <div class="First">22/23 Nirmit Apt,Nanepada</div>
          <div class="Second">Mulund(East),Mumbai-400081</div>
        </div>
        <div class="Phone details">
          <div class="Top">Phone</div>
          <div class="First">8652332869</div>
          <div class="Second">9322522384</div>
        </div>
        <div class="Email details">
          <div class="Top">Email</div>
          <div class="First">Vedwadekar31@gmail.com</div>
          <div class="Second">Pdigital@gmail.com</div>
        </div>
      </div>
      <div class="Right_side">
        <div class="Top_txt">Get In Touch With Us</div>
        <p>If you have any queries,please feel free to ask us.</p>
      <form action="contact.php" method="post">
        <div class="Input_Box">
          <input type="text" name="name" placeholder="Enter your Full Name" required>
        </div>
        <div class="Input_Box">
          <input type="email" name="email" placeholder="Enter your Email" required>
        </div>
        <div class="Input_Box">
            <input type="text" name="mob" placeholder="Enter your Mobile No"pattern="[0-9]{10}" required>
          </div>
        <div class="Input_Box Message-box">
          <input type="text" name="msg" placeholder="Message for Us" required>
        </div>
        <input type="submit" id="sub" value="Submit">
        
      </form>
    </div>
    </div>
    
  </div>
  
  
</body>
<footer>
Copyright © 2024 P Digital. All Rights Reserved||Designed by:Ved Wadekar
</footer>
</html>