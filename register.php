<?php
$conn = mysqli_connect("localhost", "root", "", "proj");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    // Check if all fields are filled
    if (empty($name) || empty($email) || empty($username) || empty($password) || empty($confirm_password)) {
        echo "All fields are required.";
    } elseif ($password != $confirm_password) {
        echo "Password doesn't match.";
    } else {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert the hashed password into the database
        $query = "INSERT INTO `login1`(`name`, `email`, `username`, `password`, `user_type`) VALUES ('$name','$email','$username','$hashed_password','user')";
        
        $res = mysqli_query($conn, $query);
        if ($res) {
            // Redirect to login page on success
            header("Location: login.php");
            exit;
        } else {
            echo "Registration failed. Please try again.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <title>Register</title>
   <link rel="stylesheet" href="/CSS/register.css">
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
         <div class="login">
            <ul>
               <li><a href="login.php"><i class="fa-solid fa-user"></i> Login</a></li>
            </ul>
         </div>
      </div>
   </nav>
    <div class="wrapper">
      <div class="title">
         Register
      </div>
      <form action="register.php" method="post" onsubmit="return validateForm()">
         <div class="field">
            <input type="text" name="name" required>
            <label>Name</label>
         </div>
         <div class="field">
            <input type="email" name="email" required>
            <label>Email Address</label>
         </div>
         <div class="field">
            <input type="username" name="username" required>
            <label>Username</label>
         </div>
         <div class="field">
            <input type="password" id="password" name="password" required>
            <label>Create Password</label>
         </div>
         <div class="field">
            <input type="password" id="confirm_password" name="confirm_password" required>
            <label>Confirm Password</label>
         </div>
         <div class="error-message" id="error-message" style="color: red; display: none;">
            <!-- Error messages will appear here -->
         </div>
         <div class="reload-button" id="reload-button" style="display: none; text-align: center;">
            <button type="button" onclick="reloadPage()">Reload</button>
         </div>
         <div class="field">
            <input type="submit" name="submit" value="Register">
         </div>
         <div class="login-link">
            Already a member? <a href="login.php">Login now</a>
         </div>
      </form>
   </div>
   <footer>
      Copyright © 2024 P Digital. All Rights Reserved || Designed by: Ved Wadekar
   </footer>

   <script>
      function validateForm() {
         var password = document.getElementById("password").value;
         var confirmPassword = document.getElementById("confirm_password").value;
         var errorMessage = document.getElementById("error-message");
         var reloadButton = document.getElementById("reload-button");
         var errors = [];

         // Check for minimum length
         if (password.length < 8) {
            errors.push("Password must be at least 8 characters long.");
         }


         // Check for at least one lowercase letter
         if (!/[a-z]/.test(password)) {
            errors.push("Password must contain at least one lowercase letter.");
         }

         // Check for at least one digit
         if (!/\d/.test(password)) {
            errors.push("Password must contain at least one digit.");
         }


         // Check if passwords match
         if (password !== confirmPassword) {
            errors.push("Passwords do not match.");
         }

         // If there are any errors, display them and prevent form submission
         if (errors.length > 0) {
            errorMessage.innerHTML = errors.join("<br>");
            errorMessage.style.display = "block";
            reloadButton.style.display = "block";
            return false;
         }

         // If no errors, allow form submission
         errorMessage.style.display = "none";
         reloadButton.style.display = "none";
         return true;
      }

      function reloadPage() {
         location.reload();
      }
   </script>
</body>

</html>