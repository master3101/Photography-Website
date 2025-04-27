<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment - India Visas</title>
    <style>
        /* Basic reset and styling */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #EDE8F5;
            padding: 20px;
            color: #7091E6;
        }

        h1, h2, h3 {
            color: #7091E6;
        }

        .payment-section {
            margin-top: 20px;
            background-color: #D3CCE5;
            padding: 15px;
            border-radius: 5px;
        }

        .payment-section h3 {
            margin-bottom: 10px;
        }

        .payment-section p {
            margin-bottom: 10px;
        }

        .payment-section input, .payment-section button, .payment-section select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .payment-section button {
            background-color: #7091E6;
            color: white;
            cursor: pointer;
        }

        .payment-section button:hover {
            background-color: #005bb5;
        }

        #upiSection {
            display: none;
        }
    </style>
</head>
<body>
    <h1>Payment</h1>

    <div class="payment-section">
        <h3>Enter Payment Details</h3>
        <p><strong>Total Amount:</strong> <span id="amountPreview"></span></p>

        <label for="paymentMethod">Select Payment Method:</label>
        <select id="paymentMethod" onchange="togglePaymentMethod()">
            <option value="card">Credit/Debit Card</option>
            <option value="upi">UPI</option>
        </select>

        <div id="cardSection">
            <label for="cardNumber">Card Number:</label>
            <input type="text" id="cardNumber" placeholder="Enter your card number" required>
            
            <label for="expiryDate">Expiry Date:</label>
            <input type="text" id="expiryDate" placeholder="MM/YY" required>

            <label for="cvv">CVV:</label>
            <input type="text" id="cvv" placeholder="Enter CVV" required>
        </div>

        <div id="upiSection">
            <label for="upiId">UPI ID:</label>
            <input type="text" id="upiId" placeholder="Enter your UPI ID" required>
        </div>

        <button onclick="processPayment()">Submit Payment</button>
    </div>

    <script>
        function getQueryParams() {
            const urlParams = new URLSearchParams(window.location.search);
            const amount = urlParams.get('amount');
            return { amount };
        }

        function togglePaymentMethod() {
            const paymentMethod = document.getElementById('paymentMethod').value;
            if (paymentMethod === 'upi') {
                document.getElementById('cardSection').style.display = 'none';
                document.getElementById('upiSection').style.display = 'block';
            } else {
                document.getElementById('cardSection').style.display = 'block';
                document.getElementById('upiSection').style.display = 'none';
            }
        }

        function processPayment() {
            const paymentMethod = document.getElementById('paymentMethod').value;
            let paymentMethodText;
            if (paymentMethod === 'upi') {
                const upiId = document.getElementById('upiId').value;
                paymentMethodText = UPI ID: ${upiId};
                alert(Payment processed through UPI ID: ${upiId});
            } else {
                const cardNumber = document.getElementById('cardNumber').value;
                paymentMethodText = Card Number: **** **** **** ${cardNumber.slice(-4)};
                alert(Payment processed through Card: ${cardNumber});
            }

            // Generate a transaction ID (for demonstration purposes, we'll use a simple random number)
            const transactionId = Math.floor(Math.random() * 1000000000);

            // Redirect to the receipt page
            const amount = document.getElementById('amountPreview').textContent;
            const url = receiptindia.html?paymentMethod=${encodeURIComponent(paymentMethodText)}&amount=${encodeURIComponent(amount)}&transactionId=${encodeURIComponent(transactionId)};
            window.location.href = url;
        }

        window.onload = function() {
            const { amount } = getQueryParams();
            document.getElementById('amountPreview').textContent = amount || '$160';
        };
    </script>
</body>
</html> -->