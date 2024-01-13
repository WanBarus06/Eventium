<?php
require('fpdf/fpdf.php');
require 'koneksi.php';

// Function to get full name from the database based on order ID
function getFullNameFromDatabase($orderID, $koneksi)
{
    $result = $koneksi->query("SELECT name FROM orders WHERE id = $orderID");

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row["name"];
    }

    return "Default Name"; // Default name if not found
}

// Function to get email from the database based on order ID
function getEmailFromDatabase($orderID, $koneksi)
{
    $result = $koneksi->query("SELECT email FROM orders WHERE id = $orderID");

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row["email"];
    }

    return "No Email"; // Default email if not found
}

// Function to get phone number from the database based on order ID
function getPhoneFromDatabase($orderID, $koneksi)
{
    $result = $koneksi->query("SELECT phone FROM orders WHERE id = $orderID");

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row["phone"];
    }

    return "No Phone Number"; // Default phone number if not found
}

// Function to get the package price from the database based on the package name
function getPackagePriceFromDatabase($package, $koneksi)
{
    global $packagePrices; // Access the global array of package prices

    // Check if the package is in the array, otherwise, return a default value
    return isset($packagePrices[$package]) ? $packagePrices[$package] : 0.00;
}

// Function to get the service price from the database based on the service name
function getServicePriceFromDatabase($service, $koneksi)
{
    global $servicePrices; // Access the global array of service prices

    // Check if the service is in the array, otherwise, return a default value
    return isset($servicePrices[$service]) ? $servicePrices[$service] : 0.00;
}

// Connect to your MySQL database


// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the package and service values from the form
    $package = isset($_POST["package"]) ? $_POST["package"] : "";
    $service = isset($_POST["service"]) ? $_POST["service"] : "";

    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $date = date("Y-m-d", strtotime($_POST["date"]));
    $note = $_POST["note"];
    $status = "Pending";

}

// Fetch the latest order details from the database
$result = $koneksi->query("SELECT * FROM orders ORDER BY id DESC LIMIT 1");
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $latestOrderID = $row['id'];
    $latestPackage = $row['package'];
    $latestService = $row['service'];
} else {
    // Handle the case where no orders are found
    $latestOrderID = null;
    $latestPackage = null;
    $latestService = null;
}

// Store the latest order ID in a session variable
$_SESSION['latest_order_id'] = $latestOrderID;

// Get prices from the database or set default values
$packagePrices = [
    "Gold" => 4198.00,
    "Diamond" => 5490.00,
    "Platinum" => 12950.00,
];

// Define prices for services
$servicePrices = [
    "Event Organizer" => 2000.00,
    "Hall Reservation" => 1500.00,
    "EO & Hall Reservation" => 3000.00,
];

// Use the latest package and service from the database
$service = $latestService;
$package = $latestPackage;

// Get prices from the database or set default values
$packagePrice = getPackagePriceFromDatabase($package, $koneksi);
$servicePrice = getServicePriceFromDatabase($service, $koneksi);

// Calculate the total amount
$totalAmount = $packagePrice + $servicePrice;

// Customer and invoice details
$info = [
    "customer" => getFullNameFromDatabase($latestOrderID, $koneksi),
    "email" => getEmailFromDatabase($latestOrderID, $koneksi),
    "phone" => getPhoneFromDatabase($latestOrderID, $koneksi),
    "invoice_no" => sprintf("%05d", $latestOrderID), // Use sprintf to pad with zeros
    "invoice_date" => date("d-m-Y"), // Current date and time
    "total_amt" => number_format($totalAmount, 2),
];

// Invoice Products
$products_info = [
    [
        "name" => "Service: $service",
        "price" => number_format($packagePrice, 2),
        "qty" => 1,
        "total" => number_format($packagePrice, 2),
    ],
    [
        "name" => "Package: $package", //
        "price" => number_format($servicePrice, 2),
        "qty" => 1,
        "total" => number_format($servicePrice, 2),
    ],
];

// Update the total for the service and package
$products_info[0]['total'] = number_format($packagePrice, 2);
$products_info[1]['total'] = number_format($servicePrice, 2);

class PDF extends FPDF
{
    private $orderID;

    public function __construct($orderID, $orientation = 'P', $unit = 'mm', $size = array(210, 105))
    {
        parent::__construct($orientation, $unit, $size);
        $this->orderID = $orderID;
    }

    function Header()
    {
        // Display Company Info
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(50, 10, "Eventium", 0, 1);
        $this->SetFont('Arial', '', 14);
        $this->Cell(50, 7, "The Pearl Lorem Ipsum Dolor Sit Amet Bla", 0, 1);
        $this->Cell(50, 7, "Doha, Qatar", 0, 1);
        $this->Cell(50, 7, "Phone: +974 9236 1449236", 0, 1);

        // Display INVOICE text
        $this->SetY(15);
        $this->SetX(-40);
        $this->SetFont('Arial', 'B', 18);
        $this->Cell(50, 10, "INVOICE", 0, 1);

        // Display Horizontal line
        $this->Line(0, 48, 210, 48);
    }

    function body($info, $products_info)
{
    // Billing Details
    $this->SetY(55);
    $this->SetX(10);
    $this->SetFont('Arial', 'B', 12);
    $this->Cell(50, 10, "Bill To: ", 0, 1);
    $this->SetFont('Arial', '', 12);
    $this->Cell(50, 7, $info["customer"], 0, 1);
    $this->Cell(50, 7, $info["email"], 0, 1);
    $this->Cell(50, 7, $info["phone"], 0, 1);
    
    // Display Invoice no
    $this->SetY(55);
    $this->SetX(-60);
    $this->Cell(50, 7, "Invoice No : " . $info["invoice_no"]);
    
    // Display Invoice date
    $this->SetY(63);
    $this->SetX(-60);
    $this->Cell(50, 7, "Invoice Date : " . $info["invoice_date"]);

// Display Table headings
$this->SetY(95);
$this->SetX(10);
$this->SetFont('Arial', 'B', 12);
$this->Cell(80, 9, "DESCRIPTION", 1, 0);
$this->Cell(40, 9, "PRICE", 1, 0, "C");
$this->Cell(30, 9, "QTY", 1, 0, "C");
$this->Cell(40, 9, "TOTAL", 1, 1, "C");
$this->SetFont('Arial', '', 12);

// Display products
foreach ($products_info as $product) {
    $this->SetX(10);
    $this->Cell(80, 9, $product["name"], 1);
    $this->Cell(40, 9, "$" . $product["price"], 1, 0, "C");
    $this->Cell(30, 9, $product["qty"], 1, 0, "C");
    $this->Cell(40, 9, "$" . $product["total"], 1, 1, "C"); 
}

    // Display table total row
    $this->SetFont('Arial', 'B', 12);
    $this->Cell(150, 9, "GRAND TOTAL", 1, 0, "R");
    $this->Cell(40, 9, "$" . $info["total_amt"], 1, 1, "R");
}
}

$pdf = new PDF($latestOrderID, "P", "mm", "A4");
$pdf->AddPage();
$pdf->body($info, $products_info);

// Save the PDF file
$pdfFileName = "invoice_order_$latestOrderID.pdf";
$pdf->Output($pdfFileName, 'F');

// Close the database connection
$koneksi->close();
?>
