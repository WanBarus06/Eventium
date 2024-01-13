<?php
session_start();
$koneksi = mysqli_connect("localhost", "root", "", "tubes");

$code = $_GET['code'];

if (isset($code)) {

    $query = $koneksi->query("SELECT * FROM akun WHERE kode_aktivasi='$code' ");
    $result = $query->fetch_assoc();

    $koneksi->query("UPDATE akun SET cek_kode_aktivasi=1 WHERE id ='" . $result['id'] . "'");
    $_SESSION['email'] = $result['email'];
    header("Location: login.php");


}
?>