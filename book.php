<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$conn = new mysqli("localhost", "root", "", "proj");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data directly from POST and sanitize
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $service = $conn->real_escape_string($_POST['service']);
    $sub_service = $conn->real_escape_string($_POST['sub_service']);
    $date = $conn->real_escape_string($_POST['date']);
    $venue = $conn->real_escape_string($_POST['venue']);
    $message = $conn->real_escape_string($_POST['message']);

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO `booknow1` (`name`, `email`, `phone`, `service`, `sub_service`, `date`, `venue`, `message`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", $name, $email, $phone, $service, $sub_service, $date, $venue, $message);

    // Execute the statement
    if ($stmt->execute()) {
        // Redirect to payment page with selected service and sub-service in the URL
        header("Location: pay.php?service=$service&sub_service=$sub_service");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

$conn->close();
?>
<?php
// Get the selected service from the query parameter
$selected_service = isset($_GET['service']) ? $_GET['service'] : '';
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>P Digital</title>
  <link rel="stylesheet" href="CSS\Ved\Ved\book.css">
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

  <section class="hero">
    <div class="overlay">
      <div class="hero-content">
        <h1>Book Your Session</h1>
        <p>Let's capture your special moments</p>
      </div>
    </div>
  </section>

  <section class="booking">
    <div class="container">
      <!-- Service Details Table -->
      <div class="service-details">
        <table>
          <thead>
            <tr>
              <th>Service Name</th>
              <th>Minimum Photos</th>
              <th>Min Video Length</th>
              <th>Pricing for Photos</th>
              <th>Pricing for Videos</th>
              <th>Total Amount</th>
            </tr>
          </thead>
          <tbody>
            <?php if ($selected_service == 'Wedding' ): ?>
            <tr>
              <td>Wedding Photography</td>
              <td>500</td>
              <td>60 min</td>
              <td>₹40000</td>
              <td>₹40000</td>
              <td>₹80000</td>
            </tr>
            <?php endif; ?>

            <?php if ($selected_service == 'Haldi'): ?>
            <tr>
              <td>Haldi Photography</td>
              <td>150</td>
              <td>20 min</td>
              <td>₹10000</td>
              <td>₹10000</td>
              <td>₹20000</td>
            </tr>
            <?php endif; ?>

            <?php if ($selected_service == 'Babyshower'): ?>
            <tr>
              <td>Babyshower Photography</td>
              <td>100</td>
              <td>15 min</td>
              <td>₹5000</td>
              <td>₹5000</td>
              <td>₹10000</td>
            </tr>
            <?php endif; ?>

            <?php if ($selected_service == 'Birthday'): ?>
            <tr>
              <td>Birthday Photography</td>
              <td>200</td>
              <td>25 min</td>
              <td>₹5000</td>
              <td>₹10000</td>
              <td>₹15000</td>
            </tr>
            <?php endif; ?>

            <?php if ($selected_service == 'Engagement'): ?>
            <tr>
              <td>Engagement Photography</td>
              <td>300</td>
              <td>30 min</td>
              <td>₹8000</td>
              <td>₹12000</td>
              <td>₹20000</td>
            </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>

      <!-- Booking Form -->
      <form action="book.php" method="POST">
        <h3 class="form-subheading">Fill Your Booking Details</h3> <!-- New Form Heading -->
        <div class="form-group">
          <label for="name">Full Name</label>
          <input type="text" id="name" name="name" required>
        </div>

        <div class="form-group">
          <label for="email">Email Address</label>
          <input type="email" id="email" name="email" required>
        </div>

        <div class="form-group">
          <label for="phone">Phone Number</label>
          <input type="tel" id="phone" name="phone" required>
        </div>

        <div class="form-group">
          <label for="service">Select Service</label>
          <select id="service" name="service" required>
            <option value="">-- Choose a Service --</option>
            <option value="Wedding" <?php if ($selected_service == 'Wedding') echo 'selected'; ?>>Wedding Photography</option>
            <option value="Haldi" <?php if ($selected_service == 'Haldi') echo 'selected'; ?>>Haldi Photography</option>
            <option value="Babyshower" <?php if ($selected_service == 'Babyshower') echo 'selected'; ?>>Babyshower Photography</option>
            <option value="Birthday" <?php if ($selected_service == 'Birthday') echo 'selected'; ?>>Birthday Photography</option>
            <option value="Engagement" <?php if ($selected_service == 'Engagement') echo 'selected'; ?>>Engagement Photography</option>
          </select>
        </div>

        <div class="form-group">
          <label for="sub_service">Select Sub-Service</label>
          <select id="sub_service" name="sub_service" required>
            <option value="">-- Choose a Sub-Service --</option>
            <option value="Photography">Photography</option>
            <option value="Videography">Videography</option>
            <option value="Both">Both(Photography & Videography)</option>
          </select>
        </div>

        <div class="form-group">
          <label for="date">Preferred Date</label>
          <input type="date" id="date" name="date" required>
        </div>

        <div class="form-group">
          <label for="venue">Venue</label>
          <input type="text" id="venue" name="venue" required>
        </div>

        <div class="form-group">
          <label for="message">Additional Information</label>
          <textarea id="message" name="message" rows="4"></textarea>
        </div>

        <button type="submit" class="btn-submit">Pay Now</button>
      </form>
    </div>
  </section>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
        var dateInput = document.getElementById('date');
        var today = new Date();
        var tomorrow = new Date();
        tomorrow.setDate(today.getDate() + 1);

        var day = ("0" + tomorrow.getDate()).slice(-2);
        var month = ("0" + (tomorrow.getMonth() + 1)).slice(-2);
        var year = tomorrow.getFullYear();

        var minDate = year + "-" + month + "-" + day;
        dateInput.setAttribute('min', minDate);
    });
  </script>

  <footer>
    <p>Copyright © 2024 P Digital. All Rights Reserved || Designed by: Ved Wadekar</p>
  </footer>
</body>
</html>
