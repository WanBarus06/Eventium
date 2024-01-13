<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/jpg" href="logo.jpg"/>
    <title>MODERASI PESANAN</title>

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npmza/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ"
      crossorigin="anonymous"
    ></script>


    <!--font-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@700&family=Cormorant:wght@500;700&family=Inconsolata:wght@400;500&family=Krona+One&family=Lexend+Exa:wght@600;800&family=Lexend+Tera:wght@200;600;800;900&family=Playfair+Display:ital@0;1&family=Poppins:wght@400;600;700&family=Yeseva+One&display=swap"
      rel="stylesheet"
    />

    <!--External css-->
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="message.css">
</head>
<body>

<?php
  include 'admin-navbar.php';
?>

<div class="message-container">
 <h1 class="judul-tabel">ADMIN CONTACT</h1>

 
<?php
// Koneksi ke database (ganti dengan informasi koneksi Anda)
require 'koneksi.php';

// Periksa koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Ambil data dari database
$sql = "SELECT * FROM cpage";
$result = $koneksi->query($sql);

// Tampilkan data dalam tabel HTML
if ($result->num_rows > 0) {
    echo "<table class='table table-bordered table-striped mt-3'>
            <thead>
            <tr>
                <th width='25%'>Name</th>
                <th width='25%'>Email</th>
                <th width='25%'>Phone Numbers</th>
                <th width='25%'>Message</th>
            </tr>
            </thead>    ";

    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["name"] . "</td>
                <td>" . $row["email"] . "</td>
                <td>" . $row["phone_number"] . "</td>
                <td>" . $row["message"] . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "Tidak ada data.";
}

// Tutup koneksi
$koneksi->close();
?>

</div>

</body>
</html>
