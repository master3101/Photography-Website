<?php
session_start(); // Start the session

$conn = mysqli_connect("localhost", "root", "", "proj");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Initialize message variable
$message = '';

// Check if form data is set before using it
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Sanitize user input
    $username = $conn->real_escape_string($username);
    $password = $conn->real_escape_string($password);

    // Check if user exists and verify password
    $sql = "SELECT username, password FROM login1 WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        // User found, now verify the password
        $row = $result->fetch_assoc();
        $stored_hashed_password = $row['password'];

        if (password_verify($password, $stored_hashed_password)) {
            // Password is correct, start session and redirect to home.php
            $_SESSION['username'] = $username; // Store the username in the session
            header("Location: home.php"); // Redirect to home.php after successful login
            exit(); // Ensure no further code is executed after redirection
        } else {
            $message = "Invalid password.";
        }
    } else {
        $message = "No such user found.";
    }
} else {
    $message = "Please provide both username and password.";
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>
   <link rel="stylesheet" href="/CSS/login.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
<nav>
    <div class="menu">
      <div class="logo">
        <img src="/Images/logo.png" alt="Logo">
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

   <div class="wrapper">
      <div class="title">Log-in First</div>

      <!-- Form to login -->
<form id="loginForm" action="login.php" method="post">

<div class="field">
    <input type="text" name="username" id="username" required>
    <label>Username</label>
</div>

<div class="field">
    <input type="password" name="password" id="password" required>
    <label>Password</label>
</div>

<div class="field">
    <input type="submit" id="loginButton" name="submit" value="Login">
</div>

<div class="signup-link">
    Not a member? <a href="register.php">Signup now</a>
</div>
</form>
   </div>
   
   <footer>
      Copyright © 2024 P Digital. All Rights Reserved || Designed by: Ved Wadekar
   </footer>
</body>

</html>
