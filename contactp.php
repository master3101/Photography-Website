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
    <div class="main">
  <h2>Contact Details</h2>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">Name</th>
        <th class="text-center">Email</th>
        <th class="text-center">Mobile</th>
        <th class="text-center">Message</th>
      </tr>
    </thead>
    </div>
    <?php
      include_once "dbconnect.php";
      $sql="SELECT * FROM cont";
      $result=$conn-> query($sql);
      $count=1;
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
    ?>
    <tr>
      <td><?=$row["name"]?></td>
      <td><?=$row["email"]?></td>
      <td><?=$row["mob"]?></td>
      <td><?=$row["msg"]?></td>
    </tr>
    <?php
            $count=$count+1;
           
        }
    }
    ?>
  </table>
    </div>
</body>
</html>

