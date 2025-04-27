<?php
session_start();



// Connect to the database
$conn = new mysqli("localhost", "root", "", "proj");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);  
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form data
    $event = isset($_POST['service']) ? $conn->real_escape_string($_POST['service']) : '';
    $sub_service = isset($_POST['sub_service']) ? $conn->real_escape_string($_POST['sub_service']) : '';
    $amount = isset($_POST['amount']) ? $conn->real_escape_string($_POST['amount']) : '';
    $cardno = isset($_POST['cardno']) ? $conn->real_escape_string($_POST['cardno']) : '';
    $cardhname = isset($_POST['cardhname']) ? $conn->real_escape_string($_POST['cardhname']) : '';
    $expiry_date = isset($_POST['date']) ? $conn->real_escape_string($_POST['date']) : '';
    $cvv = isset($_POST['cvv']) ? $conn->real_escape_string($_POST['cvv']) : '';

    // Check for any missing fields
    if (!empty($event) && !empty($sub_service) && !empty($amount) && !empty($cardno) && !empty($cardhname) && !empty($expiry_date) && !empty($cvv)) {
        // Prepare and bind SQL query
        $stmt = $conn->prepare("INSERT INTO payment (event, sub_service, amount, cardno, cardhname, date, cvv) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $event, $sub_service, $amount, $cardno, $cardhname, $expiry_date, $cvv);

         // Execute the statement
         if ($stmt->execute()) {
            // Redirect to the receipt page with data
            header("Location: receipt.php?event=$event&sub_service=$sub_service&amount=$amount&cardhname=$cardhname");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
        // Close the statement
        $stmt->close();
    } 
}

// Close the connection
$conn->close();
?>
 <?php
// Get the selected service from the query parameter
$selected_service = isset($_GET['service']) ? $_GET['service'] : '';
$selected_sub_service = isset($_GET['sub_service']) ? $_GET['sub_service'] : '';
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <link rel="stylesheet" href="/CSS/pay.css">
</head>

<body>
    <div class="container">
        <h1>Payment</h1>
        <form action="pay.php" method="post">
            <div class="form-group">
            <label for="service">Select Event</label>
                <select id="service" name="service" required>
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
                    <option value="Photography" <?php if ($selected_sub_service == 'Photography') echo 'selected'; ?>>Photography</option>
                    <option value="Videography" <?php if ($selected_sub_service == 'Videography') echo 'selected'; ?>>Videography</option>
                    <option value="Both" <?php if ($selected_sub_service == 'Both') echo 'selected'; ?>>Both (Photography & Videography)</option>
                </select>
            </div>

            <div class="form-group">
                <label for="amount">Amount (Rs.)</label>
                <input type="text" id="amount" name="amount" readonly required>
            </div>
            
            <div class="form-group">
                <label for="cardno">Card Number</label>
                <input type="text" id="cardno" name="cardno" maxlength="19"  placeholder="1234 5678 9012 3456" autocomplete="cc-number" required>
            </div>


            <div class="form-group">
                <label for="cardhname">Card Holder Name</label>
                <input type="text" id="cardhname" name="cardhname" autocomplete="cc-name" required>
            </div>
            <div class="form-group">
                <label for="date">Expiry Date</label>
                <input type="text" id="date" name="date" placeholder="MM/YY" pattern="^(0[1-9]|1[0-2])\/([2-9][0-9])$" autocomplete="cc-exp" required>
            </div>

            <div class="form-group">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" maxlength="3" autocomplete="cc-csc" required>
            </div>

            <input type="submit" value="Pay Now" class="btn-submit">
        </form>
    </div>

    <script>
            document.getElementById('cardno').addEventListener('input', function (e) {
             // Remove all non-digit characters
            let cardNumber = e.target.value.replace(/\D/g, '');
    
             // Add a space after every 4 digits
            cardNumber = cardNumber.replace(/(\d{4})(?=\d)/g, '$1 ');

            // Update the input value
             e.target.value = cardNumber;
            });

            document.getElementById('date').addEventListener('input', function (e) {
             // Remove all non-digit characters
             let expDate = e.target.value.replace(/\D/g, '');
    
             // Add a slash after the first 2 digits
            if (expDate.length > 2) {
             expDate = expDate.substring(0, 2) + '/' + expDate.substring(2);
             }

             // Update the input value
            e.target.value = expDate;
            });



      // Script to update amount dynamically
      document.addEventListener("DOMContentLoaded", function() {
            var eventSelect = document.getElementById("service");
            var subServiceSelect = document.getElementById("sub_service");
            var amountInput = document.getElementById("amount");

            var amounts = {
                "Wedding": { "Photography": 40000, "Videography": 40000, "Both": 80000 },
                "Haldi": { "Photography": 10000, "Videography": 10000, "Both": 20000 },
                "Babyshower": { "Photography": 5000, "Videography": 5000, "Both": 10000 },
                "Birthday": { "Photography": 5000, "Videography": 10000, "Both": 15000 },
                "Engagement": { "Photography": 8000, "Videography": 12000, "Both": 20000 }
            };

            function updateAmount() {
                var selectedEvent = eventSelect.value;
                var selectedSubService = subServiceSelect.value;

                if (amounts.hasOwnProperty(selectedEvent) && amounts[selectedEvent].hasOwnProperty(selectedSubService)) {
                    var finalAmount = amounts[selectedEvent][selectedSubService];
                    amountInput.value = finalAmount;
                } else {
                    amountInput.value = "";
                }
            }

            // Update the amount when the event or sub-service changes
            eventSelect.addEventListener("change", updateAmount);
            subServiceSelect.addEventListener("change", updateAmount);

            // Initial calculation on page load
            updateAmount();
        });
    </script>
</body>

</html>
