<?php
include '../koneksi.php';
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM transaksi_masuk WHERE id_masuk = '$id'");
header("Location: index.php");
?>
