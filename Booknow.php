<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $mobile = $_POST["mobile"];
    $address = $_POST["address"];
    $venue = $_POST["venue"];
    $event = $_POST["event"];
    $date = $_POST["date"];
    $price = $_POST["price"];
    $conn=mysqli_connect("localhost","root","","proj");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "INSERT INTO `booknow1`(`name`, `mobile`, `address`, `venue`, `event`, `date`) VALUES ('$name','$mobile','$address','$venue','$event','$date')";
    if ($conn->query($sql) === TRUE) {
      echo "Booking Successful";
        header('location:pay.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="/CSS/booknow.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<title>Book Now</title>
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
    <div class="container">
        <h2>Book Your Event Now</h2>
        <form action="Booknow.php" method="post">
          <div class="form-group">
            <input type="text" name="name" id="name" placeholder="Name" required>
          </div>
          <div class="form-group">
            <input type="tel" name="mobile" id="mobile" placeholder="Mobile" pattern="[0-9]{10}" required>
          </div>
          <div class="form-group">
           <input type="text" name="address" id="address" placeholder="Address" required>
          </div>
          <div class="form-group">
           <input type="text" name="venue" id="venue" placeholder="Venue of an event" required>
          </div>
          <div class="form-group">
            <select id="event" name="event" placeholder="Event" >
              <option value="Engagement">Engagement</option>
              <option value="Wedding">Wedding</option>
              <option value="Baby Shower">Baby Shower</option>
              <option value="Naming Ceremony">Naming Ceremony</option>
              <option value="Birthday">Birthday</option>
              <option value="Couple Shoot">Couple Shoot</option>
              <option value="Modeling Shoot">Modeling Shoot</option>
            </select>
          </div>
          <div class="form-group">
        <input type="date" name="date" id="date" placeholder="Date of an Event" min="2023-10-07" required>
        
        
          </div>
         <?php
          if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $mobile = $_POST["mobile"];
    $address = $_POST["address"];
    $venue = $_POST["venue"];
    $event = $_POST["event"];
    $date = $_POST["date"];
    $price = $_POST["price"];
    $conn = mysqli_connect("localhost", "root", "", "proj");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the date is already booked
    $check_sql = "SELECT * FROM `booknow1` WHERE `date` = '$date'";
    $result = $conn->query($check_sql);
    
    if ($result->num_rows > 0) {
        echo "Sorry, this date is already booked. Please choose another date.";
    } else {
        $insert_sql = "INSERT INTO `booknow1`(`name`, `mobile`, `address`, `venue`, `event`, `date`) VALUES ('$name','$mobile','$address','$venue','$event','$date')";
        
        if ($conn->query($insert_sql) === TRUE) {
            echo "Booking Successful";
            header('location: pay.php');
        } else {
            echo "Error: " . $insert_sql . "<br>" . $conn->error;
        }
    }

    $conn->close();
}
?>
        <input type="submit" id="sub" value="Pay Now">
        </form>
      </div>
    </body>
    </html>
