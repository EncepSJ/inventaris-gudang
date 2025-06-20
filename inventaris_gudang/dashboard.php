<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Inventaris Gudang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="mb-4 text-center">Dashboard Inventaris Gudang</h2>

    <div class="alert alert-info">
        <strong>Notifikasi Stok Barang:</strong>
        <ul class="mb-0">
            <?php
            $result = mysqli_query($conn, "SELECT * FROM barang");
            $ada = false;
            while ($row = mysqli_fetch_assoc($result)) {
                $status = ($row['stok'] < $row['batas_minimum']) ? "<span class='text-danger fw-bold'>Tidak Aman</span>" : "<span class='text-success fw-bold'>Aman</span>";
                echo "<li>{$row['nama_barang']} - Stok: {$row['stok']} (Minimum: {$row['batas_minimum']}) → Status: $status</li>";
                $ada = true;
            }
            if (!$ada) echo "<li>Belum ada data barang.</li>";
            ?>
        </ul>
    </div>

    <div class="row text-center">
        <div class="col-md-3 mb-2">
            <a href="barang/index.php" class="btn btn-outline-dark w-100">📦 Barang</a>
        </div>
        <div class="col-md-3 mb-2">
            <a href="supplier/index.php" class="btn btn-outline-dark w-100">🏷️ Supplier</a>
        </div>
        <div class="col-md-3 mb-2">
            <a href="transaksi_masuk/index.php" class="btn btn-outline-success w-100">➕ Transaksi Masuk</a>
        </div>
        <div class="col-md-3 mb-2">
            <a href="transaksi_keluar/index.php" class="btn btn-outline-danger w-100">➖ Transaksi Keluar</a>
        </div>
    </div>
</div>

</body>
</html>
