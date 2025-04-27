<?php
require('fpdf\fpdf.php');

// Retrieve the payment details from the query parameters
$event = isset($_GET['event']) ? $_GET['event'] : '';
$sub_service = isset($_GET['sub_service']) ? $_GET['sub_service'] : '';
$amount = isset($_GET['amount']) ? $_GET['amount'] : '';
$cardhname = isset($_GET['cardhname']) ? $_GET['cardhname'] : '';
$paymentDate = date("Y-m-d H:i:s"); // Current timestamp for payment date

// Create a PDF class using FPDF
class PDF extends FPDF
{
    function Header()
    {
        // Logo
        $this->Image('Images\logo.png',10,6,30);
        // Arial bold 15
        $this->SetFont('Arial','B',15);
        // Title
        $this->Cell(80);
        $this->Cell(30,10,'Payment Receipt',0,1,'C');
        $this->Ln(20);
    }

    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Page number
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
}

// Create the PDF
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

// Title
$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,10,'Thank you for your payment!',0,1,'C');
$pdf->Ln(10);

// Payment details
$pdf->SetFont('Arial','',12);
$pdf->Cell(0,10,"Event: $event",0,1);
$pdf->Cell(0,10,"Sub-Service: $sub_service",0,1);
$pdf->Cell(0,10,"Amount Paid: Rs. $amount",0,1);
$pdf->Cell(0,10,"Card Holder: $cardhname",0,1);
$pdf->Cell(0,10,"Payment Date: $paymentDate",0,1);
$pdf->Ln(20);

// Output the PDF as a string
$pdfContent = $pdf->Output('', 'S'); // 'S' outputs as a string

// Save the PDF temporarily
$filePath = 'tmp_receipt.pdf';
file_put_contents($filePath, $pdfContent);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>

    <!-- Link to Google Fonts for modern typography -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <!-- Link to Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f7f8fc;
            color: #333;
            line-height: 1.6;
        }

        /* Header bar */
        .header {
            background-color: #2b2d42;
            color: #fff;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .header h2 {
            font-size: 24px;
            font-weight: 600;
        }

        .header i {
            margin-right: 10px;
        }

        .container {
            width: 90%;
            max-width: 1000px;
            margin: 50px auto;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 40px;
            text-align: left;
        }

        h1 {
            color: #2b2d42;
            font-weight: 600;
            margin-bottom: 20px;
            font-size: 28px;
            text-align: center;
        }

        .invoice-details, .customer-details, .company-details {
            margin-bottom: 20px;
        }

        .invoice-details p, .customer-details p, .company-details p {
            margin: 5px 0;
        }

        .invoice-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        .invoice-table th, .invoice-table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        .invoice-table th {
            background-color: #f1f1f1;
        }

        .total-amount {
            text-align: right;
            font-size: 18px;
            font-weight: bold;
            color: #2b2d42;
        }

        .footer-text {
            font-size: 12px;
            text-align: center;
            color: #888;
            margin-top: 20px;
        }

        .btn {
            display: inline-block;
            background-color: #2b2d42;
            color: #fff;
            padding: 12px 24px;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-decoration: none;
            font-weight: 600;
            display: block;
            width: 200px;
            margin: 0 auto;
        }

        .btn:hover {
            background-color: #d90429;
        }

        .btn:focus {
            outline: none;
        }

        @media (max-width: 768px) {
            h1 {
                font-size: 24px;
            }

            .btn {
                padding: 10px 18px;
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
    <!-- Header Bar -->
    <div class="header">
        <h2><i class="fas fa-receipt"></i> Invoice</h2>
        <a href="home.php" class="btn"><i class="fas fa-home"></i> Home</a>
    </div>

    <div class="container">
        <h1>Invoice for Your Payment</h1>

        <!-- Company Details -->
        <div class="company-details">
            <p><strong>Company Name:</strong> P DIGITAL</p>
            <p><strong>Address:</strong>22/23 Nirmit Apt,Nanepada Mulund(East),Mumbai-400081</p>
            <p><strong>Email:</strong> Pdigital@gmail.com</p>
            <p><strong>Phone:</strong> +91 8652332869</p>
        </div>

        <!-- Customer Details -->
        <div class="customer-details">
            <p><strong>Bill to:</strong> <?php echo $cardhname; ?></p>
            <p><strong>Invoice Date:</strong> <?php echo $paymentDate; ?></p>
            <p><strong>Event:</strong> <?php echo $event; ?></p>
            <p><strong>Sub-Service:</strong> <?php echo $sub_service; ?></p>
        </div>

        <!-- Payment Summary Table -->
        <table class="invoice-table">
            <thead>
                <tr>
                    <th>Description</th>
                    <th>Amount (Rs.)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $event . " - " . $sub_service; ?></td>
                    <td><?php echo $amount; ?></td>
                </tr>
            </tbody>
        </table>

        <!-- Total Amount -->
        <p class="total-amount">Total Amount: Rs. <?php echo $amount; ?></p>

        <!-- Footer -->
        <div class="footer-text">
            <p>Thank you for choosing P DIGITAL. If you have any questions about this invoice, please contact us at Pdigital@gmail.com.</p>
        </div>

        <!-- Download Button -->
        <form method="get" action="download.php">
            <input type="hidden" name="file" value="tmp_receipt.pdf">
            <button class="btn" type="submit"><i class="fas fa-download"></i> Download Invoice</button>
        </form>
    </div>
</body>
</html>
