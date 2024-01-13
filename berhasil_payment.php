<!--berhasil_payment.php-->

<?php
// Connect to your MySQL database
require 'koneksi.php';

// Check connection
if ($koneksi->connect_error) {
    die("Connection failed: " . $koneksi->connect_error);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $service = $_POST["service"];
    $package = $_POST["package"];
    $date = date("Y-m-d", strtotime($_POST["date"]));
    $note = $_POST["note"];
	$status = "Pending";

    // Insert data into the database
    $sql = "INSERT INTO orders (name, email, phone, service, package, date, note, status) VALUES ('$fullname', '$email', '$phone', '$service', '$package', '$date', '$note','$status')";

    if ($koneksi->query($sql) === TRUE) {
        // Retrieve the latest order ID immediately after the INSERT
        $latestOrderID = $koneksi->insert_id;
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
}

// Close the database connection
$koneksi    ->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <link rel="stylesheet" href="berhasil_payment.css">
    
    <title>Document</title>
    <link rel="stylesheet" href="stylesimpanpayment.css">
</head>
<body>
    <div class="kontainer-judul">
        <h1>Thank you for your order!</h1>
        <h2>Your order is in the queue for processing. Expect a confirmation email from our team shortly.</h2>
        <br>
        <?php
            if (isset($latestOrderID)) {
                // Display the link with the latest order ID as a query parameter
                require('simpanpayment.php');
                $pdfFileName = "invoice_order_$latestOrderID.pdf";
                echo "<p>Click <a href='$pdfFileName' download>here</a> to download your invoice!</p>";
            }
        ?>
        <br><br>
        <p><a href="#" class="">Go Back</a></p>
    </div>
</body>
</html>
