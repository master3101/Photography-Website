<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>P Digital</title>
  <link rel="stylesheet" href="/CSS/admin.css" />
  <link rel="icon" href="Images/logo.jpg" type="image">
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
  <h2>Events Booked</h2>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">Name</th>
        <th class="text-center">email</th>
        <th class="text-center">phone</th>
        <th class="text-center">service</th>
        <th class="text-center">sub_service</th>
        <th class="text-center">Date</th>
        <th class="text-center">venue</th>
        <th class="text-center">message</th>
        <th class="text-center">Attend</th>
        <th class="text-center">Update</th>
        <th class="text-center">Delete event</th>
      </tr>
    </thead>
    </div>
    <?php
      include_once "dbconnect.php";
      $sql="SELECT * FROM booknow1";
      $result=$conn-> query($sql);
      $count=1;
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) 
        {
           
    ?>
    <tr>
      <td><?=$row["name"]?></td>
      <td><?=$row["email"]?></td>
      <td><?=$row["phone"]?></td>
      <td><?=$row["service"]?></td>
      <td><?=$row["sub_service"]?></td>
      <td><?=$row["date"]?></td>
      <td><?=$row["venue"]?></td>
      <td><?=$row["message"]?></td>
      <td><?=$row["attended"]?></td>
      
      <td><button class="update-btn" data-id="<?= $row["id"] ?>">Update</button></td>
      <td><button class="delete-btn" data-id="<?= $row["id"] ?>">Delete</button></td>
      
      
    </tr>
    <?php
           
        }
    }
    ?>
  </table>
  </div>
</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $(".update-btn").click(function () {
           
            var id = $(this).data("id");

            
            $.ajax({
                type: "POST",
                url: "update_attended.php", 
                data: {
                    id: id
                },
                success: function (response) {
                    
                    if (response === "done") {
                        
                        $(this).closest("tr").find("td:last").text("done");
                        alert("Record updated successfully!");
                        location.reload();
                    
                    } else if (response === "not done") {
                        
                        $(this).closest("tr").find("td:last").text("not done");
                        alert("Record updated successfully!");
                        location.reload();
                    }
                }
            });
        });
    });
</script>
<-- <script> 
    $(document).ready(function () {
       

        $(".delete-btn").click(function () {
            var id = $(this).data("id");

            $.ajax({
                type: "POST",
                url: "delete_event.php",
                data: {
                    id: id
                },
                success: function (response) {
                    if (response === "success") {
                        alert("Event deleted successfully!");
                        location.reload();
                    } else if (response === "error") {
                        alert("Error deleting event.");
                    }
                }
            });
        });
    });
</script> 
</html>