<!--dasbod.php-->

<?php
require 'koneksi.php';

if ($koneksi->connect_error) {
    die("Connection failed: " . $koneksi->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['finishTask'])) {
        $taskId = $_POST['taskId'];

        $updateSql = "UPDATE orders SET status = 'Finished' WHERE id = $taskId";
        if ($koneksi->query($updateSql) === TRUE) {
            $moveSql = "INSERT INTO finished_orders SELECT * FROM orders WHERE id = $taskId";
            if ($koneksi->query($moveSql) === TRUE) {
                $deleteSql = "DELETE FROM orders WHERE id = $taskId";
                if ($koneksi->query($deleteSql) !== TRUE) {
                    echo "Error deleting record: " . $koneksi->error;
                }
            } else {
                echo "Error moving record: " . $koneksi->error;
            }
        } else {
            echo "Error updating record: " . $koneksi->error;
        }
    }
}

$sql = "SELECT * FROM orders";
$result = $koneksi->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    <link rel="stylesheet" href="stylenew.css" />
    <link rel="stylesheet" href="style-table.css">
</head>

<body>
<nav class="navbar-dark navbar navbar-expand-lg newnav sticky-top">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.html"
          ><img src="logo.jpg" alt="" class="logo" /> EVENTIUM</a
        >
        <button
          class="navbar-toggler hambur"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link nlist" aria-current="page" href="index.php"
                >Home</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link nlist" href="admin-pesanan.php">Pesanan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link nlist" href="admin-ban.php">Ban User</a>
            </li>
            <li class="nav-item">
              <a class="nav-link nlist" href="admin-user.php">CRUD</a>
            </li>
            <li class="nav-item">
              <a class="nav-link nlist" href="admin-contact.php">Contact</a>
            </li>
            <li>
            <form action = "logout.php" method = "POST" style="height=100%;">
						<button type = "submit" name = "logout" class="btn newbtn">Logout</button>
						</form>
</li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="moderasi-container">
        <h1 class="judul-tabel">Moderasi Pesanan</h1>

        <!-- Ongoing Tasks -->
        <h2 class="sub-judul-tabel">Ongoing Tasks</h2>
        <table class='table table-bordered table-striped mt-3'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th width='28%'>Name</th>
                    <th>Phone Number</th>
                    <th>Email</th>
                    <th width='15%'>Service</th>
                    <th>Package</th>
                    <th width='15%'>Date</th>
                    <th width='25%'>Note</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<form>";
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["name"] . "</td>";
                        echo "<td>" . $row["phone"] . "</td>";
                        echo "<td>" . $row["email"] . "</td>";
                        echo "<td>" . $row["service"] . "</td>";
                        echo "<td>" . $row["package"] . "</td>";
                        echo "<td>" . date("d-m-Y", strtotime($row["date"])) . "</td>";
                        echo "<td>" . $row["note"] . "</td>";
                        echo "<td class='text-center status-cell' width='15%'>";

                        if ($row["status"] == "Finished") {
                            echo "<button type='button' class='btn btn-success'>Finished</button>";
                        } else {
                            echo "<button type='button' id='pendingButton{$row['id']}' class='btn btn-warning'>Pending</button>";
                        }

                        echo "</td>";
                        echo "</form>";
                        echo "<form method='POST' action='admin-pesanan.php'>";
                        echo "<input type='hidden' name='taskId' value='{$row['id']}'>";
                        echo "<td class='text-center' width='15%'><button type='submit' name='finishTask' class='btn btn-danger btn-finish-task'>Finish Task</button></td>";
                        echo "</tr>";
                        echo "</form>";
                    }
                    echo "</tbody></table>";
                } else {
                    echo "<p>No ongoing tasks found</p>";
                }

                $sqlFinished = "SELECT * FROM finished_orders";
                $resultFinished = $koneksi->query($sqlFinished);
                ?>

                <!-- Finished Tasks -->
                <h2 class="sub-judul-tabel">Finished Tasks</h2>
                  <table class='table table-bordered table-striped mt-3'>
                        <thead>
                            <tr>
                              <th>ID</th>
                              <th width='28%'>Name</th>
                              <th>Phone Number</th>
                              <th>Email</th>
                              <th width='15%'>Service</th>
                              <th>Package</th>
                              <th width='15%'>Date</th>
                              <th width='25%'>Note</th>
                              <th>Status</th>
                              <th>Action</th>
                          </tr>
                        </thead>
                        <tbody> 
                    <?php
                    if ($resultFinished->num_rows > 0) {
                    while ($rowFinished = $resultFinished->fetch_assoc()) {
                        echo "<form>";
                        echo "<tr>";
                        echo "<td>" . $rowFinished["id"] . "</td>";
                        echo "<td>" . $rowFinished["name"] . "</td>";
                        echo "<td>" . $rowFinished["phone"] . "</td>";
                        echo "<td>" . $rowFinished["email"] . "</td>";
                        echo "<td>" . $rowFinished["service"] . "</td>";
                        echo "<td>" . $rowFinished["package"] . "</td>";
                        echo "<td>" . date("d-m-Y", strtotime($rowFinished["date"])) . "</td>";
                        echo "<td>" . $rowFinished["note"] . "</td>";
                        echo "<td class='text-center status-cell' width='15%'>";
                        echo "<button type='button' class='btn btn-ijo btn-success'>Finished</button>";
                        echo "</td>";
                        echo "<td class='text-center' width='15%'>...</td>";
                        echo "</tr>";
                        echo "</form>";
                    }

                    echo "</tbody></table>";
                } else {
                    echo "<p>No finished tasks found</p>";
                }

                $koneksi->close();
                ?>

            </div>

            <!-- Bootstrap Bundle with Popper -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

            <!-- JavaScript for finishing tasks -->
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    var finishButtons = document.querySelectorAll('.btn-finish-task');
                    finishButtons.forEach(function (button) {
                        button.addEventListener('click', function () {
                            var confirmation = confirm("Are you sure you want to finish this task?");
                            if (confirmation) {
                                this.style.display = 'none';
                            }
                        });
                    });
                });
            </script>
        </body>

        </html>
