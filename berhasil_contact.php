<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    
    <title>Document</title>
    <link rel="stylesheet" href="style.css">

    <style>
        body {
    background-color: #1A1716;
}

.judul {
    color: #F7F7E9;;
}

.subjudul {
    color: #F7F7E9;;   
}

.kontainer-judul {
    margin: auto;
    padding: 8vw 6vw;
    text-align: center;
}

p a {
    color: #a56214;
}
    </style>
</head>
<body>
    <div class="kontainer-judul">
    <h1 class="sub  judul">THANK YOU FOR YOUR MESSAGE!</h1>
 <p><a href="form.php" class="">Go Back</a></p>
    </div>
    
<?php
    echo $_SESSION['email'];
?>

</body>
</html>
