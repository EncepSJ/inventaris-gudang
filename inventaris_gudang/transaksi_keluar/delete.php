<?php
include '../koneksi.php';
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM transaksi_keluar WHERE id_keluar = '$id'");
header("Location: index.php");
?>
